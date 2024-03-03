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
    <div class="flex flex-col items-center justify-center h-screen bg-gray-200">
        <!-- Hero Section -->
        <div class="p-6 text-white bg-blue-500">
            <h1 class="text-4xl font-bold">Bus Driver Location</h1>
            <p class="mt-2">Share your current location with passengers.</p>
        </div>

        <!-- Buttons Section -->
        <div class="flex mt-8">
            <input type="text" value="{{$busId}}" hidden>
            <a href="{{ route('send', ['busId' => $busId]) }}"><button onclick="sendLocation()" class="p-2 text-white bg-green-500 rounded">Send Location</button></a>

            <a href="{{ route('stop', ['busId' => $busId]) }}"><button onclick="stopLocation()" class="p-2 ml-4 text-white bg-red-500 rounded">Stop</button></a>
        </div>


    </div>
    <!-- Include Axios library (if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script>
    function sendLocation() {
        // Assuming you have included the axios library in your project
        axios.post('/send-location', {
            ip_address: '...get the IP address...', // Provide the actual IP address here
        })
        .then(function (response) {
            console.log('Location sent successfully:', response.data);
            // Add any additional logic or UI updates here
        })
        .catch(function (error) {
            console.error('Error sending location:', error);
        });
    }

    function stopLocation() {
        // Add logic for stopping location tracking if needed
    }
</script>




</body>

</html>
