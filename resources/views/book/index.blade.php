@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($books as $book)
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $book->summary__isbn }}</h4>
                <h6 class="card-subtitle text-muted">{{ $book->updated_at }}</h6>
                <p class="card-text">{{ $book->summary__title }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
