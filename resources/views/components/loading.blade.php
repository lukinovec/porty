<div wire:loading.flex class='fixed inset-0 flex-col w-full h-full space-y-5 text-2xl bg-white flex-center'
    @if ($attributes['while'])
    wire:target='{{ $attributes['while'] }}'
    @endif>
    <img src='{{ asset('images/loading.svg') }}' class='animate-spin w-36 h-36' alt='Loading'>
    <p>{{ strlen($slot) > 0 ? $slot : 'Loading, please wait...' }}</p>
</div>