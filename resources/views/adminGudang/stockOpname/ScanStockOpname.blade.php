@extends('layouts.app')

@section('content')
<!-- Header: Kembali + Sesi Aktif -->
<div class="mb-4 flex items-center justify-between">
    <a href="{{ route('admin_gudang.stock_opname.index') }}" class="inline-flex items-center gap-1 text-sm font-medium text-gray-500 hover:text-error-500 dark:text-gray-400 dark:hover:text-error-400 transition-colors">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="hidden sm:inline">Jeda & Kembali</span>
        <span class="sm:hidden">Jeda</span>
    </a>
    
    <div class="flex items-center gap-2 rounded-full border border-brand-200 bg-brand-50 px-3 py-1 dark:border-brand-800 dark:bg-brand-900/20">
        <span class="relative flex h-2 w-2">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-400 opacity-75"></span>
          <span class="relative inline-flex rounded-full h-2 w-2 bg-brand-500"></span>
        </span>
        <span class="text-xs font-semibold text-brand-600 dark:text-brand-400">SO Kuartal 1 2026</span>
    </div>
</div>

<!-- Scanner Card (Selalu di atas) -->
<div class="rounded-2xl border border-gray-200 bg-white p-4 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-5 mb-4">
    <!-- Input Barcode -->
    <div class="relative mb-3">
        <input type="text" id="so_barcode" name="barcode" placeholder="Scan atau ketik barcode..." autofocus
            class="h-12 w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-10 pr-12 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" /></svg>
        </span>
        <button type="button" onclick="startScanner()" class="absolute right-2 top-1/2 -translate-y-1/2 rounded-md bg-gray-100 p-1.5 text-gray-500 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition-colors" title="Scan Barcode">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 013.75 9.375v-4.5zM3.75 14.625c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5a1.125 1.125 0 01-1.125-1.125v-4.5zM13.5 4.875c0-.621.504-1.125 1.125-1.125h4.5c.621 0 1.125.504 1.125 1.125v4.5c0 .621-.504 1.125-1.125 1.125h-4.5A1.125 1.125 0 0113.5 9.375v-4.5z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h.75v.75h-.75v-.75zM6.75 16.5h.75v.75h-.75v-.75zM16.5 6.75h.75v.75h-.75v-.75zM13.5 13.5h.75v.75h-.75v-.75zM13.5 19.5h.75v.75h-.75v-.75zM19.5 13.5h.75v.75h-.75v-.75zM19.5 19.5h.75v.75h-.75v-.75zM16.5 16.5h.75v.75h-.75v-.75z" />
            </svg>
        </button>
    </div>

    <!-- Scanner Container -->
    <div id="scanner_container" class="mb-3 hidden max-w-md mx-auto">
        <div id="reader" class="overflow-hidden rounded-lg"></div>
        <button type="button" onclick="stopScanner()" class="mt-2 w-full rounded-lg border border-gray-300 bg-white py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">
            Tutup Scanner
        </button>
    </div>

    <!-- Info Barang (Muncul setelah discan) -->
    <div class="rounded-lg border border-brand-200 bg-brand-50 p-3 dark:border-brand-800 dark:bg-brand-900/20 mb-3">
        <div class="flex items-start justify-between gap-2">
            <div class="min-w-0">
                <p class="text-sm font-semibold text-gray-800 dark:text-white truncate">Kabel Eterna NYM 2x1.5</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">BRG-001 · Roll (50m)</p>
            </div>
            <span class="shrink-0 inline-flex rounded-md bg-white px-2 py-0.5 text-xs font-semibold text-brand-600 shadow-sm dark:bg-gray-800 dark:text-brand-400">Rak A1</span>
        </div>
        <div class="mt-2 flex items-center justify-between text-sm">
            <span class="text-gray-500 dark:text-gray-400">Stok Sistem:</span>
            <strong class="text-gray-800 dark:text-white">45 Roll</strong>
        </div>
    </div>

    <!-- Input Fisik + Tombol Simpan (Side by Side pada Mobile) -->
    <div class="flex items-end gap-3">
        <div class="grow">
            <label class="mb-1.5 block text-xs font-medium text-gray-600 dark:text-gray-400">
                Jumlah Fisik
            </label>
            <div class="flex items-center gap-1.5">
                <button type="button" onclick="document.getElementById('fisik').stepDown()" class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 active:bg-gray-200 active:scale-95 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" /></svg>
                </button>
                <input type="number" id="fisik" name="jumlah_fisik" value="45" min="0" class="h-12 w-full text-center rounded-lg border border-gray-300 bg-transparent px-2 text-xl font-bold text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                <button type="button" onclick="document.getElementById('fisik').stepUp()" class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 active:bg-gray-200 active:scale-95 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                </button>
            </div>
        </div>
        <button type="button" class="flex h-12 shrink-0 items-center justify-center gap-2 rounded-lg bg-brand-500 px-5 text-sm font-bold text-white hover:bg-brand-600 transition-all shadow-theme-xs active:scale-[0.97]">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
            <span class="hidden sm:inline">Simpan & Lanjut</span>
            <span class="sm:hidden">Simpan</span>
        </button>
    </div>
