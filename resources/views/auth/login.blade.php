@extends('layouts.auth')

@section('content')
    <div class="relative z-1 flex min-h-screen w-full bg-white">

        <!-- ===== Left Panel - Branding ===== -->
        <div class="relative hidden w-1/2 overflow-hidden lg:flex lg:items-center lg:justify-center">
            <!-- Blue Gradient Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-700 via-blue-500 to-blue-400"></div>

            <!-- Decorative Pattern Overlay -->
            <div class="absolute inset-0 opacity-[0.06]" style="background-image: url('data:image/svg+xml,<svg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;><g fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;><g fill=&quot;%23ffffff&quot; fill-opacity=&quot;1&quot;><path d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/></g></g></svg>');"></div>

            <!-- Floating Decorative Circles -->
            <div class="absolute top-20 left-16 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>
            <div class="absolute bottom-32 right-20 h-40 w-40 rounded-full bg-blue-300/20 blur-2xl"></div>
            <div class="absolute top-1/3 right-16 h-24 w-24 rounded-full bg-white/10 blur-xl"></div>

            <!-- Grid Shape Decorative -->
            <div class="absolute inset-0 z-0 flex items-center justify-center">
                <x-common.common-grid-shape/>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex max-w-md flex-col items-center px-8 text-center">
                <!-- Logo Icon -->
                <div class="mb-8">
                    <div class="inline-flex h-20 w-20 items-center justify-center rounded-2xl bg-white/15 backdrop-blur-sm shadow-lg">
                        <svg class="h-10 w-10 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 7H4C3.44772 7 3 7.44772 3 8V19C3 19.5523 3.44772 20 4 20H20C20.5523 20 21 19.5523 21 19V8C21 7.44772 20.5523 7 20 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16 7V5C16 4.46957 15.7893 3.96086 15.4142 3.58579C15.0391 3.21071 14.5304 3 14 3H10C9.46957 3 8.96086 3.21071 8.58579 3.58579C8.21071 3.96086 8 4.46957 8 5V7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 12V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 12H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>

                <!-- Brand Name -->
                <h1 class="mb-3 text-3xl font-bold tracking-tight text-white">
                    Stock Opname
                </h1>

                <!-- Tagline -->
                <p class="mb-8 text-base leading-relaxed text-blue-100/80">
                    Sistem manajemen inventaris modern untuk mengelola stok barang toko Anda dengan mudah, cepat, dan akurat.
                </p>

                <!-- Feature Highlights -->
                <div class="space-y-4 w-full">
                    <div class="flex items-center gap-4 rounded-xl bg-white/10 px-5 py-3.5 text-left transition-all duration-300 hover:bg-white/15">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white/15">
                            <svg class="h-5 w-5 text-blue-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">Pencatatan Real-time</p>
                            <p class="text-xs text-blue-100/60">Catat stok masuk & keluar secara langsung</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 rounded-xl bg-white/10 px-5 py-3.5 text-left transition-all duration-300 hover:bg-white/15">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white/15">
                            <svg class="h-5 w-5 text-blue-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">Laporan Lengkap</p>
                            <p class="text-xs text-blue-100/60">Analisis data inventaris dengan mudah</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 rounded-xl bg-white/10 px-5 py-3.5 text-left transition-all duration-300 hover:bg-white/15">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-white/15">
                            <svg class="h-5 w-5 text-blue-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-white">Keamanan Terjamin</p>
                            <p class="text-xs text-blue-100/60">Data toko Anda aman & terenkripsi</p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <p class="mt-10 text-xs text-blue-200/40">
                    &copy; {{ date('Y') }} Stock Opname. All rights reserved.
                </p>
            </div>
        </div>

        <!-- ===== Right Panel - Login Form ===== -->
        <div class="flex w-full flex-1 flex-col bg-white lg:w-1/2">
            <!-- Mobile Header -->
            <div class="flex items-center justify-center gap-3 px-6 pt-8 lg:hidden">
                <div class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500">
                    <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7H4C3.44772 7 3 7.44772 3 8V19C3 19.5523 3.44772 20 4 20H20C20.5523 20 21 19.5523 21 19V8C21 7.44772 20.5523 7 20 7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 7V5C16 4.46957 15.7893 3.96086 15.4142 3.58579C15.0391 3.21071 14.5304 3 14 3H10C9.46957 3 8.96086 3.21071 8.58579 3.58579C8.21071 3.96086 8 4.46957 8 5V7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 12V15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 12H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <span class="text-lg font-bold text-gray-800">Stock Opname</span>
            </div>

            <!-- Form Content -->
            <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center px-6 py-8 sm:px-8 lg:px-12">
                <div class="animate-fade-in-up">
                    <!-- Heading -->
                    <div class="mb-8">
                        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                            Selamat Datang!
                        </h1>
                        <p class="mt-2 text-sm text-gray-500">
                            Masukkan NIK dan password untuk masuk ke akun Anda
                        </p>
                    </div>

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 animate-fade-in-up">
                            <div class="flex items-start gap-3">
                                <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                <div>
                                    @foreach ($errors->all() as $error)
                                        <p class="text-sm text-red-700">{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="space-y-5">
                            <!-- NIK -->
                            <div class="animate-fade-in-up delay-100" style="opacity: 0; animation-fill-mode: forwards;">
                                <label for="login-nik" class="mb-1.5 block text-sm font-medium text-gray-700">
                                    NIK (Nomor Induk Karyawan) <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                                        </svg>
                                    </span>
                                    <input type="text" id="login-nik" name="nik" placeholder="Masukkan NIK Anda"
                                        value="{{ old('nik') }}" autofocus
                                        class="h-12 w-full rounded-xl border border-gray-300 bg-white py-3 pr-4 pl-12 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-400 focus:ring-3 focus:ring-blue-100 focus:outline-none transition-all duration-200" />
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="animate-fade-in-up delay-200" style="opacity: 0; animation-fill-mode: forwards;">
                                <label for="login-password" class="mb-1.5 block text-sm font-medium text-gray-700">
                                    Password <span class="text-red-500">*</span>
                                </label>
                                <div x-data="{ showPassword: false }" class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                        </svg>
                                    </span>
                                    <input :type="showPassword ? 'text' : 'password'" id="login-password" name="password"
                                        placeholder="Masukkan password Anda"
                                        class="h-12 w-full rounded-xl border border-gray-300 bg-white py-3 pr-12 pl-12 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-400 focus:ring-3 focus:ring-blue-100 focus:outline-none transition-all duration-200" />
                                    <button type="button" @click="showPassword = !showPassword"
                                        class="absolute top-1/2 right-4 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                        <svg x-show="!showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z" fill="" />
                                        </svg>
                                        <svg x-show="showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z" fill="" />
                                        </svg>
                                    </button>
                                </div>
                                <p class="mt-2 text-xs text-gray-400">
                                    <svg class="inline-block h-3.5 w-3.5 mr-1 -mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                    </svg>
                                    Login pertama kali? Password default adalah NIK Anda.
                                </p>
                            </div>

                            <!-- Remember Me -->
                            <div class="flex items-center animate-fade-in-up delay-300" style="opacity: 0; animation-fill-mode: forwards;">
                                <div x-data="{ checked: false }">
                                    <label for="remember-me" class="flex cursor-pointer items-center gap-2.5 text-sm text-gray-600 select-none">
                                        <div class="relative">
                                            <input type="checkbox" id="remember-me" name="remember" class="sr-only" @change="checked = !checked" />
                                            <div :class="checked ? 'border-blue-500 bg-blue-500' : 'bg-white border-gray-300'"
                                                class="flex h-5 w-5 items-center justify-center rounded-md border-[1.5px] transition-all duration-200">
                                                <span :class="checked ? 'opacity-100 scale-100' : 'opacity-0 scale-75'" class="transition-all duration-200">
                                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.6666 3.5L5.24992 9.91667L2.33325 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                        Ingat saya
                                    </label>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="animate-fade-in-up delay-400" style="opacity: 0; animation-fill-mode: forwards;">
                                <button type="submit" id="login-submit-btn"
                                    class="group relative flex w-full items-center justify-center gap-2 overflow-hidden rounded-xl bg-blue-500 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-blue-500/25 transition-all duration-300 hover:bg-blue-600 hover:shadow-xl hover:shadow-blue-500/30 active:scale-[0.98]">
                                    <span class="relative z-10">Masuk</span>
                                    <svg class="relative z-10 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Mobile Footer -->
            <div class="pb-6 text-center lg:hidden">
                <p class="text-xs text-gray-400">&copy; {{ date('Y') }} Stock Opname</p>
            </div>
        </div>
    </div>
@endsection