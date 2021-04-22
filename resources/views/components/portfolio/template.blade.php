<div class='w-full h-full px-1 lg:px-24 xl:px-44'>
    <header class='flex items-center justify-end w-full px-8 py-3 space-x-4 text-3xl'>
        <a href='#projects' class='p-2 transition duration-100 transform hover:scale-105'>Projects</a>
        <a href='#about' class='p-2 transition duration-100 transform hover:scale-105'>About</a>
    </header>
    <section class="{{ $attributes['class'] }}">
        {{ $slot }}
    </section>
</div>