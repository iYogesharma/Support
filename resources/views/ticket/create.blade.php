@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" >
            <div class=" col-lg-12 col-md-12 col-sm-12 alert alert-info">

                <h3 class=" text-center">Compose New Support Ticket</h3>
                <div class="hr-div"> <hr></div>
                <form method="POST" action="{{route('ticket.store')}}">
                    {{csrf_field()}}
                    <div class="form-group col-lg-4 col-md-4 col-sm-4">
                        <label>Current Status</label>
                        <select class="form-control">
                            <option>Open</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label>Please Write a Subject Line</label>
                        <input type="text" name="subject" class="form-control" value="{{old('subject')}}" required="required" placeholder="Enter Subject Of Ticket">
                    </div>
                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label>Please Enter Issue</label>
                        <textarea class="form-control" name="description" id="issue" rows="15" required="required">{{old('description')}}</textarea>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="btn btn-primary">Compose &amp; Send Ticket</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
@stop
