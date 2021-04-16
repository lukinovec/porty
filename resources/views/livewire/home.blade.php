<div class='flex flex-col items-center justify-center w-full'>
    <section x-data='{ menuVisible: false }' class='fixed top-0 flex flex-col items-center justify-between w-full bg-gray-50'>
        <div class='flex justify-between w-full space-x-3'>
            <div class='flex-1 left'></div>
            <a class='text-2xl font-extrabold flex-center' href='#about'>
                About me
            </a>
            <a class='text-2xl font-extrabold flex-center' href='#projects'>
                My work
            </a>
            <div class='flex-1 flex-center right'>
                <img class='w-6 h-6 cursor-pointer' x-on:click='menuVisible = !menuVisible' src='{{ asset('images/gear.svg') }}' alt=''>
            </div>
        </div>



        <div class='menu' x-show='menuVisible'>
            <div class='flex flex-col p-1 text-center controls sm:flex-row'>
                <button wire:click='clear()' class='m-1 font-semibold transition duration-500 ease-in-out delay-75 transform border-2 border-black sm:p-1 hover:scale-105 rounded-xl'>Log out</button>
            </div>
        </div>
    </section>

    <section class='p-2 sm:w-2/3'>
        <div class='flex-col h-full pt-8' id='about'>
            <a target='_blank' href='{{ $user->user['html_url'] }}' class='flex-1 flex-center'>
                <img src='{{ $user->avatar }}' class='w-12 h-12 p-2 rounded-full' alt='users avatar'>
                <h1 class='text-2xl font-extrabold'>{{ $user->nickname }}</h1>
            </a>

            <span class='flex-1'>
                <h1 class='text-xl font-bold'>Contact</h1>
                <p>{{ $contact }}</p>
            </span>
            <span class='flex-1'>
                <h1 class='text-xl font-bold'>Bio</h1>
                <p>{{ $bio }}</p>
            </span>
        </div>
        <div class='h-full pt-8' id='projects'>
            @forelse ($projects as $project)

            @component('components.project', ['project' => $project])
            @endcomponent

            @empty

            No projects.

            @endforelse
        </div>
    </section>
</div>