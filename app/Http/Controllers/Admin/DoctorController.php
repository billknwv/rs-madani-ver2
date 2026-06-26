<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::orderBy('name')->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'specialization' => 'required|max:255',
            'clinic' => 'required|max:255',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'schedules' => 'required|array|min:1',
            'schedules.*.day' => 'required',
            'schedules.*.start_time' => 'required',
            'schedules.*.end_time' => 'required',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(5);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('doctors', 'public');
        }

        $doctor = Doctor::create($validated);

        foreach ($request->schedules as $scheduleData) {
            Schedule::create([
                'doctor_id' => $doctor->id,
                'day' => $scheduleData['day'],
                'start_time' => $scheduleData['start_time'],
                'end_time' => $scheduleData['end_time'],
                'is_active' => isset($scheduleData['is_active']),
            ]);
        }

        return redirect()->route('admin.doctors.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit(Doctor $doctor)
    {
        $doctor->load('schedules');
        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'specialization' => 'required|max:255',
            'clinic' => 'required|max:255',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'schedules' => 'required|array|min:1',
            'schedules.*.day' => 'required',
            'schedules.*.start_time' => 'required',
            'schedules.*.end_time' => 'required',
        ]);

        if ($request->hasFile('photo')) {
            if ($doctor->photo) {
                Storage::disk('public')->delete($doctor->photo);
            }
            $validated['photo'] = $request->file('photo')->store('doctors', 'public');
        }

        $doctor->update($validated);

        $doctor->schedules()->delete();

        foreach ($request->schedules as $scheduleData) {
            Schedule::create([
                'doctor_id' => $doctor->id,
                'day' => $scheduleData['day'],
                'start_time' => $scheduleData['start_time'],
                'end_time' => $scheduleData['end_time'],
                'is_active' => isset($scheduleData['is_active']),
            ]);
        }

        return redirect()->route('admin.doctors.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Doctor $doctor)
    {
        if ($doctor->photo) {
            Storage::disk('public')->delete($doctor->photo);
        }

        $doctor->schedules()->delete();
        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
