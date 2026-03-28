<div data-openU id="user_container" class="w-full overflow-hidden  duration-300 h-auto  relative ">

    <button onclick="toggleMenu()"
        class="text-sm w-full  cursor-pointer flex px-2  py-2  items-center justify-between gap-2 font-semibold hover:bg-gray-200/30 duration-200 {{ request()->is('*Settings') ? 'text-gray-700 border-l-3 border-gray-700 bg-gray-300/20' : 'text-gray-500'   }}">
        <div class="flex items-center gap-2">

            <span class="material-symbols-outlined text-[18px]!" data-icon="tune">tune</span>
            Settings
        </div>

        <span class="material-symbols-outlined text-[18px]!" data-icon="Keyboard_Arrow_Down">Keyboard_Arrow_Down
        </span>
    </button>
    <div id="myMenu" class="accordion-wrapper">
        <div class="accordion-content pl-5">

            <a href="{{ route('users') }}"
                class="text-sm flex px-2  py-2  items-center gap-2 font-semibold hover:bg-gray-200/30 duration-200 {{ request()->is('*users') ? 'text-gray-700 border-l-3 border-gray-700 bg-gray-300/20' : 'text-gray-500'   }}">
                <span class="material-symbols-outlined text-[18px]!" data-icon="groups">groups</span>
                Users
            </a>
        </div>
    </div>
</div>