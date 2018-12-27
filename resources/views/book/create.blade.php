@extends('layouts.app')

@php
    $title = __('Books');
@endphp
@section('content')

<div class="container">

    @component('components.dialog')
        @slot('message', 'Information Not Found')
        @slot('title', 'Error')
    @endcomponent

    <h1><a href="{{ url('books') }}" class="text-dark">{{ $title }}</a></h1>
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ url('books') }}" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <dl class="row">

                    @component('components.barcode.reader')
                    @endcomponent
                    <dt class="col-md-2">{{ __('ISBN') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="summary__isbn" id="summary__isbn" value="{{ $isbn }}"></dd>
                    <button class="btn btn-primary" type="button" id="callOpenbdApi">{{ __('Acquire')}}</button>
                </dl>
            </div>
            <div class="card-body">
                <dl class="row">
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
                    <dt class="col-md-2">{{ __('Series') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="summary__series" id="summary__series" value=""></dd>
                    <dt class="col-md-2">{{ __('Volume') }}</dt>
                    <dd class="col-md-10"><input type="text" class="form-control" name="summary__volume" id="summary__volume" value=""></dd>
                </dl>
            </div>
            <div class="card-footer text-muted">
                {{ csrf_field() }}
                <button class="btn btn-success" type="submit">{{ __('Create')}}</button>
            </div>
        </div>
    </form>
</div>
@endsection
