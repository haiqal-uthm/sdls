<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background: linear-gradient(135deg, #a8edea, #fed6e3);
                margin: 0;
                min-height: 100vh;
                color: #004d40;
            }
            .min-h-screen {
                background: transparent !important;
            }
            
            
            .logo-wrapper img {
                height: 64px;
                width: auto;
                display: block;
                margin: 0 auto;
                margin-bottom: 2.5rem; /* Increased space below logo */

            }
            .content-card {
                background-color: white;
                border-radius: 12px;
                box-shadow: 0 8px 20px rgba(0, 151, 167, 0.2);
                padding: 1.5rem;
                max-width: 100%;
                width: 100%;
                max-width: 384px;
                color: #004d40;
            }
            @media (prefers-color-scheme: dark) {
                body {
                    background: linear-gradient(135deg, #004d40, #002f2f);
                    color: #a8edea;
                }
                .content-card {
                    background-color: #003e3e;
                    box-shadow: 0 8px 20px rgba(168, 237, 234, 0.3);
                    color: #a8edea;
                }
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class="logo-wrapper">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('image/logo2.png') }}" alt="Logo" />
                </a>
            </div>

            <div class="content-card">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
