@extends('layouts.default')

@section('main')

    <p>
    Confirm deletion of the page (i18n)?
    </p>

    {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.pages.destroy', $page->slug))) }}
        {{ Form::submit('Delete', array('class' => 'pure-button pure-button-primary')) }}
        {{ link_to_route('admin.pages.index', 'Cancel', array(), array('class' => 'pure-button')) }}
    {{ Form::close() }}
@stop
