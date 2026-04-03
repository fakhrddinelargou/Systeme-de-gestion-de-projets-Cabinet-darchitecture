<main class="w-full h-screen ">

    <div class="w-full h-auto  lg:px-15 px-5 pt-10">
        <div class="mb-5 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div class="">
                <h2 class="text-4xl font-semibold text-gray-700">User Management</h2>
                <p class="text-sm text-slate-400 font-medium">Control and monitor all platform participants.</p>
            </div>

            <div class="flex gap-3">
                <button
                    class="flex items-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-md font-bold text-sm hover:bg-slate-50 transition-all shadow-sm">
                    <span class="material-symbols-outlined text-[20px]">file_download</span>
                    Export CSV
                </button>
                <x-users.add-new-worker>
                    <button @click="open = true"
                        class="flex items-center gap-2 px-5 py-2.5 bg-gray-600 text-white rounded-md font-bold text-sm hover:bg-gray-700 transition-all shadow-lg shadow-gray-300">
                        <span class="material-symbols-outlined text-[20px]">person_add</span>
                        Add New Worker
                    </button>
                </x-users.add-new-worker>
            </div>
        </div>

        <div
            class="bg-white p-2 mb-5 rounded-md shadow-sm border border-slate-100 flex flex-col md:flex-row gap-4 items-center">
            <div class="relative flex-1 w-full">
                <span
                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input id="input_search" type="text" placeholder="Search by name, email or reference..."
                    class="w-full pl-12 pr-4 py-3 bg-slate-50 border-none rounded-md text-sm focus:ring-2 focus:ring-gray-500/20 transition-all outline-none text-slate-600 font-medium">
            </div>

            <div class="flex bg-slate-100 p-1.5 rounded-md w-full md:w-auto">
                <button onclick="FilterByRole('all')"
                    class="type px-6 py-2  cursor-pointer bg-white shadow-sm text-gray-600 rounded-md  text-xs font-black uppercase tracking-wider">All</button>
                <button onclick="FilterByRole('architecte')"
                    class="type px-6 py-2 text-slate-500 cursor-pointer text-xs font-black uppercase tracking-wider hover:text-slate-800 transition-all">Architects</button>
                <button onclick="FilterByRole('client')"
                    class="type px-6 py-2 text-slate-500  cursor-pointer  text-xs font-black uppercase tracking-wider hover:text-slate-800 transition-all">Clients</button>
            </div>

            <button class="p-1.5 px-2 bg-slate-50 text-slate-400 rounded-md hover:text-gray-600 transition-all">
                <span class="material-symbols-outlined">filter_list</span>
            </button>
        </div>

        <div class="bg-white rounded-md shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50">
                            <th
                                class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                User Identity</th>
                            <th
                                class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                Role</th>
                            <th
                                class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                Status</th>
                            <th
                                class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                Registration</th>
                            <th
                                class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody" class="divide-y divide-slate-50">
                        <!-- @foreach ( $users as $user )
                        
                        <tr class="hover:bg-slate-50/50 transition-all group">
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="relative">
                                        <img class="w-12 h-12 rounded-2xl object-cover border-2 border-white shadow-md"
                                            src="{{$user->avatar ? asset('storage/' . $user->avatar) : asset('assets/images/gust.jpg') }}"
                                            alt="avatar">
                                        <div
                                            class="absolute -top-1 -right-1 w-4 h-4 {{ $user->is_active ? 'bg-emerald-500' : 'bg-gray-300' }} border-2 border-white rounded-full">
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="text-sm font-black text-slate-800">{{ $user->fullname }}</h4>
                                        <p class="text-[11px] text-slate-400 font-medium">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span
                                    class="px-3 py-1 text-[10px] font-black uppercase rounded-lg  border {{ $user->role_name == 'architecte' ? 'bg-blue-50 text-blue-600 border-blue-100' : 'bg-purple-50 text-purple-600 border-purple-100' }}">{{ $user->role_name }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $user->is_active ? 'bg-emerald-500' : 'bg-gray-300' }}"></span>
                                    <span class="text-xs font-bold text-slate-600 tracking-tight">{{ $user->is_active ? 'Active' : 'Inactive' }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-sm font-bold text-slate-600 tracking-tight text-tabular-nums">Mar 25,
                                    2026</p>
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div
                                    class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                    <button title="Edit"
                                    class="w-10 h-10 flex items-center justify-center  bg-white text-slate-500 rounded-xl border border-slate-100 hover:bg-gray-600 hover:text-white transition-all shadow-sm">
                                    <span class="material-symbols-outlined text-[18px]">edit_note</span>
                                </button>
                                <button title="Block"
                                class="w-10 h-10 flex items-center justify-center  bg-white text-red-400 rounded-xl border border-slate-100 hover:bg-red-600 hover:text-white transition-all shadow-sm">
                                <span class="material-symbols-outlined text-[18px]">block</span>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach -->
                    </tbody>
                </table>
            </div>

            <div class="   items px-8 py-5  border-t border-slate-100  text-xs font-bold text-slate-400">
                {{ $users->links() }}
            </div> 
      
        </div>
    </div>
</main>

<script>



    const input_search = document.getElementById('input_search');
    const type = document.querySelectorAll('.type');
    const tbody = document.getElementById('tbody');
    const users = @js($users);
    const defaultAvatar = "{{ asset('assets/images/gust.jpg') }}";
    const storagePath = "{{ asset('storage') }}/";
    
    showUSers(users.data);

    input_search.addEventListener('input', (e) => {
        query = e.target.value;
        if (query.trim().length !== 0) {
            getName(query)
        } else {
            showUSers(users.data);
        }
    })


    async function getName(query) {

        const response = await fetch(`/admin/search/${query}`);
        if (!response.ok) {
            throw new Error(response.status);
        }
        const data = await response.json();
        showUSers(data.users);

    }

    async function getRole(query) {

        const response = await fetch(`/admin/search/${query}/role`);
        if (!response.ok) {
            throw new Error(response.status);
        }
        const data = await response.json();
        showUSers(data.users);

    }



    function showUSers(users) {


        tbody.innerHTML = '';

        users.forEach(user => {
            const userAvatar = user.avatar
                ? storagePath + user.avatar
                : defaultAvatar;

            tbody.innerHTML += `

            <tr class="hover:bg-slate-50/50 transition-all group">
                <td class="px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <img class="w-12 h-12 rounded-2xl object-cover border-2 border-white shadow-md"
                                src="${userAvatar}"
                                alt="avatar">
                                <div
                                    class="absolute -top-1 -right-1 w-4 h-4 ${user.is_active ? 'bg-emerald-500' : 'bg-gray-300'} border-2 border-white rounded-full">
                                </div>
                        </div>
                        <div>
                            <h4 class="text-sm font-black text-slate-800">${user.fullname}</h4>
                            <p class="text-[11px] text-slate-400 font-medium">${user.email}</p>
                        </div>
                    </div>
                </td>
                <td class="px-8 py-6">
                    <span
                        class="px-3 py-1 text-[10px] font-black uppercase rounded-lg  border ${user.role_name == 'architecte' ? 'bg-blue-50 text-blue-600 border-blue-100' : 'bg-purple-50 text-purple-600 border-purple-100'}">${user.role_name}</span>
                </td>
                <td class="px-8 py-6">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full ${user.is_active ? 'bg-emerald-500' : 'bg-gray-300'}"></span>
                        <span class="text-xs font-bold text-slate-600 tracking-tight">${user.is_active ? 'Active' : 'Inactive'}</span>
                    </div>
                </td>
                <td class="px-8 py-6">
                    <p class="text-sm font-bold text-slate-600 tracking-tight text-tabular-nums">${cenvertTime(user.created_at)}</p>
                </td>
                <td class="px-8 py-6 text-right">
                    <div
                        class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <button title="Edit"
                            class="w-10 h-10 flex items-center justify-center  bg-white text-slate-500 rounded-xl border border-slate-100 hover:bg-gray-600 hover:text-white transition-all shadow-sm">
                            <span class="material-symbols-outlined text-[18px]">edit_note</span>
                        </button>
                        <button title="Block"
                            class="w-10 h-10 flex items-center justify-center  bg-white text-red-400 rounded-xl border border-slate-100 hover:bg-red-600 hover:text-white transition-all shadow-sm">
                            <span class="material-symbols-outlined text-[18px]">block</span>
                        </button>
                    </div>
                </td>
            </tr>
            `
        });



    }

    type.forEach(el => {
        el.addEventListener('click', () => {
            type.forEach(item => {
                item.classList.remove('bg-white', 'shadow-sm', 'text-gray-600', 'rounded-md');
                item.classList.add('text-gray-400');
            });

            el.classList.add('bg-white', 'shadow-sm', 'text-gray-600', 'rounded-md');
            el.classList.remove('text-gray-400');
        });
    });

    async function FilterByRole(data) {
        const roles = ['all', 'client', 'architecte'];
        let checkRole = false
        for (let i = 0; i < roles.length; i++) {
            if (roles[i] == data) {
                checkRole = true;
                break;
            }
        }

        if (checkRole) {
            if (data == 'all') {
                showUSers(users.data);
            } else {
                getRole(data)
            }


        }
    }

    function cenvertTime (time){
        const rawDate = new Date(time);
    
    const displayDate = rawDate.toLocaleDateString('en-US', {
        month: 'short',
        day: 'numeric',
        year: 'numeric'
    });

    return displayDate;
    }

</script>