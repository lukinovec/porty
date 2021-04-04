<!DOCTYPE html>
<html class="w-full h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Porty</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">

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
    </head>
    <body class="w-full h-full">
        @yield('content')
        <script src="https://unpkg.com/embla-carousel/embla-carousel.umd.js"></script>
        <script type="text/javascript">
          var emblaNode = document.querySelector('.embla')
          var options = { loop: false }
          var embla = EmblaCarousel(emblaNode, options)
        </script>
    </body>
</html>
