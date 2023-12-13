<?php

namespace App\Http\Controllers;

use App\Models\RapportsModel;
use Illuminate\Http\Request;
use PDF;


class RapportsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','is_admin'])->except(['index','show','pdf']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rapports = RapportsModel::latest()->paginate(5);
        return view('rapports.index',compact('rapports'))
            ->with('i', (request()->input('Page',1)-1) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rapports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $request->validate([
            'Date'=>'required',
            'CoupFort'=>'required',
            'CoupProg'=>'required',
            'DureeCF'=>'required',
            'DureeCP'=>'required',
            'PartieHT'=>'required',
            'PartiemT'=>'required',
            'nbPannesBT'=>'required',
            'nbInciBT'=>'required',
            'nbRedMT'=>'required',
            'nbInciMT'=>'required',
            'nbPosteiCP'=>'required',
            'nbtronciCP'=>'required',
            'Temp1'=>'required',
            'CosPhi1'=>'required',
            'S1'=>'required',
            'Heure1'=>'required',
            'TotalEkwh1'=>'required',
            'ImaxDep1'=>'required',
            'Temp2'=>'required',
            'CosPhi2'=>'required',
            'S2'=>'required',
            'Heure2'=>'required',
            'TotalEkwh2'=>'required',
            'ImaxDep2'=>'required',
        ]);
        $input = $request->all();
        RapportsModel::create($input);
        return redirect()->route('rapports.index')
        ->with('success','Rapport ajoute avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(RapportsModel $rapport)
    {
        return view('rapports.show',compact('rapport'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RapportsModel $rapport)
    {
        return view('rapports.edit',compact('rapport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RapportsModel $rapport)
    {
        $request->validate([
            'Date'=>'required',
            'CoupFort'=>'required',
            'CoupProg'=>'required',
            'DureeCF'=>'required',
            'DureeCP'=>'required',
            'PartieHT'=>'required',
            'PartiemT'=>'required',
            'nbPannesBT'=>'required',
            'nbInciBT'=>'required',
            'nbRedMT'=>'required',
            'nbInciMT'=>'required',
            'nbPosteiCP'=>'required',
            'nbtronciCP'=>'required',
            'Temp1'=>'required',
            'CosPhi1'=>'required',
            'S1'=>'required',
            'Heure1'=>'required',
            'TotalEkwh1'=>'required',
            'ImaxDep1'=>'required',
            'Temp2'=>'required',
            'CosPhi2'=>'required',
            'S2'=>'required',
            'Heure2'=>'required',
            'TotalEkwh2'=>'required',
            'ImaxDep2'=>'required',
        ]);
        $input = $request->all();
        $rapport->update($input);
        return redirect()->route('rapports.index')
        ->with('success','Rapport modifie avec succes');
    }


    public function pdf(Request $request, $id){

        
        //if($request->has('download')){
            $rapport = RapportsModel::findOrFail($id); // instancier un seul element "rapport"
            view()->share('rapport', $rapport);
            PDF::setOptions(['dpi'=>'150']);
            $pdf = PDF::loadView('rapports.pdf', compact('rapport'));
            $pdf->stream('rapports_'.$rapport->Date.'.pdf');
        //}
    
        return view('rapports.pdf');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RapportsModel $rapport)
    {
        $rapport->delete();
        return redirect()->route('rapports.index')
        ->with('success','Rapport supprime avec succes');

    }
}
