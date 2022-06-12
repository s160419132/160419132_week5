<!DOCTYPE html>
<html lang="en">
<head>
  <title>Show Transaction</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<table class="table" >
 <thead>
    <tr>
        <th>Nama Obat</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Jumlah Beli</th>
    </tr>
 </thead>
 <tbody>
 @foreach($data->medicines as $d)
    <tr>
        <td>{{ $d->generic_name }}</td>
        <td>{{ $d->category->name}}</td>
        <td>{{ $d->pivot->price }}</td>
        <td>{{ $d->pivot->quantity}}</td></tr>
 @endforeach
</table>
</html>