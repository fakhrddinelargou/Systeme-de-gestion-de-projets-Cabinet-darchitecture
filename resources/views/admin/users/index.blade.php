<main class="w-full h-auto min-h-screen lg:w-[82%] ml-auto ">

    <div class="w-full h-auto  lg:px-15 px-5 pt-10">
        <div class="mb-5 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div class="">
                <h2 class="text-4xl font-semibold text-gray-700">User Management</h2>
                <p class="text-sm text-slate-400 font-medium">Control and monitor all platform participants.</p>
            </div>

            <div>
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
                <input id="input_search" type="text" placeholder="Search by name..."
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

        <div class="bg-white rounded-md shadow-sm border border-slate-100 overflow-hidden mb-5">
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
                    </tbody>
                </table>
            </div>

<div class="items px-8 py-5 border-t border-slate-100 text-xs font-bold text-slate-400">
    {{ $users->links() }}
</div>

        </div>
    </div>

</main>

@include('components.users.block-user')



<script>
    // 1. Global Variables & Selectors
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const input_search = document.getElementById('input_search');
    const type = document.querySelectorAll('.type');
    const tbody = document.getElementById('tbody');
    const users = @js($users);
    const defaultAvatar = "{{ asset('assets/images/gust.jpg') }}";
    const storagePath = "{{ asset('storage') }}/";
    let userIdToBlock = null;

    // 2. Initialization
    showUSers(users.data);

    // 3. Event Listeners
    input_search.addEventListener('input', (e) => {
        const query = e.target.value;
        if (query.trim().length !== 0) {
            getName(query);
        } else {
            showUSers(users.data);
        }
    });

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




    async function filterByRole(roleName) {
        const url = `/admin/users?role=${roleName}`;
        try {
            const response = await fetch(url, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            const data = await response.json();
            showUSers(data.data);
        } catch (error) {
            console.error("Filter Error:", error);
        }
    }

async function getName(query) {
    console.log(query);

    try {
        const response = await fetch(`/admin/users?search=${query}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        });

        if (!response.ok) throw new Error(response.status);

        const data = await response.json();

        showUSers(data.data); // ✅ صح

        document.querySelector('.items').innerHTML = data.html; // مهم باش pagination تتبدل

    } catch (error) {
        console.error("Search Error:", error);
    }
}

    function showUSers(usersList) {
        tbody.innerHTML = '';

        if (usersList.length == 0) {
            tbody.innerHTML = `
            <tr>
                <td colspan="5" class="px-6 py-12 text-center">
                    <div class="flex flex-col items-center justify-center text-slate-400">
                        <span class="material-symbols-outlined text-4xl mb-2">search_off</span>
                        <p class="text-sm font-bold">No users found matching your search</p>
                    </div>
                </td>
            </tr>
        `;
            return;
        }

        usersList.forEach(user => {
            const userAvatar = user.avatar ? storagePath + user.avatar : defaultAvatar;
            tbody.innerHTML += `
            <tr class="hover:bg-slate-50/50 transition-all group">
                <td class="px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <img class="w-12 h-12 rounded-2xl object-cover border-2 border-white shadow-md" src="${userAvatar}" alt="avatar">
                            <div class="absolute -top-1 -right-1 w-4 h-4 ${user.is_active ? 'bg-emerald-500' : 'bg-gray-300'} border-2 border-white rounded-full"></div>
                        </div>
                        <div>
                            <h4 class="text-sm font-black text-slate-800">${user.fullname}</h4>
                            <p class="text-[11px] text-slate-400 font-medium">${user.email}</p>
                        </div>
                    </div>
                </td>
                <td class="px-8 py-6">
                    <span class="px-3 py-1 text-[10px] font-black uppercase rounded-lg border ${user.role_name == 'architecte' ? 'bg-blue-50 text-blue-600 border-blue-100' : 'bg-purple-50 text-purple-600 border-purple-100'}">${user.role_name}</span>
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
                    <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-all duration-300">
                        <button onclick="openEditModal(${user.id})" title="Edit" class="w-10 h-10 flex items-center justify-center bg-white text-slate-500 rounded-xl border border-slate-100 hover:bg-gray-600 hover:text-white transition-all shadow-sm">
                            <span class="material-symbols-outlined text-[18px]">edit_note</span>
                        </button>
                        <button title="Block" onclick="openConfirmModal(${user.id})" class="w-10 h-10 flex items-center justify-center cursor-pointer bg-white rounded-xl border border-slate-100 transition-all shadow-sm ${user.is_active ? 'text-red-400' : 'text-green-400'}">
                            <span class="material-symbols-outlined text-[18px]">${user.is_active ? 'block' : 'sync'}</span>
                        </button>
                    </div>
                </td>
            </tr>`;

            console.log(user);

        });
    }

    // 5. Modal & Actions
    function openConfirmModal(id) {
        userIdToBlock = id;
        const modal = document.getElementById('confirm-modal');
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        userIdToBlock = null;
        document.getElementById('confirm-modal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }

    async function handleConfirm() {        
        if (!userIdToBlock) return;
        try {
            const response = await fetch(`/admin/users/${userIdToBlock}/block`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            });
            const data = await response.json();
            console.log(data);
            
            showAlert(data.message);
        } catch (error) {
            console.error("Error:", error);
        }
        closeModal();
    }

    function showAlert(message) {
        const alertHTML = `
            <div id="alert" class="fixed top-5 left-1/2 -translate-x-1/2 z-[100] w-full max-w-md flex items-center gap-4 p-4 bg-emerald-50 border border-emerald-100 rounded-md shadow-2xl shadow-emerald-200/50 animate-in fade-in slide-in-from-top-8 duration-500">
                <div class="w-10 h-10 bg-emerald-500 rounded-md flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                    <span class="material-symbols-outlined text-2xl font-bold">check_circle</span>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-emerald-700 font-bold opacity-90">${message}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="w-8 h-8 flex items-center justify-center hover:bg-emerald-100 rounded-xl transition-colors text-emerald-400">
                    <span class="material-symbols-outlined text-lg">close</span>
                </button>
            </div>`;
        document.body.insertAdjacentHTML('afterbegin', alertHTML);
        setTimeout(() => {
            const alert = document.getElementById('alert');
            if (alert) alert.remove();
        }, 5000);
    }

    function cenvertTime(time) {
        return new Date(time).toLocaleDateString('en-US', {
            month: 'short', day: 'numeric', year: 'numeric'
        });
    }

    function FilterByRole(role) {
        const validRoles = ['all', 'client', 'architecte'];
        if (validRoles.includes(role)) {
            role === 'all' ? showUSers(users.data) : filterByRole(role);
        }
    }

    function openEditModal(userId) {

        const userData = users.data.find(u => u.id === userId);
        const defaultAvatar = "/assets/images/gust.jpg";
        if (!userData) {
            console.error("User Not found!");
            return;
        }

        const cardUser = `
             <div id="edit-user-modal"
        class="fixed inset-0  bg-slate-900/40 backdrop-blur-sm flex items-center justify-center z-110 ">
        <div class="bg-white w-full max-w-sm rounded-md shadow-2xl p-0 overflow-hidden border border-slate-100">

            <div class="bg-slate-50 px-8 py-10 flex flex-col items-center border-b border-slate-100">
                <div class="relative mb-4">
                <img id="view-avatar" class="w-24 h-24 rounded-xl object-cover border-4 border-white shadow-md"
                   src="${userData.avatar ? '/storage/' + userData.avatar : defaultAvatar}" 
                   alt="Avatar">
                    <div id="view-status-icon"
                        class="absolute -top-1 -right-1 w-5 h-5 border-4 border-white rounded-full"></div>
                </div>

                <h3 id="view-fullname" class="text-lg font-black text-slate-800 mb-1">${userData.fullname}</h3>
                <p id="view-email" class="text-xs text-slate-400 font-bold tracking-tight">${userData.email}</p>

                <div id="view-status-badge"
                    class="mt-4 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest"></div>
            </div>

            <div id="update-role-form" class="p-8 space-y-6">

                <div>
                    <label
                        class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 block ml-1">Change
                        User Role</label>
                    <div class="relative">
                        <select id="edit-role"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-md text-sm font-bold text-slate-700 appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-all cursor-pointer">
                            <option value="client" ${userData.role_name == 'client' ? 'selected' : ''}>Client</option>
                            <option value="architecte" ${userData.role_name == 'architecte' ? 'selected' : ''}>Architecte</option>
                        </select>
                        <span
                            class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="button" onclick="closeEditModal()"
                        class="flex-1 px-6 py-3 border border-slate-100 rounded-md text-sm font-bold text-slate-400 hover:bg-slate-50 transition-all">Close</button>
                    <button id="btnRole" type="button" onclick="submitRole(${userData.id})"
                        class="flex-1 px-6 py-3 bg-slate-800 text-white rounded-md text-sm font-bold hover:bg-slate-900 shadow-lg shadow-slate-200 transition-all">Update
                        Role</button>
                </div>
            </div>
        </div>
    </div>
         `;
        document.body.insertAdjacentHTML('afterbegin', cardUser)
    }


    function closeEditModal() {
        const modal = document.getElementById("edit-user-modal");
        if (modal) {
            modal.remove();
        }
    }

    async function submitRole(id) {
        console.log(csrfToken);

        const role = document.getElementById('edit-role').value;
        console.log(role);

        const btnRole = document.getElementById('btnRole');
        const url = `/admin/update/users/${id}?role=${role}`;
        const options = {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
            },

        };

        if (btnRole) {
            btnRole.disabled = true;
            btnRole.innerText = "Updating...";
            btnRole.style.opacity = "0.5";
        }

        try {
            const response = await fetch(url, options);
            const data = await response.json();
            console.log(data.message);
            closeEditModal();
            showAlert(data.message);
        } catch (err) {
            console.log(err);
        }
    }
</script>