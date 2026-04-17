<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $total_projects = Project::count();
        $users_active = User::where('is_active', '=', 'true')->count();
        return view('home.home', compact('total_projects', 'users_active'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function features()
    {
        return view('home.features');
    }

    public function privacy()
    {
        return view('home.privacy');
    }
    public function terms()
    {
        return view('home.terms');
    }

    public function support()
    {
        return view('home.support');
    }
}
