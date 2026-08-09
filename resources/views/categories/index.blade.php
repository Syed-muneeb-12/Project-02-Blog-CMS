<x-layout title="Categories">
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

            <!-- Content Container (Matches Posts Layout) -->
            <div class="p-6 md:p-8 relative z-10 overflow-y-auto">
                
                <!-- Content Card -->
                <div class="bg-white w-full rounded-2xl shadow-xl p-8 relative z-10 border border-gray-100">
                    
                    <!-- Toast Notification Popup (Fades out after 3 seconds) for STATUS -->
                    @if (session('status'))
                        <div x-data="{ show: true }"
                             x-show="show"
                             x-init="setTimeout(() => show = false, 3000)"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-500 text-emerald-900 font-medium flex items-center justify-between shadow-sm">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 w-6 h-6 text-emerald-600">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm md:text-base">{{ session('status') }}</span>
                            </div>
                            <button @click="show = false" class="text-emerald-700 hover:text-emerald-900 font-bold ml-4 focus:outline-none">
                                &times;
                            </button>
                        </div>
                    @endif

                    <!-- Toast Notification Popup (Fades out after 3 seconds) for SUCCESS (e.g. Deletions) -->
                    @if (session('success'))
                        <div x-data="{ show: true }"
                             x-show="show"
                             x-init="setTimeout(() => show = false, 3000)"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-500 text-emerald-900 font-medium flex items-center justify-between shadow-sm">
                            <div class="flex items-center space-x-3">
                                <div class="flex-shrink-0 w-6 h-6 text-emerald-600">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm md:text-base">{{ session('success') }}</span>
                            </div>
                            <button @click="show = false" class="text-emerald-700 hover:text-emerald-900 font-bold ml-4 focus:outline-none">
                                &times;
                            </button>
                        </div>
                    @endif

                    <!-- Header with Action Button -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-6 border-b border-gray-100">
                        <div>
                            <h2 class="text-3xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                                Categories
                            </h2>
                            <p class="text-gray-500 mt-1 text-sm">Manage and view all registered categories.</p>
                        </div>

                        <!-- Primary Action Button -->
                        <a href="{{ route('categories.create') }}" 
                            class="px-5 py-2.5 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg hover:scale-105 hover:shadow-lg transition-all duration-200 inline-flex items-center justify-center gap-2 text-sm self-start sm:self-auto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Category
                        </a>
                    </div>

                    <!-- Category List Container -->
                    <div class="bg-gray-50/50 rounded-xl border border-gray-100 overflow-hidden">
                        <ul class="divide-y divide-gray-100">
                            @forelse ($categories as $category)
                                <li class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-white transition-colors duration-150 group">
                                    
                                    <div class="flex items-center space-x-3.5">
                                        <!-- Decorative Icon Badge -->
                                        <div class="h-10 w-10 rounded-lg bg-emerald-50 text-[#4ade80] flex items-center justify-center border border-emerald-100/60 flex-shrink-0">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                            </svg>
                                        </div>
                                        
                                        <!-- Category Name -->
                                        <a href="{{ route('categories.edit', $category->slug) }}" class="font-bold text-gray-800 text-base group-hover:text-gray-900 transition-colors">
                                            {{ $category->name }}
                                        </a>
                                    </div>

                                    <!-- Category Slug & Action Buttons -->
                                    <div class="flex items-center space-x-3 w-full sm:w-auto justify-between sm:justify-end">
                                        <!-- Slug Badge -->
                                        <span class="px-3 py-1 bg-white text-gray-500 text-xs font-mono rounded-md border border-gray-200 shadow-sm">
                                            {{ $category->slug }}
                                        </span>

                                        <!-- Edit & Delete Actions -->
                                        <div class="flex items-center space-x-2">
                                            <!-- Edit Button -->
                                            <a href="{{ route('categories.edit', $category->slug) }}" 
                                                class="p-2 text-gray-400 hover:text-emerald-500 bg-white hover:bg-emerald-50 rounded-lg border border-gray-200 hover:border-emerald-200 transition-colors shadow-sm"
                                                title="Edit Category">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>

                                            <!-- Delete Form -->
                                            <form action="{{ route('categories.destroy', $category->slug) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                    class="p-2 text-gray-400 hover:text-rose-500 bg-white hover:bg-rose-50 rounded-lg border border-gray-200 hover:border-rose-200 transition-colors shadow-sm"
                                                    title="Delete Category">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                </li>
                            @empty
                                <!-- Styled Empty State -->
                                <li class="py-12 px-4 text-center">
                                    <div class="mx-auto w-12 h-12 rounded-full bg-rose-50 text-[#fb7185] flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 font-medium">No categories found!</p>
                                    <p class="text-gray-400 text-sm mt-1 mb-4">Click the button above to add your first one.</p>
                                    <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white text-sm font-semibold rounded-lg hover:scale-105 transition-transform inline-block">
                                        Create Category
                                    </a>
                                </li>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>
        </main>
    </div>
</x-layout>