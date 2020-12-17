<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <title>Page d'accueil</title>
</head>
<body>
    <div class="container-fluid-lg">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-ul">
                <ul class="w-1/2">
                    <li class="nav-item active">
                        <a class="navbar-brand" href="http://localhost:8000/">
                            <img style="max-height: 30px;" src="https://drive.google.com/file/d/15WIYn0jKg9w3hohbwQTtA2DAAFSDaLdx/view?usp=sharing">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a style="margin-left: 30px;" class="nav-link" href="http://localhost:8000/jeux">Les Jeux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost:8000/user">Informations compte</a>
                    </li>
                </ul>
                <ul class="navbar-right w-1/2">
                    @if (auth()->guest())
                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a></li>
                                @else
                                    <li style="float:left;" class="nav-item"><a class="nav-link" href="{{ route('login') }}" class="text-sm text-gray-700 underline" id="login">Login</a></li>

                                    @if (Route::has('register'))
                                        <li style="float:left;"     class="nav-item"><a class="nav-link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline" id="register">Register</a></li>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    @else
                        <p>Utilisateur déjà connecté</p>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</body>
</html>
