<main class="w-full h-screen lg:w-[82%] ml-auto ">

    <div class="w-full h-auto  lg:px-15 px-5 pt-10">
        <div class="mb-5 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div class="">
                <h2 class="text-4xl font-semibold text-gray-700">Projects Management</h2>
                <p class="text-sm text-slate-400 font-medium">Control and monitor all platform participants.</p>
            </div>

        </div>

        <div
            class="bg-white p-2 mb-5 rounded-md shadow-sm border border-slate-100 flex flex-col md:flex-row gap-4 items-center">
            <div class="relative w-full">
                <span
                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input id="input_search" type="text" placeholder="Search by title... "
                    class="w-full pl-12 pr-4 py-2.5 bg-slate-50 border-none rounded-md text-sm focus:ring-2 focus:ring-gray-500/20 transition-all outline-none text-slate-600 font-medium">
            </div>

            <div class="relative w-full md:w-64">
                <select id="filter"
                    class="block w-full outline-none bg-slate-100 border-none text-slate-500 py-2.5 px-4 pr-8 rounded-md text-xs font-black uppercase tracking-wider appearance-none cursor-pointer focus:ring-2 focus:ring-gray-200 focus:bg-white transition-all shadow-sm">
                    <option value="all" selected>All</option>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="complated">complated</option>
                    <option value="archived">archived</option>
                </select>

                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                    <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                        <path
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                    </svg>
                </div>
            </div>

        </div>

        <div class="overflow-x-auto bg-white rounded-md border border-slate-100 shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-100">
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">Nom du
                            Projet</th>
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">Client</th>
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">Avancement
                        </th>
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500">Statut</th>
                        <th class="px-6 py-4 text-[11px] font-bold uppercase tracking-wider text-slate-500 text-right">
                            Actions</th>
                    </tr>
                </thead>

                <tbody id="tbody_projects" class="divide-y divide-slate-50">
                    @forelse($projects as $project)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex flex-col w-40">
                                    <span class="text-sm font-bold text-slate-800">{{ $project->title }}</span>
                                    <span class="text-[11px] text-slate-400 italic">ID: #{{ $project->reference }}</span>
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2  w-45">
                                    <div
                                        class="w-7 h-7 rounded-full  overflow-hidden bg-indigo-100 text-indigo-600 flex items-center justify-center text-[10px] font-bold">
                                        <img src={{ $project->avatar ? asset('storage/' . $project->avatar) : asset('assets/images/gust.jpg') }} alt="">
                                    </div>
                                    <span class="text-sm text-slate-600 font-medium">{{ $project->client_name }}</span>
                                </div>
                            </td>

                            <td class="px-6 py-4 w-1/4">
                                <div class="flex flex-col gap-1.5">
                                    <div class="flex justify-between text-[10px] font-bold text-slate-500">
                                        <span>{{ $project->total_progress }}%</span>
                                        <span>Phase villa</span>
                                    </div>
                                    <div class="w-full bg-slate-100 rounded-full h-1.5">
                                        <div class="bg-indigo-500 h-1.5 rounded-full transition-all duration-500"
                                            style="width: {{ $project->total_progress }}%"></div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4">
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
                                    class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-md {{ $statusClasses[$project->status] ?? 'bg-slate-50' }}">
                                    {{ $project->status }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    @if($project->status == 'pending')
                                        <form action="{{ route('admin.refuser.status', $project->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type='submit' title="Refuser" class="flex items-center justify-center w-7 h-7 rounded-lg bg-red-100 text-red-600 
                                                                          hover:bg-red-600 hover:text-white 
                                                                          shadow-sm hover:shadow-md 
                                                                          focus:outline-none focus:ring-2 focus:ring-red-400 
                                                                          transition duration-200">

                                                <!-- Icon X -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.accept.status', $project->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type='submit' title="Accepte" class="flex items-center justify-center w-7 h-7 rounded-lg bg-green-100 text-green-600 
                                                                                       hover:bg-green-600 hover:text-white 
                                                                                       shadow-sm hover:shadow-md 
                                                                                       focus:outline-none focus:ring-2 focus:ring-green-400 
                                                                                       transition duration-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </button>
                                        </form>
                                    @endif
                                    <a href="{{ route('architecte.projects.show', $project->id) }}" title="show details"
                                        class="p-1.5 cursor-pointer text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
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
                Aucun projet trouvé
            </h3>

            <p class="text-sm text-slate-400 mt-1">
                Vous n’avez encore aucun projet assigné.
            </p>


        </div>

    </td>
</tr>
@endempty
                    
                </tbody>
            </table>
        </div>
    </div>

</main>

<script>
    const filter = document.getElementById('filter');
    const status_dispo = ['all', 'in_progress', 'pending', 'complated', 'archived'];
    const tbody_projects = document.getElementById('tbody_projects');
    const input_search = document.getElementById('input_search');

    filter.addEventListener('change', (e) => {
        let status = e.target.value;
        let checkStatus = false;
        for (let i = 0; i < status_dispo.length; i++) {
            if (status_dispo[i] == status) {
                checkStatus = true;
            }
        }
        console.log(checkStatus);

        if (checkStatus) {
            filterByStatus(status);
        }
    })

    input_search.addEventListener('input', (e) => {
        let title = e.target.value;

        filterByTitle(title);

    })

    async function filterByStatus(status) {
        const url = `projects/filter/status/${status}`;
        const response = await fetch(url);
        const data = await response.json();
        displayProjects(data.projects)
    }

    async function filterByTitle(title) {

        if (title == '') {
            filterByStatus('all')
        }
        const url = `projects/search/${title}`;
        const response = await fetch(url);
        const data = await response.json();

        displayProjects(data.projects)

    }


    function displayProjects(data) {

        const defaultAvatar = "/assets/images/gust.jpg";
        const statusClasses = {
            'in_progress': 'bg-blue-50 text-blue-600',
            'completed': 'bg-emerald-50 text-emerald-600',
            'pending': 'bg-amber-50 text-amber-600',
            'archived': 'bg-slate-100 text-slate-500',
        };

        if (data.length == 0) {
            isEmpty()
            return;
        }

        tbody_projects.innerHTML = '';

        data.forEach(el => {
            const currentClass = statusClasses[el.status] || 'bg-slate-50 text-slate-600';

            tbody_projects.innerHTML += `
        <tr class="hover:bg-slate-50/50 transition-colors">
            <td class="px-6 py-4">
                <div class="flex flex-col">
                    <span class="text-sm font-bold text-slate-800">${el.title}</span>
                    <span class="text-[11px] text-slate-400 italic">ID: ${el.reference}</span>
                </div>
            </td>

            <td class="px-6 py-4">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-full overflow-hidden bg-indigo-100 text-indigo-600 flex items-center justify-center text-[10px] font-bold">
                        <img src="${el.avatar ? '/storage/' + el.avatar : defaultAvatar}" alt="">
                    </div>
                    <span class="text-sm text-slate-600 font-medium">${el.client_name}</span>
                </div>
            </td>

            <td class="px-6 py-4 w-1/4">
                <div class="flex flex-col gap-1.5">
                    <div class="flex justify-between text-[10px] font-bold text-slate-500">
                        <span>${el.total_progress}%</span>
                        <span>Phase villa</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-1.5">
                        <div class="bg-indigo-500 h-1.5 rounded-full transition-all duration-500"
                             style="width: ${el.total_progress}%"></div>
                    </div>
                </div>
            </td>

            <td class="px-6 py-4">
                <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-md ${currentClass}">
                    ${el.status.replace('_', ' ')}
                </span>
            </td>

            <td class="px-6 py-4 text-right">
                <div class="flex justify-end gap-2">
                    <a href="projects/details/${el.id}" title="show details"
                            class="p-1.5 cursor-pointer text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-lg">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </a>
                </div>
            </td>
        </tr>`;
        });
    }

    function isEmpty(title) {
        tbody_projects.innerHTML = `
<tr>
    <td colspan="5" class="py-24">
        <div class="flex flex-col items-center justify-center text-center">
            <div class="mb-4 p-4 bg-slate-50 rounded-full border border-slate-100">
                <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            
            <h3 class="text-sm font-black uppercase tracking-widest text-slate-800">Projet introuvable</h3>
            <p class="text-xs text-slate-400 mt-2 max-w-xs leading-relaxed">
                Vérifiez l'orthographe ou essayez un autre mot-clé.
            </p>

        </div>
    </td>
</tr>
        `
    }


</script>