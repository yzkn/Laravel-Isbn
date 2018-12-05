@extends('layouts.app')

@php
    $title = __('Books');
@endphp
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="edit">
        <a href="{{ url('book/'.$book->id.'/edit') }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
        @component('components.btn-del')
            @slot('table', 'books')
            @slot('id', $book->id)
            @slot('title', $book->title)
        @endcomponent
    </div>
    <dl class="row">
        <dt class="col-md-2">{{ __('ISBN') }}</dt>
        <dd class="col-md-10">{{ $book->summary__isbn }}</dd>
        <dt class="col-md-2">{{ __('Title') }}</dt>
        <dd class="col-md-10">{{ $book->summary__title}}</dd>
        <dt class="col-md-2">{{ __('Publisher') }}</dt>
        <dd class="col-md-10">{{ $book->summary__publisher }}</dd>
        <dt class="col-md-2">{{ __('Pubdate') }}</dt>
        <dd class="col-md-10">{{ $book->summary__pubdate }}</dd>
        <dt class="col-md-2">{{ __('Cover') }}</dt>
        <dd class="col-md-10">
        @if (!empty($book->summary__cover) && exif_imagetype($book->summary__cover))
            <a href="{{ $book->summary__cover }}">
                <img src="{{ $book->summary__cover }}" />
            </a>
        @endif
        </dd>
        <dt class="col-md-2">{{ __('Author') }}</dt>
        <dd class="col-md-10">{{ $book->summary__author }}</dd>





    </dl>
    <dl class="row">
        <dt class="col-md-2">{{ __('Created') }}:</dt>
        <dd class="col-md-10">
            <time itemprop="dateCreated" datetime="{{ $book->created_at }}">
                {{ $book->created_at }}
            </time>
        </dd>
        <dt class="col-md-2">{{ __('Updated') }}:</dt>
        <dd class="col-md-10">
            <time itemprop="dateModified" datetime="{{ $book->updated_at }}">
                {{ $book->updated_at }}
            </time>
        </dd>
    </dl>
</div>
@endsection
