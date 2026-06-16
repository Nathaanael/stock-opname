@extends('layouts.app')

@section('content')

<!-- ====== Inbound / Barang Masuk Section Start ====== -->
<div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-7.5">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Barang Masuk</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Catat stok barang yang masuk dari supplier ke gudang.</p>
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
            <a href="{{ route('admin_gudang.inbound.create') }}" class="flex items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 transition-all shadow-theme-xs">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Barang
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
                                <div class="border-gray-300 bg-transparent dark:border-gray-700 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] hover:border-brand-500 dark:hover:border-brand-500 peer-checked:border-brand-500 peer-checked:bg-brand-500 text-transparent peer-checked:text-white transition-colors">
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
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-right">Jumlah Masuk</th>
                    <th class="min-w-[150px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Supplier</th>
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
                                <div class="border-gray-300 bg-transparent dark:border-gray-700 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] hover:border-brand-500 dark:hover:border-brand-500 peer-checked:border-brand-500 peer-checked:bg-brand-500 text-transparent peer-checked:text-white transition-colors">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="currentColor" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-brand-600 dark:text-brand-400">IN-2026-001</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">16 Jun 2026</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Kabel Eterna NYM 2x1.5</p>
                        <p class="text-xs text-gray-500">BRG-001 · Roll (50m)</p>
                    </td>
                    <td class="px-4 py-4 text-sm text-right">
                        <span class="inline-flex items-center gap-1 font-semibold text-success-600 dark:text-success-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" /></svg>
                            +20 Roll
                        </span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">PT. Eterna Kabel</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">Admin Gudang</td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-success-500/10 px-2.5 py-1 text-xs font-medium text-success-600 dark:text-success-400">Diterima</span>
                    </td>
                </tr>

                <!-- Dummy Data 2 -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4">
                        <label class="flex cursor-pointer items-center justify-center">
                            <div class="relative">
                                <input type="checkbox" name="selected[]" value="2" class="row-check peer sr-only" />
                                <div class="border-gray-300 bg-transparent dark:border-gray-700 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] hover:border-brand-500 dark:hover:border-brand-500 peer-checked:border-brand-500 peer-checked:bg-brand-500 text-transparent peer-checked:text-white transition-colors">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="currentColor" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-brand-600 dark:text-brand-400">IN-2026-002</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">15 Jun 2026</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Semen Gresik 40Kg</p>
                        <p class="text-xs text-gray-500">BRG-002 · Sak</p>
                    </td>
                    <td class="px-4 py-4 text-sm text-right">
                        <span class="inline-flex items-center gap-1 font-semibold text-success-600 dark:text-success-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" /></svg>
                            +50 Sak
                        </span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">CV. Semen Jaya</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">Admin Gudang</td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-success-500/10 px-2.5 py-1 text-xs font-medium text-success-600 dark:text-success-400">Diterima</span>
                    </td>
                </tr>

                <!-- Dummy Data 3 -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4">
                        <label class="flex cursor-pointer items-center justify-center">
                            <div class="relative">
                                <input type="checkbox" name="selected[]" value="3" class="row-check peer sr-only" />
                                <div class="border-gray-300 bg-transparent dark:border-gray-700 flex h-5 w-5 items-center justify-center rounded-md border-[1.25px] hover:border-brand-500 dark:hover:border-brand-500 peer-checked:border-brand-500 peer-checked:bg-brand-500 text-transparent peer-checked:text-white transition-colors">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="currentColor" stroke-width="1.94437" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </td>
                    <td class="px-4 py-4 text-sm font-medium text-brand-600 dark:text-brand-400">IN-2026-003</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">14 Jun 2026</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Cat Tembok Dulux Putih 5Kg</p>
                        <p class="text-xs text-gray-500">BRG-003 · Pail</p>
                    </td>
                    <td class="px-4 py-4 text-sm text-right">
                        <span class="inline-flex items-center gap-1 font-semibold text-success-600 dark:text-success-400">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" /></svg>
                            +10 Pail
                        </span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">Toko Cat Pelangi</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">Admin Gudang</td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-warning-500/10 px-2.5 py-1 text-xs font-medium text-warning-600 dark:text-warning-400">Pending</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex items-center justify-between">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1 - 3 <span class="font-normal text-gray-400 dark:text-gray-500">/ 12</span></p>
        <div class="flex items-center gap-1">
            <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
            </button>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-500 text-white font-medium">1</button>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800">2</button>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800">3</button>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </button>
        </div>
    </div>
</div>
<!-- ====== Inbound / Barang Masuk Section End ====== -->

<script>
    function toggleAll(source) {
        const checkboxes = document.querySelectorAll('.row-check');
        checkboxes.forEach(cb => cb.checked = source.checked);
    }
</script>

@endsection
