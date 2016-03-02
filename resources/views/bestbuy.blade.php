@extends('layout')


@section('content')
@foreach($productList as $product)
        <div>
            <h3>
                {{$product->name}}
            </h3>
            <p>
                Condition: {{$product->condition}}
            </p>
            <p>
                Average rating: {{$product->customerReviewAverage}}
            </p>
            Features:
            <ul>
                @foreach($product->features as $feature)
                <li>
                    {{$feature->feature}}
                </li>
                @endforeach
            </ul>
            <p>
                <img style="max-width: 350px; max-height: 350px;" src="{{$product->image}}">
            </p>
        </div>
    <hr>
 @endforeach
@endsection

@section('title')
    Best Buy Search
@endsection

@section('meta')
    <meta name="name" content="content">
@endsection