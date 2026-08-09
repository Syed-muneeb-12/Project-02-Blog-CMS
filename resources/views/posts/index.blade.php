<x-layout title="Posts">
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
            <div class="p-6 md:p-8 relative z-10 overflow-y-auto">
                
                <!-- Content Card (Your Posts Logic) -->
                <div class="bg-white w-full rounded-2xl shadow-xl p-8 relative z-10 border border-gray-100">
                    
                    <!-- Header with Action Button -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-6 border-b border-gray-100">
                        <div>
                            <h2 class="text-3xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                                All Posts
                            </h2>
                            <p class="text-gray-500 mt-1 text-sm">Manage and view all registered posts.</p>
                        </div>

                        <!-- Primary Action Button -->
                        <a href="{{ url('posts/create') }}" 
                            class="px-5 py-2.5 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg hover:scale-105 hover:shadow-lg transition-all duration-200 inline-flex items-center justify-center gap-2 text-sm self-start sm:self-auto">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Create Post
                        </a>
                    </div>

                    <!-- Post List Container -->
                    <div class="bg-gray-50/50 rounded-xl border border-gray-100 overflow-hidden">
                        <ul class="divide-y divide-gray-100">
                            @forelse ($posts as $post)
                                <li class="p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 hover:bg-white transition-colors duration-150 group">
                                    
                                    <!-- Left Section: Post Info -->
                                    <div class="flex items-start space-x-3.5">
                                        <!-- Decorative Icon Badge -->
                                        <div class="h-10 w-10 rounded-lg bg-emerald-50 text-[#4ade80] flex items-center justify-center border border-emerald-100/60 flex-shrink-0 mt-0.5">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                            </svg>
                                        </div>
                                        
                                        <div>
                                            <!-- Post Title -->
                                            <h3 class="font-bold text-gray-800 text-base group-hover:text-gray-900 transition-colors">
                                                {{ $post->title }}
                                            </h3>
                                            
                                            <!-- Meta Details: Author, Category, Date -->
                                            <div class="flex flex-wrap items-center gap-2 text-xs text-gray-500 mt-1">
                                                <span>By <strong class="text-gray-700 font-medium">{{ $post->user->name }}</strong></span>
                                                <span>•</span>
                                                <span class="px-2 py-0.5 bg-emerald-50 text-emerald-700 font-medium rounded-md border border-emerald-100">
                                                    {{ $post->category->name }}
                                                </span>
                                                <span>•</span>
                                                <span>{{ $post->created_at?->format('j M Y') ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Section: Status Tag & Action Buttons -->
                                    <div class="flex items-center justify-between md:justify-end gap-3 pt-2 md:pt-0 border-t md:border-0 border-gray-100">
                                        <!-- Status Tag -->
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full border {{ $post->status === 'published' ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 'bg-amber-50 text-amber-700 border-amber-200' }}">
                                            {{ ucfirst($post->status) }}
                                        </span>

                                        <!-- Actions -->
                                        <div class="flex items-center space-x-2">
                                            <!-- Edit Link -->
                                            <a href="#" class="px-3 py-1.5 text-xs font-medium text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors shadow-sm">
                                                Edit
                                            </a>

                                            <!-- Delete Link -->
                                            <a href="#" class="px-3 py-1.5 text-xs font-medium text-rose-600 bg-rose-50 border border-rose-100 rounded-lg hover:bg-rose-100 transition-colors">
                                                Delete
                                            </a>
                                        </div>
                                    </div>

                                </li>
                            @empty
                                <!-- Styled Empty State -->
                                <li class="py-12 px-4 text-center">
                                    <div class="mx-auto w-12 h-12 rounded-full bg-rose-50 text-[#fb7185] flex items-center justify-center mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 font-medium">Make a Post</p>
                                    <p class="text-gray-400 text-sm mt-1 mb-4">No posts found in your database.</p>
                                    <a href="{{ url('posts/create') }}" class="px-4 py-2 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white text-sm font-semibold rounded-lg hover:scale-105 transition-transform inline-block">
                                        Create Post
                                    </a>
                                </li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Pagination Container -->
                    @if ($posts->hasPages())
                        <div class="mt-6">
                            {{ $posts->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </main>
    </div>
</x-layout>