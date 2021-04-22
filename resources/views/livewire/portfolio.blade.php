<x-portfolio.template class='box-border min-h-screen pb-32' x-data="{ nickname: {{ $user['nickname'] }} }">
    {{-- Projects --}}
    @foreach ($projects as $project)
    <x-portfolio.container :project="$project" :headline="$project['name']" :images="$project['pictures']" :buttons='true'>
        {{ $project['description'] }}
    </x-portfolio.container>
    @endforeach

    {{-- About --}}
    <div id='about' class='h-screen'>
        <x-portfolio.container :headline="$user['nickname']" :contact="$user['contact']">
            {{ $user['about'] }}
        </x-portfolio.container>
    </div>
</x-portfolio.template>