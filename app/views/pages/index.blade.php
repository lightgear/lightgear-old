@extends('layouts.default')

@section('main')

<p>{{ link_to_route('pages.create', 'Add new page') }}</p>

@if ($pages->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{ link_to_route('pages.show', $page->slug, array($page->slug)) }}</td>
                    <td>{{ link_to_route('pages.edit', 'Edit', array($page->slug), array('class' => 'pure-button pure-button-primary')) }}
                    </td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('pages.destroy', $page->slug))) }}
                        {{ Form::submit('Delete', array('class' => 'pure-button')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no pages
@endif

@stop
