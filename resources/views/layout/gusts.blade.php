<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
      
    </style>

    <title>Document</title>
</head>
<body class="h-auto" >
            @if(session('error'))
    <div id="alert-success" 
         class="fixed top-5 left-1/2 -translate-x-1/2 z-50 w-full max-w-md flex items-center gap-4 p-4 bg-red-50 border border-red-100 rounded-md shadow-2xl shadow-red-200/50 animate-in fade-in slide-in-from-top-8 duration-500">
        
        <div class="w-10 h-10 bg-red-500 rounded-md flex items-center justify-center text-white shadow-lg shadow-red-200">
            <span class="material-symbols-outlined text-2xl font-bold">check_circle</span>
        </div>
        
        <div class="flex-1">
            <p class="text-xs font-black text-red-900 uppercase tracking-widest leading-none ">Error</p>
            <p class="text-sm text-red-700 font-bold opacity-90">Error</p>
        </div>

        <button onclick="document.getElementById('alert-success').remove()" 
                class="w-8 h-8 flex items-center justify-center hover:bg-red-100 rounded-xl transition-colors text-red-400">
            <span class="material-symbols-outlined text-lg">close</span>
        </button>
    </div>
    @endif
@include($direction)
    <script>
    setTimeout(() => {
        let alert = document.getElementById('alert-success');
        if(alert) {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }
        
        
    }, 3000); 
</script>
</body>
</html>