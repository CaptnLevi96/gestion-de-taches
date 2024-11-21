@extends('layouts.app')

@section('content')
<div class="container">
   <div class="card">
       <div class="card-header d-flex justify-content-between align-items-center">
           <h1>Détails de la Tâche</h1>
           <div>
               <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Modifier</a>
               <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Retour</a>
           </div>
       </div>
       
       <div class="card-body">
           <div class="row mb-3">
               <div class="col-md-3 fw-bold">Titre:</div>
               <div class="col-md-9">{{ $task->title }}</div>
           </div>

           <div class="row mb-3">
               <div class="col-md-3 fw-bold">Description:</div>
               <div class="col-md-9">{{ $task->description }}</div>
           </div>

           <div class="row mb-3">
               <div class="col-md-3 fw-bold">Priorité:</div>
               <div class="col-md-9">
                   <span class="badge {{ $task->priority === 'haute' ? 'bg-danger' : ($task->priority === 'moyenne' ? 'bg-warning' : 'bg-info') }}">
                       {{ $task->priority }}
                   </span>
               </div>
           </div>

           <div class="row mb-3">
               <div class="col-md-3 fw-bold">Statut:</div>
               <div class="col-md-9">
                   <span class="badge {{ $task->status === 'terminée' ? 'bg-success' : 'bg-primary' }}">
                       {{ $task->status }}
                   </span>
               </div>
           </div>

           <div class="row mb-3">
               <div class="col-md-3 fw-bold">Date limite:</div>
               <div class="col-md-9">{{ $task->due_date }}</div>
           </div>

           <div class="row mb-3">
               <div class="col-md-3 fw-bold">Créée le:</div>
               <div class="col-md-9">{{ $task->created_at->format('d/m/Y H:i') }}</div>
           </div>

           <div class="row mb-3">
               <div class="col-md-3 fw-bold">Dernière modification:</div>
               <div class="col-md-9">{{ $task->updated_at->format('d/m/Y H:i') }}</div>
           </div>
       </div>

       <div class="card-footer">
           <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
               @csrf
               @method('DELETE')
               <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                   Supprimer
               </button>
           </form>
       </div>
   </div>
</div>
@endsection