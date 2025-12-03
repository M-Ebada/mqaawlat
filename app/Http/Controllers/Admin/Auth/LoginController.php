<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Enums\GuardEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected string $redirectTo = RouteServiceProvider::ADMIN;

    public function __construct()
    {
        $this->middleware('guest:' . GuardEnum::ADMIN->value)->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard(GuardEnum::ADMIN->value);
    }

    protected function loggedOut(Request $request)
    {
        return redirect()->route('admin.login');
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $user = Auth::guard(GuardEnum::ADMIN->value)->getProvider()->retrieveByCredentials($credentials);

        if ($user && $user->status == 1) {
            return $this->guard()->attempt(
                $this->credentials($request), $request->filled('remember')
            );
        }

        return false;
    }

    public function sendFailedLoginResponse(Request $request)
    {
        $user = Auth::guard(GuardEnum::ADMIN->value)->getProvider()->retrieveByCredentials($request->only($this->username(), 'password'));

        if ($user && $user->status != 1) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => __('This User is blocked'),
                ]);
        }

        return parent::sendFailedLoginResponse($request);
    }
}
