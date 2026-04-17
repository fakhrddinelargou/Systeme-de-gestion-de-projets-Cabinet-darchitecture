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
                    Support
                </span>

                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    How can we help you?
                </h1>

                <p class="text-lg text-gray-600 leading-8">
                    Find answers, solve issues, and get guidance on how to use the platform effectively.
                </p>
            </div>
        </div>
    </section>

    <!-- Help Categories -->
    <section class="w-full bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

            <div class="max-w-2xl mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Help Topics
                </h2>
                <p class="text-gray-600">
                    Browse common topics to quickly find what you need.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Account -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Account & Access</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Learn how to create an account, log in, and manage your profile securely.
                    </p>
                </div>

                <!-- Projects -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Projects</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Understand how to submit project requests and follow project progress.
                    </p>
                </div>

                <!-- Progress -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Progress Tracking</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Learn how phases, percentages, and project status are managed.
                    </p>
                </div>

                <!-- Messaging -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Messaging</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Discover how to communicate with other users inside the platform.
                    </p>
                </div>

                <!-- Notifications -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Notifications</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Stay updated with real-time alerts about project activity and updates.
                    </p>
                </div>

                <!-- Roles -->
                <div class="bg-white border border-gray-200 rounded-2xl p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">User Roles</h3>
                    <p class="text-sm text-gray-600 leading-6">
                        Understand the differences between Client, Worker, and Manager access.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="w-full bg-white border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 py-20">

            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">
                    Frequently Asked Questions
                </h2>
                <p class="text-gray-600">
                    Quick answers to common questions.
                </p>
            </div>

            <div class="space-y-4">

                <div class="border border-gray-200 rounded-xl p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">
                        How do I submit a project request?
                    </h3>
                    <p class="text-sm text-gray-600">
                        After creating an account, you can submit a project request from your dashboard.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">
                        Who can see project progress?
                    </h3>
                    <p class="text-sm text-gray-600">
                        Project progress is visible to clients, workers, and managers depending on their role.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">
                        Are tasks visible to clients?
                    </h3>
                    <p class="text-sm text-gray-600">
                        No, tasks are internal and only accessible to workers and administrators.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-xl p-6">
                    <h3 class="font-semibold text-gray-900 mb-2">
                        How do notifications work?
                    </h3>
                    <p class="text-sm text-gray-600">
                        Notifications are sent when important actions occur, such as project updates or validation.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Support -->
    <section class="w-full bg-gray-50 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 py-20 text-center">

            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                Still need help?
            </h2>

            <p class="text-gray-600 mb-6">
                If you couldn’t find your answer, feel free to contact our support team.
            </p>

            <a href="/contact"
                class="px-6 py-3 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-900 transition">
                Contact Support
            </a>

        </div>
    </section>

</main>

    <x-footer />


</body>

</html>