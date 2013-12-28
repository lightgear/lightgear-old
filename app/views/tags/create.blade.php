@extends('layouts.default')

@section('main')

{{ Form::open(array('route' => 'tags.store')) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name (i18n):') }}
            {{ Form::text('name') }}
        </li>
        <li>
            {{ Form::submit('Submit', array('class' => 'pure-button pure-button-primary')) }}
        </li>
    </ul>
{{ Form::close() }}

@stop


