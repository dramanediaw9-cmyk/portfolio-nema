<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::take(3)->get();
        $testimonials = Testimonial::take(4)->get();
        
        return view('welcome', [
            'projects' => $projects,
            'testimonials' => $testimonials,
        ]);
    }
}
