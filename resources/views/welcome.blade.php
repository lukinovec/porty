@extends('template')
@section('content')
<div class="flex flex-col items-center justify-center w-full h-full">
    <section class="flex flex-col items-center justify-center p-4 m-4">
        <div class="m-6">
            <h1 class="text-2xl font-bold">Welcome to Porty! <br></h1>
            <p>Porty makes a portfolio using your GitHub projects</p>
        </div>
        @if ($user)
        <a href="/portfolio">
            View portfolio of {{ $user->nickname }}
        </a>
        @else
        <a href="/auth/redirect" class="p-2 text-xl font-semibold transition duration-500 ease-in-out delay-75 transform border-2 border-black hover:scale-125 rounded-xl">Generate a portfolio</a>
        @endif
    </section>
</div>
@endsection