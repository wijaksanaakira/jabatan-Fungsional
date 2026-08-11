<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-40 w-64 bg-slate-900 text-white transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 overflow-y-auto">
    <div class="flex items-center justify-center h-16 px-4 bg-slate-950/50">
        <span class="text-xl font-bold tracking-wider text-white">SI JABFUN</span>
    </div>

    <nav class="p-4 space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition-colors' }}">
            <i class="bi bi-grid-1x2-fill mr-3 text-lg"></i>
            Dashboard
        </a>

        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Monitoring</p>
        </div>
        <a href="{{ route('monitoring.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('monitoring.*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition-colors' }}">
            <i class="bi bi-activity mr-3 text-lg"></i>
            Monitoring Dokumen
        </a>

        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Jabatan Fungsional</p>
        </div>
        <a href="{{ route('jabatan.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('jabatan.*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition-colors' }}">
            <i class="bi bi-briefcase-fill mr-3 text-lg"></i>
            Daftar Jabatan
        </a>
        <a href="{{ route('dokumen.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('dokumen.*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition-colors' }}">
            <i class="bi bi-file-earmark-text-fill mr-3 text-lg"></i>
            Dokumen
        </a>

        @if(Auth::user()->isSuperAdmin())
        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Authentication</p>
        </div>
        <a href="{{ route('qr.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('qr.*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition-colors' }}">
            <i class="bi bi-qr-code-scan mr-3 text-lg"></i>
            QR Authentication
        </a>

        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Utilities</p>
        </div>
        <a href="{{ route('qr-generator.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('qr-generator.*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition-colors' }}">
            <i class="bi bi-qr-code mr-3 text-lg"></i>
            QR Generator
        </a>

        <div class="pt-4 pb-2">
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Setting</p>
        </div>
        <a href="{{ route('user.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('user.*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition-colors' }}">
            <i class="bi bi-people-fill mr-3 text-lg"></i>
            User Management
        </a>
        <a href="{{ route('audit.index') }}" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl {{ request()->routeIs('audit.*') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white transition-colors' }}">
            <i class="bi bi-clock-history mr-3 text-lg"></i>
            Audit Log
        </a>
        @endif
    </nav>
</aside>

<!-- Mobile Overlay -->
<div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-slate-900/50 lg:hidden" style="display: none;"></div>