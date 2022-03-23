@extends('layout.conquer2')
@section('title')
  Obat yang paling mahal
@endsection
@section('content')
<div class="container">
  <h2>Obat yang paling mahal</h2> 
  <hr/>
           
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Category Name</th> 
        <th>Category Id</th> 
      </tr>
    </thead>
    <tbody>
        @foreach($data as $li)
      <tr>
        <td>{{$li->generic_name}}</td>
        <td>{{$li->category_id}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection