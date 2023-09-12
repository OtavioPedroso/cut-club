@extends('layouts.app')

<div class="flex h-screen">
<!-- Sidebar -->
    @include('components.sidebar')

    <!-- Conteúdo da página -->
    <div class="w-full">
        <div class="flex justify-between items-center py-4 border-b-[1px] border-black px-4">
            <div class="text-xl">
                <h1>Perfil</h1>
            </div>
            <div class="text-xl">
                <a href="{{ route('front.profile') }}" class="text-center">
                    {{Auth()->user()->name}}
                    <i class="fa-solid fa-address-card"></i>
                </a>
            </div>
        </div>
        <div class="m-8 justify-center items-center">
            <div class="w-full max-w-4xl p-6 border rounded-md flex items-start space-x-6 mx-auto">
                <!-- Parte esquerda com o ícone de perfil -->
                <div class="w-1/4 flex-shrink-0">
                    <!-- Adicione aqui a imagem do perfil -->
                    <img src="{{ asset('/img/sem-foto.svg') }}" alt="Imagem de Perfil" class="w-48 h-48 rounded-full">
                </div>

                <!-- Parte direita com os campos de formulário -->
                <form action="{{ route('front.auth.update') }}" method="post" class="w-3/4 text-gray-600">
                    @csrf
                    @method('put')
                    <div class="flex justify-between">
                        <div class="w-1/2 pr-6">
                            <label for="name">Nome</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full rounded-sm border-gray-600 px-4 py-2" disabled>
                        </div>
                        <div class="w-1/2">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" value="{{ $user->email }}" class="w-full rounded-sm border-gray-600 px-4 py-2" disabled>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="w-1/2 pr-6">
                            <label for="password">Nova senha</label>
                            <input type="password" id="password" name="password" class="w-full rounded-sm border-gray-600 px-4 py-2" required>
                        </div>
                        <div class="w-1/2">
                            <label for="reg_password_confirmation">Confirmação de Senha*</label>
                            <input type="password" name="password_confirmation" id="reg_password_confirmation" class="w-full">
                        </div>
                    </div>
                    <div class="text-center mt-6">
                        <button type="submit" class="px-6 py-3 bg-gray-500 text-white rounded-sm">Atualizar</button>
                    </div>
                </form>
            </div>
            @if($data)
                <div class="w-1/3 max-w-4xl p-6 border rounded-md mt-4 bg-gray-400 flex justify-center items-center mx-auto">

                </div>
            @endif
        </div>
    </div>
</div>