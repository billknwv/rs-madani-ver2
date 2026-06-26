@extends('layouts.app')

@section('title', 'RS Madani - Rumah Sakit Modern dengan Pelayanan Profesional dan Islami')

@section('content')
<style>
    .hero-clip {
        clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
    }
    @media (max-width: 1023px) {
        .hero-clip {
            clip-path: none;
        }
    }

    .carousel-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 20;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.15);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        opacity: 0;
    }
    .carousel-btn:hover {
        background: rgba(255,255,255,0.25);
        transform: translateY(-50%) scale(1.1);
    }
    .carousel-group:hover .carousel-btn {
        opacity: 1;
    }
    .carousel-btn-prev { left: 20px; }
    .carousel-btn-next { right: 20px; }
    @media (max-width: 767px) {
        .carousel-btn { display: flex; opacity: 0.6; width: 36px; height: 36px; }
        .carousel-btn-prev { left: 10px; }
        .carousel-btn-next { right: 10px; }
    }

    .service-card {
        transition: all 0.4s ease;
    }
    .service-card:hover {
        transform: translateY(-4px);
    }

    .step-connector {
        flex: 1;
        height: 2px;
        background: linear-gradient(to right, rgba(255,53,92,0.4), rgba(255,53,92,0.1));
        position: relative;
        min-width: 40px;
    }
    .step-connector::after {
        content: '';
        position: absolute;
        right: -4px;
        top: 50%;
        transform: translateY(-50%);
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(255,53,92,0.3);
    }
    @media (max-width: 767px) {
        .step-connector {
            width: 2px;
            min-width: unset;
            height: 40px;
            flex: unset;
            background: linear-gradient(to bottom, rgba(255,53,92,0.4), rgba(255,53,92,0.1));
        }
        .step-connector::after {
            right: unset;
            bottom: -4px;
            top: unset;
            transform: none;
            left: 50%;
            transform: translateX(-50%);
        }
    }

    .article-card {
        transition: all 0.5s ease;
    }
    .article-card:hover {
        transform: translateY(-8px);
    }
</style>

