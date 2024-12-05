<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengaduan::all();
        return view('pengaduan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'judul_pengaduan' => 'required|string|max:50',
            'dokumentasi' => 'required|max:5124|mimes:png,jpg,jpeg'
        ]);

        $tanggal = Carbon::now()->format('d-m-y');
        $input['tanggal_pengaduan'] = $tanggal;

        // function menyimpan gambar
        if($request->hasFile('dokumentasi'))
        {
            $photo = $request->file('dokumentasi'); //untuk mengambil value (photonya)
            $path_simpan = 'public/images/pengaduan'; //menentukan path penyimpanan.
            $format = $photo->getClientOriginalExtension(); //mengambil format gambar
            $nama = 'dokumentasi-pengaduan-'.Carbon::now()->format('ymd-his').random_int(000000,999999).'.'.$format;
            $simpan = $photo->storeAs($path_simpan, $nama); //menyimpan ke path.
            $input['dokumentasi'] = $nama; //value yang disimpan di database.
        }

        Pengaduan::create($input);
        return back()->with('success', 'Pengaduan berhasil dibuat');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
}
