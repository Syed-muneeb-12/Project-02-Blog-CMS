<x-layout title="Edit Category">
    <!-- Main Application Wrapper (Dashboard Theme) -->
    <div class="flex min-h-screen bg-gray-900 font-sans">

        <!-- Sidebar -->
        <aside class="w-64 flex-shrink-0 bg-gray-900 border-r border-gray-800 flex flex-col hidden md:flex">
            <!-- App Logo / Title -->
            <div class="p-6 border-b border-gray-800">
                <h2 class="text-2xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent">
                    Blog CMS
                </h2>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Dashboard</a>
                <a href="{{ route('posts.index') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Posts</a>
                <a href="{{ route('categories.index') }}" class="block px-4 py-2.5 rounded-lg text-white bg-gray-800 transition-colors font-medium">Categories</a>
                <a href="{{ route('settings') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Settings</a>
            </nav>
            
            <!-- Bottom Sidebar Area (Logout) -->
            <div class="p-4 border-t border-gray-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2.5 text-red-400 hover:text-red-300 hover:bg-gray-800 rounded-lg transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 relative overflow-hidden bg-gradient-to-br from-green-50 via-gray-50 to-rose-50 flex flex-col">
            
            <!-- Abstract Watermark/Floating Elements (Background) -->
            <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
                <div class="absolute top-10 left-10 md:left-20 w-64 h-64 border-[40px] border-[#4ade80]/10 rounded-full blur-sm"></div>
                <div class="absolute -bottom-20 right-4 md:right-10 w-96 h-96 border-[60px] border-[#fb7185]/10 rounded-full blur-md"></div>
                <div class="absolute top-1/4 right-1/4 w-12 h-12 bg-[#fb7185]/20 rounded-full blur-sm"></div>
            </div>

            <!-- Top Header -->
            <header class="bg-white/80 backdrop-blur-md border-b border-gray-200 p-4 md:px-8 flex justify-between items-center relative z-10">
                <h1 class="text-xl font-semibold text-gray-800">Categories Management</h1>
                <div class="text-sm font-medium text-gray-600 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100">
                    Welcome back, {{ auth()->user()->name ?? 'User' }}
                </div>
            </header>

            <!-- Content Container -->
            <div class="p-6 md:p-8 relative z-10 overflow-y-auto">
                
                <!-- Form Card -->
                <div class="bg-white w-full max-w-2xl mx-auto rounded-2xl shadow-xl p-8 md:p-10 relative z-10 border border-gray-100">
                    
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
                        <h2 class="text-3xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                            Edit Category
                        </h2>
                        <p class="text-gray-500 mt-2 text-sm">Update or remove this section from your platform.</p>
                    </div>

                    <!-- Update Form -->
                    <form id="update-form" action="{{ route('categories.update', $category->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Field 1: Category Name -->
                        <div class="mb-6">
                            <label for="Name" class="block text-gray-700 font-medium text-sm mb-2">
                                Category Name <span class="text-[#fb7185]">*</span>
                            </label>
                            <input type="text" id="Name" name="name" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#fb7185]/50 focus:border-[#fb7185] transition-colors shadow-sm"
                                value="{{ old('name', $category->name) }}">
                        </div>
                    </form>

                    <!-- Action Buttons Container -->
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
                            <button type="submit" class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg hover:scale-105 hover:shadow-lg transition-all duration-200 w-full text-center">
                                Delete
                            </button>
                        </form>

                        <!-- Edit Button (Triggers update-form via HTML5 form attribute) -->
                        <button type="submit" form="update-form"
                            class="px-6 py-3 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg hover:scale-105 hover:shadow-lg transition-all duration-200 w-full sm:w-auto text-center order-1 sm:order-3">
                            Save Changes
                        </button>

                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layout>