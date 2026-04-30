import Echo from "laravel-echo";
import Pusher from "pusher-js";

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


if (!window.chatListenerStarted) {
    window.chatListenerStarted = true;

    window.Echo.private(`chat.${user_id}`)
        .stopListening("MessageSent")
        .listen("MessageSent", (e) => {
            const message = e.message ?? e;

            if (message.sender_id == user_id) return;

            if (typeof window.addMessageToUi === 'function') {
                window.addMessageToUi(message);
            }

            if (typeof window.showToast === 'function') {
                window.showToast(
                    'Nouveau message',
                    message.sender ?? 'Utilisateur',
                    message.body ?? '',
                    message.id
                );
            }
        });
}
window.Echo.private(`notification.${user_id}`).listen("DisplayNotification", (e) => {
    addNotification(e.notification);
});



