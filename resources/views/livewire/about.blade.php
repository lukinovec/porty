<div class="flex flex-col items-end justify-center w-full text-center h-1/2">
    <h1 class="w-full p-1 font-sans text-xl font-semibold text-center">Introduce yourself in a few sentences <br> (years of experience, favourite tech stack, etc.)</h1>
    <textarea name="bio" wire:model="text" class="w-full h-full p-4 border-4 focus:outline-none rounded-xl border-gray"
    id="bio" placeholder="Introduce yourself (short is good)"></textarea>
    <div x-data="{}" class="flex space-x-2">
        <button x-on:click="$wire.emit('move', '+')" class="btn">Skip</button>
        <button wire:click="save" class="btn">Send and Continue</button>
    </div>
</div>