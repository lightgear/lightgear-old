@extends('layouts.default')

@section('main')

{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
    <ul>
        <li>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}
        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'pure-button pure-button-primary')) }}
            {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'pure-button')) }}
        </li>
    </ul>
{{ Form::close() }}

@stop
