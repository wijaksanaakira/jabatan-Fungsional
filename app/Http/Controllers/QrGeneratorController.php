<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuditLogService;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrGeneratorController extends Controller
{
    protected $auditLogger;

    public function __construct(AuditLogService $auditLogger)
    {
        $this->auditLogger = $auditLogger;
    }

    public function index()
    {
        return view('qr-generator.index');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->input('url');

        // Generate SVG format QR code
        $qrCode = QrCode::size(300)->generate($url);

        $this->auditLogger->log('Generate', 'QR Generator', null, null, ['url' => $url], 'User generated QR code for URL: ' . $url);

        return view('qr-generator.index', compact('qrCode', 'url'));
    }
}
