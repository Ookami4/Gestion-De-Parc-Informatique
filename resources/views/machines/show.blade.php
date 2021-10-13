@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-fill" href="{{ route('machines.index') }}">Retour</a>
                    <a class="btn btn-info btn-fill" href="{{ route('machines.edit', $machine->id) }}">Modifer</a>
                </div>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>{{ __('Id') }}</label>
                                    <input type="email" class="form-control" value="{{ $machine->id }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" class="form-control" value="{{ $machine->mach_nom }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Marque') }}</label>
                                    <input type="text" class="form-control" value="{{ $machine->mach_marque }}" readonly>
                                </div>
                            </div>
                        </div>
                        @if($machine->affecter)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Utilisateur') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>{{ __('Lieu d\'affectation') }}</label>
                                    <input type="text" class="form-control" value="{{ $machine->lieu_affect }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ __('date d\'affectation') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->date_affect }}" readonly>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" value="{{ __('aucun utilisateur n\'est affecté à la machine') }}" readonly>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Ram') }}</label>
                                    <input class="form-control" value="{{ $machine->mach_RAM }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Rom') }}</label>
                                    <input class="form-control" value="{{ $machine->mach_ROM }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Cpu') }}</label>
                                    <input class="form-control" value="{{ $machine->mach_CPU }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('La Date D\'ajout') }}</label>
                                    <input type="" class="form-control" value="{{ $machine->created_at }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Mise a jour') }}</label>
                                    @if($machine->updated_at != $machine->created_at)
                                        <input type="" class="form-control" value="{{ $machine->updated_at }}" readonly>
                                    @else
                                        <input type="" class="form-control" value="{{ __('Aucune Modification') }}" readonly>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
