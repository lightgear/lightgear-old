@extends('layouts.default')

@section('main')

<p>{{ link_to_route('users.create', 'Add new user') }}</p>

@if ($users->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ link_to_route('users.show', $user->username, array($user->id)) }}</td>
                    <td>{{ link_to_route('users.edit', 'Edit', array($user->slug), array('class' => 'pure-button pure-button-primary')) }}
                    </td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->slug))) }}
                        {{ Form::submit('Delete', array('class' => 'pure-button')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no users
@endif

@stop
