<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->get(); 
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:haute,moyenne,basse',
            'due_date' => 'required|date',
        ]);

        $validated['user_id'] = auth()->id();
        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès');
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'priority' => 'required|in:haute,moyenne,basse',
            'due_date' => 'required|date',
            'status' => 'required|in:ouverte,terminée'
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée');
    }
}