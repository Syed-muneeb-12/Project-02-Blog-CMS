<x-layout title="Create Post">
    <!-- Main Wrapper (Matches body theme) -->
    <div class="flex h-screen bg-gradient-to-br from-green-50 via-gray-50 to-rose-50 font-sans overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-64 bg-[#2A2A2A] flex-shrink-0 hidden md:flex flex-col border-r border-gray-800">
            <div class="p-6">
                <h2 class="text-white text-xl font-bold tracking-wider">ADMIN<span class="text-[#fb7185]">PANEL</span></h2>
            </div>
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Dashboard</a>
                <a href="{{ route('posts.index') }}" class="block px-4 py-2.5 rounded-lg text-white bg-gray-800 transition-colors font-medium">Posts</a>
                <a href="{{ route('categories.index') }}" class="block px-4 py-2.5 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 transition-colors">Categories</a>
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
            <div class="bg-white w-full max-w-3xl rounded-2xl shadow-xl p-8 md:p-10 relative z-10 border border-gray-100 my-auto">
                
                <!-- Header -->
                <div class="mb-8 pb-6 border-b border-gray-100">
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                        Create Post
                    </h1>
                    <p class="text-gray-500 mt-1 text-sm">Draft and publish a new article for your blog.</p>
                </div>

                <!-- Form -->
                <form action="{{ route('posts.store') }}" method="post" class="space-y-6">
                    @csrf
                    
                    <!-- Title Input -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-1.5">Post Title</label>
                        <input 
                            type="text" 
                            name="title" 
                            id="title"
                            required
                            placeholder="Enter blog post title..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all duration-200"
                        >
                    </div>

                    <!-- Content Textarea -->
                    <div>
                        <label for="content" class="block text-sm font-semibold text-gray-700 mb-1.5">Post Content</label>
                        <textarea 
                            name="body" 
                            id="body" 
                            rows="6"
                            required
                            placeholder="Write your blog content here..."
                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all duration-200 resize-y"
                        ></textarea>
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
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all duration-200 cursor-pointer"
                            >
                                <option value="">Select a category...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>                    
                                @endforeach
                            </select>
                        </div>

                        <!-- Status Select -->
                        <div>
                            <label for="status" class="block text-sm font-semibold text-gray-700 mb-1.5">Status</label>
                            <select 
                                name="status" 
                                id="status"
                                required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all duration-200 cursor-pointer"
                            >
                                <option value="draft">Draft</option>
                                <option value="published">Publish</option>
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6 mt-6 border-t border-gray-100 flex justify-end">
                        <button 
                            type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg shadow hover:scale-105 hover:shadow-lg transition-all duration-200 inline-flex items-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Submit Post
                        </button>
                    </div>
                </form>

            </div>
        </main>
    </div>
</x-layout>