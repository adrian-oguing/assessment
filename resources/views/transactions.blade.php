@extends('layouts.template1')

@section('content')
    <div class="container">
        <div class="card">
            {{ $message ?? '' }}
            <div class="card-header">
                <h1>Transactions</h1>
            </div>
            <div class="card-body">
                <h2><div>Total Sales: P{{$total_sales}}</div></h2>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product ID</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($transactions as $transactions)
                            <tr>
                                <th scope="row">{{$transactions->id}}</th>
                                <td>{{$transactions->product_id}}</td>
                                <td>{{$transactions->amount}}</td>
                                <td>{{$transactions->quantity}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@stop