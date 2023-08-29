@extends('app')
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
                <a href="{{ route('front.register') }}" class="underline">Não possuo cadastro.</a>
                <div class="grid rounded-sm bg-gray-500 text-white mt-8 p-2">
                    <button type="submit">Fazer login</button>
                </div>
            </form>
        </div>
    </div>
</div>

