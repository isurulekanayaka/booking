<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Page Title</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Include your styles from Vite -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <!-- Include Alpine.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>

    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css');
    </style>

</head>

<body>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="relative w-screen bg-center bg-no-repeat bg-cover"
        style="background-image: url('{{ asset('img/login2.png') }}');">
        <div class="absolute opacity-75 md:z-0 md:inset-0 bg-gradient-to-b from-blue-400 to-blue-500"></div>
        <div class="justify-center min-h-screen col-span-2 mx-0 sm:flex sm:flex-row">
            <div class="z-10 flex flex-col self-center p-10 sm:max-w-5xl xl:max-w-2xl">
                <div class="flex-col self-start justify-center hidden text-white lg:flex">
                    <img src="" class="mb-3">
                    <a title="" href="{{ route('user.home') }}" target="_blank" class="block w-16 h-16 transition-all transform rounded-full shadow hover:shadow-lg hover:scale-110 hover:rotate-12">
                        <span class="text-xl font-bold tracking-wide text-white uppercase">YOUR LOGO</span>
                    </a>
                    <h1 class="mb-3 text-5xl font-extrabold ">Welcome to our Online Bus Ticket Booking Platform</h1>
                </div>
            </div>
            <div class="z-10 flex self-center justify-center">
                <div class="w-full p-12 mx-auto bg-white rounded-2xl ">
                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold text-gray-800">Sign In </h3>
                        <p class="text-gray-500">Please sign in to your account.</p>
                    </div>
                    <form action="{{ route('login.post') }}" method="post" class="w-full space-y-5">
                        @csrf
                        <div class="space-y-2">
                            <label for="email" class="px-1 text-xs font-semibold">Email</label>
                            <div class="flex">
                                <div
                                    class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                    <i class="text-lg text-gray-400 mdi mdi-email-outline"></i>
                                </div>
                                <input type="email" id="email" name="email"
                                    class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                    placeholder="johnsmith@example.com">
                            </div>
                        </div>

                        <div class="space-y-2">

                            <label for="password" class="px-1 text-xs font-semibold">Password</label>
                            <div class="flex">
                                <div
                                    class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                    <i class="text-lg text-gray-400 mdi mdi-lock-outline"></i>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                    placeholder="************">
                            </div>

                        </div>
                        {{-- <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <a href="#" class="text-blue-500 hover:text-blue-600">Forgot your password?</a>
                            </div>
                            <div class="text-sm"></div>
                        </div> --}}
                        <div>
                            <button type="submit"
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">Sign
                                in</button>
                        </div>
                        <a href="/forgetpassword" class="text-xs text-gray-500">Forget Password?</a>
                        </form>
                        <div class="flex mt-5 -mx-3 text-center">
                            <div class="w-full px-3">
                                <a href="{{ url('/register') }}" class="text-blue-500"> Register Now</a>
                            </div>
                        </div>
                        <div class="pt-5 text-xs text-center text-gray-400">
                            <span>
                                Copyright © 2021-2022
                                <a href="https://codepen.io/uidesignhub" rel="" target="_blank" title="Ajimon"
                                    class="text-green hover:text-green-500 ">AJI</a></span>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
