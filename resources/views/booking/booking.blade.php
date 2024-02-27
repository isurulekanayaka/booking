<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Page Title</title>
    <!-- Include your styles from Vite -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <!-- Include Alpine.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>

    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>


<body class="flex flex-col min-h-screen bg-white">
    @include('components.nav-bar')

    <div class="flex-grow mb-5">
        <div class=" md:relative">
            <img src="{{ asset('img/login1.jpg') }}" class="w-screen h-[35%] darkened-image" />
            <div
                class="absolute z-20 transform -translate-x-1/2 -translate-y-1/2 lg:block md:top-3/4 left-1/3 md:w-7/12 top-2/4">
                <h1 class="text-5xl font-semibold text-blue-500 md:top-3/4 top-2/4"> Booking Now</h1>
            </div>
        </div>

        <div class="flex-grow mx-12">
            <form action="{{ route('bus-search') }}" method="POST"
                class="flex flex-wrap items-center justify-center p-4 bg-white rounded-lg shadow-2xl md:absolute justify md:w-11/12 md:p-10"
                style="">
                @csrf
                <div class="flex-grow w-full mb-2 mr-0 md:w-auto md:mr-2 md:mb-0">
                    <select name="from" id="from" class="w-full p-2 border border-black rounded-md" placeholder="From">
                        <option value="" selected disabled>From</option>
                        @foreach($busx as $bus)
                        <option value="{{ $bus->start }}">{{ $bus->start }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-grow w-full mx-0 mb-2 md:w-auto md:mx-2 md:mb-0">
                    <select name="to" id="to" class="w-full p-2 border border-black rounded-md" placeholder="To">
                        <option value="" selected disabled>To</option>
                        @foreach($busx as $bus)
                        <option value="{{ $bus->end }}">{{ $bus->end }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-grow w-full ml-0 md:w-auto md:ml-2">
                    <select name="type" id="type" class="w-full p-2 border border-black rounded-md" placeholder="type">
                        <option value="" selected disabled>Type</option>
                        <option value="A/C">A/C</option>
                        <option value="Normal">Normal</option>
                        <option value="Highway">Highway</option>
                    </select>
                </div>
                <button type="submit"
                    class="w-full px-4 py-3 mt-2 font-bold text-white bg-blue-500 border border-blue-700 rounded md:w-auto hover:bg-blue-700 grow md:ml-4">
                    Search
                </button>
            </form>
        </div>
    </div>
    <div class="flex flex-wrap mx-12 my-10 md:-mt-96">
        @foreach($buses as $bus)
        <div class="w-full mb-4 md:w-1/3 md:mb-5 md:px-2">
            <div
                class="overflow-hidden bg-white border-gray-100 border-dashed rounded-lg shadow-md border-1 hover:bg-blue-50">
                <form action="{{ route('bus-seat') }}" method="POST">
                    @csrf
                    <input type="hidden" name="bus_id" value="{{ $bus->id }}">

                    <img src="{{ asset('assets/images/' . $bus->image) }}" alt="" class="object-cover w-screen h-48" />
                    <div class="p-4">
                        <div class="flex justify-center mb-14">
                            <div class="h-12 mr-3 text-left">
                                <div>Start : {{ $bus->start }}</div>
                                <div>Time : {{ $bus->starttime }}</div>
                                <div>Type : {{ $bus->type }}</div>
                                <input type="date" required name="date"
                                    class="block w-full px-3 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    max="{{ date('Y-m-d', strtotime('+6 day')) }}">
                            </div>
                            <div class="h-12 ml-3 text-left">
                                <div>End : {{ $bus->end }}</div>
                                <div>Time : {{ $bus->endtime }}</div>
                                <div>Root : {{ $bus->root_number }}</div>
                                <button type="submit"
                                    class="inline-block px-4 py-2 mt-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring-blue-700">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>



    @include('components.footer')
</body>
<style>
    .darkened-image {
        filter: brightness(30%);
        /* Adjust the brightness percentage as needed (e.g., 50% for a darker effect) */
    }
</style>

</html>
