@extends('admin.layouts.app')
@section('title', 'Tambah Artikel')

@section('content')
    <div style="margin-bottom: 1.5rem;">
        <h2 style="font-size: 1.25rem; font-weight: 700; color: #111827;">Tambah Artikel</h2>
        <p style="font-size: 0.85rem; color: #6b7280; margin-top: 0.25rem;">Buat artikel berita baru</p>
    </div>

    <div style="background: #fff; border-radius: 14px; box-shadow: 0 1px 3px rgba(0,0,0,0.06); padding: 2rem; max-width: 720px;">
        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 1.25rem;">
                <label for="title" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Judul</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                       style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                @error('title') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="author" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Penulis</label>
                <input type="text" id="author" name="author" value="{{ old('author') }}" required
                       style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; transition: border-color 0.2s;"
                       onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                       onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                @error('author') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="content" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Konten</label>
                <textarea id="content" name="content" rows="10" required
                          style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; resize: vertical; transition: border-color 0.2s;"
                          onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                          onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">{{ old('content') }}</textarea>
                @error('content') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.25rem;">
                <label for="status" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Status</label>
                <select id="status" name="status" required
                        style="width: 100%; padding: 0.7rem 0.9rem; border: 1.5px solid #e5e7eb; border-radius: 8px; font-size: 0.9rem; font-family: 'Inter', sans-serif; outline: none; background: #fff; transition: border-color 0.2s;"
                        onfocus="this.style.borderColor='#FF355C'; this.style.boxShadow='0 0 0 3px rgba(255,53,92,0.1)'"
                        onblur="this.style.borderColor='#e5e7eb'; this.style.boxShadow='none'">
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="publish" {{ old('status') === 'publish' ? 'selected' : '' }}>Publish</option>
                </select>
                @error('status') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="image" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.4rem;">Foto</label>
                <input type="file" id="image" name="image" accept="image/*"
                       style="width: 100%; padding: 0.5rem 0; font-family: 'Inter', sans-serif; font-size: 0.875rem;">
                <p style="font-size: 0.75rem; color: #9ca3af; margin-top: 0.3rem;">Format: JPG, PNG. Maks: 2MB.</p>
                @error('image') <p style="color: #dc2626; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p> @enderror
            </div>

            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <button type="submit" style="background: #FF355C; color: #fff; padding: 0.7rem 1.5rem; border: none; border-radius: 9px; font-size: 0.9rem; font-weight: 600; font-family: 'Inter', sans-serif; cursor: pointer; transition: background 0.2s;">
                    Simpan Artikel
                </button>
                <a href="{{ route('admin.articles.index') }}" style="color: #6b7280; font-size: 0.875rem; text-decoration: none; font-weight: 500;">Batal</a>
            </div>
        </form>
    </div>
@endsection
