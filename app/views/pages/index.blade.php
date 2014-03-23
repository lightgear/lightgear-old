@extends('layouts.default')

@section('main')

<!-- <p>{{ link_to_route('pages.create', 'Add new page') }}</p> -->

@if ($pages->count())
    <section>
        @foreach ($pages as $page)
            <article>
                {{ link_to_route('pages.show', $page->title, array($page->slug)) }}

                @if (logged_in())
                    {{ link_to_route('pages.edit', 'Edit', array($page->slug), array('class' => 'pure-button pure-button-primary')) }}
                    {{ link_to_route('pages.delete', 'Delete', array($page->slug), array('class' => 'pure-button')) }}
                @endif

            </article>
        @endforeach
    </section>
@else
    There are no pages
@endif

@stop
