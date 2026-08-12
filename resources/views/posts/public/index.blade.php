<x-layout title="Explore Posts">
    <div class="relative min-h-screen bg-gradient-to-br from-green-50/60 via-slate-50 to-rose-50/60 py-10 px-4 sm:px-6 lg:px-8 overflow-hidden font-sans">
        
        <!-- Ambient Background Glow Orbs -->
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-[#4ade80]/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute top-1/3 -right-20 w-[28rem] h-[28rem] bg-[#fb7185]/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-20 left-1/3 w-80 h-80 bg-emerald-300/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto space-y-8 relative z-10">

            <!-- Hero Header Bar -->
            <div class="relative rounded-3xl p-6 sm:p-8 bg-white/70 backdrop-blur-xl border border-white/80 shadow-2xl shadow-emerald-500/5 overflow-hidden">
                <div class="absolute -top-24 -right-24 w-72 h-72 bg-gradient-to-br from-[#4ade80]/20 to-[#fb7185]/20 rounded-full blur-2xl"></div>
                
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative z-10">
                    <div class="max-w-2xl space-y-2">
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-900 text-white shadow-xs">
                                <span class="w-2 h-2 rounded-full bg-[#4ade80]"></span>
                                Public Feed
                            </span>
                            <span class="text-xs font-semibold text-slate-500">Published Articles</span>
                        </div>

                        <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight leading-tight">
                            Explore <span class="bg-gradient-to-r from-[#4ade80] via-emerald-500 to-[#fb7185] bg-clip-text text-transparent">Community Posts</span>
                        </h1>

                        <p class="text-sm text-slate-600 font-normal leading-relaxed">
                            Discover stories, tutorials, and insights shared by creators across the platform.
                        </p>
                    </div>

                    <!-- Right Action Button Slot -->
                    <div class="flex items-center gap-3 shrink-0 w-full sm:w-auto">
                        @guest
                            <!-- Guest Action Prompt -->
                            <a href="{{ route('login') }}" class="flex-1 sm:flex-initial inline-flex items-center justify-center px-5 py-2.5 text-xs font-extrabold text-white bg-gradient-to-r from-[#4ade80] to-[#fb7185] rounded-xl shadow-lg shadow-rose-500/20 hover:scale-[1.02] transition-all duration-200">
                                Sign In
                            </a>
                            <a href="{{ route('register') }}" class="flex-1 sm:flex-initial inline-flex items-center justify-center px-5 py-2.5 text-xs font-extrabold text-slate-700 bg-white border border-slate-200/80 rounded-xl shadow-xs hover:bg-slate-50 transition-all duration-200">
                                Register
                            </a>
                        @endguest

                        @auth
                            <!-- Standard Authenticated User Access (No Admin Auth Built Yet) -->
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-xs font-extrabold text-white bg-gradient-to-r from-[#4ade80] to-[#fb7185] rounded-xl shadow-lg shadow-rose-500/20 hover:scale-[1.02] transition-all duration-200">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Dashboard
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            <!-- Feed Filter Bar -->
            <div class="flex items-center justify-between border-b border-slate-200/80 pb-4">
                <span class="px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-200/80">
                    All Published
                </span>
                <span class="text-xs text-slate-400 font-medium">Sorted by Latest</span>
            </div>

            <!-- Published Posts Feed Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($posts as $post)
                    <article class="group relative bg-white/80 backdrop-blur-md rounded-3xl border border-slate-100 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:shadow-emerald-500/10 hover:-translate-y-1.5 transition-all duration-300 overflow-hidden flex flex-col justify-between">
                        
                        <!-- Accent Top Border -->
                        <div class="h-1.5 w-full bg-gradient-to-r from-[#4ade80] to-[#fb7185] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                        <div class="p-6 space-y-4 flex-1 flex flex-col">
                            <!-- Category Badge & Date -->
                            <div class="flex items-center justify-between text-xs">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-200/70">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5"></span>
                                    {{ $post->category->name }}
                                </span>
                                
                                <span class="text-slate-400 font-medium text-[11px]">
                                    {{ $post->created_at ? $post->created_at->format('M d, Y') : '' }}
                                </span>
                            </div>

                            <!-- Post Title -->
                            <h2 class="text-lg font-black text-slate-900 group-hover:text-emerald-600 transition-colors duration-200 line-clamp-2 leading-snug">
                                <a href="{{ route('posts.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                        </div>

                        <!-- Post Footer: Author Info & Public View Link -->
                        <div class="px-6 py-4 bg-slate-50/70 border-t border-slate-100/80 flex items-center justify-between">
                            <div class="flex items-center space-x-2.5">
                                <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#4ade80] to-[#fb7185] p-[1.5px] shadow-xs">
                                    <div class="w-full h-full rounded-full bg-white flex items-center justify-center text-xs font-black text-slate-800 uppercase">
                                        {{ substr($post->user->name, 0, 1) }}
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-slate-800 truncate max-w-[110px]">
                                    {{ $post->user->name }}
                                </span>
                            </div>

                            <!-- Read Link -->
                            <a href="{{ route('posts.show', $post) }}" class="inline-flex items-center text-xs font-extrabold text-emerald-600 hover:text-[#fb7185] transition-colors">
                                Read Post
                                <svg class="w-3.5 h-3.5 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <!-- Empty Feed State -->
                    <div class="col-span-full bg-white/70 backdrop-blur-xl rounded-3xl border border-slate-200/60 p-10 text-center shadow-xl shadow-emerald-500/5 max-w-md mx-auto my-6">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-500">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                        </div>

                        <h3 class="text-lg font-black text-slate-900 mb-1">No Published Posts</h3>
                        <p class="text-xs text-slate-500 mb-5">There are no published articles available at the moment. Check back soon!</p>
                        
                        @guest
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-5 py-2 text-xs font-bold text-white bg-gradient-to-r from-[#4ade80] to-[#fb7185] rounded-xl shadow-md hover:scale-105 transition-all duration-200">
                                Sign In
                            </a>
                        @endguest
                    </div>
                @endforelse
            </div>

            <!-- Pagination Links -->
            @if ($posts->hasPages())
                <div class="pt-4 flex justify-center">
                    {{ $posts->links() }}
                </div>
            @endif

        </div>
    </div>
</x-layout>