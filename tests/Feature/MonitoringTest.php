<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\MonitoringDokumen;
use App\Models\MonitoringDokumenItem;
use App\Models\JabatanFungsional;
use Tests\TestCase;

class MonitoringTest extends TestCase
{
    public function test_progress_calculation()
    {
        $monitoring = MonitoringDokumen::create([
            'nama' => 'Test Progress',
            'jabatan_fungsional_id' => 1,
            'status' => 'Belum Diproses'
        ]);

        $item1 = MonitoringDokumenItem::create([
            'monitoring_id' => $monitoring->id,
            'persyaratan_id' => 1,
            'nama_dokumen' => 'Doc 1',
            'status' => 'Lengkap',
        ]);

        $item2 = MonitoringDokumenItem::create([
            'monitoring_id' => $monitoring->id,
            'persyaratan_id' => 2,
            'nama_dokumen' => 'Doc 2',
            'status' => 'Belum Ada',
        ]);

        $service = new \App\Services\DocumentProgressService();
        $service->calculateAndUpdateProgress($monitoring);

        $monitoring->refresh();

        $this->assertEquals(50, $monitoring->progress);
        $this->assertEquals('Proses', $monitoring->status);

        // Clean up
        $item1->delete();
        $item2->delete();
        $monitoring->forceDelete();
    }
}