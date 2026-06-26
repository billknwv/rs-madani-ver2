@extends('admin.layouts.app')
@section('title', 'Tambah Dokter')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #111827;">Tambah Dokter</h2>
        <p style="font-size: 0.85rem; color: #6b7280; margin-top: 0.25rem;">Tambah data dokter baru</p>
    </div>

    <div style="background: #fff; border-radius: 14px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); padding: 2rem; max-width: 760px;">
        <form action="{{ route('admin.doctors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 1.25rem;">
                <label for="name" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                       style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                @error('name') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="specialization" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Spesialisasi</label>
                <input type="text" id="specialization" name="specialization" value="{{ old('specialization') }}" required
                       style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                @error('specialization') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="clinic" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Klinik</label>
                <input type="text" id="clinic" name="clinic" value="{{ old('clinic') }}" required
                       style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                @error('clinic') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="description" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Deskripsi</label>
                <textarea id="description" name="description" rows="6"
                          style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                          onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                          onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('description') }}</textarea>
                @error('description') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="photo" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Foto</label>
                <input type="file" id="photo" name="photo" accept="image/*"
                       style="width: 100%; padding: 0.5rem 0; font-family: 'Inter', sans-serif; font-size: 0.875rem;">
                <p style="font-size: 0.75rem; color: #9ca3af; margin-top: 0.3rem;">Format: JPG, PNG. Maks: 2MB.</p>
                @error('photo') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            {{-- Jadwal Praktik --}}
            <div style="margin-bottom: 1.5rem; padding-top: 1rem; border-top: 1.5px solid #f3f4f6;">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                    <h3 style="font-size: 1rem; font-weight: 700; color: #111827;">Jadwal Praktik</h3>
                    <button type="button" onclick="addScheduleRow()"
                            style="display: inline-flex; align-items: center; gap: 0.35rem; background: #eff6ff; color: #1d4ed8; padding: 0.4rem 0.9rem; border: none; border-radius: 6px; font-size: 0.8rem; font-weight: 600; font-family: 'Inter', sans-serif; cursor: pointer; transition: background 0.15s;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                        Tambah Jadwal
                    </button>
                </div>
                <div id="schedule-container">
                    <div class="schedule-row" style="display: grid; grid-template-columns: 1.2fr 0.8fr 0.8fr 0.5fr auto; gap: 0.6rem; align-items: end; margin-bottom: 0.6rem; padding: 0.75rem; background: #f9fafb; border-radius: 8px;">
                        <div>
                            <label style="display: block; font-size: 0.7rem; font-weight: 600; color: #6b7280; margin-bottom: 0.25rem;">Hari</label>
                            <select name="schedules[0][day]" required
                                    style="width: 100%; padding: 0.5rem 0.6rem; border: 1.5px solid #e5e7eb; border-radius: 6px; font-size: 0.8rem; font-family: 'Inter', sans-serif; outline: none; background: #fff;">
                                <option value="">Pilih</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.7rem; font-weight: 600; color: #6b7280; margin-bottom: 0.25rem;">Mulai</label>
                            <input type="time" name="schedules[0][start_time]" required
                                   style="width: 100%; padding: 0.5rem 0.6rem; border: 1.5px solid #e5e7eb; border-radius: 6px; font-size: 0.8rem; font-family: 'Inter', sans-serif; outline: none;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.7rem; font-weight: 600; color: #6b7280; margin-bottom: 0.25rem;">Selesai</label>
                            <input type="time" name="schedules[0][end_time]" required
                                   style="width: 100%; padding: 0.5rem 0.6rem; border: 1.5px solid #e5e7eb; border-radius: 6px; font-size: 0.8rem; font-family: 'Inter', sans-serif; outline: none;">
                        </div>
                        <div>
                            <label style="display: block; font-size: 0.7rem; font-weight: 600; color: #6b7280; margin-bottom: 0.25rem;">Aktif</label>
                            <input type="checkbox" name="schedules[0][is_active]" value="1" checked
                                   style="width: 16px; height: 16px; accent-color: #FF355C;">
                        </div>
                        <div style="display: flex; align-items: center; padding-bottom: 0.25rem;">
                            <button type="button" onclick="this.closest('.schedule-row').remove()"
                                    style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; background: #fef2f2; color: #dc2626; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem; transition: background 0.15s;">
                                &times;
                            </button>
                        </div>
                    </div>
                </div>
                <p style="font-size: 0.75rem; color: #9ca3af;">Tambahkan jadwal praktik dokter. Minimal satu jadwal.</p>
            </div>

            <div style="display: flex; align-items: center; gap: 0.75rem; padding-top: 0.5rem;">
                <button type="submit" style="background: #FF355C; color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 9px; font-size: 0.9rem; font-weight: 600; font-family: 'Inter', sans-serif; cursor: pointer; transition: background 0.2s;">
                    Simpan Dokter
                </button>
                <a href="{{ route('admin.doctors.index') }}" style="color: #6b7280; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Batal</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
let scheduleIndex = 1;
function addScheduleRow() {
    const container = document.getElementById('schedule-container');
    const row = document.createElement('div');
    row.className = 'schedule-row';
    row.style.cssText = 'display: grid; grid-template-columns: 1.2fr 0.8fr 0.8fr 0.5fr auto; gap: 0.6rem; align-items: end; margin-bottom: 0.6rem; padding: 0.75rem; background: #f9fafb; border-radius: 8px;';
    const i = scheduleIndex++;
    row.innerHTML = `
        <div>
            <label style="display: block; font-size: 0.7rem; font-weight: 600; color: #6b7280; margin-bottom: 0.25rem;">Hari</label>
            <select name="schedules[${i}][day]" required style="width: 100%; padding: 0.5rem 0.6rem; border: 1.5px solid #e5e7eb; border-radius: 6px; font-size: 0.8rem; font-family: 'Inter', sans-serif; outline: none; background: #fff;">
                <option value="">Pilih</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>
        </div>
        <div>
            <label style="display: block; font-size: 0.7rem; font-weight: 600; color: #6b7280; margin-bottom: 0.25rem;">Mulai</label>
            <input type="time" name="schedules[${i}][start_time]" required style="width: 100%; padding: 0.5rem 0.6rem; border: 1.5px solid #e5e7eb; border-radius: 6px; font-size: 0.8rem; font-family: 'Inter', sans-serif; outline: none;">
        </div>
        <div>
            <label style="display: block; font-size: 0.7rem; font-weight: 600; color: #6b7280; margin-bottom: 0.25rem;">Selesai</label>
            <input type="time" name="schedules[${i}][end_time]" required style="width: 100%; padding: 0.5rem 0.6rem; border: 1.5px solid #e5e7eb; border-radius: 6px; font-size: 0.8rem; font-family: 'Inter', sans-serif; outline: none;">
        </div>
        <div>
            <label style="display: block; font-size: 0.7rem; font-weight: 600; color: #6b7280; margin-bottom: 0.25rem;">Aktif</label>
            <input type="checkbox" name="schedules[${i}][is_active]" value="1" checked style="width: 16px; height: 16px; accent-color: #FF355C;">
        </div>
        <div style="display: flex; align-items: center; padding-bottom: 0.25rem;">
            <button type="button" onclick="this.closest('.schedule-row').remove()" style="display: inline-flex; align-items: center; justify-content: center; width: 28px; height: 28px; background: #fef2f2; color: #dc2626; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem; transition: background 0.15s;">&times;</button>
        </div>`;
    container.appendChild(row);
}
</script>
@endpush
