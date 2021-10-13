@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    <a class="btn btn-info btn-fill" href="{{ route('fournisseurs.index') }}">Retour</a>
                    <a class="btn btn-info btn-fill" href="{{ route('fournisseurs.edit', $fournisseur->id) }}">Modifer</a>
                </div>
                <div class="content">
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Nom Complet') }}</label>
                                    <input type="" class="form-control" value="{{ $fournisseur->for_nom }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ __('E-mail') }}</label>
                                    <input type="text" class="form-control" value="{{ $fournisseur->for_email }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('RIB') }}</label>
                                    <input type="text" class="form-control" name="rib" value="{{ $fournisseur->rib }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('N° Telephone') }}</label>
                                    <input class="form-control" value="{{ $fournisseur->for_telephone }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Fax') }}</label>
                                    <input class="form-control" value="{{ $fournisseur->for_fax }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ __('Ville') }}</label>
                                    <input class="form-control" value="{{ $fournisseur->for_ville }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ __('Code Postale') }}</label>
                                    <input class="form-control" value="{{ $fournisseur->for_zip }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ __('Adresse') }}</label>
                                    <input type="" class="form-control" value="{{ $fournisseur->for_adress }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('La date d\'ajout') }}</label>
                                    <input class="form-control" value="{{ $fournisseur->created_at }}" readonly>
                                </div>
                            </div>
                            @if($fournisseur->updated_at != $fournisseur->created_at)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Mis a jour') }}</label>
                                    <input class="form-control" value="{{ $fournisseur->updated_at }}" readonly>
                                </div>
                            </div>
                            @endif
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
                            <button class="btn btn-info btn-fill center-block">{{ __('Liste des materiels fournit par ').$fournisseur->for_nom }}</button>
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
                            <button class="btn btn-info btn-fill center-block">{{ __('Liste des logiciels fournit par ').$fournisseur->for_nom }}</button>
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

