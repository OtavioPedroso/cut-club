@extends('layouts.app')

<div class="flex items-center justify-center h-screen">
    <div class="w-2/3">
        <img src="{{ asset('/img/capa-login.svg') }}" alt="capa-login" class="h-full w-full">
    </div>
    <div class="w-1/3 flex items-center justify-center h-full">
        <div class="justify-center">
            <div class="justify-center h-full mb-8">
                <div class="flex justify-center mb-2">
                    <img src="{{ asset('/img/logo-barbearia.svg') }}" alt="logo" class="w-1/2">
                </div>
                <h2 class="font-medium text-lg">Registre-se e conheça nossos serviços</h2>
            </div>
            <form action="{{ route('front.auth.register') }}" method="post" class="text-gray-600">
                @csrf
                <div class="grid">
                    <label for="name">Informe seu nome*</label>
                    <input type="text" id="name" name="name" class="rounded-sm border-gray-600" required>
                    @error('name', 'registration')<small class="text-red-800">{{ $message }}</small>@enderror

                </div>
                <div class="grid">
                    <label for="phone">Informa seu telefone*</label>
                    <input type="text" id="phone" name="phone" class="rounded-sm border-gray-600" required>
                    @error('phone', 'registration')<small class="text-red-800">{{ $message }}</small>@enderror

                </div>
                <div class="grid">
                    <label for="email">Informe seu email*</label>
                    <input type="text" id="email" name="email" class="rounded-sm border-gray-600" required>
                    @error('email', 'registration')<small class="text-red-800">{{ $message }}</small>@enderror

                </div>
                <div class="grid">
                    <label for="password">Informa sua senha*</label>
                    <input type="password" id="password" name="password" class="rounded-sm border-gray-600" required>
                    @error('password', 'registration')<small class="text-red-800">{{ $message }}</small>@enderror

                </div>
                <div class="grid">
                    <label for="reg_password_confirmation">Confirmação de Senha*</label>
                    <input type="password" name="password_confirmation" id="reg_password_confirmation" >
                </div>
                <div class="mt-6">
                    <a href="{{ route('front.login') }}" class="mt-8 underline">Fazer login.</a>
                </div>
                <div class="grid rounded-sm bg-gray-500 text-white p-2">
                    <button type="submit">Fazer cadastro</button>
                </div>
            </form>
        </div>
    </div>
</div>
