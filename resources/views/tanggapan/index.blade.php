@extends('template.template')

@section('page-title')
    Halaman Pengaduan
@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <!-- judul -->
                    <h4 class="card-title">Pengaduan</h4>
                </div>


                <p class="card-title-desc">Pengaduan Saya</p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Judul Laporan</th>
                            <th>Tanggal Laporan</th>
                            <th>Status</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->judul_pengaduan}}</td>
                            <td>{{$item->tanggal_pengaduan}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    <a href="{{route('tanggapan.show', $item->id)}}" class="btn btn-info">detail</a>
                                    <button type="submit" class="btn btn-danger">hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>


@endsection