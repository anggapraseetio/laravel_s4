<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(Request $request){
        $request->session()->put('nama','Politeknik Negeri Jember');
        echo "Data telah ditambahkan ke session";
    }
}