{{-- Hero Carousel Section --}}
<section class="relative min-h-[90vh] lg:min-h-screen flex items-center overflow-hidden bg-primary carousel-group">
    <div class="absolute inset-0 bg-gradient-to-br from-primary via-[#1e3055] to-[#13203B]"></div>

    <div class="relative w-full h-full absolute inset-0" id="heroCarousel">
        @php
            $slides = [
                [
                    'title' => 'RS Madani',
                    'slogan' => 'Kesehatan Anda, Prioritas Kami',
                    'description' => 'Rumah Sakit Modern dengan Pelayanan Profesional dan Islami. Kami hadir untuk memberikan layanan kesehatan terbaik bagi Anda dan keluarga.',
                ],
                [
                    'title' => 'Fasilitas Modern',
                    'slogan' => 'Teknologi Medis Terkini',
                    'description' => 'Dilengkapi peralatan medis modern untuk diagnosis dan pengobatan yang akurat serta nyaman bagi pasien.',
                ],
                [
                    'title' => 'Tenaga Medis Profesional',
                    'slogan' => 'Dokter & Perawat Berpengalaman',
                    'description' => 'Ditangani oleh tim medis kompeten yang siap melayani Anda dengan sepenuh hati dan penuh dedikasi.',
                ],
            ];
        @endphp

        @foreach($slides as $index => $slide)
        <div class="absolute inset-0 transition-opacity duration-700 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
             data-slide="{{ $index }}" style="z-index: {{ $index === 0 ? 1 : 0 }};">
            <div class="absolute inset-0">
                <img src="/foto/banner/banner{{ $index + 1 }}.png" alt="{{ $slide['title'] }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-primary/75 via-primary/15 to-transparent"></div>
            </div>
            <div class="relative h-full flex items-center">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 lg:py-36 w-full">
                    <div class="max-w-2xl">
                        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-8">
                            <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                            <span class="text-text-light/80 text-sm font-medium tracking-wide">Selamat Datang di {{ $slide['title'] }}</span>
                        </div>
                        <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-text-light leading-tight mb-6">
                            {{ $slide['slogan'] }}
                        </h1>
                        <p class="text-lg md:text-xl text-text-light/70 max-w-xl mb-10 leading-relaxed">
                            {{ $slide['description'] }}
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('layanan') }}" class="inline-flex items-center justify-center gap-2.5 bg-accent hover:bg-[#e02e4f] text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg shadow-accent/25 hover:shadow-accent/40 hover:-translate-y-0.5">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                Lihat Layanan
                            </a>
                            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2.5 border-2 border-white/30 hover:border-white text-text-light font-semibold px-8 py-4 rounded-xl transition-all duration-300 hover:-translate-y-0.5 bg-white/5 hover:bg-white/10">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <button class="carousel-btn carousel-btn-prev" data-carousel="prev" aria-label="Previous slide">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button class="carousel-btn carousel-btn-next" data-carousel="next" aria-label="Next slide">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
    </button>

    <div class="absolute bottom-2 left-1/2 -translate-x-1/2 z-20 flex items-center gap-2.5 bg-black/20 backdrop-blur-sm rounded-full px-4 py-2">
        @foreach($slides as $index => $slide)
        <button class="w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-accent scale-110' : 'bg-white/40 hover:bg-white/60' }}"
                data-dot="{{ $index }}" data-carousel="dot" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>

    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-secondary to-transparent z-10"></div>
</section>

{{-- Stats Section --}}
<section class="relative mt-24 lg:mt-32 z-30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-primary rounded-2xl shadow-2xl shadow-primary/25 border border-white/10 overflow-hidden">
            <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-white/10">
                <div class="stat-item text-center py-8 px-4 fade-in-section">
                    <div class="w-14 h-14 rounded-2xl bg-accent/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                        </svg>
                    </div>
                    <div class="text-3xl lg:text-4xl font-bold text-text-light mb-1">
                        <span data-count="{{ $doctorsCount }}">0</span>
                    </div>
                    <div class="text-text-light/60 text-sm font-medium">Dokter Spesialis</div>
                </div>
                <div class="stat-item text-center py-8 px-4 fade-in-section">
                    <div class="w-14 h-14 rounded-2xl bg-accent/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z"/>
                        </svg>
                    </div>
                    <div class="text-3xl lg:text-4xl font-bold text-text-light mb-1">
                        <span data-count="{{ $totalClinics }}">0</span>
                    </div>
                    <div class="text-text-light/60 text-sm font-medium">Klinik & Poli</div>
                </div>
                <div class="stat-item text-center py-8 px-4 fade-in-section">
                    <div class="w-14 h-14 rounded-2xl bg-accent/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                        </svg>
                    </div>
                    <div class="text-3xl lg:text-4xl font-bold text-text-light mb-1">
                        <span data-count="{{ $totalBeds }}">0</span>
                    </div>
                    <div class="text-text-light/60 text-sm font-medium">Tempat Tidur</div>
                </div>
                <div class="stat-item text-center py-8 px-4 fade-in-section">
                    <div class="w-14 h-14 rounded-2xl bg-accent/10 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-7 h-7 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl lg:text-4xl font-bold text-text-light mb-1">
                        <span data-count="{{ $totalPatients }}">0</span>
                    </div>
                    <div class="text-text-light/60 text-sm font-medium">Pasien Dilayani</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Why Choose Us Section --}}
