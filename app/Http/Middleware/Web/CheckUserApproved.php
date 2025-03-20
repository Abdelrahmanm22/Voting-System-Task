<?php

namespace App\Http\Middleware\Web;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Check if user is not approved
        if ($user->status !== 'approved') {
            return response()->view('errors.not-allowed', ['message' => 'Your account is pending approval. You cannot vote or receive votes until approved'], 403);
        }

        return $next($request);
    }
}
