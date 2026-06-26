@extends('admin.layouts.app')
@section('title', 'Manajemen Artikel')

@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
        <div>
            <h2 style="font-size: 1.25rem; font-weight: 700; color: #111827;">Manajemen Artikel</h2>
            <p style="font-size: 0.85rem; color: #6b7280; margin-top: 0.25rem;">Kelola artikel berita dan informasi RS Madani</p>
        </div>
        <a href="{{ route('admin.articles.create') }}" style="display: inline-flex; align-items: center; gap: 0.5rem; background: #FF355C; color: #fff; padding: 0.6rem 1.25rem; border-radius: 9px; text-decoration: none; font-size: 0.875rem; font-weight: 600; transition: background 0.2s;">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Tambah Artikel
        </a>
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
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background: #f9fafb; border-bottom: 1px solid #e5e7eb;">
                        <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">No</th>
                        <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Judul</th>
                        <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Penulis</th>
                        <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Status</th>
                        <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Tanggal</th>
                        <th style="padding: 0.75rem 1rem; text-align: center; font-size: 0.75rem; font-weight: 600; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $index => $article)
                        <tr style="border-bottom: 1px solid #f3f4f6; transition: background 0.15s;">
                            <td style="padding: 0.75rem 1rem; font-size: 0.875rem; color: #6b7280;">{{ $loop->iteration }}</td>
                            <td style="padding: 0.75rem 1rem; font-size: 0.875rem; font-weight: 500; color: #111827;">{{ $article->title }}</td>
                            <td style="padding: 0.75rem 1rem; font-size: 0.875rem; color: #374151;">{{ $article->author }}</td>
                            <td style="padding: 0.75rem 1rem;">
                                @if($article->status === 'publish')
                                    <span style="display: inline-block; background: #d1fae5; color: #065f46; padding: 0.2rem 0.7rem; border-radius: 999px; font-size: 0.75rem; font-weight: 600;">Publish</span>
                                @else
                                    <span style="display: inline-block; background: #fef3c7; color: #92400e; padding: 0.2rem 0.7rem; border-radius: 999px; font-size: 0.75rem; font-weight: 600;">Draft</span>
                                @endif
                            </td>
                            <td style="padding: 0.75rem 1rem; font-size: 0.875rem; color: #6b7280;">{{ $article->created_at ? $article->created_at->format('d/m/Y') : '-' }}</td>
                            <td style="padding: 0.75rem 1rem;">
                                <div style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                    <a href="{{ route('admin.articles.edit', $article) }}" style="display: inline-flex; align-items: center; gap: 0.25rem; padding: 0.4rem 0.75rem; background: #eff6ff; color: #1d4ed8; border-radius: 6px; font-size: 0.8rem; font-weight: 500; text-decoration: none; transition: background 0.15s;">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="display: inline-flex; align-items: center; gap: 0.25rem; padding: 0.4rem 0.75rem; background: #fef2f2; color: #dc2626; border: none; border-radius: 6px; font-size: 0.8rem; font-weight: 500; cursor: pointer; font-family: 'Inter', sans-serif; transition: background 0.15s;">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 2rem; text-align: center; color: #9ca3af; font-size: 0.9rem;">Belum ada artikel.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
