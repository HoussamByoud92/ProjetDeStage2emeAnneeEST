<?php

namespace App\Http\Controllers;

use App\Models\AccidentArchModel;
use Illuminate\Http\Request;

class AccidentArch extends Controller
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
        $accidentsArchive = AccidentArchModel:: latest()->paginate(5);
        return view('accidentsArchive.index',compact('accidentsArchive'))
            ->with('i', (request()->input('Page',1)-1) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accidentsArchive.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'DateArchivage' => 'required',
            'AcciArch' => 'required|file|max:2048',
        ]);
     
        $input = $request->all();
    
        if ($file = $request->file('AcciArch')) {
            $destinationPath = 'pdf/';
            $AcciArch = date('Ymd') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $AcciArch);
            $input['AcciArch'] = $AcciArch;
        }
    
        AccidentArchModel::create($input);
        return redirect()->route('accidentsArchive.index')
            ->with('success', 'accident archivé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccidentArchModel $accidentsArchive)
    {
        return view('accidentsArchive.show',compact('accidentsArchive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccidentArchModel $accidentsArchive)
    {
        return view('accidentsArchive.edit',compact('accidentsArchive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccidentArchModel $accidentsArchive)
    {
        $request->validate([
            'DateArchivage' => 'required',
            'AcciArch' => 'required|file|max:2048',
        ]);
     
        $input = $request->all();
    
        if ($file = $request->file('AcciArch')) {
            $destinationPath = 'pdf/';
            $AcciArch = date('Ymd') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $AcciArch);
            $input['AcciArch'] = $AcciArch;
        }else{
            unset($input['AcciArch']);
        }  
        $accidentsArchive->update($input);
        return redirect()->route('accidentsArchive.index')
        ->with('success','Archive modifié avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccidentArchModel $accidentsArchive)
    {
        $accidentsArchive->delete();
        return redirect()->route('accidentsArchive.index')
        ->with('success','Archive supprime avec succes');
    }
}
