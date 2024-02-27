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
    <div class="flex justify-center bg-gray-200">
        <div class="z-10 flex self-center justify-center my-10">
            <div class="w-screen max-w-lg p-12 mx-auto bg-white rounded-2xl">
                <div class="mb-4">
                    <h3 class="mb-5 text-3xl font-semibold text-center text-blue-500">Add Root</h3>
                </div>
                <div>
                    <div class="flex flex-col mb-5">
                        <label for="from" class="text-lg font-semibold text-gray-400">From</label>
                        <input type="text" id="from"
                            class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                            placeholder="Colombo">
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="to" class="text-lg font-semibold text-gray-400">To</label>
                        <input type="text" id="to"
                            class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                            placeholder="Galle">
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="rootno" class="text-lg font-semibold text-gray-400">Root Number</label>
                        <input type="text" id="rootno"
                            class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                            placeholder="122">
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="description" class="text-lg font-semibold text-gray-400">Description</label>
                        <textarea id="description"
                                  class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                  placeholder="Can you Write Somthing..."></textarea>
                    </div>
                    <div class="flex justify-center mb-5">
                        <button
                            class="w-full max-w-xs px-3 py-3 font-semibold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700"
                            onclick="registerUser()">REGISTER NOW</button>
                    </div>
                    <div class="flex justify-center">
                        <a href="{{ url('/tmp') }}" class="text-blue-500">Click back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



<style>
    .darkened-image {
        filter: brightness(30%);
        /* Adjust the brightness percentage as needed (e.g., 50% for a darker effect) */
    }
</style>

<script>
    function registerUser() {
        // Implement your user registration logic here
        alert('User registration logic goes here');
    }
</script>

</html>
