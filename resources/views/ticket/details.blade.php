@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row" style="margin:2%">
        <div class="col-sm-6 col-md-6 col-lg-6" >
            <h5 >Ticket ID  <span class="label label-danger">#{{$data->id}}</span>
                Status <span class="label label-info">{{$data->status->name}}</span>
            </h5>
            <h5 >Subject <span class="label label-default">{{$data->subject}}</span></h5>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            @if(auth()->user()->role_id === 1 && $data->status_id === 1 )
            <h5 class="pull-right">
                <a href="{{route('ticket.close',$data->id)}}" class="btn btn-warning"> <i class="fa fa-window-close"></i> Close Ticket</a>
            </h5 >
            @endif
        </div>
    </div>


    <div class="row">
        <div class="col-md-offset-1 col-sm-10 col-md-10 col-lg-10 " >
        <div class="panel panel-default">
            <div class="panel-heading"><strong class="label label-danger">Issue</strong>
                <span class="label label-danger pull-right">Dated: {{date('d/m/Y h:i a',strtotime($data->created_at))}}</span> </div>
                <div class="panel-body">
                    {!!$data->description !!}
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-offset-1 col-sm-10 col-md-10 col-lg-10 " >
            @foreach($data->replies as $reply)
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="label {{auth()->user()->id == $reply->user_id?'label-success':'label-warning'}}">By {{ auth()->user()->id == $reply->user_id?'You':$reply->user->role->name}}</strong>
                    <span class="label label-danger pull-right">Dated: {{date('d/m/Y h:i a',strtotime($reply->created_at))}}</span> </div>
                    <div class="panel-body">
                        {!!$reply->description!!}
                    </div>
                </div>
                @endforeach
                @if($data->status_id === 1)
                <form id="reply-form" action="{{ route('ticket.reply',$id) }}" method="POST" >
                    {{ csrf_field() }}
                    {{method_field('put')}}
                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label>Make New Reply</label>
                        <textarea name ="description" id ="issue" class="form-control" rows="8"></textarea>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary">Reply Ticket</button>
                    </div>
                </form>
                @endif
            </div>

        </div>
    </div>
    @stop
