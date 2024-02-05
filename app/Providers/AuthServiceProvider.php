<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('deletecomment', function (User $user , Comment $comment) {
            return $user->role == 'admin' || $user->id === $comment->id_user || $user->role =='editor'  ;
        });
        Gate::define('updatePost', function (User $user){return $user->role =='admin'|| $user->role =='editor';});
        Gate::define('deletePost', function (User $user){return $user->role =='admin'|| $user->role =='editor';});
        Gate::define('updatecomment', function (User $user , Comment $comment) {
            return  $user->id === $comment->id_user  ;
        });
        Gate::define('admin', function (User $user){return $user->role =='admin';});
    }
}
