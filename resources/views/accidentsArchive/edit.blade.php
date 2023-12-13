@extends('accidentsArchive.layout')

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
      <a class="btn btn-primary" href="{{route('accidentsArchive.index')}}" role="button">Retour</a>
    </div>
</div>

</br>

<div class="card shadow mb-4 bg-gradient-light border-bottom-success">

<div class="card-header py-3 bg-gradient-success">
  <h6 class="m-0 font-weight-bold text-light">Archiver un accident</h6>
</div>
<div class="d-flex justify-content-center m-2">
<form action="{{route('accidentsArchive.edit' , $accidentsArchive->id)}}" enctype="multipart/form-data" method="post" class="container form-group row">
    @csrf
    @method('PUT')
  <div class="col-xs-2 w-100 d-inline-block p-2">
    <label for="DateArchivage">Date d`archivage</label>
    <input value="{{$accidentsArchive->DateArchivage}}" class="form-control border-primary border-2 border-primary" id="DateArchivage" name="DateArchivage" type="date" placeholder="Date d`archivage">
  </div>

</br>

  <div class="col-xs-3 w-100 d-inline-block p-1">
    <label for="AcciArch">Fichier PDF de l'accident archivé</label>
    <input value="{{$accidentsArchive->AcciArch}}" enctype="multipart/form-data" class="form-control border-primary border-2" type="file" name="AcciArch" id="AcciArch" accept=".pdf">
        @error('AcciArch')
            <div class="text-danger">{{ $message }}</div>
        @enderror
  </div>
  

</br>

<button type="submit" class="btn btn-primary">Enregistrer</button>

</form>
</div>
</div>
</div>

@endsection