<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::pluck('value', 'key')->toArray();
        return view('admin.profiles.index', compact('profiles'));
    }

    public function update(Request $request)
    {
        $keys = ['about', 'history', 'vision_mission', 'director_message', 'organizational_structure', 'accreditation'];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                Profile::updateOrCreate(
                    ['key' => $key],
                    ['value' => $request->input($key)]
                );
            }
        }

        if ($request->hasFile('structure_image')) {
            $path = $request->file('structure_image')->store('profiles', 'public');
            Profile::updateOrCreate(
                ['key' => 'structure_image'],
                ['value' => $path]
            );
        }

        if ($request->hasFile('director_photo')) {
            $path = $request->file('director_photo')->store('profiles', 'public');
            Profile::updateOrCreate(
                ['key' => 'director_photo'],
                ['value' => $path]
            );
        }

        if ($request->hasFile('accreditation_image')) {
            $path = $request->file('accreditation_image')->store('profiles', 'public');
            Profile::updateOrCreate(
                ['key' => 'accreditation_image'],
                ['value' => $path]
            );
        }

        return redirect()->route('admin.profiles.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
