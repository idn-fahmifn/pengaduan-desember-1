@extends('template.template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <!-- judul -->
                    <h4 class="card-title">Helo, Selamat datang <span class="text-uppercase">{{Auth::user()->name}}</span></h4>
                </div>

                <p class="card-title-desc">Data Divisi</p>

                @if (!$bio)
                <span>Anda belum melengkapi biodata</span>
                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                    data-bs-target=".bs-example-modal-xl">Lengkapi data</button>
                @else
                @foreach ($bio as $item)
                {{$item}}
                @endforeach
                @endif

            </div>
        </div>
    </div>
</div>

<!-- modals -->
<div class="modal fade bs-example-modal-xl" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myExtraLargeModalLabel">Melengkapi biodata</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>

            <form action="#" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" value="{{Auth::user()->name}}" readonly class="form-control">
                        <input type="text" value="{{Auth::user()->id}}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No. Handphone</label>
                        <input type="number" name="no_hp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <select name="gender" required class="form-control">
                            <option value="">-Pilih Gender-</option>
                            <option value="laki laki">Laki Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Photo Profile</label>
                        <input type="file" name="photo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>

            </form>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection