@extends('master')

@section('content')

    <h1>Shorten Link</h1>

    {!! Form::open(['route' => 'shorten']) !!}

        {!! Form::label('link', 'URL:') !!}
        {!! Form::text('link', null) !!}
        {!! Form::submit('Shorten url') !!}

    {!! Form::close() !!}

@stop