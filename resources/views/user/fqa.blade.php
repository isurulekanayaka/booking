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
</head>


<body class="bg-white">
    @include('components.nav-bar')
    <div class=" md:relative">
        <img src="{{ asset('img/fqa1.jpg') }}" class="w-screen h-[50%] darkened-image" />
        <div
            class="absolute z-20 transform -translate-x-1/2 -translate-y-1/2 lg:block md:top-3/4 left-1/3 md:w-7/12 top-2/4">
            <h1 class="text-5xl font-semibold text-blue-500 md:top-3/4 top-2/4"> FQA</h1>
        </div>
    </div>
    <h2 class="mt-20 mb-10 text-3xl font-bold tracking-tight text-center text-blue-600 font-heading sm:text-5xl">
        Have Questions? We Have Answers!
    </h2>
    <div class="relative flex flex-col items-center mx-10 mt-10 shadow-xl rounded-xl">
        <div x-data="accordion(1)" class="w-[93vw]">
            <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                <div class="flex items-center justify-between">
                    <span class="mt-12 mb-5 text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">How do I
                        book a bus ticket online?</span>
                    <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current ">
                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div x-ref="tab" :style="handleToggle()"
                class="relative overflow-hidden transition-all duration-700 max-h-0">
                <div class="px-6 pb-4 text-gray-600">
                    <ul>
                        <li>
                            To book a bus ticket, visit our website and select your departure and destination locations.
                        </li>
                        <li>
                            Choose your preferred date and time of travel.
                        </li>
                        <li>
                            Select the type of bus and seat you prefer.
                        </li>
                        <li>
                            Complete the payment process securely online.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex flex-col items-center mx-10 mt-10 shadow-xl rounded-xl">
        <div x-data="accordion(2)" class="w-[93vw]">
            <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                <div class="flex items-center justify-between">
                    <span class="mt-12 mb-5 text-base tracking-wide text-justify sm:leading-relaxed md:text-xl"> Can I
                        cancel or modify my bus reservation?</span>
                    <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current ">
                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div x-ref="tab" :style="handleToggle()"
                class="relative overflow-hidden transition-all duration-700 max-h-0">
                <div class="px-6 pb-4 text-gray-600">
                    Yes, you can cancel or modify your reservation depending on the terms and conditions of the bus
                    service provider. Check the cancellation policy during the booking process or contact our customer
                    support for assistance.
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex flex-col items-center mx-10 mt-10 shadow-xl rounded-xl">
        <div x-data="accordion(3)" class="w-[93vw]">
            <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                <div class="flex items-center justify-between">
                    <span class="mt-12 mb-5 text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">What
                        payment methods are accepted?</span>
                    <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current ">
                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div x-ref="tab" :style="handleToggle()"
                class="relative overflow-hidden transition-all duration-700 max-h-0">
                <div class="px-6 pb-4 text-gray-600">
                    We accept various payment methods, including credit/debit cards and online payment gateways. Ensure
                    you check the available options during the booking process.
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex flex-col items-center mx-10 mt-10 shadow-xl rounded-xl">
        <div x-data="accordion(4)" class="w-[93vw]">
            <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                <div class="flex items-center justify-between">
                    <span class="mt-12 mb-5 text-base tracking-wide text-justify sm:leading-relaxed md:text-xl"> How do
                        I receive my bus ticket?</span>
                    <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current ">
                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div x-ref="tab" :style="handleToggle()"
                class="relative overflow-hidden transition-all duration-700 max-h-0">
                <div class="px-6 pb-4 text-gray-600">
                    After a successful booking, you will receive an e-ticket via email. You can also log in to your
                    account on our website to view and download your ticket.
                </div>
            </div>
        </div>
    </div>
    <div class="relative flex flex-col items-center mx-10 mt-10 shadow-xl rounded-xl">
        <div x-data="accordion(5)" class="w-[93vw]">
            <div @click="handleClick()" class="w-full p-4 text-left cursor-pointer">
                <div class="flex items-center justify-between">
                    <span class="mt-12 mb-5 text-base tracking-wide text-justify sm:leading-relaxed md:text-xl">Is it
                        safe to book bus tickets online?</span>
                    <span :class="handleRotate()" class="transition-transform duration-500 transform fill-current ">
                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div x-ref="tab" :style="handleToggle()"
                class="relative overflow-hidden transition-all duration-700 max-h-0">
                <div class="px-6 pb-4 text-gray-600">
                    Yes, our online booking platform is secure. We use encryption and other security measures to protect
                    your personal and payment information.
                </div>
            </div>
        </div>
    </div>
    <div class="items-center mx-12 mt-10 mb-4">
        <h2 class="text-2xl font-bold text-center">For any other questions or assistance, feel free to <a href="{{ route('user.contact') }}" class="text-blue-500">contact us!</a></h2>
    </div>
    <script>
        // Faq
        document.addEventListener("alpine:init", () => {
            Alpine.store("accordion", {
                tab: 0
            });

            Alpine.data("accordion", (idx) => ({
                init() {
                    this.idx = idx;
                },
                idx: -1,
                handleClick() {
                    this.$store.accordion.tab =
                        this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                    return this.$store.accordion.tab === this.idx ? "-rotate-180" : "";
                },
                handleToggle() {
                    return this.$store.accordion.tab === this.idx ?
                        `max-height: ${this.$refs.tab.scrollHeight}px` :
                        "";
                }
            }));
        });
        //  end faq
    </script>

    @include('components.footer')
    <style>
        .darkened-image {
            filter: brightness(30%);
            /* Adjust the brightness percentage as needed (e.g., 50% for a darker effect) */
        }
    </style>


</body>

</html>
