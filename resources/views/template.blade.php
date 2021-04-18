<!DOCTYPE html>
<html class="w-full h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Porty</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <link rel="shortcut icon" type="image/svg" href="{{ asset("images/logo.svg") }}"/>
        <style>
            .embla {
              overflow: hidden;
            }
            .embla__container {
              display: flex;
            }
            .embla__slide {
              position: relative;
              flex: 0 0 100%;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        @livewireStyles
    </head>
    <body class="flex flex-col items-center w-full h-full">
            @yield('content')
        {{-- <script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
        <script type="text/javascript">
          var emblaNode = document.querySelector('.embla')
          var options = { loop: false }
          var embla = EmblaCarousel(emblaNode, options)
        </script> --}}
        @livewireScripts
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
        <script>
            async function uploadImage({ name, owner }) {
                const { value: url } = await Swal.fire({
                  input: 'url',
                  inputLabel: 'Image link',
                  inputPlaceholder: 'Enter the URL'
                })
                if (url) {
                    Livewire.emit('upload-image', {url: url, owner: owner, name: name})
                }
            }
            window.addEventListener('swal:upload-image', event => {
                uploadImage(event.detail);
            })
        </script>
    </body>
</html>
