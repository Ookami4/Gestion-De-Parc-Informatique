@extends('layouts.userApp')

@section('content')
    <div class="row">
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
                        <a class="btn btn-info btn-fill" href="{{ route('fournisseurs.create') }}"><i class="fa fa-plus-circle"></i>{{__('Ajouter un nouveau fournisseur')}}</a>
                        <form class="form-inline my-2 my-lg-0 pull-right" action="{{ route('fournisseurs.index') }}" method="get" role="search">
                            <input class="form-control mr-sm-2" type="search" name="term" placeholder="{{ __('Chercher par le nom') }}" aria-label="Search">
                            <button class="btn btn-info btn-fill my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Nom Complet</th>
                        <th>Ville</th>
                        <th>Email</th>
                        <th>N° Telephone</th>
                        <th>Plus</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach ($fournisseurs as $fournisseur)
                            <tr>
                                <td>{{ $fournisseur->for_nom }}</td>
                                <td>{{ $fournisseur->for_ville }}</td>
                                <td>{{ $fournisseur->for_email }}</td>
                                <td>{{ $fournisseur->for_telephone }}</td>
                                <td><a class="btn" href="{{ route('fournisseurs.show',$fournisseur->id) }}"><i class="fa fa-eye" style="color: #000000;"></i></a></td>
                                <td><a class="btn" href="{{ route('fournisseurs.edit',$fournisseur->id) }}"><i class="fa fa-edit" style="color: #000000;"></i></a></td>
                                <td>
                                    <form action="{{ route('fournisseurs.destroy',$fournisseur->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn" type="submit"><i class="fa fa-trash" style="color: #000000;"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $fournisseurs->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
