@extends('layouts.app')

@section('content')
<!-- ====== Stock Opname Section Start ====== -->
<div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-7.5">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Stock Opname</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400">Kelola jadwal dan riwayat opname stok fisik gudang.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="relative">
                <input type="text" placeholder="Cari sesi..." class="h-10 w-full rounded-lg border border-gray-300 bg-transparent px-4 pl-10 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white sm:w-64">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </span>
            </div>
            <a href="{{ route('admin_gudang.stock_opname.create') }}" class="flex items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 transition-all shadow-theme-xs">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Mulai SO Baru
            </a>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-50 text-left dark:bg-gray-800">
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">ID Sesi</th>
                    <th class="min-w-[200px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Nama Sesi</th>
                    <th class="min-w-[150px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Tanggal Mulai</th>
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90">Progress</th>
                    <th class="min-w-[120px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-center">Status</th>
                    <th class="min-w-[100px] px-4 py-3.5 font-medium text-gray-800 dark:text-white/90 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Data 1 (Sedang Berjalan) -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4 text-sm font-medium text-brand-600 dark:text-brand-400">SO-2026-003</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Stock Opname Juni 2026</p>
                        <p class="text-xs text-gray-500">Penanggung Jawab: Admin Gudang</p>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">16 Jun 2026</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between text-xs font-medium">
                                <span>45 / 120 Item</span>
                                <span>37.5%</span>
                            </div>
                            <div class="h-2 w-full max-w-[120px] rounded-full bg-gray-200 dark:bg-gray-700">
                                <div class="h-full rounded-full bg-brand-500" style="width: 37.5%;"></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-brand-500/10 px-2.5 py-1 text-xs font-medium text-brand-600 dark:text-brand-400">Berjalan</span>
                    </td>
                    <td class="px-4 py-4 text-right">
                        <a href="#" class="inline-flex items-center gap-1.5 rounded-lg bg-brand-50 px-3 py-1.5 text-xs font-medium text-brand-600 hover:bg-brand-100 dark:bg-brand-500/10 dark:hover:bg-brand-500/20">
                            Lanjut Scan
                        </a>
                    </td>
                </tr>

                <!-- Dummy Data 2 (Menunggu Review) -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4 text-sm font-medium text-gray-600 dark:text-gray-400">SO-2026-002</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Stock Opname Mei 2026</p>
                        <p class="text-xs text-gray-500">Penanggung Jawab: Admin Gudang</p>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">01 Mei 2026</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between text-xs font-medium">
                                <span>120 / 120 Item</span>
                                <span>100%</span>
                            </div>
                            <div class="h-2 w-full max-w-[120px] rounded-full bg-gray-200 dark:bg-gray-700">
                                <div class="h-full rounded-full bg-warning-500" style="width: 100%;"></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-warning-500/10 px-2.5 py-1 text-xs font-medium text-warning-600 dark:text-warning-400">Review</span>
                    </td>
                    <td class="px-4 py-4 text-right">
                        <a href="#" class="inline-flex items-center gap-1.5 rounded-lg border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                            Lihat Selisih
                        </a>
                    </td>
                </tr>

                <!-- Dummy Data 3 (Selesai) -->
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors">
                    <td class="px-4 py-4 text-sm font-medium text-gray-600 dark:text-gray-400">SO-2026-001</td>
                    <td class="px-4 py-4">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Stock Opname April 2026</p>
                        <p class="text-xs text-gray-500">Penanggung Jawab: Admin Gudang</p>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">01 Apr 2026</td>
                    <td class="px-4 py-4 text-sm text-gray-600 dark:text-gray-400">
                        <div class="flex flex-col gap-1.5">
                            <div class="flex justify-between text-xs font-medium">
                                <span>118 / 118 Item</span>
                                <span>100%</span>
                            </div>
                            <div class="h-2 w-full max-w-[120px] rounded-full bg-gray-200 dark:bg-gray-700">
                                <div class="h-full rounded-full bg-success-500" style="width: 100%;"></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex rounded-full bg-success-500/10 px-2.5 py-1 text-xs font-medium text-success-600 dark:text-success-400">Selesai</span>
                    </td>
                    <td class="px-4 py-4 text-right">
                        <a href="#" class="inline-flex items-center gap-1.5 rounded-lg border border-gray-300 bg-white px-3 py-1.5 text-xs font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                            Riwayat
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
