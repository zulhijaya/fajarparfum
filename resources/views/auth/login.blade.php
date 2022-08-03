<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Fajar Parfum - Login</title>
</head>
<body class="font-urbanist antialiased text-gray-800">
    <div class="flex items-center justify-center h-screen">
        <div class="flex flex-col items-center w-full lg:w-1/5 px-4 lg:px-0">
            <form method="POST" action="{{ route('login') }}" class="w-full">
                @csrf
                <div class="mb-10">
                    <h1 class="font-extrabold text-4xl text-center">Fajar Parfum</h1>
                    <div class="text-sm font-semibold text-gray-500 mt-4">Selamat datang di Fajar Parfum. Login ke akun Anda untuk masuk.</div>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="mb-4">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" name="phone" class="form-input" placeholder="masukkan nomor telepon" value="{{ old('phone') }}" required autofocus>
                    @error('phone') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                <div>
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="masukkan password" required autocomplete="current-password">
                    @error('password') <div class="form-error">{{ $message }}</div> @enderror
                </div>
                {{-- <div class="flex items-center justify-between font-semibold text-sm">
                    <div class="flex items-center space-x-1 cursor-pointer">
                        <input id="remember" type="checkbox" value="" class="w-3 h-3 accent-blue-500 cursor-pointer focus:outline-none">
                        <label for="remember" class="block text-gray-500 cursor-pointer">Ingat saya</label>
                    </div>
                    <a href="{{ route('password.email') }}" class="text-blue-500">Lupa password</a>
                </div> --}}
                <button class="bg-gray-800 hover:bg-gray-900 text-white font-bold rounded-lg border border-gray-800 px-4 py-1.5 cursor-pointer w-full mt-8">Login</button>
            </form>
        </div>
    </div>
</body>
</html>