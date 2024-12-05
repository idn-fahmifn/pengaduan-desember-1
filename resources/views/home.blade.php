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
                @else
                    @foreach ($bio as $item)
                    {{$item}}
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>

@endsection