@extends('layouts.auth')

@section('content')
    <div class="relative z-1 flex min-h-screen w-full bg-white">

        <!-- ===== Left Panel ===== -->
        <div class="relative hidden w-1/2 overflow-hidden lg:flex lg:items-center lg:justify-center">
            <!-- Blue Gradient Background -->
            <div class="absolute inset-0 bg-gradient-to-br from-blue-700 via-blue-500 to-blue-400"></div>

            <!-- Decorative Pattern Overlay -->
            <div class="absolute inset-0 opacity-[0.06]" style="background-image: url('data:image/svg+xml,<svg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;><g fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;><g fill=&quot;%23ffffff&quot; fill-opacity=&quot;1&quot;><path d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/></g></g></svg>');"></div>

            <!-- Floating Circles -->
            <div class="absolute top-20 left-16 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>
            <div class="absolute bottom-32 right-20 h-40 w-40 rounded-full bg-blue-300/20 blur-2xl"></div>
            <div class="absolute top-1/3 right-16 h-24 w-24 rounded-full bg-white/10 blur-xl"></div>

            <!-- Grid Shape -->
            <div class="absolute inset-0 z-0 flex items-center justify-center">
                <x-common.common-grid-shape/>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex max-w-md flex-col items-center px-8 text-center">
                <!-- Icon -->
                <div class="mb-8">
                    <div class="inline-flex h-20 w-20 items-center justify-center rounded-2xl bg-white/15 backdrop-blur-sm shadow-lg">
                        <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                        </svg>
                    </div>
                </div>

                <!-- Title -->
                <h2 class="mb-3 text-2xl font-bold tracking-tight text-white">
                    Syarat Password Baru
                </h2>

                <!-- Subtitle -->
                <p class="mb-8 text-sm leading-relaxed text-blue-100/80">
                    Demi keamanan akun, password baru Anda harus memenuhi persyaratan berikut:
                </p>

                <!-- Requirements List -->
                <div class="space-y-3 w-full" x-data="passwordRequirements()">

                    <!-- Requirement 1 -->
                    <div class="flex items-center gap-4 rounded-xl px-5 py-3.5 text-left transition-all duration-500"
                        :class="checks.minLength ? 'bg-green-400/20 border border-green-300/30' : 'bg-white/10 border border-transparent'">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full transition-all duration-500"
                            :class="checks.minLength ? 'bg-green-400/30' : 'bg-white/15'">
                            <svg x-show="checks.minLength" class="h-4 w-4 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            <span x-show="!checks.minLength" class="text-xs font-bold text-white/70">1</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium transition-colors duration-300" :class="checks.minLength ? 'text-green-200' : 'text-white'">Minimal 8 karakter</p>
                            <p class="text-xs transition-colors duration-300" :class="checks.minLength ? 'text-green-300/60' : 'text-blue-100/50'">Password harus terdiri dari minimal 8 karakter</p>
                        </div>
                    </div>

                    <!-- Requirement 2 -->
                    <div class="flex items-center gap-4 rounded-xl px-5 py-3.5 text-left transition-all duration-500"
                        :class="checks.hasUppercase ? 'bg-green-400/20 border border-green-300/30' : 'bg-white/10 border border-transparent'">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full transition-all duration-500"
                            :class="checks.hasUppercase ? 'bg-green-400/30' : 'bg-white/15'">
                            <svg x-show="checks.hasUppercase" class="h-4 w-4 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            <span x-show="!checks.hasUppercase" class="text-xs font-bold text-white/70">2</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium transition-colors duration-300" :class="checks.hasUppercase ? 'text-green-200' : 'text-white'">Mengandung huruf kapital (A-Z)</p>
                            <p class="text-xs transition-colors duration-300" :class="checks.hasUppercase ? 'text-green-300/60' : 'text-blue-100/50'">Minimal satu huruf besar</p>
                        </div>
                    </div>

                    <!-- Requirement 3 -->
                    <div class="flex items-center gap-4 rounded-xl px-5 py-3.5 text-left transition-all duration-500"
                        :class="checks.hasNumber ? 'bg-green-400/20 border border-green-300/30' : 'bg-white/10 border border-transparent'">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full transition-all duration-500"
                            :class="checks.hasNumber ? 'bg-green-400/30' : 'bg-white/15'">
                            <svg x-show="checks.hasNumber" class="h-4 w-4 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            <span x-show="!checks.hasNumber" class="text-xs font-bold text-white/70">3</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium transition-colors duration-300" :class="checks.hasNumber ? 'text-green-200' : 'text-white'">Mengandung angka (0-9)</p>
                            <p class="text-xs transition-colors duration-300" :class="checks.hasNumber ? 'text-green-300/60' : 'text-blue-100/50'">Minimal satu karakter angka</p>
                        </div>
                    </div>

                    <!-- Requirement 4 -->
                    <div class="flex items-center gap-4 rounded-xl px-5 py-3.5 text-left transition-all duration-500"
                        :class="checks.notNik ? 'bg-green-400/20 border border-green-300/30' : (checks.isNik ? 'bg-red-400/20 border border-red-300/30' : 'bg-white/10 border border-transparent')">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full transition-all duration-500"
                            :class="checks.notNik ? 'bg-green-400/30' : (checks.isNik ? 'bg-red-400/30' : 'bg-white/15')">
                            <svg x-show="checks.notNik" class="h-4 w-4 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            <svg x-show="checks.isNik" class="h-4 w-4 text-red-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span x-show="!checks.notNik && !checks.isNik" class="text-xs font-bold text-white/70">4</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium transition-colors duration-300" :class="checks.notNik ? 'text-green-200' : (checks.isNik ? 'text-red-200' : 'text-white')">Tidak sama dengan NIK</p>
                            <p class="text-xs transition-colors duration-300" :class="checks.notNik ? 'text-green-300/60' : (checks.isNik ? 'text-red-300/60' : 'text-blue-100/50')">Gunakan password yang berbeda dari NIK Anda</p>
                        </div>
                    </div>

                    <!-- Requirement 5 -->
                    <div class="flex items-center gap-4 rounded-xl px-5 py-3.5 text-left transition-all duration-500"
                        :class="checks.confirmed ? 'bg-green-400/20 border border-green-300/30' : (checks.mismatch ? 'bg-red-400/20 border border-red-300/30' : 'bg-white/10 border border-transparent')">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full transition-all duration-500"
                            :class="checks.confirmed ? 'bg-green-400/30' : (checks.mismatch ? 'bg-red-400/30' : 'bg-white/15')">
                            <svg x-show="checks.confirmed" class="h-4 w-4 text-green-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            <svg x-show="checks.mismatch" class="h-4 w-4 text-red-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span x-show="!checks.confirmed && !checks.mismatch" class="text-xs font-bold text-white/70">5</span>
                        </div>
                        <div>
                            <p class="text-sm font-medium transition-colors duration-300" :class="checks.confirmed ? 'text-green-200' : (checks.mismatch ? 'text-red-200' : 'text-white')">Konfirmasi password cocok</p>
                            <p class="text-xs transition-colors duration-300" :class="checks.confirmed ? 'text-green-300/60' : (checks.mismatch ? 'text-red-300/60' : 'text-blue-100/50')">Ketik ulang password baru Anda dengan tepat</p>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <p class="mt-8 text-xs text-blue-200/40">
                    &copy; {{ date('Y') }} Stock Opname. All rights reserved.
                </p>
            </div>
        </div>

        <!-- ===== Right Panel - Form ===== -->
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
            <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center px-6 py-8 sm:px-8 lg:px-12"
                x-data="passwordRequirements()">
                <div class="animate-fade-in-up">
                    <!-- Heading -->
                    <div class="mb-8">
                        <div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100">
                            <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-900 sm:text-3xl">
                            Ubah Password
                        </h1>
                        <p class="mt-2 text-sm text-gray-500">
                            Ini adalah login pertama Anda. Silakan buat password baru yang aman untuk melanjutkan.
                        </p>
                        <div class="mt-3 flex items-center gap-2 rounded-lg bg-blue-50 px-3 py-2 border border-blue-100">
                            <svg class="h-4 w-4 text-blue-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                            </svg>
                            <p class="text-xs font-medium text-blue-700">
                                NIK Anda: <span class="font-bold">{{ Auth::user()->nik }}</span>
                            </p>
                        </div>
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

                    <!-- Mobile Requirements -->
                    <div class="mb-6 lg:hidden">
                        <p class="mb-3 text-xs font-semibold uppercase tracking-wider text-gray-400">Syarat Password</p>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-xs" :class="checks.minLength ? 'text-green-600' : 'text-gray-400'">
                                <svg x-show="checks.minLength" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                <span x-show="!checks.minLength" class="h-3.5 w-3.5 flex items-center justify-center">○</span>
                                Minimal 8 karakter
                            </div>
                            <div class="flex items-center gap-2 text-xs" :class="checks.hasUppercase ? 'text-green-600' : 'text-gray-400'">
                                <svg x-show="checks.hasUppercase" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                <span x-show="!checks.hasUppercase" class="h-3.5 w-3.5 flex items-center justify-center">○</span>
                                Mengandung huruf kapital (A-Z)
                            </div>
                            <div class="flex items-center gap-2 text-xs" :class="checks.hasNumber ? 'text-green-600' : 'text-gray-400'">
                                <svg x-show="checks.hasNumber" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                <span x-show="!checks.hasNumber" class="h-3.5 w-3.5 flex items-center justify-center">○</span>
                                Mengandung angka (0-9)
                            </div>
                            <div class="flex items-center gap-2 text-xs" :class="checks.notNik ? 'text-green-600' : (checks.isNik ? 'text-red-500' : 'text-gray-400')">
                                <svg x-show="checks.notNik" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                <svg x-show="checks.isNik" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                <span x-show="!checks.notNik && !checks.isNik" class="h-3.5 w-3.5 flex items-center justify-center">○</span>
                                Tidak sama dengan NIK
                            </div>
                            <div class="flex items-center gap-2 text-xs" :class="checks.confirmed ? 'text-green-600' : (checks.mismatch ? 'text-red-500' : 'text-gray-400')">
                                <svg x-show="checks.confirmed" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>
                                <svg x-show="checks.mismatch" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                <span x-show="!checks.confirmed && !checks.mismatch" class="h-3.5 w-3.5 flex items-center justify-center">○</span>
                                Konfirmasi password cocok
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="space-y-5">
                            <!-- New Password -->
                            <div class="animate-fade-in-up delay-100" style="opacity: 0; animation-fill-mode: forwards;">
                                <label for="reset-password" class="mb-1.5 block text-sm font-medium text-gray-700">
                                    Password Baru <span class="text-red-500">*</span>
                                </label>
                                <div x-data="{ showPassword: false }" class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                        </svg>
                                    </span>
                                    <input :type="showPassword ? 'text' : 'password'" id="reset-password" name="password"
                                        placeholder="Masukkan password baru"
                                        x-on:input="$dispatch('password-changed', { value: $event.target.value })"
                                        class="h-12 w-full rounded-xl border border-gray-300 bg-white py-3 pr-12 pl-12 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-400 focus:ring-3 focus:ring-blue-100 focus:outline-none transition-all duration-200" />
                                    <button type="button" @click="showPassword = !showPassword"
                                        class="absolute top-1/2 right-4 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                        <svg x-show="!showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z" fill="" /></svg>
                                        <svg x-show="showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z" fill="" /></svg>
                                    </button>
                                </div>

                                <!-- Password Strength Bar -->
                                <div class="mt-3 space-y-1.5">
                                    <div class="flex gap-1">
                                        <div class="h-1.5 flex-1 rounded-full transition-all duration-300"
                                            :class="strength >= 1 ? (strength <= 2 ? 'bg-red-400' : strength <= 3 ? 'bg-amber-400' : 'bg-green-500') : 'bg-gray-200'"></div>
                                        <div class="h-1.5 flex-1 rounded-full transition-all duration-300"
                                            :class="strength >= 2 ? (strength <= 2 ? 'bg-red-400' : strength <= 3 ? 'bg-amber-400' : 'bg-green-500') : 'bg-gray-200'"></div>
                                        <div class="h-1.5 flex-1 rounded-full transition-all duration-300"
                                            :class="strength >= 3 ? (strength <= 3 ? 'bg-amber-400' : 'bg-green-500') : 'bg-gray-200'"></div>
                                        <div class="h-1.5 flex-1 rounded-full transition-all duration-300"
                                            :class="strength >= 4 ? 'bg-green-500' : 'bg-gray-200'"></div>
                                        <div class="h-1.5 flex-1 rounded-full transition-all duration-300"
                                            :class="strength >= 5 ? 'bg-green-500' : 'bg-gray-200'"></div>
                                    </div>
                                    <p class="text-xs transition-colors duration-300"
                                        :class="strength === 0 ? 'text-gray-400' : strength <= 2 ? 'text-red-500' : strength <= 3 ? 'text-amber-500' : 'text-green-600'"
                                        x-text="strengthLabel"></p>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="animate-fade-in-up delay-200" style="opacity: 0; animation-fill-mode: forwards;">
                                <label for="reset-password-confirm" class="mb-1.5 block text-sm font-medium text-gray-700">
                                    Konfirmasi Password <span class="text-red-500">*</span>
                                </label>
                                <div x-data="{ showPassword: false }" class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                        </svg>
                                    </span>
                                    <input :type="showPassword ? 'text' : 'password'" id="reset-password-confirm" name="password_confirmation"
                                        placeholder="Ulangi password baru"
                                        x-on:input="$dispatch('confirm-changed', { value: $event.target.value })"
                                        class="h-12 w-full rounded-xl border border-gray-300 bg-white py-3 pr-12 pl-12 text-sm text-gray-800 placeholder:text-gray-400 focus:border-blue-400 focus:ring-3 focus:ring-blue-100 focus:outline-none transition-all duration-200" />
                                    <button type="button" @click="showPassword = !showPassword"
                                        class="absolute top-1/2 right-4 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                                        <svg x-show="!showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20"><path fill-rule="evenodd" clip-rule="evenodd" d="M10.0002 13.8619C7.23361 13.8619 4.86803 12.1372 3.92328 9.70241C4.86804 7.26761 7.23361 5.54297 10.0002 5.54297C12.7667 5.54297 15.1323 7.26762 16.0771 9.70243C15.1323 12.1372 12.7667 13.8619 10.0002 13.8619ZM10.0002 4.04297C6.48191 4.04297 3.49489 6.30917 2.4155 9.4593C2.3615 9.61687 2.3615 9.78794 2.41549 9.94552C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C13.5184 15.3619 16.5055 13.0957 17.5849 9.94555C17.6389 9.78797 17.6389 9.6169 17.5849 9.45932C16.5055 6.30919 13.5184 4.04297 10.0002 4.04297ZM9.99151 7.84413C8.96527 7.84413 8.13333 8.67606 8.13333 9.70231C8.13333 10.7286 8.96527 11.5605 9.99151 11.5605H10.0064C11.0326 11.5605 11.8646 10.7286 11.8646 9.70231C11.8646 8.67606 11.0326 7.84413 10.0064 7.84413H9.99151Z" fill="" /></svg>
                                        <svg x-show="showPassword" class="fill-current" width="20" height="20" viewBox="0 0 20 20"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.63803 3.57709C4.34513 3.2842 3.87026 3.2842 3.57737 3.57709C3.28447 3.86999 3.28447 4.34486 3.57737 4.63775L4.85323 5.91362C3.74609 6.84199 2.89363 8.06395 2.4155 9.45936C2.3615 9.61694 2.3615 9.78801 2.41549 9.94558C3.49488 13.0957 6.48191 15.3619 10.0002 15.3619C11.255 15.3619 12.4422 15.0737 13.4994 14.5598L15.3625 16.4229C15.6554 16.7158 16.1302 16.7158 16.4231 16.4229C16.716 16.13 16.716 15.6551 16.4231 15.3622L4.63803 3.57709ZM12.3608 13.4212L10.4475 11.5079C10.3061 11.5423 10.1584 11.5606 10.0064 11.5606H9.99151C8.96527 11.5606 8.13333 10.7286 8.13333 9.70237C8.13333 9.5461 8.15262 9.39434 8.18895 9.24933L5.91885 6.97923C5.03505 7.69015 4.34057 8.62704 3.92328 9.70247C4.86803 12.1373 7.23361 13.8619 10.0002 13.8619C10.8326 13.8619 11.6287 13.7058 12.3608 13.4212ZM16.0771 9.70249C15.7843 10.4569 15.3552 11.1432 14.8199 11.7311L15.8813 12.7925C16.6329 11.9813 17.2187 11.0143 17.5849 9.94561C17.6389 9.78803 17.6389 9.61696 17.5849 9.45938C16.5055 6.30925 13.5184 4.04303 10.0002 4.04303C9.13525 4.04303 8.30244 4.17999 7.52218 4.43338L8.75139 5.66259C9.1556 5.58413 9.57311 5.54303 10.0002 5.54303C12.7667 5.54303 15.1323 7.26768 16.0771 9.70249Z" fill="" /></svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="animate-fade-in-up delay-300" style="opacity: 0; animation-fill-mode: forwards;">
                                <button type="submit"
                                    :disabled="!allPassed"
                                    :class="allPassed ? 'bg-blue-500 hover:bg-blue-600 shadow-lg shadow-blue-500/25 hover:shadow-xl hover:shadow-blue-500/30' : 'bg-gray-200 text-gray-400 cursor-not-allowed'"
                                    class="group relative flex w-full items-center justify-center gap-2 overflow-hidden rounded-xl px-5 py-3.5 text-sm font-semibold text-white transition-all duration-300 active:scale-[0.98]">
                                    <span class="relative z-10">Simpan Password Baru</span>
                                    <svg class="relative z-10 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Logout Link -->
                    <div class="mt-6 text-center animate-fade-in-up delay-400" style="opacity: 0; animation-fill-mode: forwards;">
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm text-gray-400 hover:text-gray-600 transition-colors">
                                ← Kembali ke halaman login
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Mobile Footer -->
            <div class="pb-6 text-center lg:hidden">
                <p class="text-xs text-gray-400">&copy; {{ date('Y') }} Stock Opname</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function passwordRequirements() {
        return {
            password: '',
            confirm: '',
            nik: '{{ Auth::user()->nik ?? "" }}',

            checks: {
                minLength: false,
                hasUppercase: false,
                hasNumber: false,
                notNik: false,
                isNik: false,
                confirmed: false,
                mismatch: false,
            },

            get strength() {
                let s = 0;
                if (this.checks.minLength) s++;
                if (this.checks.hasUppercase) s++;
                if (this.checks.hasNumber) s++;
                if (this.checks.notNik) s++;
                if (this.checks.confirmed) s++;
                return s;
            },

            get strengthLabel() {
                if (this.password === '') return '';
                if (this.strength <= 1) return 'Sangat Lemah';
                if (this.strength <= 2) return 'Lemah';
                if (this.strength <= 3) return 'Cukup';
                if (this.strength <= 4) return 'Kuat';
                return 'Sangat Kuat';
            },

            get allPassed() {
                return this.checks.minLength &&
                       this.checks.hasUppercase &&
                       this.checks.hasNumber &&
                       this.checks.notNik &&
                       this.checks.confirmed;
            },

            validate() {
                this.checks.minLength = this.password.length >= 8;
                this.checks.hasUppercase = /[A-Z]/.test(this.password);
                this.checks.hasNumber = /[0-9]/.test(this.password);

                if (this.password.length > 0) {
                    this.checks.notNik = this.password !== this.nik;
                    this.checks.isNik = this.password === this.nik;
                } else {
                    this.checks.notNik = false;
                    this.checks.isNik = false;
                }

                if (this.confirm.length > 0 && this.password.length > 0) {
                    this.checks.confirmed = this.password === this.confirm;
                    this.checks.mismatch = this.password !== this.confirm;
                } else {
                    this.checks.confirmed = false;
                    this.checks.mismatch = false;
                }
            },

            init() {
                this.$watch('password', () => this.validate());
                this.$watch('confirm', () => this.validate());

                this.$el.addEventListener('password-changed', (e) => {
                    this.password = e.detail.value;
                });
                this.$el.addEventListener('confirm-changed', (e) => {
                    this.confirm = e.detail.value;
                });
            }
        }
    }
</script>
@endpush