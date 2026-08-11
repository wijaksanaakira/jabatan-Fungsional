<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'SI JABFUN') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900 min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-blue-600 text-white shadow-lg mb-6">
            <i class="bi bi-briefcase-fill text-3xl"></i>
        </div>
        <h2 class="text-center text-3xl font-bold tracking-tight text-slate-900">
            Sistem Informasi
        </h2>
        <p class="mt-2 text-center text-lg text-slate-600">
            Jabatan Fungsional & Monitoring
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md" x-data="{ loginMethod: 'password', showPassword: false }">
        <div class="bg-white py-8 px-4 shadow-xl shadow-slate-200/50 sm:rounded-2xl sm:px-10 border border-slate-100 relative overflow-hidden">

            <!-- Abstract Decoration -->
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-blue-50 rounded-full blur-2xl z-0"></div>
            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-24 h-24 bg-indigo-50 rounded-full blur-2xl z-0"></div>

            <div class="relative z-10">
                <!-- Method Toggle -->
                <div class="flex p-1 mb-8 space-x-1 bg-slate-100/80 rounded-xl">
                    <button @click="loginMethod = 'password'" :class="{ 'bg-white shadow text-blue-600': loginMethod === 'password', 'text-slate-500 hover:text-slate-700': loginMethod !== 'password' }" class="w-1/2 flex items-center justify-center py-2.5 text-sm font-semibold rounded-lg transition-all">
                        <i class="bi bi-envelope mr-2"></i> Email/Username
                    </button>
                    <button @click="loginMethod = 'qr'" :class="{ 'bg-white shadow text-blue-600': loginMethod === 'qr', 'text-slate-500 hover:text-slate-700': loginMethod !== 'qr' }" class="w-1/2 flex items-center justify-center py-2.5 text-sm font-semibold rounded-lg transition-all">
                        <i class="bi bi-qr-code-scan mr-2"></i> QR Code
                    </button>
                </div>

                <!-- Password Login Form -->
                <div x-show="loginMethod === 'password'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-x-4" x-transition:enter-end="opacity-100 transform translate-x-0">
                    <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                        <div class="p-4 bg-red-50 text-red-600 rounded-xl text-sm flex items-start">
                            <i class="bi bi-exclamation-triangle-fill mr-3 mt-0.5 text-red-500"></i>
                            <div>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <div>
                            <label for="email" class="block text-sm font-medium text-slate-700">Email atau Username</label>
                            <div class="mt-1">
                                <input id="email" name="email" type="text" autocomplete="email" required class="block w-full appearance-none rounded-xl border border-slate-300 px-4 py-3 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm transition-colors" placeholder="Masukkan email atau username">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                            <div class="mt-1 relative">
                                <input :type="showPassword ? 'text' : 'password'" id="password" name="password" autocomplete="current-password" required class="block w-full appearance-none rounded-xl border border-slate-300 px-4 py-3 pr-10 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm transition-colors" placeholder="••••••••">
                                <button type="button" @click="showPassword = !showPassword" class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600 focus:outline-none">
                                    <i class="bi" :class="showPassword ? 'bi-eye-slash' : 'bi-eye'"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" name="remember" type="checkbox" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                <label for="remember" class="ml-2 block text-sm text-slate-700">Ingat saya</label>
                            </div>

                            <div class="text-sm">
                                <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Lupa password?</a>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="flex w-full justify-center rounded-xl bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-all">
                                Masuk
                            </button>
                        </div>
                    </form>
                </div>

                <!-- QR Login Form -->
                <div x-show="loginMethod === 'qr'" style="display: none;" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-x-4" x-transition:enter-end="opacity-100 transform translate-x-0" class="text-center pb-4">
                    <div class="w-48 h-48 mx-auto bg-slate-50 border-2 border-dashed border-slate-300 rounded-2xl flex flex-col items-center justify-center text-slate-400 mb-6">
                        <i class="bi bi-camera text-4xl mb-2"></i>
                        <span class="text-sm font-medium">Arahkan QR ke Kamera</span>
                    </div>

                    <p class="text-sm text-slate-600 mb-6">Pastikan QR Code terlihat jelas di layar untuk memindai.</p>

                    <button type="button" class="inline-flex w-full justify-center rounded-xl bg-slate-900 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 transition-all">
                        <i class="bi bi-upc-scan mr-2"></i> Buka Kamera Scanner
                    </button>

                    <div class="mt-4 pt-4 border-t border-slate-100">
                        <p class="text-xs text-slate-500">Fitur scanner membutuhkan akses kamera perangkat Anda.</p>
                    </div>
                </div>

            </div>
        </div>

        <p class="mt-8 text-center text-sm text-slate-500">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </p>
    </div>
</body>
</html>