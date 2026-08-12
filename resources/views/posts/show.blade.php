<x-layout title="{{ $post->title }}">
    <!-- Main Wrapper (Matches body theme) -->
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
                <a href="{{ route('posts.index') }}" class="block px-4 py-2.5 rounded-lg text-white bg-gray-800 transition-colors font-medium">Posts</a>
                <a href="{{ route('categories.index') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Categories</a>
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
                <h1 class="text-xl font-semibold text-gray-800">Posts Management</h1>
                <div class="text-sm font-medium text-gray-600 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100">
                    Welcome back, {{ auth()->user()->name ?? 'User' }}
                </div>
            </header>

            <!-- Content Container -->
            <div class="p-6 md:p-8 relative z-10 overflow-y-auto flex-1">
                
                <!-- Content Card -->
                <div class="bg-white w-full max-w-4xl mx-auto rounded-2xl shadow-xl p-8 md:p-10 relative z-10 border border-gray-100">
                    
                    <!-- Post Header -->
                    <div class="mb-8 pb-6 border-b border-gray-100">
                        
                        <!-- Title -->
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                            {{ $post->title }}
                        </h2>
                        
                        <!-- Meta Information -->
                        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500">
                            
                            <!-- Author -->
                            <p class="flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Author: <span class="font-medium text-gray-700">{{ $post->user->name }}</span>
                            </p>

                            <span class="text-gray-300">•</span>

                            <!-- Category -->
                            <p class="flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                Category: 
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-700 font-medium rounded border border-gray-200">
                                    {{ $post->category->name }}
                                </span>
                            </p>

                            <span class="text-gray-300">•</span>

                            <!-- Status -->
                            <p class="flex items-center gap-1.5">
                                Status: 
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full border {{ $post->status === 'published' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-amber-50 text-amber-700 border-amber-200' }}">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </p>

                            <span class="text-gray-300">•</span>

                            <!-- Date -->
                            <p class="flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                Created: <span class="font-medium text-gray-700">{{ $post->created_at?->format('j M Y') ?? 'N/A' }}</span>
                            </p>

                        </div>
                    </div>

                    <!-- Featured Image -->
                    @if ($post->featured_image)
                        <div class="mb-8 rounded-xl overflow-hidden border border-gray-100 shadow-sm">
                            <img 
                                src="{{ asset('storage/' . $post->featured_image) }}"
                                alt="{{ $post->title }}"
                                class="w-full h-auto max-h-[450px] object-cover hover:scale-105 transition-transform duration-500"
                            >
                        </div>
                    @endif

                    <!-- Post Body Content -->
                    <div class="prose prose-emerald max-w-none text-gray-700 leading-relaxed">
                        {{ $post->body }}
                    </div>

                    <!-- Action Buttons Container -->
                    <!-- Action Buttons Container -->
                    <div class="mt-10 pt-6 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        
                        <!-- Back Button -->
                        <a href="{{ route('posts.index') }}" class="px-6 py-2.5 bg-gray-100 text-gray-700 font-semibold rounded-lg shadow-sm hover:bg-gray-200 hover:scale-105 hover:shadow-md transition-all duration-200 inline-flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Back to Posts
                        </a>

                        <!-- Right Side Actions (Edit & Delete) -->
                        <div class="flex flex-wrap items-center gap-3">
                            <!-- Edit Button (Gradient Theme) -->
                            <a href="{{ route('posts.edit', $post) }}" class="px-6 py-2.5 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg shadow hover:scale-105 hover:shadow-lg transition-all duration-200 inline-flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                Edit Post
                            </a>

                            <!-- Delete Form & Button -->
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-6 py-2.5 bg-rose-600 text-white font-semibold rounded-lg shadow hover:bg-rose-700 hover:scale-105 hover:shadow-lg transition-all duration-200 inline-flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</x-layout>