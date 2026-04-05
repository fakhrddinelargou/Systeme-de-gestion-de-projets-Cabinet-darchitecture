<div id="confirm-modal" class="fixed inset-0 bg-black/20 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full mx-4 border border-gray-100">
        
        <div class="flex items-center mb-4 text-orange-600">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <h3 class="text-lg font-bold text-gray-900">Confirm Action</h3>
        </div>

        <p class="text-gray-600 mb-6">
            Are you sure you want to proceed? This action cannot be undone.
        </p>

        <div class="flex gap-3 justify-end">
            <button onclick="closeModal()" 
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200 transition-all">
                Cancel
            </button>
            
            <button onclick="handleConfirm()" 
                class="px-4 py-2 text-sm font-medium text-white bg-black rounded-md hover:bg-gray-800 transition-all shadow-sm">
                Confirm Block
            </button>
        </div>
    </div>

    </div>