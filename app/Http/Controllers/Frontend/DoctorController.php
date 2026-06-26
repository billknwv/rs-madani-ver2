<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function index()
    {
        $clinics = Doctor::select('clinic')->distinct()->orderBy('clinic')->pluck('clinic');
        $doctors = Doctor::with('schedules')->orderBy('name');

        if (request()->has('search')) {
            $doctors->where('name', 'like', '%' . request('search') . '%');
        }

        if (request()->has('clinic') && request('clinic') !== '') {
            $doctors->where('clinic', request('clinic'));
        }

        return view('frontend.doctors', [
            'doctors' => $doctors->get(),
            'clinics' => $clinics,
        ]);
    }

    public function show(Doctor $doctor)
    {
        $doctor->load('schedules');
        $otherDoctors = Doctor::where('id', '!=', $doctor->id)
            ->where('clinic', $doctor->clinic)
            ->take(4)
            ->get();

        return view('frontend.doctor-detail', compact('doctor', 'otherDoctors'));
    }
}
