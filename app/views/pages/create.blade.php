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
            {{ Form::label('tags', 'Tags:') }}
            {{ Form::select('tags[]', $tags, null, array('multiple' => 'multiple')) }}
        </li>
        <li>
            {{ Form::label('published', 'Published:') }}
            {{ Form::checkbox('published') }}
        </li>
        <li>
            {{ Form::submit('Submit', array('class' => 'pure-button pure-button-primary')) }}
            {{ link_to_route('pages.index', 'Cancel', array(), array('class' => 'pure-button')) }}
        </li>
    </ul>
{{ Form::close() }}

@stop


