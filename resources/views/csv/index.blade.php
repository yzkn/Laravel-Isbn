{{-- Copyright (c) 2019 YA-androidapp(https://github.com/YA-androidapp) All rights reserved. --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @can('allow_system')
                    <a class="btn btn-danger" href="{{ url('/csv/import') }}">Import</a>
                    <a class="btn btn-warning" href="{{ url('/csv/export') }}">Export</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
