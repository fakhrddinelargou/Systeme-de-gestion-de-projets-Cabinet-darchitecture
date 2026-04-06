<main class="w-full lg:w-[82%] ml-auto lg:h-screen h-auto ">
    <section class=" w-full h-auto  lg:px-15 px-5 pt-10 ">
        <div class="mb-5">
            <h2 class="text-4xl font-semibold text-gray-700">Dashboard</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 ">

            <div
                class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-gray-500 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Architects</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-1">{{ $data['architects'] }}</h3>
                        <p class="text-xs text-blue-500 mt-2 font-medium">↑ {{ $data['last_users_weekly'] }} new this
                            week</p>
                    </div>
                    <div
                        class="w-14 h-14 bg-blue-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-gray-600 text-3xl">architecture</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-purple-500 duration-500 transition-all group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Clients</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-1">{{ $data['clients'] }}</h3>
                        <p class="text-xs text-purple-500 mt-2 font-medium">Active accounts</p>
                    </div>
                    <div
                        class="w-14 h-14 bg-purple-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-purple-600 text-3xl">person_pin</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-emerald-500 transition-all duration-500 group">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Projects</p>
                        <h3 class="text-3xl font-black text-gray-800 mt-1">{{ $data['active_projects'] }}</h3>
                        <div class="flex items-center gap-1 mt-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span class="text-xs text-emerald-600 font-medium">In Progress</span>
                        </div>
                    </div>
                    <div
                        class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-emerald-600 text-3xl">construction</span>
                    </div>
                </div>
            </div>

            <div
                class="bg-white p-6 rounded-md shadow-sm border border-gray-100 hover:border-orange-500 transition-all duration-500 group relative ">
                <div class="absolute -right-2 -bottom-2 opacity-5">
                    <span class="material-symbols-outlined text-8xl text-orange-600">verified_user</span>
                </div>

                <div class="flex items-center justify-between relative z-10">
                    <div>
                        <p class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Pending</p>
                        <h3 class="text-3xl font-black text-orange-600 mt-1">{{ $data['pending_projects'] }}</h3>
                        <p class="text-xs text-gray-400 mt-2">Needs approval</p>
                    </div>
                    <div
                        class="w-14 h-14 bg-orange-50 rounded-2xl flex items-center justify-center group-hover:rotate-6 duration-500 transition-transform">
                        <span class="material-symbols-outlined text-orange-600 text-3xl">verified_user</span>
                    </div>
                </div>
            </div>

        </div>

        <div class="flex  items-start gap-10">

            <div class="w-[70%] h-[60vh] bg-white rounded-md shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-50 flex justify-between items-center">
                    <h3 class="text-xl font-black text-slate-800">Latest Registrations</h3>
                    <a href="{{ route('users') }}"
                        class="text-sm cursor-pointer font-bold text-blue-600 bg-blue-50 px-4 py-2 rounded-md hover:bg-blue-100 transition-all">View
                        Full List</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-slate-50/50">
                            <tr>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase">User</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase">Role</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-center">
                                    Date</th>
                                <th class="px-8 py-4 text-[11px] font-black text-slate-400 uppercase text-right">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach ($data['users'] as $user)
                                <tr class="hover:bg-slate-50/80 transition-all group">
                                    <td class="px-8 py-4">
                                        <div class="flex items-center gap-4">
                                            <img class="w-11 h-11 rounded-xl border-2 border-white shadow-sm" src={{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/images/gust.jpg') }} alt="profile">
                                            <div>
                                                <p class="text-sm font-bold text-slate-800">{{ $user->fullname }}</p>
                                                <p class="text-[11px] text-slate-400">{{ $user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 text-center">
                                        <span
                                            class="px-3 py-1 text-[10px] font-black uppercase rounded-md border {{ $user->role_name == 'architecte' ? 'bg-gray-50 text-gray-600 border-blue-100' : 'bg-purple-50 text-purple-600 border-purple-100' }} ">{{ $user->role_name }}</span>
                                    </td>
                                    <td class="px-8 py-5 text-center text-sm font-medium text-slate-500">
                                        {{ \Carbon\Carbon::parse($user->joined_date)->format('M d, Y') }}
                                    </td>
                                    <td class="px-8 py-5 text-right">
                                        <div class="flex justify-end gap-2  transition-all">


                                            <x-users.delete-user :id="$user->id">
                                                <button @click="open = true"
                                                    class="w-8 h-8 flex items-center justify-center bg-slate-100 text-red-500 rounded-lg hover:bg-red-600 hover:text-white transition-all"><span
                                                        class="material-symbols-outlined text-[16px]!  font-extralight">delete</span>
                                                </button>
                                            </x-users.delete-user>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class=" max-h-[60vh] overflow-y-auto bg-white rounded-md shadow-sm border border-slate-100 p-8">
                <h3 class="text-xl font-black text-slate-800 mb-6 flex justify-between">
                    Action Required
                    <span class="bg-red-50 text-red-500 text-[10px]  text-center p-2  my-auto rounded-md">{{ $data['pending_projects'] }} New</span>
                </h3>

                <div class="space-y-4">

                @foreach($data['new_projects'] as $project)
                    <div
                        class="flex items-center justify-between p-4 bg-slate-50 rounded-md border border-transparent hover:border-blue-200 transition-all group">
                        <div class="flex items-center gap-3">
                            <img class="w-10 h-10 rounded-full"
                                src={{ $project->avatar ? asset('storage/' . $project->avatar) : asset('assets/images/gust.jpg') }}  alt="">
                            <div>
                                <p class="text-sm font-bold text-slate-800">{{ $project->project_name }}</p>
                                <p class="text-[10px] text-slate-400">{{ $project->user_name }}</p>
                            </div>
                        </div>
                        <button
                            class="bg-white w-8 h-8 flex items-center justify-center rounded-md shadow-sm text-blue-600 hover:bg-blue-600 hover:text-white transition-all">
                            <span class="material-symbols-outlined text-sm!">visibility</span>
                        </button>
                    </div>
                @endforeach
                  
                </div>
            </div>

        </div>

    </section>

</main>