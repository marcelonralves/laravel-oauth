<?php

namespace App\Repositories;

use App\Interfaces\OAuthInterface;
use App\Services\SpotifyService;
use Mockery\Exception;

class AuthRepository
{
    public function getProvider(string $provider): OAuthInterface
    {
        switch ($provider){
            case "spotify":
                return new SpotifyService();
        }
        throw new Exception('Método de login inválido. Tente novamente');
    }
}
