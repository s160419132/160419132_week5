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
<body>
<table class="table" >
 <thead>
    <tr>
        <th>ID</th>
        <th>Pembeli</th>
        <th>Kasir</th>
        <th>Tanggal Transaction</th>
        <th>Action </th>
    </tr>
 </thead>
 <tbody>
 @foreach($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>{{ $d->buyer->name }}</td>
        <td>{{ $d->user->name }}</td>
        <td>{{ $d->transaction_date }}</td>
        <td><a class="btn btn-default" href="http://localhost:8000/transaction/index/{{ $d->id }}">Lihat Rincian Pembelian</a></td>
    </tr>
 @endforeach
</table>
</body>


</html>