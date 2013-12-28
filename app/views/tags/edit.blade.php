@extends('layouts.default')

@section('main')

{{ Form::model($tag, array('method' => 'PATCH', 'route' => array('tags.update', $tag->slug))) }}
    <ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'pure-button pure-button-primary')) }}
            {{ link_to_route('tags.show', 'Cancel', $tag->slug, array('class' => 'pure-button')) }}
        </li>
    </ul>
{{ Form::close() }}

@stop
