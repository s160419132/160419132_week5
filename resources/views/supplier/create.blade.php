<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body> -->
@extends('layout.conquer2')
@section('title')
   Create Supplier
@endsection
@section('content') 

<div class="container">

  <form enctype="multipart/form-data" role="form" method="POST" action="{{route('suppliers.store')}}">
      @csrf
    <div class="form-group">
      <label for="name">Nama:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" >
    </div>
    <div class="form-grup">
      <label>Logo</label>
      <input type="file" class= "form-control" id="logo" name='logo'>
    </div>
    <button type="submit" class="btn btn-default">Send</button>
  </form>
</div>
@endsection