<section class="py-20 lg:py-28 bg-secondary overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 fade-in-section">
            <span class="text-accent font-semibold text-sm tracking-widest uppercase">Layanan Unggulan</span>
            <h2 class="text-3xl md:text-4xl font-bold text-primary mt-3 mb-4">Mengapa Anda harus memilih kami</h2>
            <div class="w-16 h-1 bg-accent rounded-full mx-auto mb-4"></div>
            <p class="text-text-dark/60 leading-relaxed">Kami menyediakan layanan kesehatan komprehensif dengan standar internasional dan sentuhan Islami</p>
        </div>

        @php
            $servicesList = [
                ['icon' => 'brain', 'title' => 'Terapi Kes Jiwa Anak & Remaja', 'desc' => 'Layanan terapi khusus untuk kesehatan jiwa anak dan remaja dengan pendekatan profesional dan penuh kasih.'],
                ['icon' => 'pill', 'title' => 'Terapi NAPZA', 'desc' => 'Program rehabilitasi dan terapi komprehensif untuk penanganan ketergantungan NAPZA.'],
                ['icon' => 'heart', 'title' => 'Psikologi Anak', 'desc' => 'Konsultasi psikologi anak untuk mendukung tumbuh kembang mental dan emosional yang sehat.'],
                ['icon' => 'brain', 'title' => 'Terapi Penyakit Syaraf', 'desc' => 'Penanganan gangguan sistem syaraf dengan teknologi diagnostik modern dan terapi terkini.'],
                ['icon' => 'activity', 'title' => 'Rehabilitasi Medik', 'desc' => 'Program rehabilitasi medik komprehensif untuk memulihkan fungsi fisik dan kualitas hidup.'],
                ['icon' => 'heart', 'title' => 'Jantung & Paru', 'desc' => 'Pelayanan diagnostik dan terapi untuk gangguan jantung dan paru dengan peralatan mutakhir.'],
            ];

            $serviceIcons = [
                'brain' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.113.443-.276.934-.276 1.396 0 1.903 2.163 3.666 2.163 3.666m0-5.062c.113.443.276.934.276 1.396 0 1.903-2.163 3.666-2.163 3.666m0 0l2.163 3.666c.19.326.296.692.296 1.067v3.52m0-5.253l-2.163-3.666m0 0l-1.179-.667M12 17.25v3.75m0 0l-2.25-2.25M12 21l2.25-2.25m-6-10.5l-0.375-.25m4.125 8.5h2.25m-6 0h-3.75m12 0h3.375"/></svg>',
                'pill' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/></svg>',
                'heart' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/></svg>',
                'activity' => '<svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605"/></svg>',
            ];
        @endphp

        <div class="grid lg:grid-cols-3 gap-8 lg:gap-12 items-center">
            {{-- Left Services --}}
            <div class="space-y-6 lg:space-y-8">
                @for($i = 0; $i < 3; $i++)
                <div class="service-card group bg-white rounded-2xl p-5 lg:p-6 border border-gray-100 hover:border-accent/20 hover:shadow-xl hover:shadow-accent/5 transition-all duration-500 fade-in-section cursor-default">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-accent/5 flex items-center justify-center shrink-0 group-hover:bg-accent transition-all duration-500">
                            <div class="text-accent group-hover:text-white transition-colors duration-500">
                                {!! $serviceIcons[$servicesList[$i]['icon']] !!}
                            </div>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-primary group-hover:text-accent transition-colors duration-500">{{ $servicesList[$i]['title'] }}</h3>
                            <p class="text-text-dark/60 text-sm leading-relaxed mt-1.5">{{ $servicesList[$i]['desc'] }}</p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            {{-- Center Image --}}
            <div class="fade-in-section">
                <div class="relative mx-auto max-w-sm lg:max-w-full">
                    <div class="absolute -top-6 -right-6 w-48 h-48 bg-accent/10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-6 -left-6 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl"></div>
                    <div class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-primary to-[#1a2d52] aspect-[3/4] lg:aspect-auto lg:h-[500px] shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&q=80" alt="RS Madani" class="w-full h-full object-cover opacity-80">
                        <div class="absolute inset-0 bg-gradient-to-t from-primary/60 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/10">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-accent/20 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-text-light font-semibold text-sm">Terakreditasi A</p>
                                        <p class="text-text-light/60 text-xs">Pelayanan Terbaik untuk Anda</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Services --}}
            <div class="space-y-6 lg:space-y-8">
                @for($i = 3; $i < 6; $i++)
                <div class="service-card group bg-white rounded-2xl p-5 lg:p-6 border border-gray-100 hover:border-accent/20 hover:shadow-xl hover:shadow-accent/5 transition-all duration-500 fade-in-section cursor-default">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-accent/5 flex items-center justify-center shrink-0 group-hover:bg-accent transition-all duration-500">
                            <div class="text-accent group-hover:text-white transition-colors duration-500">
                                {!! $serviceIcons[$servicesList[$i]['icon']] !!}
                            </div>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-primary group-hover:text-accent transition-colors duration-500">{{ $servicesList[$i]['title'] }}</h3>
                            <p class="text-text-dark/60 text-sm leading-relaxed mt-1.5">{{ $servicesList[$i]['desc'] }}</p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
