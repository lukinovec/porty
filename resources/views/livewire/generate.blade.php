<div class="flex-col h-full flex-center sm:w-2/3">
    <a href="{{ url('/') }}">
        <img class="absolute w-12 h-12 left-1 top-1" src="{{ asset('images/logo.svg') }}" />
    </a>

    <div class="flex items-center justify-between">
        <img class="w-8 h-8 p-1 duration-300 transform rotate-90 bg-opacity-50 rounded-full cursor-pointer hover:scale-125 hover:bg-gray-50" src="{{ asset('images/chevron.svg') }}" alt="arrow-left">
        <section id="progress" class="flex flex-col w-2/3 p-2 border-b-2 sm:p-6 border-gray justify-evenly sm:w-full sm:space-x-4 sm:flex-row">
            @foreach ($phases as $key => $phase)
            <div class="flex items-center p-1 m-1 space-y-2 text-center sm:justify-center sm:flex-col">
                <div style="min-width: 28px; min-height: 28px" class="flex-center p-1 {{ $phases->search($currentPhase) > $key ? 'bg-green-500' : 'bg-white' }} mx-2 border-2 rounded-full {{ $currentPhase->type == $phase->type ? 'border-blue-400' : 'border-gray' }}">
                    @if ($phases->search($currentPhase) > $key)
                    <img src="{{ asset('images/tick.svg') }}" alt="tick icon">
                    @endif
                </div>
                {{ $phase->text }}
            </div>
            @endforeach
        </section>
        <img class="w-8 h-8 p-1 duration-300 transform -rotate-90 bg-opacity-50 rounded-full cursor-pointer hover:scale-125 hover:bg-gray-50" src="{{ asset('images/chevron.svg') }}" alt="arrow-right">
    </div>

    <section class="flex-1 px-12 flex-center">
        @livewire($currentPhase->type, key($currentPhase->type))
    </section>
</div>