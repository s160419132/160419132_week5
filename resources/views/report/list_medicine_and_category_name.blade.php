@extends('layout.conquer2')
@section('title')
list nama medecines, formula dan nama kategori
@endsection
@section('content')
<div class="container">
  <h2>list nama medicines, formula dan nama kategori</h2>
  <p></p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Form</th>
        <th>Category Name</th>  
      </tr>
    </thead>
    <tbody>
        @foreach($data as $li)
      <tr>
        <td>{{$li->generic_name}}</td>
        <td>{{$li->form}}</td>
        <td>{{$li->name}}</td>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
