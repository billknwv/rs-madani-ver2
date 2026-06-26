@extends('layouts.app')

@section('title', 'Hubungi Kami - RS Madani')

@section('content')
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
                    <span class="px-3 py-1.5 rounded-lg bg-accent/10 text-accent font-medium">Kontak</span>
                </nav>
                <div class="flex items-start gap-5">
                    <div class="w-1 h-16 bg-gradient-to-b from-accent to-accent/20 rounded-full shrink-0 mt-2"></div>
                    <div>
                        <h1 class="text-3xl md:text-5xl font-bold text-text-light mb-3">Hubungi Kami</h1>
                        <p class="text-text-light/60 text-base md:text-lg max-w-2xl">Kami siap melayani Anda. Silakan hubungi kami melalui informasi di bawah ini.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
            <div class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-6 py-4 flex items-center animate-fade-in">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div class="space-y-6 animate-slide-in">
                <h2 class="text-2xl font-bold text-text-dark mb-2">Informasi Kontak</h2>
                <p class="text-gray-600">Kami siap membantu Anda. Silakan hubungi kami melalui informasi di bawah ini.</p>

                <div class="bg-white rounded-xl shadow-md p-5 flex items-start space-x-4 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-text-dark">Alamat</h3>
                        <p class="text-sm text-gray-600 mt-1">Jl. Raden Saleh No. 3, Menteng, Jakarta Pusat, DKI Jakarta 10310</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-5 flex items-start space-x-4 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-text-dark">Telepon</h3>
                        <p class="text-sm text-gray-600 mt-1">(021) 1234-5678</p>
                        <p class="text-sm text-gray-600">(021) 8765-4321</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-5 flex items-start space-x-4 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-text-dark">Email</h3>
                        <p class="text-sm text-gray-600 mt-1">info@rsmadani.com</p>
                        <p class="text-sm text-gray-600">cs@rsmadani.com</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md p-5 flex items-start space-x-4 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-text-dark">Jam Operasional</h3>
                        <p class="text-sm text-gray-600 mt-1">Senin - Kamis: 07.30 - 16.00</p>
                        <p class="text-sm text-gray-600">Jumat: 07.30 - 16.30</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-md p-6 md:p-8 animate-slide-in animate-delay-200">
                <h2 class="text-2xl font-bold text-text-dark mb-6">Kirim Pesan</h2>
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-text-dark mb-1.5">Nama Lengkap</label>
                        <input type="text" name="name" id="name" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-accent/30 focus:border-accent outline-none transition text-sm"
                            placeholder="Masukkan nama Anda">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-text-dark mb-1.5">Email</label>
                        <input type="email" name="email" id="email" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-accent/30 focus:border-accent outline-none transition text-sm"
                            placeholder="Masukkan email Anda">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-text-dark mb-1.5">Nomor Telepon</label>
                        <input type="tel" name="phone" id="phone"
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-accent/30 focus:border-accent outline-none transition text-sm"
                            placeholder="Masukkan nomor telepon">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-text-dark mb-1.5">Pesan</label>
                        <textarea name="message" id="message" rows="5" required
                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-accent/30 focus:border-accent outline-none transition text-sm resize-none"
                            placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>
                    <button type="submit"
                        class="w-full bg-accent hover:bg-accent/90 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 text-sm">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section class="pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="rounded-xl overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1-6.2088!2d106.8456!3d-6.2088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f1b3b3b3b3%3A0x0!2sJakarta!5e0!3m2!1sid!2sid!4v1!4m5!1m2!2m1!1sJakarta!3m2!1sid!2sid"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Lokasi RS Madani">
                </iframe>
            </div>
        </div>
    </section>
@endsection
