<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengaduan::all();
        return view('tanggapan.index', compact('data'));
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

        if($request->hasFile('dokumentasi'))
        {
            $photo = $request->file('dokumentasi'); //untuk mengambil value (photonya)
            $path_simpan = 'public/images/tanggapan'; //menentukan path penyimpanan.
            $format = $photo->getClientOriginalExtension(); //mengambil format gambar
            $nama = 'dokumentasi-tanggapan-'.Carbon::now()->format('Ymd-his').random_int(000000,999999).'.'.$format;
            $simpan = $photo->storeAs($path_simpan, $nama); //menyimpan ke path.
            $request['dokumentasi'] = $nama; //value yang disimpan di database.
        }
        $tanggal = Carbon::now()->format('Ymd');
        Tanggapan::create([
            'id_pengaduan' => $request->id_pengaduan,
            'tanggal_respon' => $tanggal,
            'tanggal_update' => $tanggal,
            'deskripsi' => $request->deskripsi,
            'dokumentasi' => $request->dokumentasi,
        ]);

        $pengaduan = Pengaduan::find($request->id_pengaduan);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        return back()->with('success', 'pengaduan ditanggapi');


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Pengaduan::find($id);
        $tanggapan = Tanggapan::where('id_pengaduan', $id)->get()->all();
        return view('tanggapan.detail', compact('data', 'tanggapan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanggapan $tanggapan)
    {
        //
    }
}
