@extends('layouts.app')

@section('title', 'Profil RS Madani')

@section('content')
<style>
    .nav-link-active {
        @apply bg-accent text-white shadow-lg shadow-accent/25;
    }
</style>

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
                <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium">Profil</span>
            </nav>
            <div class="flex items-start gap-5">
                <div class="w-1 h-16 bg-gradient-to-b from-accent to-accent/20 rounded-full shrink-0 mt-2"></div>
                <div>
                    <h1 class="text-3xl md:text-5xl font-bold text-text-light mb-3">Profil RS Madani</h1>
                    <p class="text-text-light/60 text-base md:text-lg max-w-2xl">Mengenal lebih dekat rumah sakit kami, sejarah, visi misi, serta struktur organisasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Main Content --}}
<section class="py-10 md:py-14 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-10">

            {{-- Sidebar Navigation --}}
            <div class="lg:col-span-3 mb-8 lg:mb-0">
                <div class="lg:sticky lg:top-28 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-5 py-4 bg-primary">
                        <h3 class="text-text-light font-semibold text-sm">Menu Profil</h3>
                    </div>
                    <nav class="p-3 space-y-1" id="sidebar-nav">
                        <a href="#tentang" data-tab="tentang" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-text-dark/70 hover:bg-accent/5 hover:text-accent transition-all duration-200" onclick="switchTab('tentang', this)">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Tentang Kami
                        </a>
                        <a href="#sejarah" data-tab="sejarah" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-text-dark/70 hover:bg-accent/5 hover:text-accent transition-all duration-200" onclick="switchTab('sejarah', this)">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                            Sejarah
                        </a>
                        <a href="#visi-misi" data-tab="visi-misi" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-text-dark/70 hover:bg-accent/5 hover:text-accent transition-all duration-200" onclick="switchTab('visi-misi', this)">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                            Visi & Misi
                        </a>
                        <a href="#direktur" data-tab="direktur" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-text-dark/70 hover:bg-accent/5 hover:text-accent transition-all duration-200" onclick="switchTab('direktur', this)">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Sambutan Direktur
                        </a>
                        <a href="#struktur" data-tab="struktur" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-text-dark/70 hover:bg-accent/5 hover:text-accent transition-all duration-200" onclick="switchTab('struktur', this)">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/></svg>
                            Struktur Organisasi
                        </a>
                        <a href="#akreditasi" data-tab="akreditasi" class="nav-link flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium text-text-dark/70 hover:bg-accent/5 hover:text-accent transition-all duration-200" onclick="switchTab('akreditasi', this)">
                            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/></svg>
                            Akreditasi
                        </a>
                    </nav>
                </div>
            </div>

            {{-- Content Area --}}
            <div class="lg:col-span-9 space-y-8">

                {{-- Tentang Kami --}}
                <div id="tentang" class="tab-content">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-section">
                        <div class="bg-gradient-to-r from-primary to-[#1a2d52] px-6 md:px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-accent/20 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-text-light">Tentang Kami</h2>
                                    <p class="text-text-light/60 text-sm">Mengenal lebih dekat RS Madani</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 md:px-8 py-8">
                            <div class="prose prose-lg max-w-none text-text-dark/70 leading-relaxed">
                                @if(!empty($profiles['about']))
                                    {!! nl2br(e($profiles['about'])) !!}
                                @else
                                    <div class="text-center py-12">
                                        <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                        <p class="text-text-dark/40">Belum ada data tentang kami</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Sejarah --}}
                <div id="sejarah" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-section">
                        <div class="bg-gradient-to-r from-primary to-[#1a2d52] px-6 md:px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-accent/20 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                                </div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-text-light">Sejarah RS Madani</h2>
                                    <p class="text-text-light/60 text-sm">Perjalanan panjang melayani masyarakat</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 md:px-8 py-8">
                            @php $paragraphs = explode("\n", trim($profiles['history'] ?? '')); @endphp
                            @if(count(array_filter($paragraphs)) > 0)
                                <div class="relative pl-8 border-l-2 border-accent/30 space-y-8">
                                    @foreach($paragraphs as $index => $paragraph)
                                        @if(trim($paragraph))
                                            <div class="relative fade-in-section">
                                                <div class="absolute -left-[2.35rem] top-1 w-4 h-4 rounded-full bg-accent border-4 border-white shadow-sm shadow-accent/20"></div>
                                                <div class="bg-secondary rounded-xl p-5 border border-gray-100">
                                                    <p class="text-text-dark/70 leading-relaxed">{{ trim($paragraph) }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-12">
                                    <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/></svg>
                                    <p class="text-text-dark/40">Belum ada data sejarah</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Visi & Misi --}}
                <div id="visi-misi" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-section">
                        <div class="bg-gradient-to-r from-primary to-[#1a2d52] px-6 md:px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-accent/20 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-text-light">Visi & Misi</h2>
                                    <p class="text-text-light/60 text-sm">Arah dan tujuan RS Madani</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 md:px-8 py-8">
                            @php
                                $visiMisi = $profiles['vision_mission'] ?? '';
                                $visi = '';
                                $misi = '';
                                if (str_contains($visiMisi, 'Visi:') || str_contains($visiMisi, 'Visi :')) {
                                    $parts = preg_split('/Misi:\s*/i', $visiMisi, 2);
                                    $visiPart = $parts[0];
                                    $visi = trim(preg_replace('/^Visi:\s*/i', '', $visiPart));
                                    $misi = isset($parts[1]) ? trim($parts[1]) : '';
                                } else {
                                    $visi = $visiMisi;
                                }
                            @endphp
                            @if($visi || $misi)
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="bg-gradient-to-br from-accent/5 to-accent/10 rounded-2xl p-6 md:p-8 border border-accent/10">
                                        <div class="w-14 h-14 bg-accent/10 rounded-xl flex items-center justify-center mb-5">
                                            <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-primary mb-4">Visi</h3>
                                        <p class="text-text-dark/70 leading-relaxed">{{ $visi }}</p>
                                    </div>
                                    <div class="bg-gradient-to-br from-primary/5 to-primary/10 rounded-2xl p-6 md:p-8 border border-primary/10">
                                        <div class="w-14 h-14 bg-primary/10 rounded-xl flex items-center justify-center mb-5">
                                            <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                                        </div>
                                        <h3 class="text-xl font-bold text-primary mb-4">Misi</h3>
                                        @php $misiItems = explode("\n", $misi); @endphp
                                        <ul class="space-y-3">
                                            @foreach($misiItems as $item)
                                                @if(trim($item))
                                                    <li class="flex items-start gap-3 text-text-dark/70">
                                                        <svg class="w-5 h-5 text-accent mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                        <span>{{ trim(preg_replace('/^-\s*/', '', $item)) }}</span>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="text-center py-12">
                                    <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    <p class="text-text-dark/40">Belum ada data visi & misi</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Sambutan Direktur --}}
                <div id="direktur" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-section">
                        <div class="bg-gradient-to-r from-primary to-[#1a2d52] px-6 md:px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-accent/20 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-text-light">Sambutan Direktur</h2>
                                    <p class="text-text-light/60 text-sm">Kata sambutan dari direktur utama</p>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex">
                            <div class="md:w-80 shrink-0 bg-gradient-to-br from-primary to-primary/80 p-8 flex flex-col items-center justify-center text-center border-b md:border-b-0 md:border-r border-white/10">
                                @if(!empty($profiles['director_photo']))
                                    <img src="{{ $profiles['director_photo'] }}" alt="Direktur RS Madani" class="w-40 h-40 rounded-2xl object-cover shadow-lg mb-4 ring-4 ring-accent/20">
                                @else
                                    <div class="w-40 h-40 rounded-2xl bg-accent/10 flex items-center justify-center mb-4 ring-4 ring-accent/10">
                                        <svg class="w-20 h-20 text-accent/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    </div>
                                @endif
                                <h3 class="text-text-light font-semibold text-lg">Direktur RS Madani</h3>
                                <p class="text-text-light/50 text-sm mt-1">dr. [Nama Direktur], Spesialis</p>
                                <div class="mt-4 flex gap-1.5">
                                    <span class="w-2 h-2 rounded-full bg-accent"></span>
                                    <span class="w-2 h-2 rounded-full bg-accent/60"></span>
                                    <span class="w-2 h-2 rounded-full bg-accent/30"></span>
                                </div>
                            </div>
                            <div class="flex-1 p-6 md:p-10">
                                <div class="relative">
                                    <svg class="w-12 h-12 text-accent/10 absolute -top-3 -left-3" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
                                    <div class="relative text-text-dark/70 leading-relaxed whitespace-pre-line">
                                        @if(!empty($profiles['director_message']))
                                            {{ $profiles['director_message'] }}
                                        @else
                                            <div class="text-center py-8">
                                                <svg class="w-16 h-16 text-gray-200 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                <p class="text-text-dark/40">Belum ada sambutan direktur</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Struktur Organisasi --}}
                <div id="struktur" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-section">
                        <div class="bg-gradient-to-r from-primary to-[#1a2d52] px-6 md:px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-accent/20 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/></svg>
                                </div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-text-light">Struktur Organisasi</h2>
                                    <p class="text-text-light/60 text-sm">Bagan struktur organisasi RS Madani</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 md:px-8 py-8">
                            @if(!empty($profiles['structure_image']))
                                <div class="bg-secondary rounded-2xl p-4 md:p-6 border border-gray-100">
                                    <img src="{{ $profiles['structure_image'] }}" alt="Struktur Organisasi RS Madani" class="w-full h-auto rounded-xl shadow-md">
                                </div>
                            @else
                                <div class="text-center py-16 bg-secondary rounded-2xl border border-gray-100">
                                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/></svg>
                                    <p class="text-text-dark/40">Belum ada data struktur organisasi</p>
                                </div>
                            @endif
                            @if(!empty($profiles['organizational_structure']))
                                <div class="mt-6 prose prose-lg max-w-none text-text-dark/70">
                                    {!! nl2br(e($profiles['organizational_structure'])) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- Akreditasi --}}
                <div id="akreditasi" class="tab-content hidden">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-section">
                        <div class="bg-gradient-to-r from-primary to-[#1a2d52] px-6 md:px-8 py-6">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-accent/20 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z"/></svg>
                                </div>
                                <div>
                                    <h2 class="text-xl md:text-2xl font-bold text-text-light">Akreditasi</h2>
                                    <p class="text-text-light/60 text-sm">Sertifikat dan penghargaan yang diraih</p>
                                </div>
                            </div>
                        </div>
                        <div class="px-6 md:px-8 py-8">
                            @if(!empty($profiles['accreditation']))
                                <div class="prose prose-lg max-w-none text-text-dark/70 leading-relaxed mb-8">
                                    {!! nl2br(e($profiles['accreditation'])) !!}
                                </div>
                            @endif
                            @if(!empty($profiles['accreditation_image']))
                                <div class="bg-secondary rounded-2xl p-4 md:p-6 border border-gray-100">
                                    <img src="{{ $profiles['accreditation_image'] }}" alt="Sertifikat Akreditasi RS Madani" class="w-full h-auto rounded-xl shadow-md mx-auto max-w-lg">
                                </div>
                            @else
                                <div class="text-center py-16 bg-secondary rounded-2xl border border-gray-100">
                                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                                    <p class="text-text-dark/40">Belum ada data akreditasi</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    function switchTab(tabId, triggerEl) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        const target = document.getElementById(tabId);
        if (target) {
            target.classList.remove('hidden');
            target.querySelectorAll('.fade-in-section').forEach(el => {
                el.classList.add('is-visible');
            });
        }
        document.querySelectorAll('#sidebar-nav .nav-link').forEach(btn => {
            btn.classList.remove('nav-link-active', 'bg-accent', 'text-white', 'shadow-lg', 'shadow-accent/25');
            btn.classList.add('text-text-dark/70');
        });
        if (triggerEl) {
            triggerEl.classList.remove('text-text-dark/70');
            triggerEl.classList.add('nav-link-active', 'bg-accent', 'text-white', 'shadow-lg', 'shadow-accent/25');
        } else {
            const activeLink = document.querySelector(`#sidebar-nav [data-tab="${tabId}"]`);
            if (activeLink) {
                activeLink.classList.remove('text-text-dark/70');
                activeLink.classList.add('nav-link-active', 'bg-accent', 'text-white', 'shadow-lg', 'shadow-accent/25');
            }
        }
        window.location.hash = tabId;
    }

    (function() {
        let hash = window.location.hash.replace('#', '');
        const validTabs = ['tentang', 'sejarah', 'visi-misi', 'direktur', 'struktur', 'akreditasi'];
        if (!hash || !validTabs.includes(hash)) hash = 'tentang';
        const activeLink = document.querySelector(`#sidebar-nav [data-tab="${hash}"]`);
        switchTab(hash, activeLink);
    })();

</script>
@endpush
