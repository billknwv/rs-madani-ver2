<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'RS Madani'))</title>
    <meta name="description" content="@yield('meta_description', 'RS Madani - Rumah Sakit Modern dengan Pelayanan Profesional dan Islami')">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .nav-link-modern {
            position: relative;
            padding: 0.5rem 0.875rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #13203B;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: all 0.25s ease;
        }
        .nav-link-modern::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 50%;
            transform: translateX(-50%) scaleX(0);
            width: 60%;
            height: 2.5px;
            border-radius: 2px;
            background: #FF355C;
            transition: transform 0.3s ease;
        }
        .nav-link-modern:hover { color: #FF355C; background: rgba(255,53,92,0.06); }
        .nav-link-modern.active { color: #FF355C; }
        .nav-link-modern.active::after { transform: translateX(-50%) scaleX(1); }

        .dropdown-modern { position: relative; }
        .dropdown-trigger-modern {
            display: inline-flex;
            align-items: center;
        }
        .dropdown-modern:hover .dropdown-menu-modern {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .dropdown-menu-modern {
            position: absolute;
            left: 0;
            margin-top: 0.375rem;
            min-width: 200px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(0,0,0,0.06);
            border-radius: 12px;
            padding: 0.5rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1), 0 4px 16px rgba(0,0,0,0.04);
            z-index: 100;
            opacity: 0;
            visibility: hidden;
            transform: translateY(6px);
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .dropdown-item-modern {
            display: block;
            padding: 0.55rem 0.75rem;
            font-size: 0.8rem;
            font-weight: 500;
            color: #374151;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }
        .dropdown-item-modern:hover {
            background: rgba(255,53,92,0.08);
            color: #FF355C;
        }

        .mobile-link {
            display: block;
            padding: 0.65rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #13203B;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }
        .mobile-link:hover { background: rgba(255,53,92,0.06); color: #FF355C; }
        .mobile-link.active { color: #FF355C; }
        .mobile-sub-link {
            display: block;
            padding: 0.5rem 0.75rem;
            font-size: 0.8rem;
            color: #6b7280;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: all 0.15s ease;
        }
        .mobile-sub-link:hover { background: rgba(255,53,92,0.06); color: #FF355C; }
    </style>
</head>
<body class="font-sans antialiased bg-[#F5F5F5] text-[#1F2937]">

    <div class="min-h-screen flex flex-col">

        {{-- Topbar --}}
        <div class="hidden lg:block bg-[#13203B] text-white text-xs">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-9">
                <div class="flex items-center space-x-6">
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        (021) 1234-5678
                    </span>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        info@rsmadani.com
                    </span>
                </div>
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Senin - Jumat : 07.30 - 16.30
                </span>
            </div>
        </div>

        {{-- Navbar --}}
        <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-gray-100/60">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <img src="{{ asset('logo/logo.png') }}" alt="RS Madani" height="38" class="h-[38px] w-auto transition-transform duration-300 group-hover:scale-105">
                        <div class="leading-tight">
                            <div class="text-sm font-extrabold tracking-tight text-[#13203B]">RSUD Madani</div>
                            <div class="text-[10px] text-gray-400 font-medium">Provinsi Sulawesi Tengah</div>
                        </div>
                    </a>

                    <nav class="hidden lg:flex items-center gap-1">
                        <a href="{{ route('home') }}" class="nav-link-modern {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

                        <div class="relative dropdown-modern">
                            <button class="nav-link-modern dropdown-trigger-modern {{ request()->routeIs('profil.*') ? 'active' : '' }}">
                                Profil
                                <svg class="w-3.5 h-3.5 ml-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div class="dropdown-menu-modern">
                                <a href="{{ route('profil.about') }}" class="dropdown-item-modern">Tentang Kami</a>
                                <a href="{{ route('profil.history') }}" class="dropdown-item-modern">Sejarah</a>
                                <a href="{{ route('profil.vision-mission') }}" class="dropdown-item-modern">Visi & Misi</a>
                                <a href="{{ route('profil.director-message') }}" class="dropdown-item-modern">Sambutan Direktur</a>
                                <a href="{{ route('profil.structure') }}" class="dropdown-item-modern">Struktur Organisasi</a>
                                <a href="{{ route('profil.accreditation') }}" class="dropdown-item-modern">Akreditasi</a>
                            </div>
                        </div>

                        <div class="relative dropdown-modern">
                            <button class="nav-link-modern dropdown-trigger-modern {{ request()->routeIs('layanan') ? 'active' : '' }}">
                                Layanan
                                <svg class="w-3.5 h-3.5 ml-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div class="dropdown-menu-modern !w-64 !p-0 overflow-hidden">
                                <div class="px-4 pt-3 pb-1.5 text-[10px] font-bold uppercase tracking-[0.12em] text-[#FF355C]">Layanan Medis</div>
                                <a href="{{ route('layanan') }}" class="dropdown-item-modern">IGD</a>
                                <a href="{{ route('layanan') }}" class="dropdown-item-modern">Rawat Jalan</a>
                                <a href="{{ route('layanan.rawat-inap') }}" class="dropdown-item-modern">Rawat Inap</a>
                                <div class="mx-3 my-1 h-px bg-gray-100"></div>
                                <div class="px-4 pt-1 pb-1.5 text-[10px] font-bold uppercase tracking-[0.12em] text-[#FF355C]">Layanan Penunjang</div>
                                <a href="{{ route('layanan') }}" class="dropdown-item-modern">Radiologi</a>
                                <a href="{{ route('layanan') }}" class="dropdown-item-modern">Farmasi</a>
                                <a href="{{ route('layanan') }}" class="dropdown-item-modern">Laboratorium</a>
                                <div class="mx-3 my-1 h-px bg-gray-100"></div>
                                <div class="px-4 pt-1 pb-1.5 text-[10px] font-bold uppercase tracking-[0.12em] text-[#FF355C]">Layanan Unggulan</div>
                                <a href="{{ route('layanan') }}" class="dropdown-item-modern">TMS</a>
                                <a href="{{ route('layanan') }}" class="dropdown-item-modern">Layanan Saraf</a>
                                <a href="{{ route('layanan') }}" class="dropdown-item-modern">Rehabilitasi Narkoba</a>
                                <a href="{{ route('layanan') }}" class="dropdown-item-modern">Kesehatan Jiwa Anak & Remaja</a>
                            </div>
                        </div>

                        <a href="{{ route('dokter') }}" class="nav-link-modern {{ request()->routeIs('dokter') ? 'active' : '' }}">Dokter</a>
                        <a href="{{ route('artikel') }}" class="nav-link-modern {{ request()->routeIs('artikel') ? 'active' : '' }}">Artikel</a>
                        <a href="{{ route('contact') }}" class="ml-2 px-5 py-2 text-sm font-semibold text-white bg-[#FF355C] hover:bg-[#e02e4f] transition-all duration-300 rounded-full shadow-sm hover:shadow-md hover:shadow-[#FF355C]/20 hover:-translate-y-0.5">Hubungi Kami</a>
                    </nav>

                    <button class="lg:hidden relative w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors" onclick="document.getElementById('mobile-menu').classList.toggle('hidden'); this.classList.toggle('active')" id="menuBtn">
                        <div class="w-5 flex flex-col gap-1.5">
                            <span class="block h-0.5 bg-[#13203B] rounded-full transition-all duration-300"></span>
                            <span class="block h-0.5 bg-[#13203B] rounded-full transition-all duration-300"></span>
                            <span class="block h-0.5 bg-[#13203B] rounded-full transition-all duration-300"></span>
                        </div>
                    </button>
                </div>

                {{-- Mobile Menu --}}
                <div id="mobile-menu" class="hidden lg:hidden border-t border-gray-100 py-4 space-y-1">
                    <a href="{{ route('home') }}" class="mobile-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

                    <div>
                        <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')" class="mobile-link w-full flex items-center justify-between">
                            Profil
                            <svg class="w-4 h-4 transition-transform duration-200 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="hidden pl-4 space-y-0.5 pb-2">
                            <a href="{{ route('profil.about') }}" class="mobile-sub-link">Tentang Kami</a>
                            <a href="{{ route('profil.history') }}" class="mobile-sub-link">Sejarah</a>
                            <a href="{{ route('profil.vision-mission') }}" class="mobile-sub-link">Visi & Misi</a>
                            <a href="{{ route('profil.director-message') }}" class="mobile-sub-link">Sambutan Direktur</a>
                            <a href="{{ route('profil.structure') }}" class="mobile-sub-link">Struktur Organisasi</a>
                            <a href="{{ route('profil.accreditation') }}" class="mobile-sub-link">Akreditasi</a>
                        </div>
                    </div>

                    <div>
                        <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')" class="mobile-link w-full flex items-center justify-between">
                            Layanan
                            <svg class="w-4 h-4 transition-transform duration-200 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="hidden pl-4 space-y-0.5 pb-2">
                            <div class="px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.1em] text-[#FF355C] mt-1">Layanan Medis</div>
                            <a href="{{ route('layanan') }}" class="mobile-sub-link">IGD</a>
                            <a href="{{ route('layanan') }}" class="mobile-sub-link">Rawat Jalan</a>
                            <a href="{{ route('layanan.rawat-inap') }}" class="mobile-sub-link">Rawat Inap</a>
                            <div class="px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.1em] text-[#FF355C] mt-2">Layanan Penunjang</div>
                            <a href="{{ route('layanan') }}" class="mobile-sub-link">Radiologi</a>
                            <a href="{{ route('layanan') }}" class="mobile-sub-link">Farmasi</a>
                            <a href="{{ route('layanan') }}" class="mobile-sub-link">Laboratorium</a>
                            <div class="px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.1em] text-[#FF355C] mt-2">Layanan Unggulan</div>
                            <a href="{{ route('layanan') }}" class="mobile-sub-link">TMS</a>
                            <a href="{{ route('layanan') }}" class="mobile-sub-link">Layanan Saraf</a>
                            <a href="{{ route('layanan') }}" class="mobile-sub-link">Rehabilitasi Narkoba</a>
                            <a href="{{ route('layanan') }}" class="mobile-sub-link">Kesehatan Jiwa Anak & Remaja</a>
                        </div>
                    </div>

                    <a href="{{ route('dokter') }}" class="mobile-link {{ request()->routeIs('dokter') ? 'active' : '' }}">Dokter</a>
                    <a href="{{ route('artikel') }}" class="mobile-link {{ request()->routeIs('artikel') ? 'active' : '' }}">Artikel</a>
                    <a href="{{ route('contact') }}" class="block mx-3 mt-3 px-4 py-2.5 text-sm font-semibold text-center text-white bg-[#FF355C] rounded-full shadow-sm">Hubungi Kami</a>
                </div>
            </div>
        </header>

        {{-- Main Content --}}
        <main class="flex-1">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="relative bg-[#13203B] text-white overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-[#FF355C]/50 to-transparent"></div>
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-[#FF355C]/5 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 lg:py-18">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 lg:gap-12">
                    {{-- Kolom 1: Informasi Rumah Sakit --}}
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <img src="{{ asset('logo/logo.png') }}" alt="RSUD Madani" height="42" class="h-[42px] w-auto brightness-0 invert">
                            <div>
                                <h4 class="text-base font-extrabold tracking-tight">RSUD Madani Palu</h4>
                                <p class="text-[11px] text-gray-400">Provinsi Sulawesi Tengah</p>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 leading-relaxed mb-3">Jl. Thalua Konchi No.11, Mamboro</p>
                        <p class="text-xs text-gray-400/70 leading-relaxed mb-5">Rumah Sakit Umum Daerah Madani Palu adalah rumah sakit tipe C yang menyediakan pelayanan kesehatan profesional dan terpercaya dengan teknologi medis terkini, berkomitmen memberikan pelayanan paripurna.</p>
                        <div class="flex items-center gap-2.5">
                            <a href="#" class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center hover:bg-[#FF355C] transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-[#FF355C]/20 group" aria-label="Facebook">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center hover:bg-[#FF355C] transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-[#FF355C]/20 group" aria-label="Instagram">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5" stroke-width="1.8"/><circle cx="12" cy="12" r="5" stroke-width="1.8"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center hover:bg-[#FF355C] transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-[#FF355C]/20 group" aria-label="X/Twitter">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="#" class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center hover:bg-[#FF355C] transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-[#FF355C]/20 group" aria-label="YouTube">
                                <svg class="w-4 h-4 text-gray-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        </div>
                    </div>

                    {{-- Kolom 2: Layanan --}}
                    <div>
                        <h3 class="text-sm font-bold mb-5 relative inline-block">
                            Layanan
                            <span class="absolute -bottom-1.5 left-0 w-8 h-0.5 bg-[#FF355C] rounded-full"></span>
                        </h3>
                        <ul class="space-y-2.5">
                            <li><a href="{{ route('layanan') }}" class="text-sm text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">Rawat Jalan</a></li>
                            <li><a href="{{ route('layanan.rawat-inap') }}" class="text-sm text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">Rawat Inap</a></li>
                            <li><a href="{{ route('layanan') }}" class="text-sm text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">IGD</a></li>
                            <li><a href="{{ route('layanan') }}" class="text-sm text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">Radiologi</a></li>
                            <li><a href="{{ route('layanan') }}" class="text-sm text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">Farmasi</a></li>
                            <li><a href="{{ route('layanan') }}" class="text-sm text-gray-400 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">Laboratorium</a></li>
                        </ul>
                    </div>

                    {{-- Kolom 3: Kontak --}}
                    <div>
                        <h3 class="text-sm font-bold mb-5 relative inline-block">
                            Kontak
                            <span class="absolute -bottom-1.5 left-0 w-8 h-0.5 bg-[#FF355C] rounded-full"></span>
                        </h3>
                        <ul class="space-y-3.5 text-sm">
                            <li class="flex items-start gap-3">
                                <svg class="w-4 h-4 mt-0.5 shrink-0 text-[#FF355C]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/></svg>
                                <span class="text-gray-400 leading-relaxed">Jl. Thalua Konchi No.11, Mamboro, Palu Utara, Sulawesi Tengah</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-4 h-4 shrink-0 text-[#FF355C]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/></svg>
                                <span class="text-gray-400">(0451) 491605</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-4 h-4 shrink-0 text-[#FF355C]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/></svg>
                                <span class="text-gray-400">+62 811-1234-5678</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-4 h-4 shrink-0 text-[#FF355C]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/></svg>
                                <a href="mailto:rsmadanipalu@gmail.com" class="text-gray-400 hover:text-white transition">rsmadanipalu@gmail.com</a>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-4 h-4 shrink-0 text-[#FF355C]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span class="text-gray-400">IGD 24 Jam / 7 Hari</span>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- Bottom bar --}}
                <div class="pt-6 border-t border-white/10 flex flex-col lg:flex-row items-center justify-between gap-4 text-xs text-gray-500">
                    <p>&copy; {{ date('Y') }} RSUD Madani Palu. All rights reserved.</p>
                    <div class="flex items-center gap-4">
                        <a href="#" class="hover:text-gray-300 transition">Kebijakan Privasi</a>
                        <span class="text-white/20">|</span>
                        <a href="#" class="hover:text-gray-300 transition">Syarat & Ketentuan</a>
                    </div>
                </div>
            </div>
        </footer>

        {{-- Back to Top --}}
        <button onclick="window.scrollTo({top:0,behavior:'smooth'})" class="fixed bottom-6 right-6 p-3 bg-[#FF355C] text-white rounded-full shadow-lg hover:bg-[#e02e4f] transition z-50 hidden" id="back-to-top">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
        </button>

    </div>

    <script>
        const backToTop = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            backToTop.style.display = window.scrollY > 400 ? 'block' : 'none';
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.fade-in-section').forEach(function (el) {
                observer.observe(el);
            });
        });
    </script>

    @stack('scripts')
</body>
</html>
