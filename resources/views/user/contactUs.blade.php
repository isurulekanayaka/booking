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
        <div class=" md:relative">
            <img src="{{ asset('img/cnt.jpg') }}" class="w-screen h-[50%] darkened-image" />
            <div
                class="absolute z-20 transform -translate-x-1/2 -translate-y-1/2 lg:block md:top-3/4 left-1/3 md:w-7/12 top-2/4">
                <h1 class="text-5xl font-semibold text-blue-500 md:top-3/4 top-2/4"> Contact Us</h1>
            </div>
        </div>
        <div class="mx-12 ">
            <blockquote class="relative flex flex-col items-center mb-10 bg-white shadow-xl rounded-xl">
                <div class="px-4 py-16 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:py-20">
                    <div class="mb-4">
                        <div class="max-w-3xl mb-6 text-center sm:text-center md:mx-auto md:mb-12">
                            <h2 class="mb-4 text-3xl font-bold tracking-tight text-blue-600 font-heading sm:text-5xl">
                                Get in Touch
                            </h2>
                        </div>
                    </div>
                    <div class="flex items-stretch justify-center">
                        <div class="grid md:grid-cols-2">
                            <div class="h-full pr-6">
                                <p class="mt-12 mb-5 text-base text-justify sm:leading-relaxed md:text-xl">
                                    For any inquiries or assistance regarding your bus bookings, our dedicated customer
                                    service team is here to help. Feel free to reach out to us through the following
                                    contact methods.
                                </p>
                                <ul class="mb-6 md:mb-0">
                                    <li class="flex">
                                        <div
                                            class="flex items-center justify-center w-10 h-10 bg-blue-900 rounded text-gray-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                <path
                                                    d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="mb-4 ml-4">
                                            <h3 class="mb-2 text-lg font-medium leading-6 text-blue-500">Our Address
                                            </h3>
                                            <p class="text-gray-600 dark:text-slate-400">1230 Maecenas Street Donec Road
                                            </p>
                                            <p class="text-gray-600 dark:text-slate-400">New York, EEUU</p>
                                        </div>
                                    </li>
                                    <li class="flex">
                                        <div
                                            class="flex items-center justify-center w-10 h-10 bg-blue-900 rounded text-gray-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <path
                                                    d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                                </path>
                                                <path d="M15 7a2 2 0 0 1 2 2"></path>
                                                <path d="M15 3a6 6 0 0 1 6 6"></path>
                                            </svg>
                                        </div>
                                        <div class="mb-4 ml-4">
                                            <h3 class="mb-2 text-lg font-medium leading-6 text-blue-500">Contact
                                            </h3>
                                            <p class="text-gray-600 dark:text-slate-400">Mobile: +1 (123) 456-7890</p>
                                            <p class="text-gray-600 dark:text-slate-400">Mail: tailnext@gmail.com</p>
                                        </div>
                                    </li>
                                    <li class="flex">
                                        <div
                                            class="flex items-center justify-center w-10 h-10 bg-blue-900 rounded text-gray-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-6 h-6">
                                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                                <path d="M12 7v5l3 3"></path>
                                            </svg>
                                        </div>
                                        <div class="mb-4 ml-4">
                                            <h3 class="mb-2 text-lg font-medium leading-6 text-blue-500">Working
                                                hours</h3>
                                            <p class="text-gray-600 dark:text-slate-400">Monday - Friday: 08:00 - 17:00
                                            </p>
                                            <p class="text-gray-600 dark:text-slate-400">Saturday &amp; Sunday: 08:00 -
                                                12:00</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="max-w-6xl p-5 card h-fit md:p-12" id="form">
                                <h2 class="mb-4 text-2xl font-bold">Ready to Get Started?</h2>
                                <form id="contactForm" action="{{ route('contact.send') }}" method="post">
                                    @csrf
                                    <div class="mb-6">
                                        <div class="mx-0 mb-1 sm:mb-4">
                                            <div class="mx-0 mb-1 sm:mb-4">
                                                <label for="name"
                                                    class="pb-1 text-xs tracking-wider uppercase"></label><input
                                                    type="text" id="name" autocomplete="given-name"
                                                    placeholder="Your name"
                                                    class="w-full py-2 pl-2 pr-4 mb-2 border border-gray-400 rounded-md shadow-md dark:text-gray-300 sm:mb-0"
                                                    name="name">
                                            </div>
                                            <div class="mx-0 mb-1 sm:mb-4">
                                                <label for="email"
                                                    class="pb-1 text-xs tracking-wider uppercase"></label><input
                                                    type="email" id="email" autocomplete="email"
                                                    placeholder="Your email address"
                                                    class="w-full py-2 pl-2 pr-4 mb-2 border border-gray-400 rounded-md shadow-md dark:text-gray-300 sm:mb-0"
                                                    name="email">
                                            </div>
                                        </div>
                                        <div class="mx-0 mb-1 sm:mb-4">
                                            <label for="textarea" class="pb-1 text-xs tracking-wider uppercase"></label>
                                            <textarea id="textarea" name="textarea" cols="30" rows="5" placeholder="Write your message..."
                                                class="w-full py-2 pl-2 pr-4 mb-2 border border-gray-400 rounded-md shadow-md dark:text-gray-300 sm:mb-0"></textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit"
                                            class="w-full px-6 py-3 font-bold text-white bg-blue-500 border border-blue-700 rounded-md font-xl sm:mb-0 hover:bg-blue-700">Send
                                            Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </blockquote>
            <div class="w-full mapouter">
                <div class="gmap_canvas">
                    <iframe src="https://maps.google.com/maps?q=galle&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                        frameborder="0" scrolling="no" class="w-full h-3/4"></iframe>
                    <style>
                        .mapouter {
                            position: relative;
                            height: 540px;
                            width: 100%;
                            background: #fff;
                        }

                        .maprouter a {
                            color: #fff !important;
                            position: absolute !important;
                            top: 0 !important;
                            z-index: 0 !important;
                        }

                    </style>
                    <a href="https://blooketjoin.org/" class="hidden">blooket</a>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            height: 640px;
                            width: 100%;
                        }

                        .gmap_canvas iframe {
                            position: relative;
                            z-index: 2;
                        }

                    </style>
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
