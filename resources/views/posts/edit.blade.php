<x-layout title="Edit Post">
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
            <div class="p-6 md:p-8 relative z-10 overflow-y-auto">
                
                <!-- Content Card -->
                <div class="bg-white w-full max-w-3xl mx-auto rounded-2xl shadow-xl p-8 md:p-10 relative z-10 border border-gray-100">
                    
                    <!-- Header -->
                    <div class="mb-8 pb-6 border-b border-gray-100">
                        <h2 class="text-3xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                            Create Post
                        </h2>
                        <p class="text-gray-500 mt-1 text-sm">Draft and publish a new article for your blog.</p>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('posts.update',$post) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- Title Input -->
                        <div>
                            <label for="title" class="block text-sm font-semibold text-gray-700 mb-1.5">Post Title</label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title"
                                required
                                value="{{ old('title',$post->title)  }}"
                                placeholder="Enter blog post title..."
                                class="w-full px-4 py-2.5 bg-gray-50 border rounded-lg shadow-sm focus:bg-white focus:outline-none transition-all duration-200 @error('title') border-red-500 focus:ring-2 focus:ring-red-500/30 focus:border-red-500 @else border-gray-200 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 @enderror"
                            >
                            @error('title')
                                <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content Textarea -->
                        <div>
                            <label for="body" class="block text-sm font-semibold text-gray-700 mb-1.5">Post Content</label>
                            <textarea 
                                name="body" 
                                id="body" 
                                rows="6"
                                required
                                placeholder="Write your blog content here..."
                                class="w-full px-4 py-2.5 bg-gray-50 border rounded-lg shadow-sm focus:bg-white focus:outline-none transition-all duration-200 resize-y @error('body') border-red-500 focus:ring-2 focus:ring-red-500/30 focus:border-red-500 @else border-gray-200 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 @enderror"
                            >{{ old('body',$post->body) }}</textarea>
                            @error('body')
                                <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category & Status Group -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Category Select -->
                            <div>
                                <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-1.5">Select a Category</label>
                                <select 
                                    name="category_id" 
                                    id="category_id"
                                    required
                                    class="w-full px-4 py-2.5 bg-gray-50 border rounded-lg shadow-sm focus:bg-white focus:outline-none transition-all duration-200 cursor-pointer @error('category_id') border-red-500 focus:ring-2 focus:ring-red-500/30 focus:border-red-500 @else border-gray-200 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 @enderror"
                                >
                                    <option value="">Select a category...</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id',$post->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>    
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Status Select -->
                            <div>
                                <label for="status" class="block text-sm font-semibold text-gray-700 mb-1.5">Status</label>
                                <select 
                                    name="status" 
                                    id="status"
                                    required
                                    class="w-full px-4 py-2.5 bg-gray-50 border rounded-lg shadow-sm focus:bg-white focus:outline-none transition-all duration-200 cursor-pointer @error('status') border-red-500 focus:ring-2 focus:ring-red-500/30 focus:border-red-500 @else border-gray-200 focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 @enderror"
                                >
                                    <option value="draft" {{ old('status',$post->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status',$post->status) === 'published' ? 'selected' : '' }}>Publish</option>
                                </select>
                                @error('status')
                                    <p class="text-red-500 text-xs mt-1.5 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-6 mt-6 border-t border-gray-100 flex flex-col-reverse sm:flex-row sm:justify-end gap-3 sm:gap-4">
                            <a href="{{ route('posts.index') }}" 
                                class="px-6 py-2.5 border border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition-colors w-full sm:w-auto text-center block">
                                Cancel
                            </a>
                            <button 
                                type="submit"
                                class="px-6 py-2.5 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg shadow hover:scale-105 hover:shadow-lg transition-all duration-200 inline-flex items-center justify-center gap-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Post
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </main>
    </div>
</x-layout>