@extends('layouts.app')

@section('title', 'Layanan RS Madani')

@php
$catToVar = [
    'Layanan Medis' => $layananMedis ?? collect(),
    'Layanan Penunjang' => $layananPenunjang ?? collect(),
    'Layanan Unggulan' => $layananUnggulan ?? collect(),
];

$iconMap = [
    'heart' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
    'monitor' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
    'bed' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>',
    'shield' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>',
    'capsule' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>',
    'microscope' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>',
    'wave' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>',
    'brain' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>',
    'rehab' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>',
    'mental' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0C2.546 15.697 2.023 15.546 1.5 15.546M21 12.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0C2.546 12.697 2.023 12.546 1.5 12.546M21 9.546C20.477 9.546 19.954 9.697 19.5 10a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0C2.546 9.697 2.023 9.546 1.5 9.546"/>',
];

$catConfig = [
    'Layanan Medis' => [
        'id' => 'medis',
        'icon' => 'heart',
        'iconBg' => 'bg-accent',
        'shadow' => 'shadow-accent/25',
        'badgeTheme' => 'bg-accent/10 text-accent',
        'linkTheme' => 'text-accent',
        'barColor' => 'bg-accent',
        'sectionBg' => 'bg-secondary',
        'sectionIcon' => 'heart',
        'hoverBorder' => 'hover:border-accent/20',
        'iconGradient' => 'from-accent/10 to-accent/5',
        'hoverText' => 'group-hover:text-accent',
    ],
    'Layanan Penunjang' => [
        'id' => 'penunjang',
        'icon' => 'shield',
        'iconBg' => 'bg-primary',
        'shadow' => 'shadow-primary/25',
        'badgeTheme' => 'bg-primary/10 text-primary',
        'linkTheme' => 'text-primary',
        'barColor' => 'bg-primary',
        'sectionBg' => 'bg-white',
        'sectionIcon' => 'shield',
        'hoverBorder' => 'hover:border-primary/20',
        'iconGradient' => 'from-primary/10 to-primary/5',
        'hoverText' => 'group-hover:text-accent',
    ],
    'Layanan Unggulan' => [
        'id' => 'unggulan',
        'icon' => 'star',
        'iconBg' => 'bg-gradient-to-br from-amber-500 to-amber-600',
        'shadow' => 'shadow-amber-500/25',
        'badgeTheme' => 'bg-amber-100 text-amber-700',
        'linkTheme' => 'text-amber-500',
        'barColor' => 'bg-amber-500',
        'sectionBg' => 'bg-secondary',
        'sectionIcon' => 'star',
        'hoverBorder' => 'hover:border-amber-400/30',
        'iconGradient' => 'from-amber-400/10 to-amber-400/5',
        'hoverText' => 'group-hover:text-amber-500',
    ],
];
@endphp

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
                <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium">Layanan</span>
            </nav>
            <div class="flex items-start gap-5">
                <div class="w-1 h-16 bg-gradient-to-b from-accent to-accent/20 rounded-full shrink-0 mt-2"></div>
                <div>
                    <h1 class="text-3xl md:text-5xl font-bold text-text-light mb-3">Layanan Kami</h1>
                    <p class="text-text-light/60 text-base md:text-lg max-w-2xl">Pelayanan kesehatan lengkap dan profesional untuk Anda dan keluarga</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Quick Nav --}}
<section class="bg-white border-b border-gray-100 sticky top-20 z-30 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex overflow-x-auto scrollbar-hide gap-2 py-4">
            @foreach($catConfig as $cat => $cfg)
            <a href="#{{ $cfg['id'] }}" class="shrink-0 px-5 py-2.5 rounded-xl text-sm font-medium {{ $loop->first ? 'bg-accent text-white shadow-sm' : 'bg-secondary text-text-dark/70 hover:bg-accent/10 hover:text-accent' }} transition-all duration-200">{{ $cat }}</a>
            @endforeach
        </div>
    </div>
</section>

