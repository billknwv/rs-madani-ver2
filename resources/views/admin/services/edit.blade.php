@extends('admin.layouts.app')
@section('title', 'Edit Layanan')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #111827;">Edit Layanan</h2>
        <p style="font-size: 0.85rem; color: #6b7280; margin-top: 0.25rem;">Perbarui informasi layanan</p>
    </div>

    <div style="background: #fff; border-radius: 14px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); padding: 2rem; max-width: 720px;">
        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 1.25rem;">
                <label for="name" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Nama Layanan</label>
                <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}" required
                       style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                @error('name') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="category" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Kategori</label>
                <select id="category" name="category" required
                        style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; background: #fff; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                        onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ old('category', $service->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
                @error('category') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="description" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Deskripsi</label>
                <textarea id="description" name="description" rows="6"
                          style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                          onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                          onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('description', $service->description) }}</textarea>
                @error('description') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="features" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Fitur (1 baris per fitur)</label>
                <textarea id="features" name="features" rows="4"
                          style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                          onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                          onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('features', $service->features ? implode("\n", $service->features) : '') }}</textarea>
                @error('features') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="related_clinics" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Klinik Terkait (1 baris per klinik)</label>
                <textarea id="related_clinics" name="related_clinics" rows="3"
                          style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                          onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                          onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('related_clinics', $service->related_clinics ? implode("\n", $service->related_clinics) : '') }}</textarea>
                @error('related_clinics') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="icon" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Icon (nama icon)</label>
                <input type="text" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="contoh: heart, monitor, bed, shield, capsule, microscope, wave, brain, rehab, mental"
                       style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                @error('icon') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="order" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Urutan</label>
                <input type="number" id="order" name="order" value="{{ old('order', $service->order) }}"
                       style="width: 120px; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                @error('order') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <button type="submit" style="background: #FF355C; color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 9px; font-size: 0.9rem; font-weight: 600; font-family: 'Inter', sans-serif; cursor: pointer; transition: background 0.2s;">
                    Update Layanan
                </button>
                <a href="{{ route('admin.services.index') }}" style="color: #6b7280; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Batal</a>
            </div>
        </form>
    </div>
@endsection
