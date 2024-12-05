@extends('template.template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <!-- judul -->
                    <h4 class="card-title">Pengaduan</h4>

                    <!-- button -->
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                        data-bs-target=".bs-example-modal-xl">Ajukan Pengaduan</button>
                </div>


                <p class="card-title-desc">Pengaduan Saya</p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Divisi</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$item->nama_divisi}}</td>
                            <td>
                                <form action="" method="post">
                                    @csrf
                                    <a href="" class="btn btn-info">detail</a>
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

<div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Buat Pengaduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>

            <form action="{{route('pengaduan.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pembuat</label>
                        <input type="text" value="{{Auth::user()->name}}" readonly class="form-control">
                        <input type="text" value="{{Auth::user()->id}}" name="id_user" hidden class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Judul Pengaduan</label>
                        <input type="text" class="form-control" name="judul_pengaduan" required>
                    </div>
                    <div class="form-group">
                        <label>Dokumentasi</label>
                        <input type="file" class="form-control" name="dokumentasi" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Pengaduan</label>
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Buat pengaduan</button>
                </div>
            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection