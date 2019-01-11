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
                    <th>{{ __('Title') }} <br /> {{ __('Pubdate') }}</th>
                    <th>{{ __('Publisher') }} <br /> {{ __('Author') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="{{ url('books/create') }}" class="btn btn-info">{{ __('Create') }}</a></td>
                </tr>
                @foreach ($books as $book)
                    <tr>
                        <td>
                            @if ($isOnline && !empty($book->summary__cover) && exif_imagetype($book->summary__cover))
                                <a href="{{ url('books/'.$book->id) }}">
                                    <img src="{{ $book->summary__cover }}" class="img-thumbnail summary__cover" />
                                </a>
                            @endif
                        </td>
                        <td><a href="{{ url('books/'.$book->id) }}">{{ $book->summary__title }}</a> <br /> {{ $book->summary__pubdate }}</td>
                        <td>{{ $book->summary__publisher }} <br /> {{ $book->summary__author }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
