@extends('layouts.app')

<div class="flex h-screen">
<!-- Sidebar -->
    @include('components.sidebar')

    <!-- Conteúdo da página -->
    <div class="w-full">
        <div class="flex justify-between items-center py-4 border-b-[1px] border-black px-4">
            <div class="text-xl">
                <h1>Agendar</h1>
            </div>
            <div class="text-xl">
                <a href="{{ route('front.profile') }}" class="text-center">
                    {{Auth()->user()->name}}
                    <i class="fa-solid fa-address-card"></i>
                </a>
            </div>
        </div>
        <div class="m-8 max-h-screen justify-center items-center">
            <div class="w-2/5 max-w-4xl p-6 border rounded-md flex items-start space-x-6 mx-auto">
                <form action="{{ route('front.scheduleService') }}" method="post" class="text-gray-600 mx-auto">
                    @csrf
                    <div class="flex">
                        <div class="grid mr-8">
                            <label for="date">Data*</label>
                            <input type="date" id="date" name="date" min={{ now() }} class="rounded-sm border-gray-600" required>
                            @error('date', 'schedule')<small class="text-red-800">{{ $message }}</small>@enderror
                        </div>
                        <div class="grid">
                            <div class="flex justify-between text-center">
                                <label for="time">Hora*</label>
                                <div class="relative">
                                    <span class="px-2 py-1 rounded cursor-pointer">
                                        <i class="fas fa-circle-info"></i>
                                    </span>
                                    <div id="tooltip" class="text-xs absolute left-1/2 transform -translate-x-1/2 bottom-8 w-32 px-2 py-1 bg-gray-900 text-white text-center rounded-lg opacity-0 pointer-events-none transition-opacity duration-300">
                                        Opte por horários inteiros, como: 14:30 ou 10:00!
                                    </div>
                                </div>
                            </div>
                            <input type="time" id="time" name="time" class="rounded-sm border-gray-600 w-48" required>
                            @error('time', 'schedule')<small class="text-red-800">{{ $message }}</small>@enderror
                        </div>

                    </div>

                    <div class="grid mt-8">
                        <select id="barber_id" name="barber_id" class="rounded-sm border-gray-600" required>
                            <option value="">Selecione um barbeiro*</option>
                            @foreach ($barbers as $barber)
                                <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                            @endforeach
                        </select>
                        @error('barber_id', 'schedule')<small class="text-red-800">{{ $message }}</small>@enderror
                    </div>

                    <div class="grid">
                        <div id="services">
                            <select name="servico_id[]" class="rounded-sm border-gray-600 w-full mt-2" required>
                                <option value="">Selecione um serviço*</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="float-left" type="button" onclick="removeService()">
                            <i class="fa-solid fa-xmark text-red-600"></i>
                        </button>
                        <button type="button" onclick="addService()">Adicionar Serviço</button>
                    </div>

                    <div class="grid mt-8">
                        <input type="text" id="description" name="description" class="rounded-sm border-gray-600 h-24" placeholder="Descrição">
                        @error('password', 'schedule')<small class="text-red-800">{{ $message }}</small>@enderror

                    </div>
                    <div class="grid mt-6 rounded-sm bg-gray-500 text-white p-2">
                        <button type="submit">Agendar horário</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const tooltip = document.getElementById('tooltip');
    const trigger = document.querySelector('.cursor-pointer');

    let tooltipVisible = false;

    trigger.addEventListener('click', () => {
        tooltipVisible = !tooltipVisible;
        tooltip.style.opacity = tooltipVisible ? '1' : '0';
    });

    function addService() {
        var existingSelect = document.querySelector('#services select');
        var newSelect = existingSelect.cloneNode(true);

        document.querySelector('#services').appendChild(newSelect);
    }

    function removeService() {
        const services = document.getElementById('services');
        const selects = services.querySelectorAll('select');

        // Verifica se há algum select para remover
        if (selects.length > 1) {
            const lastSelect = selects[selects.length - 1];
            services.removeChild(lastSelect);
        }
    }
</script>