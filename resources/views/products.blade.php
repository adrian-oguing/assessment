@extends('layouts.template1')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Products</h1>
            </div>
            <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->stocks}}</td>
                                <td>{{$product->price}}</td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sellModal" onclick="test({{$product->id}})">
                                    Sell
                                  </button>
                                  
                                    <a href="/product/{{$product->id}}" type="button" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="sellModal" tabindex="-1" role="dialog" aria-labelledby="sellModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="sellModalLabel">Sell Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="/product/submit/sell" method="post" class="form">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="product_id">Product Id</label> --}}
                        <input type="text" class="form-control" id="product_id" placeholder="product id" name="product_id" hidden>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>

      <script>
        $('#sellModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        });
        function test(test)
        {
            console.log(test);
            $('#product_id').val(test);
        }          
      </script>
@stop