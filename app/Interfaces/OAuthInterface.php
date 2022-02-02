<?php
namespace App\Interfaces;

interface OAuthInterface
{
    public function authCode(string $code);

    public function showAuthenticatedUser(string $token);
}
