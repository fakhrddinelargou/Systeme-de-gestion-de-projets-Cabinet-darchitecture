<main class="w-full h-auto min-h-screen lg:w-[82%] ml-auto ">
    <section class="w-full h-auto lg:px-15 px-5 pt-10">
        <div class="mb-5">
            <h2 class="text-4xl font-semibold text-gray-700">Dashboard</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div
                class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-gray-500 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">My Requests</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-1">{{ $data['total_projects'] }}</h3>
                        <p class="text-xs text-blue-500 mt-2 font-medium">{{ $data['last_projects_weekly'] }} submitted
                            this week</p>
                    </div>
                    <div
                        class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-gray-600 text-3xl">folder_open</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-purple-500 duration-500 transition-all group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Pending</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-1">{{ $data['pending_projects'] }}</h3>
                        <p class="text-xs text-purple-500 mt-2 font-medium">Waiting for review</p>
                    </div>
                    <div
                        class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-purple-600 text-3xl">schedule</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-emerald-500 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">In Progress</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-1">{{ $data['active_projects'] }}</h3>
                        <div class="flex items-center gap-1 mt-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-xs text-emerald-600 font-medium">Currently active</span>
                        </div>
                    </div>
                    <div
                        class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-emerald-600 text-3xl">construction</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-orange-500 transition-all duration-500 group relative">
                <div class="absolute -right-2 -bottom-2 opacity-5">
                    <span class="material-symbols-outlined text-8xl text-orange-600">task_alt</span>
                </div>

                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Completed</p>
                        <h3 class="text-3xl font-black text-orange-600 mt-1">{{ $data['completed_projects'] }}</h3>
                        <p class="text-xs text-gray-400 mt-2">Finished projects</p>
                    </div>
                    <div
                        class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-orange-600 text-3xl">task_alt</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex xl:flex-row flex-col  items-start xl:gap-10">

            <div class="xl:w-[70%] w-full min-h-[50vh] h-auto mb-10 bg-white rounded-md shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                    <h3 class="text-xl font-black text-slate-800">My Latest Projects</h3>
                    <a href="{{ route('client.projects') }}"
                        class="md:text-sm text-[8px] cursor-pointer font-bold text-blue-600 md:bg-blue-50 md:px-4 px-0 py-2 rounded-md hover:bg-blue-100 transition-all">
                        View Full List
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase">Project</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase">Status</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-center">
                                    Progress</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-center">Date
                                </th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-right">Actions
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-50">
                            @php
                                $statusClasses = [
                                    'pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                    'accepted' => 'bg-blue-50 text-blue-600 border-blue-100',
                                    'rejected' => 'bg-red-50 text-red-600 border-red-100',
                                    'in_progress' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                    'completed' => 'bg-indigo-50 text-indigo-600 border-indigo-100',
                                    'archived' => 'bg-slate-100 text-slate-500 border-slate-200',
                                ];

                                $statusLabels = [
                                    'pending' => 'Pending',
                                    'accepted' => 'Accepted',
                                    'rejected' => 'Rejected',
                                    'in_progress' => 'In Progress',
                                    'completed' => 'Completed',
                                    'archived' => 'Archived',
                                ];
                            @endphp

                            @forelse ($data['projects'] as $project)
                                <tr class="hover:bg-slate-50/80 transition-all group">
                                    <td class="px-8 py-4">
                                        <div>
                                            <p class="text-sm font-bold text-slate-800">{{ $project->title }}</p>
                                            <p class="text-[11px] text-slate-400">{{ $project->description }}</p>
                                        </div>
                                    </td>

                                    <td class="px-8 py-5 text-center">
                                        <span
                                            class="px-3 py-1 text-[10px] font-black uppercase rounded-md border {{ $statusClasses[$project->status] ?? 'bg-slate-100 text-slate-500 border-slate-200' }}">
                                            {{ $statusLabels[$project->status] ?? $project->status }}
                                        </span>
                                    </td>

                                    <td class="px-8 py-5 text-center">
                                        <div class="w-28 mx-auto">
                                            <div class="flex justify-between items-center mb-1">
                                                <span
                                                    class="text-[11px] font-bold text-slate-500">{{ $project->percentage ?? 0 }}%</span>
                                            </div>
                                            <div class="w-full h-2 bg-slate-100 rounded-full overflow-hidden">
                                                <div class="h-full bg-emerald-500 rounded-full"
                                                    style="width: {{ $project->percentage ?? 0 }}%"></div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="md:px-8 px-4 py-5 text-center md:text-sm text-[8px] font-medium text-slate-500">
                                        {{ \Carbon\Carbon::parse($project->created_at)->format('M d, Y') }}
                                    </td>

                                    <td class="px-8 py-5 text-right">
                                        <div class="flex justify-end gap-2 transition-all">
                                            <a href="{{ route('client.projects.show', $project->id) }}"
                                                class="w-8 h-8 flex items-center justify-center bg-slate-100 text-gray-500 rounded-lg hover:bg-gray-600 hover:text-white transition-all">
                                                <span class="material-symbols-outlined text-[16px]!">visibility</span>
                                            </a>
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
No projects found            </h3>

            <p class="text-sm text-slate-400 mt-1">
                You don't have any projects yet.
            </p>


        </div>

    </td>
