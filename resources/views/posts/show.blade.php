<x-layout title="{{ $post->title }}">
    <!-- Main Wrapper (Matches body theme) -->
    <div class="flex h-screen bg-gradient-to-br from-green-50 via-gray-50 to-rose-50 font-sans overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-[#2A2A2A] flex-shrink-0 hidden md:flex flex-col border-r border-gray-800">
            <div class="p-6">
                <h2 class="text-white text-xl font-bold tracking-wider">ADMIN<span class="text-[#fb7185]">PANEL</span></h2>
            </div>
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Dashboard</a>
                <a href="{{ route('posts.index') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Posts</a>
                <a href="{{ route('categories.index') }}" class="block px-4 py-2.5 rounded-lg text-white bg-gray-800 transition-colors font-medium">Categories</a>
                <a href="{{ route('settings') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Settings</a>
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
            <div class="bg-white w-full max-w-4xl rounded-2xl shadow-xl p-8 md:p-10 relative z-10 border border-gray-100 my-auto">
                
                <!-- Post Header -->
                <div class="mb-8 pb-6 border-b border-gray-100">
                    
                    <!-- Title -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                        {{ $post->title }}
                    </h1>
                    
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

                <!-- Back Button (Optional UI element for navigation) -->
                <div class="mt-10 pt-6 border-t border-gray-100">
                    <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-50 text-gray-700 font-medium rounded-lg border border-gray-200 hover:bg-gray-100 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Back to Posts
                    </a>
                </div>

            </div>
        </main>
    </div>
</x-layout>