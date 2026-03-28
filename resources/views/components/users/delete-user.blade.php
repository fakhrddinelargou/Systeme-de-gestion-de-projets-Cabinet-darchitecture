<div x-data="{ open: false}" x-cloak>

     <div>
        {{ $slot }}
     </div>

    <div x-show="open" 
x-transition
         class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        
        <div @click.away="open = false" 
             class="bg-white w-full max-w-md rounded-md p-8 shadow-md border border-slate-100 relative overflow-hidden">
            
            <div class="absolute -top-6 -right-6 w-20 h-20 bg-red-50 rounded-full opacity-50"></div>

            <div class="relative">
                <div class="w-14 h-14 bg-red-100 text-red-600 rounded-xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-md! font-bold">warning</span>
                </div>

                <h3 class="text-2xl font-black text-slate-800 tracking-tight mb-2">Are you sure?</h3>
                <p class="text-slate-500 text-sm font-medium leading-relaxed">
                    You are about to delete <span class="text-red-600 font-black" ></span>. This action cannot be undone and all their data will be lost.
                </p>
      
                <div class="mt-10 flex gap-3">
                    <button @click="open = false" 
                            class="flex-1 py-4 bg-slate-100 text-slate-600 rounded-md font-black text-xs uppercase tracking-widest hover:bg-slate-200 transition-all">
                        Cancel
                    </button>
                    
                    <form action="{{ route('delete.user' , $id ) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <!-- @method('DELETE') -->
                        <button type="submit" 
                                class="w-full py-4 bg-red-600 text-white rounded-md font-black text-xs uppercase tracking-widest shadow-lg shadow-red-200 hover:bg-red-700 transition-all">
                            Yes, Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>