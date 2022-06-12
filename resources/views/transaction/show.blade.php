@extends('layouts.fontend')

@section('content')
<div class="portlet">
    <div class="portlet-title">
        <b>Pemesanan dari Transaksi kode: {{$transaction->id}}</b><br>
        <b>Tanggal Pemesanan: {{$transaction->transaction_date}}</b><br>
    </div>
    <div class="portlet-body">
        <div class="row">
        <table id="cart" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total=0?>                            
                                @foreach($ts as $t)
                                   
                                    <tr>
                                        <td data-th="kode">
                                            {{$t->id}}
                                        </td>
                                        <td data-th="Waktu">{{$t->transaction_date}}</td>
                                        <td data-th="Total">Rp. {{$t->total}}</td>
                                        <td class="actions" data-th="">
                                            <a class="btn btn-info btn-sm update-cart" data-id="{{$t->id}}" 
                                                href="{{route('transactions.show',$t->id}}">View</a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                         
                        </tbody>
                    </table>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Riwayat Transaksi</h1>
                    <table id="nota" class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th style="width:50%">Product</th>
                                <th style="width:10%">Price</th>
                                <th style="width:8%">Quantity</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total=0?>                            
                                @foreach($trans as $dp)
                                  
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">

                                            </div>
                                        </td>
                                        <td data-th="kode">
                                            {{$dp->id}}
                                        </td>
                                        <td data-th="Waktu">{{$dp->transaction_date}}</td>
                                        <td data-th="Total">Rp. {{$dp->total}}</td>
                                        <td class="actions" data-th="">
                                            <a class="btn btn-info btn-sm update-cart" data-id="{{$dp->id}}" 
                                                href="{{route('transactions.show',$t->id}}">View</a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
