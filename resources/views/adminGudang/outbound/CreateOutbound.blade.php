@extends('layouts.app')

@section('content')
<!-- Header: Kembali -->
<div class="mb-4 flex items-center justify-between">
    <a href="{{ route('admin_gudang.outbound.index') }}" class="inline-flex items-center gap-1 text-sm font-medium text-gray-500 hover:text-error-500 dark:text-gray-400 dark:hover:text-error-400 transition-colors">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="hidden sm:inline">Kembali ke Barang Keluar</span>
        <span class="sm:hidden">Kembali</span>
    </a>
</div>

<!-- Scanner Card (Selalu di atas, sama persis dengan ScanStockOpname) -->
<div class="rounded-2xl border border-gray-200 bg-white p-4 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-5 mb-4">
    <!-- Input Barcode -->
    <div class="relative mb-3">
        <input type="text" id="barcode_input" name="barcode" placeholder="Scan atau ketik barcode..." autofocus
            class="h-12 w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-10 pr-12 text-sm text-gray-800 focus:border-error-500 focus:ring-1 focus:ring-error-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
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
    <div class="rounded-lg border border-error-200 bg-error-50 p-3 dark:border-error-800 dark:bg-error-900/20 mb-3">
        <div class="flex items-start justify-between gap-2">
            <div class="min-w-0">
                <p class="text-sm font-semibold text-gray-800 dark:text-white truncate">Kabel Eterna NYM 2x1.5</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">BRG-001 · Roll (50m)</p>
            </div>
            <span class="shrink-0 inline-flex rounded-md bg-white px-2 py-0.5 text-xs font-semibold text-error-600 shadow-sm dark:bg-gray-800 dark:text-error-400">Stok: 45 Roll</span>
        </div>
    </div>

    <!-- Input Jumlah Keluar + Tombol Simpan (Side by Side, sama seperti ScanStockOpname) -->
    <div class="flex items-end gap-3">
        <div class="grow">
            <label class="mb-1.5 block text-xs font-medium text-gray-600 dark:text-gray-400">
                Jumlah Keluar
            </label>
            <div class="flex items-center gap-1.5">
                <button type="button" onclick="document.getElementById('jumlah').stepDown()" class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 active:bg-gray-200 active:scale-95 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" /></svg>
                </button>
                <input type="number" id="jumlah" name="jumlah" value="1" min="1" class="h-12 w-full text-center rounded-lg border border-gray-300 bg-transparent px-2 text-xl font-bold text-gray-800 focus:border-error-500 focus:ring-1 focus:ring-error-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                <button type="button" onclick="document.getElementById('jumlah').stepUp()" class="flex h-12 w-12 shrink-0 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 active:bg-gray-200 active:scale-95 transition-all">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                </button>
            </div>
        </div>
        <button type="button" class="flex h-12 shrink-0 items-center justify-center gap-2 rounded-lg bg-error-500 px-5 text-sm font-bold text-white hover:bg-error-600 transition-all shadow-theme-xs active:scale-[0.97]">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" /></svg>
            <span class="hidden sm:inline">Simpan & Lanjut</span>
            <span class="sm:hidden">Simpan</span>
        </button>
    </div>
</div>

