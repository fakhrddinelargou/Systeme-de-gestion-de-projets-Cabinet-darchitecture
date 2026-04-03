    @if(session('success'))
        <div id="alert"
            class="fixed top-5 left-1/2 -translate-x-1/2 z-50 w-full max-w-md flex items-center gap-4 p-4 bg-emerald-50 border border-emerald-100 rounded-md shadow-2xl shadow-emerald-200/50 animate-in fade-in slide-in-from-top-8 duration-500">

            <div
                class="w-10 h-10 bg-emerald-500 rounded-md flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                <span class="material-symbols-outlined text-2xl font-bold">check_circle</span>
            </div>

            <div class="flex-1">
                <p class="text-xs font-black text-emerald-900 uppercase tracking-widest leading-none ">Success</p>
                <p class="text-sm text-emerald-700 font-bold opacity-90">{{ session('success') }}</p>
            </div>

            <button onclick="document.getElementById('alert').remove()"
                class="w-8 h-8 flex items-center justify-center hover:bg-emerald-100 rounded-xl transition-colors text-emerald-400">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        </div>
    @endif
    @if(session('error'))
        <div id="alert"
            class="fixed top-5 left-1/2 -translate-x-1/2 z-50 w-full max-w-md flex items-center gap-4 p-4 bg-red-50 border border-red-100 rounded-md shadow-2xl shadow-red-200/50 animate-in fade-in slide-in-from-top-8 duration-500">

            <div
                class="w-10 h-10 bg-red-500 rounded-md flex items-center justify-center text-white shadow-lg shadow-red-200">
                <span class="material-symbols-outlined text-2xl font-bold" >error</span>
            </div>

            <div class="flex-1">
                <p class="text-xs font-black text-red-900 uppercase tracking-widest leading-none ">Error</p>
                <p class="text-sm text-red-700 font-bold opacity-90">{{ session('error') }}</p>
            </div>

            <button onclick="document.getElementById('alert').remove()"
                class="w-8 h-8 flex items-center justify-center hover:bg-red-100 rounded-xl transition-colors text-red-400">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        </div>
@endif
    @if ($errors->any())
            <div id="alert"
            class="fixed top-5 left-1/2 -translate-x-1/2 z-50 w-full max-w-md flex items-center gap-4 p-4 bg-red-50 border border-red-100 rounded-md shadow-2xl shadow-red-200/50 animate-in fade-in slide-in-from-top-8 duration-500">

            <div
                class="w-10 h-10 bg-red-500 rounded-md flex items-center justify-center text-white shadow-lg shadow-red-200">
                <span class="material-symbols-outlined text-2xl font-bold" >error</span>
            </div>

            <div class="flex-1">
                <p class="text-xs font-black text-red-900 uppercase tracking-widest leading-none ">Error</p>
                            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-sm text-red-700 font-bold opacity-90">{{ $error }}</li>
                @endforeach
            </ul>
            </div>

            <button onclick="document.getElementById('alert').remove()"
                class="w-8 h-8 flex items-center justify-center hover:bg-red-100 rounded-xl transition-colors text-red-400">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        </div>
    @endif
        <script>
        setTimeout(() => {
            let alert = document.getElementById('alert');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = "0";
                setTimeout(() => alert.remove(), 500);
            }


        }, 3000); 
    </script>