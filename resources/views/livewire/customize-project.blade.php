{{-- <div class="flex-col w-full flex-center">
    <h1 class='text-xl'>{{ $project['name'] }}</h1>
    <p>{{ $project['description'] }}</p>
    <input class='w-1/2 text-lg ' wire:model="updatable.description" class='w-24 h-12 text-lg' type='text' placeholder='Description' />
</div> --}}

<div x-data='{ showDetails: false }' class='p-1 pt-4 pb-12 m-1 border-b border-gray-200 project'>
    <section class='text-xl flex-center'>
        <div class='flex flex-col w-3/4'>
            <a class='font-bold' target='_blank' href='{{ $project['html_url'] }}'>
                {{ $project['name'] }}
            </a>
            <p class='flex space-x-2'>
                <button class='flex-col text-xs flex-center focus:outline-none' x-on:click='$refs.{{ str_replace('-', '_', $project['name']) }}_description.focus()'>
                    <svg title='Edit' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' class='w-4 icon-edit'>
                        <path class='primary' fill='black' d='M4 14a1 1 0 0 1 .3-.7l11-11a1 1 0 0 1 1.4 0l3 3a1 1 0 0 1 0 1.4l-11 11a1 1 0 0 1-.7.3H5a1 1 0 0 1-1-1v-3z'></path>
                        <rect fill='black' width='20' height='2' x='2' y='20' class='secondary' rx='1'></rect>
                    </svg>
                </button>
                <textarea class='flex-1 p-2 m-2 mr-4 font-serif outline-none focus:ring-4 rounded-xl ring-offset-blue-500' x-ref="{{ str_replace('-', '_', $project['name']) }}_description" wire:model="updatable.description" class='w-24 h-12 text-lg' type='text' placeholder='Description'> </textarea>
            </p>
        </div>
        <button class='space-x-1 flex-center focus:outline-none' x-on:click='showDetails = !showDetails'>
            <img class='w-4 transition duration-200 delay-75 transform' :class="{'rotate-180': showDetails}" src='{{ asset('images/chevron.svg') }}' alt='chevron arrow'>
            <p>More</p>
        </button>
    </section>

    <section x-transition:enter='transition ease-out duration-300'
    x-transition:enter-start='opacity-0 transform scale-90'
    x-transition:enter-end='opacity-100 transform scale-100'
    x-transition:leave='transition ease-in duration-300'
    x-transition:leave-start='opacity-100 transform scale-100'
    x-transition:leave-end='opacity-0 transform scale-90'
    x-show='showDetails' class='flex flex-wrap items-center space-x-2 space-y-4 justify-evenly'>
        @forelse ($updatable['pictures'] as $picture)
        <div class='relative'>
            <button wire:click="removeImage('{{ $picture['download_url'] }}')" class='absolute top-0 right-0 z-10 w-8 h-8 p-1 text-lg text-white bg-red-500 rounded-full hover:bg-red-600 flex-center'>X</button>
            <a href='{{ $picture['download_url'] }}' target='_blank'>
                <img class='max-w-sm duration-300 delay-150 transform max-h-72' src='{{ $picture['download_url'] }}' alt='picture' />
            </a>
        </div>
        @empty
          No pictures found.
        @endforelse
        <button wire:click='resetImages'>Reset Images</button>
        <button wire:click='uploadImage'>Add Image</button>
    </section>
</div>