<?php

namespace App\Http\Controllers;

use App\Models\IncidentModel;
use Illuminate\Http\Request;
use PDF;

class IncidentsController extends Controller
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
        $incidents = IncidentModel::latest()->paginate(5);
        return view('incidents.index',compact('incidents'))
            ->with('i', (request()->input('Page',1)-1) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Date'=>'required',
            'Redigeant'=>'required',
            'categorie'=>'required',
            'division'=>'required',
            'chantier'=>'required',
            'LieuEve'=>'required',
            'heure'=>'required',
            'signalant'=>'required',
            'nTele'=>'required',
            'Temoignages'=>'required',
            'DescInci'=>'required',
            'Risques'=>'required',
            'ActionsRec'=>'required',
        ]);
        $input = $request->all();
        IncidentModel::create($input);
        return redirect()->route('incidents.index')
        ->with('success','incident ajouté avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(IncidentModel $incident)
    {
        return view('incidents.show',compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncidentModel $incident)
    {
        return view('incidents.edit',compact('incident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IncidentModel $incident)
    {
        $request->validate([
            'Date'=>'required',
            'Redigeant'=>'required',
            'categorie'=>'required',
            'division'=>'required',
            'chantier'=>'required',
            'LieuEve'=>'required',
            'heure'=>'required',
            'signalant'=>'required',
            'nTele'=>'required',
            'Temoignages'=>'required',
            'DescInci'=>'required',
            'Risques'=>'required',
            'ActionsRec'=>'required',
        ]);
        $input = $request->all();
        $incident->update($input);
        return redirect()->route('incidents.index')
        ->with('success','incident modifié avec succes');
    }



    public function pdf(Request $request, $id){

        
        if($request->has('download')){
            $incident = IncidentModel::findOrFail($id); // instancier un seul element "incident"
            view()->share('incident', $incident);
            PDF::setOptions(['dpi'=>'150']);
            $pdf = PDF::loadView('incidents.pdf', compact('incident'));
            $pdf->stream('incidents_'.$incident->Date.'.pdf');
        }
    
        return view('incidents.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncidentModel $incident)
    {
        $incident->delete();
        return redirect()->route('incidents.index')
        ->with('success','incidents supprimé avec succes');
    }
}
