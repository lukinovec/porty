<div x-data='{ showDetails: false }' class='p-1 pt-4 pb-12 m-1 border-b border-gray-200 project'>
    <section class='text-xl flex-center'>
        <div id='{{ $project['name'] }}' style='scroll-margin-top: 1rem' class='flex flex-col w-3/4'>
            <p>
                <a class='font-bold' target='_blank' href='{{ $project['html_url'] }}'>
                    {{ $project['name'] }}
                </a>
            </p>
            <p class='flex-1 font-serif'>
                {{ $project['description'] }}
            </p>
        </div>
        <a href='#{{ $project['name'] }}' class='space-x-1 flex-center focus:outline-none' x-on:click='showDetails = !showDetails'>
            <img class='w-4 transition duration-200 delay-75 transform' :class="{'rotate-180': showDetails}" src='{{ asset('images/chevron.svg') }}' alt='chevron arrow'>
            <p>More</p>
        </a>
    </section>

    <section x-transition:enter='transition ease-out duration-300'
    x-transition:enter-start='opacity-0 transform scale-90'
    x-transition:enter-end='opacity-100 transform scale-100'
    x-transition:leave='transition ease-in duration-300'
    x-transition:leave-start='opacity-100 transform scale-100'
    x-transition:leave-end='opacity-0 transform scale-90'
    x-show='showDetails' class='flex flex-wrap items-center space-x-2 space-y-4 justify-evenly'>
        @forelse ($project['pictures'] as $picture)
        <a href='{{ $picture['download_url'] }}' target='_blank'>
            <img class='max-w-sm duration-300 delay-150 transform max-h-72' src='{{ $picture['download_url'] }}' alt='picture' />
        </a>
        @empty
          No pictures found.
        @endforelse
    </section>
</div>