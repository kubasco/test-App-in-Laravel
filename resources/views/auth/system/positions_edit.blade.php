@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{ __('auth.edit_position') }}</h1>

        <div class="card mb-4">
            <div class="card-header"><i class="fa fa-circle-o mr-1"></i>{{ __('auth.position_data') }}
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('positions_update', $position->id) }}">
                    @csrf

                    <div class=" form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.company') }}</label>
                        <div class="col-sm-9">
                            <select name="companies_id" class="form-control mb-3 mb-3" autocomplete="off">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}"
                                            @if(old('companies_id'))
                                            @if($company->id ===  old('companies_id')) selected @endif>{{ $company->name }}
                                    @else
                                        @if($company->id == $position->company->id) selected @endif
                                        >{{ $company->name }}
                                    @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class=" form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.reference') }}</label>
                        <div class="col-sm-9">
                            <select name="reference" class="form-control mb-3 mb-3" autocomplete="off">
                                @foreach($references as $reference)
                                    <option value="{{ $reference }}"
                                            @if(old('reference'))
                                            @if($reference ===  old('reference')) selected @endif>{{ $reference }}
                                    @else
                                        @if($reference == $position->reference) selected @endif
                                        >{{ $reference }}
                                    @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.title') }}</label>
                        <div class="col-sm-9">
                            <input name="title" type="text"
                                   class="form-control{!! $errors->first('title') ? ' is-invalid' : '' !!}"
                                   value="{{ old('title') ? old('title') : $position->title }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.description') }}</label>
                        <div class="col-sm-9">
                                    <textarea rows="6"
                                              name="description"
                                              class="form-control{!! $errors->first('description') ? ' is-invalid' : '' !!}">{{ old('description') ? old('description') : $position->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">{{ __('auth.email') }}</label>
                        <div class="col-sm-9">
                            <input name="email" type="email"
                                   class="form-control{!! $errors->first('email') ? ' is-invalid' : '' !!}"
                                   value="{{ old('email') ? old('email') : $position->email }}">
                        </div>
                    </div>
                    <a href="{{ route('positions') }}"
                       class="btn btn-outline-danger">{{ __('auth.cancel_operation') }}</a>
                    <button type="submit"
                            class="btn btn-success">{{ __('auth.save') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
