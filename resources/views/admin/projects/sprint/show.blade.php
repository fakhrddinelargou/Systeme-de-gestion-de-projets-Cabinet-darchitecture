<main class="w-full h-auto min-h-screen lg:w-[82%] ml-auto ">

<section class="bg-white">
    
    {{-- Header --}}
    <div class="px-8 py-6 border-b border-slate-200 ">
        <div class="flex flex-col xl:flex-row xl:items-start xl:justify-between gap-6">
            
            <div class="flex-1">
                <div class="flex items-center gap-3 flex-wrap">
                    <h2 class="text-3xl font-bold text-slate-800">{{ $sprint->title }}</h2>
                                        @php
                                            $statusClasses = [
                                                'pending' => 'bg-amber-50 text-amber-600',
                                                'in_progress' => 'bg-indigo-50 text-indigo-600',
                                                'completed' => 'bg-emerald-50 text-emerald-600',
                                            ];
                                        @endphp
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $statusClasses[$sprint->status] }}">
                        {{ $sprint->status }}
                    </span>
                </div>

            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('admin.projects.show' , $project_id) }}" class="px-4 py-2 rounded-md border border-slate-200 text-slate-600 font-semibold hover:bg-white transition">
                    Back
                </a>

            

                <button onclick="document.getElementById('phaseModal').classList.remove('hidden')"  class="px-8 py-2 rounded-md bg-slate-700 text-white font-semibold hover:bg-slate-800 transition">
                    Edit
                </button>
            </div>
        </div>
    </div>

    {{-- Body --}}
    <div class="p-8 space-y-8">

        {{-- Stats row --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
            <div class="bg-slate-50 border border-slate-200 rounded-md p-5">
                <p class="text-sm text-slate-400">Progression</p>
                <h3 class="text-3xl font-bold text-slate-800 mt-2">{{ $sprint->percentage }}%</h3>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-md p-5">
                <p class="text-sm text-slate-400">Deadline</p>
                <h3 class="text-xl font-bold text-slate-800 mt-2">
                    {{ \Carbon\Carbon::parse($sprint->due_date)->format('M d, Y') }}

                </h3>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-md p-5">
                <p class="text-sm text-slate-400">Created at</p>
                <h3 class="text-xl font-bold text-slate-800 mt-2">
                                        {{ \Carbon\Carbon::parse($sprint->created_at)->format('M d, Y') }}

                </h3>
            </div>

        </div>

        {{-- Progress block --}}
        <div class="bg-white border border-slate-200 rounded-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-slate-800">Sprint progress</h3>
                <span class="text-sm font-semibold text-slate-500">{{ $sprint->percentage  }}%</span>
            </div>

            <div class="w-full bg-slate-200 rounded-full h-4">
                <div class="bg-blue-500 h-4 rounded-full" style="width: {{ $sprint->percentage }}%;"></div>
            </div>
        </div>

        {{-- Description block --}}
        <div class="bg-white border border-slate-200 rounded-md p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-4">Description</h3>
            <div class="text-slate-600 leading-8">
         {{ $sprint->description }}
            </div>
        </div>

        <div class=" border border-slate-200 rounded-md min-h-screen p-6 flex justify-center">
        <div class="flex gap-6 overflow-x-auto w-full">
            
            {{-- COLUMN: TODO --}}
            <div class="w-full min-w-86 ">
                <div class="bg-slate-100 rounded-md p-4">
    
                    {{-- header --}}
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-slate-700">Pending</h3>
                        <span class="text-xs text-slate-400">{{ $statusCount['pending'] }}</span>
                    </div>
                    <div id="pending_container" class="space-y-3 max-h-[70vh] overflow-y-auto pr-1">
    
                    </div>
                    {{-- add --}}
                    <button onclick="document.getElementById('taskModal').classList.remove('hidden')" class="mt-4 text-sm text-slate-500 hover:text-slate-800">
                        + Ajouter une carte
                    </button>
    
                </div>
            </div>
    
            {{-- COLUMN: DOING --}}
            <div class="w-full min-w-86">
                <div class="bg-slate-100 rounded-md p-4">
    
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-slate-700">In Progress</h3>
                        <span class="text-xs text-slate-400">{{ $statusCount['inProgress'] }}</span>
                    </div>
    
                    <div id="inProgress_container" class="space-y-3 max-h-[70vh] overflow-y-auto pr-1">
    
  
                    </div>
                </div>
            </div>
    
            {{-- COLUMN: DONE --}}
            <div class="w-full min-w-86">
                <div class="bg-slate-100 rounded-md p-4">
    
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-bold text-slate-700">Completed</h3>
                        <span class="text-xs text-slate-400">{{ $statusCount['completed'] }}</span>
                    </div>
    
                    <div id="completed_container" class="space-y-3 max-h-[70vh] overflow-y-auto pr-1">
  
    
                    </div>


                </div>
            </div>
    
        </div>
    </div>
    </div>
</section>

    <!-- form sprint -->
    <div id="phaseModal" class=" fixed inset-0 z-50 hidden">

        <div class="relative flex items-center justify-center min-h-screen p-4">
            <div class="w-full max-w-2xl bg-white rounded-md shadow-2xl border border-slate-200 overflow-hidden">

                {{-- Header --}}
                <div class="flex items-center justify-between px-6 py-5 border-b border-slate-200">
                    <div>
                        <h3 class="text-xl font-bold text-slate-800">Update sprint</h3>
                        <p class="text-sm text-slate-400 mt-1">Update sprint for this project</p>
                    </div>

                    <button onclick="document.getElementById('phaseModal').classList.add('hidden')"
                        class="text-slate-400 hover:text-slate-600 text-2xl leading-none">
                        &times;
                    </button>
                </div>

                {{-- Form --}}
                <form action="{{ route('project.sprint.update' , $sprint->id) }}"  method="POST" class="p-6 space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2 ">Title of sprint</label>
                        <input required type="text" value="{{ $sprint->title }}" name="title" placeholder="Ex: Conception 2D"
                            class="w-full rounded-md border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
                        <textarea required name="description"  rows="4" placeholder="Décrivez brièvement cette phase..."
                            class="w-full rounded-md border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300 resize-none">{{ $sprint->description }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Percentage</label>
                            <input type="number" value="{{ $sprint->percentage }}" name="percentage" min="0" max="100" placeholder="0"
                                class="w-full rounded-md border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">Statut</label>
                            <select name="status"
                                class="w-full rounded-md border border-slate-200 px-4 py-3 text-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300">
                                <option value="">Sélectionner un statut</option>
                                <option value="pending" {{ $sprint->status == 'pending' ? 'selected' : '' }}>En attente</option>
                                <option value="in_progress" {{ $sprint->status == 'in_progress' ? 'selected' : '' }} >En cours</option>
                                <option value="completed" {{ $sprint->status == 'complated' ? 'selected' : '' }}>Terminée</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Deadline</label>
                        <input required type="date" value="{{ $sprint->due_date }}" name="due_date"
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

    <!-- form task -->
     <div id="taskModal" class=" fixed flex items-center justify-center inset-0 bg-black/20 z-50 top-0 left-0 hidden">

     
     <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 mt-6 w-md">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Tasks</h2>
            <p class="text-sm text-gray-400">Add and manage sprint tasks</p>
        </div>
    </div>

    {{-- Form --}}
    <form action="{{ route('project.task.create') }}" method="POST" class="space-y-5">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            {{-- Title --}}
            <div class="w-full">
                <label class="block text-xs font-bold text-gray-400 uppercase">
                    Task Title
                </label>
                <input type="text" name="title" required
                    placeholder="Create structure..."
                    class="mt-2 w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-gray-200">
            </div>

 

        </div>

        {{-- Description --}}
        <div>
            <label class="block text-xs font-bold text-gray-400 uppercase">
                Description
            </label>
            <textarea name="description" rows="3"
                placeholder="Short description..."
                class="mt-2 w-full px-4 py-3 rounded-md border border-gray-300"></textarea>
        </div>

        {{-- Deadline --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

            <div>
                <label class="block text-xs font-bold text-gray-400 uppercase">
                    Deadline
                </label>
                <input type="date" name="due_date" 
                    class="mt-2 w-full px-4 py-3 rounded-md border border-gray-300">
            </div>

        </div>

        {{-- Hidden sprint --}}
        <input type="hidden" name="sprint_id" value="{{ $sprint->id }}">

        {{-- Button --}}
        <div class="flex items-center justify-end gap-3 pt-2">
                                    <button type="button" onclick="document.getElementById('taskModal').classList.add('hidden')"
                            class="px-6 py-2.5 rounded-md border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50 transition">
                            Cancel
                        </button>
            <button type="submit"
                class="px-6 py-2.5 rounded-lg bg-[#1f2937] text-white text-sm font-semibold hover:bg-black transition">
                + Add Task
            </button>
        </div>

    </form>
     </div>
    </div>

    <!-- open task details -->
     <div id="taskDetails" class="fixed inset-0   bg-black/40 flex items-center justify-center z-50 ">

    <form  action="{{ route('project.task.update') }}" method="POST" class="bg-white  max-w-6xl rounded-xl shadow-2xl overflow-hidden flex">
   @csrf
   @method('PUT')
   <input type="hidden" name="task_id" id="task_id" >
   <input type="hidden" name="sprint_id" id="sprint_id" >
        <div class=" p-6 space-y-6">

            {{-- Header --}}
            <div class="flex w-full items-center gap-3 border-b border-gray-100 pb-4  ">
                <span class="text-green-500 text-xl">🎯</span>
                <input id="title" name="title" type="text" class="text-xl outline-none font-semibold text-gray-800">
                <div onclick="document.getElementById('taskDetails').classList.add('hidden')" class="ml-auto cursor-pointer">
                    <span class="material-symbols-outlined text-[16px]!">close</span>
                </div>
            </div>

            <div class="flex items-center gap-6 text-sm text-gray-500">
                <div>
                    <span class="font-semibold text-gray-700 pr-2 ">Status:</span>

                    <select name="status" class="border border-gray-200 rounded-sm p-1 outline-none" name="status" id="status">
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>

                </div>

                <div class="flex items-center gap-2">
                    <span>Deadline : </span>
                    <input type="date" id="deadline" name="due_date" class="font-semibold text-gray-700">
                </div>

                <div class="w-10 h-10 rounded-full  ml-auto border border-gray-200 overflow-hidden" >
                    <img id="avatar-task" src="" alt="avatar">
                </div>
            </div>

            {{-- Description --}}
            <div>
                <h3 class="text-sm font-semibold text-gray-600 mb-2">Description</h3>
                <textarea rows="10" cols="50" id="description" name="description" class="text-gray-700 p-2 resize-none outline-none text-sm leading-relaxed border rounded-md border-gray-200">
                </textarea>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3">
                <button type="submit" class="px-4 py-2 bg-gray-100 rounded hover:bg-gray-200 text-sm">
                    Edit
                </button>

                <button class="px-4 py-2 bg-red-100 text-red-600 rounded hover:bg-red-200 text-sm">
                    Delete
                </button>

            </div>

        </div>

    </form>
</div>
</main>

<script>

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const defaultAvatar = "{{ asset('assets/images/gust.jpg') }}";
    const storagePath = "{{ asset('storage') }}/";
document.getElementById('taskDetails').classList.add('hidden');
    const pending_task = @js($pending_task);
    const inProgress_task = @js($inProgress_task);
    const completed_task = @js($completed_task);
    const taskDetails = document.getElementById('taskDetails');    

    const title = document.getElementById('title');
    const stt = document.getElementById('status');
    const deadline = document.getElementById('deadline');
    const description = document.getElementById('description');
    const avatar_task = document.getElementById('avatar-task');
    const task_id = document.getElementById('task_id');
    const sprint_id = document.getElementById('sprint_id');

    console.log(stt[0].innerText);
    
    const status = ['pending' , 'inProgress' , 'completed'];
    for(let i = 0 ; i < status.length ; i++){
        if(status[i] == 'pending'){
            afficheTasks(pending_task , status[i]);
        }
        if(status[i] == 'inProgress'){
            afficheTasks(inProgress_task , status[i]);
        }
        if(status[i] == 'completed'){
            afficheTasks(completed_task , status[i]);
        }
    }


    function afficheTasks(cards , status){
    console.log(cards);
    
    const statusCards = {
        pending : 'pending_container',
        inProgress : 'inProgress_container',
        completed : 'completed_container',
    }
    const statusClasses = { 
        pending : 'bg-amber-50 text-amber-600',
        in_progress : 'bg-indigo-50 text-indigo-600',
        completed : 'bg-emerald-50 text-emerald-600',
    };
    
    const container = document.getElementById(statusCards[status]);
        container.innerHTML='';
        if(cards.length == 0){
        container.innerHTML=`
            <div class="bg-white/50 hover:bg-white duration-200 h-40 rounded-xl flex items-center justify-center shadow-sm">
                <p class="text-2xl text-gray-200">&plus;</p>
            </div>
        `
        }else{


            cards.forEach(el => {
                
                 const userAvatar = el.avatar ? storagePath + el.avatar : defaultAvatar;
                 const card = document.createElement('div');
 
                 card.className = "bg-white cursor-pointer rounded-xl p-4 shadow-sm";
                 
                 card.innerHTML = `
                                     <h4 class="font-semibold text-slate-800 text-sm">
                                         ${el.title}
                                     </h4>
                                 
                                     <p class="text-xs text-slate-400 mt-2">
                                         ${el.description}
                                     </p>
                                 
                                     <div class="mt-4 flex items-center justify-between">
                                         <span class="text-xs px-2 py-1 rounded-lg ${statusClasses[el.status]}">
                                             ${el.status}
                                         </span>
                                         <div title="${el.fullname}" class='w-8 h-8 rounded-full border border-gray-200 shadow-md overflow-hidden'>
                                         <img src=${userAvatar} }/>
                                         </div>
                                     </div>
                                `;
                
                card.addEventListener('click', () => {
                    showTaskDetails(el); 
                });
                container.appendChild(card);
            });
        }
    }


    function showTaskDetails(el){
                 const userAvatar = el.avatar ? storagePath + el.avatar : defaultAvatar;
     taskDetails.classList.remove('hidden');
    console.log(el);
    title.value =el.title;
    // stt.innerHTML=el.status;
    deadline.value=el.due_date;
    description.innerHTML=el.description;
    avatar_task.src=userAvatar;
    task_id.value = el.id;
    sprint_id.value = el.sprint_id;
document.getElementById('status').value = el.status;
    }


</script>