@extends('layouts.userApp')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card card-user card-plain" style="height: 280px;">
                <div class="image">
                </div>
                <div class="content">
                    <div class="author">
                        <a>
                            <img class="avatar border-gray" src="storage/img/users/{{ Auth::user()->image_path }}" style="height: 150px; width: 150px;" alt="..."/>
                            <h4 class="title"><b>{{ Auth::user()->name }}</b><br />
                                <small>{{ Auth::user()->email }}</small><br />
                                <small>{{ Auth::user()->adress }}</small>
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="card card-plain">
                <div class="content">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span><span class="sr-only"><i class="pe-7s-close-circle"></i></span>
                            </button>
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form action="{{ route('users.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Nom Complet') }}</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Adresse E-mail') }}</label>
                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('Adress')}}</label>
                                    <input type="text" name="adress" class="form-control" placeholder="Home Address" value="{{ Auth::user()->adress }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('RIB') }}</label>
                                    <input type="text" class="form-control" name="rib" value="{{ Auth::user()->rib }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Image') }}</label>
                                    <input type="file" name="image_path" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">{{ __('Modifier') }}</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
