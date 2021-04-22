<div class='box-border flex-col flex-1 w-full px-4 pt-8 pb-16 text-xl font-medium shadow-2xl flex-center mb-36 md:text-2xl xl:text-3xl rounded-2xl bg-figma-light'
style='height: 90vh; max-height: 90vh'>
    @if ($attributes['image'])
    <div class='absolute left-1/2 top-14'>
        <span class='relative rounded-full w-36 h-36 bg-figma-medium -left-1/2 flex-center'>
            <img src='{{ $attributes['image'] }}' class='w-2/3 h-2/3' />
        </span>
    </div>
    @endif
    <div class='flex items-end justify-center w-full h-12 text-4xl font-bold text-center text-white'>
        {{ $attributes['headline'] }}
    </div>
    <section class='box-border flex flex-col flex-1 w-full max-h-full px-6 mt-8 xl:flex-row xl:space-x-14'>
        <x-portfolio.left-pane :project="$attributes['project']" :buttons="$attributes['buttons']">
            {{ $slot }}
        </x-portfolio.left-pane>
        <x-portfolio.right-pane :contact="$attributes['contact']" :images="$attributes['images']" />
    </section>
</div>