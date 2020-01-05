@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row noti-div">
        <div class="col-lg-6 col-md-6 col-sm-6  text-center">
            <div class="alert alert-success">
                <i class="fa fa-folder-open fa-4x"></i><br>
                <span class="label label-warning">Open Tickets</span>
                <span class="label label-success">{{$open}}</span>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6  text-center">
            <div class="alert alert-danger">
                <i class="fa fa-envelope fa-4x"></i><br>
                <span class="label label-info">Total Tickets</span>
                <span class="label label-danger">{{$total}}</span>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover table-striped "style="width:100%">
        <tr>
            <th>ID</th>
            <th>Subject</th>
            <th>Last Updated</th>
            <th>Status</th>
            <th>Details</th>
        </tr>
        @foreach( $data as $d)
        <tr>
            <td>#{{$d->id}}</td>
            <td>{{$d->subject}}</td>
            <td>{{date('d M Y',strtotime($d->updated_at))}}</td>
            <td><span class="label {{$d->status_id === 2 ?'label-danger':'label-warning'}}">{{$d->status->name}} </span></td>
            <td><a href="{{route('ticket.details',$d->id)}}" class="label label-success">Details <i class="fa fa-forward"></i></a></td>
        </tr>
        @endforeach
    </table>
    <div class="pull-right">
        {{ $data->links() }}
    </div>

</div>

@stop
