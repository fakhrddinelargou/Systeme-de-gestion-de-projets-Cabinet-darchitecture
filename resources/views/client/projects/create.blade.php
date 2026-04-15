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
    <title>Create - New - Project</title>
</head>

<body>
    @include('components.alert')

    <section class="w-full min-h-screen bg-gray-100 px-4 py-8">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl border border-gray-200 shadow-xl p-6 md:p-10">

            <div class="mb-8">
                <div class="flex items-center gap-3 mb-4">
                    <img class="w-10 h-10" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    <h4 class="font-bold text-[#515151] tracking-wide">ARCHITRACK</h4>
                </div>

                <h1 class="text-[28px] font-semibold text-black">Create New Project</h1>
                <p class="text-[14px] text-[#6B7280] mt-2">
                    Add your project details to start tracking its progress
                </p>
            </div>

            <form action="{{ route('store.projects') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label for="title"
                            class="block text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                            Project Title
                        </label>
                        <input id="title" name="title" type="text" required placeholder="Modern Villa Project"
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white text-[14px] outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition">
                    </div>

                    <div>
                        <label for="reference"
                            class="block text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                            Reference
                        </label>
                        <input id="reference" name="reference" type="text" required placeholder="PRJ-2026-001"
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white text-[14px] outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition">
                    </div>
                </div>

                    <div>
                        <label for="type" class="block text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                            Project Type
                        </label>
                        <select id="type" name="type" required
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white text-[14px] outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition">
                            <option value="">Select type</option>
                            <option value="residential_house">House</option>
                            <option value="villa">Villa</option>
                            <option value="apartment">Apartment</option>
                            <option value="residential_complex">Residential Complex</option>
                            <option value="housing_project">Housing Project</option>

                            <option value="office_building">Office Building</option>
                            <option value="shopping_mall">Shopping Mall</option>
                            <option value="retail_store">Retail Store</option>
                            <option value="hotel">Hotel</option>
                            <option value="restaurant">Restaurant / Cafe</option>

                            <option value="factory">Factory</option>
                            <option value="warehouse">Warehouse</option>
                            <option value="industrial_complex">Industrial Complex</option>

                            <option value="school">School</option>
                            <option value="university">University</option>
                            <option value="hospital">Hospital</option>
                            <option value="clinic">Clinic</option>
                            <option value="government_building">Government Building</option>

                            <option value="urban_planning">Urban Planning</option>
                            <option value="landscape">Landscape Design</option>
                            <option value="public_space">Public Space</option>
                            <option value="park">Park</option>

                            <option value="interior_design">Interior Design</option>
                            <option value="renovation">Renovation</option>
                            <option value="restoration">Restoration</option>
                            <option value="fit_out">Fit-Out</option>

                            <option value="construction">Construction</option>
                            <option value="structural_design">Structural Design</option>
                            <option value="engineering_project">Engineering Project</option>

                            <option value="smart_building">Smart Building</option>
                            <option value="sustainable_project">Sustainable / Green Project</option>
                            <option value="modular_construction">Modular Construction</option>
                        </select>
                    </div>



                <div>
                    <label for="location" class="block text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                        Location
                    </label>
                    <input id="location" name="location" type="text" required placeholder="Marrakech, Morocco"
                        class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white text-[14px] outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition">
                </div>

                <div>
                    <label for="description"
                        class="block text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                        Description
                    </label>
                    <textarea id="description" name="description" rows="5"
                        placeholder="Describe the project scope, requirements, and goals..."
                        class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white text-[14px] outline-none resize-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition"></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label for="start_date"
                            class="block text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                            Start Date
                        </label>
                        <input id="start_date" name="start_date" type="date" required
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white text-[14px] outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition">
                    </div>

                    <div>
                        <label for="end_date"
                            class="block text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                            End Date
                        </label>
                        <input id="end_date" name="end_date" type="date" required
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white text-[14px] outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition">
                    </div>

                    <div>
                        <label for="total_progress"
                            class="block text-[#9CA3AF] font-bold text-[12px] tracking-[1.8px] uppercase">
                            Total Progress
                        </label>
                        <input required id="total_progress" name="total_progress" type="number" min="0" max="100" placeholder="0"
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300 bg-white text-[14px] outline-none focus:border-gray-500 focus:ring-2 focus:ring-gray-200 transition">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <button type="submit"
                        class="w-full sm:w-auto px-8 h-12 rounded-lg bg-black hover:bg-[#1f1f1f] text-white text-[14px] font-semibold transition">
                        Create Project
                    </button>

                    <a href="{{ route('client.projects') }}"
                        class="w-full sm:w-auto px-8 h-12 rounded-lg border border-gray-300 text-gray-700 text-[14px] font-semibold flex items-center justify-center hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </section>
</body>

</html>