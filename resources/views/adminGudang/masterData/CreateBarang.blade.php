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
                        class="w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-4 pr-32 text-sm text-gray-800 focus:border-brand-500 focus:ring-1 focus:ring-brand-500 focus:outline-hidden dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                    
                    <button type="button" onclick="startScanner()" class="absolute right-2 top-1/2 flex -translate-y-1/2 items-center gap-1.5 rounded-md bg-brand-50 px-3 py-1.5 text-xs font-medium text-brand-600 hover:bg-brand-100 dark:bg-brand-500/10 dark:hover:bg-brand-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                        </svg>
                        Scan Barcode
                    </button>
                </div>
                
                <!-- Scanner Viewport (Hidden by default) -->
                <div id="scanner_container" class="mt-4 hidden overflow-hidden rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800">
                    <div class="flex items-center justify-between border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 px-4 py-3">
                        <span class="text-sm font-semibold text-gray-800 dark:text-white">Arahkan Kamera ke Barcode</span>
                        <button type="button" onclick="stopScanner()" class="text-gray-500 hover:text-error-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div id="reader" style="width: 100%; max-width: 600px; margin: 0 auto;"></div>
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
            <div class="sm:col-span-2 mt-4 flex items-center justify-end gap-3">
                <a href="{{ route('admin_gudang.items.index') }}" class="flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-900 transition-all shadow-theme-xs">
                    Batal
                </a>
                <button type="submit" class="flex items-center justify-center gap-2 rounded-lg bg-brand-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-brand-600 transition-all shadow-theme-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
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
    let html5QrcodeScanner = null;

    function startScanner() {
        const scannerContainer = document.getElementById('scanner_container');
        scannerContainer.classList.remove('hidden');

        if (!html5QrcodeScanner) {
            // Optimasi Konfigurasi Scanner
            const config = { 
                fps: 15, // Ditingkatkan sedikit untuk responsibilitas (aman untuk HP)
                qrbox: { width: 250, height: 120 }, // Area scan lebih pipih fokus ke barcode 1D
                rememberLastUsedCamera: true,
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],
                formatsToSupport: [
                    // Hanya gunakan format barcode retail umum untuk mengurangi beban CPU (mempercepat scan)
                    Html5QrcodeSupportedFormats.EAN_13,
                    Html5QrcodeSupportedFormats.EAN_8,
                    Html5QrcodeSupportedFormats.CODE_128,
                    Html5QrcodeSupportedFormats.CODE_39,
                    Html5QrcodeSupportedFormats.UPC_A
                ]
            };

            html5QrcodeScanner = new Html5QrcodeScanner("reader", config, /* verbose= */ false);
            
            // Render the scanner
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        }
    }

    function stopScanner() {
        const scannerContainer = document.getElementById('scanner_container');
        
        if (html5QrcodeScanner) {
            html5QrcodeScanner.clear().then(() => {
                html5QrcodeScanner = null;
                scannerContainer.classList.add('hidden');
            }).catch(error => {
                console.error("Failed to clear html5QrcodeScanner. ", error);
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
