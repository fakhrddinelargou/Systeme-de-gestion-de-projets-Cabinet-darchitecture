import Echo from "laravel-echo";
import Pusher from "pusher-js";
import { addMessageToUi } from "./chat";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "reverb",
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? "https") === "https",
    enabledTransports: ["ws", "wss"],
});

let count = 0
window.Echo.private(`chat.${user_id}`).listen("MessageSent", (e) => {
        addMessageToUi(e);
        count++
        console.log(count);
        
    // showToast(e.title,e.sender,e.body,e.id)
});

window.Echo.private(`notification.${user_id}`).listen("DisplayNotification", (e) => {
    addNotification(e.notification);
});



