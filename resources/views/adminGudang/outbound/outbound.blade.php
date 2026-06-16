@extends('layouts.app')

@section('content')

<!-- ====== Outbound / Barang Keluar Section Start ====== -->
<div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-7.5">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Barang Keluar</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Catat stok barang yang keluar atau diretur dari gudang.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <input type="text" placeholder="Cari transaksi..." class="h-10 w-full rounded-lg border border-gray-300 bg-transparent px-4 pl-10 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white sm:w-64">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>
            </div>
            <a href="{{ route('admin_gudang.outbound.create') }}" class="flex items-center justify-center gap-2 rounded-lg bg-error-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-error-600 transition-all shadow-theme-xs">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Catat Barang Keluar
            </a>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-50 text-left dark:bg-gray-800">
                    <th class="px-4 py-3.5 w-12 text-center">
                        <label class="flex cursor-pointer items-center justify-center">
                            <div class="relative">
                                <input type="checkbox" id="checkAll" onclick="toggleAll(this)" class="peer sr-only" />
                                <div class="border-gray-300 bg-transparent dark:border-gray-700 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] hover:border-error-500 dark:hover:border-error-500 peer-checked:border-error-500 peer-checked:bg-error-500 text-transparent peer-checked:text-white transition-colors">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="currentColor" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </th>
                    <th class="min-w-[100px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">No. Transaksi</th>
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Tanggal</th>
                    <th class="min-w-[200px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Nama Barang</th>
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-right">Jumlah Keluar</th>
                    <th class="min-w-[150px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Tujuan/Keterangan</th>
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Dicatat Oleh</th>
                    <th class="px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Data 1 -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4">
                        <label class="flex cursor-pointer items-center justify-center">
                            <div class="relative">
                                <input type="checkbox" name="selected[]" value="1" class="row-check peer sr-only" />
                                <div class="border-gray-300 bg-transparent dark:border-gray-700 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] hover:border-error-500 dark:hover:border-error-500 peer-checked:border-error-500 peer-checked:bg-error-500 text-transparent peer-checked:text-white transition-colors">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="currentColor" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-brand-600 dark:text-brand-400">OUT-2026-001</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">16 Jun 2026</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Kabel Eterna NYM 2x1.5</p>
                        <p class="text-xs text-gray-500">BRG-001 · Roll (50m)</p>
                    </td>
                    <td class="px-4 py-4 text-sm text-right">
                        <span class="inline-flex items-center gap-1 font-semibold text-error-600 dark:text-error-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" /></svg>
                            -5 Roll
                        </span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">Proyek Pembangunan A</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">Admin Gudang</td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-success-500/10 px-2.5 py-1 text-xs font-medium text-success-600 dark:text-success-400">Selesai</span>
                    </td>
                </tr>

                <!-- Dummy Data 2 -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4">
                        <label class="flex cursor-pointer items-center justify-center">
                            <div class="relative">
                                <input type="checkbox" name="selected[]" value="2" class="row-check peer sr-only" />
                                <div class="border-gray-300 bg-transparent dark:border-gray-700 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] hover:border-error-500 dark:hover:border-error-500 peer-checked:border-error-500 peer-checked:bg-error-500 text-transparent peer-checked:text-white transition-colors">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="currentColor" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-brand-600 dark:text-brand-400">OUT-2026-002</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">15 Jun 2026</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Semen Gresik 40Kg</p>
                        <p class="text-xs text-gray-500">BRG-002 · Sak</p>
                    </td>
                    <td class="px-4 py-4 text-sm text-right">
                        <span class="inline-flex items-center gap-1 font-semibold text-error-600 dark:text-error-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" /></svg>
                            -10 Sak
                        </span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400"><span class="text-warning-600 font-medium">Retur:</span> Barang Rusak</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">Admin Gudang</td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-success-500/10 px-2.5 py-1 text-xs font-medium text-success-600 dark:text-success-400">Selesai</span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Pagination & Bulk Actions -->
    <div class="mt-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div class="flex items-center gap-2">
            <button type="button" class="inline-flex items-center gap-1.5 rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" /></svg>
                Export Excel
            </button>
            <button type="button" id="btnDeleteSelected" class="hidden inline-flex items-center gap-1.5 rounded-lg border border-error-100 bg-error-50 px-3 py-2 text-sm font-medium text-error-600 hover:bg-error-100 dark:border-error-500/20 dark:bg-error-500/10 dark:text-error-400 dark:hover:bg-error-500/20 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                Hapus Terpilih
            </button>
        </div>

        <nav class="flex items-center gap-1">
            <a href="#" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 transition-colors">
                <span class="sr-only">Previous</span>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
            </a>
            <a href="#" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-brand-500 bg-brand-50 text-sm font-medium text-brand-600 dark:border-brand-500/50 dark:bg-brand-500/10 dark:text-brand-400">1</a>
            <a href="#" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">2</a>
            <a href="#" class="inline-flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 transition-colors">
                <span class="sr-only">Next</span>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
            </a>
        </nav>
    </div>
</div>
<!-- ====== Outbound / Barang Keluar Section End ====== -->

<script>
    function toggleAll(source) {
        const checkboxes = document.querySelectorAll('.row-check');
        checkboxes.forEach(cb => cb.checked = source.checked);
        updateDeleteButton();
    }

    document.querySelectorAll('.row-check').forEach(cb => {
        cb.addEventListener('change', updateDeleteButton);
    });

    function updateDeleteButton() {
        const anyChecked = Array.from(document.querySelectorAll('.row-check')).some(cb => cb.checked);
        const btnDelete = document.getElementById('btnDeleteSelected');
        if (anyChecked) {
            btnDelete.classList.remove('hidden');
        } else {
            btnDelete.classList.add('hidden');
        }
    }
</script>

@endsection
