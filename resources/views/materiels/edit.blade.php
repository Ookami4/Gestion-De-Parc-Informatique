@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only"><i class="pe-7s-close-circle"></i></span>
                            </button>
                            <strong>Whoops!</strong> Il y eu des problemes avec votre entree.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="content">
                    <form action="{{ route('materiels.update',$materiel->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mat_serie">{{ __('Serie') }}</label>
                                    <input type="text" name="mat_serie" class="form-control" value="{{ $materiel->mat_serie }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="mat_nom">{{ __('Nom') }}</label>
                                    <input type="text" name="mat_nom" class="form-control" value="{{ $materiel->mat_nom }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mat_model">{{ __('Model') }}</label>
                                    <input type="text" name="mat_model" class="form-control" value="{{ $materiel->mat_model }}">
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
                                    <label for="for_id">{{ __('N° Facture') }}</label>
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
                                    <input type="number" step="0.01" name="mat_prixachat" class="form-control" value="{{ $materiel->mat_prixachat }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mat_garantie">{{ __('Garantie') }}</label>
                                    <input type="text" name="mat_garantie" class="form-control" value="{{ $materiel->mat_garantie }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mat_dateachat">{{ __('Date Achat') }}</label>
                                    <input type="Date" name="mat_dateachat" class="form-control" value="{{ $materiel->mat_dateachat }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-toolbar">
                            <input type="submit" id="btnCancel" class="btn btn-info btn-fill pull-right" value="{{ __('Modifier') }}">
                            <a href="{{ route('materiels.index') }}" id="btnSubmit" class="btn btn-info btn-fill pull-right">{{ __('Annuler') }}</a>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
