@extends('layouts.default')

@section('main')

{{ Form::model($page, array('method' => 'PATCH', 'route' => array('pages.update', $page->slug))) }}
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
            {{ Form::submit('Update', array('class' => 'pure-button pure-button-primary')) }}
            {{ link_to_route('pages.show', 'Cancel', $page->slug, array('class' => 'pure-button')) }}
        </li>
    </ul>
{{ Form::close() }}

@stop
