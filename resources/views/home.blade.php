@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        @foreach($books as $book)
        <article class="col-3 p-2">
            <div class="border">
                <div class="caption">
                <img src="{{$book->image}}" class="img-fluid" alt="Responsive image"/>

                    <h3>{{$book->name}}</h3>
                    <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores error eum inventore officia quis quos totam! Asperiores deleniti, distinctio illum incidunt nulla officiis quas suscipit vitae? Magni necessitatibus repellendus voluptate!</p>
                    <div class="clearfix">
                        <div class="pull-left price">{{$book->price}}$</div>
                        <a href="{{route('book', $book->id)}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</div>
@endsection

