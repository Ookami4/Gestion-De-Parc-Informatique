@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-fill" href="{{ route('factures.index') }}">retour</a>
                </div>
                <div class="content">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only"><i class="pe-7s-close-circle"></i></span>
                            </button>
                            <strong>Whoops!</strong> Il y a eu quelques problèmes avec votre entrée.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('factures.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fact_date">{{ __('Date de facture') }}</label>
                                    <input type="Date" class="form-control" name="fact_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="for_id">{{ __('Fournisseur') }}</label>
                                    <select name="for_id" class="form-control">
                                        @foreach($fournisseurs as $fournisseur)
                                            <option value="{{ $fournisseur->id }}">{{ $fournisseur->for_nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="prix_achat">{{ __('Prix Total') }}</label>
                                    <input type="number" step="0.01" class="form-control" name="prixtotal">
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
