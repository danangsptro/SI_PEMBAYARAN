@extends('backend.masterBackend')
@section('title', 'Admin | Dashboard Admin')

@section('selec-2')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endsection

@section('backend')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
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
                        <div class="row">
                            @foreach ($pembayaran as $pembayarans)
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title">{{ $pembayarans->title_pembayaran }}</h5>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add{{ $loop->iteration }}">Lakukan Pembayaran</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="add{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="add{{ $loop->iteration }}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="add{{ $loop->iteration }}Label">Lakukan pembayaran</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <form action="" method="POST">
                                                <div class="form-row">
                                                    <div class="form-group col-lg-12">
                                                        <label for="index-surat">Pilih Siswa</label>
                                                        <select name="user_id" class="form-control" id="siswa">
                                                            <option value="" selected>-- SELECT --</option>
                                                            @foreach($user as $users)
                                                                <option value="{{ $users->id }}">{{ $users->name }}</option>
                                                            @endforeach
                                                        </select>
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
                            @endforeach
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    

    @section('js-select-2')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#siswa").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select"
            });
        });
    </script>
    @endsection

@endsection
