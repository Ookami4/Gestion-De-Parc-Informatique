@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="row center-block">
                    <div class="col-md-6 col-md-offset-1">
                        <a class="btn btn-neutral" style="color: #000000;" href="{{ route('users.create') }}"><i class="fa fa-link"></i>{{ __('Ajouter Utilisateur. Si vous voulez affectter la machine a un nouveau utilisateur.') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-fill" href="{{ route('machines.index') }}">Retour</a>
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
                    <form action="{{ route('machines.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" name="mach_nom" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Marque') }}</label>
                                    <input type="text" name="mach_marque" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Ram') }}</label>
                                    <input class="form-control" type="text" name="mach_RAM">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Rom') }}</label>
                                    <input class="form-control" type="text" name="mach_ROM">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Cpu') }}</label>
                                    <input class="form-control" type="text" name="mach_CPU">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Carte De Reseau') }}</label>
                                    <input class="form-control" name="mach_carte_reseau" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Utilisateur') }}</label>
                                    <select class="form-control" name="util_id">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Lieu d\'affectation') }}</label>
                                    <select name="lieu_affect" class="form-control">
                                        <option value="Departemant Technique">{{ __('Departemant Technique') }}</option>
                                        <option value="Departement Commercial">{{ __('Departement Commercial') }}</option>
                                        <option value="Departemant Finance">{{ __('Departemant Finance') }}</option>
                                    </select>
                                    <input type="hidden" name="affectter" value="1" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('date d\'affectation') }}</label>
                                    <input type="date" name="date_affect" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info btn-fill pull-right" value="{{ __('Ajouter') }}">
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
