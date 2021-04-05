@extends('template')
@section('content')
<div class="flex flex-col items-center justify-center w-full h-full">
    <section class="p-4 m-4">
        <h1 class="text-2xl font-bold">Welcome! <br></h1>
        @if ($user)
        <a href="/portfolio">
            View portfolio of {{ $user->nickname }}
        </a>
        @else
        To generate a portfolio, <a href="/auth/redirect">log in with your GitHub account</a>.
        @endif
    </section>
</div>
@endsection