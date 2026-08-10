<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SI Jabatan Fungsional') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

        <!-- Sidebar Component -->
        <x-sidebar />

        <!-- Main Content -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Top header -->
            <header class="sticky top-0 z-30 flex items-center justify-between px-4 py-4 bg-white border-b border-slate-200 sm:px-6">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-slate-500 focus:outline-none lg:hidden">
                        <i class="bi bi-list text-2xl"></i>
                    </button>

                    <!-- Search -->
                    <div class="hidden lg:block ml-4">
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <i class="bi bi-search text-slate-400"></i>
                            </span>
                            <input type="text" class="w-full py-2 pl-10 pr-4 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" placeholder="Global Search...">
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- User Menu -->
                    <div x-data="{ userMenuOpen: false }" class="relative">
                        <button @click="userMenuOpen = !userMenuOpen" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 rounded-full bg-blue-600 text-white flex items-center justify-center font-semibold">
                                {{ substr(Auth::user()->nama, 0, 1) }}
                            </div>
                            <span class="hidden text-sm font-medium text-slate-700 md:block">{{ Auth::user()->nama }}</span>
                            <i class="bi bi-chevron-down text-xs text-slate-500"></i>
                        </button>

                        <div x-show="userMenuOpen" @click.away="userMenuOpen = false" class="absolute right-0 w-48 mt-2 py-2 bg-white border border-slate-200 rounded-lg shadow-xl" style="display: none;">
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-100"><i class="bi bi-person mr-2"></i> Profil Saya</a>
                            <div class="border-t border-slate-200 my-1"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-slate-100">
                                    <i class="bi bi-box-arrow-right mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="w-full grow p-6">
                @if (session('success'))
                    <x-toast type="success" :message="session('success')" />
                @endif

                @if (session('error'))
                    <x-toast type="error" :message="session('error')" />
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>