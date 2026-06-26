@extends('layouts.app')

@section('title', $room['name'] . ' - RS Madani')

@php
$fruitIcons = [
    'perinatologi' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2a3 3 0 00-3 3v1.5a3 3 0 006 0V5a3 3 0 00-3-3z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4a4 4 0 01-4 4H5.5a2.5 2.5 0 000 5H12a7 7 0 007-7v-1.5a3 3 0 00-3-3H12z"/></svg>',
    'cherry' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="9" cy="17" r="4"/><circle cx="17" cy="15" r="4"/><path stroke-linecap="round" d="M9 13c0-4 4-8 8-10"/><path stroke-linecap="round" d="M17 11c0-4-4-8-8-10"/></svg>',
    'watermelon' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12a9 9 0 1118 0H3z"/><circle cx="8" cy="14" r="1" fill="currentColor"/><circle cx="12" cy="16" r="1" fill="currentColor"/><circle cx="16" cy="14" r="1" fill="currentColor"/></svg>',
    'melon' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" d="M6 12h12M9 8l-2 4M15 8l2 4M9 16l-2-4M15 16l2-4"/></svg>',
    'jackfruit' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><ellipse cx="12" cy="13" rx="7" ry="9"/><path stroke-linecap="round" d="M7 10c2-1 5-1 7 0M7 16c2 1 5 1 7 0M5 13h14"/></svg>',
    'rambutan' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="12" cy="13" r="7"/><path stroke-linecap="round" d="M5 8c1 2 2 4 2 7M19 8c-1 2-2 4-2 7M12 6V3M8 7l-3-3M16 7l3-3"/></svg>',
    'guava' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="12" cy="13" r="8"/><path stroke-linecap="round" d="M12 5V3M18 9l2-2M8 9L6 7M12 21v-2"/></svg>',
    'orange' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="12" cy="12" r="9"/><path stroke-linecap="round" d="M12 3v18M3 12h18"/><path stroke-linecap="round" d="M7 7l10 10M17 7L7 17"/></svg>',
    'passion' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><ellipse cx="12" cy="12" rx="6" ry="9" transform="rotate(15,12,12)"/><circle cx="12" cy="12" r="3"/><path stroke-linecap="round" d="M2 12h3M19 12h3"/></svg>',
    'sapodilla' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><ellipse cx="12" cy="13" rx="5" ry="7"/><path stroke-linecap="round" d="M12 6V4M12 22v-2"/></svg>',
    'mangosteen' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="12" cy="13" r="8"/><path stroke-linecap="round" d="M8 6l4-3 4 3M12 3v2M8 15c0 2 1.5 3 4 3s4-1 4-3"/></svg>',
    'salak' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><ellipse cx="12" cy="13" rx="4" ry="7"/><path stroke-linecap="round" d="M9 10c2-1 5-1 7 0M9 16c2 1 5 1 7 0M8 13h8"/></svg>',
    'srikaya' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="12" cy="13" r="7"/><path stroke-linecap="round" d="M8 10c2-2 4 0 5 0s3-2 5 0M8 16c2 2 4 0 5 0s3 2 5 0"/></svg>',
    'grape' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><circle cx="12" cy="5" r="2"/><circle cx="8" cy="10" r="2.5"/><circle cx="16" cy="10" r="2.5"/><circle cx="6" cy="16" r="2.5"/><circle cx="12" cy="16" r="2.5"/><circle cx="18" cy="16" r="2.5"/><circle cx="9" cy="21" r="2"/><circle cx="15" cy="21" r="2"/></svg>',
];

$badgeClass = $categorySlug === 'non-jiwa' ? 'bg-primary/10 text-primary' : 'bg-accent/10 text-accent';
$statusBadge = $room['status'] === 'tersedia' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700';
$availabilityIcon = $room['status'] === 'tersedia' ? 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z' : 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z';
@endphp

@section('content')
<style>
    .stagger-item:nth-child(1) { transition-delay: 0s; }
    .stagger-item:nth-child(2) { transition-delay: 0.08s; }
    .stagger-item:nth-child(3) { transition-delay: 0.16s; }
    .stagger-item:nth-child(4) { transition-delay: 0.24s; }
    .stagger-item:nth-child(5) { transition-delay: 0.32s; }
    .stagger-item:nth-child(6) { transition-delay: 0.40s; }
    .stagger-item:nth-child(7) { transition-delay: 0.48s; }
    .stagger-item:nth-child(8) { transition-delay: 0.56s; }
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
                <a href="{{ route('layanan') }}" class="px-3 py-1.5 rounded-lg bg-white/5 text-text-light/60 hover:bg-white/10 hover:text-text-light transition-all duration-200">Layanan</a>
                <svg class="w-3.5 h-3.5 text-text-light/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('layanan.rawat-inap') }}" class="px-3 py-1.5 rounded-lg bg-white/5 text-text-light/60 hover:bg-white/10 hover:text-text-light transition-all duration-200">Rawat Inap</a>
                <svg class="w-3.5 h-3.5 text-text-light/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium">{{ $room['name'] }}</span>
            </nav>
            <div class="flex items-start gap-5">
                <div class="w-1 h-20 bg-gradient-to-b from-accent to-accent/20 rounded-full shrink-0 mt-2"></div>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center backdrop-blur-sm" style="color: {{ $room['fruit_color'] }};">
                        {!! $fruitIcons[$room['fruit_icon']] !!}
                    </div>
                    <div>
                        <h1 class="text-3xl md:text-5xl font-bold text-text-light">{{ $room['name'] }}</h1>
                        <span class="inline-flex items-center gap-1.5 mt-2 px-3 py-1 rounded-full text-xs font-semibold {{ $badgeClass }}">{{ $category }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Content --}}
