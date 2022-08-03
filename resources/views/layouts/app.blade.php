<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fajar Parfum - @if( count($titles) ) {{ $titles[0]['name'] }} @endif</title>

        {{-- <link rel="icon" href="{{ asset('storage/favicon.png') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        @livewireStyles
    </head>
    <body class="font-urbanist antialiased text-gray-800">
        <x-alert></x-alert>
        
        <x-sidebar></x-sidebar>
        
        <div style="background-color: #E9EDF0" class="min-h-screen lg:ml-52">
            <x-header :titles="$titles" :create="$create"></x-header>
        
            <div class="pt-2 lg:px-8 lg:py-4 text-sm">
                {{ $slot }}
            </div>
        </div>

        @livewireScripts
    </body>
</html>