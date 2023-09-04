@extends('layouts.app')

<div class="flex h-screen">
<!-- Sidebar -->
    @include('components.sidebar')

    <!-- Conteúdo da página -->
    <div class="w-full">
        <div class="flex justify-between items-center py-4 border-b-[1px] border-black px-4">
            <div class="text-xl">
                <h1>Home</h1>
            </div>
            <div class="text-xl">
                <a href="{{ route('front.profile') }}" class="text-center">
                    {{Auth()->user()->name}}
                    <i class="fa-solid fa-address-card"></i>
                </a>
            </div>
        </div>
        <div class="flex justify-between items-center m-8 border-[1px] border-black rounded-md">
            <div class="w-1/3 py-4 border-r-[1px] border-black"> <!-- Define a largura da primeira div -->
                <img src="{{ asset('/img/image-recompesa.svg') }}" alt="" class="w-32 h-32 mx-auto">
                <p class="text-center">{{ $bonusAtual->bonus_service }}</p>
            </div>
            <h1>Seu progresso</h1> <!-- Define a largura da segunda div -->
            <div class="w-2/3 py-4 flex justify-center">
                <span class="flex gap-2 mt-1 pl-4">
                    @for($i = 1; $i <= $bonusAtual->quantity_service; $i++)
                        @if($i <= $totalServicos)
                            <img src="{{ asset('/img/progresso-verde.svg') }}" alt="" class="w-16 h-16">
                        @else
                            <img src="{{ asset('/img/progresso-cinza.svg') }}" alt="" class="w-16 h-16">
                        @endif
                    @endfor
                </span>
            </div>
        </div>

    </div>
</div>