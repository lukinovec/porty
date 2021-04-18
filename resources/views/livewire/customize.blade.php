<section class='w-full h-full overflow-auto'>
    @foreach ($projects as $project)
    <livewire:customize-project :key="$project['name']" :project="$project" />
    @endforeach

    <button class='btn' wire:click="save">Save changes</button>
</section>
