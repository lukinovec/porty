<div class="p-1 m-1">
    <section class="flex flex-col text-xl">
        <a class="font-bold" target="_blank" href="{{ $project["html_url"] }}">
            {{ $project["name"] }}
        </a>
        <span class="font-serif">
            {{ $project["description"] }}
        </span>
    </section>

    <section class="embla">
        <div class="embla__container">
        @forelse ($project["pictures"] as $picture)
          <div class="flex items-center justify-center embla__slide">
            <img class="embla__slide__img" src='{{ $picture["download_url"] }}' alt="picture" />
          </div>
          @empty
          No pictures found.
        @endforelse
        </div>
    </section>
</div>