@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                    <a class="btn btn-info btn-fill" href="{{ route('factures.create') }}"><i class="fa fa-plus-circle"></i>{{__('Ajouter une nouvelle facture')}}</a>
                </div>
                <div class="content table-responsive table-full-width center-block">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>N° Facture</th>
                        <th>date de facture</th>
                        <th>prix Total</th>
                        <th>Fournisseur</th>
                        <th>Plus</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach ($factures as $facture)
                            <tr>
                                <td>{{ $facture->id }}</td>
                                <td>{{ $facture->fact_date }}</td>
                                <td>{{ $facture->prixtotal }}</td>
                                @foreach($fournisseurs as $fournisseur)
                                    @if($facture->for_id == $fournisseur[0]->id)
                                        <td><a href="{{ route('fournisseurs.show',$fournisseur[0]->id) }}">{{ $fournisseur[0]->for_nom }}</a></td>
                                    @endif
                                @endforeach
                                <td> <a class="btn" href="{{ route('factures.show',$facture->id) }}"><i class="fa fa-eye" style="color: #000000;"></i></a></td>
                                <td> <a class="btn" href="{{ route('factures.edit',$facture->id) }}"><i class="fa fa-edit" style="color: #000000;"></i></a></td>
                                <td>
                                    <form action="{{ route('factures.destroy',$facture->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn"><i class="fa fa-trash" style="color: #000000;"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $factures->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
