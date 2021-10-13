@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="header">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Il y a eu des problèmes avec votre entree.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="content">
                    <form action="{{ route('accessoires.update', $accessoire->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" name="acc_nom" class="form-control" value="{{ $accessoire->acc_nom }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Marque') }}</label>
                                    <input type="text" name="acc_marque" class="form-control" value="{{ $accessoire->acc_marque }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Quantite') }}</label>
                                    <input type="number" name="acc_quantite" class="form-control" value="{{ $accessoire->acc_quantite }}">
                                </div>
                            </div>
                        </div>
                        <div class="btn-toolbar">
                            <input type="submit" id="btnCancel" class="btn btn-info btn-fill pull-right" value="{{ __('Modifier') }}">
                            <a href="{{ route('accessoires.index') }}" id="btnSubmit" class="btn btn-info btn-fill pull-right">{{ __('Annuler') }}</a>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
