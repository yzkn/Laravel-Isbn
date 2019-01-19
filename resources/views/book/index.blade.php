@extends('layouts.app')

@php
    $title = __('Books');
@endphp
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="table-responsive">
        <div id="books">
            <input class="search" placeholder="Search" />
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('Cover') }}</th>
                        <th class="sort" data-sort="title">{{ __('Title') }}</th>
                        <th class="sort" data-sort="pubdate">{{ __('Pubdate') }}</th>
                        <th class="sort" data-sort="author">{{ __('Author') }}</th>
                        <th class="sort" data-sort="publisher">{{ __('Publisher') }}</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><a href="{{ url('books/create') }}" class="btn btn-info">{{ __('Create') }}</a></th>
                    </tr>
                </thead>
                <tbody class="list">
                    @foreach ($books as $book)
                        <tr>
                            <td>
                                @if ($isOnline && !empty($book->summary__cover) && exif_imagetype($book->summary__cover))
                                    <a href="{{ url('books/'.$book->id) }}">
                                        <img src="{{ $book->summary__cover }}" class="img-thumbnail summary__cover" />
                                    </a>
                                @endif
                            </td>
                            <td class="title">{{ $book->summary__title }}</td>
                            <td class="pubdate">{{ $book->summary__pubdate }}</td>
                            <td class="author">{{ $book->summary__author }}</td>
                            <td class="publisher">{{ $book->summary__publisher }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
