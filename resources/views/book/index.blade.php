@extends('layouts.app')

@php
    $title = __('Books');
@endphp
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('Cover') }}</th>
                    <th>{{ __('ISBN') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Author') }}</th>
                    <th>{{ __('Publisher') }}</th>
                    <th>{{ __('Pubdate') }}</th>
                    <th>{{ __('CreatedAt') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>
                            @if (!empty($book->summary__cover) && fsockopen(parse_url($book->summary__cover, PHP_URL_HOST), 80, $errno, $errstr, 10) && exif_imagetype($book->summary__cover))
                                <a href="{{ url('books/'.$book->id) }}">
                                    <img src="{{ $book->summary__cover }}" class="img-thumbnail summary__cover" />
                                </a>
                            @endif
                        </td>
                        <td><a href="{{ url('books/'.$book->id) }}">{{ $book->summary__isbn }}</a></td>
                        <td>{{ $book->summary__title }}</td>
                        <td>{{ $book->summary__author }}</td>
                        <td>{{ $book->summary__publisher }}</td>
                        <td>{{ $book->summary__pubdate }}</td>
                        <td>{{ $book->created_at }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="{{ url('books/create') }}" class="btn btn-info">{{ __('Create') }}</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
