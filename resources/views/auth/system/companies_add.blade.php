@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{ __('auth.add_new_company') }}</h1>

        <div class="card mb-4">
            <div class="card-header"><i class="fa fa-circle-o mr-1"></i>{{ __('auth.company_data') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('companies_update') }}">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.company_name') }}</label>
                        <div class="col-sm-9">
                            <input name="name" type="text"
                                   class="form-control{!! $errors->first('name') ? ' is-invalid' : '' !!}"
                                   value="{{ old('name') ?? '' }}">
                        </div>
                    </div>

                    <a href="{{ route('companies') }}"
                       class="btn btn-outline-danger">{{ __('auth.cancel_operation') }}</a>
                    <button type="submit"
                            class="btn btn-success">{{ __('auth.add') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
