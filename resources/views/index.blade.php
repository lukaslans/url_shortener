<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>Url Shortener</title>

    </head>

    <body>
        <section class="max-w-lg mx-auto mt-10">
            <h1 class="text-center font-bold text-xl">Paste the URL you want to shorten</h1>
            <form method="POST" action="/" class="mt-4">
            @csrf
                <input required type="text" class="border border-gray-400 p-2 w-full rounded-xl" name="url">
                    @error('url')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                <button type="submit" class=" bg-green-500 text-white font-semibold rounded-xl py-3 px-5 mt-4 hover:bg-green-600">Shorten</button>
            </form>

            @if(isset($url))
            <h2 class="font-semibold mt-10 text-xl text-center">Your shortened URL is</h2>
            <p class="font-italic mt-2 text-center">localhost/{{$url->short_url}}</p>
            @endif
        </section>
    </body>
</html>
