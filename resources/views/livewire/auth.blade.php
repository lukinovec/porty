<div class="flex flex-col items-center justify-center">
    @if ($github)
    <section class="flex flex-col">
        You are logged in as {{ $github->nickname }}
        <div class="flex">
            <button wire:click="userForget()" class="mx-2 btn">Log out</button>
            <button wire:click="$emit('move', '+')" class="mx-2 btn">Continue</button>
        </div>
    </section>
    @else
    <a href="{{ url('auth/redirect') }}" class="flex p-2 m-2 space-x-2 text-lg border-2 w-52 rounded-xl border-gray">
        <img src="{{ asset('images/github.png') }}" alt="github logo">
        <p class="text-center">Log in via GitHub</p>
    </a>
    <p class="text-center">
        After you log in, you will be redirected back and Porty will get all your projects.
    </p>
    @endif
</div>