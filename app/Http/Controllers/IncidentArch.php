<?php

namespace App\Http\Controllers;

use App\Models\InciArchModel;
use Illuminate\Http\Request;

class IncidentArch extends Controller
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
        $incidentsArchive = InciArchModel:: latest()->paginate(5);
        return view('incidentsArchive.index',compact('incidentsArchive'))
            ->with('i', (request()->input('Page',1)-1) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidentsArchive.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'DateArchivage' => 'required',
            'InciArch' => 'required|file|max:2048',
        ]);
     
        $input = $request->all();
    
        if ($file = $request->file('InciArch')) {
            $destinationPath = 'pdf/';
            $InciArch = date('Ymd') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $InciArch);
            $input['InciArch'] = $InciArch;
        }
    
        InciArchModel::create($input);
        return redirect()->route('incidentsArchive.index')
            ->with('success', 'Incident archivé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(InciArchModel $incidentsArchive)
    {
        return view('incidentsArchive.show',compact('incidentsArchive'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InciArchModel $incidentsArchive)
    {
        return view('incidentsArchive.edit',compact('incidentsArchive'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InciArchModel $incidentsArchive)
    {
        $request->validate([
            'DateArchivage' => 'required',
            'InciArch' => 'required|file|max:2048',
        ]);
     
        $input = $request->all();
    
        if ($file = $request->file('InciArch')) {
            $destinationPath = 'pdf/';
            $InciArch = date('Ymd') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $InciArch);
            $input['InciArch'] = $InciArch;
        }else{
            unset($input['InciArch']);
        }  
        $incidentsArchive->update($input);
        return redirect()->route('IncidArchi.index')
        ->with('success','Archive modifie avec succes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InciArchModel $incidentsArchive)
    {
        $incidentsArchive->delete();
        return redirect()->route('incidentsArchive.index')
        ->with('success','Archive supprimé avec succes');
    }
}
