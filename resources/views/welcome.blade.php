@extends('template')
@section('content')
<div class="flex flex-col items-center justify-center w-full h-full">
    <section class="p-4 m-4">
        <h1 class="text-2xl font-bold">Welcome! <br></h1>
        To generate a portfolio, <a href="/auth/redirect">log in with your GitHub account</a>.
    </section>

    <form action="/portfolio">
        @csrf
        <input type="text" id="username" name="username" placeholder="Your GitHub username">
        <input type="submit" value="Submit">
    </form>
</div>
@endsection