</tr>
                            @endempty

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right block -->
            <div class="w-full xl:w-[30%]  h-auto mb-10 bg-white rounded-md shadow-sm border border-slate-100 overflow-hidden p-8">
                <h3 class="text-xl font-black text-slate-800 mb-6 flex justify-between">
                    Quick Actions
                    <span class="bg-blue-50 text-blue-500 text-[10px] text-center p-2 my-auto rounded-md">
                        Client
                    </span>
                </h3>

                <div class="space-y-4">

                    <a href="{{ route('create.projects') }}"
                        class="flex items-center justify-between p-4 bg-slate-50 rounded-md border border-transparent hover:border-blue-200 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="material-symbols-outlined text-blue-600 text-[20px]">add</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Create New Request</p>
                                <p class="text-[10px] text-slate-400">Submit a new project request</p>
                            </div>
                        </div>
                        <span
                            class="bg-white w-8 h-8 flex items-center justify-center rounded-md shadow-sm text-blue-600 group-hover:bg-blue-600 group-hover:text-white transition-all">
                            <span class="material-symbols-outlined text-sm!">arrow_forward</span>
                        </span>
                    </a>

                    <a href="{{ route('client.projects') }}"
                        class="flex items-center justify-between p-4 bg-slate-50 rounded-md border border-transparent hover:border-emerald-200 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">
                                <span class="material-symbols-outlined text-emerald-600 text-[20px]">folder_open</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">View My Projects</p>
                                <p class="text-[10px] text-slate-400">Track all your project requests</p>
                            </div>
                        </div>
                        <span
                            class="bg-white w-8 h-8 flex items-center justify-center rounded-md shadow-sm text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all">
                            <span class="material-symbols-outlined text-sm!">arrow_forward</span>
                        </span>
                    </a>

                    <a href=""
                        class="flex items-center justify-between p-4 bg-slate-50 rounded-md border border-transparent hover:border-amber-200 transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center">
                                <span class="material-symbols-outlined text-amber-600 text-[20px]">notifications</span>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-800">Notifications</p>
                                <p class="text-[10px] text-slate-400">Check latest project updates</p>
                            </div>
                        </div>
                        <span
                            class="bg-white w-8 h-8 flex items-center justify-center rounded-md shadow-sm text-amber-600 group-hover:bg-amber-600 group-hover:text-white transition-all">
                            <span class="material-symbols-outlined text-sm!">arrow_forward</span>
                        </span>
                    </a>



                </div>
            </div>

        </div>
    </section>
</main>