@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{ __('auth.edit_user') }}</h1>

        <div class="card mb-4">
            <div class="card-header"><i class="fa fa-circle-o mr-1"></i>{{ __('auth.user_data') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users_update', $user->id) }}">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.name') }}</label>
                        <div class="col-sm-9">
                            <input name="name" type="text"
                                   class="form-control{!! $errors->first('name') ? ' is-invalid' : '' !!}"
                                   value="{{ old('name') ? old('name') : $user->name }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.nip') }}</label>
                        <div class="col-sm-9">
                            <input name="nip" type="text"
                                   class="form-control{!! $errors->first('nip') ? ' is-invalid' : '' !!}"
                                   value="{{ old('nip') ? old('nip') : $user->nip }}">
                        </div>
                    </div>

                    <div class="form-group row" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                        <label class="col-sm-3 form-control-label">{{ __('auth.email') }}</label>
                        <div class="col-sm-9">
                            <input name="email" type="text"
                                   class="form-control{!! $errors->first('email') ? ' is-invalid' : '' !!}"
                                   value="{{ old('email') ? old('email') : $user->email }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.password') }}<br><small>({{ __('auth.password_edit_tip') }})</small></label>
                        <div class="col-sm-9">
                            <input name="password" type="password"
                                   class="form-control{!! $errors->first('password') ? ' is-invalid' : '' !!}"
                                   value="{{ old('password') ? old('password') : null }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.phone') }}</label>
                        <div class="col-sm-9">
                            <input name="phone" type="text"
                                   class="form-control{!! $errors->first('phone') ? ' is-invalid' : '' !!}"
                                   value="{{ old('phone') ? old('phone') : $user->phone }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.address') }}</label>
                        <div class="col-sm-9">
                                    <textarea rows="6"
                                              name="address"
                                              class="form-control{!! $errors->first('address') ? ' is-invalid' : '' !!}">{{ old('address') ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.zip_code') }}</label>
                        <div class="col-sm-9">
                            <input name="zip_code" type="text"
                                   class="form-control{!! $errors->first('zip_code') ? ' is-invalid' : '' !!}"
                                   value="{{ old('zip_code') ? old('zip_code') : $user->zip_code }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.city') }}</label>
                        <div class="col-sm-9">
                            <input name="city" type="text"
                                   class="form-control{!! $errors->first('city') ? ' is-invalid' : '' !!}"
                                   value="{{ old('city') ? old('city') : $user->city }}">
                        </div>
                    </div>

                    <a href="{{ route('users') }}"
                       class="btn btn-outline-danger">{{ __('auth.cancel_operation') }}</a>
                    <button type="submit"
                            class="btn btn-success">{{ __('auth.save') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
