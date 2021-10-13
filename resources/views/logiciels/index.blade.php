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
                    <a class="btn btn-info btn-fill" href="{{ route('logiciels.create') }}"><i class="fa fa-plus-circle"></i>{{__('Ajouter un nouveau logiciel')}}</a>
                    <form class="form-inline my-2 my-lg-0 pull-right" action="{{ route('logiciels.index') }}" method="get" role="search">
                        <input class="form-control mr-sm-2" type="search" name="term" placeholder="{{ __('Chercher par le N° de serie') }}" aria-label="Search">
                        <button class="btn btn-info btn-fill my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="content table-responsive table-full-width center-block">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Serie</th>
                        <th>Name</th>
                        <th>Date Achat</th>
                        <th>Plus</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach ($logiciels as $logiciel)
                            <tr>
                                <td>{{ $logiciel->log_serie }}</td>
                                <td>{{ $logiciel->log_nom }}</td>
                                <td>{{ $logiciel->log_dateachat }}</td>
                                <td> <a class="btn" href="{{ route('logiciels.show',$logiciel->id) }}"><i class="fa fa-eye" style="color: #000000;"></i></a></td>
                                <td> <a class="btn" href="{{ route('logiciels.edit',$logiciel->id) }}"><i class="fa fa-edit" style="color: #000000;"></i></a></td>
                                <td>
                                    <form action="{{ route('logiciels.destroy',$logiciel->id) }}" method="POST">
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
                {!! $logiciels->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection

