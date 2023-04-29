<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>LaraGigs | Find Laravel Jobs & Projects</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="{{ route('home') }}"><img class="w-24" src="{{ asset('images/logo.png') }}" alt=""
                class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <small class="font-bold text-lg">
                        Wlecome {{ Auth::User()->name }}</small>
                </li>
                <li>
                    <a href="" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                        Manage Listings</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Logout</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('create_user') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                        Register</a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="hover:text-laravel"><i
                            class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a>
                </li>
            @endauth
        </ul>
    </nav>
    {{-- main content --}}
    <main>
        @yield('content')
    </main>


    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a href="{{ route('create') }}" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
    </footer>
    <x-flashMessage />

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
</body>

</html>