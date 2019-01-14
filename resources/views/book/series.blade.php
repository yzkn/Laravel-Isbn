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
                    <th>{{ __('Series') }} <br /> {{ __('Publisher') }} <br /> {{ __('Author') }}</th>
                    <th colspan="{{ $colspan }}">{{ __('Volume') }} <br /> {{ __('Pubdate') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books_groupby_series as $ser => $books_in_series)
                    @php
                        $i = 0;
                    @endphp
                    <tr>
                        @foreach ($books_in_series as $vol => $book)
                            @if ($i===0)
                                <th>{{ $ser }} <br /> {{ $book->summary__publisher }} <br /> {{ $book->summary__author }}</th>
                            @endif
                            <td>
                                <a href="{{ url('books/'.$book->id) }}">
                                    <b>
                                        {{ $vol }}
                                    </b>
                                    @if ($isOnline && !empty($book->summary__cover) && exif_imagetype($book->summary__cover))
                                        <img src="{{ $book->summary__cover }}" class="img-thumbnail summary__cover" />
                                    @endif
                                    <br />
                                    {{ $book->summary__pubdate }}
                                </a>
                            </td>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
