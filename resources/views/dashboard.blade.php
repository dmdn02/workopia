{{-- Redireciona para a página de tarefas --}}
@php
    header("Location: " . route('tarefas.index'));
    exit;
@endphp