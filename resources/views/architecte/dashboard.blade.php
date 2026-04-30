<main class="w-full lg:w-[82%] ml-auto lg:min-h-screen h-auto">
    <section class="w-full h-auto lg:px-15 px-5 pt-10">
        <div class="mb-5">
            <h2 class="text-4xl font-semibold text-gray-700">Architect Dashboard</h2>
            <p class="text-sm text-slate-400 mt-2">Overview of your assigned projects, progress, and recent activity.</p>
        </div>

        <!-- Top Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <!-- Assigned Projects -->
            <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-blue-500 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Assigned Projects</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-1">{{ $data['assigned_projects'] }}</h3>
                        <p class="text-xs text-blue-500 mt-2 font-medium">Projects currently under your responsibility</p>
                    </div>
                    <div class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-blue-600 text-3xl">assignment</span>
                    </div>
                </div>
            </div>

            <!-- Active Projects -->
            <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-emerald-500 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Active Projects</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-1">{{ $data['active_projects'] }}</h3>
                        <div class="flex items-center gap-1 mt-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-xs text-emerald-600 font-medium">In Progress</span>
                        </div>
                    </div>
                    <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-emerald-600 text-3xl">construction</span>
                    </div>
                </div>
            </div>

            <!-- Completed Projects -->
            <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-purple-500 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Completed</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-1">{{ $data['completed_projects'] }}</h3>
                        <p class="text-xs text-purple-500 mt-2 font-medium">Finished successfully</p>
                    </div>
                    <div class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-purple-600 text-3xl">task_alt</span>
                    </div>
                </div>
            </div>

            <!-- Average Progress -->
            <div class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-orange-500 transition-all duration-500 group relative">
                <div class="absolute -right-2 -bottom-2 opacity-5">
                    <span class="material-symbols-outlined text-8xl text-orange-600">timeline</span>
                </div>

                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Average Progress</p>
                        <h3 class="text-3xl font-black text-orange-600 mt-1">{{ $data['average_progress'] }}%</h3>
                        <p class="text-xs text-gray-400 mt-2">Based on ongoing projects</p>
                    </div>
                    <div class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-orange-600 text-3xl">monitoring</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Main content -->
        <div class="flex xl:flex-row flex-col items-start xl:gap-10">

            <!-- Latest Assigned Projects -->
            <div class="xl:w-[70%] w-full h-auto mb-10 bg-white rounded-md shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                    <h3 class="text-xl font-black text-slate-800">Latest Assigned Projects</h3>
                    <a href="{{ route('architecte.projects') }}"
                       class="md:text-sm text-[8px] cursor-pointer font-bold text-blue-600 md:bg-blue-50 md:px-4 px-0 py-2 rounded-md hover:bg-blue-100 transition-all">
                        View All Projects
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase">Project</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-center">Client</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-center">Status</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-center">Progress</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-center">Date</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-right">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-50">
                            @foreach ($data['assigned_projects_list'] as $project)
                        

                                <tr class="hover:bg-slate-50/80 transition-all group">
                                    <td class="px-8 py-4">
                                        <div>
                                            <p class="text-[12px] font-bold text-slate-800">{{ $project->title }}</p>
                                            <p class="text-[11px] text-slate-400">{{ $project->reference ?? 'No reference' }}</p>
                                        </div>
                                    </td>

                                    <td class="px-8 py-5 text-center text-[10px] text-slate-500">
                                        {{ $project->client_fullname }}
                                    </td>

                                    <td class="px-8 py-5 text-center">
                                        <span class="px-3 py-1 text-[10px] font-black uppercase rounded-md border
                                            {{ $project->status == 'in_progress' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : '' }}
                                            {{ $project->status == 'pending' ? 'bg-orange-50 text-orange-600 border-orange-100' : '' }}
                                            {{ $project->status == 'completed' ? 'bg-blue-50 text-blue-600 border-blue-100' : '' }}">
                                            {{ $project->status }}
                                        </span>
                                    </td>

                                    <td class="px-8 py-5 text-center">
                                        <div class="w-full max-w-30 mx-auto">
                                            <div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
                                                <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $project->percentage }}%"></div>
                                            </div>
                                            <p class="text-[11px] text-slate-500 mt-1">{{ number_format($project->percentage , 2) }}%</p>
                                        </div>
                                    </td>

                                    <td class="px-1 py-5 text-center md:text-[12px] text-[8px] font-medium text-slate-500">
                                        {{ \Carbon\Carbon::parse($project->created_at)->format('M d, Y') }}
                                    </td>

                                    <td class="px-8 py-5 text-right">
                                        <a href="{{ route('architecte.projects.show', $project->id) }}"
                                           class="w-8 h-8 inline-flex items-center justify-center bg-slate-100 text-gray-600 rounded-lg hover:bg-gray-600 hover:text-white transition-all">
                                            <span class="material-symbols-outlined text-[16px]!">visibility</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Last Notifications -->
            <div class="w-full xl:w-[30%] mb-5 max-h-[60vh] overflow-y-auto bg-white rounded-md shadow-sm border border-slate-100 p-8">
                <h3 class="text-xl font-black text-slate-800 mb-6 flex justify-between">
                    Last Notifications
                    <span class="bg-blue-50 text-blue-600 text-[10px] text-center p-2 my-auto rounded-md">
                        {{ count($data['notifications']) }} New
                    </span>
                </h3>

                <div class="space-y-4 ">
                    @foreach($data['notifications'] as $notification)
                    <a href="{{ route('notifications') }}">
                        <div class="p-4 bg-slate-50 rounded-md border border-transparent hover:border-blue-200 transition-all group mb-2">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[18px]">notifications</span>
                                </div>

                                <div class="flex-1">
                                    <p class="text-sm font-bold text-slate-800">{{ $notification->data['type'] }}</p>
                                    <p class="text-[11px] text-slate-500 mt-1">{{ $notification->data['data']['message'] }}</p>
                                    <p class="text-[10px] text-slate-400 mt-2">
                                        {{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
</main>