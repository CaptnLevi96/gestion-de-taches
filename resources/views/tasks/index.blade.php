<!-- resources/views/tasks/index.blade.php -->
@extends('layouts.app')

@section('content')
   <div class="container">
       <div class="d-flex justify-content-between align-items-center mb-4">
           <h1>Mes Tâches</h1>
           <a href="{{ route('tasks.create') }}" class="btn btn-primary">Nouvelle Tâche</a>
       </div>

       @if ($tasks->count() > 0)
           <div class="table-responsive">
               <table class="table table-striped">
                   <thead>
                       <tr>
                           <th>Statut</th>
                           <th>Titre</th>
                           <th>Description</th>
                           <th>Priorité</th>
                           <th>Date Limite</th>
                           <th>Actions</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($tasks as $task)
                           <tr>
                               <td>
                                   <form action="{{ route('tasks.update', $task) }}" method="POST">
                                       @csrf
                                       @method('PUT')
                                       <input type="hidden" name="title" value="{{ $task->title }}">
                                       <input type="hidden" name="description" value="{{ $task->description }}">
                                       <input type="hidden" name="priority" value="{{ $task->priority }}">
                                       <input type="hidden" name="due_date" value="{{ $task->due_date }}">
                                       <input type="checkbox" name="status" value="terminée" 
                                           onChange="this.form.submit()" 
                                           {{ $task->status === 'terminée' ? 'checked' : '' }}>
                                   </form>
                               </td>
                               <td>{{ $task->title }}</td>
                               <td>{{ Str::limit($task->description, 30) }}</td>
                               <td>
                                   <span class="badge {{ $task->priority === 'haute' ? 'bg-danger' : ($task->priority === 'moyenne' ? 'bg-warning' : 'bg-info') }}">
                                       {{ $task->priority }}
                                   </span>
                               </td>
                               <td>{{ $task->due_date }}</td>
                               <td>
                                   <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Modifier</a>
                                   <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr?')">Supprimer</button>
                                   </form>
                               </td>
                           </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       @else
           <p>Aucune tâche trouvée.</p>
       @endif
   </div>
@endsection