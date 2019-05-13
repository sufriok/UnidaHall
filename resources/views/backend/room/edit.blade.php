@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Edit Aula</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Data Aula
            </div>
            <div class="panel-body">
                <form action="{{ route('room.update', $room) }}" role="form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="row">
                    <div class="col-lg-6">  
                        <div class="form-group">
                            <label>Nama Aula</label>
                            <input type="text" name="room" value="{{ $room->room }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Ukuran Banner</label>
                            <input type="text" name="banner" value="{{ $room->banner }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kapasitas</label>
                            <input type="text" name="max" value="{{ $room->max }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Foto Aula</label>
                            <input type="file" name="image" id="photo" style="display: none;">
                            <input type="button" name="" value="Cari" id="browse_file" class="btn btn-primary form-control">
                        </div>
                        <div class="form-group">
                            <label>Pengelola</label>
                            <select name="staff" class="form-control" required>
                                @foreach($staff as $staff)
                                <option value="{{ $staff->id }}"
                                    @if ($staff->id === $room->staff_id)
                                    selected
                                    @endif>
                                {{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Vasilitas</label>
                            <textarea name="vasilitas" class="form-control" rows="2" required>{{ $room->vasilitas }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Pembimbing/Ketua</label>
                            <input type="text" name="pembimbing" value="{{ $room->pembimbing }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Format Surat</label>
                            <input type="file" name="surat" class="form-control">
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