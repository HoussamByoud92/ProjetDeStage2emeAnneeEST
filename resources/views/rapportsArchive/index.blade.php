@extends('rapportsArchive.layout')

@section('content')

</br>

<div class="row">
    <div class="col align-self-start">
      <a class="btn btn-primary" href="{{route('rapportsArchive.create')}}" role="button">Archiver un rapport</a>
    </div>
</div>
</br>

  @if ($message = Session::get('success'))
  <div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    {{$message}}
  </div>
</div>
@endif

<!--oooooooooooooooooo-->
<div class="card shadow mb-4 bg-gradient-light border-bootom-success">

<div class="card-header py-3 bg-gradient-success">
  <h6 class="m-0 font-weight-bold text-light">Les archives les plus récents</h6>
</div>

<div class="d-flex justify-content-center m-4 ">
  <table class="table table-stripped table-info table-borderless">
    <thead class="table bg-gradient-dark table-borderless text-light">
      <tr>
        <th width='33%'>Date d`archivage</th>
        <th width='33%'>Rapport Archivé</th>
        
        <th width='33%'>Actions</th>
      </tr>
      </thead>
      <tbody class="table-group-divider bg-gradient-dark text-light">
      @foreach ($rapportsArchive as $item)
        <tr class=" table text-light" >
          <td>{{$item->DateArchivage}}</td>
          <td><a class="text-white" href='{{route('rapportsArchive.show',$item->id)}}'>{{$item->RappArch}}</a></td>
          
          <td class="d-flex x-2">
          

            
            <a class="btn btn-info  bg-gradient-info mr-2" href='{{route('rapportsArchive.show',$item->id)}}'><i class="fas fa-info-circle"></i></a>
                     
            <form onsubmit="return confirmDelete()" class="mr-2" action='{{route('rapportsArchive.destroy',$item->id)}}' method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger bg-gradient-danger"><i class="fas fa-trash"></i></button>
          </form>
          <script>
          function confirmDelete() {
            return confirm('Voulez-vous vraiment supprimer ce rapport archivé ?');
          }
          </script>
          </td>
          
        </tr>  
      @endforeach


      </tbody>
  </table>

  {!!$rapportsArchive->links()!!}
</div>
</div>

@endsection