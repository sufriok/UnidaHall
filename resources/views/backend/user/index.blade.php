@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Data Petugas <a href="{{ route('user.create') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-plus-circle"></i></a></h3>
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
                Petugas

                @if($tambah == "Y")
                    <!-- Button to Open the Modal -->
                    <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#myModal">
                    <span class="glyphicon glyphicon-plus-sign"></span> Staff
                    </button>
                    <br><br>
                @endif




            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. HP</th>
                            <th>Staff</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="odd gradeA">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->no_hp }}</td>
                            <td>{{ $user->staff->name }}</td>
                            <td>
                                <form action="{{ route('user.destroy', $user) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a class="btn btn-warning" style="color: white;" href="{{ route('user.edit', $user) }}"><i class="fa fa-edit fa-fw"></i></a>
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
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header bg-secondary">
            <h4 class="modal-title">Kategori Staff</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="{{ route('staff.store') }}" role="form" method="post">
        @csrf 
        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label>Kategori Staff Baru</label>
                <input type="text" name="name" class="form-control" placeholder="Staff ....">
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-outline btn-primary"><i class="fa fa-paper-plane fa-fw"></i> Submit</button>
            <button type="reset" class="btn btn-outline btn-info"><i class="fa fa-eraser fa-fw"></i> Reset</button>
        </div>
        </form>
        
        </div>
    </div>
</div>
@endsection