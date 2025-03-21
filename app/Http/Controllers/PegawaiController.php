<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(Request $request){
        return $request->segment(2);
    }
    public function formulir(){
        return view('formulir');
    }
    public function proses(Request $request){
        $messages = [
            'nama.required' => 'Nama wajib diisi',
            'nama.min' => 'Nama harus minimal 5 karakter',
            'nama.max' => 'Nama tidak boleh lebih dari 20 karakter',
            'alamat.required' => 'Alamat wajib diisi',
        ];

        $this->validate($request,[
            'nama' => 'required|min:5|max:20',
            'alamat' => 'required|alpha'
        ], $messages);

        $nama = $request->input('nama');
        $alamat = $request->input('alamat');

        return "Nama : ".$nama.", Alamat : ".$alamat;
    }
}
