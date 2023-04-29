<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page not found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full bg-gray-100">
    <div class="flex h-full items-center justify-center">
        <div class="p-5 border-r border-indigo-400">
            <h1 class="text-7xl text-indigo-800 font-bold">404</h1>
        </div>
        <div class="flex flex-col p-5">
            <h1 class="text-5xl font-bold text-black">Page not found</h1>
            <p class="mt-2 text-neutral-400">Please check you url and refresh</p>
            <div class="mt-3">
                <a href="{{ route('home') }}"
                    class="py-2 px-3 bg-indigo-800 text-white hover:bg-indigo-700 shadow-md hover:shadow-none transition-shadow">Back
                    to home</a>
            </div>
        </div>
    </div>

</body>

</html>
