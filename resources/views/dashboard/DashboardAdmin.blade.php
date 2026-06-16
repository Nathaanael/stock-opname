@extends('layouts.app')

@section('content')
<div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

    <!-- <nav>
        <ol class="flex items-center gap-2">
            <li>
                <a class="font-medium" href="{{ route('dashboard') }}">Dashboard /</a>
            </li>
            <li class="font-medium text-brand-500">Overview</li>
        </ol>
    </nav> -->
</div>

<div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-theme-xs dark:border-gray-800 dark:bg-gray-900 sm:p-7.5">
    <div class="mb-4">
        <h3 class="text-xl font-semibold text-gray-800 dark:text-white/90">
            Selamat Datang, Admin Gudang!
        </h3>
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
            Ini adalah halaman dashboard utama untuk Anda. Silakan kelola stok dan data barang melalui menu yang tersedia.
        </p>
    </div>

    <!-- <div class="mt-6 flex">
        <a href="{{ route('admin_gudang.items.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-500 px-6 py-3 text-sm font-medium text-white hover:bg-brand-600 transition-colors">
            Kelola Master Barang
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
            </svg>
        </a>
    </div> -->
</div>
@endsection
