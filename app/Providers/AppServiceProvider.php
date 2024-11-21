<?php

namespace App\Providers;

use App\Models\Task;  // Ajoutez cette ligne
use App\Policies\TaskPolicy;  // Ajoutez cette ligne
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Task::class => TaskPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}