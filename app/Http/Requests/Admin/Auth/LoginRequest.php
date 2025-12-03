<?php

namespace App\Http\Requests\Admin\Auth;

use App\Models\Admin;
use DB;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use RateLimiter;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "username" => "required|alpha_dash",
            "password" => "required|min:4"
        ];
    }

    public function authenticate(): Admin
    {
        $this->ensureIsNotRatedLimited();

        $admin = Admin::query()->where("username", $this->get("username"))->first();

        if (!$admin) {

            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                "email" => __('auth.failed')
            ]);

        }

        if (!Hash::check($this->input("password"), $admin->password)) {

            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                "password" => __('auth.failed')
            ]);

        }

        RateLimiter::clear($this->throttleKey());

        return $admin;
    }

    public function authorize(): bool
    {
        return true;
    }

    public function ensureIsNotRatedLimited(): void
    {

        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            "email" => trans('auth.throttle', [
                'seconds' => $seconds,
                "mintues" => ceil($seconds / 60)
            ])
        ]);

    }

    public function throttleKey(): string
    {
        return Str::lower($this->input("username") . "|" . $this->ip());
    }
}
