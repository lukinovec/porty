<!DOCTYPE html>
<html class='w-full h-full' lang="en">
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>
    </head>
    <body class='w-full h-full px-1 sm:px-24'>
        <header class='flex items-center justify-end w-full px-8 py-3 space-x-4 text-3xl'>
            <a href='#projects' class='p-2 transition duration-100 transform hover:scale-105'>Projects</a>
            <a href='#about' class='p-2 transition duration-100 transform hover:scale-105'>About</a>
        </header>
        <section class='flex flex-col w-full pb-2'>
            <x-portfolio-container>
                @yield('about')
            </x-portfolio-container>

            {{-- <div class='w-full h-full'> --}}
                {{-- @foreach ($projects as $project)
                    <x-portfolio-container>
                        <x-project :project='$project'>
                    </x-portfolio-container>
                @endforeach --}}
            {{-- </div> --}}
        </section>
    </body>
</html>