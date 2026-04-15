<div x-data="{ openDeleteModal: false }" class="relative">
    
<div>
    {{ $slot }}
</div>

    <div
        x-show="openDeleteModal"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
    >
        <div
            @click="openDeleteModal = false"
            class="absolute inset-0 bg-black/40"
        ></div>

        <div
            x-show="openDeleteModal"
            x-transition
            class="relative w-full max-w-md bg-white rounded-md shadow-2xl border border-slate-200 p-6"
        >
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-full bg-red-50 text-red-500 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined">delete</span>
                </div>

                <div class="flex-1">
                    <h3 class="text-lg font-bold text-slate-800">
                        Delete sprint
                    </h3>
                    <p class="text-sm text-slate-500 mt-2 leading-6">
                        Are you sure you want to delete this sprint? This action cannot be undone.
                    </p>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-3">
                <button
                    @click="openDeleteModal = false"
                    type="button"
                    class="px-4 py-2.5 rounded-md border border-slate-200 text-slate-600 font-medium hover:bg-slate-50 transition"
                >
                    Cancel
                </button>

                <form action="{{ route('project.sprint.delete' , $id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="px-4 py-2.5 rounded-md bg-red-500 text-white font-medium hover:bg-red-600 transition"
                    >
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>