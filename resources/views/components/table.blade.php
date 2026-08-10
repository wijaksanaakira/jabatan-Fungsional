<div class="overflow-x-auto bg-white rounded-xl shadow-sm border border-slate-200">
    <table class="min-w-full divide-y divide-slate-200">
        <thead class="bg-slate-50">
            {{ $header }}
        </thead>
        <tbody class="divide-y divide-slate-200 bg-white">
            {{ $slot }}
        </tbody>
    </table>
</div>