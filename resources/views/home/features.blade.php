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
    <x-navbar />
<main class="bg-white mt-30">

    <!-- Hero -->
    <section class="w-full border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20 lg:py-24">
            <div class="max-w-3xl">
                <span class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                    Features
                </span>

                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Everything you need to manage architectural projects
                </h1>

                <p class="text-lg text-gray-600 leading-8">
                    ArchiTrack provides a structured set of features designed to support project management,
                    improve visibility, and ensure efficient collaboration between all stakeholders.
                </p>
            </div>
        </div>
    </section>

    <!-- Core Features -->
    <section class="w-full bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

            <div class="max-w-2xl mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Core Features
                </h2>
                <p class="text-gray-600">
                    Designed to cover the full lifecycle of a project from request to delivery.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Project Management -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Project Management</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Manage projects from initial client request to final delivery with a clear and structured workflow.
                    </p>
                </div>

                <!-- Project Validation -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Project Validation</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Allow managers to review, approve, or reject project requests before execution begins.
                    </p>
                </div>

                <!-- Progress Tracking -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Progress Tracking</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Track project phases, completion percentage, and status updates in real time.
                    </p>
                </div>

                <!-- Notifications -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Notifications</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Stay informed with real-time notifications about project updates, validation, and activities.
                    </p>
                </div>

                <!-- Messaging -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Internal Messaging</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Communicate directly داخل المنصة between clients, workers, and managers.
                    </p>
                </div>

                <!-- Role-based Access -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Role-based Access</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Control access and permissions based on user roles: Client, Worker, and Boss.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Work Structure -->
    <section class="w-full bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <div>
                    <span class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                        Work Structure
                    </span>

                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-5">
                        Organized around projects and phases
                    </h2>

                    <p class="text-lg text-gray-600 leading-8">
                        Each project is divided into phases to provide clear visibility into progress and structure the workflow.
                        This allows teams to manage complex projects more efficiently.
                    </p>
                </div>

                <div class="space-y-4">

                    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Projects</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Central element that groups all information related to a specific architectural project.
                        </p>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Phases</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Each project is divided into phases to monitor progress and structure execution.
                        </p>
                    </div>

                    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Internal Tasks</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Tasks are linked to phases and are only visible to administrators and workers for internal management.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Roles -->
    <section class="w-full bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

            <div class="max-w-2xl mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Role-based Experience
                </h2>
                <p class="text-gray-600">
                    Each user interacts with the platform based on their role and responsibilities.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-6">

                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Client</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Submit project requests, track progress, and receive updates.
                    </p>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Worker</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Update progress, manage execution details, and collaborate internally.
                    </p>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Boss</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Validate projects, manage users, and monitor overall workflow.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="w-full bg-black py-20">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">

            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                Start managing your projects with clarity
            </h2>

            <p class="text-gray-300 mb-8">
                Join ArchiTrack and simplify the way you manage architectural projects.
            </p>

            <a href="{{ route('register') }}"
                class="px-6 py-3 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-100 transition">
                Get Started
            </a>

        </div>
    </section>

</main>
    <x-footer />



</body>

</html>