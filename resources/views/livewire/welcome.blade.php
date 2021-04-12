<div class="flex flex-col items-center justify-center w-full h-full text-center">
    <img wire:loading.class='scale-0' class="w-1/5 delay-75 transform duration-3000" src="{{ asset("images/logo.svg") }}" alt="logo">
    <div wire:loading class="p-3 text-2xl font-bold">Preparing your portfolio...</div>
    {{-- <p class="font-serif text-xs">Logo made by Vojtěch Viceník Bojkovice Pitínská 1009</p> --}}
    <section wire:loading.remove class="flex flex-col items-center justify-center p-2 m-2">
        <div class="m-6">
            <h1 class="text-2xl font-bold">Welcome to Porty! <br></h1>
            <p>Porty makes a portfolio using your GitHub projects</p>
        </div>
        @if ($user)
        <button class="btn" wire:click="generate(true)">
            View portfolio of {{ $user->nickname }}
        </button>
        <button class="btn" wire:click="forget()">Log out</button>
        @else
        <a class="btn" href="{{ url('/generate?phase=auth') }}">Generate a portfolio</a>
        @endif
    </section>
</div>