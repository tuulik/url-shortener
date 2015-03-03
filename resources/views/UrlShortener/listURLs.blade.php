@extends('master')

@section('content')

    <h1>All Shortened URLs</h1>

    @foreach($urls as $url)
        <li>{{$url->url}} {{$url->code}}</li>
    @endforeach

@endsection