<?php

namespace App\Http\Controllers;

use App\Repositories\AuthRepository;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthRepository $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function auth(Request $request, string $provider)
    {
        $provider = $this->repository->getProvider($provider);
        $provider->authCode($request->query('code'));
        $showInfoUser = $provider->showAuthenticatedUser(session()->get('auth_login'));

        return view('dashboard', [
            'user' => $showInfoUser
        ]);
    }
}
