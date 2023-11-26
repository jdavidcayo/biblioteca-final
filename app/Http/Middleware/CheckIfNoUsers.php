<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckIfNoUsers
{

    public function handle($request, Closure $next)
    {
        if (User::count() === 0) {
            return redirect()->route('register');
        }

        return redirect()->route('login');
    }
}
