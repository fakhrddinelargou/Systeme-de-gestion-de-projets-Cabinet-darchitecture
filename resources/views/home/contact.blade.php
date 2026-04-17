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
                    Contact
                </span>

                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Get in touch with us
                </h1>

                <p class="text-lg text-gray-600 leading-8">
                    If you have questions about the platform, need assistance, or want to learn more about how it works,
                    feel free to contact us. We’re here to help.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="w-full bg-gray-50 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">

            <div class="grid lg:grid-cols-2 gap-12">

                <!-- Contact Info -->
                <div>
                    <span class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-full mb-4">
                        Contact Information
                    </span>

                    <h2 class="text-3xl font-bold text-gray-900 mb-6">
                        Let’s talk about your needs
                    </h2>

                    <p class="text-gray-600 mb-8 leading-7">
                        Whether you are a client, a team member, or simply interested in the platform,
                        you can reach out to us through the following channels.
                    </p>

                    <div class="space-y-6">

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100">
                                📧
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="text-gray-900 font-medium">contact@architrack.com</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100">
                                📞
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Phone</p>
                                <p class="text-gray-900 font-medium">+212 6 00 00 00 00</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 flex items-center justify-center rounded-xl bg-gray-100">
                                📍
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Location</p>
                                <p class="text-gray-900 font-medium">Casablanca, Morocco</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white border border-gray-200 rounded-2xl p-8">

                    <h3 class="text-xl font-semibold text-gray-900 mb-6">
                        Send us a message
                    </h3>

                    <form class="space-y-5">

                        <!-- Name -->
                        <div>
                            <label class="text-sm text-gray-600 mb-1 block">Full Name</label>
                            <input type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black text-sm"
                                placeholder="Your name">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="text-sm text-gray-600 mb-1 block">Email</label>
                            <input type="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black text-sm"
                                placeholder="you@example.com">
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="text-sm text-gray-600 mb-1 block">Subject</label>
                            <input type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black text-sm"
                                placeholder="Subject">
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="text-sm text-gray-600 mb-1 block">Message</label>
                            <textarea rows="5"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black text-sm"
                                placeholder="Write your message..."></textarea>
                        </div>

                        <!-- Button -->
                        <button type="submit"
                            class="w-full bg-black text-white py-3 rounded-lg text-sm font-medium hover:bg-gray-900 transition">
                            Send Message
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="w-full bg-white border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 py-20 text-center">

            <span class="inline-block px-3 py-1 text-xs font-medium text-gray-700 bg-gray-100 rounded-full mb-4">
                FAQ
            </span>

            <h2 class="text-3xl font-bold text-gray-900 mb-6">
                Need quick answers?
            </h2>

            <div class="space-y-4 text-left">

                <div class="border border-gray-200 rounded-xl p-5">
                    <h3 class="font-semibold text-gray-900 mb-2">Who can use the platform?</h3>
                    <p class="text-sm text-gray-600">
                        The platform is designed for clients, workers, and managers involved in architectural projects.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-xl p-5">
                    <h3 class="font-semibold text-gray-900 mb-2">How can I request a project?</h3>
                    <p class="text-sm text-gray-600">
                        You can submit a project request directly from your account after registration.
                    </p>
                </div>

                <div class="border border-gray-200 rounded-xl p-5">
                    <h3 class="font-semibold text-gray-900 mb-2">Are tasks visible to all users?</h3>
                    <p class="text-sm text-gray-600">
                        No, tasks are only accessible to administrators and workers for internal execution.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="w-full bg-black py-20">
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center">

            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                Ready to get started?
            </h2>

            <p class="text-gray-300 mb-8">
                Join the platform and start managing your architectural projects with more clarity.
            </p>

            <a href="{{ route('register') }}"
                class="px-6 py-3 bg-white text-black rounded-lg text-sm font-medium hover:bg-gray-100 transition">
                Create an account
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