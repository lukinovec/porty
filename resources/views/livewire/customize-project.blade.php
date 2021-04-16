<div class="flex-col w-full flex-center">
    <h1 class='text-xl'>{{ $project['name'] }}</h1>
    <p>{{ $project['description'] }}</p>
    <input class='w-1/2 text-lg ' wire:model="updatable.description" class='w-24 h-12 text-lg' type='text' placeholder='Description' />
</div>