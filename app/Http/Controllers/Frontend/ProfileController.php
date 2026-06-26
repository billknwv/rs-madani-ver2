<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::pluck('value', 'key')->toArray();
        return view('frontend.profile', compact('profiles'));
    }
}
