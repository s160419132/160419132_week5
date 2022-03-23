@extends('layout.conquer2')
@section('title')
  Kategori yang tidak memiliki data medicine
@endsection
@section('content')
<div class="container">
  <h2>Kategori yang tidak memiliki data medicine</h2> 
  <hr/>
  <p>Total Category: {{$totalCategory}}</p>            
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