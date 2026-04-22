<main class="w-full h-auto min-h-screen lg:w-[82%] ml-auto">
    <div class="w-full lg:px-15 px-5 pt-10 pb-10">

        <div class="mb-6">
            <h1 class="text-4xl font-semibold text-[#243B63]">Notifications</h1>
            <p class="text-sm text-slate-400 font-medium mt-1">
                Latest alerts across the platform.
            </p>
        </div>

        <div class="bg-white rounded-md border border-slate-100 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="px-8 py-6 flex items-center justify-between border-b border-slate-100">
                <div>
                    <h2 class="text-2xl font-black text-[#102A56]">Recent Notifications</h2>
                    <p class="text-sm text-slate-400 font-medium mt-1">Latest alerts across the platform</p>
                </div>

                <span class="flex items-center gap-1  md:px-4 px-2 py-1.5 rounded-full bg-rose-50 text-rose-500 md:text-sm text-[8px] lg:font-black font-semibold">
                   <span>{{ $unreadNoti }}</span> Unread
                </span>
            </div>



            <div class="divide-y divide-slate-100">

                @forelse($notifications as $notification)

                    @php
                        $type = $notification->data['type'] ?? 'default';
                        $message = $notification->data['data']['message'] ?? '';
                        $direction = $notification->data['data']['direction'] ?? null;
                        $isUnread = is_null($notification->read_at);
                        $url = '#';
                        if($type == 'sprint' || $type == 'task'){
                        $url = route('show.sprint', ['id' => $direction]);
                        }elseif($type == 'project'){ 
                        $url = route(auth()->user()->role->name . '.projects.show', ['id' => $direction]);
                        }else{
                        $url = '#';
                        }


                        // $route = [
                        // ] 
                    @endphp

                    <a href="{{ $url  }}" class="px-8 py-6 flex items-start justify-between gap-4 hover:bg-slate-50/60 transition-all">

                        <div class="flex items-start gap-5">

                            <div class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0
                            @if($type == 'project') bg-blue-50
                            @elseif($type == 'sprint') bg-amber-50
                            @elseif($type == 'assignment') bg-emerald-50
                            @else bg-slate-100
                            @endif
                        ">
                                <span class="material-symbols-outlined
                                @if($type == 'project') 
                                    text-blue-500
                                @elseif($type == 'sprint')
                                     text-amber-500
                                @elseif($type == 'assignment') 
                                    text-emerald-500
                                @elseif($type == 'task') 
                                    text-red-500
                                @else
                                     text-slate-500
                                @endif
                            ">
                                    @if($type == 'project')
                                        work
                                    @elseif($type == 'sprint')
                                        build
                                    @elseif($type == 'task')
                                        view_apps
                                    @elseif($type == 'assignment')
                                        group
                                    @else
                                        notifications
                                    @endif
                                </span>
                            </div>

                            {{-- CONTENT --}}
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <h3 class="text-sm font-black text-slate-800 capitalize">
                                        {{ str_replace('_', ' ', $type) }}
                                    </h3>

                                    @if($isUnread)
                                        <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                                    @endif
                                </div>

                                <p class="text-sm text-slate-500 leading-7 max-w-2xl">
                                    @if($notification->data['type'] == 'sprint' || $notification->data['type'] == 'task')
                                        <span class="font-semibold text-slate-800 capitalize">
                                            {{ $notification->data['data']['fullname']  }}
                                        </span>
                                    @endif
                                    {{ $message }}
                                </p>

                                <p class="text-sm text-slate-400 font-bold mt-4">
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 shrink-0">
                            @if($isUnread)
                                <form method="POST" action="{{ route('read.notifications' , $notification->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button
                                        class="w-12 h-12 rounded-2xl border border-slate-100 flex items-center justify-center text-slate-400 hover:text-emerald-500 hover:bg-emerald-50 transition-all">
                                        <span class="material-symbols-outlined">done</span>
                                    </button>
                                </form>
                            @endif

                        </div>
                    </a>

                @empty

                    <div class="p-10 text-center text-slate-400 font-medium">
                        No notifications yet
                    </div>

                @endforelse

            </div>
        </div>

    </div>
</main>