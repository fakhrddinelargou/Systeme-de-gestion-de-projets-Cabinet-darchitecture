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
        html {
    scroll-behavior: smooth;
}
    </style>
    <title>Home</title>
</head>

<body>
    <header>

        <!-- navbar mobile -->
        <x-navbar />

        <section id="home" class="w-full bg-white py-20 mt-20">
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
                            Manage architectural projects from request to delivery
                        </h1>

                        <!-- Description -->
                        <p class="text-lg text-gray-600 mb-8 max-w-xl">
                            A platform designed for architecture firms to manage projects, track progress, and
                            coordinate between clients, workers, and management.
                        </p>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('register') }}"
                                class="px-6 py-3 rounded-md bg-black text-white text-sm font-medium hover:bg-gray-900 transition text-center">
                                Explore Platform
                            </a>
                            <a href="#status"
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
        <section id="status" class="w-full bg-gray-50 border-y border-gray-200">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-8">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $total_projects >= 100 ? '100' : $total_projects  }}+
                        </p>
                        <p class="text-sm text-gray-600 mt-1">Project progress tracking</p>
                    </div>

                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-gray-900">
                            {{ $users_active >= 100 ? '100' : $users_active  }}+
                        </p>
                        <p class="text-sm text-gray-600 mt-1">Active users</p>
                    </div>

                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-gray-900">98%</p>
                        <p class="text-sm text-gray-600 mt-1">Team efficiency</p>
                    </div>

                    <div class="text-center lg:text-left">
                        <p class="text-2xl font-bold text-gray-900">24/7</p>
                        <p class="text-sm text-gray-600 mt-1">Platform access</p>
                    </div>

                </div>
            </div>
        </section>

        <section id="features" class="w-full bg-white py-20">
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
                            Manage the full lifecycle of architectural projects from client request to final delivery.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            02
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Progress Tracking</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Track project phases, percentage completion, and status updates in real time.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            03
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Internal Messaging</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Communicate efficiently between clients, workers, and management داخل نفس النظام.

                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            04
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Project Validation</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Allow managers to validate or reject project requests before execution.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            05
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Role-based Access</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Different access levels for Client, Worker, and Boss
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-sm transition">
                        <div
                            class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-gray-900 font-semibold">
                            06
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Notifications System</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Receive real-time updates on project status, validation, and communication.
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
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Submit project request</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            The client submits a new project request with required details.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-8">
                        <div
                            class="w-12 h-12 rounded-full bg-black text-white flex items-center justify-center text-sm font-semibold mb-6">
                            02
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Validation by management</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            The boss reviews and validates or rejects the project.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-8">
                        <div
                            class="w-12 h-12 rounded-full bg-black text-white flex items-center justify-center text-sm font-semibold mb-6">
                            03
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Track project progress</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Workers update phases and progress while clients follow advancement.
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
                            The platform provides a structured view of projects, phases, progress, and communication
                            between stakeholders.
                        </p>

                        <div class="space-y-4">
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs mt-0.5">
                                    ✓</div>
                                <p class="text-sm text-gray-700">Clear project lifecycle from request to delivery </p>
                            </div>

                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs mt-0.5">
                                    ✓</div>
                                <p class="text-sm text-gray-700">Structured phases and progress tracking
                                </p>
                            </div>

                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs mt-0.5">
                                    ✓</div>
                                <p class="text-sm text-gray-700">Internal task management for workers and administrators
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Screenshot -->
                    <div class="relative">
                        <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-sm bg-gray-100">
                            <img src="{{ asset('assets/images/preview-img.png') }}" alt="App preview"
                                class="w-full h-full object-cover" />
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
                        What Clients say about the experience
                    </h2>
                    <p class="text-lg text-gray-600">
                        “The platform helps us manage architectural projects with better structure and visibility.” </p>
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
                        It is designed to help architecture firms manage projects, track phases, and coordinate between
                        stakeholders. </p>
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

                    <div class="border border-gray-200 rounded-2xl p-6 bg-white">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Are tasks visible to all users?</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            No, tasks are only accessible to administrators and workers to manage internal project
                            execution.
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
                    Start managing your architectural projects more efficiently 
                </h2>

                <p class="text-lg text-gray-300 max-w-2xl mx-auto mb-8">
                    Explore a platform designed to simplify project organization, improve visibility, and support better
                    collaboration.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 rounded-md bg-white text-black text-sm font-medium hover:bg-gray-100 transition text-center">
                        Get Started
                    </a>
                    <a href="{{ route('contact') }}"
                        class="px-6 py-3 rounded-md border border-white/20 text-white text-sm font-medium hover:bg-white/5 transition text-center">
                        Contact Us
                    </a>
                </div>

            </div>
        </section>

     <x-footer />
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