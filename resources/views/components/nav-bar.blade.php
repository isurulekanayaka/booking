<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
    integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous" />
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<style>
    html,
    body {
        font-family: "Rubik", sans-serif;
    }

    /* navigation
 - show navigation always on the large screen devices with (min-width:1024)
*/

    @media (min-width: 1024px) {
        .top-navbar {
            display: inline-flex !important;
        }
</style>
<nav class="relative flex flex-wrap items-center p-3 bg-gray-800">
    <a href="#" class="inline-flex items-center p-2 mx-8 mr-4">
        <span class="text-xl font-bold tracking-wide text-white uppercase">YOUR LOGO</span>
    </a>
    <button
        class="inline-flex p-3 ml-auto text-white rounded outline-none hover:bg-gray-900 lg:hidden hover:text-white nav-toggler"
        data-target="#navigation">
        <i class="material-icons">menu</i>
    </button>
    <div class="hidden top-navbar lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <div
            class="flex flex-col items-start w-full lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto lg:items-center lg:h-auto">
            <a href="{{ route('user.home') }}"
                class="items-center justify-center w-full px-3 py-2 text-white rounded lg:inline-flex lg:w-auto hover:text-blue-500">
                <span>Home</span>
            </a>
            <a href="{{ route('user.contact') }}"
                class="items-center justify-center w-full px-3 py-2 text-white rounded lg:inline-flex lg:w-auto hover:text-blue-500">
                <span>Contact Us</span>
            </a>
            <a href="{{ route('user.fqa') }}"
                class="items-center justify-center w-full px-3 py-2 text-white rounded lg:inline-flex lg:w-auto hover:text-blue-500">
                <span>FQA</span>
            </a>
            <a href="{{ route('user.booking') }}"
                class="items-center justify-center w-full px-3 py-2 text-gray-400 rounded lg:inline-flex lg:w-auto">
                <span>
                    <button
                        class="w-full px-4 py-2 font-bold text-white bg-blue-500 border border-blue-700 rounded md:w-auto hover:bg-blue-700">
                        Booking Now
                    </button>
                </span>
            </a>
            <ul class="flex items-center ml-auto">
                <li class="ml-3 dropdown" onclick="toggleDropdown(event)">
                    <button type="button" class="flex items-center dropdown-toggle">
                        <img src="{{ asset('img/icon/avatar.png') }}" alt=""
                            class="block object-cover w-8 h-8 align-middle rounded">
                    </button>
                    <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px] absolute right-0 mt-5" id="dropdownMenu">
    @guest
        <!-- Display login link for guests (not logged in users) -->
        <li>
            <a href="{{ route('login') }}" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Login</a>
        </li>
    @else
        <!-- Display logout link for authenticated users (logged in users) -->
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <li>
                <button type="submit" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">
                    Logout
                </button>
            </li>
        </form>
    @endguest
</ul>

                </li>
            </ul>
        </div>
    </div>
</nav>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
    integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $(".nav-toggler").each(function(_, navToggler) {
            var target = $(navToggler).data("target");
            $(navToggler).on("click", function() {
                $(target).animate({
                    height: "toggle"
                });
            });
        });
    });

</script>
<script>
    function toggleDropdown(event) {
        event.stopPropagation();
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.classList.toggle("hidden");
    }

    document.addEventListener("click", function(event) {
        var dropdownMenu = document.getElementById("dropdownMenu");
        if (!dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
</script>