</div>

<!-- Daftar Barang Discan -->
<div class="rounded-2xl border border-gray-200 bg-white shadow-theme-xs dark:border-gray-800 dark:bg-gray-900">
    <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-800 p-4 sm:p-5">
        <h3 class="text-sm font-bold text-gray-800 dark:text-white sm:text-base">Barang Discan</h3>
        <span class="rounded-full bg-brand-50 px-2.5 py-0.5 text-xs font-medium text-brand-600 dark:bg-brand-500/10 dark:text-brand-400">3 Item</span>
    </div>
    
    <!-- Mobile Card List (visible on small screens) -->
    <div class="divide-y divide-gray-200 dark:divide-gray-800 sm:hidden">
        <!-- Card 1 -->
        <div class="flex items-center gap-3 p-4">
            <div class="min-w-0 grow">
                <p class="text-sm font-medium text-gray-800 dark:text-white/90 truncate">Semen Gresik 40Kg</p>
                <p class="text-xs text-gray-500">BRG-002</p>
                <div class="mt-1.5 flex items-center gap-3 text-xs">
                    <span class="text-gray-500 dark:text-gray-400">Sistem: <strong class="text-gray-700 dark:text-gray-300">50 Sak</strong></span>
                    <span class="text-gray-300 dark:text-gray-600">|</span>
                    <span class="text-gray-500 dark:text-gray-400">Fisik: <strong class="text-success-600 dark:text-success-400">50 Sak</strong></span>
                </div>
            </div>
            <button class="shrink-0 rounded-lg p-2 text-gray-400 hover:text-error-500 hover:bg-error-50 dark:hover:bg-error-900/20 transition-colors" title="Hapus">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
            </button>
        </div>
        <!-- Card 2 -->
        <div class="flex items-center gap-3 p-4">
            <div class="min-w-0 grow">
                <p class="text-sm font-medium text-gray-800 dark:text-white/90 truncate">Cat Dulux Putih 5Kg</p>
                <p class="text-xs text-gray-500">BRG-003</p>
                <div class="mt-1.5 flex items-center gap-3 text-xs">
                    <span class="text-gray-500 dark:text-gray-400">Sistem: <strong class="text-gray-700 dark:text-gray-300">10 Pail</strong></span>
                    <span class="text-gray-300 dark:text-gray-600">|</span>
                    <span class="text-gray-500 dark:text-gray-400">Fisik: <strong class="text-warning-600 dark:text-warning-400">12 Pail</strong></span>
                </div>
            </div>
            <button class="shrink-0 rounded-lg p-2 text-gray-400 hover:text-error-500 hover:bg-error-50 dark:hover:bg-error-900/20 transition-colors" title="Hapus">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
            </button>
        </div>
        <!-- Card 3 -->
        <div class="flex items-center gap-3 p-4">
            <div class="min-w-0 grow">
                <p class="text-sm font-medium text-gray-800 dark:text-white/90 truncate">Kabel Eterna NYM 2x1.5</p>
                <p class="text-xs text-gray-500">BRG-001</p>
                <div class="mt-1.5 flex items-center gap-3 text-xs">
                    <span class="text-gray-500 dark:text-gray-400">Sistem: <strong class="text-gray-700 dark:text-gray-300">45 Roll</strong></span>
                    <span class="text-gray-300 dark:text-gray-600">|</span>
                    <span class="text-gray-500 dark:text-gray-400">Fisik: <strong class="text-error-600 dark:text-error-400">43 Roll</strong></span>
                </div>
            </div>
            <button class="shrink-0 rounded-lg p-2 text-gray-400 hover:text-error-500 hover:bg-error-50 dark:hover:bg-error-900/20 transition-colors" title="Hapus">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
            </button>
        </div>
    </div>

    <!-- Desktop Table (hidden on small screens) -->
    <div class="hidden sm:block max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-50 text-left dark:bg-gray-800">
                    <th class="min-w-[200px] px-5 py-3 font-medium text-gray-800 dark:text-white/90">Nama Barang</th>
                    <th class="px-5 py-3 font-medium text-gray-800 dark:text-white/90 text-center">Stok Sistem</th>
                    <th class="px-5 py-3 font-medium text-gray-800 dark:text-white/90 text-center">Fisik</th>
                    <th class="px-5 py-3 font-medium text-gray-800 dark:text-white/90 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-5 py-3">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Semen Gresik 40Kg</p>
                        <p class="text-xs text-gray-500">BRG-002</p>
                    </td>
                    <td class="px-5 py-3 text-center text-sm font-medium text-gray-600 dark:text-gray-400">50 Sak</td>
                    <td class="px-5 py-3 text-center">
                        <span class="inline-flex rounded-full bg-success-50 px-2.5 py-1 text-sm font-bold text-success-600 dark:bg-success-500/10 dark:text-success-400">50 Sak</span>
                    </td>
                    <td class="px-5 py-3 text-center">
                        <button class="text-gray-400 hover:text-error-500 transition-colors" title="Hapus"><svg class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg></button>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-5 py-3">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Cat Dulux Putih 5Kg</p>
                        <p class="text-xs text-gray-500">BRG-003</p>
                    </td>
                    <td class="px-5 py-3 text-center text-sm font-medium text-gray-600 dark:text-gray-400">10 Pail</td>
                    <td class="px-5 py-3 text-center">
                        <span class="inline-flex rounded-full bg-warning-50 px-2.5 py-1 text-sm font-bold text-warning-600 dark:bg-warning-500/10 dark:text-warning-400">12 Pail</span>
                    </td>
                    <td class="px-5 py-3 text-center">
                        <button class="text-gray-400 hover:text-error-500 transition-colors" title="Hapus"><svg class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg></button>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-5 py-3">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Kabel Eterna NYM 2x1.5</p>
                        <p class="text-xs text-gray-500">BRG-001</p>
                    </td>
                    <td class="px-5 py-3 text-center text-sm font-medium text-gray-600 dark:text-gray-400">45 Roll</td>
                    <td class="px-5 py-3 text-center">
                        <span class="inline-flex rounded-full bg-error-50 px-2.5 py-1 text-sm font-bold text-error-600 dark:bg-error-500/10 dark:text-error-400">43 Roll</span>
                    </td>
                    <td class="px-5 py-3 text-center">
                        <button class="text-gray-400 hover:text-error-500 transition-colors" title="Hapus"><svg class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Tombol Selesai (Fixed bottom bar on mobile) -->
