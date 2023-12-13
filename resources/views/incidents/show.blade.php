@extends('incidents.layout')

@section('content')




@if ($errors->any())
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach ($errors->all() as $item)
       <li>{{$item}}</li>  
    @endforeach
  </ul>
</div>
@endif


<div class="form-group p-2">

<div class="row">
    <div class="col align-self-start">
      <a class="btn btn-primary" href="{{route('incidents.index')}}" role="button">Retour</a>
      <a class="btn btn-danger" href="{{route('pdfinci',['download'=>'pdf','id'=>$incident->id])}}" role="button">PDF</a>
    </div>
</div>

@if ($incident->DateNaiss > $incident->DateEmb)
    <div class="alert alert-danger w-100 mt-5" role="alert">
      <ul>
        <p>La date d`embauche est inférieure à la date de naissance ! Veuillez modifier l`erreur avant d`exporter un PDF.</p>
      </ul>
    </div>
@endif

</br>

<div class="card shadow mb-4 bg-gradient-light border-bottom-success">

<div class="card-header py-3 bg-gradient-success">
  <h6 class="m-0 font-weight-bold text-light">L`incident relatif au {{$incident->Date}}</h6>
</div>
<div class="d-flex justify-content-center m-2">
<div class="container form-group row">

  <div class="col-xs-2 w-100 d-inline-block p-2">
    <label for="ex1">Date de l`incidents</label>
    <input disabled value="{{$incident->Date}}" class="form-control border-primary border-2 border-primary" id="ex1" name="Date" type="date" placeholder="Date du rapport">
  </div>

</br>

  <div class="col-xs-3 w-50 d-inline-block p-1">
    <label for="ex3">Rédigé par :</label>
    <input disabled value="{{$incident->Redigeant}}" class="form-control border-primary border-2" id="ex3" name="Redigeant" type="text" placeholder="Saisir le rédigeant de l`incident">
  </div>
  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Catégorie</label>
    <select disabled value="{{$incident->categorie}}" class="form-control border-primary border-2" id="ex3" name="categorie" type="string" placeholder="Coupures programmées">
          <option>Sécurité et santé</option>
          <option>Environnement</option>
          <option>Matériel/Installations</option>
    </select>
  </div>
  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Division concernée</label>
    <input disabled value="{{$incident->division}}" class="form-control border-primary border-2" id="ex3" name="division" type="string" placeholder="Saisir la division concernée">
  </div>

    <div class="col-xs-2 w-50 d-inline-block p-1">
    <label for="ex1">Chantier</label>
    <input disabled value="{{$incident->chantier}}" value="Renouvellement des conduites d’assainissement" class="form-control border-primary border-2" id="ex1" name="chantier" type="string" placeholder="Durée des Coupures programmées">
  </div>

 </br>

  <nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Renseignements sur l`incident</span>
    </div>
  </nav>

</br>

  <div class="w-100 col-xs-3 d-inline-block p-1">
    <label for="ex3">Lieu précis de l`événement</label>
    <input disabled value="{{$incident->LieuEve}}" class="form-control border-primary border-2" id="ex3" name="LieuEve" type="string" placeholder="Lieu précis de l`événement">
  </div>
  <div class="w-100 col-xs-3 d-inline-block p-1">
    <label for="ex3">Heure de l’événement </label>
    <input disabled value="{{$incident->heure}}" class="form-control border-primary border-2" id="ex3" name="heure" type="time" placeholder="Partie HT">
  </div>
  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Signalé par :</label>
    <input disabled value="{{$incident->signalant}}" class="form-control border-primary border-2" id="ex3" name="signalant" type="string" placeholder="Saisir le signalant de l`incident">
  </div>
    <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Numéro de téléphone</label>
    <input disabled value="{{$incident->nTele}}" class="form-control border-primary border-2" id="ex3" name="nTele" type="string" placeholder="0612345678">
  </div>
  

  </br>

<nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Renseignements sur les dommages</span>
    </div>
  </nav>

