<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.dashboard');
    }
    public function pendidikan(){
        return view('backend.pendidikan.index');
    }
    public function pengalaman_kerja(){
        return view('backend.pengalaman_kerja.index');
    }
}
