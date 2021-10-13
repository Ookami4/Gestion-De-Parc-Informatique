@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn-neutral" style="color: #000000;" href="{{ route('factures.create') }}"><i class="fa fa-link"></i>{{ __('Ajouter facture. Si le materiel appartient a une nouvelle facture.') }}</a>
                        </div>
                        <div class="col-md-6">
                            <a class="btn-neutral" style="color: #000000;" href="{{ route('fournisseurs.create') }}"><i class="fa fa-link"></i>{{ __('Ajouter fournisseur. Si le materiel fournit par un nouveau fournisseur.') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-fill" href="{{ route('materiels.index') }}">Retour</a>
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
                    <form action="{{ route('materiels.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mat_serie">{{ __('Serie') }}</label>
                                    <input type="text" class="form-control" name="mat_serie">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mat_nom">{{ __('Nom') }}</label>
                                    <input type="text" class="form-control" name="mat_nom">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mat_model">{{ __('Model') }}</label>
                                    <input type="text" class="form-control" name="mat_model">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mat_id">{{ __('Fournisseur') }}</label>
                                    <select name="for_id" class="form-control">
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->id }}">{{ $fournisseur->for_nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fac_id">{{ __('N° De Facture') }}</label>
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
                                    <input type="number" step="0.01" name="mat_prixachat" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mat_garantie">{{ __('Garantie') }}</label>
                                    <input type="text" class="form-control" name="mat_garantie">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mat_dateachat">{{ __('Date Achat') }}</label>
                                    <input type="Date" class="form-control" name="mat_dateachat">
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