<div class="mt-4 sm:mt-6">
    <a href="{{ route('admin_gudang.stock_opname.review') }}" class="flex w-full items-center justify-center gap-2 rounded-lg border-2 border-dashed border-gray-300 bg-transparent px-5 py-3.5 text-sm font-bold text-gray-600 hover:border-brand-500 hover:text-brand-500 dark:border-gray-700 dark:text-gray-400 dark:hover:border-brand-500 transition-all">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        Selesai Scan & Lihat Selisih
    </a>
</div>

<!-- HTML5-QRCode Library -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    let html5QrCode = null;

    function startScanner() {
        const scannerContainer = document.getElementById('scanner_container');
        scannerContainer.classList.remove('hidden');

        if (!html5QrCode) {
            html5QrCode = new Html5Qrcode("reader");
            const config = {
                fps: 15,
                qrbox: { width: 250, height: 120 },
                formatsToSupport: [
                    Html5QrcodeSupportedFormats.EAN_13,
                    Html5QrcodeSupportedFormats.EAN_8,
                    Html5QrcodeSupportedFormats.CODE_128,
                    Html5QrcodeSupportedFormats.CODE_39,
                    Html5QrcodeSupportedFormats.UPC_A
                ]
            };
            
            html5QrCode.start(
                { facingMode: "environment" },
                config,
                onScanSuccess,
                (errorMessage) => { /* ignore */ }
            ).catch((err) => {
                console.error("Gagal memulai kamera", err);
                alert("Kamera tidak dapat diakses. Pastikan Anda memberikan izin kamera pada browser.");
            });
        }
    }

    function stopScanner() {
        const scannerContainer = document.getElementById('scanner_container');
        if (html5QrCode) {
            html5QrCode.stop().then(() => {
                html5QrCode.clear();
                html5QrCode = null;
                scannerContainer.classList.add('hidden');
            }).catch(error => {
                console.error("Failed to stop scanner:", error);
                scannerContainer.classList.add('hidden');
            });
        } else {
            scannerContainer.classList.add('hidden');
        }
    }

    function onScanSuccess(decodedText) {
        document.getElementById('so_barcode').value = decodedText;

        // Suara "tet" pendek
        try {
            const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioCtx.createOscillator();
            const gainNode = audioCtx.createGain();
            oscillator.type = 'square';
            oscillator.frequency.value = 2500;
            gainNode.gain.value = 0.05;
            oscillator.connect(gainNode);
            gainNode.connect(audioCtx.destination);
            oscillator.start();
            setTimeout(() => { oscillator.stop(); audioCtx.close(); }, 80);
        } catch(e) {}

        stopScanner();

        // Highlight input
        const input = document.getElementById('so_barcode');
        input.classList.add('border-brand-500', 'ring-2', 'ring-brand-200');
        setTimeout(() => { input.classList.remove('border-brand-500', 'ring-2', 'ring-brand-200'); }, 1500);
    }
</script>
@endsection
