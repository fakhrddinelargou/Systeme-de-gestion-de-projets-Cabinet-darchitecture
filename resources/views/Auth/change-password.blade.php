<section class="container w-full min-h-screen flex items-center justify-center px-4 py-8">
    <section class="bg-white w-full max-w-md rounded-md border border-gray-200 shadow-xl px-6 md:px-10 py-10">

        <!-- Logo -->
        <div class="flex flex-col items-center text-center mb-8">
            <div class="flex items-center gap-3 mb-4">
                <img class="w-10 h-10" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                <h4 class="font-bold text-[#515151] tracking-wide">ARCHITRACK</h4>
            </div>

            <p class="font-semibold text-[26px] text-black">Set New Password</p>
            <p class="text-[14px] font-medium text-[#6B7280] mt-2">
                Enter your new password below
            </p>
        </div>

        <!-- Form -->
        <form class="w-full space-y-5" method="POST" action={{ route('update.password') }}>
            @csrf

            <!-- Hidden token -->
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <!-- Email -->
            <input type="hidden" name="email" value="{{ request()->email }}">

            <!-- New Password -->
            <div>
                <label class="block">
                    <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                        New Password
                    </p>
                </label>
                <input
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition">
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block">
                    <p class="text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                        Confirm Password
                    </p>
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="••••••••"
                    required
                    class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition">
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full h-12 rounded-lg bg-black hover:bg-[#1f1f1f] text-white text-[14px] font-semibold transition">
                Reset Password
            </button>

        </form>

        <!-- Footer -->
        <p class="mt-6 text-center text-[#6B7280] text-[14px]">
            Back to
            <a href="{{ route('login.page') }}" class="text-black font-semibold hover:underline">
                Login
            </a>
        </p>

    </section>
</section>