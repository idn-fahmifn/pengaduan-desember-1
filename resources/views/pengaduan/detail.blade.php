@extends('template.template')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <!-- judul -->
                    <h4 class="card-title">Detail Pengaduan</h4>
                </div>
                <p class="card-title-desc">{{$data->judul_pengaduan}}</p>

                <table class="table table-bordered dt-responsive nowrap">      
                    <tbody>
                        <tr>
                            <th>Judul Pengaduan</th>
                            <td>{{$data->judul_pengaduan}}</td>
                            <td rowspan="4" class="text-center"><img src="{{asset('storage/images/pengaduan/'.$data->dokumentasi)}}" width="300" alt=""></td>
                        </tr>
                        <tr>
                            <th>Tanggal Pengaduan</th>
                            <td>{{$data->tanggal_pengaduan}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$data->status}}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi Pengaduan</th>
                            <td>{{$data->deskripsi}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection