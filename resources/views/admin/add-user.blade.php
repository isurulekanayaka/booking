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
            <div class="p-12 mx-auto bg-white rounded-2xl w-100">
                <div class="mb-4">
                    <h3 class="mb-5 text-3xl font-semibold text-center text-blue-500">Sign In</h3>
                </div>
                @if(session('success'))
                <div class="text-center text-green-500 alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div>
                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-5">
                                <label for="first_name" class="px-1 text-xl font-semibold text-gray-400">First
                                    name</label>
                                <div class="flex">
                                    <div
                                        class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                        <i class="text-lg text-gray-400 mdi mdi-account-outline"></i>
                                    </div>
                                    <input type="text" id="first_name" name="f_name"
                                        class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                        placeholder="John" required>
                                </div>
                            </div>
                            <div class="w-1/2 px-3 mb-5">
                                <label for="last_name" class="px-1 text-xl font-semibold text-gray-400">Last
                                    name</label>
                                <div class="flex">
                                    <div
                                        class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                        <i class="text-lg text-gray-400 mdi mdi-account-outline"></i>
                                    </div>
                                    <input type="text" id="last_name" name="l_name"
                                        class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                        placeholder="Smith" required>
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-1/2 px-3 mb-5">
                                <label for="Roll" class="px-1 text-xl font-semibold text-gray-400">User Role</label>
                                <div class="flex">
                                    <div
                                        class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                        <i class="text-lg text-gray-400 mdi mdi-account-outline"></i>
                                    </div>
                                    <select id="roll" name="user_role"
                                        class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500">
                                        <option value="admin" class="text-gray-400 ">Admin</option>
                                        <option value="user" class="text-gray-400 ">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-1/2 px-3 mb-5">
                                <label for="user_status" class="px-1 text-xl font-semibold text-gray-400">User Status</label>
                                <div class="flex">
                                    <div
                                        class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                        <i class="text-lg text-gray-400 mdi mdi-account-outline"></i>
                                    </div>
                                    <select id="user_status" name="user_status"
                                        class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500">
                                        <option value="Active" class="text-gray-400 ">Active</option>
                                        <option value="Inactive" class="text-gray-400 ">Inactive</option>
                                        <option value="Disable" class="text-gray-400 ">Disable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="email" class="px-1 text-xl font-semibold text-gray-400">Email</label>
                                <div class="flex">
                                    <div
                                        class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                        <i class="text-lg text-gray-400 mdi mdi-email-outline"></i>
                                    </div>
                                    <input type="email" id="email" name="email"
                                        class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                        placeholder="johnsmith@example.com" required>
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="phone" class="px-1 text-xl font-semibold text-gray-400">Phone</label>
                                <div class="flex">
                                    <div
                                        class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                        <i class="text-lg text-gray-400 mdi mdi-phone-outline"></i>
                                    </div>
                                    <input type="tel" id="phone" name="phone"
                                        class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                        placeholder="0774567890" required>
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-12">
                                <label for="password" class="px-1 text-xl font-semibold text-gray-400">Password</label>
                                <div class="flex">
                                    <div
                                        class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none">
                                        <i class="text-lg text-gray-400 mdi mdi-lock-outline"></i>
                                    </div>
                                    <input type="password" id="password" name="password"
                                        class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                        placeholder="************" required>
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <button type="submit"
                                    class="block w-full max-w-xs px-3 py-3 mx-auto font-semibold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">
                                    REGISTER NOW
                                </button>
                            </div>
                        </div>

                    </div>
                </form>
                <div class="flex -mx-3 text-center">
                    <div class="w-full px-3">
                        <a href="{{ url('/tmp') }}" class="text-blue-500"> Click back to Home</a>
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
