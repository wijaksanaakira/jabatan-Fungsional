@props(['id', 'title'])

<div x-data="{ open: false }" @keydown.escape.window="open = false" id="{{ $id }}" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;" x-show="open">
    <div x-show="open" x-transition.opacity class="fixed inset-0 bg-slate-900/75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-show="open"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 @click.away="open = false"
                 class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">

                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg font-semibold leading-6 text-slate-900" id="modal-title">{{ $title }}</h3>
                            <div class="mt-2">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>

                @if (isset($footer))
                <div class="bg-slate-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    {{ $footer }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>