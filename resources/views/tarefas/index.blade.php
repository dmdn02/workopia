@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 for="titulo" class="form-label text-light fw-bold fs-5">Minhas Tarefas</h1>
    {{-- style="color: #código da cor;" --}}

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tarefas.create') }}" class="btn btn-primary mb-3">➕ Nova Tarefa</a>

    <form method="GET" action="{{ route('tarefas.index') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <label class="form-label text-light">Ordenar por</label>
            <select name="ordem" class="form-select">
                <option value="">-- Selecione --</option>
                <option value="data_fim_asc" {{ request('ordem') == 'data_fim_asc' ? 'selected' : '' }}>Data de Fim (Mais Próxima)</option>
                <option value="data_fim_desc" {{ request('ordem') == 'data_fim_desc' ? 'selected' : '' }}>Data de Fim (Mais Distante)</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label text-light">Filtrar por estado</label>
            <select name="status" class="form-select">
                <option value="">-- Todos --</option>
                <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="em andamento" {{ request('status') == 'em andamento' ? 'selected' : '' }}>Em Andamento</option>
                <option value="concluida" {{ request('status') == 'concluida' ? 'selected' : '' }}>Concluída</option>
            </select>
        </div>

        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
        </div>
    </form>

    @forelse($tarefas as $tarefa)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $tarefa->titulo }}</h5>
                <p class="card-text">{{ $tarefa->descricao }}</p>
                <small class="text-muted">Data de Fim: {{ $tarefa->data_fim }} | Estado: <strong>{{ ucfirst($tarefa->status) }}</strong></small>

                <div class="mt-3">
                    <a href="{{ route('tarefas.edit', $tarefa) }}" class="btn btn-warning btn-sm">✏️ Editar</a>

                    <form action="{{ route('tarefas.destroy', $tarefa) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Tens a certeza?')">🗑️ Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">Não tens nenhuma tarefa.</div>
    @endforelse

    {{ $tarefas->links() }}
</div>
@endsection
