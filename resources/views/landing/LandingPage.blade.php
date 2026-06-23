@extends('layouts.landing')

@section('content')
<div class="flex flex-col items-center justify-center min-h-[calc(100vh-160px)] py-10 w-full">
    
    <!-- Header Section -->
    <div class="text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight dark:text-white sm:text-5xl">
            Selamat Datang, <span class="text-brand-500">{{ auth()->user()->name ?? 'Owner' }}</span>!
        </h2>
        <p class="mt-4 text-lg text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">
            Silakan pilih modul operasional yang ingin Anda akses hari ini.
        </p>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full max-w-4xl px-4 mx-auto">
        
        <!-- Kotak Pencatatan Jual Beli (Kasir) -->
        <a href="#" class="group relative flex flex-col items-center justify-center rounded-3xl bg-white border border-gray-100 dark:border-gray-800 dark:bg-gray-900 p-10 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl overflow-hidden min-h-[320px]">
            <!-- Decorative gradient blur -->
            <div class="absolute -top-24 -right-24 w-56 h-56 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 transition-opacity duration-300 group-hover:opacity-30"></div>
            
            <!-- Ikon Kasir / Transaksi -->
            <div class="mb-6 rounded-2xl bg-blue-50 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400 p-6 shadow-sm transition-all duration-300 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white dark:group-hover:bg-blue-600">
                <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white text-center mb-3">Pencatatan Jual Beli</h3>
            <p class="text-gray-500 dark:text-gray-400 text-center text-sm font-medium leading-relaxed px-4">Buka antarmuka Kasir (Point of Sales) untuk melayani transaksi pelanggan secara efisien.</p>
        </a>

        <!-- Kotak Stock Opname -->
        <a href="{{ route('admin_gudang.stock_opname.index') }}" class="group relative flex flex-col items-center justify-center rounded-3xl bg-white border border-gray-100 dark:border-gray-800 dark:bg-gray-900 p-10 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl overflow-hidden min-h-[320px]">
            <!-- Decorative gradient blur -->
            <div class="absolute -top-24 -right-24 w-56 h-56 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-10 transition-opacity duration-300 group-hover:opacity-30"></div>
            
            <!-- Ikon Stock Opname -->
            <div class="mb-6 rounded-2xl bg-pink-50 text-pink-600 dark:bg-pink-900/30 dark:text-pink-400 p-6 shadow-sm transition-all duration-300 group-hover:scale-110 group-hover:bg-pink-600 group-hover:text-white dark:group-hover:bg-pink-600">
                <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
            </div>
            
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white text-center mb-3">Stock Opname</h3>
            <p class="text-gray-500 dark:text-gray-400 text-center text-sm font-medium leading-relaxed px-4">Buka manajemen Gudang untuk melakukan penyesuaian inventaris secara akurat.</p>
        </a>

    </div>
</div>
@endsection