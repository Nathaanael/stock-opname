<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // === VERCEL DUMMY LOGIN HACK ===
        // Supaya bisa login tanpa database sama sekali di Vercel
        if (env('APP_ENV') === 'production') {
            \Illuminate\Support\Facades\Auth::provider('dummy', function ($app, array $config) {
                return new class implements \Illuminate\Contracts\Auth\UserProvider {
                    public function retrieveById($identifier) { return $this->getDummy(); }
                    public function retrieveByToken($identifier, $token) { return $this->getDummy(); }
                    public function updateRememberToken(\Illuminate\Contracts\Auth\Authenticatable $user, $token) {}
                    public function retrieveByCredentials(array $credentials) { return $this->getDummy(); }
                    public function validateCredentials(\Illuminate\Contracts\Auth\Authenticatable $user, array $credentials) { return true; }
                    public function rehashPasswordIfRequired(\Illuminate\Contracts\Auth\Authenticatable $user, array $credentials, bool $force = false) {}
                    private function getDummy() {
                        $user = new \App\Models\User();
                        $user->id = 1;
                        $user->nik = 'admin';
                        $user->name = 'Admin Dummy';
                        $user->role = 'admin_gudang';
                        $user->must_reset_password = false;
                        return $user;
                    }
                };
            });
            config(['auth.providers.users.driver' => 'dummy']);
        }
    }
}
