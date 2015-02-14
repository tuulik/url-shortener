@extends('master')

@section('content')

    <h1>Shorten url</h1>

    {!! Form::open(['route' => 'urls.store']) !!}

        {!! Form::label('url', 'URL:') !!}
        {!! Form::text('url', null) !!}
        {!! Form::submit('Shorten url') !!}

    {!! Form::close() !!}

    @foreach ($urls as $url)
        <li>{{$url->url}} {{$url->new_url}}</li>
    @endforeach

@stop