@extends('layout.conquer2')
@section('title')
  Daftar medicine
@endsection
@section('content')
<div class="container">
  <h2>List Medicines by category</h2>
  <p>ID Category: {{$id_category}} with name: {{$namecategory}}</p>
  <hr/>
  <p>Total rows: {{$getTotaldata}}</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Form</th>
        <th>Restricio_Formula</th>
        <th>Description</th>
        <th>Price</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach($result as $li)
      <tr>
        <td>{{$li->generic_name}}</td>
        <td>{{$li->form}}</td>
        <td>{{$li->restriction_formula}}</td>
        <td>{{$li->description}}</td>
        <td>{{$li->price}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection