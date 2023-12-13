@extends('dash.layout')

@section('content')
    <hr>
    <div class="">
    <div class="row w-100">
        <div class="col-md-3 w-50">

           <div class="card card-body bg-gradient-danger text-white  ">

                <label>Nombre des rapports</label>
                <h1>{{$rapportsTotal}}</h1>
                <a href="{{route('rapports.index')}}" class="text-white">Consulter >>></a>

            </div>

        </div>
        <div class="col-md-3 w-50">

            <div class="card card-body bg-gradient-danger text-white mb-3 ">

                <label>Nombre des rapports archivés</label>
                <h1>{{$rapportsArch}}</h1>
                <a href="{{route('rapportsArchive.index')}}" class="text-white">Consulter >>></a>

            </div>

        </div>

    </div>
    <div class="row w-100">

        <div class="col-md-3 w-50">

           <div class="card card-body bg-gradient-danger text-white mb-3 ">

                <label>Nombre des incidents</label>
                <h1>{{$incidentsTotal}}</h1>
                <a href="{{route('incidents.index')}}" class="text-white">Consulter >>></a>

            </div>

        </div>
        <div class="col-md-3 w-50">

           <div class="card card-body bg-gradient-danger text-white mb-3">

                <label>Nombre des incidents archivés</label>
                <h1>{{$incidentsArch}}</h1>
                <a href="{{route('incidentsArchive.index')}}" class="text-white">Consulter >>></a>

            </div>

        </div>

    </div>
    <div class="row w-100">

        <div class="col-md-3 w-50">

           <div class="card card-body bg-gradient-danger text-white mb-3">

                <label>Nombre des accidents</label>
                <h1>{{$accidentsTotal}}</h1>
                <a href="{{route('accidents.index')}}" class="text-white">Consulter >>></a>

            </div>

        </div>
        </br>
        
        
        <div class="col-md-3 w-50">

           <div class="card card-body bg-gradient-danger text-white mb-3 ">

                <label>Nombre des accidents archivés</label>
                <h1>{{$accidentsArch}}</h1>
                <a href="{{route('accidentsArchive.index')}}" class="text-white">Consulter >>></a>

            </div>

        </div>
    </div>
      
    </div>

@endsection