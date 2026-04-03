
<div x-data="{ open: false}" x-cloak>

    <div>
        {{ $slot }}
    </div>

    <div x-show="open" x-transition
        class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center p-4">

        <div @click.away="open = false"
            class="bg-white w-full max-w-md rounded-md p-8 shadow-md border border-slate-100 relative overflow-hidden">

        <p class="font-semibold text-[24px] mb-5">Add New Worker</p>

        <form class='w-full' action="{{ route('store.user') }}" method='POST' >
            @csrf


            <!-- fullname & email -->
            <div class=" ">
                <div class="mb-6 w-full">
                    <label for="fullname">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">FULLNAME</p>
                    </label>
                    <input
                        class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                        name='fullname' required id='fullname' type="text" placeholder='Jhon Smith' >
                </div>
                <div class="mb-6 w-full">
                    <label for="email">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">EMAIL ADDRESS</p>
                    </label>
                    <input
                        class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                        name='email' required id='email' type="email" placeholder='Jhon@gmail.com' autocomplete="new-email">
                </div>
            </div>
            <!-- password & confirmation -->
            <div class="lg:flex lg:gap-4">

                <div class="mb-6 w-full">

                    <label for="password">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">PASSWORD</p>
                    </label>
                    <input
                        class="mt-2  text-[14px] w-full px-4 py-3 rounded-md  outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2  border border-gray-100 duration-100"
                        name='password' required id='password' type="password" placeholder="••••••••" autocomplete="new-password">
                </div>
                <div class="mb-6 w-full">
                    <label for="password_confirmation">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">CONFIRME PASSWORD</p>
                    </label>
                    <input
                        class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                        name='password_confirmation' id='password_confirmation' type="password" placeholder='••••••••' autocomplete="confirme-password">
                </div>
            </div>
               <div class="mt-10 flex gap-3">
                    <button @click="open = false" 
                            class="flex-1 py-4 bg-slate-100 text-slate-600 rounded-md font-black text-xs uppercase tracking-widest hover:bg-slate-200 transition-all">
                        Cancel
                    </button>
                    
                        <button type="submit" 
                                class="flex-1 rounded-md cursor-pointer h-12 bg-black hover:bg-[#212529] duration-200  text-[14px] text-white font-semibold">
                            Add
                        </button>
                        </div>
        </form>
        </div>
    </div>
</div>