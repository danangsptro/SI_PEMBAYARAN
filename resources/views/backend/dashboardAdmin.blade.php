@extends('backend.masterBackend')
@section('title', 'Admin | Dashboard Admin')


@section('backend')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="row">
            <div class="col-lg-2 text-center">
                <img src="{{ asset('assets/img/SMK.png') }}" width="300px" alt="">
            </div>
            <div class="col-lg-10">
                <div class="jumbotron jumbotron-fluid" style="background: rgb(4, 78, 10); border: 5px solid yellow">
                    <div class="container">
                        <h1 class="display-4" style="color: yellow">Selamat Datang di halaman dashboard</h1>
                        <p class="lead" style="color: yellow">SMK MATHLA'UL ANWAR, <span class="lead"
                                style="color: yellow">KABUPATEN TANGERANG</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Data Siswa</div>
                            <div class="stat-digit">{{$siswa->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/social-box-->
        </div>
        <!--/.col-->


        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Transaksi Pembayaran</div>
                            <div class="stat-digit">{{$transaksi->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/social-box-->
        </div>
        <!--/.col-->


        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Data Pembayaran</div>
                            <div class="stat-digit">{{$pembayaran->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/social-box-->
        </div>
        <!--/.col-->

    @endsection
