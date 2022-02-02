<?php

namespace App\Services;

use App\Interfaces\OAuthInterface;
use GuzzleHttp\Client;

class GoogleService implements OAuthInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function authCode(string $code): bool
    {
        $url = "https://www.googleapis.com/oauth2/v4/token";
        $requestAuthCode = $this->client->request("POST", $url, [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => env('OAUTH_GOOGLE_CLIENT_ID'),
                'client_secret' => env('OAUTH_GOOGLE_CLIENT_SECRET'),
                'redirect_uri' => env('OAUTH_GOOGLE_REDIRECT_URI'),
                'code' => $code
            ]
        ]);

        $response = json_decode($requestAuthCode->getBody(), true);

        session()->put('auth_login', $response['access_token']);
        return true;
    }

    public function showAuthenticatedUser(string $token): array
    {

        $url = "https://www.googleapis.com/oauth2/v3/userinfo";

        $requestUserInfo = $this->client->request("GET", $url, [
            'id_token' => $token,
            'headers' => [
                'Authorization' => 'Bearer '. $token
            ],
        ]);

        $response = json_decode($requestUserInfo->getBody(), true);

        return [
            'name' => $response['name'],
            'email' => $response['email'],
            'image_url' => $response['picture']
        ];
    }
}
