@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card card-user card-plain" style="height: 280px;">
                <div class="image">
                </div>
                <div class="content">
                    <div class="author">
                        <a>
                            <img class="avatar border-gray" src="{{asset('storage/img/users/'.$user->image_path) }}" style="height: 150px; width: 150px;" alt="..."/>
                            <h4 class="title">{{ $user->name }}<br />
                                <small>{{ $user->email }}</small><br />
                                <small>{{ $user->adress }}</small>
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="card card-plain">
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Status') }}</label>
                                    @if ($user->is_admin)
                                        <input   class="form-control" value="Administrateur" aria-selected="true" readonly>
                                    @else
                                        <input   class="form-control" value="Utilisateur Normal" aria-selected="false" readonly>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Nom Complet') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Adresse E-mail') }}</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Adress')}}</label>
                                    <input type="text" name="adress" class="form-control" placeholder="Home Address" value="{{ $user->adress }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('RIB') }}</label>
                                    <input type="text" class="form-control"  value="{{ $user->rib }}" readonly>
                                </div>
                            </div>
                        </div>
                        @if($machine != NULL)
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Machine') }}</label>
                                    <input type="text" class="form-control" value="{{ $machine->mach_nom }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Departemant') }}</label>
                                    <input type="text" class="form-control" value="{{ $machine->lieu_affect }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Date d\'affectation') }}</label>
                                    <input type="text" class="form-control" value="{{ $machine->date_affect }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('machines.show', $machine->id) }}" class="btn btn-info btn-fill pull-right">{{__('Voir Machine')}}</a>
                            </div>
                        </div>
                        @else
                            <div class="row">
                                <div class="col-md-12">
                                    <label>{{ __('Machine') }}</label>
                                    <input class="form-control" value="{{ __('Aucune machine n\'est affecte a cet utilisateur') }}" readonly>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Date D\'ajout') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->created_at }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Derniere Modification') }}</label>
                                    @if($user->created_at != $user->updated_at)
                                        <input type="text" class="form-control"  value="{{ $user->updated_at }}" readonly>
                                    @else
                                        <input type="text" class="form-control"  value="{{ __('Aucune Modification') }}" readonly>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <div class="btn-toolbar">
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info btn-fill pull-right">{{ __('Modifier') }}</a>
                        <a href="{{ route('users.index',$user->id) }}" class="btn btn-info btn-fill pull-right">{{ __('Retour') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
