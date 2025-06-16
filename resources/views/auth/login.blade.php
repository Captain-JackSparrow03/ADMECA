<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion - ADMECA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: url('/images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border-radius: 1rem;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md p-8 glass text-white shadow-xl">

        <!-- Logo -->
        <div class="flex justify-center mb-1">
            <img src="/images/logo.png" alt="Logo ADMECA" style="background-color: white;border-radius: 50%;width: 150px;height: 150px;" class="">
        </div>

        <h2 class="text-2xl font-bold text-center mb-6">Authentification</h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Login -->
            <div>
                <label for="email" class="block text-sm mb-1">Login</label>
                <div class="relative">
                    <input id="email" type="email" name="email" required autofocus
                        class="w-full pl-10 pr-4 py-2 rounded-md bg-white bg-opacity-20 text-black border border-white placeholder-white focus:outline-none focus:ring focus:ring-green-300 text-sm"
                        placeholder="ex: user@example.com">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-black" fill="none"
                        stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z" stroke="none" />
                        <path d="M4 4h16v16H4z" fill="none" />
                        <path d="M4 4h16v16H4z" fill="none" />
                        <path d="M4 4h16v16H4z" stroke="none" />
                        <path d="M3 8l9 6 9-6" />
                    </svg>
                </div>
            </div>

            <!-- Mot de passe -->
            <div>
                <label for="password" class="block text-sm mb-1">Mot de passe</label>
                <div class="relative">
                    <input id="password" type="password" name="password" required
                        class="w-full pl-10 pr-4 py-2 rounded-md bg-white bg-opacity-20 text-black border border-white placeholder-white focus:outline-none focus:ring focus:ring-green-300 text-sm"
                        placeholder="Votre mot de passe">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-black" fill="none"
                        stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M12 17a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                        <path d="M5 11V7a7 7 0 0 1 14 0v4" />
                        <rect x="5" y="11" width="14" height="10" rx="2" ry="2" />
                    </svg>
                </div>
            </div>

            <!-- Rappel + lien -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2 text-green-500 focus:ring-green-400">
                    Se souvenir de moi
                </label>
                <a href="{{ route('password.request') }}" class="text-green-200 hover:underline">Mot de passe oublié
                    ?</a>
            </div>

            <!-- Bouton -->
            <div>
                <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg flex items-center justify-center gap-2 shadow-md transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                    Se connecter
                </button>
            </div>
        </form>
    </div>


</body>

</html>