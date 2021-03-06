@extends('backend.masterBackend')
@section('title', 'Admin | Report Transaksi')


@section('backend')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Data Transaksi {{ $user->name }}</h3>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-{{ session('style') }}" id="alert-notification">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h5>{{ session('message') }}</h5>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span id="close-notification">&times;</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="tabel-data" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Pembayaran</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($transaksiPembayaran) }} --}}
                                    @foreach ($transaksiPembayaran as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data['title'] }} </td>
                                            <td>{{ $data['statuses'] }}</td>
                                            <td>
                                                @if ($data['statuses']== "sudah bayar")
                                                    <a href="{{ url('/admin/transaksi/invoice-pdf/'.$data['transaksi_id']) }}" class="btn btn-warning">Download Invoice</a>
                                                @else
                                                    -
                                                @endif    
                                            </td>
                                        </tr>     
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    
    @section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function(){
                $('#tabel-data').DataTable();
            });
        </script>
    @endsection

@endsection