<!-- Detail Transaksi Card (di bawah, bisa di-collapse di mobile) -->
<div class="rounded-2xl border border-gray-200 bg-white shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 mb-4">
    <button type="button" onclick="document.getElementById('detail_panel').classList.toggle('hidden'); this.querySelector('.chevron-icon').classList.toggle('rotate-180')" class="flex w-full items-center justify-between border-b border-gray-200 dark:border-gray-800 p-4 sm:p-5 text-left">
        <h3 class="text-sm font-bold text-gray-800 dark:text-white sm:text-base">Detail Transaksi</h3>
        <svg class="chevron-icon h-5 w-5 text-gray-400 transition-transform sm:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" /></svg>
    </button>

    <div id="detail_panel" class="p-4 sm:p-5 sm:block">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <!-- Tanggal -->
            <div>
                <label class="mb-1.5 block text-xs font-medium text-gray-600 dark:text-gray-400">
                    Tanggal Keluar <span class="text-error-500">*</span>
                </label>
                <input type="date" name="tanggal" required value="{{ date('Y-m-d') }}"
                    class="h-12 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm text-gray-800 focus:border-error-500 focus:ring-1 focus:ring-error-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Jenis Pengeluaran -->
            <div>
                <label class="mb-1.5 block text-xs font-medium text-gray-600 dark:text-gray-400">
                    Jenis Pengeluaran <span class="text-error-500">*</span>
                </label>
                <select name="jenis" required class="h-12 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm text-gray-800 focus:border-error-500 focus:ring-1 focus:ring-error-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    <option value="penggunaan">Penggunaan Internal / Proyek</option>
                    <option value="retur">Retur ke Supplier (Barang Rusak)</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            <!-- Tujuan / Penerima -->
            <div>
                <label class="mb-1.5 block text-xs font-medium text-gray-600 dark:text-gray-400">
                    Tujuan / Penerima <span class="text-error-500">*</span>
                </label>
                <input type="text" name="tujuan" placeholder="Contoh: Proyek A, Mandor B..." required
                    class="h-12 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm text-gray-800 focus:border-error-500 focus:ring-1 focus:ring-error-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Catatan -->
            <div>
                <label class="mb-1.5 block text-xs font-medium text-gray-600 dark:text-gray-400">
                    Catatan
                </label>
                <input type="text" name="catatan" placeholder="Keterangan tambahan (opsional)..."
                    class="h-12 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm text-gray-800 focus:border-error-500 focus:ring-1 focus:ring-error-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>
        </div>
    </div>
</div>

<!-- Daftar Barang Keluar (Sama seperti ScanStockOpname) -->
<div class="rounded-2xl border border-gray-200 bg-white shadow-theme-xs dark:border-gray-800 dark:bg-gray-900">
    <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-800 p-4 sm:p-5">
        <h3 class="text-sm font-bold text-gray-800 dark:text-white sm:text-base">Barang Dikeluarkan</h3>
        <span class="rounded-full bg-error-50 px-2.5 py-0.5 text-xs font-medium text-error-600 dark:bg-error-500/10 dark:text-error-400">2 Item</span>
    </div>
    
    <!-- Mobile Card List -->
    <div class="divide-y divide-gray-200 dark:divide-gray-800 sm:hidden">
        <!-- Card 1 -->
        <div class="flex items-center gap-3 p-4">
            <div class="min-w-0 grow">
                <p class="text-sm font-medium text-gray-800 dark:text-white/90 truncate">Kabel Eterna NYM 2x1.5</p>
                <p class="text-xs text-gray-500">BRG-001</p>
                <div class="mt-1.5 flex items-center gap-3 text-xs">
                    <span class="text-gray-500 dark:text-gray-400">Stok: <strong class="text-gray-700 dark:text-gray-300">45 Roll</strong></span>
                    <span class="text-gray-300 dark:text-gray-600">|</span>
                    <span class="text-gray-500 dark:text-gray-400">Keluar: <strong class="text-error-600 dark:text-error-400">-5 Roll</strong></span>
                </div>
            </div>
            <button class="shrink-0 rounded-lg p-2 text-gray-400 hover:text-error-500 hover:bg-error-50 dark:hover:bg-error-900/20 transition-colors" title="Hapus">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
            </button>
        </div>
        <!-- Card 2 -->
        <div class="flex items-center gap-3 p-4">
            <div class="min-w-0 grow">
                <p class="text-sm font-medium text-gray-800 dark:text-white/90 truncate">Semen Gresik 40Kg</p>
                <p class="text-xs text-gray-500">BRG-002</p>
                <div class="mt-1.5 flex items-center gap-3 text-xs">
                    <span class="text-gray-500 dark:text-gray-400">Stok: <strong class="text-gray-700 dark:text-gray-300">50 Sak</strong></span>
                    <span class="text-gray-300 dark:text-gray-600">|</span>
                    <span class="text-gray-500 dark:text-gray-400">Keluar: <strong class="text-error-600 dark:text-error-400">-10 Sak</strong></span>
                </div>
            </div>
            <button class="shrink-0 rounded-lg p-2 text-gray-400 hover:text-error-500 hover:bg-error-50 dark:hover:bg-error-900/20 transition-colors" title="Hapus">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
            </button>
        </div>
    </div>

    <!-- Desktop Table -->
    <div class="hidden sm:block max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-50 text-left dark:bg-gray-800">
                    <th class="min-w-[200px] px-5 py-3 font-medium text-gray-800 dark:text-white/90">Nama Barang</th>
                    <th class="px-5 py-3 font-medium text-gray-800 dark:text-white/90 text-center">Stok Saat Ini</th>
                    <th class="px-5 py-3 font-medium text-gray-800 dark:text-white/90 text-center">Jumlah Keluar</th>
                    <th class="px-5 py-3 font-medium text-gray-800 dark:text-white/90 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-5 py-3">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Kabel Eterna NYM 2x1.5</p>
                        <p class="text-xs text-gray-500">BRG-001</p>
                    </td>
                    <td class="px-5 py-3 text-center text-sm font-medium text-gray-600 dark:text-gray-400">45 Roll</td>
                    <td class="px-5 py-3 text-center">
                        <span class="inline-flex rounded-full bg-error-50 px-2.5 py-1 text-sm font-bold text-error-600 dark:bg-error-500/10 dark:text-error-400">-5 Roll</span>
                    </td>
                    <td class="px-5 py-3 text-center">
                        <button class="text-gray-400 hover:text-error-500 transition-colors" title="Hapus"><svg class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg></button>
                    </td>
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50">
                    <td class="px-5 py-3">
                        <p class="text-sm font-medium text-gray-800 dark:text-white/90">Semen Gresik 40Kg</p>
                        <p class="text-xs text-gray-500">BRG-002</p>
                    </td>
                    <td class="px-5 py-3 text-center text-sm font-medium text-gray-600 dark:text-gray-400">50 Sak</td>
                    <td class="px-5 py-3 text-center">
                        <span class="inline-flex rounded-full bg-error-50 px-2.5 py-1 text-sm font-bold text-error-600 dark:bg-error-500/10 dark:text-error-400">-10 Sak</span>
                    </td>
                    <td class="px-5 py-3 text-center">
                        <button class="text-gray-400 hover:text-error-500 transition-colors" title="Hapus"><svg class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Tombol Selesai -->