{{-- Services Sections --}}
@foreach($catConfig as $cat => $cfg)
@php $services = $catToVar[$cat]; @endphp
<section id="{{ $cfg['id'] }}" class="py-16 md:py-20 {{ $cfg['sectionBg'] }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-4 mb-12 fade-in-section">
            <div class="w-14 h-14 rounded-2xl {{ $cfg['iconBg'] }} flex items-center justify-center text-white shadow-lg {{ $cfg['shadow'] }}">
                @if($cfg['sectionIcon'] === 'heart')
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                @elseif($cfg['sectionIcon'] === 'shield')
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                @else
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                @endif
            </div>
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-primary">{{ $cat }}</h2>
                <p class="text-text-dark/50 text-sm mt-1">
                    @if($loop->first) Pelayanan medis profesional oleh dokter spesialis
                    @elseif($loop->iteration === 2) Fasilitas penunjang diagnostik dan terapi
                    @else Layanan spesialistik dengan standar internasional
                    @endif
                </p>
            </div>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-{{ $cat === 'Layanan Unggulan' ? 4 : 3 }} gap-6 lg:gap-8">
            @forelse($services as $service)
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl {{ $cfg['hoverBorder'] }} transition-all duration-500 fade-in-section hover:-translate-y-1">
                @if($cat !== 'Layanan Penunjang')
                <div class="h-2 {{ $cfg['barColor'] }}"></div>
                @endif
                <div class="p-6 md:p-8">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br {{ $cfg['iconGradient'] }} flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 {{ $cfg['linkTheme'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $iconMap[$service->icon] ?? $iconMap['heart'] !!}</svg>
                    </div>
                    @if($cat === 'Layanan Unggulan')
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold {{ $cfg['badgeTheme'] }} mb-3">Unggulan</span>
                    @elseif($service->name === 'IGD')
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold {{ $cfg['badgeTheme'] }} mb-3">24 Jam</span>
                    @elseif($service->name === 'Rawat Jalan')
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold {{ $cfg['badgeTheme'] }} mb-3">Poli Spesialis</span>
                    @elseif($service->name === 'Rawat Inap')
                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold {{ $cfg['badgeTheme'] }} mb-3">Kelas 1-3 & VIP</span>
                    @endif
                    <h3 class="text-xl font-bold text-primary mb-3 {{ $cfg['hoverText'] }} transition-colors">{{ $service->name }}</h3>
                    <p class="text-text-dark/60 text-sm leading-relaxed mb-5">{{ $service->description }}</p>
                    @if($service->features)
                    <ul class="space-y-2 mb-6">
                        @foreach($service->features as $feature)
                        <li class="flex items-center gap-2.5 text-sm text-text-dark/60">
                            <svg class="w-4 h-4 {{ $cfg['linkTheme'] }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <a href="{{ route('layanan.detail', $service->slug) }}" class="inline-flex items-center gap-2 {{ $cfg['linkTheme'] }} font-semibold text-sm group-hover:gap-3 transition-all duration-300">Selengkapnya<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg></a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-text-dark/50">
                <p class="text-lg">Belum ada data layanan untuk kategori ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endforeach

{{-- CTA --}}
<section class="py-16 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03]">
        <div class="w-full h-full" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.5'%3E%3Ccircle cx='2' cy='2' r='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
    </div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in-section">
        <h2 class="text-3xl md:text-4xl font-bold text-text-light mb-4">Butuh Informasi Layanan?</h2>
        <p class="text-text-light/70 max-w-2xl mx-auto mb-8 text-lg">Tim kami siap membantu Anda memilih layanan yang tepat untuk kebutuhan kesehatan Anda dan keluarga.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2.5 bg-accent hover:bg-[#e02e4f] text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg shadow-accent/25 hover:shadow-accent/40 hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Hubungi Kami
            </a>
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2.5 border-2 border-white/30 hover:border-white text-text-light font-semibold px-8 py-4 rounded-xl transition-all duration-300 hover:-translate-y-0.5 bg-white/5 hover:bg-white/10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Jadwalkan Konsultasi
            </a>
        </div>
    </div>
</section>
@endsection



