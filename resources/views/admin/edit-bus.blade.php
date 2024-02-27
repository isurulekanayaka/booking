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
                    <h3 class="mb-5 text-3xl font-semibold text-center text-blue-500">Edit Bus</h3>
                </div>
                @if(session('success'))
                <div class="text-center text-green-500 alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('admin.update-bus', ['id' => $bus->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex -mx-3">
                        <input type="hidden" name="id" value="{{$bus->id}}">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="busnumber" class="text-lg font-semibold text-gray-400">Bus Number</label>
                            <input type="text" id="busnumber" value="{{$bus->bus_number}}"
                                class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                placeholder="LN-0564" name="busnumber">
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="rootnumber" class="text-lg font-semibold text-gray-400">Root Number</label>
                        <input type="text" id="rootnumber" value="{{$bus->root_number}}"
                            class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                            placeholder="138" name="rootnumber">
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="type" class="px-1 text-xl font-semibold text-gray-400">Type</label>
                            <div class="flex">
                                <select id="type" name="type"
                                    class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500">
                                    <option value="a/c" class="text-gray-400" @if($bus->type == 'a/c') selected @endif>A/C</option>
                                    <option value="normal" class="text-gray-400" @if($bus->type == 'normal') selected @endif>Normal</option>
                                    <option value="highway" class="text-gray-400" @if($bus->type == 'highway') selected @endif>Highway</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="price" class="px-1 text-xl font-semibold text-gray-400">Seat Price</label>
                            <div class="flex">
                                <input type="number" id="price" value="{{$bus->price}}"
                                    class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                    placeholder="2500" name="price">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="start" class="px-1 text-xl font-semibold text-gray-400">Start</label>
                            <div class="flex">
                                <input type="text" id="start" value="{{$bus->start}}"
                                    class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                    placeholder="Collombo" name="start">
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="starttime" class="px-1 text-xl font-semibold text-gray-400">Time</label>
                            <div class="flex">
                                <input type="time" id="starttime" value="{{$bus->starttime}}"
                                    class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                    placeholder="" name="starttime">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="end" class="px-1 text-xl font-semibold text-gray-400">End</label>
                            <div class="flex">
                                <input type="text" id="end" value="{{$bus->end}}"
                                    class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                    placeholder="Kottawa" name="end">
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="endtime" class="px-1 text-xl font-semibold text-gray-400">Time</label>
                            <div class="flex">
                                <input type="time" id="endtime" value="{{$bus->endtime}}"
                                    class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                                    placeholder="" name="endtime">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="description" class="text-lg font-semibold text-gray-400">Description</label>
                        <textarea id="description" value="{{$bus->description}}"
                            class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                            placeholder="Can you Write Somthing..." name="description"></textarea>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="bus_image" class="text-lg font-semibold text-gray-400">Bus Image</label>
                        <input type="file" id="bus_image" accept="image/*"
                            class="w-full py-2 pl-3 pr-2 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500"
                            name="image">
                    </div>
                    <div class="flex justify-center mb-5">
                        <button
                            class="w-full max-w-xs px-3 py-3 font-semibold text-white bg-blue-500 border border-blue-700 rounded hover:bg-blue-700">
                            UPDATE NOW
                        </button>
                    </div>
                </form>
                <div class="flex justify-center">
                    <a href="{{ url('/tmp') }}" class="text-blue-500">Click back to Home</a>
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
