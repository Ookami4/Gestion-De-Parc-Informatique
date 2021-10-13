@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only"><i class="pe-7s-close-circle"></i></span>
                            </button>
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="content">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Nom Complet') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ __('E-mail') }}</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Adress') }}</label>
                                    <input class="form-control" type="text" name="adress" value="{{ $user->adress }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('RIB') }}</label>
                                    <input class="form-control" type="text" name="rib" value="{{ $user->rib }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label>
                                    @if ($user->is_admin)
                                        <input   class="form-control" value="Administrateur" readonly>
                                    @else
                                        <input   class="form-control" value="Utilisateur Normal" readonly>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ __('Changer') }}</label>
                                    <select class="form-control" name="is_admin">
                                        <option value="1">{{__('Admin')}}</option>
                                        <option value="0">{{__('User')}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('mot de pass') }}</label>
                                    <input class="form-control" type="password" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Image') }}</label>
                                    <input class="form-control" type="file" name="image_path" value="{{ $user->image_path }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-toolbar">
                            <input type="submit" class="btn btn-info btn-fill pull-right" value="{{ __('Modifier') }}">
                            <a href="{{ route('users.index') }}" class="btn btn-info btn-fill pull-right">{{ __('Annuler') }}</a>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
