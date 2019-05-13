@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Message</h3>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
@foreach($messages->chunk(3) as $message)
<div class="row">

    @foreach($message as $msg)
    <div class="col-lg-4">
        <div class="panel panel-green">
            <form action="{{ route('message.destroy', $msg) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-sm pull-right" onclick="return confirm('Yakin ingin menghapus data?')"><i class="fa fa-trash-o fa-fw"></i></button>
            </form>
            <div class="panel-heading">
                {{ $msg->subject }}
            </div>
            <div class="panel-body">
                <p>{{ $msg->pesan }}</p>
            </div>
            <div class="panel-footer"> 
                Pengirim: {{ $msg->name }}<br>
                Email: {{ $msg->email }}
            </div>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    @endforeach
    
</div>
@endforeach
<!-- /.row -->

@endsection