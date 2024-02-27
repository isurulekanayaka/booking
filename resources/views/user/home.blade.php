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

<body class="bg-white">
    @include('components.nav-bar')
    <div>
        <div class="md:relative">
            <img src="{{ asset('img/homebg2.jpg') }}" class="w-screen h-[80vh] darkened-image" />
            <div
                class="absolute z-20 transform -translate-x-1/2 -translate-y-1/2 hi9dden lg:block top-1/2 left-1/3 md:w-7/12">
                <h1 class="mb-5 text-5xl font-semibold text-blue-400"> Your Journey: </h1>
                <h1 class="mb-10 text-5xl font-semibold text-white"> Bus Tickets Online with Ease</h1>
                <a href="{{ route('user.booking') }}">
                    <button class="w-full px-4 py-2 font-bold text-white bg-blue-500 border border-blue-700 rounded md:w-auto hover:bg-blue-700">
                        Booking Now
                    </button>
                </a>
            </div>
            <div
                class="absolute hidden transform -translate-x-1/2 -translate-y-1/2 lg:block top-1/2 left-3/4 md:w-5/12">
                <img src="{{ asset('img/bus.png') }}" alt="">
            </div>
            <div class="flex items-center justify-center my-8">
                <form action="{{ route('bus-search') }}" method="POST"
                    class="flex flex-wrap items-center justify-center p-4 bg-white rounded-lg shadow-2xl md:absolute bottom-16 justify md:w-11/12 md:-bottom-12 md:p-10"
                    style="">
                    @csrf
                    <div class="flex-grow w-full mb-2 mr-0 md:w-auto md:mr-2 md:mb-0">
                        <select name="from" id="from" class="w-full p-2 border border-black rounded-md" placeholder="From">
                            <option value="" selected disabled>From</option>
                            @foreach($buses as $bus)
                                <option value="{{ $bus->start }}">{{ $bus->start }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-grow w-full mx-0 mb-2 md:w-auto md:mx-2 md:mb-0">
                        <select name="to" id="to" class="w-full p-2 border border-black rounded-md"
                            placeholder="To">
                            <option value="" selected disabled>To</option>
                            @foreach($buses as $bus)
                                <option value="{{ $bus->end }}">{{ $bus->end }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex-grow w-full ml-0 md:w-auto md:ml-2">
                        <select name="type" id="type" class="w-full p-2 border border-black rounded-md"
                            placeholder="type">
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
    </div>


    {{-- <!-- Pagination links -->
    <div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
        {{-- {{ $data->links() }} --}}
    {{-- </div> - --}}
    <div class="mx-12 mt-20">
        <h1 class="justify-center mt-10 text-4xl font-semibold text-center text-blue-500">Selecting Your Ideal Bus Type</h1>
        <p class="mt-5 text-xl">When planning your journey on our online bus ticket booking website, we understand that
            each traveler has
            unique preferences and requirements. To enhance your travel experience, we offer a diverse range of bus
            types, catering to various needs. Explore our options,
        </p>
        <div class="flex my-10">
            <div
                class="w-1/3 mr-3 overflow-hidden bg-white border-gray-100 border-dashed rounded-lg shadow-md border-1 hover:bg-blue-50">
                <form action="{{ route('bus-search') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="Highway">
                    <button type="submit" class="flex flex-col items-center">
                        <img src="{{ asset('img/highway.png') }}" alt="" class="object-cover w-full" />
                        <div class="p-4">
                            <p class="mb-1 font-semibold text-center hover:text-blue-600">Highway Coaches</p>
                        </div>
                    </button>
                </form>

            </div>
            <div
                class="w-1/3 overflow-hidden bg-white border-gray-100 border-dashed rounded-lg shadow-md border-1 hover:bg-blue-50">
                <form action="{{ route('bus-search') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="a/c">
                    <button type="submit" class="flex flex-col items-center">
                        <img src="{{ asset('img/ac.png') }}" alt="" class="object-cover w-full" />
                        <div class="p-4">
                            <p class="mb-1 font-semibold text-center hover:text-blue-600">AC Buses</p>
                        </div>
                    </button>
                </form>
            </div>
            <div
                class="w-1/3 ml-3 overflow-hidden bg-white border-gray-100 border-dashed rounded-lg shadow-md border-1 hover:bg-blue-50">
                <form action="{{ route('bus-search') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="Normal">
                    <button type="submit" class="flex flex-col items-center">
                        <img src="{{ asset('img/normal.png') }}" alt="" class="object-cover w-full" />
                        <div class="p-4">
                            <p class="mb-1 font-semibold text-center hover:text-blue-600">Normal Buses</p>
                        </div>
                    </button>
                </form>
            </div>
        </div>
        <div class="mt-20 mb-10">
            <div class="mx-auto max-w-screen-2xl ">
                {{-- <div class="flex items-center justify-center text-justify">
                    <div class="flex items-center gap-12">
                        <h2 class="text-2xl font-bold text-blue-500 lg:text-4xl ">About Us</h2>
                    </div>
                </div> --}}
                <div class="w-full max-w-7xl md:mt-16">
                    <blockquote class="relative grid items-center bg-white shadow-xl md:grid-cols-3 rounded-xl">

                        <img class="hidden object-cover w-full h-full rounded-l-xl md:block"
                            style="clip-path: polygon(0 0%, 100% 0%, 75% 100%, 0% 100%);"
                            src="{{ asset('img/aboutus.jpg') }}">

                        <article class="relative p-6 md:p-8 md:col-span-2">
                            {{-- <svg class="absolute top-0 right-0 hidden w-24 h-24 -mt-12 -mr-12 text-primary-600 md:block"
                                width="256" height="256" viewBox="0 0 256 256" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M65.44 153.526V149.526H61.44H20.48C11.3675 149.526 4 142.163 4 133.105V51.4211C4 42.3628 11.3675 35 20.48 35H102.4C111.513 35 118.88 42.3628 118.88 51.4211V166.187C118.88 195.935 95.103 220.165 65.44 220.979V153.526ZM198.56 153.526V149.526H194.56H153.6C144.487 149.526 137.12 142.163 137.12 133.105V51.4211C137.12 42.3628 144.487 35 153.6 35H235.52C244.633 35 252 42.3628 252 51.4211V166.187C252 195.935 228.223 220.165 198.56 220.979V153.526Z"
                                    stroke="currentColor" stroke-width="8">
                                </path>
                            </svg> --}}
                            <div class="flex items-center gap-12 mb-10">
                                <h2 class="text-2xl font-semibold text-blue-500 lg:text-4xl">About Us</h2>
                            </div>

                            <div class="space-y-8">

                                <p class="text-base text-justify sm:leading-relaxed md:text-xl">
                                    Welcome to [Your Bus Booking Site] - your go-to destination for seamless bus ticket
                                    bookings. We're dedicated to providing a convenient and reliable platform for all
                                    your travel needs. From budget-friendly options to luxurious rides, we ensure a
                                    smooth journey every time. Choose us for a hassle-free travel experience, committed
                                    to your safety and comfort. Your journey begins here with [Your Bus Booking Site].
                                </p>
                            </div>
                        </article>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="mt-10 mb-10">
            <blockquote class="relative flex flex-col items-center mb-10 bg-white shadow-xl rounded-xl">
                <h1 class="mt-10 text-4xl font-semibold text-blue-500">Why Choose Us?</h1>
                <div class="flex justify-between w-full mt-10 mb-10">
                    <div class="flex flex-col items-center justify-center w-1/5 bg-transparent h-1/5">
                        <img src="{{ asset('img/icon/booking.png') }}" alt="" class="w-12 h-12 mb-4">
                        <p class="mt-auto">Easy Booking Process</p>
                    </div>
                    <div class="flex flex-col items-center justify-center w-1/5 bg-transparent h-1/5">
                        <img src="{{ asset('img/icon/diversity.png') }}" alt="" class="w-12 h-12 mb-4">
                        <p class="mt-auto">Diverse Options</p>
                    </div>
                    <div class="flex flex-col items-center justify-center w-1/5 bg-transparent h-1/5">
                        <img src="{{ asset('img/icon/security.png') }}" alt="" class="w-12 h-12 mb-4">
                        <p class="mt-auto">Safety First</p>
                    </div>
                    <div class="flex flex-col items-center justify-center w-1/5 bg-transparent h-1/5">
                        <img src="{{ asset('img/icon/support.png') }}" alt="" class="w-12 h-12 mb-4">
                        <p class="mt-auto">Supportive Service</p>
                    </div>
                    <div class="flex flex-col items-center justify-center w-1/5 bg-transparent h-1/5">
                        <img src="{{ asset('img/icon/success.png') }}" alt="" class="w-12 h-12 mb-4">
                        <p class="mt-auto">Convenient Booking</p>
                    </div>
                </div>
            </blockquote>
            <div class="relative grid items-center mt-10 bg-white shadow-xl rounded-xl">
                <div class="container px-6 mx-auto mb-10 md:px-12 xl:px-32">
                    <div class="mb-16 ">
                        <h2 class="justify-center text-4xl font-semibold text-center text-blue-500">Our Team</h2>
                        <p class="mt-16 text-base text-justify sm:leading-relaxed md:text-xl">Welcome to the dedicated team behind [Your Bus Booking Company]. Our passion for providing seamless travel experiences drives us to deliver the best service to our customers. Meet the individuals who work tirelessly to ensure your journey is comfortable, secure, and enjoyable.

                        </p>
                    </div>
                    <div class="grid items-center gap-12 md:grid-cols-3">
                        <div class="space-y-4 text-center">
                            <img class="object-cover w-64 h-64 mx-auto rounded-xl md:w-40 md:h-40 lg:w-64 lg:h-64"
                                src="https://tailus.io/sources/blocks/classic/preview/images/woman1.jpg" alt="woman" loading="lazy" width="640" height="805">
                            <div>
                                <h4 class="text-2xl">Hentoni Doe</h4>
                                <span class="block text-sm text-gray-500">CEO-Founder</span>
                            </div>
                        </div>
                        <div class="space-y-4 text-center">
                            <img class="object-cover w-64 h-64 mx-auto rounded-xl md:w-48 md:h-64 lg:w-64 lg:h-80"
                                src="https://tailus.io/sources/blocks/classic/preview/images/man.jpg" alt="man" loading="lazy" width="1000" height="667">
                            <div>
                                <h4 class="text-2xl">Jonathan Doe</h4>
                                <span class="block text-sm text-gray-500">Chief Technical Officer</span>
                            </div>
                        </div>
                        <div class="space-y-4 text-center">
                            <img class="object-cover w-64 h-64 mx-auto rounded-xl md:w-40 md:h-40 lg:w-64 lg:h-64"
                                src="https://tailus.io/sources/blocks/classic/preview/images/woman.jpg" alt="woman" loading="lazy" width="1000" height="667">
                            <div>
                                <h4 class="text-2xl">Anabelle Doe</h4>
                                <span class="block text-sm text-gray-500">Chief Operations Officer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
