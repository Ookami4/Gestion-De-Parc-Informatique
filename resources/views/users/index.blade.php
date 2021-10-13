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
                    <a class="btn btn-info btn-fill" href="{{ route('users.create') }}"><i class="fa fa-plus-circle"></i>{{__('Ajouter un nouveau employeur')}}</a>
                </div>
                <div class="content table-responsive table-full-width center-block">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>NOM</th>
                        <th>Email</th>
                        <th>Adress</th>
                        <th>Plus</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->adress }}</td>


                                <td> <a class="btn" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye" style="color: #000000;"></i></a></td>
                                <td> <a class="btn" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit" style="color: #000000;"></i></a></td>
                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">

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
                {!! $users->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
@endsection
