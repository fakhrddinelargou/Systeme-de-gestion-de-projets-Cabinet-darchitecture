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
                    Terms of Service
                </span>

                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Terms and conditions of use
                </h1>

                <p class="text-lg text-gray-600 leading-8">
                    These terms define the rules and conditions for using the ArchiTrack platform.
                    By accessing or using the platform, you agree to these terms.
                </p>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="w-full bg-white">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 py-20 space-y-12">

            <!-- 1 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    1. Platform Purpose
                </h2>
                <p class="text-gray-600 leading-7">
                    ArchiTrack is a project management platform designed for architecture firms.
                    It allows users to manage projects, track progress, communicate internally,
                    and coordinate between clients, workers, and managers.
                </p>
            </div>

            <!-- 2 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    2. User Accounts
                </h2>
                <p class="text-gray-600 leading-7">
                    Users must provide accurate information when creating an account.
                    Each user is responsible for maintaining the confidentiality of their login credentials
                    and for all activities performed under their account.
                </p>
            </div>

            <!-- 3 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    3. User Roles and Access
                </h2>
                <p class="text-gray-600 leading-7">
                    The platform operates based on role-based access. Clients, workers, and managers
                    have different permissions and access levels. Users agree to use the platform
                    according to their assigned role.
                </p>
            </div>

            <!-- 4 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    4. Acceptable Use
                </h2>
                <p class="text-gray-600 leading-7">
                    Users agree to use the platform responsibly and not to misuse its features.
                    Any attempt to access unauthorized data, disrupt the system, or use the platform
                    for unintended purposes is strictly prohibited.
                </p>
            </div>

            <!-- 5 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    5. Project Data and Content
                </h2>
                <p class="text-gray-600 leading-7">
                    Users are responsible for the content they create, including project data,
                    messages, and updates. The platform provides tools to manage this data,
                    but does not verify the accuracy of user-generated content.
                </p>
            </div>

            <!-- 6 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    6. Internal Tasks and Visibility
                </h2>
                <p class="text-gray-600 leading-7">
                    Tasks within projects are part of internal execution and are only accessible
                    to administrators and workers. Clients do not have access to internal task details.
                </p>
            </div>

            <!-- 7 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    7. Service Availability
                </h2>
                <p class="text-gray-600 leading-7">
                    We aim to keep the platform available and functional at all times.
                    However, temporary interruptions may occur due to maintenance or technical issues.
                </p>
            </div>

            <!-- 8 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    8. Security
                </h2>
                <p class="text-gray-600 leading-7">
                    The platform uses security measures such as authentication, session protection,
                    and access control. Users must not attempt to bypass these protections.
                </p>
            </div>

            <!-- 9 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    9. Limitation of Responsibility
                </h2>
                <p class="text-gray-600 leading-7">
                    ArchiTrack is provided as a project management tool. We are not responsible
                    for decisions, delays, or outcomes related to how users manage their projects.
                </p>
            </div>

            <!-- 10 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    10. Changes to the Terms
                </h2>
                <p class="text-gray-600 leading-7">
                    These terms may be updated when necessary. Continued use of the platform
                    implies acceptance of the updated terms.
                </p>
            </div>

            <!-- 11 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    11. Contact
                </h2>
                <p class="text-gray-600 leading-7">
                    If you have any questions regarding these terms, you can contact us through the platform.
                </p>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="w-full bg-gray-50 border-t border-gray-200">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 py-16 text-center">

            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                Need more information?
            </h2>

            <p class="text-gray-600 mb-6">
                Feel free to contact us if you have any questions about these terms.
            </p>

            <a href="/contact"
                class="px-6 py-3 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-900 transition">
                Contact Us
            </a>

        </div>
    </section>

</main>

    <x-footer />


</body>

</html>