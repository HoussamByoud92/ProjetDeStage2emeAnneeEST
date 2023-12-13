@extends('rapports.layout')

@section('content')

</br>

<div class="row">
    <div class="col align-self-start">
      <a class="btn btn-primary" href="{{route('rapports.create')}}" role="button">Ajouter un nouveau rapport</a>
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
  <h6 class="m-0 font-weight-bold text-light">Les rapports les plus récents</h6>
</div>

<div class="d-flex justify-content-center m-4 column">
  <table class="table table-stripped table-info table-borderless">
    <thead class="table bg-gradient-dark table-borderless text-light">
      <tr>
        <th width='33%'>Identifiant</th>
        <th width='33%'>Date</th>
        <th width='33%'>Actions</th>
      </tr>
      </thead>
      <tbody class="table-group-divider bg-gradient-dark text-light">
      @foreach ($rapports as $item)
        <tr class=" table text-light" >
          <td>{{$item->id}}</td>
          <td>{{$item->Date}}</td>
          <td class="d-flex x-2">
          

            
            <a class="btn btn-info  bg-gradient-info mr-2" href='{{route('rapports.show',$item->id)}}'><i class="fas fa-info-circle"></i></a>
            <a class="btn btn-warning bg-gradient-warning mr-2" href='{{route('rapports.edit',$item->id)}}'>  <i class="fas fa-fw fa-wrench"></i>  </a>          
            <form onsubmit="return confirmDelete()" class="mr-2" action='{{route('rapports.destroy',$item->id)}}' method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger bg-gradient-danger"><i class="fas fa-trash"></i></button>
          </form>
          <script>
          function confirmDelete() {
            return confirm('Voulez-vous vraiment supprimer ce rapport ?');
          }
          </script>
          </td>
          
        </tr>  
      @endforeach


      </tbody>
  </table>

  

 



</div> 
{!!$rapports->links('pagination::bootstrap-5')!!}
</div>

@endsection