@extends('layout.conquer2')
@section('title')
  Daftar category obat
@endsection
@section('content')
  <h2>List Medicines</h2>
  <div>
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
 </div>          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Create at</th>
        <th>Update at</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($datas as $li)
      <tr>
        <td>{{$li->name}}</td>
        <td>{{$li->description}}</td>
        <td>{{$li->created_at}}</td>
        <td>{{$li->update_at}}</td>
        <td>
          <ul>
            @foreach($li->medicines as $lim)
              <li>{{$lim->generic_name}}</li>
            @endforeach
          </ul>
        </td>
        <td><a href="{{route('categories.edit',$li->id)}}"><button>edit</button></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog modal-wide">
     <div class="modal-content" id="showproducts">
       <!--loading animated gif can put here-->
     </div>
  </div>
</div>

@endsection