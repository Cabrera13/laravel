@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <article>
            <div>
                <img src="{{$book[request()->route('id')]->image}}"/>
                <h4>
                    {{$book[request()->route('id')]->name}}
                </h4>

                <span>
                    {{$book[request()->route('id')]->author}}
                </span>
                <br>     
                <span>
                     {{$book[request()->route('id')]->type}}
                </span>
                <span>
                     {{$book[request()->route('id')]->price}}
                </span>
                <a href="{{route('add',['id' => request()->route('id')])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
            </div>
        </article>
    </div>
</div>
@endsection

