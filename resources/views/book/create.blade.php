<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/bd.js') }}" defer></script>

        <!-- Fonts -->
        <link href="{{ asset('css/nunito.css') }}" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="_app">
            <main class="py-4">
                <div class="container">

                    @component('components.dialog')
                        @slot('message', 'Information Not Found')
                        @slot('title', 'Error')
                    @endcomponent

                    <h1><a href="{{ url('books') }}" class="text-dark">{{ __('Books') }}</a></h1>
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
                                    <dt class="col-md-2">{{ __('Reader') }}</dt>
                                    <dd class="col-md-10">
                                        <select class="form-control" name="reader_id" value="reader_id">
                                            <option value="" selected></option>
                                            @foreach($readers as $k => $v)
                                                <option value="{{ $k }}">{{$v}}</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                            </div>
                            <div class="card-footer text-muted">
                                {{ csrf_field() }}
                                <button class="btn btn-success" type="submit">{{ __('Create')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>
