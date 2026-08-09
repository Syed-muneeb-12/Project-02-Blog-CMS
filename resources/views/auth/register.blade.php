<x-layout title="Register">
    <!-- Main Wrapper (Dark Dashboard Theme) -->
    <div class="flex min-h-screen items-center justify-center bg-gray-900 font-sans overflow-hidden px-4 relative">
        
        <!-- Abstract Watermark/Floating Elements (Background) -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
            <div class="absolute top-10 left-10 md:left-20 w-64 h-64 border-[40px] border-[#4ade80]/10 rounded-full blur-sm"></div>
            <div class="absolute -bottom-20 right-4 md:right-10 w-96 h-96 border-[60px] border-[#fb7185]/10 rounded-full blur-md"></div>
            <div class="absolute top-1/4 right-1/4 w-12 h-12 bg-[#fb7185]/20 rounded-full blur-sm"></div>
        </div>

        <!-- Content Card -->
        <div class="w-full max-w-md bg-gray-900 p-8 md:p-10 rounded-2xl shadow-2xl border border-gray-800 relative z-10">
            
            <!-- Header -->
            <div class="mb-8 pb-6 border-b border-gray-800 text-center">
                <h2 class="text-3xl font-bold bg-gradient-to-r from-[#4ade80] to-[#fb7185] bg-clip-text text-transparent pb-1">
                    Create an Account
                </h2>
                <p class="text-gray-400 mt-2 text-sm">Sign up to get started</p>
            </div>

            <!-- Form -->
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf
                
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-300 mb-1.5">Name</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 text-gray-100 rounded-lg shadow-sm focus:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4ade80]/30 focus:border-[#4ade80] transition-all duration-200 placeholder-gray-500" 
                           placeholder="John Doe" />
                    @error('name')
                        <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-300 mb-1.5">Email address</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required 
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 text-gray-100 rounded-lg shadow-sm focus:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4ade80]/30 focus:border-[#4ade80] transition-all duration-200 placeholder-gray-500" 
                           placeholder="you@example.com" />
                    @error('email')
                        <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-300 mb-1.5">Password</label>
                    <input id="password" name="password" type="password" required 
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 text-gray-100 rounded-lg shadow-sm focus:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4ade80]/30 focus:border-[#4ade80] transition-all duration-200 placeholder-gray-500" 
                           placeholder="••••••••" />
                    @error('password')
                        <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-semibold text-gray-300 mb-1.5">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required 
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 text-gray-100 rounded-lg shadow-sm focus:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4ade80]/30 focus:border-[#4ade80] transition-all duration-200 placeholder-gray-500" 
                           placeholder="••••••••" />
                    @error('password_confirmation')
                        <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                            class="w-full flex justify-center items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-[#4ade80] to-[#fb7185] text-white font-semibold rounded-lg shadow hover:scale-105 hover:shadow-lg transition-all duration-200">
                        Sign up
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>

                <!-- Link to Login -->
                <div class="text-center text-sm pt-4 border-t border-gray-800">
                    <span class="text-gray-400">Already have an account? </span>
                    <a href="{{ route('login') }}" class="font-semibold text-[#4ade80] hover:text-[#fb7185] transition-colors duration-300">
                        Log in here
                    </a>
                </div>
                
            </form>
        </div>
    </div>
</x-layout>