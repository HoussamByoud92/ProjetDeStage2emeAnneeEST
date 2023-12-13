@extends('accidents.layout')

@section('content')

</br>

<div class="row">
    <div class="col align-self-start">
      <a class="btn btn-primary" href="{{route('accidents.create')}}" role="button">Ajouter un nouveau accident</a>
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
  <h6 class="m-0 font-weight-bold text-light">Les accidents les plus récents</h6>
</div>

<div class="d-flex justify-content-center m-4 ">
  <table class="table table-stripped table-info table-borderless">
    <thead class="table bg-gradient-dark table-borderless text-light">
      <tr>
        <th width='33%'>Date</th>
        <th width='33%'>Rédigé Par</th>
        <th width='33%'>Actions</th>
      </tr>
      </thead>
      <tbody class="table-group-divider bg-gradient-dark text-light">
      @foreach ($accidents as $item)
        <tr class=" table text-light" >
          <td>{{$item->Date}}</td>
          <td>{{$item->Redigeant}}</td>
          <td class="d-flex x-2">
          

            
            <a class="btn btn-info bg-gradient-info mr-2" href='{{route('accidents.show',$item->id)}}'><i class="fas fa-info-circle"></i></a>
            <a class="btn btn-warning bg-gradient-warning mr-2" href='{{route('accidents.edit',$item->id)}}'>  <i class="fas fa-fw fa-wrench"></i>  </a>          
            <form onsubmit="return confirmDelete()" class="mr-2" action='{{route('accidents.destroy',$item->id)}}' method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger bg-gradient-dander"><i class="fas fa-trash"></i></button>
          </form>
          <script>
          function confirmDelete() {
            return confirm('Voulez-vous supprimer cet accident ?');
          }
          </script>
          </td>
          
        </tr>  
      @endforeach


      </tbody>
  </table>

  {!!$accidents->links()!!}
</div>
</div>

@endsection