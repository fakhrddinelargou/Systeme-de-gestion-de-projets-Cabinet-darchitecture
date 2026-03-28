<div x-data="{ open: false }" x-cloak>

    <div>
        {{ $slot }}
    </div>

    <div x-show="open" x-transition
        class="w-full h-screen z-50 fixed flex items-center justify-center bg-black/40 left-0 top-0">

        <div @click.away="open = false"
            class="w-100 p-8 bg-white rounded-xl shadow-2xl flex flex-col items-center justify-center">

            <div class="mb-5">
                <img id="avatar-update" class="rounded-full w-24 h-24 object-cover border-2 border-gray-100 shadow-sm"
                    src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/gust.jpg') }}"
                    alt="avatar">
            </div>

            <form id="form-avatar" action="{{ route('profile.image') }}" method="POST" enctype="multipart/form-data"
                class="w-full">
                @csrf
                @method('PUT')

                <div class="flex items-center gap-3 w-full">
                    <label for="input_avatar"
                        class="flex-1 cursor-pointer bg-gray-100 text-gray-700 hover:bg-gray-200 transition-colors rounded-lg px-4 py-2 flex items-center justify-center gap-2 text-sm font-medium">
                        <span>edit</span>
                        <span class="material-symbols-outlined text-[18px]">edit</span>
                        <input onchange="updatePreview(this)" class="hidden" type="file" name="avatar"
                            id="input_avatar">
                    </label>

       
                </div>

                <button id="btn-update-avatar" type="submit"
                    class="w-full bg-black text-white hover:bg-gray-800 transition-all active:scale-95 flex items-center justify-center rounded-lg h-11 mt-4 text-[14px] font-bold shadow-md">
                    <span class="material-symbols-outlined mr-2 text-[20px]">upgrade</span>
                    Update Avatar
                </button>
            </form>
        </div>
    </div>
</div>
<script>

    const btnUpdateAvatar = document.getElementById('btn-update-avatar');
    const avatarUpdate = document.getElementById('avatar-update');
    const formAvatar = document.getElementById('form-avatar');


    function updatePreview(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            btnUpdateAvatar.disabled = false;
            btnUpdateAvatar.style.opacity = "1";
            btnUpdateAvatar.style.cursor = "pointer";
            reader.onload = function (e) {
                avatarUpdate.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    if (formAvatar) {
        formAvatar.addEventListener('submit', function (e) {
            console.log('Form is sending...');

            // Khlli l-upload i-bda 3ad bloqui
            setTimeout(() => {
                btnUpdateAvatar.disabled = true;
                btnUpdateAvatar.innerText = "Updating...";
                btnUpdateAvatar.style.opacity = "0.5";
                btnUpdateAvatar.style.cursor = "not-allowed";
            }, 1);
        });

        console.log('Event listener added!'); // Bach t-t2kd rah khddam
    }
</script>