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
                    <a class="btn btn-info btn-fill" href="{{ route('maintenances.create') }}"><i class="fa fa-plus-circle"></i>{{__('Effectuer une demande de maintenance')}}</a>
                </div>
                <div class="content table-responsive table-full-width center-block">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Id</th>
                        <th>Type</th>
                        <th>Date De Demande</th>
                        <th>Description de probleme</th>
                        <th>Etat</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach ($maintenances as $maintenance)
                            <tr>
                                <td>{{ $maintenance->id }}</td>
                                <td>{{ $maintenance->maint_type }}</td>
                                <td>{{ $maintenance->created_at }}</td>
                                <td><textarea rows="3">{{ $maintenance->maint_description }}</textarea></td>
                                <td>
                                    @if($maintenance->status == 0)
                                        <button class="btn btn-danger btn-fill">{{ __('En cours')  }}</button>
                                    @else
                                        <button class="btn btn-success btn-fill">{{ __('Resoler') }}</button>
                                    @endif
                                </td>
                                <td>
                                    @if($maintenance->status == 0)
                                    <a class="btn" href="{{ route('maintenances.edit',$maintenance->id) }}">
                                        <i class="fa fa-edit" style="color: #000000;"></i>
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('logiciels.destroy',$maintenance->id) }}" method="POST">
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
        </div>
    </div>
@endsection
