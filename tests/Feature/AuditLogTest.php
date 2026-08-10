<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\AuditLog;
use App\Services\AuditLogService;
use Tests\TestCase;
use Illuminate\Support\Facades\Request;

class AuditLogTest extends TestCase
{
    public function test_audit_log_creation()
    {
        $service = app(AuditLogService::class);

        $service->log('Test Action', 'Test Module', null, ['old' => 'value'], ['new' => 'value'], 'Test Description');

        $log = AuditLog::where('action', 'Test Action')->first();

        $this->assertNotNull($log);
        $this->assertEquals('Test Module', $log->module);
        $this->assertEquals('Test Description', $log->description);

        // Clean up
        $log->delete();
    }
}