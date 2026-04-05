<main class="w-full h-screen lg:w-[82%] ml-auto ">

    <div class="w-full h-auto  lg:px-15 px-5 pt-10">
        <div class="mb-5 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div class="">
                <h2 class="text-4xl font-semibold text-gray-700">Projects Details</h2>
                <a href={{ route('admin.projects') }}
                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-600 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour aux projects
                </a>
            </div>

        </div>

        <div class="w-full  p-8">

            <div class="mb-6 flex items-center justify-between">
                <div class="flex gap-3">
                    <button
                        class="px-4 py-2 bg-white border border-gray-200 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">Modifier</button>
                    <button
                        class="px-4 py-2 bg-gray-600 rounded-md text-sm font-semibold text-white hover:bg-gray-700 shadow-sm transition">Action
                        Rapide</button>
                </div>
            </div>

            <div class="bg-white rounded-md shadow-sm border border-gray-100 p-8 ">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <h1 class="text-3xl font-bold text-slate-800 tracking-tight">{{ $project->title }}</h1>
                            @php
                                $statusClasses = [
                                    'in_progress' => 'bg-blue-50 text-blue-600',
                                    'completed' => 'bg-emerald-50 text-emerald-600',
                                    'pending' => 'bg-amber-50 text-amber-600',
                                    'archived' => 'bg-slate-100 text-slate-500',
                                ];
                            @endphp
                            <span
                                class="px-3 py-1   text-xs font-bold rounded-lg uppercase {{ $statusClasses[$project->status] ?? 'bg-slate-50' }} tracking-wider">{{ $project->status }}</span>
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

            <div class="flex items-center  gap-4">
                <!-- table 1 -->
                <div class="bg-white  flex-1 rounded-md border border-slate-100 shadow-sm overflow-hidden">
                    <div class="p-4 border-b border-slate-50 flex justify-between items-center">
                        <h3
                            class="text-sm font-black uppercase tracking-wider text-slate-700 underline decoration-slate-700 decoration-2 underline-offset-4">
                            Phases du Projet</h3>
                        <x-projects.create-phase :id="$project->id">
                            <button @click="open = true"
                                class="text-[10px] font-black uppercase tracking-widest text-gray-600 hover:text-gray-800 cursor-pointer">+
                                Ajouter Phase</button>
                        </x-projects.create-phase>
                    </div>
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-6 py-3 text-[10px] font-black uppercase tracking-widest text-slate-400">
                                    Ordre</th>
                                <th class="px-6 py-3 text-[10px] font-black uppercase tracking-widest text-slate-400">
                                    Nom de la Phase</th>
                                <th class="px-6 py-3 text-[10px] font-black uppercase tracking-widest text-slate-400">
                                    Deadline</th>
                                <th class="px-6 py-3 text-[10px] font-black uppercase tracking-widest text-slate-400">
                                    Statut</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4 text-xs font-bold text-slate-400">01</td>
                                <td class="px-6 py-4 text-xs font-bold text-slate-700 italic">Conception & Plans 2D</td>
                                <td class="px-6 py-4 text-xs text-slate-500">15 Avr, 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 text-[9px] font-black uppercase bg-emerald-50 text-emerald-600 rounded">Terminé</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50/80 transition-all">
                                <td class="px-6 py-4 text-xs font-bold text-slate-400">02</td>
                                <td class="px-6 py-4 text-xs font-bold text-slate-700 italic">Modélisation 3D</td>
                                <td class="px-6 py-4 text-xs text-slate-500">02 Mai, 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2 py-1 text-[9px] font-black uppercase bg-blue-50 text-blue-600 rounded animate-pulse">En
                                        cours</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- table 2 -->
                <div class="bg-white flex-1 rounded-xl border border-slate-100 shadow-sm overflow-hidden mt-8">
                    <div class="p-4 border-b border-slate-50 flex justify-between items-center bg-slate-50/30">
                        <h3
                            class="text-sm font-black uppercase tracking-wider text-slate-700 underline decoration-indigo-500 decoration-2 underline-offset-4">
                            Détails des Tâches</h3>
                        <div class="flex gap-2 text-[10px] font-bold text-slate-400">
                            Dernière mise à jour : <span class="text-indigo-600">Aujourd'hui</span>
                        </div>
                    </div>

                    <table class="w-full text-left border-collapse">
                        <thead class="border-b border-slate-100 bg-slate-50/50">
                            <tr>
                                <th class="px-6 py-3 text-[10px] font-black uppercase tracking-widest text-slate-400">
                                    Tâche / Nom</th>
                                <th class="px-6 py-3 text-[10px] font-black uppercase tracking-widest text-slate-400">
                                    Statut (UML)</th>
                                <th
                                    class="px-6 py-3 text-[10px] font-black uppercase tracking-widest text-slate-400 text-center">
                                    Modifié le</th>
                                <th
                                    class="px-6 py-3 text-right text-[10px] font-black uppercase tracking-widest text-slate-400">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <tr class="group hover:bg-slate-50 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox" checked
                                            class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 transition cursor-pointer">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-xs font-bold text-slate-700 group-hover:text-indigo-600 transition">Rendu
                                                de la façade Nord</span>
                                            <span class="text-[9px] text-slate-400 font-medium">Phase :
                                                Conception</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 bg-green-50 text-green-600 text-[9px] font-black uppercase rounded-md border border-green-100 shadow-sm">
                                        DONE
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="text-[10px] font-bold text-slate-500 italic">02/04/2026</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div
                                        class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button
                                            class="p-1.5 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition"
                                            title="Modifier">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <button
                                            class="p-1.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-md transition"
                                            title="Supprimer">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="group hover:bg-slate-50 transition-all">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <input type="checkbox"
                                            class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500 transition cursor-pointer">
                                        <div class="flex flex-col">
                                            <span
                                                class="text-xs font-bold text-slate-700 group-hover:text-indigo-600 transition">Plan
                                                de coffrage</span>
                                            <span class="text-[9px] text-slate-400 font-medium italic">Assigné à :
                                                Fakhreddine</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 bg-indigo-50 text-indigo-600 text-[9px] font-black uppercase rounded-md border border-indigo-100 shadow-sm">
                                        IN_PROGRESS
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="text-[10px] font-bold text-slate-500 italic">01/04/2026</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button class="p-1.5 text-slate-300 hover:text-slate-600 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>




</main>