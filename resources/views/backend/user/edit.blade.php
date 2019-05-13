@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Edit Petugas</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Data Petugas
            </div>
            <div class="panel-body">
                <form action="{{ route('user.update', $user) }}" role="form" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>No. Hp.</label>
                            <input type="number" name="no_hp" value="{{ $user->no_hp }}" class="form-control" required>
                        </div>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label> Sebagai Staff</label>
                            <select name="staff" class="form-control" required>
                                @foreach($staff as $staff)
                                <option value="{{ $staff->id }}"
                                    @if ($staff->id === $user->staff_id)
                                    selected
                                    @endif>
                                {{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder=".........." required>
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