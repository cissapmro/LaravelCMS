
@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')

@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h3>Minha Página</h3>
            <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">Adicionar Página</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50">Id</th>
                    <th>Título</th>
                    <th width="200">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>

                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>
                            <a href="" target="_blank" class="btn btn-sm btn-success">Ver</a>
                            <a href="{{ route('pages.edit', ['page'=> $page->id]) }}" class="btn btn-sm btn-info">Editar</a>
                                <form method="POST" class="d-inline" action="{{ route('pages.destroy', ['page'=> $page->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir?') ">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--paginação-->
    {{ $pages->links() }}

@endsection
