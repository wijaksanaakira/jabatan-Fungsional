<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class AuditLogService
{
    /**
     * Log an action to the audit logs.
     *
     * @param string $action
     * @param string $module
     * @param mixed $subject
     * @param array $oldValues
     * @param array $newValues
     * @param string $description
     * @return void
     */
    public function log(string $action, string $module, $subject = null, array $oldValues = null, array $newValues = null, string $description = null)
    {
        $user = Auth::user();

        $log = new AuditLog();

        if ($user) {
            $log->user_id = $user->id;
            $log->user_name = $user->nama;
            $log->user_email = $user->email ?? $user->username;
            $log->role = $user->levelUser ? $user->levelUser->nama : null;
        }

        $log->action = $action;
        $log->module = $module;

        if ($subject) {
            $log->subject_type = get_class($subject);
            $log->subject_id = $subject->id ?? null;
            $log->subject_name = $this->getSubjectName($subject);
        }

        // Ensure sensitive data is not logged
        $log->old_values = $this->sanitizeValues($oldValues);
        $log->new_values = $this->sanitizeValues($newValues);

        $log->method = Request::method();
        $log->url = Request::fullUrl();
        $log->ip_address = Request::ip();
        $log->user_agent = substr(Request::userAgent(), 0, 255);

        $log->description = $description;

        $log->save();
    }

    private function getSubjectName($subject)
    {
        if (isset($subject->nama)) return $subject->nama;
        if (isset($subject->judul_dokumen)) return $subject->judul_dokumen;
        if (isset($subject->nama_file)) return $subject->nama_file;
        if (isset($subject->nama_pegawai)) return $subject->nama_pegawai;

        return null;
    }

    private function sanitizeValues(?array $values)
    {
        if (!$values) return null;

        $sensitiveKeys = ['password', 'password_confirmation', 'token_hash', 'remember_token'];

        foreach ($sensitiveKeys as $key) {
            if (isset($values[$key])) {
                $values[$key] = '[HIDDEN]';
            }
        }

        return $values;
    }
}