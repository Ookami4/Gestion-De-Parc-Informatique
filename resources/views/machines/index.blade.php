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
                    <a class="btn btn-info btn-fill" href="{{ route('machines.create') }}"><i class="fa fa-plus-circle"></i>{{__('Ajouter une nouvelle machine')}}</a>
                    <form class="form-inline my-2 my-lg-0 pull-right" action="{{ route('machines.index') }}" method="get" role="search">
                        <input class="form-control mr-sm-2" type="search" name="term" placeholder="{{ __('Chercher par la marque') }}" aria-label="Search">
                        <button class="btn btn-info btn-fill my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="content table-responsive table-full-width center-block">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>{{ __('Id')}}</th>
                        <th>{{ __('Nom')}}</th>
                        <th>{{ __('Marque')}}</th>
                        <th>{{ __('Affecter')}}</th>
                        <th>{{ __('Voir')}}</th>
                        <th>{{ __('Modifier')}}</th>
                        <th>{{ __('Supprimer')}}</th>
                        </thead>
                        <tbody>
                        @foreach ($machines as $machine)
                            <tr>
                                <td>{{ $machine->id}}</td>
                                <td>{{ $machine->mach_nom }}</td>
                                <td>{{ $machine->mach_marque }}</td>
                                <td>
                                    @if($machine->affecter)
                                        <a class="btn btn-fill btn-danger">{{ __('Non') }}</a>
                                    @else
                                        <a class="btn btn-fill btn-success" href="{{ route('users.show',$machine->util_id) }}">{{ __('Oui') }}</a>
                                    @endif
                                </td>
                                <td> <a class="btn" href="{{ route('machines.show',$machine->id) }}"><i class="fa fa-eye" style="color: #000000;"></i></a></td>
                                <td> <a class="btn" href="{{ route('machines.edit',$machine->id) }}"><i class="fa fa-edit" style="color: #000000;"></i></a></td>
                                <td>
                                    <form action="{{ route('machines.destroy',$machine->id) }}" method="POST">

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
                {!! $machines->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
