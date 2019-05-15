@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Peminjaman</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Peminjaman
            </div>
            <div class="panel-body">
                <div class="row">
                <div class="col-lg-5">
                    <div class="form-group">
                        <label>Peminjam</label>
                        <input class="form-control" value="{{ $rental->peminjam }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <input class="form-control" value="{{ $rental->prodi->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>No. HP</label>
                        <input class="form-control" value="{{ $rental->no_hp }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Alamat di UNIDA</label>
                        <textarea name="alamat" class="form-control" rows="2" disabled>{{ $rental->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Ruangan</label>
                        <input class="form-control" value="{{ $rental->room->room }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Acara</label>
                        <input class="form-control" value="{{ $rental->acara }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pemakaian</label>
                        <input class="form-control" value="{{ $rental->tgl_awal }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Waktu</label>
                        <input class="form-control" value="{{ $rental->time->waktu }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input class="form-control" value="{{ $rental->status->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>Pemberi Izin</label>
                        <input class="form-control" value="{{ $rental->pember_izin }}" disabled>
                    </div>
                </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-7">
                        <div class="form-group">
                            <label>Surat</label>
                            <a href="/surat/{{ $rental->surat }}" download="surat peminjaman {{ $rental->peminjam }}">
                                <img src="/surat/{{ $rental->surat }}" class="img-thumbnail" width="590" height="690" alt="">
                            </a>
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