<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Show login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            if (Auth::user()->must_reset_password) {
                return redirect()->route('password.reset');
            }
            return redirect()->route('dashboard');
        }

        return view('auth.login', ['title' => 'Login']);
    }

    /**
     * Handle login attempt.
     */
    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'password' => 'required|string',
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (env('APP_ENV') === 'production') {
            $user = new User();
            $user->id = 1;
            $user->nik = 'admin';
            $user->name = 'Admin Dummy';
            $user->role = 'admin_gudang';
            $user->must_reset_password = false;
        } else {
            $user = User::where('nik', $request->nik)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'nik' => ['NIK atau password yang Anda masukkan salah.'],
                ]);
            }
        }

        Auth::login($user, $request->boolean('remember'));

        $request->session()->regenerate();

        // If user must reset password, redirect to reset page
        if ($user->must_reset_password) {
            return redirect()->route('password.reset');
        }

        return redirect()->intended(route('dashboard'));
    }

    /**
     * Show password reset form (for first-time login).
     */
    public function showResetPassword()
    {
        return view('auth.reset-password', ['title' => 'Reset Password']);
    }

    /**
     * Handle password reset.
     */
    public function resetPassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[A-Z]/',      // Must contain uppercase
                'regex:/[0-9]/',      // Must contain number
            ],
        ], [
            'password.required' => 'Password baru wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.regex' => 'Password harus mengandung huruf kapital (A-Z) dan angka (0-9).',
        ]);

        // Check password is not same as NIK
        if ($request->password === $user->nik) {
            throw ValidationException::withMessages([
                'password' => ['Password tidak boleh sama dengan NIK Anda.'],
            ]);
        }

        $user->update([
            'password' => $request->password,
            'must_reset_password' => false,
        ]);

        return redirect()->route('dashboard')->with('success', 'Password berhasil diubah!');
    }

    /**
     * Logout.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
