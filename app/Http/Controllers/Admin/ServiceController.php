<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('category')->orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ['Layanan Medis', 'Layanan Penunjang', 'Layanan Unggulan'];
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'description' => 'nullable',
            'icon' => 'nullable|max:255',
            'order' => 'nullable|integer',
            'features' => 'nullable|string',
            'related_clinics' => 'nullable|string',
        ]);
        $validated['slug'] = Str::slug($validated['name']);
        if (!empty($validated['features'])) {
            $validated['features'] = array_map('trim', explode("\n", trim($validated['features'])));
        } else {
            $validated['features'] = null;
        }
        if (!empty($validated['related_clinics'])) {
            $validated['related_clinics'] = array_map('trim', explode("\n", trim($validated['related_clinics'])));
        } else {
            $validated['related_clinics'] = null;
        }
        Service::create($validated);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        $categories = ['Layanan Medis', 'Layanan Penunjang', 'Layanan Unggulan'];
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'description' => 'nullable',
            'icon' => 'nullable|max:255',
            'order' => 'nullable|integer',
            'features' => 'nullable|string',
            'related_clinics' => 'nullable|string',
        ]);
        if (!empty($validated['features'])) {
            $validated['features'] = array_map('trim', explode("\n", trim($validated['features'])));
        } else {
            $validated['features'] = null;
        }
        if (!empty($validated['related_clinics'])) {
            $validated['related_clinics'] = array_map('trim', explode("\n", trim($validated['related_clinics'])));
        } else {
            $validated['related_clinics'] = null;
        }
        $service->update($validated);
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
