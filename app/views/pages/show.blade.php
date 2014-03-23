@extends('layouts.default')

@section('main')

    <div contenteditable="true">
    {{ $page->body }}
    </div>

    @if (logged_in())
        {{ link_to_route('pages.edit', 'Edit', array($page->slug), array('class' => 'pure-button pure-button-primary')) }}
        {{ link_to_route('pages.delete', 'Delete', array($page->slug), array('class' => 'pure-button')) }}
    @endif
    <!--{{ Form::open(array('method' => 'DELETE', 'route' => array('pages.destroy', $page->slug))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}-->

    <p>{{ link_to_route('pages.index', 'View all pages') }}</p>
@stop
