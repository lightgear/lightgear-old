@extends('layouts.default')

@section('main')

    <p>
    Confirm deletion of the page (i18n)?
    </p>

    {{ Form::open(array('method' => 'DELETE', 'route' => array('pages.destroy', $page->slug))) }}
        {{ Form::submit('Delete', array('class' => 'pure-button pure-button-primary')) }}
        {{ link_to_route('pages.index', 'Cancel', array(), array('class' => 'pure-button')) }}
    {{ Form::close() }}
@stop
