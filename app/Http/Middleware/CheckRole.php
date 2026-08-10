<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\PermissionService;

class CheckRole
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $action
     * @param  string|null  $module
     */
    public function handle(Request $request, Closure $next, $action = 'view', $module = null): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();

        if (!$this->permissionService->hasPermission($user, $action, $module)) {
            abort(403, 'Unauthorized action. Anda tidak memiliki hak akses untuk fitur ini.');
        }

        return $next($request);
    }
}
