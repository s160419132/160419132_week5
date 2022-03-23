@extends('layout.conquer2')
@section('title')
  Kategori yang memiliki 1 data medicine
@endsection
@section('content')
<div class="container">
  <h2>Kategori yang memiliki 1 data medicine</h2> 
  <hr/>
           
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Category Name</th> 
      </tr>
    </thead>
    <tbody>
        @foreach($data as $li)
      <tr>
        <td>{{$li->name}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection