@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Aula</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Aula
            </div>
            <div class="panel-body">
                <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Nama Aula</label>
                        <input class="form-control" value="{{ $room->room }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Ukuran Banner</label>
                        <input class="form-control" value="{{ $room->banner }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Kapasitas</label>
                        <input class="form-control" value="{{ $room->max }} Orang" disabled>
                    </div>
                    <div class="form-group">
                        <label>Pengelola</label>
                        <input class="form-control" value="{{ $room->staff->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Vasilitas</label>
                        <textarea name="alamat" class="form-control" rows="2" disabled>{{ $room->vasilitas }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Pembimbing/Ketua</label>
                        <input class="form-control" value="{{ $room->pembimbing }}" disabled>
                    </div>
                </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Foto Aula</label>
                            <img src="/upload/{{ $room->image }}" class="img-thumbnail" alt="Cinque Terre" width="520" height="520">
                        </div>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection