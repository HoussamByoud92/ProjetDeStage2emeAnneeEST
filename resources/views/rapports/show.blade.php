@extends('rapports.layout')

@section('content')


<div class="form-group p-2">

<div class="row">
    <div class="col align-self-start">
      <a class="btn btn-primary" href="{{route('rapports.index')}}" role="button">Retour</a>
      <a class="btn btn-danger" href="{{route('pdfrapp',['download'=>'pdf','id'=>$rapport->id])}}" role="button">PDF</a>
    </div>
</div>

</br>

<div class="card shadow mb-4 bg-gradient-light border-bottom-success">

<div class="card-header py-3 bg-gradient-success">
  <h6 class="m-0 font-weight-bold text-light">Rapport relatif au {{$rapport->Date}}</h6>
</div>
<div class="d-flex justify-content-center m-2">
<div class="container form-group row">
    
  <div class="col-xs-2 w-100 d-inline-block p-2">
    <label for="ex1">Date du rapport</label>
    <input disabled value="{{$rapport->Date}}" class="form-control border-primary border-2 border-primary" id="ex1" name="Date" type="date" placeholder="Date du rapport">
  </div>

 </br>
 </br>

 <nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h5">Réseau HT</span>
  </div>
</nav>

</br>

  <div class="col-xs-3 w-25 d-inline-block p-1">
    <label for="ex3">Coupures fortuites</label>
    <input disabled value="{{$rapport->CoupFort}}" class="form-control border-primary border-2" id="ex3" name="CoupFort" type="integer" placeholder="Coupures fortuites">
  </div>
  <div class="col-xs-4 w-25 d-inline-block p-1">
    <label for="ex3">Coupures programmées</label>
    <input disabled value="{{$rapport->CoupProg}}" class="form-control border-primary border-2" id="ex3" name="CoupProg" type="integer" placeholder="Coupures programmées">
  </div>
  <div class="col-xs-4 w-25 d-inline-block p-1">
    <label for="ex3">Durée des Coupures fortuites</label>
    <input disabled value="{{$rapport->DureeCF}}" class="form-control border-primary border-2" id="ex3" name="DureeCF" type="integer" placeholder="Durée des Coupures fortuites">
  </div>

    <div class="col-xs-2 w-25 d-inline-block p-1">
    <label for="ex1">Durée des Coupures programmées</label>
    <input disabled value="{{$rapport->DureeCP}}" class="form-control border-primary border-2" id="ex1" name="DureeCP" type="integer" placeholder="Durée des Coupures programmées">
  </div>

 </br>

  <nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Evenements et Anomalies</span>
    </div>
  </nav>

</br>

  <div class="col-xs-3 w-50 d-inline-block p-1">
    <label for="ex3">Partie HT</label>
    <input disabled value="{{$rapport->PartieHT}}" class="form-control border-primary border-2" id="ex3" name="PartieHT" type="text" placeholder="Partie HT">
  </div>
  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Partie MT</label>
    <input disabled value="{{$rapport->PartiemT}}" class="form-control border-primary border-2" id="ex3" name="PartiemT" type="text" placeholder="Partie MT">
  </div>

  </br>

<nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Réseau MT/BT</span>
    </div>
  </nav>

</br>


  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Nombre de pannes R.BT</label>
    <input disabled value="{{$rapport->nbPannesBT}}" class="form-control border-primary border-2" id="ex3" name="nbPannesBT" type="integer" placeholder="Nombre de pannes réseau BT">
  </div>
  <div class="col-xs-2 w-50 d-inline-block p-1">
    <label for="ex1">Nombre des incidents R.BT</label>
    <input disabled value="{{$rapport->nbInciBT}}" class="form-control border-primary border-2" id="ex1" name="nbInciBT" type="integer" placeholder="Nombre des incidents R.BT">
  </div>

  </br>

  <div class="col-xs-3 w-50 d-inline-block p-1">
    <label for="ex3">Nombre de rédamations R.MT</label>
    <input disabled value="{{$rapport->nbRedMT}}" class="form-control border-primary border-2" id="ex3" name="nbRedMT" type="integer" placeholder="Nombre de rédamations réseau MT">
  </div>
  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Nombre des incidents R.MT</label>
    <input disabled value="{{$rapport->nbInciMT}}" class="form-control border-primary border-2" id="ex3" name="nbInciMT" type="integer" placeholder="Nombre des incidents réseau MT">
  </div>

</br>

  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Nombre des postes isolés (CP)</label>
    <input disabled value="{{$rapport->nbPosteiCP}}" class="form-control border-primary border-2" id="ex3" name="nbPosteiCP" type="integer" placeholder="Nombre des postes isolés (coupures pr)">
  </div>
  <div class="col-xs-2 w-50 d-inline-block p-1">
    <label for="ex1">Nombre des troncons isolés (CP)</label>
    <input disabled value="{{$rapport->nbtronciCP}}" class="form-control border-primary border-2" id="ex1" name="nbtronciCP" type="integer" placeholder="Nombre des troncons isolés (coupures pr)">
  </div>

</br>

<nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Tranche 1</span>
    </div>
  </nav>

</br>

  <div class="col-xs-3 w-25 d-inline-block p-1">
    <label for="ex3">Température (tranche 1)</label>
    <input disabled value="{{$rapport->Temp1}}" class="form-control border-primary border-2" id="ex3" name="Temp1" type="float" placeholder="Température (tranche 1)">
  </div>
  <div class="col-xs-4 w-25 d-inline-block p-1">
    <label for="ex3">CosPhi (tranche 1)</label>
    <input disabled value="{{$rapport->CosPhi1}}" class="form-control border-primary border-2" id="ex3" name="CosPhi1" type="float" placeholder="CosPhi (tranche 1)">
  </div>
  <div class="col-xs-4 w-25 d-inline-block p-1">
    <label for="ex3">La valeur de S (tranche 1)</label>
    <input disabled value="{{$rapport->S1}}" class="form-control border-primary border-2" id="ex3" name="S1" type="float" placeholder="La valeur de S (tranche 1)">
  </div>
  <div class="col-xs-2 w-25 d-inline-block p-1">
    <label for="ex1">Nombre des heures (tranche 1)</label>
    <input disabled value="{{$rapport->Heure1}}" class="form-control border-primary border-2" id="ex1" name="Heure1" type="float" placeholder="Nombre des heures (tranche 1)">
  </div>
  <div class="col-xs-3 w-50 d-inline-block p-1">
    <label for="ex3">Energie Totale en KWH (tranche 1)</label>
    <input disabled value="{{$rapport->TotalEkwh1}}" class="form-control border-primary border-2" id="ex3" name="TotalEkwh1" type="float" placeholder="Energie Totale en KWH (tranche 1)">
  </div>
  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">ImaxDep (tranche 1)</label>
    <input disabled value="{{$rapport->ImaxDep1}}" class="form-control border-primary border-2" id="ex3" name="ImaxDep1" type="float" placeholder="ImaxDep (tranche 1)">
  </div>

</br>

<nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Tranche 2</span>
    </div>
  </nav>

</br>

  <div class="col-xs-3 w-25 d-inline-block p-1">
    <label for="ex3">Température (tranche 2)</label>
    <input disabled value="{{$rapport->Temp2}}" class="form-control border-primary border-2" id="ex3" name="Temp2" type="float" placeholder="Température (tranche 2)">
  </div>
  <div class="col-xs-4 w-25 d-inline-block p-1">
    <label for="ex3">CosPhi (tranche 2)</label>
    <input disabled value="{{$rapport->CosPhi2}}" class="form-control border-primary border-2" id="ex3" name="CosPhi2" type="float" placeholder="CosPhi (tranche 2)">
  </div>
  <div class="col-xs-4 w-25 d-inline-block p-1">
    <label for="ex3">La valeur de S (tranche 2)</label>
    <input disabled value="{{$rapport->S2}}" class="form-control border-primary border-2" id="ex3" name="S2" type="float" placeholder="La valeur de S (tranche 2)">
  </div>
  <div class="col-xs-2 w-25 d-inline-block p-1">
    <label for="ex1">Nombre des heures (tranche 2)</label>
    <input disabled value="{{$rapport->Heure2}}" class="form-control border-primary border-2" id="ex1" name="Heure2" type="float" placeholder="Nombre des heures (tranche 2)">
  </div>
  <div class="col-xs-3 w-50 d-inline-block p-1">
    <label for="ex3">Energie Totale en KWH (tranche 2)</label>
    <input disabled value="{{$rapport->TotalEkwh2}}" class="form-control border-primary border-2" id="ex3" name="TotalEkwh2" type="float" placeholder="Energie Totale en KWH (tranche 2)">
  </div>
  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">ImaxDep (tranche 2)</label>
    <input disabled value="{{$rapport->ImaxDep2}}" class="form-control border-primary border-2" id="ex3" name="ImaxDep2" type="float" placeholder="ImaxDep (tranche 2)">
  </div>

</br>

<nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Tranche 3</span>
    </div>
  </nav>

</br>

  <div class="col-xs-3 w-25 d-inline-block p-1">
    <label for="ex3">Température (tranche 3)</label>
    <input disabled value="{{$rapport->Temp3}}" class="form-control border-primary border-2" id="ex3" name="Temp3" type="float" placeholder="Température (tranche 3)">
  </div>
  <div class="col-xs-4 w-25 d-inline-block p-1">
    <label for="ex3">CosPhi (tranche 3)</label>
    <input disabled value="{{$rapport->CosPhi3}}" class="form-control border-primary border-2" id="ex3" name="CosPhi3" type="float" placeholder="CosPhi (tranche 3)">
  </div>
  <div class="col-xs-4 w-25 d-inline-block p-1">
    <label for="ex3">La valeur de S (tranche 3)</label>
    <input disabled value="{{$rapport->S3}}" class="form-control border-primary border-2" id="ex3" name="S3" type="float" placeholder="La valeur de S (tranche 3)">
  </div>
  <div class="col-xs-2 w-25 d-inline-block p-1">
    <label for="ex3">Nombre des heures (tranche 3)</label>
    <input disabled value="{{$rapport->Heure3}}" class="form-control border-primary border-2" id="ex3" name="Heure3" type="float" placeholder="Nombre des heures (tranche 3)">
  </div>
  <div class="col-xs-3 w-50 d-inline-block p-1">
    <label for="ex3">Energie Totale en KWH (tranche 3)</label>
    <input disabled value="{{$rapport->TotalEkwh3}}" class="form-control border-primary border-2" id="ex3" name="TotalEkwh3" type="float" placeholder="Energie Totale en KWH (tranche 3)">
  </div>
  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">ImaxDep (tranche 3)</label>
    <input disabled value="{{$rapport->ImaxDep3}}" class="form-control border-primary border-2" id="ex3" name="ImaxDep3" type="float" placeholder="ImaxDep (tranche 3)">
  </div>

</br>



</div>
</div>
</div>
</div>

@endsection