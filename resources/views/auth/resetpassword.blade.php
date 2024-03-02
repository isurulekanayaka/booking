<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Boogaloo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Boogaloo&display=swap" rel="stylesheet">
</head>

<body>



        <div class="relative w-screen bg-center bg-no-repeat bg-cover" style="background-image: url('{{ asset('img/login2.png') }}');">>
     <div class="absolute opacity-75 md:z-0 md:inset-0 bg-gradient-to-b"></div>
            <div class=" h-screen bg-opacity-50 rounded-lg  md:rounded-none z-10">
                <div class="md:text-start mx-10 mt-10 text-center">
                    <h1 class="text-buttonorange font-bold  text-white font-anton md:text-5xl text-3xl">Rest Password
                    </h1>
                    <h1 class="text-white font-boogaloo text-2xl mt-5">Enter the email address associated with your
                        account</h1>
                </div>
                <div class="w-10/12 mx-10">
                    @if (Session::has('success'))
                        <div class="arelative block w-full p-4 mb-4 text-base leading-5 text-white bg-green-300 rounded-lg opacity-100 font-regular"
                            role="alert">
                            <div class="flex flex-row justify-between">
                                {{ Session::get('success') }}
                                <div class="">
                                    <a href="{{ route('login') }}" class="">Login</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('resetpasswordPost', ['token' => $token]) }}" class="font-boogaloo text-[22px] md:mt-28">

                        @csrf
                        <input  type="text" name="token" hidden value="{{$token}}">
                        <div class="mt-2 md:mt-4">

                            <div class="relative">
                                <input type="password" placeholder="New Password"
                                    class="w-full p-3 border rounded-lg shadow-2xl opacity-70 @error('new_password') is-invalid @enderror"
                                    name="new_password" id="new_password" autocomplete="off">

                                <button type="button" onclick="togglePassword('new_password')"
                                    class="absolute inset-y-0 right-0 px-2 py-1.5 text-gray-500 focus:outline-none">
                                    <img id="new_passwordToggleIcon" src="{{ asset('img/hide.png') }}" alt="Toggle Password"
                                        class="w-8 h-8">
                                </button>
                            </div>
                            @if ($errors->any())
                                <div style="color: red; font-size: 20px">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="mt-2 md:mt-4">
                            <div class="relative">
                                <input type="password" placeholder="Confirm New Password"
                                    class="w-full p-3 border rounded-lg shadow-2xl opacity-70 @error('new_password_confirmation') is-invalid @enderror"
                                    name="new_password_confirmation" id="new_password_confirmation" autocomplete="off">

                                <button type="button" onclick="togglePassword('new_password_confirmation')"
                                    class="absolute inset-y-0 right-0 px-2 py-1.5 text-gray-500 focus:outline-none">
                                    <img id="new_password_confirmationToggleIcon" src="{{ asset('img/hide.png') }}"
                                        alt="Toggle Password" class="w-8 h-8">
                                </button>
                            </div>
                            @if ($errors->any())
                                <div style="color: red; font-size: 20px">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div>

                        </div>


                        <button type="submit"
                            class="w-full px-20 py-3   bg-primaryColor rounded-3xl mt-5 font-boogaloo md:text-lg font-bold  bg-buttonorange hover:bg-orange-400 text-white   ">RESET PASSWORD   </button>
                    </form>
                    <script>
                        function togglePassword(inputId) {
                            var passwordInput = document.getElementById(inputId);
                            var toggleIcon = document.getElementById(inputId + 'ToggleIcon'); // Fixed the ID here

                            if (passwordInput.type === "password") {
                                passwordInput.type = "text";
                                toggleIcon.src = "{{ asset('img/view.png') }}";
                            } else {
                                passwordInput.type = "password";
                                toggleIcon.src = "{{ asset('img/hide.png') }}";
                            }
                        }
                    </script>
                </div>

            </div>





</body>
