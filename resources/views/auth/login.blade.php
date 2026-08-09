<x-layout title="Login">
    <!-- Main Wrapper (Matches body theme) -->
    <div class="flex min-h-screen items-center justify-center bg-gradient-to-br from-green-50 via-gray-50 to-rose-50 font-sans overflow-hidden px-4 relative">
        
        <!-- Abstract Watermark/Floating Elements (Background) -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
            <div class="absolute top-10 left-10 md:left-20 w-64 h-64 border-[40px] border-[#4ade80]/10 rounded-full blur-sm"></div>
            <div class="absolute -bottom-20 right-4 md:right-10 w-96 h-96 border-[60px] border-[#fb7185]/10 rounded-full blur-md"></div>
            <div class="absolute top-1/4 right-1/4 w-12 h-12 bg-[#fb7185]/20 rounded-full blur-sm"></div>
        </div>

        <!-- Content Card -->
        <div class="w-full max-w-md bg-white p-8 md:p-10 rounded-2xl shadow-xl border border-gray-100 relative z-10">
            
            <!-- Header -->
            <div class="mb-8 pb-6 border-b border-gray-100 text-center">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                    Welcome Back
                </h2>
                <p class="text-gray-500 mt-2 text-sm">Log in to your account</p>
            </div>

            <!-- Form -->
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all duration-200" 
                           placeholder="you@example.com" />
                    @error('email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                    <input id="password" name="password" type="password" required 
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg shadow-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-emerald-500/30 focus:border-emerald-500 transition-all duration-200" 
                           placeholder="••••••••" />
                    @error('password')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full flex justify-center items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg shadow hover:scale-105 hover:shadow-lg transition-all duration-200">
                        Log in
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>

                <!-- Link to Register -->
                <div class="text-center text-sm pt-4 border-t border-gray-100">
                    <span class="text-gray-600">Don't have an account? </span>
                    <a href="{{ route('register') }}" class="font-semibold text-[#4ade80] hover:text-[#fb7185] transition-colors duration-300">
                        Register here
                    </a>
                </div>
                
            </form>
        </div>
    </div>
</x-layout>