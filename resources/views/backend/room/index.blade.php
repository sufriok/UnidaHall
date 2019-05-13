@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Data Aula <a href="{{ route('room.create') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus-circle"></i></a></h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

@if(Session::has('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ Session::get('success') }}</strong>
    </div>
@endif

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Aula
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Pengelola</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rooms as $room)
                        <tr class="odd gradeA">
                            <td>{{ $room->room }}</td>
                            <td>{{ $room->staff->name }}</td>
                            <td>
                                <img src="/upload/{{ $room->image }}" class="img-thumbnail" alt="Cinque Terre" width="320" height="320">
                            </td>
                            <td>
                                <form action="{{ route('room.destroy', $room) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a class="btn btn-info" style="color: white;" href="{{ route('room.show', $room) }}"><i class="fa fa-eye fa-fw"></i></a>
                                <a class="btn btn-warning" style="color: white;" href="{{ route('room.edit', $room) }}"><i class="fa fa-edit fa-fw"></i></a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash-o fa-fw"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

@endsection
