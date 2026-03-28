    <section class='flex w-full h-auto min-h-screen'>
        <!-- Image -->
<section class='relative lg:block hidden w-full md:max-w-[40%] min-h-screen'>
    <img 
        class="w-full h-full absolute top-0 left-0 object-cover object-center shadow-lg" 
        src="{{ asset('assets/images/image-login.jpg') }}" 
        alt="office"
    >
    <div class="absolute left-5 top-5  text-white">
        <span class="text-2xl font-semibold">ARCHITRACK –</span>
        <p class="text-xl w-80">Project Management
for Architecture</p>
<div class="bg-white w-20 h-1 mt-2"></div>
    </div>
</section>


        <!-- Content -->
        <section
            class=" lg:max-w-[60%] bg-[#F3F4F6] w-full h-auto min-h-screen   py-4  px-4 flex flex-col items-center justify-center ">
            <section
                class="bg-white  flex flex-col items-center h-auto lg:w-md w-full rounded-md border border-gray-100 shadow-md/5 px-10 py-16">

                <div class='flex items-center gap-2 mb-5  '>
                    <img class='w-10 h-10' src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    <h4 class='font-bold text-[#515151] '>ARCHITRACK</h4>
                </div>
                <p class="font-semibold text-[24px]">Welcome Back</p>
                <p class="text-[14px] font-meduim text-[#6B7280] mb-8">Sign in to manage your projects</p>
                <form class='w-full' action="{{ route('login') }}" method='POST'>
                    @csrf
                    <div class="  mb-6">
                        <label for="email">
                            <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">EMAIL ADDRESS</p>
                        </label>
                        <input
                            class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                            name='email' id='email' type="email" placeholder='Jhon@gmail.com'>
                    </div>
                    <div class="mb-6">

                        <label for="password">
                            <div class="flex items-center justify-between">
                                <p class=" text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">PASSWORD</p>
                                <a href="/" class="font-semibold text-[#6B7280] text-[12px] hover:underline ">Forget
                                    password?</a>
                            </div>
                        </label>
                        <input
                            class="mt-2  text-[14px] w-full px-4 py-3 rounded-md  outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2  border border-gray-100 duration-100"
                            name='password' id='password' type="password" placeholder="••••••••">
                    </div>
                    <div class="flex items-center gap-2 mb-6 cursor-pointer ">
                        <input class="w-4 h-4 " type="checkbox" name='checkbox' id='checkbox'>
                        <label class="text-[#4B5563] text-[14px] font-meduim" for="checkbox">Remember me</label>
                    </div>
                    <button type="submit"
                        class="rounded-md  hover:bg-[#212529] duration-200 cursor-pointer h-12 bg-black w-full text-[14px] text-white font-semibold">Login</button>
                </form>
            
                <p class="mt-10 text-[#6B7280] text-[14px] font-meduim">Don't have an account? <a
                        class="text-black font-semibold" href="{{ route('register') }}">Register</a></p>
            </section>
            <p class="mt-8 tracking-[2px] text-[10px] text-[#9CA3AF] font-bold">2026 ARCHITRACK SYSTEMS INC</p>
        </section>

    </section>