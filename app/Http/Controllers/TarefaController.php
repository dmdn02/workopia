<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use Illuminate\Support\Facades\Auth;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Tarefa::where('user_id', Auth::id());

        // Filtrar por status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Ordenar por data de fim
        if ($request->ordem == 'data_fim_asc') {
            $query->orderBy('data_fim', 'asc');
        } elseif ($request->ordem == 'data_fim_desc') {
            $query->orderBy('data_fim', 'desc');
        }

        $tarefas = $query->paginate(10);

        return view('tarefas.index', compact('tarefas'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'titulo' => 'required|string|max:255',
        'data_fim' => 'required|date|after_or_equal:today',
        'status' => 'required|in:pendente,em andamento,concluida',
    ]);

    Tarefa::create([
        'user_id' => Auth::id(),
        'titulo' => $request->titulo,
        'descricao' => $request->descricao,
        'data_fim' => $request->data_fim,
        'status' => $request->status,
    ]);

    return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        // Garantir que a tarefa pertence ao utilizador
        if ($tarefa->user_id !== Auth::id()) {
            abort(403);
        }

        return view('tarefas.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
    if ($tarefa->user_id !== Auth::id()) {
    abort(403); // Acesso proibido
    }
    $request->validate([
        'titulo' => 'required|string|max:255',
        'data_fim' => 'required|date|after_or_equal:today',
        'status' => 'required|in:pendente,em andamento,concluida',
    ]);

    $tarefa->update($request->only(['titulo', 'descricao', 'data_fim', 'status']));

    return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        if ($tarefa->user_id !== Auth::id()) {
            abort(403); // impede que outro user apague
        }

        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa eliminada com sucesso!');
    }
}
