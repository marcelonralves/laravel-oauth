<?php

namespace App\Repositories;

use App\Interfaces\OAuthInterface;
use App\Services\SpotifyService;
use App\Services\GoogleService;
use Mockery\Exception;

class AuthRepository
{
    public function getProvider(string $provider): OAuthInterface
    {
        switch ($provider){
            case "spotify":
                return new SpotifyService();
            case "google":
                return new GoogleService();
        }
        throw new Exception('Método de login inválido. Tente novamente');
    }
}