</section>

{{-- Process Section --}}
<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 fade-in-section">
            <span class="text-accent font-semibold text-sm tracking-widest uppercase">Proses Pelayanan</span>
            <h2 class="text-3xl md:text-4xl font-bold text-primary mt-3 mb-4">Bagaimana kami melakukannya?</h2>
            <div class="w-16 h-1 bg-accent rounded-full mx-auto mb-4"></div>
            <p class="text-text-dark/60 leading-relaxed">Kami memiliki alur pelayanan yang terstruktur untuk memastikan setiap pasien mendapatkan perawatan terbaik</p>
        </div>

        @php
            $steps = [
                [
                    'number' => '01',
                    'title' => 'Janji Temu',
                    'desc' => 'Daftar online atau hubungi kami untuk membuat janji temu dengan dokter spesialis sesuai kebutuhan Anda.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"/></svg>',
                ],
                [
                    'number' => '02',
                    'title' => 'Pemeriksaan Dokter',
                    'desc' => 'Dokter spesialis akan melakukan pemeriksaan menyeluruh dan mendiagnosis kondisi kesehatan Anda.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>',
                ],
                [
                    'number' => '03',
                    'title' => 'Pengelolaan Perawatan',
                    'desc' => 'Tim medis menyusun rencana perawatan yang tepat dan memberikan penanganan sesuai diagnosis.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z"/></svg>',
                ],
                [
                    'number' => '04',
                    'title' => 'Pemulihan & Kembali Beraktivitas',
                    'desc' => 'Program pemulihan terpadu membantu Anda kembali beraktivitas dengan kondisi kesehatan yang optimal.',
                    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                ],
            ];
        @endphp

        <div class="flex flex-col md:flex-row md:items-start md:justify-center gap-0 md:gap-0">
            @foreach($steps as $index => $step)
            <div class="flex flex-col md:flex-row items-center md:items-start fade-in-section">
                <div class="group relative flex flex-col items-center text-center px-6 md:px-8">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full bg-secondary flex items-center justify-center border-2 border-accent/20 group-hover:border-accent transition-all duration-500 group-hover:shadow-lg group-hover:shadow-accent/20">
                            <div class="text-accent group-hover:scale-110 transition-transform duration-500">
                                {!! $step['icon'] !!}
                            </div>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 rounded-full bg-accent flex items-center justify-center text-white text-xs font-bold shadow-lg shadow-accent/30">
                            {{ $step['number'] }}
                        </div>
                    </div>
                    <h3 class="text-lg font-bold text-primary mt-5 mb-2">{{ $step['title'] }}</h3>
                    <p class="text-text-dark/60 text-sm leading-relaxed max-w-[220px]">{{ $step['desc'] }}</p>
                </div>

                @if(!$loop->last)
                <div class="step-connector my-4 md:my-0 md:mt-12"></div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- About Preview Section --}}
