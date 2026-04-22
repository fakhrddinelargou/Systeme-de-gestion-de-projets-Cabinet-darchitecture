<main class="w-full h-auto min-h-screen pb-5 lg:w-[82%] ml-auto">
    <div class="w-full h-auto  lg:px-15 px-5 pt-10">
        <div class="mb-5 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div class="">
                <h2 class="text-4xl font-semibold text-gray-700">Projects Details</h2>
                <a href={{ route('client.projects') }}
                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-600 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour aux projects
                </a>
            </div>

        </div>

        <div class="w-full p-8 ">
            <div class="bg-white mb-5 rounded-md shadow-sm border border-gray-100 p-8 ">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <h1 class="text-3xl font-bold text-slate-800 tracking-tight">{{ $project->title }}</h1>
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-amber-50 text-amber-600',
                                    'accepted' => 'bg-blue-50 text-blue-600',
                                    'rejected' => 'bg-red-50 text-red-600',
                                    'in_progress' => 'bg-indigo-50 text-indigo-600',
                                    'completed' => 'bg-emerald-50 text-emerald-600',
                                    'archived' => 'bg-slate-100 text-slate-500',
                                ];
                            @endphp
                            <span
                                class="px-3 py-1 text-xs font-bold rounded-lg uppercase {{ $statusClasses[$project->status] ?? 'bg-slate-50' }} tracking-wider">{{ $project->status }}</span>
                        </div>
                        <p class="text-gray-400 text-sm">ID: <span class="font-mono">#{{ $project->reference }}</span> •
                            Créé le {{ \Carbon\Carbon::parse($project->created_at)->format('d M, Y') }}
                        </p>
                    </div>

                    <div class="flex items-center gap-4 border-l pl-6 border-gray-100">
                        <img src={{ $project->client->avatar ? asset('storage/' . $project->client->avatar) : asset('assets/images/gust.jpg') }}
                            class="w-12 h-12 rounded-full border-2 border-white shadow-sm" alt="Client">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">Propriétaire</p>
                            <p class="text-sm font-bold text-slate-800">{{ $project->client->fullname }}</p>
                        </div>
                    </div>
                </div>
            </div>
         
            @if($project->status != 'rejected' )

            <div class="grid grid-cols-1 mb-5 gap-4 md:grid-cols-2 xl:grid-cols-3">
                <!-- Card 1 : Pourcentage -->
                <div class="rounded-md border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-[11px] font-black uppercase tracking-widest text-slate-400">
                                Pourcentage
                            </p>
                            <h3 class="mt-2 text-2xl font-extrabold text-slate-800">{{ $stats->total_sprint ? $stats->total_percentage / $stats->total_sprint : '0' }}%</h3>
                            <p class="mt-1 text-xs text-slate-500">
                                Progression globale du projet
                            </p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 17v-6m4 6V7m4 10V4M5 20h14" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="mb-2 flex items-center justify-between">
                            <span class="text-xs font-semibold text-slate-500">Avancement</span>
                            <span class="text-xs font-bold text-slate-700">{{ $stats->total_sprint ? $stats->total_percentage / $stats->total_sprint : '0' }}%</span>
                        </div>

                        <div class="h-2.5 w-full overflow-hidden rounded-full bg-slate-100">
                            <div style="width:{{ $stats->total_sprint ? $stats->total_percentage / $stats->total_sprint : '0' }}%" class="h-full  rounded-full bg-indigo-500"></div>
                        </div>
                    </div>
                </div>

                @if($phases)
                <!-- Card 2 : Sprint actuelle -->
                <div class="rounded-md border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-start justify-between">
                        <div>
                            <p class="text-[11px] font-black uppercase tracking-widest text-slate-400">
                                Phase actuelle
                            </p>
                            <h3 class="mt-2 text-2xl font-extrabold text-slate-800">Phase {{ $stats->total_sprint }}</h3>
                            <p class="mt-1 text-xs text-slate-500">
                                Phase active du projet
                            </p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10m-11 9h12a2 2 0 002-2V7a2 2 0 00-2-2H6a2 2 0 00-2 2v11a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-4 rounded-xl border border-amber-100 bg-amber-50 px-4 py-3">
                        <p class="text-xs font-semibold text-amber-700">
                            {{ $phases->status }} de traitement
                        </p>
                        <p class="mt-1 text-[11px] leading-5 text-slate-500">
                            {{ $phases->description }}
                        </p>
                    </div>
                </div>
                @endif

            </div>

            <div class="flex mb-5 items-start gap-4">
                <!-- Card 1 : Résumé de la demande -->
                <div class="bg-white flex-1 rounded-xl border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-4 border-b border-slate-50 flex justify-between items-center">
                        <h3
                            class="text-sm font-black uppercase tracking-wider text-slate-700  decoration-slate-700 decoration-2 underline-offset-4">
                            Résumé de ma demande
                        </h3>


                    </div>

                    <div class="p-5 space-y-4">

                        <div class="grid grid-cols-2 gap-4">
                            <div class="rounded-lg bg-slate-50 border border-slate-100 p-4">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Type</p>
                                <p class="mt-2 text-sm font-bold text-slate-700">{{ $project->type  }}</p>
                            </div>

                            <div class="rounded-lg bg-slate-50 border border-slate-100 p-4">
                                <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">date limite
                                </p>
                                <p class="mt-2 text-sm font-bold text-slate-700">{{ \Carbon\Carbon::parse($project->end_date)->format('m D, Y') }}</p>
                            </div>


                        </div>

                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                            <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Description</p>
                            <p class="mt-2 text-sm leading-6 text-slate-600">
                                {{ $project->description  }}
                            </p>
                        </div>
                    </div>
                </div>




            </div>

           @endif

        </div>



    </div>




</main>