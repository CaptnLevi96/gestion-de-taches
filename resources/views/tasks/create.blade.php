@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Nouvelle Tâche</h1>

   <form action="{{ route('tasks.store') }}" method="POST">
       @csrf
       
       <div class="mb-3">
           <label for="title" class="form-label">Titre</label>
           <input type="text" class="form-control @error('title') is-invalid @enderror" 
                  id="title" name="title" value="{{ old('title') }}" required>
           @error('title')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>

       <div class="mb-3">
           <label for="description" class="form-label">Description</label>
           <textarea class="form-control @error('description') is-invalid @enderror" 
                     id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
           @error('description')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>

       <div class="mb-3">
           <label for="priority" class="form-label">Priorité</label>
           <select class="form-select @error('priority') is-invalid @enderror" 
                   id="priority" name="priority" required>
               <option value="">Choisir une priorité</option>
               <option value="haute" {{ old('priority') == 'haute' ? 'selected' : '' }}>Haute</option>
               <option value="moyenne" {{ old('priority') == 'moyenne' ? 'selected' : '' }}>Moyenne</option>
               <option value="basse" {{ old('priority') == 'basse' ? 'selected' : '' }}>Basse</option>
           </select>
           @error('priority')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>

       <div class="mb-3">
           <label for="due_date" class="form-label">Date limite</label>
           <input type="date" class="form-control @error('due_date') is-invalid @enderror" 
                  id="due_date" name="due_date" value="{{ old('due_date') }}" required>
           @error('due_date')
               <div class="invalid-feedback">{{ $message }}</div>
           @enderror
       </div>

       <div class="mb-3">
           <button type="submit" class="btn btn-primary">Créer la tâche</button>
           <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a>
       </div>
   </form>
</div>
@endsection