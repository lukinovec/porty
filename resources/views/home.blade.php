@extends('template')
@section('content')
<div class="flex flex-col items-center justify-center w-full">
    <a target="_blank" href="https://github.com/{{ $user["login"] }}" class="flex items-center justify-center w-full bg-gray-50">
        <img src="{{ $user["avatar_url"] }}" class="w-12 h-12 p-2 rounded-full" alt="users avatar">
        <h1 class="text-2xl font-extrabold">{{ $user["login"] }}</h1>
    </a>
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