@extends('adminlte::page')

@section('title', 'Editar Página')

@section('content_header')

@endsection
@section('content')
    <div class="card">
        <div class="card-header">  <h4>Editar Página</h4>
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
        </div>
        <div class="card-body">
            <form class="form" action="{{route('pages.update', ['page'=>$page->id])}}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-6">
                        <label class="control-label">Título</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $page->title }}" >
                    </div>
                    <div class="col-md-12 mb-6">
                        <label class="control-label">Corpo</label>
                        <input type="body" class="form-control bodyfield @error('body') is-invalid @enderror" name="body" value="{{ $page->body }}" >
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
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector:'input.bodyfield',
        height: 300,
        menubar: false,
        plugins: ['link', 'table', 'image', 'autoresize', 'lists'],
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft alignright aligncenter alignjustify | table | link image | bullist numlist',
        content_css:[
            '{{asset('assets/css/content.css')}}'
        ],
        images_upload_url: '{{ route('imageupload') }}',
        images_upload_credentials: 'true',
        convert_urls: false
    });
</script>
@endsection



