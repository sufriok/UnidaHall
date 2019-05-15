@extends('backend.layouts.app')

@section('content')

@if($admin == "yes")
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Data Peminjaman 
        <a href="{{ route('rental.create') }}" class="btn btn-success btn-sm pull-right" disabled>
        <i class="fa fa-plus-circle"></i></a>
        </h3>
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
                Peminjaman
                <a href="{{ route('rental.export') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-external-link"></i> Export</a>
                <br><br>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Peminjam</th>
                            <th>Ruangan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rentals as $rental)
                        <tr class="odd gradeA">
                            <td>{{ $rental->tgl_awal }}</td>
                            <td>{{ $rental->time->waktu }}</td>
                            <td>{{ $rental->peminjam }}</td>
                            <td>{{ $rental->room->room }}</td>
                            <td>
                                @if($rental->status_id == "1")
                                <p class="bg-success text-center">{{ $rental->status->name }}</p>
                                @endif

                                @if($rental->status_id == "2")
                                <p class="bg-warning text-center">{{ $rental->status->name }}</p>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('rental.destroy', $rental) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a class="btn btn-info"style="color: white;" href="{{ route('rental.show', $rental) }}"><i class="fa fa-eye fa-fw"></i></a>
                                <a class="btn btn-success" style="color: white;" href="{{ route('checklist', $rental) }}" disabled><i class="fa fa-check-square-o fa-fw"></i></a>
                                <a class="btn btn-warning" style="color: white;" href="{{ route('rental.edit', $rental) }}" disabled><i class="fa fa-edit fa-fw"></i></a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')" disabled><i class="fa fa-trash-o fa-fw"></i></button>
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
@endif

@if($admin == "no")
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Data Peminjaman 
        <a href="{{ route('rental.create') }}" class="btn btn-success btn-sm pull-right">
        <i class="fa fa-plus-circle"></i></a>
        </h3>
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
                Peminjaman
                <a href="{{ route('rental.export') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-external-link"></i> Export</a>
                <br><br>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Peminjam</th>
                            <th>Ruangan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rentals as $rental)
                        <tr class="odd gradeA">
                            <td>{{ $rental->tgl_awal }}</td>
                            <td>{{ $rental->time->waktu }}</td>
                            <td>{{ $rental->peminjam }}</td>
                            <td>{{ $rental->room->room }}</td>
                            <td>
                                @if($rental->status_id == "1")
                                <p class="bg-success text-center">{{ $rental->status->name }}</p>
                                @endif

                                @if($rental->status_id == "2")
                                <p class="bg-warning text-center">{{ $rental->status->name }}</p>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('rental.destroy', $rental) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a class="btn btn-info"style="color: white;" href="{{ route('rental.show', $rental) }}"><i class="fa fa-eye fa-fw"></i></a>
                                <a class="btn btn-success" style="color: white;" href="{{ route('checklist', $rental) }}"><i class="fa fa-check-square-o fa-fw"></i></a>
                                <a class="btn btn-warning" style="color: white;" href="{{ route('rental.edit', $rental) }}"><i class="fa fa-edit fa-fw"></i></a>
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
@endif

@endsection

