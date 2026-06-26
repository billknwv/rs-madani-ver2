@extends('layouts.app')

@section('title', 'Rawat Inap - RS Madani')

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
                <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium">Rawat Inap</span>
            </nav>
            <div class="flex items-start gap-5">
                <div class="w-1 h-20 bg-gradient-to-b from-accent to-accent/20 rounded-full shrink-0 mt-2"></div>
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-2xl bg-white/10 flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                    </div>
                    <div>
                        <h1 class="text-3xl md:text-5xl font-bold text-text-light">Rawat Inap</h1>
                        <span class="inline-flex items-center gap-1.5 mt-2 px-3 py-1 rounded-full text-xs font-semibold bg-accent/10 text-accent">Layanan Medis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Rawat Inap Non Jiwa --}}
<section class="py-16 md:py-20 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-in-section">
            <h2 class="text-2xl md:text-3xl font-bold text-primary">Rawat Inap Non Jiwa</h2>
            <p class="text-text-dark/50 text-sm mt-2">Fasilitas rawat inap untuk pasien dengan kondisi medis umum</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
            @foreach($nonJiwaRooms as $i => $room)
            <div class="group relative bg-white rounded-2xl overflow-visible fade-in-section stagger-card card-3d">
                <div class="relative bg-white rounded-2xl overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-black/10 card-3d-body" style="box-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.03);">
                    <div class="card-shine absolute inset-0 pointer-events-none z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative h-36 overflow-hidden card-3d-image">
                        <img src="{{ asset('foto/ruangan/ruangan.png') }}" alt="{{ $room['name'] }}" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[9px] font-bold uppercase tracking-wider bg-white/90 text-primary shadow-sm">Rawat Inap Non Jiwa</span>
                        </div>
                    </div>
                    <div class="pt-7 pb-4 px-4 card-3d-content">
                        <h3 class="text-sm font-bold mb-1 leading-tight" style="color: #13203B;">{{ $room['name'] }}</h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: #9ca3af;">{{ $room['description'] }}</p>
                        <div class="flex items-center justify-between pt-2.5 border-t border-gray-50">
                            <span class="text-[11px] font-medium inline-flex items-center gap-1" style="color: #b0b8c5;">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                {{ $room['capacity'] }} Tempat Tidur
                            </span>
                            <a href="{{ route('layanan.rawat-inap.detail', $room['slug']) }}" class="inline-flex items-center gap-1 text-xs font-semibold transition-all duration-300 group/link" style="color: #FF355C;">
                                <span class="border-b border-accent/0 group-hover/link:border-accent/30 transition-all">Selengkapnya</span>
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

{{-- Rawat Inap Jiwa --}}
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 fade-in-section">
            <h2 class="text-2xl md:text-3xl font-bold text-primary">Rawat Inap Jiwa</h2>
            <p class="text-text-dark/50 text-sm mt-2">Fasilitas rawat inap untuk pasien dengan gangguan kesehatan jiwa</p>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">
            @foreach($jiwaRooms as $i => $room)
            <div class="group relative bg-white rounded-2xl overflow-visible fade-in-section stagger-card card-3d">
                <div class="relative bg-white rounded-2xl overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-black/10 card-3d-body" style="box-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 12px rgba(0,0,0,0.03);">
                    <div class="card-shine absolute inset-0 pointer-events-none z-20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="relative h-36 overflow-hidden card-3d-image">
                        <img src="{{ asset('foto/ruangan/ruangan.png') }}" alt="{{ $room['name'] }}" class="w-full h-full object-cover transition-all duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        <div class="absolute top-3 left-3">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[9px] font-bold uppercase tracking-wider bg-white/90 text-accent shadow-sm">Rawat Inap Jiwa</span>
                        </div>
                    </div>
                    <div class="pt-7 pb-4 px-4 card-3d-content">
                        <h3 class="text-sm font-bold mb-1 leading-tight" style="color: #13203B;">{{ $room['name'] }}</h3>
                        <p class="text-xs leading-relaxed mb-3" style="color: #9ca3af;">{{ $room['description'] }}</p>
                        <div class="flex items-center justify-between pt-2.5 border-t border-gray-50">
                            <span class="text-[11px] font-medium inline-flex items-center gap-1" style="color: #b0b8c5;">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                {{ $room['capacity'] }} Tempat Tidur
                            </span>
                            <a href="{{ route('layanan.rawat-inap.detail', $room['slug']) }}" class="inline-flex items-center gap-1 text-xs font-semibold transition-all duration-300 group/link" style="color: #FF355C;">
                                <span class="border-b border-accent/0 group-hover/link:border-accent/30 transition-all">Selengkapnya</span>
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

{{-- CTA --}}
<section class="py-16 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03]">
        <div class="w-full h-full" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.5'%3E%3Ccircle cx='2' cy='2' r='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
    </div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in-section">
        <h2 class="text-3xl md:text-4xl font-bold text-text-light mb-4">Butuh Informasi Rawat Inap?</h2>
        <p class="text-text-light/70 max-w-2xl mx-auto mb-8 text-lg">Tim kami siap membantu Anda memilih ruangan yang tepat untuk kebutuhan perawatan Anda dan keluarga.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2.5 bg-accent hover:bg-[#e02e4f] text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg shadow-accent/25 hover:shadow-accent/40 hover:-translate-y-0.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Hubungi Kami
            </a>
            <a href="{{ route('layanan') }}" class="inline-flex items-center justify-center gap-2.5 border-2 border-white/30 hover:border-white text-text-light font-semibold px-8 py-4 rounded-xl transition-all duration-300 hover:-translate-y-0.5 bg-white/5 hover:bg-white/10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Lihat Semua Layanan
            </a>
        </div>
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
