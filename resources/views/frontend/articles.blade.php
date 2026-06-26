@extends('layouts.app')

@section('title', 'Artikel RS Madani')

@section('content')
{{-- Banner --}}
<section class="relative bg-primary overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-primary via-[#1e3055] to-[#13203B]"></div>
    <div class="absolute top-[-20%] right-[-10%] w-[600px] h-[600px] bg-gradient-to-bl from-accent/10 via-accent/5 to-transparent rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-30%] left-[-10%] w-[500px] h-[500px] bg-gradient-to-tr from-blue-500/8 via-blue-500/3 to-transparent rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-secondary to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="animate-fade-in">
            <nav class="flex items-center gap-1.5 text-sm mb-6">
                <a href="{{ url('/') }}" class="px-3 py-1.5 rounded-lg bg-white/5 text-text-light/60 hover:bg-white/10 hover:text-text-light transition-all duration-200">Home</a>
                <svg class="w-3.5 h-3.5 text-text-light/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium">Artikel</span>
            </nav>
            <div class="flex items-start gap-5">
                <div class="w-1 h-16 bg-gradient-to-b from-accent to-accent/20 rounded-full shrink-0 mt-2"></div>
                <div>
                    <h1 class="text-3xl md:text-5xl font-bold text-text-light mb-3">Artikel & Berita</h1>
                    <p class="text-text-light/60 text-base md:text-lg max-w-2xl">Informasi kesehatan terbaru dan edukatif dari RS Madani</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Article Grid --}}
<section class="py-12 md:py-16 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($articles->count() > 0)
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach ($articles as $article)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl hover:border-accent/20 transition-all duration-500 fade-in-section hover:-translate-y-1">
                        <div class="relative h-52 overflow-hidden">
                            @if ($article->image)
                                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3 bg-accent/90 text-white text-xs font-semibold px-3 py-1.5 rounded-full backdrop-blur-sm">
                                {{ $article->published_at ? $article->published_at->isoFormat('D MMM Y') : $article->created_at->isoFormat('D MMM Y') }}
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center gap-2 text-xs text-text-dark/40 mb-3">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                <span>{{ $article->author ?? 'Admin' }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-primary mb-2 line-clamp-2 group-hover:text-accent transition-colors">{{ $article->title }}</h3>
                            <p class="text-sm text-text-dark/60 leading-relaxed mb-4 line-clamp-3">{{ $article->excerpt ?? Str::limit(strip_tags($article->content), 120) }}</p>
                            <a href="{{ route('artikel.show', $article->slug) }}"
                                class="inline-flex items-center gap-2 text-accent font-semibold text-sm group-hover:gap-3 transition-all duration-300">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($articles instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="mt-10">
                    {{ $articles->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-20 fade-in-section">
                <div class="w-20 h-20 rounded-2xl bg-accent/10 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-10 h-10 text-accent/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-primary mb-2">Belum Ada Artikel</h3>
                <p class="text-text-dark/50">Belum tersedia artikel saat ini. Silakan kunjungi kembali nanti.</p>
            </div>
        @endif
    </div>
</section>
@endsection



