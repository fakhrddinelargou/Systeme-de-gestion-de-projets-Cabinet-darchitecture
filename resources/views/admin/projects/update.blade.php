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

            <form action="{{ route('projects.edite', $project->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[#9CA3AF] font-bold text-[12px] uppercase">
                            Project Title
                        </label>
                        <input name="title" type="text" required value="{{ old('title', $project->title) }}"
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300">
                    </div>

                    <div>
                        <label class="block text-[#9CA3AF] font-bold text-[12px] uppercase">
                            Reference
                        </label>
                        <input name="reference" type="text" required value="{{ old('reference', $project->reference) }}"
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300">
                    </div>
                </div>

                @php
                    $types = [
                        'residential_house' => 'House',
                        'villa' => 'Villa',
                        'apartment' => 'Apartment',
                        'residential_complex' => 'Residential Complex',
                        'housing_project' => 'Housing Project',

                        'office_building' => 'Office Building',
                        'shopping_mall' => 'Shopping Mall',
                        'retail_store' => 'Retail Store',
                        'hotel' => 'Hotel',
                        'restaurant' => 'Restaurant / Cafe',

                        'factory' => 'Factory',
                        'warehouse' => 'Warehouse',
                        'industrial_complex' => 'Industrial Complex',

                        'school' => 'School',
                        'university' => 'University',
                        'hospital' => 'Hospital',
                        'clinic' => 'Clinic',
                        'government_building' => 'Government Building',

                        'urban_planning' => 'Urban Planning',
                        'landscape' => 'Landscape Design',
                        'public_space' => 'Public Space',
                        'park' => 'Park',

                        'interior_design' => 'Interior Design',
                        'renovation' => 'Renovation',
                        'restoration' => 'Restoration',
                        'fit_out' => 'Fit-Out',

                        'construction' => 'Construction',
                        'structural_design' => 'Structural Design',
                        'engineering_project' => 'Engineering Project',

                        'smart_building' => 'Smart Building',
                        'sustainable_project' => 'Sustainable / Green Project',
                        'modular_construction' => 'Modular Construction',
                    ];
                @endphp

                <div>
                    <label class="block text-[#9CA3AF] font-bold text-[12px] uppercase">
                        Project Type
                    </label>

                    <select name="type" required class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300">

                        <option value="">Select type</option>

                        @foreach($types as $value => $label)
                            <option value="{{ $value }}" {{ old('type', $project->type ?? '') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <div>
                    <label class="block text-[#9CA3AF] font-bold text-[12px] uppercase">
                        Location
                    </label>
                    <input name="location" type="text" required value="{{ old('location', $project->location) }}"
                        class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300">
                </div>

                <div>
                    <label class="block text-[#9CA3AF] font-bold text-[12px] uppercase">
                        Description
                    </label>
                    <textarea name="description" rows="5"
                        class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-[#9CA3AF] font-bold text-[12px] uppercase">
                            Start Date
                        </label>
                        <input name="start_date" type="date" required
                            value="{{ old('start_date', $project->start_date) }}"
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300">
                    </div>

                    <div>
                        <label class="block text-[#9CA3AF] font-bold text-[12px] uppercase">
                            End Date
                        </label>
                        <input name="end_date" type="date" required value="{{ old('end_date', $project->end_date) }}"
                            class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300">
                    </div>

                    <div>
                        <label class="block text-[#9CA3AF] font-bold text-[12px] uppercase">
                            Status
                        </label>
                        <select name="status" class="mt-2 w-full px-4 py-3.5 rounded-lg border border-gray-300">
                            <option value="pending" {{ $project->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $project->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>
                </div>

                <div class="flex gap-4 pt-2">
                    <button type="submit" class="px-8 h-12 rounded-lg bg-black text-white font-semibold">
                        Update Project
                    </button>

                    <a href="{{ route('admin.projects.show', $project->id) }}"
                        class="px-8 h-12 rounded-lg border border-gray-300 flex items-center justify-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </section>
</body>

</html>