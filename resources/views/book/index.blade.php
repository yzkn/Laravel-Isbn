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
                    <th>{{ __('ISBN') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Series') }}</th>
                    <th>{{ __('Sub') }}</th>
                    <th>{{ __('Volume') }}</th>
                    <th>{{ __('Publisher') }}</th>
                    <th>{{ __('Pubdate') }}</th>
                    <th>{{ __('Author') }}</th>
                    <th>{{ __('CreatedAt') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td><a href="{{ url('books/'.$book->id) }}">{{ $book->summary__isbn }}</a></td>
                        <td>{{ $book->summary__title }}</td>
                        <td>{{ $book->summary__series }}</td>
                        <td>{{ str_replace($book->summary__series, '', $book->onix__DescriptiveDetail__TitleDetail__TitleText) }}</td>
                        <td>{{ $book->summary__volume }}</td>
                        <td>{{ $book->summary__publisher }}</td>
                        <td>{{ $book->summary__pubdate }}</td>
                        <td>{{ $book->summary__author }}</td>
                        <td>{{ $book->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
