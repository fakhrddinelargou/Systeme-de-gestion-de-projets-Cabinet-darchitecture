<!-- <div x-data="{ open: false }">
    
 <div>
    {{ $slot }}
 </div>

    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4" 
         style="display: none;">
        
        <div @click.away="open = false" 
             class="bg-white w-full max-w-md rounded-2xl shadow-2xl border border-slate-100 overflow-hidden">
            
            <div class="px-6 py-4 border-b border-slate-50 bg-slate-50/50 flex justify-between items-center">
                <h3 class="text-sm font-black uppercase tracking-widest text-gray-700">Nouvelle Phase</h3>
                <button @click="open = false" class="text-slate-400 hover:text-slate-600 transition text-xl">&times;</button>
            </div>

            <form action="{{ route('phases.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                  <input type="hidden" name="project_id" value="{{ $id }}">
                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Titre de la Phase</label>
                    <input type="text" name="title" required placeholder="ex: Fondations / Plans 2D"
                           class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-medium focus:ring-2 focus:ring-gray-500 focus:border-gray-500 outline-none transition">
                </div>

                <div>
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Description</label>
                    <textarea name="description" rows="3" placeholder="Détails techniques..."
                              class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-medium focus:ring-2 focus:ring-gray-500 outline-none transition"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Date d'échéance</label>
                        <input type="date" name="due_date" required
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-[11px] font-bold text-gray-600 focus:ring-2 focus:ring-gray-500 outline-none transition">
                    </div>

                    <div>
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1.5">Progression (%)</label>
                        <input type="number" name="percentage" value="0" min="0" max="100"
                               class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-xs font-bold text-gray-600 focus:ring-2 focus:ring-gray-500 outline-none transition">
                    </div>
                </div>

                <div class="pt-4 flex gap-3">
                    <button type="button" @click="open = false" 
                            class="flex-1 px-4 py-3 text-xs font-bold text-slate-400 hover:text-slate-600 transition uppercase tracking-widest">
                        Annuler
                    </button>
                    <button type="submit" 
                            class="flex-1 px-4 py-3 bg-slate-800 text-white text-xs font-black rounded-xl hover:bg-gray-600 shadow-lg shadow-slate-200 transition-all uppercase tracking-widest">
                        Créer la phase
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> -->