@extends('layouts.app')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="column">
            <div class="col-3 p-2">
                <ul class="list-group">
                    @foreach($books as $book)
                            <li class="list-group-item">

                                <span class="badge">{{ $book->quantity }}</span>
                                <strong>{{ $book->name }}</strong>
                                <span class="label label-success">{{ $book->price }}</span>
                                <span><a href="{{ route('reduce', $book->id) }}">Reduce by One</a></span>
                                <span><a href="{{ route('remove', $book->id) }}">Reduce All</a></span>
                            </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <strong>Total: {{ $totalPrice }}$</strong>          
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a href="{{ route('completed')  }}" type="button" class="btn btn-success">Checkout</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart!</h2>
            </div>
        </div>
    @endif
@endsection