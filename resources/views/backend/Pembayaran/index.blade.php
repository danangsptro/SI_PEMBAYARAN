@extends('backend.masterBackend')
@section('title', 'Admin | Dashboard Admin')


@section('backend')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Data Jadwal Pembayaran</h3>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Jadwal Pembayaran
                        </button>


                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Insert Jadwal Pembayaran</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('admin/pembayaran/store') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="title_pembayaran">Name</label>
                                                <input type="text" name="title_pembayaran" id="title_pembayaran" class="form-control @error('title_pembayaran') ins-invalid @enderror"  value="{{ old('title_pembayaran')}}" required>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="tgl_mulai">Tanggal mulai</label>
                                                <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control @error('tgl_mulai') ins-invalid @enderror"  value="{{ old('tgl_mulai')}}" required>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="jatuh_tempo">Jatuh Tempo</label>
                                                <input type="date" id="jatuh_tempo" name="jatuh_tempo" class="form-control @error('jatuh_tempo') ins-invalid @enderror"  value="{{ old('jatuh_tempo')}}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-12">
                                                <button class="btn btn-success" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>

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
                                        <th>Title</th>
                                        <th>Tanggal Mulai Pembayaran</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembayaran as $pembayarans)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pembayarans->title_pembayaran }} </td>
                                            <td>{{ $pembayarans->tgl_mulai }}</td>
                                            <td>{{ $pembayarans->jatuh_tempo }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href=""  class="btn btn-warning m-1" data-toggle="modal" data-target="#edit{{ $loop->iteration }}">EDIT</a>
                                                    <a href="{{ url('admin/pembayaran/delete/'.$pembayarans->id) }}" class="btn btn-danger m-1">Hapus</a>

                                                    <div class="modal fade" id="edit{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="edit{{ $loop->iteration }}Label" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="edit{{ $loop->iteration }}Label">Update Data Pembayaran</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('admin/pembayaran/store/'.$pembayarans->id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-row">
                                                                        <div class="form-group col-lg-6">
                                                                            <label for="title_pembayaran">Name</label>
                                                                            <input type="text" name="title_pembayaran" id="title_pembayaran" class="form-control @error('title_pembayaran') ins-invalid @enderror"  value="{{ $pembayarans->title_pembayaran }}" required>
                                                                        </div>
                                                                        <div class="form-group col-lg-6">
                                                                            <label for="tgl_mulai">Tanggal mulai</label>
                                                                            <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control @error('tgl_mulai') ins-invalid @enderror"  value="{{ $pembayarans->tgl_mulai }}" required>
                                                                        </div>
                                                                        <div class="form-group col-lg-6">
                                                                            <label for="jatuh_tempo">Jatuh Tempo</label>
                                                                            <input type="date" id="jatuh_tempo" name="jatuh_tempo" class="form-control @error('jatuh_tempo') ins-invalid @enderror"  value="{{ $pembayarans->jatuh_tempo }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-lg-12">
                                                                            <button class="btn btn-success" type="submit">Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
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
