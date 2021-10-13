@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-12">
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
                </div>
                <div class="content table-responsive table-full-width center-block">
                    <table class="table table-hover table-striped">
                        <thead>
                        <th>Id</th>
                        <th>Realisateur</th>
                        <th>Type</th>
                        <th>Date De Demande</th>
                        <th>Description de probleme</th>
                        <th>Etat</th>
                        <th>Modifier</th>
                        </thead>
                        <tbody>
                        @foreach ($maintenances as $maintenance)
                            <tr>
                                <td>{{ $maintenance->id }}</td>
                                <td>
                                    @foreach($users as $user)
                                        @if($user[0]->id == $maintenance->util_id)
                                            {{ $user[0]->name }}
                                            @break
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $maintenance->maint_type }}</td>
                                <td>{{ $maintenance->created_at }}</td>
                                <td><textarea rows="3">{{ $maintenance->maint_description }}</textarea></td>
                                <td>
                                    @if($maintenance->status == 0)
                                        <button class="btn btn-danger btn-fill">{{ __('En cours')  }}</button>
                                    @else
                                        <button class="btn btn-success btn-fill">{{ __('Realiser') }}</button>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('maintenances.update',$maintenance->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn"><i class="fa fa-check-square-o" aria-hidden="true" style="color: #000000;"></i></button>
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
