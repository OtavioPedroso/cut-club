<div class="w-2/12 flex items-center bg-cover bg-center h-screen pl-4" style="background-image: url('{{ asset('/img/image-sidebar.svg') }}')">
    <div class="flex flex-col justify-between h-full text-white">
        <div class="pt-4">
            <h1 class="text-xl" style="font-family: 'Rhodium Libre', serif;">Barbearia 313</h1>
            <ul class="py-2">
                <li class="py-2">
                    <a href="{{ route('front.dashboard') }}" class="text-center">
                        <i class="fa-solid fa-house"></i>
                        Home
                    </a>
                </li>
                <li class="py-2">
                    <a href="{{ route('front.schedule') }}" class="text-center">
                        <i class="fa-solid fa-calendar"></i>
                        Agenda
                    </a>
                </li>
                <li class="py-2">
                    <a href="{{ route('front.profile') }}" class="text-center">
                        <i class="fa-solid fa-user"></i>
                        Perfil
                    </a>
                </li>
            </ul>
        </div>

        <form action="{{ route('front.auth.logout', auth()->user()->email) }}" method="POST">
            @csrf
            <button type="submit" class="text-white">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Sair
            </button>
        </form>
    </div>
</div>