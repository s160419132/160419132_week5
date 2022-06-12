@extends('layout.conquer2')
@section('title')
  Tambah Category
@endsection
@section('content')
<div class="container">
  <h2>Tambah Category</h2>
  <form method="POST" action="{{url('categories/'.$data->id)}}">
  @csrf
  @method("PUT")
    <div class="form-group">
      <label for="name">Nama Category:</label>
      <input type="text" class="form-control" id="name" placeholder="Tambah Nama" name="name" value="{{$data->name}}">
    </div>
    <div class="form-group">
      <label for="description">Deskripsi:</label>
      <input type="text" class="form-control" id="description" placeholder="Deskripsi" name="description"  value="{{$data->description}}">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@endsection
