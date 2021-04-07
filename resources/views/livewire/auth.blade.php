<div class="flex flex-col items-center justify-center">
    <a href="{{ url('auth/redirect') }}" class="flex p-2 m-2 space-x-2 text-lg border-2 w-52 rounded-xl border-gray">
        <img src="{{ asset('images/github.png') }}" alt="github logo">
        <p class="text-center">Log in via GitHub</p>
    </a>
    <p class="text-center">
        After you log in, you will be redirected back and Porty will get all your projects.
    </p>
</div>