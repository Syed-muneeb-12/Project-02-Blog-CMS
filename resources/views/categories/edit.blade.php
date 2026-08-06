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
                
                <!-- Header -->
                <div class="mb-8 text-center md:text-left">
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                        Edit New Category
                    </h1>
                    <p class="text-gray-500 mt-2 text-sm">Add a new section to organize your platform's content.</p>
                </div>

                <!-- Proper Laravel Form -->
                <form action="{{ route('categories.update', $category->slug) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Field 1: Category Name -->
                    <div>
                        <label for="Name" class="block text-gray-700 font-medium text-sm mb-2">
                           Edit Category  <span class="text-[#fb7185]">*</span>
                        </label>
                        <!-- Added name="name" here so Laravel receives the input -->
                        <input type="text" id="Name" name="name" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#fb7185]/50 focus:border-[#fb7185] transition-colors shadow-sm"
                            value="{{ old('name', $category->name) }}">
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-4 flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-4 gap-3 sm:gap-0 border-t border-gray-100">
                        <!-- Changed Cancel to an anchor tag to go back -->
                        <a href="{{ route('categories.index') }}" 
                            class="px-6 py-3 border-2 border-gray-700 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors w-full sm:w-auto text-center block">
                            Cancel
                        </a>

                        <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg hover:scale-105 hover:shadow-lg transition-all duration-200 w-full sm:w-auto text-center">
                            Edit Category
                        </button>
                    <form action="{{ route('categories.destroy',$category->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </div>

                </form>
            </div>
        </main>
    </div>
</x-layout>