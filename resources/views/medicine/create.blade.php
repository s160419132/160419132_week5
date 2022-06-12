@extends('layout.conquer2')
@section('title')
  Add Medicine
@endsection
@section('content')
<div class="container">
  <h2>Add Medicine</h2>
  <form method="POST" action="{{route('medicines.store')}}">
  @csrf
    <div class="form-group">
      <label for="name">Medicines Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Tambah Nama" name="name">
    </div>
    <div class="form-group">
      <label for="description">form:</label>
      <input type="text" class="form-control" id="description" placeholder="form" name="description">
    </div>
    <div class="form-group">
      <label for="description">restricio:</label>
      <input type="text" class="form-control" id="description" placeholder="restricio" name="description">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <input type="text" class="form-control" id="description" placeholder="description" name="description">
    </div>
    <div class="form-group">
      <label for="description">price:</label>
      <input type="text" class="form-control" id="description" placeholder="price" name="description">
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
@endsection