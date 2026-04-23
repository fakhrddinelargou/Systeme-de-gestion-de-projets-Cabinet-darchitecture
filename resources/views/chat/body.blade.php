<div
    class="{{ request()->is('chat/open/*') ? 'fixed inset-0 z-50  bg-[#FDFDFD] flex md:static md:z-auto' : 'hidden md:flex' }} md:relative flex-1 flex-col bg-[#FDFDFD]">

    <div class="px-4 md:px-6 py-3 bg-white border-b border-slate-100 flex items-center justify-between shrink-0">
        <div class="flex items-center gap-3 min-w-0">
            <a href="{{ route('chat') }}" class="md:hidden flex items-center shrink-0">
                <span class="material-symbols-outlined text-[18px] text-slate-800">arrow_left_alt</span>
            </a>

            <h3 class="font-bold text-slate-800 flex items-center gap-2 truncate">
                <span class="truncate">{{ $chat['receiver'] }}</span>
            </h3>
        </div>

        <div class="flex gap-2 shrink-0">
            <button class="p-2 text-slate-400 hover:text-gray-600 hover:bg-blue-50 rounded-lg transition-all">
                <i class="fa-solid fa-phone text-sm"></i>
            </button>
            <button class="p-2 text-slate-400 hover:text-gray-600 hover:bg-blue-50 rounded-lg transition-all">
                <i class="fa-solid fa-ellipsis-vertical text-sm"></i>
            </button>
        </div>
    </div>

    <div id="chatBody"
        class="flex-1 min-h-0 lg:max-h-[69vh] overflow-y-auto p-4 md:p-8 space-y-4 md:space-y-6 flex flex-col custom-scrollbar">
    </div>

    <div class="p-3 md:p-6 bg-white border-t border-slate-100 shrink-0">
        <div
            class="flex items-center gap-2 md:gap-4 bg-slate-50 border border-slate-200 rounded-2xl p-2 px-3 md:px-4 focus-within:ring-2 focus-within:ring-blue-500/10 focus-within:border-gray-400 transition-all">
            <button type="button" class="text-slate-400 hover:text-gray-600 shrink-0">
                <i class="fa-solid fa-paperclip"></i>
            </button>

            <input id="content" type="text" name="content" placeholder="Write your message here..."
                class="flex-1 min-w-0 bg-transparent border-none outline-none text-sm py-2 text-slate-700">

            <button id="btnSendMessage" type="button" 
                disabled
                class="bg-gray-600 opacity-80 disabled:opacity-50 disabled:cursor-not-allowed text-white w-10 h-10 rounded-xl flex items-center justify-center hover:bg-gray-700 shadow-lg shadow-gray-200 transition-all shrink-0">
                <span class="material-symbols-outlined text-[18px]">send</span>
            </button>
        </div>
    </div>
</div>

<script>
    const contact = @js($chat['messages']);
    const user_id = @js(auth()->id());
    const receiver_fullname = @js($chat['receiver']);
    const receiver_id = @js($chat['receiver_id']);
</script>