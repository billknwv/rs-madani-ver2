@extends('layouts.app')

@section('title', $article->title . ' - RS Madani')

@section('meta_description', Str::limit(strip_tags($article->content), 160))

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
                <a href="{{ route('artikel') }}" class="px-3 py-1.5 rounded-lg bg-white/5 text-text-light/60 hover:bg-white/10 hover:text-text-light transition-all duration-200">Artikel</a>
                <svg class="w-3.5 h-3.5 text-text-light/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium truncate max-w-[250px]">{{ $article->title }}</span>
            </nav>
        </div>
    </div>
</section>

{{-- Article Content --}}
<section class="py-12 md:py-16 bg-secondary">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-section">
            @if ($article->image)
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                    class="w-full h-64 md:h-80 object-cover">
            @else
                <div class="w-full h-64 md:h-80 bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                    <svg class="w-20 h-20 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </div>
            @endif

            <div class="p-6 md:p-10">
                <h1 class="text-2xl md:text-3xl font-bold text-primary mb-4">{{ $article->title }}</h1>

                <div class="flex flex-wrap items-center gap-4 text-sm text-text-dark/50 mb-6 pb-6 border-b border-gray-100">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-text-dark/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        {{ $article->author ?? 'Admin' }}
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-text-dark/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ $article->published_at ? $article->published_at->isoFormat('D MMMM Y') : $article->created_at->isoFormat('D MMMM Y') }}
                    </span>
                </div>

                <div class="prose prose-gray max-w-none text-text-dark/80 leading-relaxed">
                    {!! nl2br(e($article->content)) !!}
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <a href="{{ route('artikel') }}"
                        class="inline-flex items-center gap-2 text-sm font-semibold text-accent hover:gap-3 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        Kembali ke Artikel
                    </a>
                </div>
            </div>
        </article>
    </div>
</section>

{{-- Related Articles --}}
@if ($relatedArticles && $relatedArticles->count() > 0)
<section class="pb-16 md:pb-20 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="fade-in-section">
            <h2 class="text-xl font-bold text-primary mb-8">Artikel Terkait</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                @foreach ($relatedArticles as $related)
                    <a href="{{ route('artikel.show', $related->slug) }}"
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg hover:border-accent/20 transition-all duration-300 hover:-translate-y-1">
                        <div class="relative h-40 overflow-hidden">
                            @if ($related->image)
                                <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                                    <svg class="w-10 h-10 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3 bg-accent/90 text-white text-xs font-semibold px-2.5 py-1 rounded-full backdrop-blur-sm">
                                {{ $related->published_at ? $related->published_at->isoFormat('D MMM Y') : $related->created_at->isoFormat('D MMM Y') }}
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-primary mb-1 line-clamp-2 group-hover:text-accent transition-colors">{{ $related->title }}</h3>
                            <p class="text-xs text-text-dark/50 line-clamp-2 mb-3">{{ $related->excerpt ?? Str::limit(strip_tags($related->content), 80) }}</p>
                            <span class="inline-flex items-center gap-1.5 text-accent text-sm font-semibold group-hover:gap-2.5 transition-all duration-300">
                                Baca
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
@endsection



