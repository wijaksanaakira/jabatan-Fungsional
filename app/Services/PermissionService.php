<?php

namespace App\Services;

use App\Models\User;

class PermissionService
{
    /**
     * Check if user has specific permission based on matrix
     *
     * @param User $user
     * @param string $action 'view', 'create', 'edit', 'delete', 'export'
     * @param string $module Module name
     * @return bool
     */
    public function hasPermission(User $user, $action, $module = null)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        if ($user->isAdmin()) {
            // Admins can't manage super admins or audit logs, or system settings
            if (in_array($module, ['Audit Log', 'System Setting', 'QR Auth'])) {
                return false;
            }

            // Admins generally have CRUD
            return in_array($action, ['view', 'create', 'edit', 'delete', 'export']);
        }

        // Operators and Users are Read Only
        if ($user->isOperator() || $user->isStandardUser()) {
            return $action === 'view';
        }

        return false;
    }
}