<div class='flex flex-col'>
    <div wire:loading.remove wire:target='next' style='max-height: 40rem' class='flex flex-col items-start p-4 overflow-auto border-4 sm:max-h-3/4 rounded-xl border-gray'>
        @foreach ($projects as $project)
        <div class='p-2'>
            <span class='font-bold'>
                {{ $project['name'] }}
                <input type='checkbox' id='selected' name='selected' value='{{ $project['name'] }}' wire:model='selected'>
            </span>
            <p>
                {{ $project['description'] }}
            </p>
        </div>
        @endforeach
    </div>
    <button wire:loading.remove wire:target='next' class='p-0 btn' wire:click='next'>Next</button>
    <x-loading while='next'>
        Saving your projects...
    </x-loading>
</div>
