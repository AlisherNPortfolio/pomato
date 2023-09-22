<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CaptchaRequest;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private $service;

    public function __construct(AuthService $authService)
    {
        $this->service = $authService;
    }

    public function login(LoginRequest $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validated();

            return $this->service->login($data);
        }

        return view('admin.auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function reloadCaptcha()
    {
        // abort_if(Auth::check(), 403, 'Forbidden');

        return response()->json(['captcha' => captcha_img()]);
    }

    public function checkRecaptcha(CaptchaRequest $request)
    {
        // abort_if(Auth::check(), 403, 'Forbidden');

        try {
            $request->validated();

            return response()->json(true);
        } catch (\Exception $e) {
            return response()->json(false);
        }
    }
}
