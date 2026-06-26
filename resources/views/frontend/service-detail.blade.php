@extends('layouts.app')

@section('title', $service->name . ' - RS Madani')

@php
$clinicIcons = [
    'maternity' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 0v4m0-4h4m-4 0H8m12 4a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
    'child' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2l3 3h-2v4h-2V5H9l3-3zM7 12a5 5 0 0110 0H7z"/><path stroke-linecap="round" stroke-linejoin="round" d="M5 19a5 5 0 0110 0H5zM14 19a2 2 0 11-4 0"/></svg>',
    'internal' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>',
    'surgery' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14.121 14.121L19 19m-7-7l-7 7m4.95-9.95A7 7 0 1112 5a7 7 0 01-2.05 10.05z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 2v3m0 14v3m8.66-16.66l-2.12 2.12M5.46 18.54l-2.12 2.12M22 12h-3M5 12H2"/></svg>',
    'eye' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
    'skin' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>',
    'brain' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2a4 4 0 014 4v1.5a3.5 3.5 0 013.5 3.5v1a3.5 3.5 0 01-3.5 3.5V20a4 4 0 01-8 0v-4.5A3.5 3.5 0 014.5 12v-1A3.5 3.5 0 018 7.5V6a4 4 0 014-4z"/></svg>',
    'mental' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>',
    'dental' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2c2.5 0 4.5 1.5 5 4 .5 2.5 1 6 1 9 0 3-1.5 5-3.5 5s-2.5-2-2.5-4c0-2 0-4-1-4s-1 2-1 4c0 2-.5 4-2.5 4S6 18 6 15c0-3 .5-6.5 1-9 .5-2.5 2.5-4 5-4z"/></svg>',
    'ent' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2a3 3 0 00-3 3v1.5a3 3 0 006 0V5a3 3 0 00-3-3z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4a4 4 0 01-4 4H5.5a2.5 2.5 0 000 5H12"/><path stroke-linecap="round" stroke-linejoin="round" d="M19 12a7 7 0 01-7 7"/></svg>',
    'heart' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>',
    'growth' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605"/></svg>',
];

$serviceIconMap = [
    'heart' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
    'monitor' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
    'bed' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>',
    'shield' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>',
    'capsule' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
    'microscope' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>',
    'wave' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>',
    'rehab' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>',
    'mental' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0C2.546 15.697 2.023 15.546 1.5 15.546M21 12.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0C2.546 12.697 2.023 12.546 1.5 12.546M21 9.546C20.477 9.546 19.954 9.697 19.5 10a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0C2.546 9.697 2.023 9.546 1.5 9.546"/>',
];

$catColors = [
    'Layanan Medis' => ['badge' => 'bg-accent/10 text-accent', 'icon' => 'text-accent'],
    'Layanan Penunjang' => ['badge' => 'bg-primary/10 text-primary', 'icon' => 'text-primary'],
    'Layanan Unggulan' => ['badge' => 'bg-amber-100 text-amber-700', 'icon' => 'text-amber-500'],
];
$cc = $catColors[$service->category] ?? $catColors['Layanan Medis'];
@endphp

