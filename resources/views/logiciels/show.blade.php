@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-fill" href="{{ route('logiciels.index') }}">Retour</a>
                    <a class="btn btn-info btn-fill" href="{{ route('logiciels.edit', $logiciel->id) }}">Modifer</a>
                </div>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ __('Serie') }}</label>
                                    <input type="email" class="form-control" value="{{ $logiciel->log_serie }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" class="form-control" value="{{ $logiciel->log_nom }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Marque') }}</label>
                                    <input type="text" class="form-control" value="{{ $logiciel->log_marque }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="log_license">{{ __('License') }}</label>
                                    <input type="text" class="form-control" name="log_license" value="{{ $logiciel->log_license }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Fournisseur') }}</label>
                                    <input type="text" class="form-control" value="{{ $fournisseur->for_nom }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fac_id">{{ __('N° Facture') }}</label>
                                    <input class="form-control" value="{{ $logiciel->fac_id }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Prix Achat') }}</label>
                                    <input type="number" class="form-control" value="{{ $logiciel->log_prixachat }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Garantie') }}</label>
                                    <input type="text" class="form-control" value="{{ $logiciel->log_garantie }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Date Achat') }}</label>
                                    <input type="Date" class="form-control" value="{{ $logiciel->log_dateachat }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('La Date D\'ajout') }}</label>
                                    <input type="" class="form-control" value="{{ $logiciel->created_at }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>{{ __('Dernier mis a jour') }}</label>
                                    @if($logiciel->updated_at != $logiciel->created_at)
                                    <input type="" class="form-control" value="{{ $logiciel->updated_at }}" readonly>
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
