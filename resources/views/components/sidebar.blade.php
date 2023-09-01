<div class="w-2/12 flex items-center bg-cover bg-center h-screen pl-2" style="background-image: url('{{ asset('/img/image-sidebar.svg') }}')">
    <div class="flex flex-col justify-between h-full text-white">
        <ul class="py-2">
            <li class="py-2">Item 1</li>
            <li class="py-2">Item 2</li>
            <li class="py-2">Item 3</li>
        </ul>
        <form action="{{ route('front.auth.logout', auth()->user()->email) }}" method="POST">
            @csrf
            <button type="submit" class="text-white">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                Sair
            </button>
        </form>
    </div>
</div>