@extends('layouts.app')



@section('content')
<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1 for="titulo" class="form-label text-light fw-bold fs-5">Nova Tarefa</h1>

    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label text-light fw-bold fs-5">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label text-light fw-bold fs-5">Descrição</label>
            <textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data_fim" class="form-label text-light fw-bold fs-5">Data de Fim</label>
            <input type="date" name="data_fim" class="form-control" value="{{ old('data_fim') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label text-light fw-bold fs-5">Estado</label>
            <select name="status" class="form-control">
                <option value="pendente">Pendente</option>
                <option value="em andamento">Em Andamento</option>
                <option value="concluida">Concluída</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Criar Tarefa</button>
        <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
