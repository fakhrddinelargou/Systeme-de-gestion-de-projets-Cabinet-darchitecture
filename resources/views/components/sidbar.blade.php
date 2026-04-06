@vite('resources/js/sidbar.js')
@vite('resources/css/app.css')
<div id="btn" onclick="handleSidbar(this)"
    class="z-50 fixed left-5 top-5 duration-300 bg-white w-8 h-8 flex items-center justify-center rounded-full border border-gray-200  lg:hidden">
    <span class="material-symbols-outlined text-[20px]! " data-icon="menu">menu</span>

</div>
<aside data-open="false" id="sidbar"
    class=" flex flex-col w-[48%] lg:w-[18%] lg:left-0 lg:fixed h-screen fixed -left-120 bg-white duration-300 shadow-gray-200 shadow-xl z-50">
    <!-- Logo -->
    <div class="mb-5 flex items-center justify-center h-[10vh]">
        <div class='flex items-center justify-center gap-2'>
            <img class='w-6 h-6 lg:w-10 lg:h-10' src="{{ asset('assets/images/logo.png') }}" alt="logo">
            <h4 class='font-bold text-[#515151] text-sm lg:text-xl'>ARCHITRACK</h4>
        </div>
    </div>

    <!-- Button Navigation -->
    <div class="flex flex-col gap-2 py-2 px-4">
        <a href="{{ route(auth()->user()->role->name .'.dashboard') }}"
            class=" text-sm flex px-2  py-2  items-center gap-2 hover:bg-gray-200/30 duration-200 font-semibold {{ request()->is('*dashboard') || request()->is('*/') ? 'text-gray-700 border-l-3 border-gray-700 bg-gray-300/20' : 'text-gray-500'   }}">
            <span class="material-symbols-outlined text-[18px]! " data-icon="dashboard">dashboard</span>
            Dashboard
        </a>

        <a href="{{ route(auth()->user()->role->name . '.projects') }}"
            class="text-sm flex px-2  py-2  items-center gap-2 font-semibold hover:bg-gray-200/30 duration-200 {{ request()->is('*projects') ? 'text-gray-700 border-l-3 border-gray-700 bg-gray-300/20' : 'text-gray-500'   }}">
            <span class="material-symbols-outlined text-[18px]!" data-icon="architecture">architecture</span>
            Projects
        </a>
        <a href="/"
            class=" text-sm flex px-2  py-2  items-center gap-2 font-semibold hover:bg-gray-200/30 duration-200 {{ request()->is('*clients') ? 'text-gray-700 border-l-3 border-gray-700 bg-gray-300/20' : 'text-gray-500'   }}">
            <span class="material-symbols-outlined text-[18px]!" data-icon="app_badging">app_badging</span>
            Message
        </a>
        <a href="/"
            class=" text-sm flex px-2  py-2  items-center gap-2 font-semibold hover:bg-gray-200/30 duration-200 {{ request()->is('*clients') ? 'text-gray-700 border-l-3 border-gray-700 bg-gray-300/20' : 'text-gray-500'   }}">
            <span class="material-symbols-outlined text-[18px]!" data-icon="notifications">notifications</span>
            Notification
        </a>
        @if(auth()->user()->role->name == 'admin')
            @include('components.sidbar-navigation.admin')
        @endif


    </div>

    <!-- Profile -->
    <div class=" p-4 flex items-center justify-start border-t border-gray-200/40 h-[10vh]  mt-auto">

        <a href="{{ route('profile') }}"
            class="flex items-start w-full  hover:bg-gray-200/40 duration-300  gap-2 md:gap-4 rounded-xl p-2  overflow-hidden cursor-pointer ">
            <img class="w-8 h-8 md:w-10 md:h-10 rounded-xl"
                src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/gust.jpg') }}"
                alt="profile">
            <div class="flex flex-col">
                <p class="text-[12px] md:text-[14px]  font-semibold text-gray-700">{{ auth()->user()->fullname }}</p>
                <p class="text-[10px] md:text-[12px] font-semibold text-gray-500">{{ auth()->user()->role->name }}</p>
            </div>
        </a>
    </div>

</aside>

<script>


</script>