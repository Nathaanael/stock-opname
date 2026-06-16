@extends('layouts.app')

@section('content')
<!-- Tombol Kembali -->
<div class="mb-5">
    <a href="{{ route('admin_gudang.items.index') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 hover:text-brand-500 dark:text-gray-400 dark:hover:text-brand-400 transition-colors">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali ke Data Barang
    </a>
</div>

<div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-7.5">
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Tambah Master Barang
        </h2>
    </div>
    <form action="#" method="POST">
        @csrf
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
            
            <!-- Kode Barang / Barcode -->
            <div class="sm:col-span-2">
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Kode Barang / Barcode <span class="text-error-500">*</span>
                </label>
                <div class="relative">
                    <input type="text" id="barcode_input" name="kode_barang" placeholder="Ketik kode barang atau scan barcode" required
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

            <!-- Nama Barang -->
            <div class="sm:col-span-2">
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Nama Barang <span class="text-error-500">*</span>
                </label>
                <input type="text" name="nama_barang" placeholder="Masukkan nama barang" required
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Kategori -->
            <div>
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Kategori <span class="text-error-500">*</span>
                </label>
                <select name="kategori" required
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="Listrik">Listrik</option>
                    <option value="Bahan Bangunan">Bahan Bangunan</option>
                    <option value="Cat & Kuas">Cat & Kuas</option>
                    <option value="Alat Pertukangan">Alat Pertukangan</option>
                    <option value="Pipa & Pompa Air">Pipa & Pompa Air</option>
                </select>
            </div>

            <!-- Satuan -->
            <div>
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Satuan <span class="text-error-500">*</span>
                </label>
                <select name="satuan" required
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    <option value="" disabled selected>Pilih satuan</option>
                    <option value="Roll">Roll</option>
                    <option value="Sak">Sak</option>
                    <option value="Pail">Pail</option>
                    <option value="Pcs">Pcs</option>
                    <option value="Meter">Meter</option>
                    <option value="Dus">Dus</option>
                </select>
            </div>

            <!-- Harga Jual -->
            <div>
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Harga Jual <span class="text-error-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 text-sm">Rp</span>
                    <input type="number" name="harga_jual" placeholder="0" min="0" required
                        class="w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-10 pr-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                </div>
            </div>

            <!-- Stok Awal -->
            <div>
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Stok Awal
                </label>
                <input type="number" name="stok_awal" placeholder="0" min="0" value="0"
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Lokasi Rak -->
            <div>
                <label class="mb-2.5 block text-sm font-medium text-gray-800 dark:text-white">
                    Lokasi Rak <span class="text-gray-400 font-normal text-xs">(Opsional)</span>
                </label>
                <input type="text" name="lokasi_rak" placeholder="Contoh: Rak A1, Gudang Belakang"
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 px-4 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
            </div>

            <!-- Tombol Aksi -->
            <div class="sm:col-span-2 mt-4 w-full">
                <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-500 px-5 py-3 text-sm font-bold text-white hover:bg-brand-600 transition-all shadow-theme-xs active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Simpan Barang
                </button>
            </div>
        </div>
    </form>
</div>

<!-- HTML5-QRCode Library for Barcode Scanning -->
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
                onScanFailure
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

    function onScanSuccess(decodedText, decodedResult) {
        // Handle the scanned barcode
        document.getElementById('barcode_input').value = decodedText;
        
        // Suara "tet" pendek ala scanner kasir menggunakan Web Audio API (Tanpa delay file eksternal)
        try {
            const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioCtx.createOscillator();
            const gainNode = audioCtx.createGain();
            
            oscillator.type = 'square';
            oscillator.frequency.value = 2500; // Frekuensi khas scanner laser
            gainNode.gain.value = 0.05; // Volume rendah/tidak berisik
            
            oscillator.connect(gainNode);
            gainNode.connect(audioCtx.destination);
            
            oscillator.start();
            setTimeout(() => {
                oscillator.stop();
                audioCtx.close();
            }, 80); // 80ms sangat pendek = "tet"
        } catch(e) { console.warn("Audio beep failed:", e); }

        // Stop the scanner automatically after successful scan
        stopScanner();
        
        // Optional: Highlight the input to show it was updated
        const input = document.getElementById('barcode_input');
        input.classList.add('ring-2', 'ring-brand-500', 'bg-brand-50', 'dark:bg-brand-500/10');
        setTimeout(() => {
            input.classList.remove('ring-2', 'ring-brand-500', 'bg-brand-50', 'dark:bg-brand-500/10');
        }, 1500);
    }

    function onScanFailure(error) {
        // Handle scan failure, usually better to ignore and keep scanning
        // console.warn(`Code scan error = ${error}`);
    }
</script>
@endsection
