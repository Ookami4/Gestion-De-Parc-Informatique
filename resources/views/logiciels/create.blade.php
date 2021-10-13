@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn-neutral" style="color: #000000;" href="{{ route('factures.create') }}"><i class="fa fa-link"></i>{{ __('Ajouter facture. Si le logiciel appartient a une nouvelle facture.') }}</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn-neutral" style="color: #000000;" href="{{ route('fournisseurs.create') }}"><i class="fa fa-link"></i>{{ __('Ajouter fournisseur. Si le logiciel fournit par un nouveau fournisseur.') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only"><i class="pe-7s-close-circle"></i></span>
                            </button>
                            <strong>Whoops!</strong> Il y a eu des problemes avec votre entree.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <a class="btn btn-info btn-fill" href="{{ route('logiciels.index') }}">Retour</a>
                </div>
                <div class="content">
                    <form action="{{ route('logiciels.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mat_serie">{{ __('Serie') }}</label>
                                    <input type="text" class="form-control" name="log_serie">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mat_nom">{{ __('Nom') }}</label>
                                    <input type="text" class="form-control" name="log_nom">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mat_model">{{ __('Marque') }}</label>
                                    <input type="text" class="form-control" name="log_marque">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="log_license">{{ __('License') }}</label>
                                    <input type="text" class="form-control" name="log_license">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="for_id">{{ __('Fournisseur') }}</label>
                                    <select name="for_id" class="form-control">
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->id }}">{{ $fournisseur->for_nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fac_id">{{ __('Facture') }}</label>
                                    <select name="fac_id" class="form-control">
                                        @foreach($factures as $facture)
                                            <option value="{{ $facture->id }}">{{ $facture->id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mat_prixachat">{{ __('Prix Achat') }}</label>
                                    <input type="number" step="0.01" name="log_prixachat" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mat_garantie">{{ __('Garantie') }}</label>
                                    <input type="text" class="form-control" name="log_garantie">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mat_dateachat">{{ __('Date Achat') }}</label>
                                    <input type="Date" class="form-control" name="log_dateachat">
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
