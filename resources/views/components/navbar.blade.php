   <nav id="menu"
            class="w-full h-screen md:hidden bg-white border-b border-gray-200 fixed top-0  -right-200 duration-200 z-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">

                    <!-- Logo -->
                    <div class="flex items-center gap-3">
                        <img class="w-10 h-10" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                        <div>
                            <h1 class="text-lg font-semibold text-gray-900 leading-none">ARCHITRACK</h1>
                            <p class="text-sm text-gray-500 leading-none mt-1">Public Platform</p>
                        </div>
                    </div>

                    <!-- Desktop Links -->
                    <div class="hidden md:flex items-center gap-8">
                        <a href="#" class="text-sm font-medium text-gray-800 hover:text-black transition">Home</a>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-black transition">Features</a>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-black transition">About</a>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-black transition">Contact</a>
                    </div>

                    <!-- Desktop Actions -->
                    <div class="hidden md:flex items-center gap-3">
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-800 hover:text-black transition">
                            Sign in
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-5 py-2.5 rounded-xl bg-black text-white text-sm font-medium hover:bg-gray-900 transition">
                            Get Started
                        </a>
                    </div>

                    <!-- Mobile Button -->
                    <button id="closeMenu"
                        class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div class="md:hidden h-[90vh] border-t border-gray-200  py-4 space-y-4 flex flex-col">
                    <div class="flex flex-col space-y-3">
                        <a href="#" class="text-sm font-medium text-gray-800 hover:text-black transition">Home</a>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-black transition">Features</a>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-black transition">About</a>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-black transition">Contact</a>
                    </div>

                    <div class="pt-3 flex flex-col gap-3 mt-auto">
                        <a href="{{ route('login') }}"
                            class="w-full text-center px-4 py-2.5 rounded-md border border-gray-300 text-sm font-medium text-gray-800 hover:bg-gray-50 transition">
                            Sign in
                        </a>
                        <a href="{{ route('register') }}"
                            class="w-full text-center px-4 py-2.5 rounded-md bg-black text-white text-sm font-medium hover:bg-gray-900 transition">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </nav>