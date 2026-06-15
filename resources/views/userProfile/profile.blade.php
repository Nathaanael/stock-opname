@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="mb-6 rounded-xl border border-success-200 bg-success-50 p-4 text-success-700 text-theme-sm dark:border-success-500/20 dark:bg-success-500/10 dark:text-success-400">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-2xl mx-auto space-y-6">

        {{-- Profile Card --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-white/[0.05] dark:bg-white/[0.03]">

            {{-- Top Banner --}}
            <div class="h-24 bg-gradient-to-r from-brand-500 to-brand-700"></div>

            {{-- Avatar & Info --}}
            <div class="px-6 pb-6">
                <div class="flex items-end justify-between -mt-10 mb-4">
                    <div class="flex h-20 w-20 items-center justify-center rounded-full border-4 border-white bg-brand-500 text-2xl font-bold text-white dark:border-gray-900">
                        @php
                            $displayName = $user->name ?? $user->nik;
                            $initials = collect(explode(' ', $displayName))->map(fn($s) => strtoupper(substr($s, 0, 1)))->take(2)->join('');
                        @endphp
                        {{ $initials }}
                    </div>
                    <span class="mb-1 inline-block whitespace-nowrap text-center rounded-full px-3 py-1 text-xs font-medium bg-green-50 text-green-700 dark:bg-green-500/15 dark:text-green-400">
                        Aktif
                    </span>
                </div>

                <h4 class="text-lg font-semibold text-gray-800 dark:text-white/90">{{ $displayName }}</h4>
                <p class="text-sm text-gray-500 dark:text-gray-400">{{ $user->role_display_name }}</p>

                <div class="mt-4 grid grid-cols-2 gap-3 border-t border-gray-100 pt-4 dark:border-gray-800">
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">NIK</p>
                        <p class="mt-0.5 text-sm font-medium text-gray-800 dark:text-white/90">{{ $user->nik }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 dark:text-gray-500">Status Akun</p>
                        <p class="mt-0.5 text-sm font-medium text-gray-800 dark:text-white/90">
                            Terverifikasi
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Reset Password Card --}}
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-white/[0.05] dark:bg-white/[0.03]">
            <div class="border-b border-gray-100 px-6 py-4 dark:border-gray-800">
                <h5 class="text-base font-semibold text-gray-800 dark:text-white/90">Ganti Password</h5>
            </div>

            <form method="POST" action="{{ route('profile.password.update') }}" class="px-6 py-5 space-y-4">
                @csrf
                @method('PUT')

                {{-- Current Password --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Password Saat Ini
                    </label>
                    <div class="relative">
                        <input type="password" name="current_password" id="current_password"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30
                            @error('current_password') border-red-400 dark:border-red-500 @enderror"
                            placeholder="Masukkan password saat ini" />
                        <button type="button"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300"
                            onclick="togglePassword('current_password', 'icon-eye-current', 'icon-eye-off-current')">
                            <svg id="icon-eye-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg id="icon-eye-off-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    @error('current_password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- New Password --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Password Baru
                    </label>
                    <div class="relative">
                        <input type="password" name="new_password" id="new_password"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30
                            @error('new_password') border-red-400 dark:border-red-500 @enderror"
                            placeholder="Masukkan password baru" />
                        <button type="button"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300"
                            onclick="togglePassword('new_password', 'icon-eye-new', 'icon-eye-off-new')">
                            <svg id="icon-eye-new" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg id="icon-eye-off-new" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    @error('new_password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Confirm Password --}}
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Konfirmasi Password Baru
                    </label>
                    <div class="relative">
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 pr-11 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30
                            @error('new_password_confirmation') border-red-400 dark:border-red-500 @enderror"
                            placeholder="Ulangi password baru" />
                        <button type="button"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:text-gray-500 dark:hover:text-gray-300"
                            onclick="togglePassword('new_password_confirmation', 'icon-eye-confirm', 'icon-eye-off-confirm')">
                            <svg id="icon-eye-confirm" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            <svg id="icon-eye-off-confirm" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                                <line x1="1" y1="1" x2="23" y2="23"></line>
                            </svg>
                        </button>
                    </div>
                    @error('new_password_confirmation')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3 space-y-1.5" id="password-checklist">
                        <div class="flex items-center gap-2" id="req-length">
                            <span class="req-check flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full bg-gray-200 dark:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="h-2.5 w-2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <span class="req-text text-xs text-gray-400 dark:text-gray-500">Minimal 8 karakter</span>
                        </div>
                        <div class="flex items-center gap-2" id="req-upper">
                            <span class="req-check flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full bg-gray-200 dark:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="h-2.5 w-2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <span class="req-text text-xs text-gray-400 dark:text-gray-500">Mengandung huruf kapital (A-Z)</span>
                        </div>
                        <div class="flex items-center gap-2" id="req-number">
                            <span class="req-check flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full bg-gray-200 dark:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="h-2.5 w-2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <span class="req-text text-xs text-gray-400 dark:text-gray-500">Mengandung angka (0-9)</span>
                        </div>
                        <div class="flex items-center gap-2" id="req-nip">
                            <span class="req-check flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full bg-gray-200 dark:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="h-2.5 w-2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <span class="req-text text-xs text-gray-400 dark:text-gray-500">Tidak sama dengan NIP</span>
                        </div>
                        <div class="flex items-center gap-2" id="req-match">
                            <span class="req-check flex h-4 w-4 flex-shrink-0 items-center justify-center rounded-full bg-gray-200 dark:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="h-2.5 w-2.5"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            <span class="req-text text-xs text-gray-400 dark:text-gray-500">Konfirmasi password cocok</span>
                        </div>
                    </div>

                {{-- Info --}}
                <div class="flex items-start gap-2 rounded-lg border border-yellow-200 bg-yellow-50 p-3 dark:border-yellow-500/20 dark:bg-yellow-500/10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mt-0.5 size-4 flex-shrink-0 text-yellow-600 dark:text-yellow-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <p class="text-xs text-yellow-700 dark:text-yellow-400">
                        Jika lupa password, silakan hubungi IT terkait untuk melakukan reset password.
                    </p>
                </div>

                <div class="pt-1">
                    <button type="submit" id="btn-submit"
                        class="flex w-full items-center justify-center gap-2 rounded-lg bg-brand-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-600 disabled:opacity-50 disabled:cursor-not-allowed">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        Simpan Password Baru
                    </button>
                </div>
            </form>
        </div>

    </div>

    <style>
        #password-checklist .req-item-valid .req-check {
            background-color: #22c55e !important;
        }
        #password-checklist .req-item-valid .req-text {
            color: #15803d;
        }
        .dark #password-checklist .req-item-valid .req-text {
            color: #4ade80;
        }
    </style>

    <script>
    function togglePassword(inputId, eyeIconId, eyeOffIconId) {
        const input      = document.getElementById(inputId);
        const eyeIcon    = document.getElementById(eyeIconId);
        const eyeOffIcon = document.getElementById(eyeOffIconId);

        if (input.type === 'password') {
            input.type           = 'text';
            eyeIcon.style.display    = 'none';
            eyeOffIcon.style.display = 'block';
        } else {
            input.type           = 'password';
            eyeIcon.style.display    = 'block';
            eyeOffIcon.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const newPassInput     = document.getElementById('new_password');
        const confirmPassInput = document.getElementById('new_password_confirmation');
        const submitBtn        = document.getElementById('btn-submit');
        const userNik          = "{{ Auth::user()->nik }}";

        function setValid(id, isValid) {
            const el = document.getElementById(id);
            if (!el) return;
            el.classList.toggle('req-item-valid', isValid);
            const circle = el.querySelector('.req-check');
            if (circle) {
                circle.style.backgroundColor = isValid ? '#22c55e' : '';
            }
            const text = el.querySelector('.req-text');
            if (text) {
                text.style.color = isValid ? '#15803d' : '';
            }
        }

        function evaluate() {
            const val     = newPassInput.value;
            const confirm = confirmPassInput.value;

            const checks = {
                'req-length': val.length >= 8,
                'req-upper' : /[A-Z]/.test(val),
                'req-number': /[0-9]/.test(val),
                'req-nip'   : val.length > 0 && val.toLowerCase() !== userNik.toLowerCase(),
                'req-match' : val.length > 0 && confirm.length > 0 && val === confirm,
            };

            Object.entries(checks).forEach(([id, valid]) => setValid(id, valid));

            const allValid = Object.values(checks).every(Boolean);
            submitBtn.disabled = !allValid;
        }

        newPassInput.addEventListener('input', evaluate);
        confirmPassInput.addEventListener('input', evaluate);
        evaluate();
    });
    </script>
@endsection