@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Tambah Aula</h3>
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
                Tambah Data Aula
            </div>
            <div class="panel-body">
                <form action="{{ route('room.store') }}" role="form" method="post" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Aula</label>
                            <input type="text" name="room" class="form-control" placeholder="contoh : Aula CIOS" required>
                        </div>
                        <div class="form-group">
                            <label>Ukuran Benner</label>
                            <input type="text" name="banner" class="form-control" placeholder="contoh : 2m x 5m" required>
                        </div>
                        <div class="form-group">
                            <label>Max</label>
                            <input type="text" name="max" class="form-control" placeholder="contoh : 100" required>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="image" id="photo" style="display: none;" required>
                            <input type="button" name="" value="Browse" id="browse_file" class="btn btn-primary form-control">
                        </div>
                        <div class="form-group">
                            <label>Pemilik</label>
                            <select name="staff" class="form-control" required>
                                <option value="">Pilihan</option>
                                @foreach($staff as $staff)
                                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Vasilitas</label>
                            <textarea name="vasilitas" class="form-control" rows="2" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing</label>
                            <input type="text" name="pembimbing" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label>Format Surat</label>
                            <input type="file" name="surat" class="form-control" required>
                        </div>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <img src="" id="img" class="img-thumbnail" style="height:336px; width:474px;">
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


