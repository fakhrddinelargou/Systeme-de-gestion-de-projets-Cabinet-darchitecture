<main class="w-full h-auto min-h-screen lg:w-[82%] ml-auto ">

    <div class="w-full h-auto  lg:py-15 px-5 py-10">
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

        <div class="w-full  lg:px-8">

            <div class="mb-6 flex items-center justify-between">
                <div class="flex gap-3">
                    <a href="{{ route('projects.update' ,$project->id) }}"
                        class="px-4 py-2 bg-white border border-gray-200 rounded-md text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">Modifier</a>
                    <button
                        class="px-4 py-2 bg-gray-600 rounded-md text-sm font-semibold text-white hover:bg-gray-700 shadow-sm transition">Action
                        Rapide</button>
                </div>
            </div>

            <div class="mb-6 bg-white rounded-md shadow-sm border border-gray-100 p-8 ">
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
                                class="px-3 py-1   text-xs font-bold rounded-lg uppercase {{ $statusClasses[$project->status] ?? 'bg-slate-50' }} tracking-wider">{{ $project->status }}</span>
                        </div>
                        <p class="text-gray-400 text-sm">ID: <span class="font-mono">#{{ $project->reference }}</span> •
                            Créé le {{ \Carbon\Carbon::parse($project->created_at)->format('d M, Y') }}
                        </p>
                    </div>

                    <div class="flex items-center gap-4 md:border-l md:border-t-0 border-t md:pl-6 md:pt-0 pt-2 border-gray-100">
                        <img src={{ $project->client->avatar ? asset('storage/' . $project->client->avatar) : asset('assets/images/gust.jpg') }}
                            class="w-12 h-12 rounded-full border-2 border-white shadow-sm" alt="Client">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">Propriétaire</p>
                            <p class="text-sm font-bold text-slate-800">{{ $project->client->fullname }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- father -->
        <div class="mb-5 flex xl:flex-row flex-col items-start gap-4 lg:px-8 ">
            <!-- chil 1 -->
            <div class=" w-full  lg:w-[40%]  bg-white rounded-md border border-slate-100 shadow-sm overflow-hidden">
                <!-- Header -->
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">Équipe du projet</h3>
                        <p class="text-sm text-slate-400 mt-1">Les architectes affectés à ce projet</p>
                    </div>

                    <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-600 lg:text-xs text-[10px] font-bold">
                        {{ $total_workers }} Workers
                    </span>
                </div>

                <!-- Workers list -->
                <div class="p-5 space-y-4">
                    @forelse ($project_workers as $worker)
                        <div
                            class="flex items-center justify-between rounded-xl border border-slate-100 bg-slate-50 px-4 py-3 hover:bg-slate-100 transition">

                            <div class="flex items-center gap-3">
                                <img src={{ $worker->avatar ? asset('storage/' . $worker->avatar) : asset('assets/images/gust.jpg') }} alt="worker"
                                    class="w-12 h-12 rounded-full object-cover border border-slate-200">

                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">
                                        {{ $worker->fullname ?? 'No Name' }}
                                    </h4>
                                    <p class="text-xs text-slate-400">
                                        {{ $worker->role ?? 'No Role' }}
                                    </p>
                                </div>
                            </div>
                 @if(auth()->id() == 1)

                            <form action="{{route('project.assignments', $worker->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="px-3 py-1 rounded-full bg-red-50 cursor-pointer text-red-600 text-[11px] font-bold hover:bg-red-100 transition">
                                    Delete
                                </button>
                            </form>
                  @endif
                        </div>

                    @empty
                        <div class="text-center text-slate-400 text-sm py-4">
                            No workers found
                        </div>
                    @endempty

                </div>



                <!-- Footer button -->
                 @if(auth()->id() == 1)
                            <div class="p-5 border-t border-slate-100">
                    <button onclick="btnAddWorker()"
                        class="flex items-center justify-center  gap-2 w-full px-4 py-2 bg-gray-600 rounded-md text-sm font-semibold text-white hover:bg-gray-700 shadow-sm transition">
                        <span class="material-symbols-outlined text-[20px]">person_add</span>
                        Add Worker
                    </button>
                </div>
                @endif
            </div>

                         <div class="rounded-md bg-white rounded-md border border-slate-100 shadow-sm  p-4 xl:w-[60%]">
                            <p class="text-sm text-slate-400 mt-1">Description</p>
                            <p class="mt-2 text-sm leading-6 text-slate-600 overflow-y-auto xl:h-[31.7vh] ">
                                {{ $project->description  }}
                            </p>
                        </div>
        </div>

        <div class="lg:p-8">
            <div class="bg-white border  border-slate-200 rounded-md shadow-sm  overflow-hidden">

                {{-- Header --}}
                <div class="flex md:flex-row flex-col items-center justify-between px-6 py-5 border-b border-slate-200">
                    <div class="lg:mb-0 mb-2">
                        <h2 class="text-2xl font-bold text-slate-800">Phases du projet</h2>
                        <p class="text-sm text-slate-400 mt-1">
                            Gérez les différentes phases pour structurer l’avancement du projet
                        </p>
                    </div>

                    <button onclick="document.getElementById('phaseModal').classList.remove('hidden')"
                        class="flex items-center justify-center w-full lg:w-auto px-4 py-2 bg-gray-600 rounded-md text-sm font-semibold text-white hover:bg-gray-700 shadow-sm transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Add new sprint
                    </button>
                </div>

                {{-- Stats --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 px-4 py-5 bg-slate-50 border-b border-slate-200">
                    <div class="bg-white border border-slate-200 rounded-xl p-4">
                        <p class="text-sm text-slate-400">Total sprints</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ $total_sprints }}</h3>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-xl p-4">
                        <p class="text-sm text-slate-400">Progression globale</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">{{number_format($percentage_global,2)}}%</h3>
                    </div>

                    <div class="bg-white border border-slate-200 rounded-xl p-4">
                        <p class="text-sm text-slate-400">Sprints complated</p>
                        <h3 class="text-2xl font-bold text-slate-800 mt-1">{{ $total_sprint_completed }} /
                            {{ $total_sprints }}
                        </h3>
                    </div>
                </div>

                {{-- Table --}}
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left">
                        <thead class="bg-slate-50 text-slate-500 uppercase text-xs tracking-wider">

                            <tr>
                                <th class="px-6 py-4 font-semibold">Titre</th>
                                <th class="px-6 py-4 font-semibold">Pourcentage</th>
                                <th class="px-6 py-4 font-semibold">Statut</th>
                                <th class="px-6 py-4 font-semibold">Date limite</th>
                                <th class="px-6 py-4 font-semibold text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            @forelse($sprints as $sprint)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-slate-800">{{ $sprint->title }}</p>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="w-40">
                                            <div class="flex items-center justify-between mb-1">
                                                <span class="text-slate-700 font-medium">{{ $sprint->percentage }}%</span>
                                            </div>
                                            <div class="w-full bg-slate-200 rounded-full h-2.5">
                                                <div class="bg-blue-500 h-2.5 rounded-full"
                                                    style="width: {{ $sprint->percentage }}%;"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $statusClasses = [
                                                'pending' => 'bg-amber-50 text-amber-600',
                                                'in_progress' => 'bg-indigo-50 text-indigo-600',
                                                'completed' => 'bg-emerald-50 text-emerald-600',
                                            ];
                                        @endphp
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $statusClasses[$sprint->status] }}">
                                            {{ $sprint->status }}
                                        </span>
                                    </td>
                                    <td class="md:px-8 px-4 py-5 text-center md:text-sm text-[px] font-medium text-slate-500">{{ \Carbon\Carbon::parse($sprint->created_at)->format('d M, Y') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-end gap-2">
                                            
                                            <a href="{{ route('show.sprint' , $sprint->id) }}" title="Edit"
                                                class="cursor-pointer rounded-md border border-slate-200 text-slate-600 w-8 h-8 flex items-center justify-center hover:bg-slate-100 transition">
                                                <span
                                                    class="material-symbols-outlined text-slate-600 text-[18px]!">Edit</span>
                                            </a>
                                            <x-sprint.delete-sprint :id="$sprint->id">
                                            <button title="Delete"
                                            @click="openDeleteModal = true" type="button"
                                                class="cursor-pointer rounded-md border border-red-200 w-8 h-8 flex items-center justify-center text-red-500 hover:bg-red-50 transition">
                                                <span
                                                    class="material-symbols-outlined  text-red-500 text-[18px]!">scan_delete</span>
                                            </button>
                                        </x-sprint.delete-sprint>

                                        </div>
                                    </td>
                                </tr>
                            @empty
         <tr>
    <td colspan="6" class="px-6 py-12 text-center">
        
        <div class="flex flex-col items-center justify-center">
            
            <div class="w-14 h-14 rounded-full bg-slate-100 flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                        d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>

            <h3 class="text-lg font-semibold text-slate-700">
                Aucun sprint trouvé
            </h3>

            <p class="text-sm text-slate-400 mt-1">
                Vous n’avez encore aucun sprint assigné.
            </p>


        </div>

    </td>
</tr>
                            @endempty
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- form add workers -->
    <div id="selectWorkerForm" class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 px-4">
        <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">

            <div
                class="bg-white w-full max-w-md rounded-md p-8 shadow-md border border-slate-100 relative overflow-hidden">

                <p class="font-semibold text-[24px] mb-5">Add New Worker</p>

                <form class='w-full' action="{{ route('project.add.worker', $project->id) }}" method='POST'>
                    @csrf
                    <!-- architectes -->
                    <div class="mb-6 w-full">

                        <label for="Worker">
                            <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">ARCHITECTES</p>
                        </label>
                        <select required name="user_id" id="worker"
                            class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100">
                            <option value="">Select Worker</option>
                            @foreach($workers as $worker)
                                <option value={{ $worker->id }}>{{ $worker->fullname }}</option>
                            @endforeach
                        </select>
                    </div>
     

                    <!-- ROLE -->
                    <div class="mb-6 w-full">
                        <label for="role">
                            <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">ROLE</p>
                        </label>
                        <select name="role" required
                            class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100">
                            <option value="3D">3D</option>
                            <option value="Architect">Architect</option>
                            <option value="Interior Design">Interior Design</option>
                        </select>
                    </div>
                    <div class="mt-10 flex gap-3">
                        <button onclick="btnCloseForm()"
                            class="flex-1 py-4 bg-slate-100 text-slate-600 rounded-md font-black text-xs uppercase tracking-widest hover:bg-slate-200 transition-all">
                            Cancel
                        </button>

                        <button type="submit"
                            class="flex-1 rounded-md cursor-pointer h-12 bg-black hover:bg-[#212529] duration-200  text-[14px] text-white font-semibold">
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- form sprint -->
    <div id="phaseModal" class=" fixed inset-0 z-50 hidden">

        <div class="relative flex items-center justify-center min-h-screen p-4">
            <div class="w-full max-w-2xl bg-white rounded-md shadow-2xl border border-slate-200 overflow-hidden">

                {{-- Header --}}
                <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800">Add a new sprint</h3>
                        <p class="text-sm text-slate-400 mt-1">Create new sprint for this project</p>
                    </div>

                    <button onclick="document.getElementById('phaseModal').classList.add('hidden')"
                        class="text-slate-400 hover:text-slate-600 text-2xl leading-none">
                        &times;
                    </button>
                </div>

                {{-- Form --}}
                <form action={{ route('project.sprint.create') }} method="POST" class="p-6 space-y-5">
                    @csrf

                    <input type="hidden" name="project_id" value="{{ $project->id }}">


                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2 ">Title of sprint</label>
                        <input required type="text" name="title" placeholder="Ex: Conception 2D"
                            class="w-full rounded-md border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
                        <textarea required name="description" rows="4" placeholder="Décrivez brièvement cette phase..."
                            class="w-full rounded-md border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300 resize-none"></textarea>
                    </div>

                    <div class="">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2 ">Statut</label>
                            <select name="status"
                                class="w-full rounded-md border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300">
                                <option value="">Sélectionner un statut</option>
                                <option value="pending">En attente</option>
                                <option value="in_progress">En cours</option>
                                <option value="completed">Terminée</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Deadline</label>
                        <input required type="date" name="due_date"
                            class="w-full rounded-md border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-end gap-3 pt-2">
                        <button type="button" onclick="document.getElementById('phaseModal').classList.add('hidden')"
                            class="px-5 py-3 rounded-md border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition">
                            Cancel
                        </button>

                        <button type="submit"
                            class="px-5 py-3 rounded-md bg-slate-700 text-white font-semibold hover:bg-slate-800 transition">
                            save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</main>

<script>

    const selectWorkerForm = document.getElementById('selectWorkerForm');

    selectWorkerForm.classList.add('hidden');

    function btnAddWorker() {
        selectWorkerForm.classList.remove('hidden');
    }

    function btnCloseForm() {
        selectWorkerForm.classList.add('hidden');
    }


</script>