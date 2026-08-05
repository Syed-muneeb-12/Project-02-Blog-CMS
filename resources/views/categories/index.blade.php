<x-layout title="Categories">
    <!-- Main Wrapper (Matches body theme) -->
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

            <!-- Content Card -->
            <div class="bg-white w-full max-w-3xl rounded-2xl shadow-xl p-8 md:p-10 relative z-10 border border-gray-100 my-auto">
                
                <!-- Toast Notification Popup (Fades out after 3 seconds) -->
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

                <!-- Header with Action Button -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-6 border-b border-gray-100">
                    <div>
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                            Categories
                        </h1>
                        <p class="text-gray-500 mt-1 text-sm">Manage and view all registered categories.</p>
                    </div>

                    <!-- Primary Action Button (Gradient) -->
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
                            <li class="p-4 flex items-center justify-between hover:bg-white transition-colors duration-150 group">
                                <div class="flex items-center space-x-3">
                                    <!-- Decorative Icon Badge -->
                                    <div class="h-9 w-9 rounded-lg bg-emerald-50 text-[#4ade80] flex items-center justify-center border border-emerald-100/60">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                    </div>
                                    
                                    <!-- Category Name -->
                                    <a href="{{ route('categories.edit', $category->slug) }}" class="font-semibold text-gray-800 text-base group-hover:text-gray-900">
                                        {{ $category->name }}
                                    </a>
                                </div>

                                <!-- Category Slug Tag -->
                                <span class="px-3 py-1 bg-white text-gray-500 text-xs font-mono rounded-full border border-gray-200 shadow-sm">
                                    {{ $category->slug }}
                                </span>
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
                                <p class="text-gray-400 text-sm mt-1">Click the button above to add your first one.</p>
                            </li>
                        @endforelse
                    </ul>
                </div>

            </div>
        </main>
    </div>
</x-layout>