<main class="w-full h-auto min-h-screen lg:w-[82%] ml-auto ">

    <div class="w-full h-auto  lg:px-15 px-5 p-10">
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

        </div>
        <!-- father -->
        <div class="flex items-center gap-4">
            <!-- chil 1 -->
            <div class=" w-full  lg:w-sm  bg-white rounded-md border border-slate-100 shadow-sm overflow-hidden">
                <!-- Header -->
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">Équipe du projet</h3>
                        <p class="text-sm text-slate-400 mt-1">Les architectes affectés à ce projet</p>
                    </div>

                    <span class="px-3 py-1 rounded-full bg-blue-50 text-blue-600 text-xs font-bold">
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

<form action="{{route('project.assignments', $worker->id )}}" method="POST">
    @csrf
    @method('DELETE')

    <button
        class="px-3 py-1 rounded-full bg-red-50 cursor-pointer text-red-600 text-[11px] font-bold hover:bg-red-100 transition"
    >
        Delete
    </button>
</form>
                        </div>

                    @empty
                        <div class="text-center text-slate-400 text-sm py-4">
                            No workers found
                        </div>
                    @endforelse

                </div>



                <!-- Footer button -->
                <div class="p-5 border-t border-slate-100">
                    <button onclick="btnAddWorker()"
                        class="w-full flex items-center justify-center gap-2 rounded-md bg-slate-800 px-4 py-3 text-sm font-semibold text-white hover:bg-slate-700 transition">
                        <span class="material-symbols-outlined text-[20px]">person_add</span>
                        Add Worker
                    </button>
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
                    <!-- EMAIL -->
                    <div class="">

                        <div class="mb-6 w-full">
                            <label for="email">
                                <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">EMAIL ADDRESS</p>
                            </label>
                            <input
                                class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                                name='email' required id='email' type="email" placeholder='Jhon@gmail.com'
                                autocomplete="new-email">
                        </div>
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