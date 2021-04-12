<div class='flex-col h-full flex-center sm:w-2/3'>
    <a href='{{ url('/') }}'>
        <img class='absolute w-12 h-12 left-1 top-1' src='{{ asset('images/logo.svg') }}' />
    </a>

    <div class='flex items-center justify-between'>
        {{-- Error message --}}
        @if (session()->has('message'))
        <div class='text-2xl font-bold text-red-600'>
            {{ session('message') }}
        </div>
        @endif
        {{-- Error message end --}}

        {{-- Left arrow --}}
        <div class='w-8 h-8'>
            @if ($this->getNextPhaseIndex('-') < $this->getPhases()->search(function($phase) {
                return $phase->type == $this->getCurrentPhase()->type;
            }) && $this->getNextPhaseIndex('-') >= 0)

            <img class='rotate-90 nav-arrow' wire:click='move("-")' src='{{ asset('images/chevron.svg') }}' alt='arrow-left'>

            @endif
        </div>
        {{-- Left arrow end --}}

        {{-- Progress dots --}}
        <section id='progress' class='flex flex-col w-2/3 p-2 border-b-2 border-gray-100 sm:p-6 justify-evenly sm:w-full sm:space-x-4 sm:flex-row'>
            @foreach ($this->getPhases() as $key => $phase)
            <div class='flex items-center {{ $phase->isComplete() ? 'md:flex hidden' : '' }} p-1 m-1 space-y-2 text-center sm:justify-center sm:flex-col'>
                <div style='min-width: 28px; min-height: 28px' class='flex-center p-1 {{ $phase->isComplete() ? 'bg-green-500' : 'bg-white' }} mx-2 border-2 rounded-full {{ $this->getCurrentPhase()->type == $phase->type ? 'animate-bounce' : 'border-gray' }}'>
                    @if ($phase->isComplete())
                    <img src='{{ asset('images/tick.svg') }}' alt='tick icon'>
                    @endif
                </div>
                {{ $phase->text }}
            </div>
            @endforeach
        </section>
        {{-- Progress dots end --}}

        {{-- Right arrow --}}
        <div class='w-8 h-8'>
            @if ($this->getNextPhaseIndex('+') > $this->getPhases()->search(function($phase) {
                return $phase->type == $this->getCurrentPhase()->type;
            }) && $this->getNextPhaseIndex('+') <= $this->getPhases()->count() - 1)

            <img class='-rotate-90 nav-arrow' wire:click='move("+")' src='{{ asset('images/chevron.svg') }}' alt='arrow-right'>

            @endif
        </div>
        {{-- Right arrow end --}}
    </div>

    {{-- Livewire components --}}
    <section wire:loading.remove class='flex-1 w-full px-6 flex-center'>
        {{ request('message') ?: '' }}
        @livewire($this->getCurrentPhase()->type, key($this->getCurrentPhase()->type))
    </section>
    <section wire:loading.flex class='flex-col flex-1 w-full px-6 space-y-5 text-2xl h-3/4 flex-center'>
        <img class="w-36 h-36 animate-spin" src='{{ asset('images/loading.svg') }}' alt=''>
        <p>Loading, please wait...</p>
    </section>
</div>