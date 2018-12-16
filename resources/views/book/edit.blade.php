@extends('layouts.app')

@php
    $title = __('Books');
@endphp
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ url('books/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <dl class="row">
            <dt class="col-md-2">{{ __('ISBN') }}</dt>
            <dd class="col-md-10"><input type="text" class="form-control" name="summary__isbn" id="summary__isbn" value=""></dd>
            <dt class="col-md-2">{{ __('Cover') }}</dt>
            <dd class="col-md-10"><input type="text" class="form-control" name="summary__cover" id="summary__cover" value=""></dd>
            <dt class="col-md-2">{{ __('Title') }}</dt>
            <dd class="col-md-10"><input type="text" class="form-control" name="summary__title" id="summary__title" value=""></dd>
            <dt class="col-md-2">{{ __('Author') }}</dt>
            <dd class="col-md-10"><input type="text" class="form-control" name="summary__author" id="summary__author" value=""></dd>
            <dt class="col-md-2">{{ __('Publisher') }}</dt>
            <dd class="col-md-10"><input type="text" class="form-control" name="summary__publisher" id="summary__publisher" value=""></dd>
            <dt class="col-md-2">{{ __('Pubdate') }}</dt>
            <dd class="col-md-10"><input type="text" class="form-control" name="summary__pubdate" id="summary__pubdate" value=""></dd>
        </dl>
        <button class="btn btn-success" type="submit">{{} __('Create')}</button>
    </form>
</div>
@endsection