<section class="py-16 md:py-20 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10 lg:gap-12">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-8">
                {{-- Photo --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-section">
                    <div class="relative h-56 md:h-72 overflow-hidden">
                        <img src="{{ asset('foto/ruangan/ruangan.png') }}" alt="{{ $room['name'] }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10 fade-in-section">
                    <h2 class="text-2xl font-bold text-primary mb-4">Tentang {{ $room['name'] }}</h2>
                    <p class="text-text-dark/60 leading-relaxed">{{ $room['long_description'] }}</p>
                </div>

                {{-- Facilities --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10 fade-in-section">
                    <h2 class="text-2xl font-bold text-primary mb-4">Fasilitas Ruangan</h2>
                    <div class="grid sm:grid-cols-2 gap-3">
                        @foreach($room['facilities'] as $facility)
                        <div class="flex items-center gap-3 text-text-dark/60">
                            <div class="w-8 h-8 rounded-lg bg-accent/10 flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-sm">{{ $facility }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Info Card --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 fade-in-section">
                    <h3 class="text-sm font-bold text-primary uppercase tracking-wider mb-4">Informasi Ruangan</h3>
                    <div class="space-y-4">
                        {{-- Category --}}
                        <div class="flex items-center gap-3 text-sm text-text-dark/60">
                            <svg class="w-4 h-4 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>{{ $category }}</span>
                        </div>

                        {{-- Capacity --}}
                        <div class="flex items-center gap-3 text-sm text-text-dark/60">
                            <svg class="w-4 h-4 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            <span>Kapasitas: <strong>{{ $room['capacity'] }} tempat tidur</strong></span>
                        </div>

                        {{-- Availability --}}
                        <div class="flex items-center gap-3 text-sm">
                            <svg class="w-4 h-4 shrink-0 {{ $room['status'] === 'tersedia' ? 'text-green-500' : 'text-red-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $availabilityIcon }}"/></svg>
                            <span>Ketersediaan: <strong class="{{ $room['status'] === 'tersedia' ? 'text-green-600' : 'text-red-600' }}">{{ $room['availability'] }}</strong></span>
                        </div>

                        {{-- Classes --}}
                        <div class="flex items-start gap-3 text-sm text-text-dark/60">
                            <svg class="w-4 h-4 mt-0.5 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                            <div>
                                <span>Kelas Ruangan:</span>
                                <div class="flex flex-wrap gap-1.5 mt-1.5">
                                    @foreach($room['classes'] as $class)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-semibold bg-primary/5 text-primary">{{ $class }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Status Card --}}
                <div class="rounded-2xl p-6 fade-in-section {{ $room['status'] === 'tersedia' ? 'bg-gradient-to-br from-green-500 to-emerald-600 text-white' : 'bg-gradient-to-br from-red-500 to-rose-600 text-white' }}">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $availabilityIcon }}"/></svg>
                        <div>
                            <h4 class="font-bold text-lg">{{ $room['status'] === 'tersedia' ? 'Tersedia' : 'Penuh' }}</h4>
                            <p class="text-sm text-white/80">{{ $room['availability'] }}</p>
                        </div>
                    </div>
                </div>

                {{-- Back to Rawat Inap --}}
                <div class="fade-in-section">
                    <a href="{{ route('layanan.rawat-inap') }}" class="flex items-center justify-center gap-2 w-full py-3 px-4 bg-white border-2 border-gray-100 hover:border-accent/30 text-primary font-semibold text-sm rounded-xl transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m0 0l7 7m-7-7l7-7"/></svg>
                        Kembali ke Rawat Inap
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03]">
        <div class="w-full h-full" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.5'%3E%3Ccircle cx='2' cy='2' r='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
    </div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in-section">
        <h2 class="text-3xl md:text-4xl font-bold text-text-light mb-4">Butuh Informasi Lebih Lanjut?</h2>
        <p class="text-text-light/70 max-w-2xl mx-auto mb-8 text-lg">Hubungi tim kami untuk informasi ketersediaan ruangan dan proses pendaftaran rawat inap.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2.5 bg-accent hover:bg-[#e02e4f] text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg shadow-accent/25 hover:shadow-accent/40 hover:-translate-y-0.5">Hubungi Kami</a>
    </div>
</section>
@endsection



