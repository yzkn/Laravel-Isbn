@extends('layouts.app')

@php
    $title = __('Books');
@endphp
@section('content')
<div class="container">
    <h1><a href="{{ url('books/') }}" class="text-dark">{{ $title }}</a></h1>
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ url('books/'.$book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$book->id}}">
        <div class="card">
            <div class="card-header">
                {{ $book->summary__title }}
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-md-2">{{ __('ISBN') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="summary__isbn" id="summary__isbn" value="{{ $book->summary__isbn }}"></dd>
                    <dt class="col-md-2">{{ __('Cover') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="summary__cover" id="summary__cover" value="{{ $book->summary__cover }}"></dd>
                    <dt class="col-md-2">{{ __('Title') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="summary__title" id="summary__title" value="{{ $book->summary__title }}"></dd>
                    <dt class="col-md-2">{{ __('Author') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="summary__author" id="summary__author" value="{{ $book->summary__author }}"></dd>
                    <dt class="col-md-2">{{ __('Publisher') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="summary__publisher" id="summary__publisher" value="{{ $book->summary__publisher }}"></dd>
                    <dt class="col-md-2">{{ __('Pubdate') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="summary__pubdate" id="summary__pubdate" value="{{ $book->summary__pubdate }}"></dd>
                </dl>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-success" type="submit">{{ __('Edit')}}</button>
            </div>
        </div>
    </form>
</div>
@endsection
