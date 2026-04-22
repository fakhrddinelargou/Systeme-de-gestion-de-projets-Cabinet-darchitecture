import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;




window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT,
    wssPort: import.meta.env.VITE_REVERB_PORT,
    forceTLS: import.meta.env.VITE_REVERB_SCHEME === 'https',
    enabledTransports: ['ws', 'wss'],
});

window.Echo.private(`chat.${user_id}`).listen("MessageSent", (e) => {
    addMessageToUi(e.message);
});

window.Echo.private(`notification.${user_id}`).listen("DisplayNotification", (e) => {
    addNotification(e.notification);
});

    // console.log('hello');

