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

            <input id="content" type="text" name="content"     autocomplete="off" autocorrect="off" spellcheck="false" placeholder="Write your message here..."
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
    
    
    
    const chatBody = document.getElementById('chatBody');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const btnSendMessage = document.getElementById('btnSendMessage');
    const contentI = document.getElementById('content');

 if (chatBody) {
    displayChat();
    scrollToBottom();


    function scrollToBottom() {
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    contentI.addEventListener('input', (e) => {
        let input = e.target.value.trim();

        if (input.length !== 0) {
            btnSendMessage.disabled = false;
            return;
        }

        btnSendMessage.disabled = true;
    });

    btnSendMessage.addEventListener('click', ()=>{
        sendMessage(contentI.value);
    })

  
    function messageTemplate(el) {
        return `
            <div class="flex items-end gap-2 md:gap-3 max-w-[85%] md:max-w-[75%] ${el.sender_id == user_id ? 'ml-auto' : ''}">
                <div class="p-3 md:p-4 rounded-2xl wrap-break-words ${el.sender_id == user_id ? 'rounded-br-none bg-gray-600 text-white' : 'rounded-bl-none bg-white border border-slate-100 text-slate-600'} shadow-sm text-sm leading-relaxed">
                    ${el.body}
                    <span class="block text-[10px] mt-2 ${el.sender_id == user_id ? 'text-end text-slate-200' : 'text-slate-300'}">
                        ${editTime(el.created_at)}
                    </span>
                </div>
            </div>
        `;
    }

    

    function displayChat() {
        chatBody.innerHTML = '';

        if (contact.length == 0) {
            chatBody.innerHTML = `
                <div class="flex flex-col items-center justify-center h-full text-center p-8">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-300">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a.598.598 0 0 1-.735-.77l1.174-3.69A8.211 8.211 0 0 1 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                        </svg>
                    </div>

                    <h3 class="text-lg font-semibold text-slate-600">No messages yet</h3>
                    <p class="text-sm text-slate-400 max-w-62.5 mt-1">
                        Start a conversation with <span class="font-medium text-slate-500">${receiver_fullname}</span> to discuss the project details.
                    </p>
                </div>
            `;
            return;
        }

        contact.forEach(el => {
            chatBody.innerHTML += messageTemplate(el);
        });
    }

    async function sendMessage(content) {
    if (content.trim().length === 0) return;

    const url = '/send-message';

    try {
        btnSendMessage.disabled = true;

        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                receiver_id: receiver_id,
                body: content
            })
        });

        const text = await response.text();
        console.log(text);

        if (!response.ok) {
            throw new Error(text);
        }

        const data = JSON.parse(text);
        const message = data.message ?? data;  
        contentI.value = '';
        btnSendMessage.disabled = true;

        window.addMessageToUi(message); 

    } catch (error) {
        console.error('Error:', error);
        btnSendMessage.disabled = false;
    }
}

window.addMessageToUi = function (el) {
    chatBody.innerHTML += messageTemplate(el);
    scrollToBottom();
}
    function editTime(time) {
        const date = new Date(time);
        const formattedTime = date.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        });

        return formattedTime;
    }

    console.log('la');
    }
</script>