</br>


  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Nature des dommages :</label>
    <input disabled value="{{$incident->NatureDomm}}" class="form-control border-primary border-2" id="ex3" name="NatureDomm" type="string" placeholder="Nature des dommages">
  </div>
  <div class="col-xs-2 w-50 d-inline-block p-1">
    <label for="ex1">Siège des lésions/dommages :</label>
    <input disabled value="{{$incident->SiegeDomme}}" class="form-control border-primary border-2" id="ex1" name="SiegeDomme" type="string" placeholder="Siège des lésions/dommages">
  </div>
  <div class="col-xs-3 w-100 d-inline-block p-1">
    <label for="ex3">Description des dommages :</label>
    <textarea disabled value="{{$incident->Description}}" class=" form-control border-primary border-2" id="ex3" name="Description" type="text" placeholder="Description des dommages">{{$incident->Description}}</textarea>
  </div>
  <div class="col-xs-4 w-100 d-inline-block p-1">
    <label for="ex3">Identifiant victime(s) : matricule, CIN ou autres</label>
    <input disabled value="{{$incident->IDVictime}}" class="form-control border-primary border-2" id="ex3" name="IDVictime" type="string" placeholder="AB12345">
  </div>

 @if ($incident->DateNaiss > $incident->DateEmb)
   <div class="col-xs-4 w-50 d-inline-block p-1">
    <label class="text-danger" for="ex3">Date de naissance</label>
    <input disabled value="{{$incident->DateNaiss}}" class="form-control border-danger border-2" id="ex3" name="DateNaiss" type="date" placeholder="Nombre des postes isolés (coupures pr)">
  </div>
  <div class="col-xs-2 w-50 d-inline-block p-1">
    <label class="text-danger" for="ex1">Date d’embauche</label>
    <input disabled value="{{$incident->DateEmb}}" class="form-control border-danger border-2" id="ex1" name="DateEmb" type="date" placeholder="Nombre des troncons isolés (coupures pr)">
  </div>
  <div class="col-xs-2 w-50 d-inline-block p-1 w-100">
    <p class="text-danger">La date de naissance doit etre inférieure a la date d`embauche</p>
  </div>
 @else
   <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Date de naissance</label>
    <input disabled value="{{$incident->DateNaiss}}" class="form-control border-primary border-2" id="ex3" name="DateNaiss" type="date" placeholder="Nombre des postes isolés (coupures pr)">
  </div>
  <div class="col-xs-2 w-50 d-inline-block p-1">
    <label for="ex1">Date d’embauche</label>
    <input disabled value="{{$incident->DateEmb}}" class="form-control border-primary border-2" id="ex1" name="DateEmb" type="date" placeholder="Nombre des troncons isolés (coupures pr)">
  </div>
 @endif
  

  <div class="col-xs-4 w-50 d-inline-block p-1">
    <label for="ex3">Matricule</label>
    <input disabled value="{{$incident->Matricule}}" class="form-control border-primary border-2" id="ex3" name="Matricule" type="string" placeholder="Matricule de la Victime">
  </div>
  <div class="col-xs-2 w-50 d-inline-block p-1">
    <label for="ex1">Fonction</label>
    <input disabled value="{{$incident->Fonction}}" class="form-control border-primary border-2" id="ex1" name="Fonction" type="string" placeholder="Saisir la fonction">
  </div>

</br>

<nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Témoignages</span>
    </div>
  </nav>

</br>

  <div class="col-xs-3 w-100 d-inline-block p-1">
    <label for="ex3">Témoignages </label>
    <textarea disabled value="{{$incident->Temoignages}}" class="form-control border-primary border-2" id="ex3" name="Temoignages" type="text" placeholder="Témoignages de la victime / Témoignages des témoins">{{$incident->Temoignages}}</textarea>
  </div>


</br>

<nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Renseignements sur les faits</span>
    </div>
  </nav>

</br>

  <div class="col-xs-3 w-100 d-inline-block p-1">
    <label for="ex3">Description du l’incident</label>
    <textarea disabled value="{{$incident->DescInci}}" class="form-control border-primary border-2" id="ex3" name="DescInci" type="text" placeholder="Description du l’incident">{{$incident->DescInci}}</textarea>
  </div>
  <div class="col-xs-4 w-100 d-inline-block p-1">
    <label for="ex3">Risques :</label>
    <textarea disabled value="{{$incident->Risques}}" class="form-control border-primary border-2" id="ex3" name="Risques" type="text" placeholder="Saisir les Risques">{{$incident->Risques}}</textarea>
  </div>
  <div class="col-xs-4 w-100 d-inline-block p-1">
    <label for="ex3">Chronologie du fait accidentel</label>
    <textarea disabled value="{{$incident->Chronologie}}" class="form-control border-primary border-2" id="ex3" name="Chronologie" type="text" placeholder="Chronologie du fait accidentel(*)">{{$incident->Chronologie}}</textarea>
  </div>

</br>
<nav class="navbar navbar-dark py-0 bg-gradient-danger navbar-expand-lg py-md-0 w-100">
  <div class="container-fluid">
      <span class="navbar-brand mb-0 h5">Actions recommendées</span>
    </div>
  </nav>

</br>

  <div class="col-xs-3 w-100 d-inline-block p-1">
    <label for="ex3">Actions recommendées</label>
    <textarea disabled value="{{$incident->ActionsRec}}" class="form-control border-primary border-2" id="ex3" name="ActionsRec" type="float" placeholder="Actions recommendées">{{$incident->ActionsRec}}</textarea>
  </div>
</div>
</div>
</div>
</div>

@endsection