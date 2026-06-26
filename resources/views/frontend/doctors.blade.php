@extends('layouts.app')

@section('title', 'Dokter RS Madani')

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
                <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium">Dokter</span>
            </nav>
            <div class="flex items-start gap-5">
                <div class="w-1 h-16 bg-gradient-to-b from-accent to-accent/20 rounded-full shrink-0 mt-2"></div>
                <div>
                    <h1 class="text-3xl md:text-5xl font-bold text-text-light mb-3">Dokter Kami</h1>
                    <p class="text-text-light/60 text-base md:text-lg max-w-2xl">Tim dokter profesional dan berpengalaman siap melayani Anda</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Search & Filter Bar --}}
<section class="bg-white border-b border-gray-100 sticky top-20 z-30 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <form method="GET" action="{{ route('dokter') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-text-dark/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari dokter..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-secondary text-sm text-text-dark focus:border-accent focus:ring-1 focus:ring-accent outline-none transition placeholder:text-text-dark/30">
            </div>
            <select name="clinic"
                class="w-full sm:w-48 px-4 py-2.5 rounded-xl border border-gray-200 bg-secondary text-sm text-text-dark focus:border-accent focus:ring-1 focus:ring-accent outline-none transition">
                <option value="">Semua Klinik</option>
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic }}" {{ request('clinic') == $clinic ? 'selected' : '' }}>{{ $clinic }}</option>
                @endforeach
            </select>
            <button type="submit"
                class="px-6 py-2.5 rounded-xl bg-accent text-white text-sm font-semibold hover:bg-[#e02e4f] transition-all duration-200 shadow-sm hover:shadow-md hover:-translate-y-0.5">
                Cari
            </button>
        </form>
    </div>
</section>

{{-- Doctor Cards --}}
<section class="py-12 md:py-16 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if ($doctors->count() > 0)
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 justify-items-center">
                @foreach ($doctors as $doctor)
                    <div class="group bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-accent/20 hover:shadow-xl hover:shadow-accent/5 transition-all duration-500 fade-in-section hover:-translate-y-1 w-full max-w-[280px]">
                        <div class="relative h-44 bg-gradient-to-br from-primary to-[#1a2d52] overflow-hidden">
                            @if ($doctor->photo)
                                <img src="{{ Storage::url($doctor->photo) }}" alt="{{ $doctor->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <img src="{{ asset('foto/dokter/dokter.png') }}" alt="{{ $doctor->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <span class="bg-accent/90 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $doctor->specialization }}
                                </span>
                            </div>
                        </div>
                        <div class="p-4 flex flex-col">
                            <div class="flex-1">
                                <h3 class="text-base font-bold text-primary group-hover:text-accent transition-colors duration-500">{{ $doctor->name }}</h3>
                                @if($doctor->clinic)
                                    <p class="text-text-dark/50 text-sm mt-1">{{ $doctor->clinic }}</p>
                                @endif
                            </div>

                            <a href="{{ route('dokter.show', $doctor->slug) }}"
                                class="mt-4 relative inline-flex items-center justify-center w-full gap-2 px-4 py-2.5 rounded-2xl bg-gradient-to-r from-accent to-[#e02e4f] text-white text-sm font-semibold overflow-hidden transition-all duration-300 shadow-sm hover:shadow-lg hover:shadow-accent/30 hover:-translate-y-0.5 group/btn">
                                <span class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 translate-x-[-100%] group-hover/btn:translate-x-[100%] transition-transform duration-700"></span>
                                <span class="relative flex items-center gap-2">
                                    Lihat Detail
                                    <svg class="w-4 h-4 transition-transform duration-300 group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($doctors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="mt-10">
                    {{ $doctors->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-20 fade-in-section">
                <div class="w-20 h-20 rounded-2xl bg-accent/10 flex items-center justify-center mx-auto mb-5">
                    <svg class="w-10 h-10 text-accent/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>
                </div>
                <h3 class="text-xl font-bold text-primary mb-2">Tidak ada dokter ditemukan</h3>
                <p class="text-text-dark/50">Coba ubah kata kunci pencarian atau filter klinik Anda</p>
            </div>
        @endif
    </div>
</section>
@endsection



