@extends('admin.layouts.app')
@section('title', 'Profil Rumah Sakit')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #111827;">Profil Rumah Sakit</h2>
        <p style="font-size: 0.85rem; color: #6b7280; margin-top: 0.25rem;">Kelola informasi profil RS Madani</p>
    </div>

    @if(session('success'))
        <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 0.75rem 1rem; border-radius: 10px; font-size: 0.875rem; margin-bottom: 1.25rem; display: flex; align-items: center; gap: 0.5rem;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div style="background: #fff; border-radius: 14px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); overflow: hidden;">
        <div style="border-bottom: 1px solid #e5e7eb; padding: 0 1.5rem; display: flex; gap: 0; overflow-x: auto;" id="tabHeaders">
            <button type="button" class="tab-btn active" data-tab="about" style="padding: 1rem 1.25rem; background: none; border: none; border-bottom: 2px solid #FF355C; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 600; color: #FF355C; cursor: pointer; white-space: nowrap;">Tentang</button>
            <button type="button" class="tab-btn" data-tab="history" style="padding: 1rem 1.25rem; background: none; border: none; border-bottom: 2px solid transparent; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 500; color: #6b7280; cursor: pointer; white-space: nowrap;">Sejarah</button>
            <button type="button" class="tab-btn" data-tab="vision_mission" style="padding: 1rem 1.25rem; background: none; border: none; border-bottom: 2px solid transparent; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 500; color: #6b7280; cursor: pointer; white-space: nowrap;">Visi & Misi</button>
            <button type="button" class="tab-btn" data-tab="director" style="padding: 1rem 1.25rem; background: none; border: none; border-bottom: 2px solid transparent; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 500; color: #6b7280; cursor: pointer; white-space: nowrap;">Sambutan Direktur</button>
            <button type="button" class="tab-btn" data-tab="structure" style="padding: 1rem 1.25rem; background: none; border: none; border-bottom: 2px solid transparent; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 500; color: #6b7280; cursor: pointer; white-space: nowrap;">Struktur Organisasi</button>
            <button type="button" class="tab-btn" data-tab="accreditation" style="padding: 1rem 1.25rem; background: none; border: none; border-bottom: 2px solid transparent; font-family: 'Inter', sans-serif; font-size: 0.85rem; font-weight: 500; color: #6b7280; cursor: pointer; white-space: nowrap;">Akreditasi</button>
        </div>

        <form action="{{ route('admin.profiles.update') }}" method="POST" enctype="multipart/form-data" style="padding: 2rem;">
            @csrf

            {{-- About --}}
            <div class="tab-content" id="tab-about" style="display: block;">
                <h3 style="font-size: 1.1rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">Tentang RS Madani</h3>
                <div style="margin-bottom: 1rem;">
                    <label for="about" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Deskripsi Tentang</label>
                    <textarea id="about" name="about" rows="8"
                              style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                              onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('about', $profile->about ?? '') }}</textarea>
                    @error('about') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- History --}}
            <div class="tab-content" id="tab-history" style="display: none;">
                <h3 style="font-size: 1.1rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">Sejarah</h3>
                <div style="margin-bottom: 1rem;">
                    <label for="history" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Konten Sejarah</label>
                    <textarea id="history" name="history" rows="10"
                              style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                              onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('history', $profile->history ?? '') }}</textarea>
                    @error('history') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Vision & Mission --}}
            <div class="tab-content" id="tab-vision_mission" style="display: none;">
                <h3 style="font-size: 1.1rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">Visi & Misi</h3>
                <div style="margin-bottom: 1rem;">
                    <label for="vision_mission" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Konten Visi & Misi</label>
                    <textarea id="vision_mission" name="vision_mission" rows="10"
                              style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                              onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('vision_mission', $profile->vision_mission ?? '') }}</textarea>
                    @error('vision_mission') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Director Message --}}
            <div class="tab-content" id="tab-director" style="display: none;">
                <h3 style="font-size: 1.1rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">Sambutan Direktur</h3>
                <div style="margin-bottom: 1rem;">
                    <label for="director_message" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Pesan Direktur</label>
                    <textarea id="director_message" name="director_message" rows="10"
                              style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                              onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('director_message', $profile->director_message ?? '') }}</textarea>
                    @error('director_message') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="director_photo" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Foto Direktur</label>
                    @if(!empty($profile->director_photo))
                        <div style="margin-bottom: 0.75rem;">
                            <img src="{{ Storage::url($profile->director_photo) }}" alt="Director photo" style="width: 120px; height: 140px; object-fit: cover; border-radius: 8px; border: 1px solid #e5e7eb;">
                        </div>
                    @endif
                    <input type="file" id="director_photo" name="director_photo" accept="image/*"
                           style="width: 100%; padding: 0.5rem 0; font-family: 'Inter', sans-serif; font-size: 0.875rem;">
                    <p style="font-size: 0.75rem; color: #9ca3af; margin-top: 0.3rem;">Format: JPG, PNG. Maks: 2MB.</p>
                    @error('director_photo') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Organizational Structure --}}
            <div class="tab-content" id="tab-structure" style="display: none;">
                <h3 style="font-size: 1.1rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">Struktur Organisasi</h3>
                <div style="margin-bottom: 1rem;">
                    <label for="organizational_structure" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Konten Struktur Organisasi</label>
                    <textarea id="organizational_structure" name="organizational_structure" rows="8"
                              style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                              onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('organizational_structure', $profile->organizational_structure ?? '') }}</textarea>
                    @error('organizational_structure') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="structure_image" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Gambar Struktur Organisasi</label>
                    @if(!empty($profile->structure_image))
                        <div style="margin-bottom: 0.75rem;">
                            <img src="{{ Storage::url($profile->structure_image) }}" alt="Structure image" style="max-width: 300px; max-height: 200px; object-fit: contain; border-radius: 8px; border: 1px solid #e5e7eb;">
                        </div>
                    @endif
                    <input type="file" id="structure_image" name="structure_image" accept="image/*"
                           style="width: 100%; padding: 0.5rem 0; font-family: 'Inter', sans-serif; font-size: 0.875rem;">
                    <p style="font-size: 0.75rem; color: #9ca3af; margin-top: 0.3rem;">Format: JPG, PNG. Maks: 2MB.</p>
                    @error('structure_image') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Accreditation --}}
            <div class="tab-content" id="tab-accreditation" style="display: none;">
                <h3 style="font-size: 1.1rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">Akreditasi</h3>
                <div style="margin-bottom: 1rem;">
                    <label for="accreditation" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Konten Akreditasi</label>
                    <textarea id="accreditation" name="accreditation" rows="8"
                              style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                              onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                              onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('accreditation', $profile->accreditation ?? '') }}</textarea>
                    @error('accreditation') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="accreditation_image" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Gambar Akreditasi</label>
                    @if(!empty($profile->accreditation_image))
                        <div style="margin-bottom: 0.75rem;">
                            <img src="{{ Storage::url($profile->accreditation_image) }}" alt="Accreditation image" style="max-width: 200px; max-height: 200px; object-fit: contain; border-radius: 8px; border: 1px solid #e5e7eb;">
                        </div>
                    @endif
                    <input type="file" id="accreditation_image" name="accreditation_image" accept="image/*"
                           style="width: 100%; padding: 0.5rem 0; font-family: 'Inter', sans-serif; font-size: 0.875rem;">
                    <p style="font-size: 0.75rem; color: #9ca3af; margin-top: 0.3rem;">Format: JPG, PNG. Maks: 2MB.</p>
                    @error('accreditation_image') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
                </div>
            </div>

            <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #e5e7eb;">
                <button type="submit" style="background: #FF355C; color: #fff; padding: 0.7rem 2rem; border: none; border-radius: 9px; font-size: 0.9rem; font-weight: 600; font-family: 'Inter', sans-serif; cursor: pointer; transition: background 0.2s;">
                    Simpan Semua Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabBtns = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');

            tabBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const target = this.dataset.tab;

                    tabBtns.forEach(b => {
                        b.style.color = '#6b7280';
                        b.style.fontWeight = '500';
                        b.style.borderBottomColor = 'transparent';
                    });
                    this.style.color = '#FF355C';
                    this.style.fontWeight = '600';
                    this.style.borderBottomColor = '#FF355C';

                    tabContents.forEach(tc => {
                        tc.style.display = 'none';
                    });
                    const activeTab = document.getElementById('tab-' + target);
                    if (activeTab) {
                        activeTab.style.display = 'block';
                    }
                });
            });
        });
    </script>
@endsection
