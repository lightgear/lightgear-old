@extends('layouts.default')

@section('main')

    @if (Auth::check())
        <h1>Welcome "{{ Auth::user()->username }}"</h1>
        <p>{{ link_to_route('logout', 'Logout') }}</p>
    @else

        {{ Form::open(array('route' => 'login')) }}
            <ul>
                <li>
                    {{ Form::label('username', 'Username:') }}
                    {{ Form::text('username') }}
                </li>

                <li>
                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password') }}
                </li>

                <li>
                    {{ Form::submit('Submit', array('class' => 'btn')) }}
                </li>
            </ul>
        {{ Form::close() }}

        @if ($errors->any())
            <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </ul>
        @endif

    @endif

@stop


