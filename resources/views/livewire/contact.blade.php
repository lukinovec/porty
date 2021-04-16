<div class="flex flex-col items-end justify-center w-full text-center h-1/2">
    <h1 class="w-full p-1 font-sans text-xl font-semibold text-center">Give others means to contact you. For example "Twitter, @youraccount"</h1>
    <textarea name="contact" wire:model="text" class="w-full h-full p-4 border-4 focus:outline-none rounded-xl border-gray"
    id="contact" placeholder="Your social media"></textarea>
    <div x-data="{}" class="flex space-x-2">
        <button x-on:click="$wire.emit('move', '+')" class="btn">Skip</button>
        <button wire:click="save" class="btn">Send and Continue</button>
    </div>

    <div class='flex-col flex-center'>
        <h1>Your projects</h1>
        <section>
            @foreach ($github->selected_projects as $project)
                {{ $project['name'] }}
                {{ $project['description'] }}
            @endforeach
        </section>
    </div>
</div>