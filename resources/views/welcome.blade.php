@extends('template')
@section('content')
<div class="flex flex-col items-center justify-center w-full h-full text-center">
    <img class="w-1/5" src="{{ asset("images/logo.svg") }}" alt="logo">
    {{-- <p class="font-serif text-xs">Logo made by Vojtěch Viceník Bojkovice Pitínská 1009</p> --}}
    <section class="flex flex-col items-center justify-center p-2 m-2">
        <div class="m-6">
            <h1 class="text-2xl font-bold">Welcome to Porty! <br></h1>
            <p>Porty makes a portfolio using your GitHub projects</p>
        </div>
        @if ($user)
        <a class="p-2 text-xl font-semibold transition duration-500 ease-in-out delay-75 transform border-2 border-black hover:scale-125 rounded-xl" href="/portfolio">
            View portfolio of {{ $user->nickname }}
        </a>
        @else
        <a href="/auth/redirect" class="p-2 text-xl font-semibold transition duration-500 ease-in-out delay-75 transform border-2 border-black hover:scale-125 rounded-xl">Generate a portfolio</a>
        @endif
    </section>
</div>
@endsection