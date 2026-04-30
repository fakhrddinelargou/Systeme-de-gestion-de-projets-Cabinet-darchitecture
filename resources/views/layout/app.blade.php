<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @vite('resources/js/echo.js')
    @vite('resources/js/app.js')
    @vite('resources/js/sidbar.js')
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
            .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #E2E9F0;
        border-radius: 10px;
    }
    </style>
    <title>ArchiTrack</title>
</head>

<body class="h-auto custom-scrollbar">

@include('components.alert')
<div class="flex w-full h-auto bg-gray-50">

        @include('components/sidbar')

        @include($direction)
    </div>



<div id="toast"
  class="fixed top-5 -right-100 w-72 bg-gray-900 text-white p-4 rounded-xl shadow-lg opacity-0 transition-all duration-500 z-50">

  <h1 id="title" class="text-sm font-semibold mb-1"></h1>
  <div id="sender" class="text-xs text-gray-400"></div>
  <div id="message" class="text-sm mt-1"></div>
</div>

<script>

    window.user_id = @json(auth()->id());

window.showToast = function (title, sender, message , id) {
  const toast = document.getElementById("toast");

  document.getElementById("title").innerText = title;
  document.getElementById("sender").innerText = sender;

  let shortMsg = message.length > 40 ? message.substring(0, 40) + "..."  : message;

  document.getElementById("message").innerText = shortMsg;

  toast.classList.remove("right-[-400px]", "opacity-0");
  toast.classList.add("right-5", "opacity-100");

  setTimeout(() => {
    toast.classList.remove("right-5", "opacity-100");
    toast.classList.add("right-[-400px]", "opacity-0");
  }, 4000);
}

</script>

</body>

</html>