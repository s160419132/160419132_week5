@extends('layouts.fontend')

@section('content')
<div class="container">
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
                                @foreach($trans as $t)
                                   
                                    <tr>
                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-3 hidden-xs"><img src="{{asset('images/'.$details['photo'])}}" width="100" height="100" 
                                            class="img-responsive"/></div>
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">{{$dp->generic_name}}</h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">Rp. {{$dp->price}}</td>
                                    <td data-th="Quantity">{{$dp->pivot->quantity}}
                                        <input type="number" class="form-control text-center" value="1">Rp.{{$dp->pivot->subtotal}}
                                    </td>
                                    <td class="actions" data-th="">
                                    </td>
                                        
                                    </tr>
                                @endforeach
                         
                        </tbody>
                        <tfoot>
                            <tr class="visible-xs">
                                <td class="text-center"><strong>Total {{$transaction->total}}</strong></td>
                            </tr>
                            <tr>
                                <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                <td colspan="2" class="hidden-xs"></td>
                                <td class ="hidden-xs"><a href="{{url('/checkout')}}" class="btn btn-danger">Checkout<i class="fa fa-angel-right"></i></a></td>
                                <td class="hidden-xs text-center"><strong>Total Rp. {{$transaction->total}}</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
