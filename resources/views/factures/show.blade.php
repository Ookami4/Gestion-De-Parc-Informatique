@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-fill" href="{{ route('factures.index') }}">Retour</a>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Date de Facture') }}</label>
                                    <input type="email" class="form-control" value="{{ $facture->id }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Date de Facture') }}</label>
                                    <input type="email" class="form-control" value="{{ $facture->fact_date }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Fournisseure') }}</label>
                                    <input type="text" class="form-control" value="{{ $fournisseur->for_nom }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        @if(Auth::user()->is_admin)
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row center-block">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <button class="btn btn-info btn-fill center-block">{{ __('Liste des materiels Dans la facture') }}</button>
                                </div>
                                <br/>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <th>{{__('Serie')}}</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Plus')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach ($materiels as $materiel)
                                            <tr>
                                                <td>{{ $materiel->mat_serie }}</td>
                                                <td>{{ $materiel->mat_nom }}</td>
                                                <td> <a class="btn" href="{{ route('materiels.show',$materiel->id) }}"><i class="fa fa-eye" style="color: #000000;"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="header">
                                    <button class="btn btn-info btn-fill center-block">{{ __('Liste des logiciels dans la facture ')}}</button>
                                </div>
                                <br/>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead class="thead-dark">
                                        <th>{{__('Serie')}}</th>
                                        <th>{{__('Name')}}</th>
                                        <th>{{__('Plus')}}</th>
                                        </thead>
                                        <tbody>
                                        @foreach ($logiciels as $logiciel)
                                            <tr>
                                                <td>{{ $logiciel->log_serie }}</td>
                                                <td>{{ $logiciel->log_nom }}</td>
                                                <td> <a class="btn" href="{{ route('logiciels.show',$logiciel->id) }}"><i class="fa fa-eye" style="color: #000000;"></i></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif
@endsection
