@extends('layout.conquer2')
@section('title')
  Daftar medicine
@endsection
@section('content')
  <h2>List Medicines</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
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
        @foreach($queryBuilder as $li)
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
@endsection