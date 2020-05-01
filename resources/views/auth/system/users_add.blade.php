@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{ __('auth.add_new_user') }}</h1>

        <div class="card mb-4">
            <div class="card-header"><i class="fa fa-circle-o mr-1"></i>{{ __('auth.user_data') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users_update') }}">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.name') }}</label>
                        <div class="col-sm-9">
                            <input name="name" type="text"
                                   class="form-control{!! $errors->first('name') ? ' is-invalid' : '' !!}"
                                   value="{{ old('name') ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.nip') }}</label>
                        <div class="col-sm-9">
                            <input name="nip" type="text"
                                   class="form-control{!! $errors->first('nip') ? ' is-invalid' : '' !!}"
                                   value="{{ old('nip') ?? '' }}">
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.company') }} / {{ __('auth.position') }}</label>
                        <div class="col-sm-9">
                            <select name="positions_id" class="form-control mb-3 mb-3" autocomplete="off">
                                @foreach($positions as $position)
                                    <option value="{{ $position->id }}"
                                            @if($position->id ===  old('positions_id')) selected @endif>{{ $position->company->name }} / {{ $position->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.email') }}</label>
                        <div class="col-sm-9">
                            <input name="email" type="email"
                                   class="form-control{!! $errors->first('email') ? ' is-invalid' : '' !!}"
                                   value="{{ old('email') ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.password') }}</label>
                        <div class="col-sm-9">
                            <input name="password" type="password"
                                   class="form-control{!! $errors->first('password') ? ' is-invalid' : '' !!}"
                                   value="{{ old('password') ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.phone') }}</label>
                        <div class="col-sm-9">
                            <input name="phone" type="text"
                                   class="form-control{!! $errors->first('phone') ? ' is-invalid' : '' !!}"
                                   value="{{ old('phone') ?? '' }}">
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
                                   value="{{ old('zip_code') ?? '' }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.city') }}</label>
                        <div class="col-sm-9">
                            <input name="city" type="text"
                                   class="form-control{!! $errors->first('city') ? ' is-invalid' : '' !!}"
                                   value="{{ old('city') ?? '' }}">
                        </div>
                    </div>

                    <a href="{{ route('users') }}"
                       class="btn btn-outline-danger">{{ __('auth.cancel_operation') }}</a>
                    <button type="submit"
                            class="btn btn-success">{{ __('auth.add') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
