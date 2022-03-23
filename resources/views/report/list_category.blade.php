@extends('layout.conquer2')
@section('title')
  Daftar medicine
@endsection
@section('content')
<div class="container">
  <h2>List All Category</h2> 
  <hr/>
  <p>Total Category: {{$totalCategory}}</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>    
      </tr>
    </thead>
    <tbody>
        @foreach($data as $li)
      <tr>
        <td>{{$li->id}}</td>
        <td>{{$li->name}}</td>
        <td>{{$li->description}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection