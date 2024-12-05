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
                    <!-- thead & tbody = dihapus -->
                </table>
            </div>
        </div>
    </div>
</div>

@endsection