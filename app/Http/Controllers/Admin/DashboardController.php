<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Doctor;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalArticles' => Article::count(),
            'totalDoctors' => Doctor::count(),
            'totalServices' => Service::count(),
            'totalVisitors' => rand(1000, 9999),
        ];

        return view('admin.dashboard', $data);
    }
}
