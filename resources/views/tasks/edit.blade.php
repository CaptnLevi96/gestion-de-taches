@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Modifier la Tâche</h1>

   <form action="{{ route('tasks.update', $task) }}" method="POST">
       @csrf
       @method('PUT')
       
       <div class="mb-3">
           <label for="title" class="form-label">Titre</label>
           <input type="text" class="form-control @error('title') is-invalid @enderror" 
                  id="title" name="title" value="{{ old('title', $task->title) }}" required>
           @error('title')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>

       <div class="mb-3">
           <label for="description" class="form-label">Description</label>
           <textarea class="form-control @error('description') is-invalid @enderror" 
                     id="description" name="description" rows="3" required>{{ old('description', $task->description) }}</textarea>
           @error('description')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>

       <div class="mb-3">
           <label for="priority" class="form-label">Priorité</label>
           <select class="form-select @error('priority') is-invalid @enderror" 
                   id="priority" name="priority" required>
               <option value="haute" {{ old('priority', $task->priority) == 'haute' ? 'selected' : '' }}>Haute</option>
               <option value="moyenne" {{ old('priority', $task->priority) == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
               <option value="basse" {{ old('priority', $task->priority) == 'basse' ? 'selected' : '' }}>Basse</option>
           </select>
           @error('priority')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>

       <div class="mb-3">
           <label for="due_date" class="form-label">Date limite</label>
           <input type="date" class="form-control @error('due_date') is-invalid @enderror" 
                  id="due_date" name="due_date" value="{{ old('due_date', $task->due_date) }}" required>
           @error('due_date')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>

       <div class="mb-3">
           <label for="status" class="form-label">Statut</label>
           <select class="form-select @error('status') is-invalid @enderror" 
                   id="status" name="status" required>
               <option value="ouverte" {{ old('status', $task->status) == 'ouverte' ? 'selected' : '' }}>Ouverte</option>
               <option value="terminée" {{ old('status', $task->status) == 'terminée' ? 'selected' : '' }}>Terminée</option>
           </select>
           @error('status')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>

       <div class="mb-3">
           <button type="submit" class="btn btn-primary">Mettre à jour</button>
           <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a>
       </div>
   </form>
</div>
@endsection