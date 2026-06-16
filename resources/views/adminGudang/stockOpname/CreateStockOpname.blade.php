@extends('layouts.app')

@section('content')
<!-- Tombol Kembali -->
<div class="mb-5">
    <a href="{{ route('admin_gudang.stock_opname.index') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 hover:text-brand-500 dark:text-gray-400 dark:hover:text-brand-400 transition-colors">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali ke Daftar SO
    </a>
</div>

<div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-7.5">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Mulai Stock Opname Baru
        </h2>
    </div>

    <!-- action akan mengarah ke route scan nantinya -->
    <form action="{{ route('admin_gudang.stock_opname.scan') }}" method="GET">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

            <!-- Nama Sesi SO -->
            <div class="sm:col-span-2">
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Nama Sesi <span class="text-error-500">*</span>
                </label>
                <input type="text" name="nama_sesi" placeholder="Contoh: SO Kuartal 1 2026" required
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Catatan -->
            <div class="sm:col-span-2">
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Catatan <span class="text-gray-400 font-normal text-xs">(Opsional)</span>
                </label>
                <textarea name="catatan" rows="3" placeholder="Keterangan tambahan..."
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white resize-none"></textarea>
            </div>

            <!-- Tombol Mulai -->
            <div class="sm:col-span-2 mt-4 w-full">
                <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-500 px-5 py-3 text-sm font-bold text-white hover:bg-brand-600 transition-all shadow-theme-xs active:scale-[0.98]">
                    Mulai Sesi & Buka Scanner
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
