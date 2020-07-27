@extends('adminlte::page')

@section('title', 'Configurações')
@section('content_header')
    <h1>Setting</h1>
@endsection
@section('content')

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
    <div class="card">
        <div class="card-body">
            <form class="form" method="POST" action="{{ route('setting.save') }}">
              @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label class="control-label">Título do site</label>
                        <input type="text" class="form-control" name="title" value="{{ $settings['title'] }}"/>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="control-label">Subtítulo do Site</label>
                        <input type="text" class="form-control" name="subtitle" value="{{ $settings['subtitle'] }}"/>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label class="control-label"> Email para contato</label>
                        <input type="email" class="form-control" name="email" value="{{ $settings['email'] }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label class="control-label">Cor do Fundo</label>
                        <input type="color" class="form-control" name="bgcolor" value="{{ $settings['bgcolor'] }}" />
                    </div>
                    <div class="col-md-2 mb-2" >
                        <label class="control-label">Cor do Texto</label>
                        <input type="color" class="form-control" name="textcolor" value="{{ $settings['textcolor'] }}" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <input type="submit" class="btn btn-info" value="Salvar" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

