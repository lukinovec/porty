<section class='w-full h-full'>
    @foreach ($projects as $project)
    <livewire:customize-project :key="$project['name']" :project="$project" />
    @endforeach

    <button wire:click="save">Save changes</button>
</section>
