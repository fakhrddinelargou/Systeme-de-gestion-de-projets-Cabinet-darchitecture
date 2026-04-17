      <footer class="w-full bg-white border-t border-gray-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

                    <!-- Brand -->
                    <div class="lg:col-span-2">
                        <div class="flex items-center gap-3 mb-4">
                            <!-- Logo -->
                            <div class="flex items-center gap-3">
                                <img class="w-10 h-10" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                                <div>
                                    <h1 class="text-lg font-semibold text-gray-900 leading-none">ARCHITRACK</h1>
                                    <p class="text-sm text-gray-500 leading-none mt-1">Project Management Platform</p>
                                </div>
                            </div>

                        </div>

                        <p class="text-sm text-gray-600 max-w-md leading-6">
                            A clean and structured platform built to help teams manage projects, follow progress, and
                            work more efficiently.
                        </p>
                    </div>

                    <!-- Links -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4">Navigation</h4>
                        <div class="space-y-3">
                            <a href="{{ route('home') }}" class="block text-sm text-gray-600 hover:text-black transition">Home</a>
                            <a href="{{ route('features') }}"
                                class="block text-sm text-gray-600 hover:text-black transition">Features</a>
                            <a href="{{ route('about') }}" class="block text-sm text-gray-600 hover:text-black transition">About</a>
                            <a href="{{ route('contact') }}" class="block text-sm text-gray-600 hover:text-black transition">Contact</a>
                        </div>
                    </div>

                    <!-- Legal -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4">Legal</h4>
                        <div class="space-y-3">
                            <a href="{{ route('privacy') }}" class="block text-sm text-gray-600 hover:text-black transition">Privacy
                                Policy</a>
                            <a href="{{ route('terms') }}" class="block text-sm text-gray-600 hover:text-black transition">Terms of
                                Service</a>
                            <a href="{{ route('support') }}" class="block text-sm text-gray-600 hover:text-black transition">Support</a>
                        </div>
                    </div>

                </div>

                <!-- Bottom -->
                <div
                    class="mt-10 pt-6 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-sm text-gray-500">
                        © 2026 Architrack. All rights reserved.
                    </p>

                    <div class="flex items-center gap-4">
                        <a href="#" class="text-sm text-gray-500 hover:text-black transition">LinkedIn</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-black transition">Twitter</a>
                        <a href="#" class="text-sm text-gray-500 hover:text-black transition">Email</a>
                    </div>
                </div>

            </div>
        </footer>