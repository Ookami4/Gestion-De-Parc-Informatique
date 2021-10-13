@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="content">
                    <form action="{{ route('machines.update',$machine->id )}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ __('Id') }}</label>
                                    <input type="email" class="form-control" value="{{ $machine->id }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" name="mach_nom" class="form-control" value="{{ $machine->mach_nom }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Marque') }}</label>
                                    <input type="text" class="form-control" name="mach_marque" value="{{ $machine->mach_marque }}">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>{{ __('Utilisateur') }}</label>
                                        <select class="form-control" name="util_id">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
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
                            </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Ram') }}</label>
                                    <input class="form-control" name="mach_RAM" value="{{ $machine->mach_RAM }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Rom') }}</label>
                                    <input class="form-control" name="mach_ROM" value="{{ $machine->mach_ROM }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Cpu') }}</label>
                                    <input class="form-control" name="mach_CPU" value="{{ $machine->mach_CPU }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-toolbar pull-right">
                            <a class="btn btn-info btn-fill" href="{{ route('machines.index') }}">Retour</a>
                            <button class="btn btn-info btn-fill" type="submit">Modifer</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
