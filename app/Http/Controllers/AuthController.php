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
        $getUserAuthenticated = $provider->showAuthenticatedUser(session()->get('auth_user'));

        return view('dashboard', compact('getUserAuthenticated'));
    }
}
