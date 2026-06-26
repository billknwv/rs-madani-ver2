@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div style="margin-bottom: 2rem;">
        <h2 style="font-size: 1.5rem; font-weight: 700; color: #111827;">
            Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!
        </h2>
        <p style="color: #6b7280; margin-top: 0.25rem;">Berikut ringkasan data RS Madani.</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.25rem;">
        {{-- Total Artikel --}}
        <div style="background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #f3f4f6; display: flex; align-items: center; gap: 1rem;">
            <div style="width: 52px; height: 52px; background: rgba(255,53,92,0.1); border-radius: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FF355C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>
                </svg>
            </div>
            <div>
                <p style="font-size: 0.8rem; color: #6b7280; font-weight: 500;">Total Artikel</p>
                <p style="font-size: 1.75rem; font-weight: 700; color: #111827;">{{ $totalArticles ?? 0 }}</p>
            </div>
        </div>

        {{-- Total Dokter --}}
        <div style="background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #f3f4f6; display: flex; align-items: center; gap: 1rem;">
            <div style="width: 52px; height: 52px; background: rgba(19,32,59,0.1); border-radius: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#13203B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div>
                <p style="font-size: 0.8rem; color: #6b7280; font-weight: 500;">Total Dokter</p>
                <p style="font-size: 1.75rem; font-weight: 700; color: #111827;">{{ $totalDoctors ?? 0 }}</p>
            </div>
        </div>

        {{-- Total Layanan --}}
        <div style="background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #f3f4f6; display: flex; align-items: center; gap: 1rem;">
            <div style="width: 52px; height: 52px; background: rgba(16,185,129,0.1); border-radius: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><path d="M12 8v8"/><path d="M8 12h8"/>
                </svg>
            </div>
            <div>
                <p style="font-size: 0.8rem; color: #6b7280; font-weight: 500;">Total Layanan</p>
                <p style="font-size: 1.75rem; font-weight: 700; color: #111827;">{{ $totalServices ?? 0 }}</p>
            </div>
        </div>

        {{-- Total Pengunjung --}}
        <div style="background: #fff; border-radius: 16px; padding: 1.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.06); border: 1px solid #f3f4f6; display: flex; align-items: center; gap: 1rem;">
            <div style="width: 52px; height: 52px; background: rgba(245,158,11,0.1); border-radius: 14px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div>
                <p style="font-size: 0.8rem; color: #6b7280; font-weight: 500;">Total Pengunjung</p>
                <p style="font-size: 1.75rem; font-weight: 700; color: #111827;">{{ $totalVisitors ?? 0 }}</p>
            </div>
        </div>
    </div>
@endsection
