<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gestion des Tâches</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <nav class="navbar navbar-expand-md navbar-dark bg-dark">
       <div class="container">
           <a class="navbar-brand" href="{{ url('/') }}">Gestion des Tâches</a>
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
               <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ms-auto">
                   @guest
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                       </li>
                   @else
                       <li class="nav-item">
                           <a class="nav-link" href="{{ route('tasks.index') }}">Mes Tâches</a>
                       </li>
                       <li class="nav-item">
                           <form action="{{ route('logout') }}" method="POST" class="d-inline">
                               @csrf
                               <button type="submit" class="btn nav-link">Déconnexion</button>
                           </form>
                       </li>
                   @endguest
               </ul>
           </div>
       </div>
   </nav>

   <main class="container my-4">
       @yield('content')
   </main>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>