<section class="py-20 lg:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="fade-in-section">
                <div class="relative">
                    <div class="w-full h-[400px] lg:h-[500px] rounded-3xl bg-gradient-to-br from-primary to-[#1a2d52] flex items-center justify-center overflow-hidden">
                        <div class="absolute inset-0 opacity-10">
                            <svg class="w-full h-full" viewBox="0 0 600 500" preserveAspectRatio="xMidYMid slice">
                                <rect width="600" height="500" fill="none"/>
                                <circle cx="100" cy="100" r="60" fill="white" opacity="0.1"/>
                                <circle cx="500" cy="150" r="40" fill="white" opacity="0.08"/>
                                <circle cx="300" cy="400" r="50" fill="white" opacity="0.05"/>
                                <path d="M0,300 Q150,200 300,300 T600,250 L600,500 L0,500 Z" fill="white" opacity="0.03"/>
                                <path d="M0,350 Q200,280 400,380 T600,300 L600,500 L0,500 Z" fill="white" opacity="0.02"/>
                            </svg>
                        </div>
                        <div class="relative z-10 text-center p-8">
                            <div class="w-24 h-24 rounded-2xl bg-white/10 flex items-center justify-center mx-auto mb-6">
                                <svg class="w-12 h-12 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                            </div>
                            <h3 class="text-text-light text-2xl font-bold mb-2">RS Madani</h3>
                            <p class="text-text-light/60">Melayani dengan Sepenuh Hati</p>
                        </div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/10">
                                <p class="text-text-light/80 text-sm">RS Madani telah melayani masyarakat sejak 2010 dengan komitmen pada kualitas dan nilai Islami</p>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-28 h-28 bg-accent rounded-2xl -z-10 hidden lg:block"></div>
                    <div class="absolute -top-4 -left-4 w-20 h-20 bg-accent/20 rounded-2xl -z-10 hidden lg:block"></div>
                </div>
            </div>
            <div class="fade-in-section">
                <span class="text-accent font-semibold text-sm tracking-widest uppercase">Tentang Kami</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary mt-3 mb-6">Kenapa Memilih RS Madani?</h2>
                <div class="w-16 h-1 bg-accent rounded-full mb-6"></div>
                <p class="text-text-dark/60 leading-relaxed mb-8">
                    {{ $profile['about'] ?? 'RS Madani adalah rumah sakit modern yang menggabungkan teknologi medis terkini dengan pelayanan berbasis nilai-nilai Islami. Kami berkomitmen memberikan pelayanan kesehatan terbaik untuk seluruh masyarakat.' }}
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 bg-secondary rounded-xl">
                        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary">Tenaga Medis Profesional</h4>
                            <p class="text-text-dark/60 text-sm mt-1">Dokter dan perawat berpengalaman di bidangnya</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-4 bg-secondary rounded-xl">
                        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary">Fasilitas Modern & Lengkap</h4>
                            <p class="text-text-dark/60 text-sm mt-1">Peralatan medis terkini untuk diagnosis dan pengobatan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-4 bg-secondary rounded-xl">
                        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-primary">Pelayanan Islami & Ramah</h4>
                            <p class="text-text-dark/60 text-sm mt-1">Nyaman dan sesuai dengan syariat Islam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Featured Doctors Section --}}
<section class="py-20 lg:py-28 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-16 fade-in-section">
            <div>
                <span class="text-accent font-semibold text-sm tracking-widest uppercase">Dokter</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary mt-3">Tim Dokter Kami</h2>
                <div class="w-16 h-1 bg-accent rounded-full mt-4"></div>
            </div>
            <a href="{{ route('dokter') }}" class="inline-flex items-center gap-2 text-accent font-semibold mt-4 sm:mt-0 hover:gap-3 transition-all duration-300">
                Lihat Semua Dokter
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            @forelse($featuredDoctors as $doctor)
            <div class="group bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-accent/20 hover:shadow-xl hover:shadow-accent/5 transition-all duration-500 fade-in-section hover:-translate-y-1">
                <div class="relative h-56 bg-gradient-to-br from-primary to-[#1a2d52] overflow-hidden">
                    @if($doctor->photo)
                        <img src="{{ $doctor->photo }}" alt="{{ $doctor->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <img src="{{ asset('foto/dokter/dokter.png') }}" alt="{{ $doctor->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <span class="bg-accent/90 text-white text-xs font-semibold px-3 py-1 rounded-full">
                            {{ $doctor->specialization ?? 'Dokter Umum' }}
                        </span>
                    </div>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-primary group-hover:text-accent transition-colors duration-500">{{ $doctor->name }}</h3>
                    @if($doctor->clinic)
                        <p class="text-text-dark/50 text-sm mt-1">{{ $doctor->clinic }}</p>
                    @endif
                    <a href="{{ route('dokter.show', $doctor->slug) }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-medium text-accent hover:gap-2.5 transition-all duration-300">
                        Lihat Jadwal
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-text-dark/40">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                </svg>
                <p>Belum ada data dokter</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CTA Banner --}}
