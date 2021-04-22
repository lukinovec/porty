<div class='flex flex-col flex-1 space-y-5'>
    <div class='flex-1 p-5 py-8 overflow-auto text-white bg-figma-medium rounded-2xl'>
        {{ $slot }}
    </div>

    @if ($attributes['buttons'])
    <div class='flex space-x-4'>
        <a href='{{ $attributes['project']['svn_url'] }}' target='_blank' class='flex-1 h-20 text-white transition duration-200 transform flex-center hover:scale-105 hover:bg-figma-medium rounded-2xl bg-figma-dark'>Project on GitHub</a>
        @if (isset($attributes['project']['live_url']))
        <a href='{{ $attributes['project']['live_url'] }}' class='flex-1 h-20 text-white transition duration-200 transform hover:scale-105 hover:bg-figma-medium rounded-2xl bg-figma-dark'>Live version</a>
        @endif
    </div>
    @endif
</div>