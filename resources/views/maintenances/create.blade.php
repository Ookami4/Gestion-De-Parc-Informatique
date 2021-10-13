@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-fill" href="{{ route('maintenances.index') }}">Retour</a>
                </div>
                <div class="content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only"><i class="pe-7s-close-circle"></i></span>
                            </button>
                            <strong>Whoops!</strong> Il y a eu des problemes avec votre entree.<br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('maintenances.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Realisateur') }}</label>
                                    <input class="form-control" value="{{ Auth::user()->name }}" readonly>
                                    <input type="hidden" name="util_id" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="maint_type">{{ __('Probleme de ') }}</label>
                                    <select name="maint_type" class="form-control">
                                        <option value="Logiciel">{{ __('Logicie') }}</option>
                                        <option value="Machine">{{ __('Machine') }}</option>
                                        <option value="Reseau">{{ __('Reseau') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{ __('Description') }}</label>
                                    <textarea name="maint_description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ __('Decrire ton probleme clairemant ici') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info btn-fill pull-right" value="{{ __('Effectuer') }}">
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
