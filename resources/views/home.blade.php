<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @vite('resources/js/sidbar.js')
    <style>
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
    <title>Home</title>
</head>

<body>
    <header>

        <!-- navbar mobile -->
     <x-navbar />
        <!-- navbar -->
        <nav class="w-full fixed top-0 left-0 bg-white border-b border-gray-200">
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

                    <!-- Links -->
                    <div class="hidden md:flex items-center gap-8">
                        <a href="#" class="text-sm font-medium text-gray-800 hover:text-black transition">Home</a>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-black transition">Features</a>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-black transition">About</a>
                        <a href="#" class="text-sm font-medium text-gray-700 hover:text-black transition">Contact</a>
                    </div>

                    <!-- Actions -->
                    <div class="hidden md:flex items-center gap-3 ">
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-800 hover:text-black transition">
                            Sign in
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-5 py-2.5 rounded-md  hover:bg-[#212529] duration-200 cursor-pointer text-center bg-black  text-[14px] text-white font-semibold">
                            Get Started
                        </a>
                    </div>

                    <!-- Mobile button -->
                    <button id="btnMenu"
                        class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg border border-gray-200 text-gray-800 hover:bg-gray-50 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                </div>
            </div>
        </nav>
        <section class="w-full bg-white py-20 mt-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center ">

                    <div>

                        <!-- Badge -->
                        <span
                            class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                            Simple • Professional • Secure
                        </span>

                        <!-- Title -->
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                            Manage your work with clarity and structure
                        </h1>

                        <!-- Description -->
                        <p class="text-lg text-gray-600 mb-8 max-w-xl">
                            A simple platform to organize your projects, track progress, and collaborate with your team
                            in a clean and efficient way.
                        </p>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#"
                                class="px-6 py-3 rounded-md bg-black text-white text-sm font-medium hover:bg-gray-900 transition text-center">
                                Explore Platform
                            </a>
                            <a href="#"
                                class="px-6 py-3 rounded-md border border-gray-300 text-sm font-medium text-gray-800 hover:bg-gray-50 transition text-center">
                                Learn More
                            </a>
                        </div>

                    </div>

                    <div class="md:ml-auto md:block hidden  ">
                        <img class="w-100" src="{{ asset('assets/images/hero-image.jpg') }}" alt="hero image">
                    </div>

                </div>
            </div>
        </section>
    </header>
    <main>
        <section class="w-full bg-gray-50 border-y border-gray-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-8">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-gray-900">120+</p>
                        <p class="text-sm text-gray-600 mt-1">Projects managed</p>
                    </div>

                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-gray-900">35+</p>
                        <p class="text-sm text-gray-600 mt-1">Active users</p>
                    </div>

                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-gray-900">98%</p>
                        <p class="text-sm text-gray-600 mt-1">Task visibility</p>
                    </div>

                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-gray-900">24/7</p>
                        <p class="text-sm text-gray-600 mt-1">Platform access</p>
                    </div>

                </div>
            </div>
        </section>

        <section class="w-full bg-white py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <!-- Section Header -->
                <div class="max-w-2xl mb-12">
                    <span
                        class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                        Features
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        Everything you need to manage work more clearly
                    </h2>
                    <p class="text-lg text-gray-600">
                        A simple and structured platform designed to help teams organize projects, follow progress, and
                        collaborate efficiently.
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            01
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Project Management</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Organize your projects in a structured workspace with better visibility and control.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            02
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Task Tracking</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Track tasks, monitor progress, and keep work moving with more clarity.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            03
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Team Collaboration</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Help teams stay aligned, connected, and informed inside one shared platform.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            04
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Document Access</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Centralize important files and information to make access easier and faster.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            05
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Role-based Access</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Control visibility and actions with a clear and secure access structure.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            06
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Clean Interface</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Enjoy a minimal and intuitive experience designed for focus and simplicity.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section class="w-full bg-gray-50 py-20 border-y border-gray-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <!-- Header -->
                <div class="max-w-2xl mb-12">
                    <span
                        class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-full mb-4">
                        How it works
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        A simple workflow from start to finish
                    </h2>
                    <p class="text-lg text-gray-600">
                        Discover how the platform helps you structure work, track activity, and improve visibility.
                    </p>
                </div>

                <!-- Steps -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div class="bg-white border border-gray-200 rounded-2xl p-8">
                        <div
                            class="w-12 h-12 rounded-full bg-black text-white flex items-center justify-center text-sm font-semibold mb-6">
                            01
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Create your workspace</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Set up a structured environment where projects, tasks, and users can be organized clearly.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-8">
                        <div
                            class="w-12 h-12 rounded-full bg-black text-white flex items-center justify-center text-sm font-semibold mb-6">
                            02
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Manage projects and tasks</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Add projects, assign work, and track progress through a clean and easy-to-use interface.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-8">
                        <div
                            class="w-12 h-12 rounded-full bg-black text-white flex items-center justify-center text-sm font-semibold mb-6">
                            03
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Follow progress with clarity</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Get a better overview of work status, updates, and collaboration across the platform.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section class="w-full bg-white py-20">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <!-- Text Content -->
                    <div>
                        <span
                            class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                            Platform Preview
                        </span>

                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-5">
                            Built to make project work easier to understand
                        </h2>

                        <p class="text-lg text-gray-600 mb-8 max-w-xl">
                            The platform offers a clean interface where projects, tasks, and collaboration are easier to
                            follow and manage.
                        </p>

                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs mt-0.5">
                                    ✓</div>
                                <p class="text-sm text-gray-700">Simple navigation and clear workspace structure</p>
                            </div>

                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs mt-0.5">
                                    ✓</div>
                                <p class="text-sm text-gray-700">Organized access to projects, tasks, and information
                                </p>
                            </div>

                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs mt-0.5">
                                    ✓</div>
                                <p class="text-sm text-gray-700">Designed to improve visibility and collaboration</p>
                            </div>
                        </div>
                    </div>

                    <!-- Screenshot -->
                    <div class="relative">
                        <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-sm bg-gray-100">
                            <img src="{{ asset('assets/images/preview-img.png') }}" alt="App preview" class="w-full h-full object-cover" />
                        </div>

                        <div
                            class="hidden p-4 lg:block absolute -bottom-6 -left-6 w-18 h-18 rounded-2xl border border-gray-200 bg-gray-100">
                            <img class="" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="w-full bg-gray-50 py-20 border-y border-gray-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">

                <!-- Header -->
                <div class="max-w-2xl mb-12">
                    <span
                        class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-full mb-4">
                        Testimonials
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        What users say about the experience
                    </h2>
                    <p class="text-lg text-gray-600">
                        A simple interface, better organization, and more visibility for daily work.
                    </p>
                </div>

                <!-- Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <p class="text-sm text-gray-600 leading-6 mb-6">
                            “The platform helped us structure project work in a much clearer way. Everything feels
                            simpler and easier to follow.”
                        </p>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900">Sophie Martin</h3>
                            <p class="text-xs text-gray-500 mt-1">Project Coordinator</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <p class="text-sm text-gray-600 leading-6 mb-6">
                            “What I like most is the clean interface. It gives a better overview of tasks, projects, and
                            progress.”
                        </p>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900">Yassine El Amrani</h3>
                            <p class="text-xs text-gray-500 mt-1">Team Member</p>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <p class="text-sm text-gray-600 leading-6 mb-6">
                            “The workflow is very intuitive. It makes collaboration smoother and keeps everyone
                            aligned.”
                        </p>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900">Nadia Benali</h3>
                            <p class="text-xs text-gray-500 mt-1">Operations Lead</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="w-full bg-white py-20">
            <div class="max-w-4xl mx-auto px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center mb-12">
                    <span
                        class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                        FAQ
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                        Frequently asked questions
                    </h2>
                    <p class="text-lg text-gray-600">
                        Quick answers to help visitors understand the platform better.
                    </p>
                </div>

                <!-- FAQ List -->
                <div class="space-y-4">

                    <div class="border border-gray-200 rounded-2xl p-6 bg-white">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">What is this platform for?</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            It is designed to help users manage projects, organize tasks, and improve visibility across
                            their workflow.
                        </p>
                    </div>

                    <div class="border border-gray-200 rounded-2xl p-6 bg-white">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Who can use this platform?</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            The platform can be used by teams, organizations, and professionals who need a more
                            structured way to manage work.
                        </p>
                    </div>

                    <div class="border border-gray-200 rounded-2xl p-6 bg-white">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Is login required?</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Visitors can explore the public home page freely, while access to internal features may
                            require authentication.
                        </p>
                    </div>

                    <div class="border border-gray-200 rounded-2xl p-6 bg-white">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Can I track project progress?</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Yes, the platform is designed to give better visibility into projects, tasks, and work
                            progress.
                        </p>
                    </div>

                </div>
            </div>
        </section>

        <section class="w-full bg-black py-20">
            <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">

                <span class="inline-block px-3 py-1 text-xs font-medium text-gray-300 bg-white/10 rounded-full mb-4">
                    Get Started
                </span>

                <h2 class="text-3xl lg:text-5xl font-bold text-white mb-6">
                    Start managing your work with more clarity
                </h2>

                <p class="text-lg text-gray-300 max-w-2xl mx-auto mb-8">
                    Explore a platform designed to simplify project organization, improve visibility, and support better
                    collaboration.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#"
                        class="px-6 py-3 rounded-xl bg-white text-black text-sm font-medium hover:bg-gray-100 transition text-center">
                        Get Started
                    </a>
                    <a href="#"
                        class="px-6 py-3 rounded-xl border border-white/20 text-white text-sm font-medium hover:bg-white/5 transition text-center">
                        Contact Us
                    </a>
                </div>

            </div>
        </section>

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
                            <a href="#" class="block text-sm text-gray-600 hover:text-black transition">Home</a>
                            <a href="#" class="block text-sm text-gray-600 hover:text-black transition">Features</a>
                            <a href="#" class="block text-sm text-gray-600 hover:text-black transition">About</a>
                            <a href="#" class="block text-sm text-gray-600 hover:text-black transition">Contact</a>
                        </div>
                    </div>

                    <!-- Legal -->
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900 mb-4">Legal</h4>
                        <div class="space-y-3">
                            <a href="#" class="block text-sm text-gray-600 hover:text-black transition">Privacy
                                Policy</a>
                            <a href="#" class="block text-sm text-gray-600 hover:text-black transition">Terms of
                                Service</a>
                            <a href="#" class="block text-sm text-gray-600 hover:text-black transition">Support</a>
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
    </main>

    <script>
        const btnMenu = document.getElementById('btnMenu');
        const menu = document.getElementById('menu');
        const closeMenu = document.getElementById('closeMenu');
        btnMenu.addEventListener('click', () => {
            menu.style.right = '0px';
        });
        closeMenu.addEventListener('click', () => {
            menu.style.right = '-800px';
        })

    </script>

</body>

</html>