@extends('layouts.default')

@section('main')

<p>{{ link_to_route('tags.create', 'Add new tag') }}</p>

@if ($tags->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ link_to_route('tags.show', $tag->name, array($tag->slug)) }}</td>
                    <td>{{ link_to_route('tags.edit', 'Edit', array($tag->slug), array('class' => 'pure-button pure-button-primary')) }}
                    </td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->slug))) }}
                        {{ Form::submit('Delete', array('class' => 'pure-button')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no tags
@endif

@stop