<section class="py-16 lg:py-20 bg-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-[0.03]">
        <div class="w-full h-full" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.5'%3E%3Ccircle cx='2' cy='2' r='1'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E&quot;);"></div>
    </div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="fade-in-section">
            <h2 class="text-3xl md:text-4xl font-bold text-text-light mb-4">Siap Mendapatkan Pelayanan Terbaik?</h2>
            <p class="text-text-light/70 max-w-2xl mx-auto mb-8 text-lg">Kami siap melayani Anda 24 jam. Daftar online sekarang atau hubungi kami untuk informasi lebih lanjut.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2.5 bg-accent hover:bg-[#e02e4f] text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg shadow-accent/25 hover:shadow-accent/40 hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Hubungi Kami
                </a>
                <a href="tel:{{ $profile['phone'] ?? '06112345678' }}" class="inline-flex items-center justify-center gap-2.5 border-2 border-white/30 hover:border-white text-text-light font-semibold px-8 py-4 rounded-xl transition-all duration-300 hover:-translate-y-0.5 bg-white/5 hover:bg-white/10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Latest Articles Section --}}
<section class="py-20 lg:py-28 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-16 fade-in-section">
            <div>
                <span class="text-accent font-semibold text-sm tracking-widest uppercase">Artikel</span>
                <h2 class="text-3xl md:text-4xl font-bold text-primary mt-3">Berita dan Saran Unggulan</h2>
                <div class="w-16 h-1 bg-accent rounded-full mt-4"></div>
            </div>
            <a href="{{ route('artikel') }}" class="inline-flex items-center gap-2 text-accent font-semibold mt-4 sm:mt-0 hover:gap-3 transition-all duration-300">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($articles as $article)
            <div class="article-card group bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-gray-200 hover:shadow-2xl transition-all duration-500 fade-in-section">
                <div class="relative h-52 overflow-hidden">
                    @if($article->image)
                        <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-primary to-[#1a2d52] flex items-center justify-center">
                            <svg class="w-16 h-16 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.41a2.25 2.25 0 013.182 0l2.909 2.91m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                            </svg>
                        </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 text-xs text-text-dark/50 mb-3">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                            </svg>
                            {{ $article->published_at?->format('d M Y') ?? $article->created_at?->format('d M Y') ?? '' }}
                        </span>
                        @if($article->author)
                        <span class="flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                            {{ $article->author }}
                        </span>
                        @endif
                    </div>
                    <h3 class="text-lg font-bold text-primary mb-3 group-hover:text-accent transition-colors line-clamp-2 leading-snug">{{ $article->title ?? '' }}</h3>
                    <p class="text-text-dark/60 text-sm leading-relaxed line-clamp-3 mb-5">{{ $article->excerpt ?? Str::limit(strip_tags($article->content ?? ''), 120) }}</p>
                    <a href="{{ route('artikel.show', $article->slug) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-accent group-hover:gap-3 transition-all duration-300">
                        Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 text-text-dark/40">
                <svg class="w-16 h-16 mx-auto mb-4 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                </svg>
                <p>Belum ada artikel tersedia</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Contact Section --}}
