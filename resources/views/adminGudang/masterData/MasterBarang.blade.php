@extends('layouts.app')

@section('content')

<!-- ====== Table Section Start -->
<div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-7.5">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Daftar Barang</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Kelola semua data barang yang ada di gudang.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <input type="text" placeholder="Cari barang..." class="h-10 w-full rounded-lg border border-gray-300 bg-transparent px-4 pl-10 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white sm:w-64">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>
            </div>
            <a href="{{ route('admin_gudang.items.create') }}" class="flex items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 transition-all shadow-theme-xs disabled:opacity-50 disabled:cursor-not-allowed">
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
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Kode</th>
                    <th class="min-w-[220px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Nama Barang</th>
                    <th class="min-w-[150px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Kategori</th>
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-right">Stok</th>
                    <th class="min-w-[150px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-right">Harga Jual</th>
                    <th class="px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Data 1 -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">BRG-001</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Kabel Eterna NYM 2x1.5</p>
                        <p class="text-xs text-gray-500">Roll (50m)</p>
                    </td>
                    <td class="px-4 py-4">
                        <span class="inline-flex rounded-full bg-warning-500/10 px-2.5 py-1 text-xs font-medium text-warning-600 dark:text-warning-400">Listrik</span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-800 dark:text-white/90 text-right font-medium">45 Roll</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400 text-right">Rp 325.000</td>
                    <td class="px-4 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <button class="text-gray-400 hover:text-brand-500 transition-colors" title="Edit">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
                            </button>
                            <button class="text-gray-400 hover:text-error-500 transition-colors" title="Hapus">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Dummy Data 2 -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">BRG-002</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Semen Gresik 40Kg</p>
                        <p class="text-xs text-gray-500">Sak</p>
                    </td>
                    <td class="px-4 py-4">
                        <span class="inline-flex rounded-full bg-brand-500/10 px-2.5 py-1 text-xs font-medium text-brand-600 dark:text-brand-400">Bahan Bangunan</span>
                    </td>
                    <td class="px-4 py-4 text-sm text-error-600 dark:text-error-400 text-right font-medium">5 Sak</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400 text-right">Rp 55.000</td>
                    <td class="px-4 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <button class="text-gray-400 hover:text-brand-500 transition-colors" title="Edit">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
                            </button>
                            <button class="text-gray-400 hover:text-error-500 transition-colors" title="Hapus">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Dummy Data 3 -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">BRG-003</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Cat Tembok Dulux Putih 5Kg</p>
                        <p class="text-xs text-gray-500">Pail</p>
                    </td>
                    <td class="px-4 py-4">
                        <span class="inline-flex rounded-full bg-success-500/10 px-2.5 py-1 text-xs font-medium text-success-600 dark:text-success-400">Cat & Kuas</span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-800 dark:text-white/90 text-right font-medium">12 Pail</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400 text-right">Rp 145.500</td>
                    <td class="px-4 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <button class="text-gray-400 hover:text-brand-500 transition-colors" title="Edit">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" /></svg>
                            </button>
                            <button class="text-gray-400 hover:text-error-500 transition-colors" title="Hapus">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination Dummy -->
    <div class="mt-6 flex items-center justify-between">
        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">1 - 3 <span class="font-normal text-gray-400 dark:text-gray-500">/ 45</span></p>
        <div class="flex items-center gap-1">
            <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
            </button>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg bg-brand-500 text-white font-medium">1</button>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800">2</button>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800">3</button>
            <span class="px-1 text-gray-500">...</span>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800">15</button>
            <button class="flex h-8 w-8 items-center justify-center rounded-lg border border-gray-300 text-gray-500 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
            </button>
        </div>
    </div>
</div>
<!-- ====== Table Section End -->
@endsection
