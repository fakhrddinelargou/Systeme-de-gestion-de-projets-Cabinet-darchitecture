<?php

namespace App\Http\Controllers\architecte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $direction = 'architecte.dashboard';
        return view('layout.app' , compact('direction'));
    }
}
