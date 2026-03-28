<style>
    /* From Uiverse.io by adilsarfraz02 */ 
.container {
  background-color: transparent;
  background-image: radial-gradient(#000000 1px, #f8f9fa 1px);
  background-size: 30px 30px;
}

</style>
<section class='container w-full h-auto md:h-screen flex items-center justify-center'>
    @if ($errors->any())
        <div
        class="text-red-500 bg-[#ffeeee] p-3 mb-5 absolute top-4 left-1/2 -translate-x-1/2 rounded-xl ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Content -->
        <section
            class="bg-white flex flex-col items-center h-auto w-full lg:w-[50%] md:w-[60%] md:rounded-md :md:border border-gray-100 md:shadow-md/5 px-5 py-10 ">

            <div class='flex items-center gap-2 mb-5'>
                <img class='w-10 h-10' src="{{ asset('assets/images/logo.png') }}" alt="logo">
                <h4 class='font-bold text-[#515151] '>ARCHITRACK</h4>
            </div>
            <p class="font-semibold text-[24px]">Create Your Account</p>
            <p class="text-[14px] font-meduim text-[#6B7280] mb-8">Sign in to manage your projects</p>
            <form class='w-full' action="{{ route('register') }}" method='POST' enctype="multipart/form-data">
                @csrf
                
                <div class="mb-6">
                    <label for="avatar_input" class="cursor-pointer block ">
                        <div
                        class="w-24 h-24  m-auto rounded-full border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden hover:border-gray-400 duration-200">
                            <img id="avatar" src="https://ui-avatars.com/api/?name=User&background=random" alt="Profile"
                            class="object-cover w-full h-full">
                        </div>
                    </label>
                    <input class="hidden" name="avatar" id="avatar_input" type="file" onchange="updatePreview(this)">
                </div>
                
                <!-- fullname & email -->
                <div class="lg:flex  lg:gap-4 ">
                <div class="mb-6 w-full">
                    <label for="fullname">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">FULLNAME</p>
                    </label>
                    <input
                    class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                    name='fullname' required id='fullname' type="text" placeholder='Jhon Smith'>
                </div>
                <div class="mb-6 w-full">
                    <label for="email">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">EMAIL ADDRESS</p>
                    </label>
                    <input
                    class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                    name='email' required id='email' type="email" placeholder='Jhon@gmail.com'>
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
                        name='password' required id='password' type="password" placeholder="••••••••">
                    </div>
                    <div class="mb-6 w-full">
                        <label for="password_confirmation">
                            <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.6px]">CONFIRME PASSWORD</p>
                        </label>
                        <input
                        class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                        name='password_confirmation' id='password_confirmation' type="password" placeholder='••••••••'>
                    </div>
                </div>
                <button type="submit"
                    class="rounded-md cursor-pointer h-12 bg-black hover:bg-[#212529] duration-200 w-full text-[14px] text-white font-semibold">Sing
                    Up</button>
            </form>
            <div class="w-full mt-12 flex items-center gap-4">
                <div class="h-px w-full bg-gray-300"></div>
                <div class="font-bold text-[#9CA3AF] text-[10px]">OR</div>
                <div class="h-px bg-gray-300 w-full "></div>
            </div>

            <p class="mt-4 text-[#6B7280] text-[14px] font-meduim">Don't have an account? <a
                    class="text-black  font-semibold" href="{{ route('login.page') }}">Login</a></p>
        </section>
</section>
<script>
    function updatePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('avatar').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>