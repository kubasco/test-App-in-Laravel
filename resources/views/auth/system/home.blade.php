@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{ __('auth.start') }}</h1>
        <ol class="breadcrumb mb-4">
            {{--            <li class="breadcrumb-item active">Dashboard</li>--}}
        </ol>
        <div class="row">
            <div class="col-xl-4 col-md-12">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">{{ __('auth.users') }} : {{ $users }}</div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">{{ __('auth.companies') }} : {{ $companies }}</div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">{{ __('auth.positions') }} : {{ $positions }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
