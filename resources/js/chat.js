
    
//     const chatBody = document.getElementById('chatBody');
//     const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
//     const btnSendMessage = document.getElementById('btnSendMessage');
//     const contentI = document.getElementById('content');

//  if (chatBody) {
//     displayChat();
//     scrollToBottom();


//     function scrollToBottom() {
//         chatBody.scrollTop = chatBody.scrollHeight;
//     }

//     contentI.addEventListener('input', (e) => {
//         let input = e.target.value.trim();

//         if (input.length !== 0) {
//             btnSendMessage.disabled = false;
//             return;
//         }

//         btnSendMessage.disabled = true;
//     });

//     btnSendMessage.addEventListener('click', ()=>{
//         sendMessage(contentI.value);
//     })

//     async function sendMessage(content) {
//         console.log('hi');
        
//         if (content.trim().length === 0) return;

//         const url = '/send-message';
//         const options = {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-Requested-With': 'XMLHttpRequest',
//                 'X-CSRF-TOKEN': csrfToken,
//             },
//             body: JSON.stringify({
//                 receiver_id: receiver_id,
//                 body: content
//             })
//         };

//         try {
//             btnSendMessage.disabled = true;

//             const response = await fetch(url, options);

//             if (!response.ok) throw new Error('Error in sending');

//             const data = await response.json();
//             contentI.value = '';
//             btnSendMessage.disabled = true;
//             scrollToBottom();

//         } catch (error) {
//             console.error('Error :', error);
//             btnSendMessage.disabled = false;
//         }
//     }

//     function messageTemplate(el) {
//         return `
//             <div class="flex items-end gap-2 md:gap-3 max-w-[85%] md:max-w-[75%] ${el.sender_id == user_id ? 'ml-auto' : ''}">
//                 <div class="p-3 md:p-4 rounded-2xl wrap-break-words ${el.sender_id == user_id ? 'rounded-br-none bg-gray-600 text-white' : 'rounded-bl-none bg-white border border-slate-100 text-slate-600'} shadow-sm text-sm leading-relaxed">
//                     ${el.body}
//                     <span class="block text-[10px] mt-2 ${el.sender_id == user_id ? 'text-end text-slate-200' : 'text-slate-300'}">
//                         ${editTime(el.created_at)}
//                     </span>
//                 </div>
//             </div>
//         `;
//     }

//     function displayChat() {
//         chatBody.innerHTML = '';

//         if (contact.length == 0) {
//             chatBody.innerHTML = `
//                 <div class="flex flex-col items-center justify-center h-full text-center p-8">
//                     <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
//                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-300">
//                             <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a.598.598 0 0 1-.735-.77l1.174-3.69A8.211 8.211 0 0 1 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
//                         </svg>
//                     </div>

//                     <h3 class="text-lg font-semibold text-slate-600">No messages yet</h3>
//                     <p class="text-sm text-slate-400 max-w-62.5 mt-1">
//                         Start a conversation with <span class="font-medium text-slate-500">${receiver_fullname}</span> to discuss the project details.
//                     </p>
//                 </div>
//             `;
//             return;
//         }

//         contact.forEach(el => {
//             chatBody.innerHTML += messageTemplate(el);
//         });
//     }

// window.addMessageToUi = function (el) {
//     chatBody.innerHTML += messageTemplate(el);
//     scrollToBottom();
// }
//     function editTime(time) {
//         const date = new Date(time);
//         const formattedTime = date.toLocaleTimeString('en-US', {
//             hour: '2-digit',
//             minute: '2-digit',
//             hour12: true
//         });

//         return formattedTime;
//     }

//     console.log('la');
//     }