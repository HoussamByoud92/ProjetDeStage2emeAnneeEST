<?php

namespace App\Http\Controllers;

use App\Models\AccidentModel;
use Illuminate\Http\Request;
use PDF;

class AccidentsController extends Controller
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
        $accidents = AccidentModel::latest()->paginate(5);
        return view('accidents.index',compact('accidents'))
            ->with('i', (request()->input('Page',1)-1) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accidents.create');
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
            'DescAcci'=>'required',
            'Risques'=>'required',
            'ActionsRec'=>'required',
        ]);
        $input = $request->all();
        AccidentModel::create($input);
        return redirect()->route('accidents.index')
        ->with('success','accidents ajoute avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccidentModel $accident)
    {
        return view('accidents.show',compact('accident'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccidentModel $accident)
    {
        return view('accidents.edit',compact('accident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccidentModel $accident)
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
            'DescAcci'=>'required',
            'Risques'=>'required',
            'ActionsRec'=>'required',
        ]);
        $input = $request->all();
        $accident->update($input);
        return redirect()->route('accidents.index')
        ->with('success','accidents modifie avec succes');
    }


    public function pdf(Request $request, $id){

        
        if($request->has('download')){
            $accident = AccidentModel::findOrFail($id); // instancier un seul element "accident"
            view()->share('accident', $accident);
            PDF::setOptions(['dpi'=>'150']);
            $pdf = PDF::loadView('accidents.pdf', compact('accident'));
            $pdf->stream('accidents_'.$accident->Date.'.pdf');
        }
    
        return view('accidents.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccidentModel $accident)
    {
        $accident->delete();
        return redirect()->route('accidents.index')
        ->with('success','accidents supprime avec succes');
    }
}
