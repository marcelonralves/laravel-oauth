<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
<h1 class="text-3xl font-bold">
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-4">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                   Faça o login na sua conta!
                </h2>
            </div>
            <a href="https://accounts.spotify.com/authorize?client_id={{ env('OAUTH_SPOTIFY_CLIENT_ID') }}&response_type=code&redirect_uri={{ env('OAUTH_SPOTIFY_REDIRECT_URI') }}&scope={{ env('OAUTH_SPOTIFY_SCOPES') }}"
               class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <div class="h-5 w-5 text-white-500 group-hover:text-white-400">
                     <i class="fab fa-spotify"></i>
                    </div>
                  </span>
                Spotify
            </a>

            <a href="https://accounts.google.com/o/oauth2/v2/auth?client_id={{ env('OAUTH_GOOGLE_CLIENT_ID') }}&response_type=code&redirect_uri={{ env('OAUTH_GOOGLE_REDIRECT_URI') }}&scope={{ env('OAUTH_GOOGLE_SCOPES') }}"
               class="group relative w-full flex justify-center py-2 px-3 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                    <div class="h-5 w-5 text-white-500 group-hover:text-white-400">
                     <i class="fab fa-google"></i>
                    </div>
                  </span>
                Google
            </a>
        </div>
    </div>
</h1>
</body>
</html>
