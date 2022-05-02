<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;

        $this->middleware('apiJwt')->except('login','unauthorized');
    }

    public function login(Request $request)
    {
        return $this->service->login($request->only(['email', 'password']));
    }

    public function me()
    {
        return $this->service->me();
    }

    public function logout()
    {
        return $this->service->logout();
    }

    public function refresh()
    {
        return $this->service->refresh();
    }

    public function unauthorized()
    {
        return response()->json(['error' => 'Usuário não está logado.'], 401);
    }
}
