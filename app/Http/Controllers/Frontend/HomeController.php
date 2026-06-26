<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Doctor;
use App\Models\Profile;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->get();
        $featuredServices = Service::orderBy('order')->take(6)->get();
        $doctorsCount = Doctor::count();
        $totalClinics = Doctor::distinct('clinic')->count('clinic');
        $servicesCount = Service::count();
        $totalBeds = 250;
        $totalPatients = 15000;
        $articles = Article::published()->latest()->take(3)->get();
        $featuredDoctors = Doctor::inRandomOrder()->take(4)->get();
        $profile = Profile::pluck('value', 'key')->toArray();

        return view('frontend.home', compact(
            'services', 'featuredServices', 'doctorsCount', 'totalClinics',
            'servicesCount', 'totalBeds', 'totalPatients',
            'articles', 'featuredDoctors', 'profile'
        ));
    }
}
