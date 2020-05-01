@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{ __('auth.companies') }}</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('companies_add') }}"
               class="btn btn-primary m-1">{{ __('auth.add_new_company') }}</a>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fa fa-circle-o mr-1"></i>{{ __('auth.companies') }}</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('auth.id') }}</th>
                            <th>{{ __('auth.name') }}</th>
                            <th>{{ __('auth.action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ __('auth.id') }}</th>
                            <th>{{ __('auth.name') }}</th>
                            <th style="min-width: 130px;">{{ __('auth.action') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($companies as $company)
                                <tr class="item_row fadeIn">
                                    <td>{{ $company->id }}</td>
                                    <td>{{ $company->name }}</td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm"
                                           href="{{ route('companies_edit',$company->id) }}"
                                        >{{ __('auth.edit') }}</a>
                                        <a class="btn btn-outline-danger btn-sm"
                                           href="{{ route('companies_delete',$company->id) }}"
                                           onclick="return confirm('{{ __('auth.delete_confirm') }}')"
                                        >{{ __('auth.delete') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
