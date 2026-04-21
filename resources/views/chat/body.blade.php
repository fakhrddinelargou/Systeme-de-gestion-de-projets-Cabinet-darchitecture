<div class="hidden md:flex flex-1 flex-col bg-[#FDFDFD]">
    <div class="px-6 py-3 bg-white border-b border-slate-100 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <h3 class="font-bold text-slate-800">{{ $chat['receiver'] }}</h3>
            <!-- <span
                class="bg-green-100 text-green-600 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase tracking-wider">Active
                Project</span> -->
        </div>
        <div class="flex gap-2">
            <button class="p-2 text-slate-400 hover:text-gray-600 hover:bg-blue-50 rounded-lg transition-all"><i
                    class="fa-solid fa-phone text-sm"></i></button>
            <button class="p-2 text-slate-400 hover:text-gray-600 hover:bg-blue-50 rounded-lg transition-all"><i
                    class="fa-solid fa-ellipsis-vertical text-sm"></i></button>
        </div>
    </div>

    <div id="chatBody" class="flex-1 max-h-[69vh] overflow-y-auto p-8 space-y-6 flex flex-col ">

    </div>

    <div class="p-6 bg-white border-t border-slate-100">
        <div
            class="flex items-center gap-4 bg-slate-50 border border-slate-200 rounded-2xl p-2 px-4 focus-within:ring-2 focus-within:ring-blue-500/10 focus-within:border-gray-400 transition-all">
            <button class="text-slate-400 hover:text-gray-600"><i class="fa-solid fa-paperclip"></i></button>
            <input id="content" type="text" name="content" placeholder="Write your message here..."
                class="flex-1 bg-transparent border-none outline-none text-sm py-2 text-slate-700">
            <button id="btnSendMessage" onclick="sendMessage(document.getElementById('content').value)" disabled="true"
                class="bg-gray-600 opacity-[.8] cursor-pointer text-white w-10 h-10 rounded-xl flex items-center justify-center hover:bg-grab=y-700 shadow-lg shadow-gray-200 transition-all">
                <span class="material-symbols-outlined text-[18px]!">send</span>

            </button>
        </div>
    </div>
</div>

<!-- @vite(["resources/js/app.js"]) -->
<!-- @vite('resources/js/echo.js') -->


<script>

    const chatBody = document.getElementById('chatBody');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const btnSendMessage = document.getElementById('btnSendMessage');
    const contentI = document.getElementById('content');
    const contact = @js($chat['messages']);
    const receiver_fullname = @js($chat['receiver']);
    const user_id = @js(auth()->id());
    const receiver_id = @js($chat['receiver_id']);
    displayChat();
scrollToBottom()

    function scrollToBottom() {
    chatBody.scrollTop = chatBody.scrollHeight;
}
    contentI.addEventListener('input', (e) => {
        let input = e.target.value;

        if (input.length !== 0) {
            btnSendMessage.disabled = false;
            btnSendMessage.style.opacity = 1;
            return;
        }

        btnSendMessage.disabled = true;
        btnSendMessage.style.opacity = 0.8;

    })

    async function sendMessage(content) {

        if (content.trim().length === 0) return;

        const url = '/send-message';
        const options = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                receiver_id: receiver_id,
                body: content
            })
        };

        try {
            const response = await fetch(url, options);

            if (!response.ok) throw new Error('Error f l-envoi');

            const data = await response.json();
            addMessageToUi(data)
            contentI.value = '';

        } catch (error) {
            console.error('Moshkil:', error);
        }
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
            chatBody.innerHTML += `
                            <div class="flex items-end gap-3 max-w-[75%] ${el.sender_id == user_id ? 'ml-auto' : ''}">
                    <div
                    class=" p-4 rounded-2xl rounded-bl-none ${el.sender_id == user_id ? ' rounded-br-none rounded-bl-2xl! bg-gray-600 font-light shadow-blue-100  text-white' : ' rounded-bl-none  rounded-br-2xl! bg-white border border-slate-100'} shadow-sm text-sm text-slate-600 leading-relaxed">
                    ${el.body}
                    <span class="block text-[10px] text-slate-300 mt-2 ${el.sender_id == user_id ? 'text-end' : ''}">${editTime(el.created_at)}</span>
                    </div>
                    </div>
                    
                    `
        });

    }


    function addMessageToUi(el){
                    chatBody.innerHTML += `
                                       <div class="flex items-end gap-3 max-w-[75%] ${el.sender_id == user_id ? 'ml-auto' : ''}">
                    <div
                    class=" p-4 rounded-2xl rounded-bl-none ${el.sender_id == user_id ? ' rounded-br-none rounded-bl-2xl! bg-gray-600 font-light shadow-blue-100  text-white' : ' rounded-bl-none  rounded-br-2xl! bg-white border border-slate-100'} shadow-sm text-sm text-slate-600 leading-relaxed">
                    ${el.body}
                    <span class="block text-[10px] text-slate-300 mt-2 ${el.sender_id == user_id ? 'text-end' : ''}">${editTime(el.created_at)}</span>
                    </div>
                    </div>
            `;
scrollToBottom()

    }
    function editTime(time) {
        const date = new Date(time);

        const formattedTime = date.toLocaleTimeString('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        });

        return formattedTime
    }


</script>