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
                    Privacy Policy
                </span>

                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Your data, your privacy
                </h1>

                <p class="text-lg text-gray-600 leading-8">
                    This Privacy Policy explains how ArchiTrack collects, uses, and protects your information when you use the platform.
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
                    1. Information We Collect
                </h2>
                <p class="text-gray-600 leading-7">
                    We collect basic user information such as your name, email address, and account credentials.
                    The platform also stores project-related data, including project details, progress updates,
                    messages, and notifications.
                </p>
            </div>

            <!-- 2 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    2. How We Use Your Information
                </h2>
                <p class="text-gray-600 leading-7">
                    Your information is used to provide access to the platform, manage projects,
                    enable communication between users, and improve overall system performance.
                </p>
            </div>

            <!-- 3 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    3. Data Access and Roles
                </h2>
                <p class="text-gray-600 leading-7">
                    Access to data is controlled based on user roles. Clients, workers, and managers
                    have different levels of access to ensure that information is only visible to the appropriate users.
                </p>
            </div>

            <!-- 4 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    4. Data Protection
                </h2>
                <p class="text-gray-600 leading-7">
                    We implement standard security measures to protect your data, including authentication systems,
                    secure sessions, and protection against unauthorized access.
                </p>
            </div>

            <!-- 5 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    5. Communication Data
                </h2>
                <p class="text-gray-600 leading-7">
                    Messages and notifications داخل المنصة are stored to ensure proper communication between users.
                    This data is only accessible to the relevant participants.
                </p>
            </div>

            <!-- 6 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    6. Data Retention
                </h2>
                <p class="text-gray-600 leading-7">
                    Data is stored as long as it is necessary for the operation of the platform.
                    Users may request deletion of their data where applicable.
                </p>
            </div>

            <!-- 7 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    7. Third-Party Services
                </h2>
                <p class="text-gray-600 leading-7">
                    The platform does not share personal data with third-party services, except where required
                    for basic system functionality or legal obligations.
                </p>
            </div>

            <!-- 8 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    8. User Responsibility
                </h2>
                <p class="text-gray-600 leading-7">
                    Users are responsible for maintaining the confidentiality of their login credentials
                    and ensuring secure access to their accounts.
                </p>
            </div>

            <!-- 9 -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">
                    9. Updates to This Policy
                </h2>
                <p class="text-gray-600 leading-7">
                    This Privacy Policy may be updated when necessary. Continued use of the platform
                    implies acceptance of any changes.
                </p>
            </div>

        </div>
    </section>

    <!-- Footer CTA -->
    <section class="w-full bg-gray-50 border-t border-gray-200">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 py-16 text-center">

            <h2 class="text-2xl font-bold text-gray-900 mb-4">
                Questions about your data?
            </h2>

            <p class="text-gray-600 mb-6">
                If you have any concerns about privacy or data usage, feel free to contact us.
            </p>

            <a href="/contact"
                class="px-6 py-3 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-900 transition">
                Contact Us
            </a>

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