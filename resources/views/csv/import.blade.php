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
                        Select your csv file.<br />
                        <form role="form" method="post" action="/csv/import" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" name="file">
                            <input type="submit" value="Upload">
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
