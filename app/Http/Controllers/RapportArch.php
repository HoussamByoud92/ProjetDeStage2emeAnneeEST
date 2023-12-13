<?php

namespace App\Http\Controllers;

use App\Models\RapportArchModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RapportArch extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','pdf']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rapportsArchive = RapportArchModel:: latest()->paginate(5);
        return view('rapportsArchive.index',compact('rapportsArchive'))
            ->with('i', (request()->input('Page',1)-1) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rapportsArchive.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'DateArchivage' => 'required',
        'RappArch' => 'required|file|max:2048',
    ]);
 
    $input = $request->all();

    if ($file = $request->file('RappArch')) {
        $destinationPath = 'pdf/';
        $RappArch = date('Ymd') . "." . $file->getClientOriginalExtension();
        $file->move($destinationPath, $RappArch);
        $input['RappArch'] = $RappArch;
    }

    RapportArchModel::create($input);
    return redirect()->route('rapportsArchive.index')
        ->with('success', 'Rapport archivé avec succès');
}


    /**
     * Display the specified resource.
     */
    public function show(RapportArchModel $rapportsArchive)
    {
        return view('rapportsArchive.show',compact('rapportsArchive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RapportArchModel $rapportsArchive)
    {
        return view('rapportsArchive.edit',compact('rapportsArchive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RapportArchModel $rapportsArchive)
    {
        $request->validate([
            'DateArchivage'=>'required',
            'RappArch'=>'required | pdf_file | mimes:pdf | max:4096',
        ]);
        $input = $request->all();
        if ($pdfFile = $request->file('pdf_file')) {
            $destinationPath = file('pdf_file')->store('public');
            $PDF = date('YmdHis').".".$pdfFile->getClientOriginalExtension();
            $pdfFile->move($destinationPath, $PDF);
            $input['pdfFile'] = "$PDF";
        }else{
            unset($input['pdfFile']);
        }  
        $rapportsArchive->update($input);
        return redirect()->route(rapportsArchive.index)
        ->with('success','Archive modifie avec succes');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RapportArchModel $rapportsArchive)
    {
        $rapportsArchive->delete();
        return redirect()->route('rapportsArchive.index')
        ->with('success','Rapport supprime avec succes');
    }
}

