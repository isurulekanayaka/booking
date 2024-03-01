<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @vite('resources/css/app.css')

    <title>Dashboard</title>
</head>

<body class="text-gray-800 font-inter">

    <!-- start: Sidebar -->
    <div class="fixed top-0 left-0 z-50 w-64 h-full p-4 transition-transform bg-gray-900 sidebar-menu">
        <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
            <img src="https://placehold.co/32x32" alt="" class="object-cover w-8 h-8 rounded">
            <span class="ml-3 text-lg font-bold text-white">Logo</span>
        </a>
        <ul class="mt-4">
            <li class="mb-1 group ">
                <a href="#" onclick="displayDashboard()"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="mr-3 text-lg ri-home-2-line"></i>
                    <span class="text-sm">Dashboard</span>
                </a>
            </li>
            <li class="mb-1 group">
                <a href="#" onclick="submitUserViewForm()"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="mr-3 text-lg ri-bus-line"></i>
                    <span class="text-sm">User</span>
                </a>
            </li>

            <script>
                function submitUserViewForm() {
                    document.getElementById('userViewForm').submit();
                }
            </script>

            <form id="userViewForm" method="GET" action="{{ route('user-view') }}">
                @csrf <!-- Include this line for CSRF protection, if needed -->
            </form>
            <li class="mb-1 group">
                <a href="#" onclick="submitRootViewForm()"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="mr-3 text-lg ri-instance-line"></i>
                    <span class="text-sm">Ticket</span>
                </a>
            </li>

            <script>
                function submitRootViewForm() {
                    document.getElementById('rootViewForm').submit();
                }
            </script>

            <form id="rootViewForm" method="GET" action="{{ route('root-view') }}">
                @csrf <!-- Include this line for CSRF protection, if needed -->
            </form>
            <li class="mb-1 group">
                <a href="#" onclick="submitBusViewForm()"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="mr-3 text-lg ri-bus-line"></i>
                    <span class="text-sm">Bus</span>
                </a>
            </li>
            <script>
                function submitBusViewForm() {
                    document.getElementById('busViewForm').submit();
                }
            </script>

            <form id="busViewForm" method="GET" action="{{ route('bus-view') }}">
                @csrf <!-- Include this line for CSRF protection, if needed -->
            </form>
            <li class="mb-1 group">
                <a href="#"
                    class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle">
                    <i class="mr-3 text-lg ri-settings-2-line"></i>
                    <span class="text-sm">Settings</span>
                    <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                </a>
                <ul class="pl-7 mt-2 hidden group-[.selected]:block">
                    <li class="mb-4">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-gray-300 text-sm flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">
                                Logout
                            </button>
                        </form>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
    <div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50 md:hidden sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">
        <div class="sticky top-0 left-0 z-30 flex items-center px-6 py-2 bg-white shadow-md shadow-black/5">
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-line"></i>
            </button>
            {{-- <ul class="flex items-center ml-4 text-sm">
                <li class="mr-2">
                    <a href="#" class="font-medium text-gray-400 hover:text-gray-600">Dashboard</a>
                </li>
                <li class="mr-2 font-medium text-gray-600">/</li>
                <li class="mr-2 font-medium text-gray-600">Analytics</li>
            </ul> --}}
            <ul class="flex items-center ml-auto">

                <li class="ml-3 dropdown">
                    <button type="button" class="flex items-center dropdown-toggle">
                        <img src="https://placehold.co/32x32" alt=""
                            class="block object-cover w-8 h-8 align-middle rounded">
                    </button>
                    <ul
                        class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Profile</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="dashboard" class="hidden">
            <div class="text-center ">
                <h1 class="m-10 text-5xl font-semibold text-gray-900">Wellcome Online Ticket Booking System</h1>
                <h2 class="text-4xl font-semibold text-gray-800">Admin Dashboard</h2>
            </div>
            <div class="flex m-2">
                <div class="flex-1 w-1/3 h-auto p-5 m-5 border border-blue-500 rounded-lg">
                    <div class="flex flex-wrap">
                        <div class="">
                            <img src="{{ asset('img/icon/profile.png') }}" alt="" class="w-24 mr-4">
                        </div>
                        <div class="flex items-center">
                            <!-- Added items-center class -->
                            <div class="flex flex-col">
                                <div class="">
                                    <h3 class="text-3xl">User</h3>
                                </div>
                                <div class="">
                                    {{$usersCount}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 w-1/3 h-auto p-5 m-5 border border-blue-500 rounded-lg">
                    <div class="flex flex-wrap">
                        <div class="">
                            <img src="{{ asset('img/icon/profile.png') }}" alt="" class="w-24 mr-4">
                        </div>
                        <div class="flex items-center">
                            <!-- Added items-center class -->
                            <div class="flex flex-col">
                                <div class="">
                                    <h3 class="text-3xl">Bus</h3>
                                </div>
                                <div class="">
                                    {{$busesCount}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 w-1/3 h-auto p-5 m-5 border border-blue-500 rounded-lg">
                    <div class="flex flex-wrap">
                        <div class="">
                            <img src="{{ asset('img/icon/profile.png') }}" alt="" class="w-24 mr-4">
                        </div>
                        <div class="flex items-center">
                            <!-- Added items-center class -->
                            <div class="flex flex-col">
                                <div class="">
                                    <h3 class="mx-auto text-3xl">Ticket</h3>
                                </div>
                                <div class="">
                                    {{$ticketCount}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="user" class="hidden m-7">
            {{-- <div class="flex justify-between mb-4">
                <div class="w-1/2">
                    <a href="" class="text-3xl" onclick="displayDashboard()">Dashboard</a><samp class="text-3xl"> /
                        User</samp>
                </div>
                <div class="flex justify-end w-1/2">
                    <a href="{{ url('/add-user') }}">
                        <button class="p-2 bg-blue-500 rounded-lg hover:bg-blue-600">
                            User +
                        </button>
                    </a>
                </div>
            </div> --}}
            <!-- component -->
            {{-- <div class="flex items-center ">
                <div class="rounded-lg">
                    <div class="flex w-1/1">
                        <div
                            class="flex items-center justify-center w-10 p-5 bg-white border border-r border-gray-200 rounded-tl-lg rounded-bl-lg">
                            <svg viewBox="0 0 20 20" aria-hidden="true"
                                class="absolute w-5 transition pointer-events-none fill-gray-500">
                                <path
                                    d="M16.72 17.78a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM9 14.5A5.5 5.5 0 0 1 3.5 9H2a7 7 0 0 0 7 7v-1.5ZM3.5 9A5.5 5.5 0 0 1 9 3.5V2a7 7 0 0 0-7 7h1.5ZM9 3.5A5.5 5.5 0 0 1 14.5 9H16a7 7 0 0 0-7-7v1.5Zm3.89 10.45 3.83 3.83 1.06-1.06-3.83-3.83-1.06 1.06ZM14.5 9a5.48 5.48 0 0 1-1.61 3.89l1.06 1.06A6.98 6.98 0 0 0 16 9h-1.5Zm-1.61 3.89A5.48 5.48 0 0 1 9 14.5V16a6.98 6.98 0 0 0 4.95-2.05l-1.06-1.06Z">
                                </path>
                            </svg>
                        </div>
                        <input type="text" class="w-full pl-2 text-base font-semibold bg-white border outline-0"
                            placeholder="Enter User Name..." id="" />
                        <input type="button" value="Buscar"
                            class="p-2 font-semibold bg-blue-500 border rounded-tr-lg rounded-br-lg hover:bg-blue-600" />
                    </div>
                </div>
            </div> --}}
            <!-- component -->
            {{-- <div class="antialiased">
                <div class="container px-4 mx-auto sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">Users</h2>
                        </div>
                        <div class="flex flex-col my-2 sm:flex-row">
                            <div class="flex flex-row mb-1 sm:mb-0">
                                <div class="relative">
                                    <select
                                        class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-400 rounded-l appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative">
                                    <select
                                        class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                        <option>All</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="relative block">
                                <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                                        <path
                                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                        </path>
                                    </svg>
                                </span>
                                <input placeholder="Search"
                                    class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded-l rounded-r appearance-none sm:rounded-l-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                            </div>
                            <div class="relative block">
                                <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                                    <button
                                        class="block w-full py-2 pl-8 pr-6 text-sm bg-blue-500 rounded-lg focus:outline-none hover:bg-blue-600">Search</button>
                                </span>
                            </div>
                        </div>
                        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                User
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Rol
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Created at
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Status
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="px-2 py-5 text-sm bg-white border-b border-gray-200">
                                                <div class="flex ">
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{$user->f_name ." ".$user->l_name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">{{$user->user_role}}</p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$user->created_at}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 rounded-full opacity-50"></span>
                                                    <span class="relative">{{$user->user_status}}</span>
                                                </span>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <img src="{{ asset('img/icon/dots.png') }}" class="h-5 cursor-pointer"
                                                    alt="" onclick="toggleOptions(this)">
                                                <div id="options"
                                                    class="absolute hidden mt-2 bg-white border border-gray-200 rounded-md shadow-md">
                                                    <a href="{{ route('admin.edit-user', ['id' => $user->id]) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:cursor-pointer">Edit</a>
                                                    <form id="delete-form-{{$user->id}}"
                                                        action="{{ route('admin.delete-user', ['id' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:cursor-pointer">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div
                                    class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                                    <span class="text-xs text-gray-900 xs:text-sm">
                                        Showing 1 to 4 of 50 Entries
                                    </span>
                                    <div class="inline-flex mt-2 xs:mt-0">
                                        <button
                                            class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-l hover:bg-gray-400">
                                            Prev
                                        </button>
                                        <button
                                            class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-r hover:bg-gray-400">
                                            Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div id="root" class="hidden m-7">
            {{-- <div class="flex justify-between mb-4">
                <div class="w-1/2">
                    <a href="" class="text-3xl" onclick="displayDashboard()">Dashboard</a><samp class="text-3xl"> /
                        Ticket</samp>
                </div>
                <div class="flex justify-end w-1/2">
                    <a href="{{ url('/add-root') }}">
                        <button class="p-2 bg-blue-500 rounded-lg hover:bg-blue-600">
                            Tickets +
                        </button>
                    </a>
                </div>
            </div>
            <div class="antialiased">
                <div class="container px-4 mx-auto sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">Ticket</h2>
                        </div>
                        <div class="flex flex-col my-2 sm:flex-row">
                            <div class="flex flex-row mb-1 sm:mb-0">
                                <div class="relative">
                                    <select
                                        class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-400 rounded-l appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative">
                                    <select class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                        <option selected disabled>-- Bus --</option>
                                        @foreach($buses as $bus)
                                            <option value="{{$bus->id}}">{{$bus->id}}</option>
                                        @endforeach
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative">
                                    <input type="date" id="datepicker" name="datepicker" class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-t border-b border-gray-400 rounded-r appearance-none sm:rounded-r-none focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                </div>
                            </div>
                            <div class="relative block">
                                <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                                    <button
                                        class="block w-full py-2 pl-8 pr-6 text-sm bg-blue-500 rounded-lg focus:outline-none hover:bg-blue-600">Search</button>
                                </span>
                            </div>
                        </div>
                        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                User Id
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Bus Id
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Seat Number
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Date
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ticket->take(5) as $ticket)
                                        <tr>
                                            <td class="px-2 py-5 text-sm bg-white border-b border-gray-200">
                                                <div class="flex ">
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{$ticket->user_id}}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">{{$ticket->bus_id}}</p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    {{$ticket->seat_number}}
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 rounded-full opacity-50"></span>
                                                    <span class="relative">{{$ticket->date}}</span>
                                                </span>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <img src="{{ asset('img/icon/dots.png') }}" class="h-5 cursor-pointer"
                                                    alt="" onclick="toggleOptions(this)">
                                                <div id="options"
                                                    class="absolute hidden mt-2 bg-white border border-gray-200 rounded-md shadow-md">
                                                    <a href="#"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:cursor-pointer">Edit</a>
                                                    <a href="#"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:cursor-pointer">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div
                                    class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">

                                    <div class="inline-flex mt-2 xs:mt-0">
                                        <button
                                            class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-l hover:bg-gray-400">
                                            Prev
                                        </button>
                                        <button
                                            class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-r hover:bg-gray-400">
                                            Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div id="bus" class="hidden m-7">
            {{-- <div class="flex justify-between mb-4">
                <div class="w-1/2">
                    <a href="" class="text-3xl" onclick="displayDashboard()">Dashboard</a><samp class="text-3xl"> /
                        Bus</samp>
                </div>
                <div class="flex justify-end w-1/2">
                    <a href="{{ url('/add-bus') }}">
                        <button class="p-2 bg-blue-500 rounded-lg hover:bg-blue-600">
                            Bus +
                        </button>
                    </a>
                </div>
            </div>
            <div class="antialiased">
                <div class="container px-4 mx-auto sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">Buses</h2>
                        </div>
                        <div class="flex flex-col my-2 sm:flex-row">
                            <div class="flex flex-row mb-1 sm:mb-0">
                                <div class="relative">
                                    <select
                                        class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-gray-400 rounded-l appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative">
                                    <select
                                        class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded-r appearance-none sm:rounded-r-none sm:border-r-0 focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                        <option selected disabled>-- From --</option>
                                        <option>Active</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="relative">
                                    <select
                                        class="block w-full h-full px-4 py-2 pr-8 leading-tight text-gray-700 bg-white border border-t border-b border-gray-400 rounded-r appearance-none sm:rounded-r-none focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                        <option selected disabled>-- To --</option>
                                        <option>Active</option>
                                    </select>
                                    <div
                                        class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="relative block">
                                <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                                    <svg viewBox="0 0 24 24" class="w-4 h-4 text-gray-500 fill-current">
                                        <path
                                            d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                        </path>
                                    </svg>
                                </span>
                                <input placeholder="Bus.."
                                    class="block w-full py-2 pl-8 pr-6 text-sm text-gray-700 placeholder-gray-400 bg-white border border-b border-gray-400 rounded-l rounded-r appearance-none sm:rounded-l-none focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                            </div>
                            <div class="relative block">
                                <span class="absolute inset-y-0 left-0 flex items-center h-full pl-2">
                                    <button
                                        class="block w-full py-2 pl-8 pr-6 text-sm bg-blue-500 rounded-lg focus:outline-none hover:bg-blue-600">Search</button>
                                </span>
                            </div>
                        </div>
                        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Bus
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                From
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                To
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Start Time
                                            </th>
                                            <th
                                                class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data loop for buses -->
                                        @foreach($buses as $bus)
                                        <tr>
                                            <td class="px-2 py-5 text-sm bg-white border-b border-gray-200">
                                                <!-- Display bus details -->
                                                <div class="flex items-center">
                                                    <!-- Assuming 'image' column contains the image path -->
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ asset('assets/images/' . $bus->image) }}" alt="" />
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 whitespace-no-wrap">{{ $bus->bus_number
                                                            }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <!-- Display 'From' data -->
                                                <p class="text-gray-900 whitespace-no-wrap">{{ $bus->start }}</p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <!-- Display 'To' data -->
                                                <p class="text-gray-900 whitespace-no-wrap">{{ $bus->end }}</p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <!-- Display 'Start Time' data -->
                                                <p class="text-gray-900 whitespace-no-wrap">{{ $bus->starttime }}</p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <!-- Display action buttons -->
                                                <img src="{{ asset('img/icon/dots.png') }}" class="h-5 cursor-pointer"
                                                    alt="" onclick="toggleOptions(this)">
                                                <div id="options"
                                                    class="absolute hidden mt-2 bg-white border border-gray-200 rounded-md shadow-md">
                                                    <a href="{{ route('admin.edit-bus', ['id' => $bus->id]) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:cursor-pointer">Edit</a>

                                                     <form id="delete-form-{{$bus->id}}" action="{{ route('admin.delete-bus', ['id' => $bus->id]) }}" method="POST">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:cursor-pointer">
                                                             Delete
                                                         </button>
                                                     </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div
                                    class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between ">
                                    <span class="text-xs text-gray-900 xs:text-sm">
                                        Showing 1 to 4 of 50 Entries
                                    </span>
                                    <div class="inline-flex mt-2 xs:mt-0">
                                        <button
                                            class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-l hover:bg-gray-400">
                                            Prev
                                        </button>
                                        <button
                                            class="px-4 py-2 text-sm font-semibold text-gray-800 bg-gray-300 rounded-r hover:bg-gray-400">
                                            Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

    </main>
    <!-- end: Main -->
    <script>
        function displayDashboard() {
            hideAllSections();
            document.getElementById("dashboard").classList.remove("hidden");
        }

        function displayUser() {
            hideAllSections();
            document.getElementById("user").classList.remove("hidden");
        }

        function displayBus() {
            hideAllSections();
            document.getElementById("bus").classList.remove("hidden");
        }

        function displayRoot() {
            hideAllSections();
            document.getElementById("root").classList.remove("hidden");
        }

        function hideAllSections() {
            document.getElementById("dashboard").classList.add("hidden");
            document.getElementById("user").classList.add("hidden");
            document.getElementById("bus").classList.add("hidden");
            document.getElementById("root").classList.add("hidden");
        }
        function toggleOptions(img) {
        var options = img.nextElementSibling;
        options.classList.toggle("hidden");
        }
        displayDashboard();
    </script>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
