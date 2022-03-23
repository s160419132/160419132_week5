@extends('layout.conquer2')
@section('title')
  Daftar category obat
@endsection
@section('content')
  <h2>List Medicines</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        
        
      </tr>
    </thead>
    <tbody>
        @foreach($datas as $li)
      <tr>
        <td>{{$li->name}}</td>
        <td>{{$li->description}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection