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

    <!-- Hero Section -->
    <section class="w-full border-b border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20 lg:py-24">
            <div class="max-w-3xl">
                <span class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                    About ArchiTrack
                </span>

                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                    A smarter way to manage architectural projects
                </h1>

                <p class="text-lg text-gray-600 leading-8">
                    ArchiTrack is a web-based platform designed to help architecture firms manage projects more clearly,
                    follow progress more accurately, and improve communication between clients, workers, and management.
                </p>
            </div>
        </div>
    </section>

    <!-- What the Platform Does -->
    <section class="w-full bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <div>
                    <span class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-full mb-4">
                        What it does
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-5">
                        Built to support the full project lifecycle
                    </h2>
                    <p class="text-lg text-gray-600 leading-8">
                        The platform helps architecture firms manage projects from the initial client request to the final
                        delivery. It centralizes information, tracks project phases, and provides better visibility into
                        the progress of each project.
                    </p>
                </div>

                <div class="grid sm:grid-cols-2 gap-4">
                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Project Requests</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Clients can submit project requests through a clear and structured process.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Project Validation</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Managers can review requests and decide whether to approve or reject them.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Progress Tracking</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Teams can follow phases, completion percentage, and project status updates.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Team Communication</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Internal messaging and notifications help all stakeholders stay informed.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who Uses It -->
    <section class="w-full bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
            <div class="max-w-2xl mb-12">
                <span class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                    Who uses it
                </span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Designed for every actor involved in the project
                </h2>
                <p class="text-lg text-gray-600">
                    The platform is structured around three main roles, each with specific responsibilities and access.
                </p>
            </div>

            <div class="grid lg:grid-cols-3 gap-6">
                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Client</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Clients can submit project requests, follow project progress, and receive important updates through notifications.
                    </p>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Worker</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Workers can update project progress, manage execution details, and collaborate internally with the team.
                    </p>
                </div>

                <div class="bg-white border border-gray-200 rounded-2xl p-8">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Boss</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Managers can validate projects, manage users, monitor progress, and oversee the entire workflow.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Internal Structure -->
    <section class="w-full bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-full mb-4">
                        How work is organized
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-5">
                        Structured around projects, phases, and controlled execution
                    </h2>
                    <p class="text-lg text-gray-600 leading-8">
                        Each project is organized into phases to provide clear visibility into progress. Tasks are managed
                        internally within each phase and are only accessible to administrators and workers, ensuring a controlled
                        and secure execution environment.
                    </p>
                </div>

                <div class="space-y-4">
                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Projects</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Centralized management of architectural projects from request to delivery.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Phases</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Each project is divided into phases to improve organization and follow-up.
                        </p>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-2xl p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Internal Tasks</h3>
                        <p class="text-sm text-gray-600 leading-6">
                            Tasks are linked to phases and are visible only to administrators and workers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why It Matters -->
    <section class="w-full bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
            <div class="max-w-2xl mb-12">
                <span class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                    Why it matters
                </span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Clearer management, better coordination, stronger control
                </h2>
                <p class="text-lg text-gray-600">
                    ArchiTrack helps reduce delays, improve project visibility, and make communication more effective across the entire workflow.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="border border-gray-200 rounded-2xl p-6 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Centralized Management</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Keep all project-related information in one place.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-2xl p-6 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Accurate Monitoring</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Follow project phases and progress with more precision.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-2xl p-6 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Better Communication</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Improve collaboration between clients, workers, and management.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-2xl p-6 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Secure Access</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Protect data through role-based access and secure operations.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Closing Section -->
    <section class="w-full bg-black py-20">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">
            <span class="inline-block px-3 py-1 text-xs font-medium text-gray-300 bg-white/10 rounded-full mb-4">
                Our Purpose
            </span>

            <h2 class="text-3xl lg:text-5xl font-bold text-white mb-6">
                Helping architecture firms manage projects with more clarity
            </h2>

            <p class="text-lg text-gray-300 max-w-2xl mx-auto leading-8">
                ArchiTrack is built to provide a clear, structured, and secure environment for managing architectural projects,
                supporting better follow-up from the first request to the final delivery.
            </p>
        </div>
    </section>

</main>
    <x-footer />

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