<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RapportsModel;
use App\Models\IncidentModel;
use App\Models\AccidentModel;
use App\Models\RapportArchModel;
use App\Models\InciArchModel;
use App\Models\AccidentArchModel;


class DashboardController extends Controller
{
    public function index()
    {
        $rapportsTotal = RapportsModel::count();
        $incidentsTotal = IncidentModel::count();
        $accidentsTotal = AccidentModel::count();

        $rapportsArch = RapportArchModel::count();
        $incidentsArch = InciArchModel::count();
        $accidentsArch = AccidentArchModel::count();
        return view('dash.dashboard',compact('rapportsTotal','incidentsTotal','accidentsTotal','rapportsArch','incidentsArch','accidentsArch'));
    }
}
