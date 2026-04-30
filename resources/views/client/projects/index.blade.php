<main class="w-full h-auto min-h-screen lg:w-[82%] ml-auto">
    
    <div class="w-full h-auto   lg:px-15 px-5 pt-10 pb-10">
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

                    <tbody id="tbody_projects" class="divide-y divide-slate-200">
                        @forelse ($projects as $project)

                            <tr class="hover:bg-slate-50">
                                <td class="px-6 py-5">
                                    <div>
                                        <p class="text-base font-semibold text-slate-800">{{ $project->title }}
                                        </p>
                                        <p class="mt-1 text-sm text-slate-400">Réf : #{{ $project->reference }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-sm text-slate-600"> {{ \Carbon\Carbon::parse($project->created_at)->format('M d, Y') }}</td>
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

    </div>

</main>

<script>

    const tbody_projects = document.getElementById('tbody_projects');
    const input_search = document.getElementById('input_search');


    input_search.addEventListener('input', (e) => {
        let title = e.target.value;
        if(title.length === 0){
        isEmpty(title)    
        return;
        }
        filterByTitle(title);

    })



    async function filterByTitle(title) {
        if(title.length === 0){return;}
        
            try {
        const url = `/client/projects/search/${title}`;

        const response = await fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        });

        if (!response.ok) {
            throw new Error('Failed to fetch projects');
        }

        const data = await response.json();
        console.log(data);

        displayProjects(data.projects);

    } catch (e) {
        console.log('error:', e);
    }
    }

    function displayProjects(data) {

        const statusClasses = {
            'in_progress': 'bg-blue-50 text-blue-600',
            'completed': 'bg-emerald-50 text-emerald-600',
            'pending': 'bg-amber-50 text-amber-600',
            'archived': 'bg-slate-100 text-slate-500',
        };

        if (!data || data.length == 0) {
            isEmpty()
            return;
        }

        tbody_projects.innerHTML = '';

        data.forEach(el => {
            const currentClass = statusClasses[el.status] || 'bg-slate-50 text-slate-600';

            tbody_projects.innerHTML += `

                       <tr class="hover:bg-slate-50">
                                <td class="px-6 py-5">
                                    <div>
                                        <p class="text-base font-semibold text-slate-800">${el.title}
                                        </p>
                                        <p class="mt-1 text-sm text-slate-400">Réf : #${ el.reference }</p>
                                    </div>
                                </td>
                                <td class="px-6 py-5 text-sm text-slate-600"> ${ el.deadline }</td>
                                <td class="px-6 py-5 text-sm text-slate-600">${ el.type }</td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold ${currentClass}">
                                        ${ el.status }
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <a href="/client/projects/details/${el.id}"
                                        class="inline-flex items-center rounded-lg border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                                        Voir détails
                                    </a>
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