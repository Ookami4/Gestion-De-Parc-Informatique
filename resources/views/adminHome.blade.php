@extends('layouts.userApp')

@section('content')
     <div class="row">
         <div class="col-md-6 col-md-offset-3">
             <div class="card">
                 <div class="content">
                     <div class="card-body text-center">
                         <i class="fa fa-desktop fa-2x"></i>
                         <h3 class="card-title text-center">
                             <a href="{{ route('machines.index') }}">
                                 {{ __('La Gestion Des Machines') }}
                             </a>
                         </h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-md-6 col-md-offset-3">
             <div class="card">
                 <div class="content">
                     <div class="card-body text-center">
                         <i class="fa fa-group fa-2x"></i>
                         <h3 class="card-title text-center">
                             <a href="{{ route('users.index') }}">
                                 {{ __('La Gestion Des Utilisateurs') }}
                             </a>
                         </h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-md-6 col-md-offset-3">
             <div class="card">
                 <div class="content">
                     <div class="card-body text-center">
                         <i class="fa fa-support fa-2x"></i>
                         <h3 class="card-title text-center">
                             <a href="{{ route('maintenances.indexadmin') }}">
                                 {{ __('La Liste Des Maintenances') }}
                             </a>
                         </h3>
                     </div>
                 </div>
             </div>
         </div>
     </div>
@endsection
