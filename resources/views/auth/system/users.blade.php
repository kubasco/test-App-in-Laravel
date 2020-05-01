@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">{{ __('auth.users') }}</h1>
        <ol class="breadcrumb mb-4">
            <a href="{{ route('users_add') }}"
               class="btn btn-primary m-1">{{ __('auth.add_new_user') }}</a>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fa fa-circle-o mr-1"></i>{{ __('auth.users') }}</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('auth.id') }}</th>
                            <th>{{ __('auth.name') }}</th>
                            <th>{{ __('auth.nip') }}</th>
                            <th>{{ __('auth.company') }} / {{ __('auth.position') }}</th>
                            <th>{{ __('auth.email') }}</th>
                            <th>{{ __('auth.phone') }}</th>
                            <th>{{ __('auth.address') }}</th>
                            <th>{{ __('auth.action') }}</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>{{ __('auth.id') }}</th>
                            <th>{{ __('auth.name') }}</th>
                            <th>{{ __('auth.nip') }}</th>
                            <th>{{ __('auth.company') }} / {{ __('auth.position') }}</th>
                            <th>{{ __('auth.email') }}</th>
                            <th>{{ __('auth.phone') }}</th>
                            <th>{{ __('auth.address') }}</th>
                            <th style="min-width: 130px;">{{ __('auth.action') }}</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                                <tr class="item_row fadeIn">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{
                                    (isset($user->position->title))
                                    ?
                                    ($user->position->company->name.'/'.$user->position->title)
                                    :
                                    ''
                                    }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->address }}, {{ $user->zip_code }} {{ $user->city }}</td>
                                    <td>
                                        <a class="btn btn-outline-info btn-sm"
                                           href="{{ route('users_edit',$user->id) }}">{{ __('auth.edit') }}</a>
                                        <a class="btn btn-outline-danger btn-sm"
                                           href="{{ route('users_delete',$user->id) }}"
                                           onclick="return confirm('{{ __('auth.delete_confirm') }}')"
                                        >{{ __('auth.delete') }}</a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
