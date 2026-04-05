<div id="edit-user-modal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center z-110 ">
    <div class="bg-white w-full max-w-sm rounded-md shadow-2xl p-0 overflow-hidden border border-slate-100">
        
        <div class="bg-slate-50 px-8 py-10 flex flex-col items-center border-b border-slate-100">
            <div class="relative mb-4">
                <img id="view-avatar" class="w-24 h-24 rounded-xl object-cover border-4 border-white shadow-md" src="" alt="Avatar">
                <div id="view-status-icon" class="absolute -top-1 -right-1 w-5 h-5 border-4 border-white rounded-full"></div>
            </div>
            
            <h3 id="view-fullname" class="text-lg font-black text-slate-800 mb-1">fakhreddine</h3>
            <p id="view-email" class="text-xs text-slate-400 font-bold tracking-tight">fakhrddine@gmail.com</p>
            
            <div id="view-status-badge" class="mt-4 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest"></div>
        </div>

        <div id="update-role-form" class="p-8 space-y-6" >
            
            <div>
                <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-3 block ml-1">Change User Role</label>
                <div class="relative">
                    <select id="edit-role" class="w-full px-4 py-3 bg-slate-50 border border-slate-100 rounded-md text-sm font-bold text-slate-700 appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500/20 transition-all cursor-pointer">
                        <option value="client">Client</option>
                        <option value="architecte">Architecte</option>
                    </select>
                    <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                </div>
            </div>

            <div class="flex gap-3">
                <button type="button" onclick="closeEditModal()" class="flex-1 px-6 py-3 border border-slate-100 rounded-md text-sm font-bold text-slate-400 hover:bg-slate-50 transition-all">Close</button>
                <button type="button" onclick="submitRole()" class="flex-1 px-6 py-3 bg-slate-800 text-white rounded-md text-sm font-bold hover:bg-slate-900 shadow-lg shadow-slate-200 transition-all">Update Role</button>
            </div>
        </div>
    </div>
</div>

