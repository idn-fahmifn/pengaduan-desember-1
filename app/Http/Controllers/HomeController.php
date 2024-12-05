<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $bio = Biodata::where('id_user', Auth::user()->id)->get()->all();
        return view('home', compact('bio'));
    }

    // menyimpan biodata
    public function store(Request $request)
    {
        $input = $request->all();

        // Validator atau validasi data
        $request->validate([
            'no_hp' => 'required|min:10|max:15',
            'alamat' => 'required',
            'photo' => 'required|mimes:png, jpg, jpeg'
        ]);
        // perintah untuk menyimpan gambar
        if($request->hasFile('photo'))
        {
            $photo = $request->file('photo'); //untuk mengambil value (photonya)
            $path_simpan = 'public/images/biodata'; //menentukan path penyimpanan.
            $format = $photo->getClientOriginalExtension(); //mengambil format gambar
            $nama = 'profile-'.Carbon::now()->format('ymd-his').random_int(000000,999999).'.'.$format;
            $simpan = $photo->storeAs($path_simpan, $nama); //menyimpan ke path.
            $input['photo'] = $nama; //value yang disimpan di database.
        }

        Biodata::create($input);
        return back()->with('success', 'Data berhasil dibuat');

    }
}

