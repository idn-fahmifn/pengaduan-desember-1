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

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <!-- judul -->
                    <h4 class="card-title">Tanggapan</h4>
                </div>

                @if ($tanggapan)

                <span>Sudah ditanggapi</span>

                @else

                <form action="{{route('tanggapan.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" value="{{$data->judul_pengaduan}}" readonly class="form-control">
                            <input type="text" value="{{$data->id}}" name="id_pengaduan" hidden class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="{{$data->status}}">{{$data->status}}</option>
                                <option value="diproses">Diproses</option>
                                <option value="selesai">Selesai</option>
                                <option value="ditolak">Ditolak</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Dokumentasi</label>
                            <input type="file" class="form-control" name="dokumentasi" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Tanggapan</label>
                            <textarea name="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tanggapan</button>
                    </div>
                </form>

                @endif

            </div>
        </div>

    </div>
</div>

@endsection