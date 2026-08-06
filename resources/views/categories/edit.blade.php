<x-layout title="category">
    <!-- Wrapper (Replaces body tag for Blade components) -->
    <div class="flex h-screen bg-gradient-to-br from-green-50 via-gray-50 to-rose-50 font-sans overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-[#2A2A2A] flex-shrink-0 hidden md:flex flex-col border-r border-gray-800">
            <div class="p-6">
                <h2 class="text-white text-xl font-bold tracking-wider">ADMIN<span class="text-[#fb7185]">PANEL</span></h2>
            </div>
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="#" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Dashboard</a>
                <a href="#" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Posts</a>
                <a href="#" class="block px-4 py-2.5 rounded-lg text-white bg-gray-800 transition-colors font-medium">Categories</a>
                <a href="#" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Settings</a>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 relative flex items-center justify-center p-6 overflow-y-auto">
            
            <!-- Abstract Watermark/Floating Elements (Background) -->
            <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
                <div class="absolute top-10 left-20 w-64 h-64 border-[40px] border-[#4ade80]/10 rounded-full blur-sm"></div>
                <div class="absolute -bottom-20 right-10 w-96 h-96 border-[60px] border-[#fb7185]/10 rounded-full blur-md"></div>
                <div class="absolute top-1/4 right-1/4 w-12 h-12 bg-[#fb7185]/20 rounded-full blur-sm"></div>
            </div>

            <!-- Form Card -->
            <div class="bg-white w-full max-w-2xl rounded-2xl shadow-xl p-8 md:p-10 relative z-10 border border-gray-100">
                
                <!-- Premium Success Flash Message -->
                @if (session('success'))
                    <div class="mb-8 p-4 bg-white border border-[#4ade80]/60 shadow-sm rounded-xl flex items-center gap-4">
                        <div class="p-2 bg-green-50 rounded-full shrink-0">
                            <svg class="w-5 h-5 text-[#4ade80]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p class="text-gray-800 font-semibold text-sm">{{ session('success') }}</p>
                    </div>
                @endif

                <!-- Header -->
                <div class="mb-8 text-center md:text-left">
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                        Edit Category
                    </h1>
                    <p class="text-gray-500 mt-2 text-sm">Update or remove this section from your platform.</p>
                </div>

                <!-- Update Form (Closed before the buttons) -->
                <form id="update-form" action="{{ route('categories.update', $category->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Field 1: Category Name -->
                    <div>
                        <label for="Name" class="block text-gray-700 font-medium text-sm mb-2">
                           Category Name <span class="text-[#fb7185]">*</span>
                        </label>
                        <input type="text" id="Name" name="name" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#fb7185]/50 focus:border-[#fb7185] transition-colors shadow-sm"
                            value="{{ old('name', $category->name) }}">
                    </div>
                </form>

                <!-- Action Buttons Container (Perfectly Aligned) -->
                <div class="pt-6 mt-8 flex flex-col sm:flex-row sm:justify-end gap-3 border-t border-gray-100">
                    
                    <!-- Cancel Button -->
                    <a href="{{ route('categories.index') }}" 
                        class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors w-full sm:w-auto text-center order-3 sm:order-1">
                        Cancel
                    </a>

                    <!-- Delete Button Form -->
                    <form action="{{ route('categories.destroy', $category->slug) }}" method="POST" class="w-full sm:w-auto order-2 sm:order-2" onsubmit="return confirm('Are you sure you want to delete this category?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg hover:scale-105 hover:shadow-lg transition-all duration-200 w-full text-center h-full">
                            Delete
                        </button>
                    </form>

                    <!-- Edit Button (Triggers the update-form above) -->
                    <button type="submit" form="update-form"
                        class="px-6 py-3 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg hover:scale-105 hover:shadow-lg transition-all duration-200 w-full sm:w-auto text-center order-1 sm:order-3">
                        Save Changes
                    </button>

                </div>
            </div>
        </main>
    </div>
</x-layout>