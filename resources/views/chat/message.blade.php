<main class="w-full h-auto min-h-screen lg:w-[82%] ml-auto bg-[#F9FBFC] flex flex-col">
    <header class="h-17.5 bg-white border-b border-slate-100 flex items-center justify-between px-8 sticky top-0 z-10">
        <div>
            <h1 class="text-xl font-bold text-slate-800">Messages</h1>
            <p class="text-xs text-slate-400">Manage your project communications</p>
        </div>
    </header>

    <section class="flex flex-1 h-[calc(100vh-70px)]  overflow-hidden relative">

        <aside class="w-full md:w-80 lg:w-96 bg-white border-r border-slate-100 flex flex-col">
            <div class="p-4">
                <div class="relative">
                    <i
                        class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text" placeholder="Search messages..."
                        class="w-full bg-slate-50 border border-slate-100 rounded-xl py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-gray-500/10 focus:border-gray-500 outline-none transition-all">
                </div>
            </div>

            <div class="flex-1 overflow-y-auto custom-scrollbar lg:max-h-[80vh] ">

                @foreach($contact as $cont)
                                    <a href="{{ route('open.chat', $cont->id) }}" class="flex items-center gap-3 px-4 py-4 w-full hover:bg-slate-50 border-l-4 transition-all
                       {{ Request::segment(3) == $cont->id ? 'bg-gray-50/50 border-l-4 border-gray-600' : 'border-transparent' }}">

                                        <div class="relative">
                                            <img src="{{ $cont->role_id == 1 ? asset('assets/images/support.jpg') : ($cont->avatar ? asset('storage/' . $cont->avatar) : asset('assets/images/profile.png')) }}"
                                                class="w-12 h-12 rounded-xl object-cover border border-gray-200" alt="">

                                            <span
                                                class="absolute -bottom-1 -right-1 px-1 text-[8px] font-bold uppercase rounded bg-white text-gray-400 border shadow-sm">
                                                {{ $cont->role_id == 1 ? 'Admin' : ($cont->role_id == 2 ? 'Arch' : 'Client') }}
                                            </span>
                                        </div>

                                        <div class="flex-1 min-w-0">
                                            <div class="flex justify-between items-center mb-1">
                                                <h4 class="text-sm font-semibold text-slate-700 truncate">{{ $cont->fullname }}</h4>
                                                <span class="text-[10px] text-slate-400">
                                                    {{ $cont->last_message_time ?? '' }}
                                                </span>
                                            </div>
                                            <p class="text-xs text-slate-400 truncate font-medium">
                                                {{ $cont->last_message_body ?? 'No messages yet' }}
                                            </p>
                                        </div>
                                    </a>
                @endforeach
            </div>
        </aside>

        @include($body)
    </section>
</main>