@section('content')
<style>
    .stagger-card:nth-child(1) { transition-delay: 0s; }
    .stagger-card:nth-child(2) { transition-delay: 0.06s; }
    .stagger-card:nth-child(3) { transition-delay: 0.12s; }
    .stagger-card:nth-child(4) { transition-delay: 0.18s; }
    .stagger-card:nth-child(5) { transition-delay: 0.24s; }
    .stagger-card:nth-child(6) { transition-delay: 0.30s; }
    .stagger-card:nth-child(7) { transition-delay: 0.36s; }
    .stagger-card:nth-child(8) { transition-delay: 0.42s; }
    .stagger-card:nth-child(9) { transition-delay: 0.48s; }
    .stagger-card:nth-child(10) { transition-delay: 0.54s; }
    .stagger-card:nth-child(11) { transition-delay: 0.60s; }
    .stagger-card:nth-child(12) { transition-delay: 0.66s; }
    .stagger-card:hover { transition-delay: 0s !important; }
    .card-3d-body {
        transform-style: preserve-3d;
        will-change: transform;
    }
    .card-shine {
        background: linear-gradient(135deg, transparent 30%, rgba(255,255,255,0.15) 50%, transparent 70%);
        background-size: 200% 200%;
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
                <a href="{{ route('layanan') }}" class="px-3 py-1.5 rounded-lg bg-white/5 text-text-light/60 hover:bg-white/10 hover:text-text-light transition-all duration-200">Layanan</a>
                <svg class="w-3.5 h-3.5 text-text-light/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium">{{ $service->name }}</span>
            </nav>
            <div class="flex items-start gap-5">
                <div class="w-1 h-20 bg-gradient-to-b from-accent to-accent/20 rounded-full shrink-0 mt-2"></div>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $serviceIconMap[$service->icon] ?? $serviceIconMap['heart'] !!}</svg>
                    </div>
                    <div>
                        <h1 class="text-3xl md:text-5xl font-bold text-text-light">{{ $service->name }}</h1>
                        <span class="inline-flex items-center gap-1.5 mt-2 px-3 py-1 rounded-full text-xs font-semibold {{ $cc['badge'] }}">{{ $service->category }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($service->slug === 'rawat-jalan')
{{-- Rawat Jalan: Clinic Cards --}}
<section class="py-16 md:py-20" style="background-color: #F5F5F5;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-in-section">
            <h2 class="text-2xl md:text-3xl font-bold" style="color: #13203B;">Poli Klinik Rawat Jalan</h2>
            <p class="mt-2" style="color: #6b7280;">Layanan rawat jalan dengan berbagai poli spesialis</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
            @foreach($clinicCards as $i => $card)
            <div class="group relative bg-white rounded-2xl overflow-visible fade-in-section stagger-card card-3d">
                <div class="relative bg-white rounded-2xl overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-black/10 card-3d-body" style="box-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.03);">
                    {{-- Shine overlay --}}
                    <div class="card-shine absolute inset-0 pointer-events-none z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    {{-- Image --}}
                    <div class="relative h-36 overflow-hidden card-3d-image">
                        <img src="{{ asset('foto/ruangan/ruangan.png') }}" alt="{{ $card['name'] }}" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[9px] font-bold uppercase tracking-wider bg-white/90 text-accent shadow-sm">Rawat Jalan</span>
                        </div>
                    </div>
                    {{-- Content --}}
                    <div class="pt-7 pb-4 px-4 card-3d-content">
                        <h3 class="text-sm font-bold mb-1 leading-tight" style="color: #13203B;">{{ $card['name'] }}</h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: #9ca3af;">{{ $card['description'] }}</p>
                        <div class="flex items-center justify-between pt-2.5 border-t border-gray-50">
                            <span class="text-[11px] font-medium inline-flex items-center gap-1" style="color: #b0b8c5;">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                {{ $card['doctor_count'] }}
                            </span>
                            <a href="{{ route('layanan.clinic-detail', $card['slug']) }}" class="inline-flex items-center gap-1 text-xs font-semibold transition-all duration-300 group/link" style="color: #FF355C;">
                                <span class="border-b border-accent/0 group-hover/link:border-accent/30 transition-all">Detail</span>
                                <svg class="w-3.5 h-3.5 transition-all duration-300 group-hover/link:translate-x-1 group-hover/link:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@elseif($service->slug === 'igd')
{{-- IGD: Hero Image + Content --}}
<section class="relative bg-primary overflow-hidden" style="background: linear-gradient(135deg, #13203B 0%, #1a2d52 50%, #13203B 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="grid lg:grid-cols-2 gap-10 items-center fade-in-section">
            <div class="order-2 lg:order-1">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-accent/10 text-accent mb-4">24 Jam Non-Stop</div>
                <h2 class="text-2xl md:text-4xl font-bold text-text-light mb-4">Instalasi Gawat Darurat</h2>
                <p class="text-text-light/70 leading-relaxed mb-6">{{ $service->description }}</p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center gap-2 text-text-light/80 text-sm">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>24 Jam</span>
                    </div>
                    <div class="flex items-center gap-2 text-text-light/80 text-sm">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>Lokasi Strategis</span>
                    </div>
                    <div class="flex items-center gap-2 text-text-light/80 text-sm">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>Respon Cepat</span>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <div class="relative">
                    <img src="{{ asset('foto/ruangan/ruangan.png') }}" alt="IGD RS Madani" class="w-full h-64 md:h-80 object-cover rounded-2xl shadow-2xl">
                    <div class="absolute -bottom-4 -right-4 bg-accent text-white px-6 py-3 rounded-xl shadow-lg">
                        <div class="text-2xl font-bold">24/7</div>
                        <div class="text-xs text-white/80">Siap Melayani</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 md:py-20 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10 lg:gap-12">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10 fade-in-section">
                    <h2 class="text-2xl font-bold text-primary mb-4">Tentang {{ $service->name }}</h2>
                    <p class="text-text-dark/60 leading-relaxed mb-6">{{ $service->description }}</p>
                    @if($service->features)
                    <h3 class="text-lg font-bold text-primary mb-3">Fasilitas & Layanan</h3>
                    <ul class="space-y-3">
                        @foreach($service->features as $feature)
                        <li class="flex items-start gap-3 text-text-dark/60">
                            <svg class="w-5 h-5 mt-0.5 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 fade-in-section">
                    <h3 class="text-sm font-bold text-primary uppercase tracking-wider mb-3">Informasi</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-3 text-text-dark/60">
                            <svg class="w-4 h-4 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Kategori: {{ $service->category }}</span>
                        </div>
                        <div class="flex items-center gap-3 text-text-dark/60">
                            <svg class="w-4 h-4 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>24 Jam Non-Stop</span>
                        </div>
                        @if($doctors->count())
                        <div class="flex items-center gap-3 text-text-dark/60">
                            <svg class="w-4 h-4 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>{{ $doctors->count() }} Dokter</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="bg-gradient-to-br from-accent to-[#e02e4f] rounded-2xl p-6 text-white fade-in-section">
                    <h3 class="font-bold mb-2">Butuh Bantuan?</h3>
                    <p class="text-sm text-white/80 mb-4">Hubungi kami untuk informasi lebih lanjut tentang layanan ini.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-all">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
@else
{{-- Content (non-Rawat-Jalan, non-IGD services) --}}
<section class="py-16 md:py-20 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-3 gap-10 lg:gap-12">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 md:p-10 fade-in-section">
                    <h2 class="text-2xl font-bold text-primary mb-4">Tentang {{ $service->name }}</h2>
                    <p class="text-text-dark/60 leading-relaxed mb-6">{{ $service->description }}</p>
                    @if($service->features)
                    <h3 class="text-lg font-bold text-primary mb-3">Fasilitas & Layanan</h3>
                    <ul class="space-y-3">
                        @foreach($service->features as $feature)
                        <li class="flex items-start gap-3 text-text-dark/60">
                            <svg class="w-5 h-5 mt-0.5 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 fade-in-section">
                    <h3 class="text-sm font-bold text-primary uppercase tracking-wider mb-3">Informasi</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center gap-3 text-text-dark/60">
                            <svg class="w-4 h-4 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            <span>Kategori: {{ $service->category }}</span>
                        </div>
                        @if($doctors->count())
                        <div class="flex items-center gap-3 text-text-dark/60">
                            <svg class="w-4 h-4 shrink-0 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>{{ $doctors->count() }} Dokter</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="bg-gradient-to-br from-accent to-[#e02e4f] rounded-2xl p-6 text-white fade-in-section">
                    <h3 class="font-bold mb-2">Butuh Bantuan?</h3>
                    <p class="text-sm text-white/80 mb-4">Hubungi kami untuk informasi lebih lanjut tentang layanan ini.</p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-white/20 hover:bg-white/30 text-white text-sm font-semibold px-4 py-2.5 rounded-xl transition-all">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- Doctors (for non-Rawat-Jalan services) --}}
@if($service->slug !== 'rawat-jalan' && $doctors->count())
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-12 fade-in-section">
            <div class="w-14 h-14 rounded-2xl bg-primary flex items-center justify-center text-white shadow-lg shadow-primary/25">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-primary">Dokter {{ $service->name }}</h2>
                <p class="text-text-dark/50 text-sm mt-1">Dokter yang melayani di {{ $service->name }}</p>
            </div>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($doctors as $doctor)
            <div class="group bg-secondary rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 fade-in-section hover:-translate-y-1">
                <div class="p-6 md:p-8 text-center">
                    <div class="w-24 h-24 rounded-full mx-auto mb-4 overflow-hidden bg-primary/10 ring-2 ring-primary/10 group-hover:ring-accent/30 transition-all">
                        <img src="{{ $doctor->photo ? asset('foto/dokter/' . $doctor->photo) : asset('foto/dokter/dokter.png') }}" alt="{{ $doctor->name }}" class="w-full h-full object-cover">
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-1">{{ $doctor->name }}</h3>
                    <p class="text-sm text-accent font-medium mb-3">{{ $doctor->specialization }}</p>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-primary/10 text-primary">{{ $doctor->clinic }}</span>
                    <div class="mt-4">
                        <a href="{{ route('dokter.show', $doctor->slug) }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-accent transition-colors">
                            Lihat Jadwal
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA --}}
<section class="py-16 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03]">
        <div class="w-full h-full" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.5'%3E%3Ccircle cx='2' cy='2' r='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in-section">
        <h2 class="text-3xl md:text-4xl font-bold text-text-light mb-4">Butuh Informasi Layanan?</h2>
        <p class="text-text-light/70 max-w-2xl mx-auto mb-8 text-lg">Tim kami siap membantu Anda memilih layanan yang tepat untuk kebutuhan kesehatan Anda dan keluarga.</p>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2.5 bg-accent hover:bg-[#e02e4f] text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg shadow-accent/25 hover:shadow-accent/40 hover:-translate-y-0.5">Hubungi Kami</a>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.card-3d').forEach(function (card) {
        var body = card.querySelector('.card-3d-body');
        var shine = card.querySelector('.card-shine');
        card.addEventListener('mousemove', function (e) {
            var rect = card.getBoundingClientRect();
            var x = (e.clientX - rect.left) / rect.width;
            var y = (e.clientY - rect.top) / rect.height;
            var tiltX = (y - 0.5) * -8;
            var tiltY = (x - 0.5) * 8;
            body.style.transform = 'perspective(800px) rotateX(' + tiltX + 'deg) rotateY(' + tiltY + 'deg)';
            if (shine) {
                shine.style.background = 'radial-gradient(circle at ' + (x * 100) + '% ' + (y * 100) + '%, rgba(255,255,255,0.15) 0%, transparent 60%)';
            }
        });
        card.addEventListener('mouseleave', function () {
            body.style.transform = 'perspective(800px) rotateX(0deg) rotateY(0deg)';
            if (shine) {
                shine.style.background = '';
            }
        });
    });
});
</script>
@endpush
