@extends('master')

@section('content')

    <h1>Shorten url</h1>

    {!! Form::open(['route' => 'urls.store']) !!}

        {!! Form::label('link', 'URL:') !!}
        {!! Form::text('link', null) !!}
        {!! Form::submit('Shorten url') !!}

    {!! Form::close() !!}

    @foreach ($urls as $url)
        <li>{{$url->url}} {{$url->code}}</li>
    @endforeach

@stop