<div class="mt-4 sm:mt-6">
    <a href="{{ route('admin_gudang.outbound.index') }}" class="flex w-full items-center justify-center gap-2 rounded-lg border-2 border-dashed border-gray-300 bg-transparent px-5 py-3.5 text-sm font-bold text-gray-600 hover:border-error-500 hover:text-error-500 dark:border-gray-700 dark:text-gray-400 dark:hover:border-error-500 transition-all">
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        Selesai & Simpan Semua
    </a>
</div>

<!-- HTML5-QRCode Library -->
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    let html5QrcodeScanner = null;

    function startScanner() {
        const scannerContainer = document.getElementById('scanner_container');
        scannerContainer.classList.remove('hidden');

        if (!html5QrcodeScanner) {
            const config = {
                fps: 15,
                qrbox: { width: 250, height: 120 },
                rememberLastUsedCamera: true,
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],
                formatsToSupport: [
                    Html5QrcodeSupportedFormats.EAN_13,
                    Html5QrcodeSupportedFormats.EAN_8,
                    Html5QrcodeSupportedFormats.CODE_128,
                    Html5QrcodeSupportedFormats.CODE_39,
                    Html5QrcodeSupportedFormats.UPC_A
                ]
            };
            html5QrcodeScanner = new Html5QrcodeScanner("reader", config, false);
            html5QrcodeScanner.render(onScanSuccess, () => {});
        }
    }

    function stopScanner() {
        const scannerContainer = document.getElementById('scanner_container');
        if (html5QrcodeScanner) {
            html5QrcodeScanner.clear().then(() => {
                html5QrcodeScanner = null;
                scannerContainer.classList.add('hidden');
            }).catch(error => {
                console.error("Failed to clear scanner:", error);
            });
        } else {
            scannerContainer.classList.add('hidden');
        }
    }

    function onScanSuccess(decodedText) {
        document.getElementById('barcode_input').value = decodedText;

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
        const input = document.getElementById('barcode_input');
        input.classList.add('border-error-500', 'ring-2', 'ring-error-200');
        setTimeout(() => { input.classList.remove('border-error-500', 'ring-2', 'ring-error-200'); }, 1500);
    }
</script>
@endsection
