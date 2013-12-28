@extends('layouts.default')

@section('main')

    <p>
    {{ $tag->name }}
    </p>
    {{ link_to_route('tags.edit', 'Edit', array($tag->slug), array('class' => 'pure-button pure-button-primary')) }}
    {{ link_to_route('tags.delete', 'Delete', array($tag->slug), array('class' => 'pure-button')) }}

    <!--{{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->slug))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}-->

    <p>{{ link_to_route('tags.index', 'View all tags') }}</p>
@stop