<section class="py-20 lg:py-28 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 fade-in-section">
            <span class="text-accent font-semibold text-sm tracking-widest uppercase">Kontak</span>
            <h2 class="text-3xl md:text-4xl font-bold text-primary mt-3 mb-4">Hubungi Kami</h2>
            <div class="w-16 h-1 bg-accent rounded-full mx-auto mb-4"></div>
            <p class="text-text-dark/60 leading-relaxed">Kami siap melayani Anda. Jangan ragu untuk menghubungi kami melalui informasi di bawah ini</p>
        </div>
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div class="fade-in-section">
                <div class="w-full h-[400px] rounded-3xl bg-gradient-to-br from-primary to-[#1a2d52] flex items-center justify-center overflow-hidden relative">
                    <div class="absolute inset-0 opacity-10">
                        <svg class="w-full h-full" viewBox="0 0 600 400" preserveAspectRatio="xMidYMid slice">
                            <rect width="600" height="400" fill="none"/>
                            <path d="M0,200 L200,150 L400,250 L600,180 L600,400 L0,400 Z" fill="white" opacity="0.05"/>
                            <path d="M0,250 L200,350 L400,200 L600,300 L600,400 L0,400 Z" fill="white" opacity="0.03"/>
                            <circle cx="150" cy="180" r="40" fill="white" opacity="0.05" stroke="white" stroke-opacity="0.1" stroke-width="1"/>
                            <rect x="120" y="155" width="60" height="50" rx="8" fill="white" fill-opacity="0.05" stroke="white" stroke-opacity="0.08" stroke-width="1"/>
                            <path d="M140 170l10-5 10 5v8a3 3 0 01-3 3h-14a3 3 0 01-3-3v-8z" fill="white" fill-opacity="0.15"/>
                            <rect x="350" y="250" width="200" height="100" rx="16" fill="white" fill-opacity="0.04" stroke="white" stroke-opacity="0.08" stroke-width="1"/>
                            <rect x="370" y="270" width="100" height="40" rx="8" fill="#FF355C" fill-opacity="0.15"/>
                            <text x="388" y="295" fill="white" fill-opacity="0.7" font-size="12" font-family="system-ui">Lokasi Kami</text>
                        </svg>
                    </div>
                    <div class="relative z-10 bg-white/10 backdrop-blur-sm rounded-2xl p-6 mx-6 text-center border border-white/10">
                        <div class="w-16 h-16 rounded-full bg-accent/20 flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                            </svg>
                        </div>
                        <p class="text-text-light font-semibold text-lg">Lokasi Kami</p>
                        <p class="text-text-light/60 text-sm mt-1">{{ $profile['address'] ?? 'Jl. Kesehatan No. 123, Kota Medan, Sumatera Utara 20111' }}</p>
                        <div class="mt-4 flex justify-center gap-2">
                            <span class="bg-accent/20 text-accent text-xs font-semibold px-3 py-1 rounded-full">IGD 24 Jam</span>
                            <span class="bg-white/10 text-text-light/70 text-xs font-semibold px-3 py-1 rounded-full">Parkir Luas</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fade-in-section space-y-6">
                <div class="flex items-start gap-5 bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:border-accent/20 hover:shadow-md transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-accent/5 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-primary">Alamat</h4>
                        <p class="text-text-dark/60 text-sm mt-1">{{ $profile['address'] ?? 'Jl. Kesehatan No. 123, Kota Medan' }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-5 bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:border-accent/20 hover:shadow-md transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-accent/5 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-primary">Telepon</h4>
                        <p class="text-text-dark/60 text-sm mt-1">{{ $profile['phone'] ?? '(061) 1234-5678' }}</p>
                        <p class="text-text-dark/40 text-xs mt-0.5">IGD: (061) 8888-9999</p>
                    </div>
                </div>
                <div class="flex items-start gap-5 bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:border-accent/20 hover:shadow-md transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-accent/5 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-primary">Email</h4>
                        <p class="text-text-dark/60 text-sm mt-1">{{ $profile['email'] ?? 'info@rsmadani.com' }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-5 bg-white rounded-2xl p-5 shadow-sm border border-gray-100 hover:border-accent/20 hover:shadow-md transition-all duration-300">
                    <div class="w-12 h-12 rounded-xl bg-accent/5 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-primary">Jam Operasional</h4>
                        <p class="text-text-dark/60 text-sm mt-1">{{ $profile['hours'] ?? '24 Jam - Setiap Hari' }}</p>
                        <p class="text-text-dark/40 text-xs mt-0.5">Pendaftaran: 07.00 - 21.00 WIB</p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <a href="tel:{{ $profile['phone'] ?? '06112345678' }}" class="inline-flex items-center justify-center gap-2 bg-accent hover:bg-[#e02e4f] text-white font-semibold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg shadow-accent/25 hover:shadow-accent/40 flex-1 text-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>
                        Telepon Sekarang
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 border-2 border-primary hover:bg-primary text-primary hover:text-text-light font-semibold px-8 py-4 rounded-xl transition-all duration-300 flex-1 text-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                        Kirim Pesan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var countObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                var target = parseInt(el.getAttribute('data-count'));
                if (!isNaN(target) && target > 0) {
                    var current = 0;
                    var increment = Math.ceil(target / 60);
                    var timer = setInterval(function () {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        el.textContent = current.toLocaleString();
                    }, 25);
                }
                countObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-count]').forEach(function (el) {
        countObserver.observe(el);
    });

    {{-- Hero Carousel Logic --}}
    let currentSlide = 0;
    const slides = document.querySelectorAll('#heroCarousel > [data-slide]');
    const dots = document.querySelectorAll('[data-dot]');
    const totalSlides = slides.length;
    let autoplayTimer = null;
    let idleTimer = null;

    function showSlide(index) {
        slides.forEach(function (s, i) {
            s.classList.toggle('opacity-100', i === index);
            s.classList.toggle('opacity-0', i !== index);
            s.style.zIndex = i === index ? 1 : 0;
        });
        dots.forEach(function (d, i) {
            d.classList.toggle('bg-accent', i === index);
            d.classList.toggle('w-8', i === index);
            d.classList.toggle('bg-white/30', i !== index);
            d.classList.toggle('w-2.5', i !== index);
        });
        currentSlide = index;
    }

    function nextSlide() {
        showSlide((currentSlide + 1) % totalSlides);
        resetAutoplay();
    }

    function prevSlide() {
        showSlide((currentSlide - 1 + totalSlides) % totalSlides);
        resetAutoplay();
    }

    function goToSlide(index) {
        showSlide(index);
        resetAutoplay();
    }

    function startAutoplay() {
        if (autoplayTimer) clearInterval(autoplayTimer);
        autoplayTimer = setInterval(function () {
            nextSlide();
        }, 5000);
    }

    function resetAutoplay() {
        if (autoplayTimer) clearInterval(autoplayTimer);
        if (idleTimer) clearTimeout(idleTimer);
        idleTimer = setTimeout(function () {
            startAutoplay();
        }, 6000);
    }

    startAutoplay();

    {{-- Button navigation --}}
    document.querySelector('[data-carousel="prev"]').addEventListener('click', prevSlide);
    document.querySelector('[data-carousel="next"]').addEventListener('click', nextSlide);
    document.querySelectorAll('[data-carousel="dot"]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            goToSlide(parseInt(this.getAttribute('data-dot')));
        });
    });

    {{-- Touch swipe support --}}
    let touchStartX = 0;
    let touchEndX = 0;
    const carousel = document.getElementById('heroCarousel');

    carousel.addEventListener('touchstart', function (e) {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    carousel.addEventListener('touchend', function (e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, { passive: true });

    function handleSwipe() {
        const diff = touchStartX - touchEndX;
        if (Math.abs(diff) > 50) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
    }

    {{-- Keyboard navigation --}}
    document.addEventListener('keydown', function (e) {
        if (e.key === 'ArrowLeft') prevSlide();
        if (e.key === 'ArrowRight') nextSlide();
    });
});
</script>
@endpush
