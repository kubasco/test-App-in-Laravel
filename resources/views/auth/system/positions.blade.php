@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{ __('auth.positions') }}</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('positions_add') }}"
               class="btn btn-primary m-1">{{ __('auth.add_new_position') }}</a>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fa fa-circle-o mr-1"></i>{{ __('auth.positions') }}</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('auth.id') }}</th>
                            <th>{{ __('auth.company') }}</th>
                            <th>{{ __('auth.reference') }}</th>
                            <th>{{ __('auth.title') }}</th>
                            <th>{{ __('auth.description') }}</th>
                            <th>{{ __('auth.email') }}</th>
                            <th>{{ __('auth.action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ __('auth.id') }}</th>
                            <th>{{ __('auth.company') }}</th>
                            <th>{{ __('auth.reference') }}</th>
                            <th>{{ __('auth.title') }}</th>
                            <th>{{ __('auth.description') }}</th>
                            <th>{{ __('auth.email') }}</th>
                            <th style="min-width: 130px;">{{ __('auth.action') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($positions as $position)
                            <tr class="item_row fadeIn">
                                <td>{{ $position->id }}</td>
                                <td>{{ $position->company->name }}</td>
                                <td>{{ $position->reference }}</td>
                                <td>{{ $position->title }}</td>
                                <td>{{ $position->description }}</td>
                                <td>{{ $position->email }}</td>
                                <td>
                                    <a class="btn btn-outline-info btn-sm" href="{{ route('positions_edit',$position->id) }}">{{ __('auth.edit') }}</a>
                                    <a class="btn btn-outline-danger btn-sm" href="{{ route('positions_delete',$position->id) }}">{{ __('auth.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $positions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
