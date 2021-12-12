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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Launch demo modal
                        </button>
  
  
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('admin/siswa/store') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" class="form-control @error('name') ins-invalid @enderror"  value="{{ old('name')}}" required>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="nisn">NISN</label>
                                                <input type="text" name="nisn" class="form-control @error('nisn') ins-invalid @enderror"  value="{{ old('nisn')}}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label for="jk">Jenis Kelamin</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="jk">
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div> 
                                            <div class="form-group col-lg-6">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" class="form-control @error('nisn') ins-invalid @enderror"  value="{{ old('email')}}" required>
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
                                <button type="button" class="btn btn-primary">Save changes</button>
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
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $siswas)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $siswas->name }} </td>
                                        <td>{{ $siswas->nisn }}</td>
                                        <td>{{ $siswas->jk }}</td>
                                        <td> 
                                            <div class="d-flex justify-content-center">
                                                <a href="" class="btn btn-warning m-1">EDIT</a>
                                                <a href="" class="btn btn-danger m-1">Hapus</a>
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
