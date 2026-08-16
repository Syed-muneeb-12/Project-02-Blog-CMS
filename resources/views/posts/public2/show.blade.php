<x-layout title="{{ $post->title }}">
    <!-- Main Public Wrapper -->
    <div class="relative min-h-screen bg-gradient-to-br from-green-50/60 via-slate-50 to-rose-50/60 py-10 px-4 sm:px-6 lg:px-8 overflow-hidden font-sans">
        
        <!-- Ambient Background Glow Orbs -->
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-[#4ade80]/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/4 -right-20 w-[28rem] h-[28rem] bg-[#fb7185]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-emerald-300/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-4xl mx-auto space-y-8 relative z-10">

            <!-- Top Navigation Bar -->
            <div class="flex items-center justify-between">
                <!-- Back Button -->
                <a href="{{ url('/') }}" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-bold text-slate-600 bg-white/70 backdrop-blur-md rounded-xl border border-slate-200/80 shadow-sm hover:bg-slate-50 hover:text-slate-900 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Explore
                </a>

                <!-- User Navigation -->
                <div class="flex items-center gap-3">
                    @guest
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-extrabold text-white bg-gradient-to-r from-[#4ade80] to-[#fb7185] rounded-xl shadow-lg shadow-rose-500/20 hover:scale-[1.02] transition-all duration-200">
                            Sign In
                        </a>
                    @endguest

                    @auth
                        <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-4 py-2 text-xs font-extrabold text-slate-700 bg-white border border-slate-200/80 rounded-xl shadow-xs hover:bg-slate-50 transition-all duration-200">
                            Dashboard
                        </a>
                    @endauth
                </div>
            </div>

            <!-- Main Post Article -->
            <article class="bg-white/80 backdrop-blur-xl rounded-3xl border border-slate-200/60 shadow-2xl shadow-emerald-500/5 overflow-hidden">
                
                <!-- Accent Top Border -->
                <div class="h-1.5 w-full bg-gradient-to-r from-[#4ade80] to-[#fb7185]"></div>

                <div class="p-8 sm:p-10 md:p-12">
                    
                    <!-- Post Header Section -->
                    <header class="mb-10 text-center sm:text-left">
                        
                        <!-- Category & Date -->
                        <div class="flex flex-wrap items-center justify-center sm:justify-start gap-4 mb-6 text-sm">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-200/70 shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                {{ $post->category->name }}
                            </span>
                            
                            <span class="text-slate-400 flex items-center gap-1.5 font-medium">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $post->created_at ? $post->created_at->format('F j, Y') : '' }}
                            </span>
                        </div>

                        <!-- Title -->
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-900 mb-8 leading-tight tracking-tight">
                            {{ $post->title }}
                        </h1>
                        
                        <!-- Author Info -->
                        <div class="flex items-center justify-center sm:justify-start gap-3 p-4 bg-slate-50/50 rounded-2xl border border-slate-100/80 inline-flex">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#4ade80] to-[#fb7185] p-[1.5px] shadow-sm">
                                <div class="w-full h-full rounded-full bg-white flex items-center justify-center text-sm font-black text-slate-800 uppercase">
                                    {{ substr($post->user->name, 0, 1) }}
                                </div>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-medium mb-0.5">Written by</p>
                                <p class="text-sm font-bold text-slate-800">
                                    {{ $post->user->name }}
                                </p>
                            </div>
                        </div>

                    </header>

                    <!-- Featured Image -->
                    @if ($post->featured_image)
                        <figure class="mb-10 rounded-2xl overflow-hidden border border-slate-100 shadow-lg shadow-slate-200/50">
                            <img 
                                src="{{ asset('storage/' . $post->featured_image) }}"
                                alt="{{ $post->title }}"
                                class="w-full h-auto max-h-[500px] object-cover hover:scale-[1.02] transition-transform duration-700 ease-in-out"
                            >
                        </figure>
                    @endif

                    <!-- Post Body Content -->
                    <div class="prose prose-slate prose-emerald md:prose-lg max-w-none text-slate-700 leading-relaxed font-normal">
                        {{ $post->body }}
                    </div>

                </div>
                
                <!-- Bottom Footer (Optional share/bottom navigation) -->
                <div class="px-8 py-6 bg-slate-50/80 border-t border-slate-100 flex justify-center sm:justify-between items-center">
                    <p class="text-xs font-semibold text-slate-400 hidden sm:block">
                        Thanks for reading!
                    </p>
                    <a href="{{ url('/') }}" class="inline-flex items-center text-sm font-bold text-emerald-600 hover:text-[#fb7185] transition-colors">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Return to all articles
                    </a>
                </div>

            </article>

        </div>
    </div>
</x-layout>