@extends('template.template')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Divisi</h4>
                    <a href="" class="btn btn-success">Tambah divisi</a>
                </div>

                
                <p class="card-title-desc">Data Divisi</p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Nama Divisi</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>

@endsection