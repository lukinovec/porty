<div class='flex-1 flex-center'>
    <div x-data='{
            images: @json($attributes['images']),
            currentImageIndex: 0,
            move: function(operation) {
                if(operation == "+") {
                    let nextIndex = this.currentImageIndex + 1;

                    if(nextIndex <= this.images.length - 1) {
                        this.currentImageIndex = nextIndex;
                    } else {
                        this.currentImageIndex = 0;
                    }
                }

                else if(operation == "-") {
                    let nextIndex = this.currentImageIndex - 1;

                    if(nextIndex >= 0) {
                        this.currentImageIndex = nextIndex;
                    }
                }
            }
        }' class='flex-col flex-1 h-full p-3 space-y-4 text-white flex-center bg-figma-medium rounded-2xl'>
        @if ($attributes['contact'])
        {{ $attributes['contact'] }}
        @elseif ($attributes['images'])
        <div class='flex flex-col h-full my-auto space-y-12 overflow-auto max-h-96 rounded-2xl'>
            @foreach ($attributes['images'] as $image)
            <div class='flex-col flex-1 flex-center'>
                <img class='max-h-full rounded-2xl' src='{{ $image['download_url'] }}'>
            </div>
            @endforeach
            {{-- <div class='flex space-x-6'>
                <button class='flex-1 h-20 m-2 text-white transition duration-200 transform hover:scale-105 hover:bg-figma-light rounded-2xl bg-figma-dark flex-center' x-on:click="move('-')">Previous</button>
                <button class='flex-1 h-20 m-2 text-white transition duration-200 transform hover:scale-105 hover:bg-figma-light rounded-2xl bg-figma-dark flex-center' x-on:click="move('+')">Next</button>
            </div> --}}
        </div>
        @else
        No images found.
        @endif
    </div>
</div>