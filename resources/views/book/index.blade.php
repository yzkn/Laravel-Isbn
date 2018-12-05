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
                    <th>{{ __('onix__DescriptiveDetail__Collection__TitleDetail') }}</th>
                    <th>{{ __('No') }}</th>
                    <th>{{ __('CreatedAt') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td><a href="{{ url('books/'.$book->id) }}">{{ $book->onix__RecordReference }}</a></td>
                        <td>{{ $book->onix__DescriptiveDetail__TitleDetail__TitleText }}</td>
                        <td>{{ $book->onix__DescriptiveDetail__Collection__TitleDetail }}</td>
                        <td>{{ str_replace($book->onix__DescriptiveDetail__TitleDetail__TitleText, '', $book->onix__DescriptiveDetail__TitleDetail__TitleText) }}</td>
                        <td>{{ $book->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
