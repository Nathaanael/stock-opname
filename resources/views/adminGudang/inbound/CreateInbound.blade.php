@extends('layouts.app')

@section('content')
<!-- Tombol Kembali -->
<div class="mb-5">
    <a href="{{ route('admin_gudang.inbound.index') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 hover:text-brand-500 dark:text-gray-400 dark:hover:text-brand-400 transition-colors">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali ke Barang Masuk
    </a>
</div>

<div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-7.5">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Tambah Barang Masuk
        </h2>
    </div>

    <form action="#" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">

            <!-- Cari / Scan Barang -->
            <div class="sm:col-span-2">
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Cari / Scan Barang <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <input type="text" id="inbound_barcode" name="barcode" placeholder="Scan barcode atau ketik nama barang..."
                        class="h-11 w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-10 pr-12 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
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
                <div id="scanner_container" class="mt-3 hidden max-w-md">
                    <div id="reader" class="overflow-hidden rounded-lg"></div>
                    <button type="button" onclick="stopScanner()" class="mt-2 w-full rounded-lg border border-gray-300 bg-white py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">
                        Tutup Scanner
                    </button>
                </div>
            </div>

            <!-- Info Barang Terpilih -->
            <div class="sm:col-span-2">
                <div class="rounded-lg border border-brand-200 bg-brand-50 p-4 dark:border-brand-800 dark:bg-brand-900/20">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-100 dark:bg-brand-800/40">
                            <svg class="h-5 w-5 text-brand-600 dark:text-brand-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800 dark:text-white">Kabel Eterna NYM 2x1.5</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">BRG-001 · Roll (50m)</p>
                            <div class="mt-2 flex flex-wrap items-center gap-3">
                                <span class="inline-flex items-center gap-1 text-xs font-medium text-gray-500 dark:text-gray-400">
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" /></svg>
                                    Stok saat ini: <strong class="text-gray-800 dark:text-white">45 Roll</strong>
                                </span>
                                <span class="inline-flex items-center gap-1 text-xs font-medium text-gray-500 dark:text-gray-400">
                                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
                                    Rak A1
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jumlah Masuk -->
            <div>
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Jumlah Masuk <span class="text-red-500">*</span>
                </label>
                <input type="number" name="jumlah" placeholder="0" min="1"
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Nama Supplier -->
            <div>
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Nama Supplier <span class="text-gray-400 font-normal text-xs">(Opsional)</span>
                </label>
                <input type="text" name="supplier" placeholder="Contoh: PT. Eterna Kabel"
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Catatan -->
            <div class="sm:col-span-2">
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Catatan <span class="text-gray-400 font-normal text-xs">(Opsional)</span>
                </label>
                <textarea name="catatan" rows="3" placeholder="Contoh: Barang datang dari supplier pagi ini, kondisi baik..."
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white resize-none"></textarea>
            </div>

            <!-- Tombol Simpan -->
            <div class="sm:col-span-2 mt-4 w-full">
                <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-500 px-5 py-3 text-sm font-bold text-white hover:bg-brand-600 transition-all shadow-theme-xs active:scale-[0.98]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                    Simpan Barang Masuk
                </button>
            </div>
        </div>
    </form>
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
        document.getElementById('inbound_barcode').value = decodedText;

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
        const input = document.getElementById('inbound_barcode');
        input.classList.add('border-brand-500', 'ring-2', 'ring-brand-200');
        setTimeout(() => { input.classList.remove('border-brand-500', 'ring-2', 'ring-brand-200'); }, 1500);
    }
</script>

@endsection
