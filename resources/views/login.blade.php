@extends('layouts.app')

<div class="flex items-center justify-center h-screen">
    <div class="w-2/3">
        <img src="{{ asset('/img/capa-login.svg') }}" alt="capa-login" class="h-full w-full">
    </div>
    <div class="w-1/3 flex items-center justify-center h-full">
        <div class="justify-center">
            <div class="justify-center h-full mb-8">
                <div class="flex justify-center mb-2">
                    <img src="{{ asset('/img/logo-barbearia.svg') }}" alt="logo" class="lazyload w-1/2">
                </div>
                <h2 class="font-medium text-lg">Faça login e acesse nossos serviços</h2>
            </div>
            <form action="{{ route('front.auth.login') }}" method="post" class="text-gray-600">
                @csrf
                <div class="grid">
                    <label for="email">Informe seu email*</label>
                    <input type="text" id="email" name="email" class=" rounded-sm border-gray-600" required>
                </div>
                <div class="grid">
                    <label for="password">Informa sua senha*</label>
                    <input type="password" id="password" name="password" class="rounded-sm border-gray-600" required>
                </div>
                @error('error', 'login')<small class="text-red-800">{{ $message }}</small>@enderror
                <div class="mt-6">
                    <a href="{{ route('front.register') }}" class="mt-8 underline">Não possuo cadastro.</a>
                </div>
                <div class="grid rounded-sm bg-gray-500 text-white p-2">
                    <button type="submit">Fazer login</button>
                </div>
            </form>
        </div>
    </div>
</div>

