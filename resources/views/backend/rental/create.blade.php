@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Tambah Peminjam</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

@if(Session::has('error'))
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ Session::get('error') }}</strong>
    </div>
@endif

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Tambah Data Peminjaman
            </div>
            <div class="panel-body">
                <form action="{{ route('rental.store') }}" role="form" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Peminjam</label>
                            <input type="text" name="peminjam" class="form-control" placeholder="Nama Peminjam" required>
                        </div>
                        <div class="form-group">
                            <label>Program Studi</label>
                            <select name="prodi_id" class="form-control" required>
                                <option value="">Pilihan</option>
                                @foreach( $prodis as $prodi )
                                <option value="{{ $prodi->id }}">{{ $prodi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input type="number" name="no_hp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat di UNIDA</label>
                            <textarea name="alamat" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Acara</label>
                            <input type="text" name="acara" class="form-control" required>
                        </div>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Aula</label>
                            <select name="room_id" class="form-control" required>
                                <option value="">Pilihan</option>
                                @foreach( $rooms as $room )
                                <option value="{{ $room->id }}">{{ $room->room }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pemakaian</label>
                            <input type="date" class="form-control" name="tgl_awal" required>
                        </div>
                        <div class="form-group">
                            <label>Waktu</label>
                            <select name="time_id" class="form-control" required>
                                <option value="">Pilihan</option>
                                @foreach( $times as $time )
                                <option value="{{ $time->id }}">{{ $time->waktu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Surat</label>
                            <input type="file" name="surat" class="form-control" accept="image/jpeg,image/jpg,image/png," required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Pilihan</option>
                                <option value="terkonfirmasi">terkonfirmasi</option>
                                <option value="belum terkonfirmasi">belum terkonfirmasi</option>
                            </select>
                        </div>
                            
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
                    <hr>
                    <div class="pull-right">
                    <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-paper-plane fa-fw"></i> Submit</button>
                    <button type="reset" class="btn btn-outline btn-info"><i class="fa fa-eraser fa-fw"></i> Reset</button>
                    </div>
                </form>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection