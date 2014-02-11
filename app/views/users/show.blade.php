@extends('layouts.default')

@section('main')

    <p>
    {{ $user->username }}
    </p>
    {{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'pure-button pure-button-primary')) }}
    {{ link_to_route('users.delete', 'Delete', array($user->id), array('class' => 'pure-button')) }}

    <!--{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->slug))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
    {{ Form::close() }}-->

    <p>{{ link_to_route('users.index', 'View all users') }}</p>
@stop
