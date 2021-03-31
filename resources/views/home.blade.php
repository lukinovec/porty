@extends('template')
@section('content')
<div class="w-full p-2 flex-col flex justify-center items-center">
    <a target="_blank" href="https://github.com/{{ $user["login"] }}" class="flex justify-center items-center">
        <img src="{{ $user["avatar_url"] }}" class="w-12 h-12 rounded-full p-2" alt="users avatar">
        <h1 class="font-extrabold text-2xl">{{ $user["login"] }}</h1>
    </a>
    <section>
        @forelse ($projects as $project)

        @component('components.project', ["project" => $project])
        @endcomponent

        @empty

        No projects.

        @endforelse
    </section>

</div>
@endsection