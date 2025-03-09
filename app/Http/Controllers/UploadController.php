<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Intervention\Image\Facades\Image;


class UploadController extends Controller
{
    public function upload(){
        return view('upload');
    }
    public function proses_upload(Request $request){
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);
        //menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        //nama file
        echo 'File Name: '.$file->getClientOriginalName().'<br>';
        //extensi file
        echo 'File Extension: '.$file->getClientOriginalExtension().'<br>';
        //real path
        echo 'File Real Path: '.$file->getRealPath().'<br>';
        //ukuran file
        echo 'File Size: '.$file->getSize().'<br>';
        //tipe mime
        echo 'File Mime Type: '.$file->getMimeType();
        //isi dengan nama folder tempa kemana file diupload
        $foto = 'data_file';
        //upload file
        $file->move($foto, $file->getClientOriginalName());
    }

    public function resize_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        // TENTUKAN PATH LOKASI UPLOAD
        $path = public_path('foto');

        // JIKA FOLDERNYA BELUM ADA
        if (!File::isDirectory($path)) {
            // MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($path, 0777, true);
        }

        // MENGAMBIL FILE IMAGE DARI FORM
        $file = $request->file('file');

        // MEMBUAT NAME FILE DARI GABUNGAN TANGGAL DAN UNIQID()
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // MEMBUAT CANVAS IMAGE SEBESAR DIMENSI
        $canvas = Image::canvas(200, 200);

        // RESIZE IMAGE SESUAI DIMENSI DENGAN MEMPERTAHANKAN RATIO
        $resizeImage = Image::make($file)->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
        });

        // MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
        $canvas->insert($resizeImage, 'center');

        // SIMPAN IMAGE KE FOLDER
        if ($canvas->save($path . '/' . $fileName)) {
            return redirect(route('upload'))->with('success', 'Data berhasil ditambahkan(resize)! ');
        } else {
            return redirect(route('upload'))->with('error', 'Data gagal ditambahkan!');
        }
    }
    
}
