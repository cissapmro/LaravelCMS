<!--<script src="{{ asset('minha_lib/arquivo.js') }}"> </script>-->

@extends('adminlte::page')
@section('title', 'profile')
@section('content_header')
    <h1>Profile</h1>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">  <h4>Editar Usuário</h4>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <h5><i class="icon fas fa-ban"></i>Ocorreu um erro.</h5>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('warning'))
        <div class="alert alert-info">
                {{ session('warning') }}
        </div>
            @endif
        </div>
        <div class="card-body">
            <form class="form" action="{{route('profile.save')}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="control-label">Nome completo</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ $user->name }}" >
                    </div>
                    <div class="col-md-5 mb-3">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="control-label">Nova Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="control-label">Confirmação da senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <input type="submit" class="btn btn-info" value="Editar" onclick="return confirm('Tem certeza que deseja alterar?') ">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


