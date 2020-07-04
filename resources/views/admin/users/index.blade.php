
@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')

@endsection

@section('content')
    <div class="card">
        <div class="card-header"><h3>Meus usuários</h3>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Adicionar Usuários</a>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['user'=> $user->id]) }}" class="btn btn-sm btn-info">Editar</a>
                            @if($loggedId !== $user->id)
                            <form method="POST" class="d-inline" action="{{ route('users.destroy', ['user'=> $user->id])}}" onsubmit="return confirm('Tem certeza que deseja excluir?') ">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                                @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!--paginação-->
    {{ $users->links() }}


@endsection
