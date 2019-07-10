{{-- Copyright (c) 2019 YA-androidapp(https://github.com/YA-androidapp) All rights reserved. --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <div class="card-header mt-4">Books</div>

                <div class="card-body">
                    <a class="btn btn-primary btn-block" href="{{ url('/books') }}">List</a>
                </div>

                <div class="card-header mt-4">Series</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <a class="btn btn-secondary btn-block" href="{{ url('/series') }}">Index</a>
                        </div>
                    </div>
                    <form id="search" action="{{ url('/series/search') }}" method="get">
                        <div class="row mt-2">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="summary__series" id="summary__series">
                            </div>
                            <div class="col-sm-2">
                                <input class="btn btn-success btn-block" type="submit" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
                @can('allow_system')
                    <div class="card-header mt-4">CSV</div>
                    <div class="card-body">
                        <a class="btn btn-warning btn-block" href="{{ url('/csv') }}">Import/Export</a>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
