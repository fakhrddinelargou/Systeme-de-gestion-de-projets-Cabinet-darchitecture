<main class="w-full h-auto min-h-screen lg:w-[82%] ml-auto">
    
    <div class="w-full h-auto   lg:px-15 px-5 pt-10">
        <div class="mb-5 flex flex-col md:flex-row md:items-center justify-between gap-4">

            <div class="w-full flex items-center justify-between ">
                <div class="">
                    <h2 class="text-4xl font-semibold text-gray-700">Mes demandes de projet</h2>
                    <p class="text-sm text-slate-400 font-medium">Consultez et suivez l’état de toutes vos demandes
                        soumises.
                    </p>
                </div>

                <a href="{{ route('create.projects') }}"
                    class="inline-flex items-center rounded-md bg-slate-800 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">
                    + Nouvelle demande
                </a>
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

        <div class="overflow-hidden rounded-md border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-slate-200 bg-slate-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Nom du projet
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Date de soumission
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Type
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Statut
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        @foreach ($projects as $project)

                            <tr class="hover:bg-slate-50">
                                <td class="px-6 py-5">
                                    <div>
                                        <p class="text-base font-semibold text-slate-800">{{ $project->title }}
                                        </p>
                                        <p class="mt-1 text-sm text-slate-400">Réf : #{{ $project->reference }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-sm text-slate-600"> {{ \Carbon\Carbon::parse($project->joined_date)->format('M d, Y') }}</td>
                                <td class="px-6 py-5 text-sm text-slate-600">{{ $project->type }}</td>
                                <td class="px-6 py-5">
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
                                        class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold {{ $statusClasses[$project->status] ?? 'bg-slate-50' }}">
                                        {{ $project->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <a href="{{ route('client.projects.show' , $project->id) }}"
                                        class="inline-flex items-center rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                                        Voir détails
                                    </a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
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