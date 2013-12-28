@extends('layouts.default')

@section('main')

{{ Form::open(array('route' => 'pages.store')) }}
    <ul>
        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>
        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body') }}
        </li>
        <li>
            {{ Form::submit('Submit', array('class' => 'pure-button pure-button-primary')) }}
        </li>
    </ul>
{{ Form::close() }}

@stop


