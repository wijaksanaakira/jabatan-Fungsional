<?php

namespace App\Services;

use App\Models\MonitoringDokumen;

class DocumentProgressService
{
    /**
     * Calculate and update the progress of a given monitoring document.
     *
     * @param MonitoringDokumen $monitoring
     * @return void
     */
    public function calculateAndUpdateProgress(MonitoringDokumen $monitoring)
    {
        $items = $monitoring->items()->get();

        $totalItems = $items->where('status', '!=', 'N/A')->count();
        if ($totalItems === 0) {
            $monitoring->status = 'Belum Diproses';
            $monitoring->save();
            return;
        }

        $completedItems = $items->whereIn('status', ['Lengkap', 'Diverifikasi'])->count();
        $progress = round(($completedItems / $totalItems) * 100);

        // Auto update status based on progress
        if ($progress == 0) {
            $monitoring->status = 'Menunggu Dokumen';
        } elseif ($progress == 100) {
            $monitoring->status = 'Lengkap';
        } else {
            $monitoring->status = 'Proses';

            // Check if there's any item that needs revision
            if ($items->where('status', 'Perlu Perbaikan')->count() > 0) {
                $monitoring->status = 'Perlu Perbaikan';
            }
        }

        $monitoring->save();
    }
}