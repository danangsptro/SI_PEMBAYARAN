@extends('backend.masterBackend')
@section('title', 'Admin | Dashboard Admin')


@section('backend')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3 class="card-title">Data Siswa</h3>
                        <!-- Button trigger modal -->
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
                        <form action="{{ url('admin/siswa/update-profile/'.$siswa->id) }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') ins-invalid @enderror"  value="{{ $siswa->name }}" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="kelas">Kelas</label>
                                    <input type="text" name="kelas" class="form-control @error('kelas') ins-invalid @enderror"  value="{{ $siswa->kelas }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jk">
                                        <option value="Laki-laki {{ $siswa->jk == 'Laki-laki' ? 'selected' : '' }}">Laki-laki</option>
                                        <option value="Perempuan {{ $siswa->jk == 'Perempuan' ? 'selected' : '' }}">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control @error('email') ins-invalid @enderror"  value="{{ $siswa->email }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password_exist" @error('password') ins-invalid @enderror"  value="{{ $siswa->password_exist }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
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
