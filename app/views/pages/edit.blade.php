@extends('layouts.default')

@section('main')

{{ Form::model($page, array('method' => 'PATCH', 'route' => array('admin.pages.update', $page->slug))) }}
    <ul>
        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>
        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, array('contenteditable' => 'true')) }}
        </li>
        <li>
            {{ Form::label('tags', 'Tags:') }}
            {{ Form::select('tags[]', $tags, $page->tags()->getRelatedIds(), array('multiple' => 'multiple')) }}
        </li>
        <li>
            {{ Form::label('published', 'Published:') }}
            {{ Form::checkbox('published') }}
        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'pure-button pure-button-primary')) }}
            {{ link_to_route('pages.show', 'Cancel', $page->slug, array('class' => 'pure-button')) }}
        </li>
    </ul>
{{ Form::close() }}

@stop
