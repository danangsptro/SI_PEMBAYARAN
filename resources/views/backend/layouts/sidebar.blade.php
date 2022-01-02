<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#">PEMBAYARAN</a>
            <a class="navbar-brand hidden" href="#">P</a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ url('admin/home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('index-user') }}"> <i class="menu-icon fa fa-user"></i>User
                    </a>
                </li> --}}
                <h3 class="menu-title">Data</h3>
                @if (Auth::user()->role == 'staf')
                    <li>
                        <a href="{{ url('/admin/siswa') }}"> <i class="menu-icon fa fa-user"></i>Siswa
                        </a>
                    </li>
                @endif
                @if(Auth::user()->role == "kepala-sekolah" || Auth::user()->role == "staf")
                    @if(Auth::user()->role == "staf")
                        <li>
                            <a href="{{ url('/admin/pembayaran') }}"> <i class="menu-icon fa fa-calendar"></i>Jadwal Pembayaran
                            </a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ url('/admin/transaksi') }}"> <i class="menu-icon fa fa-folder"></i>Pembayaran SPP
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('/admin/transaksi/transaksi-siswa/'.Auth::user()->id) }}"><i class="fas fa-money-bill-wave"></i>Report Pembayaran</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/siswa/set-profile/'.Auth::user()->id) }}"><i class="fas fa-user-alt"></i>Setting Profile</a>
                    </li>
                @endif


                {{-- <h3 class="menu-title">Data</h3>
                <li>
                    <a>
                        <form action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                            <button type="submit" class="btn btn-danger mt-1"><i class="fas fa-sign-out-alt"></i>
                        <p class="m-2" style="color: white">Logout</p>

                            </button>
                        </form>
                    </a>
                </li> --}}
            </ul>
        </div>
    </nav>
</aside>
