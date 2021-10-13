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
                            <strong>Whoops!</strong> Il y a eu des problèmes avec votre entree.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <a class="btn btn-info btn-fill" href="{{ route('fournisseurs.index') }}">Retour</a>
                </div>
                <div class="content">
                    <form action="{{ route('fournisseurs.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Nom Complet') }}</label>
                                    <input type="text" name="for_nom" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ __('E-mail') }}</label>
                                    <input type="email" name="for_email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('RIB') }}</label>
                                    <input type="text" class="form-control" name="rib">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('N° Telephone') }}</label>
                                    <input class="form-control" type="tel" name="for_telephone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Fax') }}</label>
                                    <input class="form-control" type="tel" name="for_fax">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ __('Ville') }}</label>
                                    <input class="form-control" type="text" name="for_ville">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>{{ __('Code Postale') }}</label>
                                    <input class="form-control" name="for_zip" type="text">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ __('Adresse') }}</label>
                                    <input type="" class="form-control" type="text" name="for_adress">
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
