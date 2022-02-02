<?php

namespace App\Services;
use App\Interfaces\OAuthInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SpotifyService implements OAuthInterface
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function authCode(string $code): bool
    {
        $url = "https://accounts.spotify.com/api/token";

        try {
            $requestAccessCode = $this->client->request("POST", $url, [
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'code' => $code,
                    'redirect_uri' => env('OAUTH_SPOTIFY_REDIRECT_URI'),
                ],
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Basic '. base64_encode(env('OAUTH_SPOTIFY_CLIENT_ID').':'.env('OAUTH_SPOTIFY_CLIENT_SECRET'))
                ],
            ]);

            $response = json_decode($requestAccessCode->getBody(), true);
            session()->put('auth_login', $response['access_token']);

         } catch (GuzzleException $exception) {
            return false;
        }

        return true;
    }

    public function showAuthenticatedUser(string $token): array
    {
       $url = 'https://api.spotify.com/v1/me';

       $requestUserInfo = $this->client->request("GET", $url, [
           'headers' => [
               'Authorization' => 'Bearer ' . $token
           ],
       ]);

       $response = json_decode($requestUserInfo->getBody(), true);

       return [
           'name' => $response['display_name'],
           'email' => $response['email'],
           'image_url' => $response['images'][0]['url'],
       ];
    }
}
