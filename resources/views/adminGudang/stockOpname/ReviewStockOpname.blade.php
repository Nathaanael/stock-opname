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

<div class="rounded-2xl border border-gray-200 bg-white shadow-theme-xs dark:border-gray-800 dark:bg-gray-900">
    <!-- Header Card -->
    <div class="border-b border-gray-200 p-5 dark:border-gray-800 sm:p-7.5">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-title-md2 font-bold text-black dark:text-white">
                    Review Hasil Stock Opname
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Sesi: <span class="font-semibold text-gray-800 dark:text-white">SO Kuartal 1 2026</span> (SO-2026-003)
                </p>
            </div>
            
            <div class="flex items-center gap-3">
                <a href="{{ route('admin_gudang.stock_opname.scan') }}" class="inline-flex h-10 items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">
                    Revisi Scan
                </a>
                <a href="{{ route('admin_gudang.stock_opname.index') }}" class="inline-flex h-10 items-center justify-center gap-2 rounded-lg bg-success-500 px-4 text-sm font-medium text-white hover:bg-success-600 transition-colors shadow-theme-xs">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Approve & Sesuaikan Stok
                </a>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800">
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Item Discan</p>
                <p class="mt-1 text-2xl font-bold text-gray-800 dark:text-white">120 <span class="text-sm font-normal text-gray-500">Barang</span></p>
            </div>
            <div class="rounded-lg border border-success-200 bg-success-50 p-4 dark:border-success-800 dark:bg-success-900/20">
                <p class="text-sm font-medium text-success-600 dark:text-success-400">Stok Cocok</p>
                <p class="mt-1 text-2xl font-bold text-success-700 dark:text-success-300">115 <span class="text-sm font-normal">Barang</span></p>
            </div>
            <div class="rounded-lg border border-error-200 bg-error-50 p-4 dark:border-error-800 dark:bg-error-900/20">
                <p class="text-sm font-medium text-error-600 dark:text-error-400">Terdapat Selisih</p>
                <p class="mt-1 text-2xl font-bold text-error-700 dark:text-error-300">5 <span class="text-sm font-normal">Barang</span></p>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="max-w-full overflow-x-auto p-5 sm:p-7.5">
        <h3 class="mb-4 text-lg font-bold text-gray-800 dark:text-white">Rincian Perbedaan Stok</h3>
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-50 text-left dark:bg-gray-800">
                    <th class="min-w-[220px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Nama Barang</th>
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-center">Stok Sistem</th>
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-center">Stok Fisik</th>
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-center">Selisih</th>
                    <th class="min-w-[150px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy 1: Cocok -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Kabel Eterna NYM 2x1.5</p>
                        <p class="text-xs text-gray-500">BRG-001</p>
                    </td>
                    <td class="px-4 py-4 text-center text-sm text-gray-600 dark:text-gray-400">45 Roll</td>
                    <td class="px-4 py-4 text-center text-sm font-bold text-gray-800 dark:text-white">45 Roll</td>
                    <td class="px-4 py-4 text-center text-sm text-gray-500">-</td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-success-500/10 px-2.5 py-1 text-xs font-medium text-success-600 dark:text-success-400">Cocok</span>
                    </td>
                </tr>

                <!-- Dummy 2: Kurang -->
                <tr class="border-b border-gray-200 bg-error-50/50 dark:border-gray-800 hover:bg-error-50 dark:bg-error-900/10 dark:hover:bg-error-900/20 transition-colors">
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Semen Gresik 40Kg</p>
                        <p class="text-xs text-gray-500">BRG-002</p>
                    </td>
                    <td class="px-4 py-4 text-center text-sm text-gray-600 dark:text-gray-400">50 Sak</td>
                    <td class="px-4 py-4 text-center text-sm font-bold text-error-600 dark:text-error-400">48 Sak</td>
                    <td class="px-4 py-4 text-center text-sm font-bold text-error-600 dark:text-error-400">-2</td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-error-500/10 px-2.5 py-1 text-xs font-medium text-error-600 dark:text-error-400">Barang Kurang</span>
                    </td>
                </tr>

                <!-- Dummy 3: Lebih -->
                <tr class="border-b border-gray-200 bg-warning-50/50 dark:border-gray-800 hover:bg-warning-50 dark:bg-warning-900/10 dark:hover:bg-warning-900/20 transition-colors">
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Cat Dulux Putih 5Kg</p>
                        <p class="text-xs text-gray-500">BRG-003</p>
                    </td>
                    <td class="px-4 py-4 text-center text-sm text-gray-600 dark:text-gray-400">10 Pail</td>
                    <td class="px-4 py-4 text-center text-sm font-bold text-warning-600 dark:text-warning-400">12 Pail</td>
                    <td class="px-4 py-4 text-center text-sm font-bold text-warning-600 dark:text-warning-400">+2</td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-warning-500/10 px-2.5 py-1 text-xs font-medium text-warning-600 dark:text-warning-400">Barang Lebih</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
