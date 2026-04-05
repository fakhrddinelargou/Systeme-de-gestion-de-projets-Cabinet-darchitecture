<style>
    .container {
        background-color: #e5e7eb;
        background-image: radial-gradient(#000000 0.8px, transparent 0.8px);
        background-size: 26px 26px;
    }
</style>

<section class="container w-full min-h-screen flex items-center justify-center px-4 py-8">
    <section
        class="bg-white w-full max-w-2xl rounded-2xl border border-gray-200 shadow-xl px-6 md:px-10 py-10">

        <!-- Logo -->
        <div class="flex flex-col items-center text-center mb-8">
            <div class="flex items-center gap-3 mb-4">
                <img class="w-10 h-10" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                <h4 class="font-bold text-[#515151] tracking-wide">ARCHITRACK</h4>
            </div>

            <p class="font-semibold text-[28px] text-black">Create Your Account</p>
            <p class="text-[14px] font-medium text-[#6B7280] mt-2">
                Create an account to manage your architecture projects
            </p>
        </div>

        <form class="w-full space-y-6" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Avatar -->
            <div class="flex justify-center">
                <label for="avatar_input" class="cursor-pointer group">
                    <div
                        class="relative w-24 h-24 rounded-full border border-gray-300 bg-gray-50 flex items-center justify-center overflow-hidden shadow-sm group-hover:border-gray-400 transition duration-200">
                        <img id="avatar"
                            src="https://ui-avatars.com/api/?name=User&background=f3f4f6&color=111827&size=128"
                            alt="Profile"
                            class="object-cover w-full h-full">
                    </div>
                    <p class="text-center text-[12px] font-medium text-[#9CA3AF] mt-3 tracking-[1.4px] uppercase">
                        Upload Avatar
                    </p>
                </label>
                <input class="hidden" name="avatar" id="avatar_input" type="file" onchange="updatePreview(this)">
            </div>

            <!-- fullname & email -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                <div>
                    <label for="fullname" class="block">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">Full Name</p>
                    </label>
                    <input
                        class="mt-2 text-[14px] w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white placeholder:text-gray-400 outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition duration-150"
                        name="fullname"
                        required
                        id="fullname"
                        type="text"
                        placeholder="Jhon Smith">
                </div>

                <div>
                    <label for="email" class="block">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">Email Address</p>
                    </label>
                    <input
                        class="mt-2 text-[14px] w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white placeholder:text-gray-400 outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition duration-150"
                        name="email"
                        required
                        id="email"
                        type="email"
                        placeholder="Jhon@gmail.com">
                </div>
            </div>

            <!-- password & confirmation -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                <div>
                    <label for="password" class="block">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">Password</p>
                    </label>
                    <input
                        class="mt-2 text-[14px] w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white placeholder:text-gray-400 outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition duration-150"
                        name="password"
                        required
                        id="password"
                        type="password"
                        placeholder="••••••••"
                        autocomplete="new-password">
                </div>

                <div>
                    <label for="password_confirmation" class="block">
                        <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">Confirm Password</p>
                    </label>
                    <input
                        class="mt-2 text-[14px] w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white placeholder:text-gray-400 outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition duration-150"
                        name="password_confirmation"
                        id="password_confirmation"
                        type="password"
                        placeholder="••••••••">
                </div>
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full h-12 rounded-lg bg-black hover:bg-[#1f1f1f] text-white text-[14px] font-semibold tracking-wide transition duration-200 shadow-md">
                Sign Up
            </button>
        </form>

        <!-- Divider -->
        <div class="w-full mt-10 flex items-center gap-4">
            <div class="h-px w-full bg-gray-300"></div>
            <div class="font-bold text-[#9CA3AF] text-[10px] tracking-[1.8px]">OR</div>
            <div class="h-px bg-gray-300 w-full"></div>
        </div>

        <!-- Footer -->
        <p class="mt-5 text-center text-[#6B7280] text-[14px] font-medium">
            Already have an account?
            <a class="text-black font-semibold hover:underline" href="{{ route('login.page') }}">
                Login
            </a>
        </p>
    </section>
</section>

<script>
    function updatePreview(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>