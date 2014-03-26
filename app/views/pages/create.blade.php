@extends('layouts.default')

@section('main')

{{ Form::open(array('route' => 'admin.pages.store')) }}
    <div class="pure-g-r">
        <div class="pure-u-2-3">
            <div>
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title') }}
            </div>
            <div>
                {{ Form::label('body', 'Body:') }}
                {{ Form::textarea('body') }}
            </div>
        </div>
        <div class="pure-u-1-3">
            <h2>Options (i18n)</h2>
            <div>
                {{ Form::label('tags', 'Tags:') }}
                {{ Form::select('tags[]', $tags, null, array('multiple' => 'multiple')) }}
            </div>
            <div>
                {{ Form::label('published', 'Published:') }}
                {{ Form::checkbox('published') }}
            </div>
        </div>
        <div class="pure-u-1-1">
            <div>
                {{ Form::submit('Submit', array('class' => 'pure-button pure-button-primary')) }}
                {{ link_to_route('pages.index', 'Cancel', array(), array('class' => 'pure-button')) }}
            </div>
        </div>
    </div>
{{ Form::close() }}

@stop


