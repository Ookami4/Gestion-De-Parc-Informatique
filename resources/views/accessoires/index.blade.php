@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1" id="nvaccessoire" style="display: none;">
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
                    <form action="{{ route('accessoires.store') }}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Nom') }}</label>
                                    <input type="text" name="acc_nom" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Marque') }}</label>
                                    <input type="text" name="acc_marque" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ __('Quantite') }}</label>
                                    <input type="number" name="acc_quantite" class="form-control">
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-info btn-fill pull-right" value="{{ __('Ajouter') }}">
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="header">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only"><i class="pe-7s-close-circle"></i></span>
                            </button>
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <button class="btn btn-info btn-fill" onclick="toggleForm()" id="formButton"><i class="fa fa-plus-circle"></i>{{__('Ajouter un nouveau accessoire')}}</button>
                    <form class="form-inline my-2 my-lg-0 pull-right" method="get">
                        <input class="form-control mr-sm-2" type="search" placeholder="{{ __('Chercher') }}" aria-label="Search">
                        <button class="btn btn-info btn-fill my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="content table-responsive table-full-width center-block">
                    <table class="table table-hover table-striped">
                        <thead class="thead thead-dark">
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('Marque') }}</th>
                            <th>{{ __('Quantite') }}</th>
                            <th>{{ __('La date d\'ajout') }}</th>
                            <th>{{ __('Dernier Modification') }}</th>
                            <th>{{ __('Modifier') }}</th>
                            <th>{{ __('Supprimer') }}</th>
                        </thead>
                        <tbody>
                            @foreach($accessoires as $accessoire)
                                <tr>
                                    <td>{{ $accessoire->acc_nom }}</td>
                                    <td>{{ $accessoire->acc_marque }}</td>
                                    <td>{{ $accessoire->acc_quantite }}</td>
                                    <td>{{ $accessoire->created_at }}</td>
                                    <td>
                                        @if($accessoire->updated_at != null)
                                            {{ $accessoire->updated_at }}
                                        @else
                                            {{ __('pas encore modifie') }}
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn" href="{{ route('accessoires.edit', $accessoire->id) }}">
                                            <i class="fa fa-edit" style="color: #000000"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('accessoires.destroy', $accessoire->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" type="submit">
                                                <i class="fa fa-trash" style="color: #000000"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleForm() {
            var myForm = document.getElementById('nvaccessoire');
            var displaySetting = myForm.style.display;
            var clockButton = document.getElementById('formButton');
            if (displaySetting == 'block') {
                myForm.style.display = 'none';
                formButton.innerHTML = 'Ajouter un nouveau accessoire';
            }
            else {
                myForm.style.display = 'block';
                clockButton.innerHTML = 'Cacher la formulaire';
            }
        }
    </script>
@endsection
