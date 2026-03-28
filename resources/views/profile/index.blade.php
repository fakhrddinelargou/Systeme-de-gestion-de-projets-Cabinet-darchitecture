<main class="w-full lg:h-screen h-auto ">
    @if ($errors->any())
        <div class="text-red-500 bg-[#ffeeee] p-3 mb-5 absolute top-4 left-1/2 -translate-x-1/2 rounded-xl ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class=" w-full h-auto  lg:px-15 px-5 pt-10 ">

        <div class="mb-5">
            <h2 class="text-4xl font-semibold text-gray-700">Profile</h2>
        </div>

        <!-- profile -->
        <section class=" flex items-start mb-5">

            <div class="rounded-full relative">
<x-update-image>
    <button @click="open = true" 
            type="button"
            class="flex items-center cursor-pointer justify-center absolute bottom-2 right-1 bg-white hover:bg-gray-100 duration-200 border border-gray-200 shadow-sm w-10 h-10 rounded-full">
        <span class="material-symbols-outlined text-gray-600">draw</span>
    </button>
</x-update-image>
                <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/gust.jpg') }}"
                    alt="profile" class="rounded-full  w-35 h-35  ">

            </div>



        </section>

        <!-- all -->
        <section class="flex lg:flex-row flex-col  items-center   gap-5 w-full h-auto">
            <!-- section 1 -->
            <section class="lg:w-[60%] w-full h-auto  flex flex-col items-center gap-5 ">
                <!-- email & fullname -->
                <div class="bg-white w-full rounded-xl border border-gray-200 shadow-xl p-4">
                    <h2 class="font-semibold text-gray-600 mb-5">Fullname & Email</h2>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="flex items-center gap-4 mb-5">

                            <input
                                class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                                name='email' id='email' type="email" placeholder='Jhon@gmail.com'
                                value="{{ auth()->user()->email }}">
                            <input
                                class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                                name='fullname' id='fullname' type="text" placeholder='Jhon Smith'
                                value="{{ auth()->user()->fullname }}">
                        </div>
                        <button type="submit" class="font-semibold text-gray-400 cursor-pointer ">Modife</button>

                    </form>
                </div>

                <!-- modify password -->
                <div class="bg-white w-full rounded-xl border border-gray-200 shadow-xl p-4">
                    <h2 class="font-semibold text-gray-600 mb-5">Modify Your Password</h2>

                    <form class="" action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input
                            class=" mb-5  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                            name='current_password' id='current_password' type="password" placeholder='••••••••'>
                        <div class="flex items-center gap-4 mb-5">

                            <input
                                class="  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                                name='password' id='password' type="password" placeholder='••••••••'>
                            <input
                                class="text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                                name='password_confirmation' id='password_confirmation' type="password"
                                placeholder='••••••••'>
                        </div>
                        <button type="submit" class="font-semibold text-gray-400 cursor-pointer">Modife</button>
                    </form>
                </div>
            </section>
            <!-- section 2 -->
            <section class="w-[40%]">
<div class="bg-blue-600 rounded-4xl p-8 text-white shadow-xl">
    <h4 class="font-black text-lg mb-4">Security Status</h4>
    <div class="space-y-4">
        <div class="flex justify-between text-xs font-bold opacity-80 uppercase">
            <span>Password Strength</span>
            <span>Strong</span>
        </div>
        <div class="w-full bg-blue-400/30 h-1.5 rounded-full">
            <div class="bg-white h-full w-[85%] rounded-full shadow-[0_0_10px_white]"></div>
        </div>
        <p class="text-[10px] opacity-70 mt-2 italic">Last changed 2 months ago. We recommend changing it every 6 months.</p>
    </div>
    
    <button class="w-full mt-8 py-3 bg-white text-blue-600 rounded-xl font-black text-xs uppercase hover:bg-blue-50 transition-all">
        Enable 2FA
    </button>
</div>
            </section>
        </section>
    </section>
</main>