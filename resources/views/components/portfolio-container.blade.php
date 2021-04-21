<div class='flex flex-col w-full px-8 pb-20 mt-8 text-3xl font-medium h-5/6 rounded-2xl bg-figma-light'>
    <div class='absolute left-1/2 top-16'>
        <img src='{{ asset('images/logo.svg') }}' class='relative w-32 h-32 p-5 rounded-full -left-1/2 bg-figma-medium' />
    </div>
    <div class='flex items-end justify-center w-full h-8 text-4xl font-bold text-center mt-28 text-colors-white'>
        Some text
    </div>
    <section class='flex flex-col flex-1 w-full px-6 mt-8 xl:flex-row xl:space-x-14'>
        {{-- Left --}}
        <div class='flex flex-col flex-1 h-full space-y-5'>
            <div class='flex-1 p-5 py-8 overflow-auto text-colors-white bg-figma-medium rounded-2xl'>
                This project is very good and you should buy it for like $2DD0000 (monthly)<br class='block m-4'> Made using TailwindCSS, Laravel, Livewire and AlpineJS (any other tech stack is very cringe)
                This project is very good and you should buy it for like $2DD0000 (monthly)<br class='block m-4'> Made using TailwindCSS, Laravel, Livewire and AlpineJS (any other tech stack is very cringe)
            </div>
            <div class='flex space-x-4'>
                <button class='flex-1 h-20 transition duration-200 transform hover:scale-105 hover:bg-figma-medium text-colors-white rounded-2xl bg-figma-dark'>Project on GitHub</button>
                <button class='flex-1 h-20 transition duration-200 transform hover:scale-105 hover:bg-figma-medium text-colors-white rounded-2xl bg-figma-dark'>Live version</button>
            </div>
        </div>
        {{-- Ŗight --}}
        <div class='flex flex-col justify-center flex-1'>
            <div class='flex-1 flex-center text-colors-white bg-figma-medium rounded-2xl'>
                Images here
            </div>
        </div>
    </section>
</div>