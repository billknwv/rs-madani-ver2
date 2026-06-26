@extends('layouts.app')

@section('title', $doctor->name . ' - RS Madani')

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
                <a href="{{ route('dokter') }}" class="px-3 py-1.5 rounded-lg bg-white/5 text-text-light/60 hover:bg-white/10 hover:text-text-light transition-all duration-200">Dokter</a>
                <svg class="w-3.5 h-3.5 text-text-light/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium">{{ $doctor->name }}</span>
            </nav>
        </div>
    </div>
</section>

{{-- Detail --}}
<section class="py-12 md:py-16 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-section">
            <div class="grid md:grid-cols-5 gap-0">
                {{-- Left - Photo & Info --}}
                <div class="md:col-span-2 bg-gradient-to-br from-primary to-[#1e3055] p-8 md:p-10 flex flex-col items-center text-center">
                    <div class="w-44 h-44 md:w-52 md:h-52 rounded-2xl overflow-hidden shadow-lg mb-6 ring-4 ring-white/20">
                        @if ($doctor->photo)
                            <img src="{{ Storage::url($doctor->photo) }}" alt="{{ $doctor->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('foto/dokter/dokter.png') }}" alt="{{ $doctor->name }}"
                                class="w-full h-full object-cover">
                        @endif
                    </div>
                    <h1 class="text-2xl font-bold text-text-light">{{ $doctor->name }}</h1>
                    <p class="text-accent font-medium mt-1">{{ $doctor->specialization }}</p>
                    <div class="flex items-center justify-center gap-2 mt-3 text-sm text-text-light/60">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>{{ $doctor->clinic }}</span>
                    </div>
                </div>

                {{-- Right - Description & Schedule --}}
                <div class="md:col-span-3 p-8 md:p-10">
                    @if ($doctor->description)
                        <div class="mb-8">
                            <h2 class="text-lg font-bold text-primary mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Tentang Dokter
                            </h2>
                            <p class="text-sm text-text-dark/70 leading-relaxed">{{ $doctor->description }}</p>
                        </div>
                    @endif

                    <div>
                        <h2 class="text-lg font-bold text-primary mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Jadwal Praktik
                        </h2>
                        @if ($doctor->schedules && $doctor->schedules->count() > 0)
                            <div class="overflow-hidden rounded-xl border border-gray-200">
                                <table class="w-full text-sm">
                                    <thead>
                                        <tr class="bg-primary text-text-light">
                                            <th class="text-left px-4 py-3 font-semibold">Hari</th>
                                            <th class="text-left px-4 py-3 font-semibold">Jam Mulai</th>
                                            <th class="text-left px-4 py-3 font-semibold">Jam Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach ($doctor->schedules as $schedule)
                                            <tr class="hover:bg-secondary transition">
                                                <td class="px-4 py-3 font-medium text-primary">{{ $schedule->day }}</td>
                                                <td class="px-4 py-3 text-text-dark/60">{{ $schedule->start_time ? \Carbon\Carbon::parse($schedule->start_time)->format('H:i') : '-' }}</td>
                                                <td class="px-4 py-3 text-text-dark/60">{{ $schedule->end_time ? \Carbon\Carbon::parse($schedule->end_time)->format('H:i') : '-' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-12 bg-secondary rounded-xl border border-dashed border-gray-200">
                                <svg class="w-12 h-12 mx-auto text-text-dark/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <p class="mt-3 text-sm text-text-dark/40">Belum ada jadwal tersedia</p>
                            </div>
                        @endif
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('dokter') }}"
                            class="inline-flex items-center gap-2 text-sm font-semibold text-accent hover:gap-3 transition-all duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            Kembali ke Daftar Dokter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Other Doctors --}}
@if ($otherDoctors && $otherDoctors->count() > 0)
<section class="pb-16 md:pb-20 bg-secondary">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="fade-in-section">
            <h2 class="text-xl font-bold text-primary mb-6">Dokter Lain di {{ $doctor->clinic }}</h2>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($otherDoctors as $other)
                    <a href="{{ route('dokter.show', $other->slug) }}"
                        class="group bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg hover:border-accent/20 transition-all duration-300 hover:-translate-y-1">
                        <div class="h-40 overflow-hidden">
                            @if ($other->photo)
                                <img src="{{ Storage::url($other->photo) }}" alt="{{ $other->name }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <img src="{{ asset('foto/dokter/dokter.png') }}" alt="Dokter"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-primary group-hover:text-accent transition-colors">{{ $other->name }}</h3>
                            <p class="text-xs text-accent mt-0.5">{{ $other->specialization }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
@endsection



