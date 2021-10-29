@extends('layouts.template1')

@section('content')
    <div class="container">
        <div class="card">
            {{ $message ?? '' }}
            <div class="card-header">
                <h1>Edit product</h1>
            </div>
            <div class="card-body">
                <form action="/product/{{$product->id}}" method="post" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}">
                        @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stocks</label>
                        <input type="number" class="form-control" id="stocks" name="stocks" value="{{$product->stocks}}">
                        @if($errors->has('stocks'))
                            <div class="error">{{ $errors->first('stocks') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
                        @if($errors->has('price'))
                            <div class="error">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
@stop