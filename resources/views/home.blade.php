@extends('template')
@section('content')
<div class="flex flex-col items-center justify-center w-full">
    <section class="w-full bg-gray-50">
        <a target="_blank" href="{{ $user->user["html_url"] }}" class="flex items-center justify-center">
            <img src="{{ $user->avatar }}" class="w-12 h-12 p-2 rounded-full" alt="users avatar">
            <h1 class="text-2xl font-extrabold">{{ $user->nickname }}</h1>
        </a>
        <x-html />
    </section>
    <section class="p-2">
        @forelse ($projects as $project)

        @component('components.project', ["project" => $project])
        @endcomponent

        @empty

        No projects.

        @endforelse
    </section>

</div>
@endsection