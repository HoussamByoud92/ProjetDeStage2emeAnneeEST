@extends('incidentsArchive.layout')

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
      <a class="btn btn-primary" href="{{route('incidentsArchive.index')}}" role="button">Retour</a>
    </div>
</div>

</br>

<div class="card shadow mb-4 bg-gradient-light border-bottom-success">

<div class="card-header py-3 bg-gradient-success">
  <h6 class="m-0 font-weight-bold text-light">Archive de l'incident</h6>
</div>
<div class="d-flex justify-content-center m-2">
<div class="container form-group row">
    @csrf

  <div class="col-xs-2 w-100 d-inline-block p-2">
    <label for="DateArchivage">Date d`archivage</label>
    <input disabled value="{{$incidentsArchive->DateArchivage}}" class="form-control border-primary border-2 border-primary" id="DateArchivage" name="DateArchivage" type="date" placeholder="Date d`archivage">
    <label class="mt-4" for="AcciArch">Fichier PDF du rapport archivé</label>
  </div>

</br>

  <div class="col-xs-3 w-100 d-inline-block p-1">

    <embed src="{{asset('pdf/'.$incidentsArchive->InciArch)}}" width="1080" height="800">
    
   
      
  </div>
  

</br>



</div>
</div>
</div>
</div>

@endsection