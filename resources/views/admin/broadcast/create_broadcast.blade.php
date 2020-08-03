@extends('admin.layouts.index')

@section('content')
<div class="page-inner">
    @include('admin.layouts.breadcrumbs')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form name="formCreateBroadcast" id="formCreateBroadcast" method="POST" enctype="multipart/form-data" action="{{route('broadcast.createBroadcast')}}">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <div class="card-title">Create Broadcast</div>
                    <a class="btn btn-primary btn-round ml-auto" href="{{route('admin.broadcast.list')}}">
                            <i class="fa fa-plus"></i>
                            Listing
                    </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">Event's Name</label>
                            <select class="form-control" id="broadcast_event_id" name="broadcast_event_id">
                                <option value="">Choose Event</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required" class="required">Recepient Name</label>
                            <input type="text" class="form-control" id="recepient_name" name="recepient_name" placeholder="ex. John, Mayer">
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">Recepient Email</label>
                            <input type="email" class="form-control" id="recepient_email" name="recepient_email" placeholder="ex. john@email.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6" >
                            <label for="email2" class="required">Recepient Phone</label>
                            <input type="text" class="form-control" id="recepient_phone" name="recepient_phone" placeholder="ex.021 9029822">
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">Recepient Company</label>
                            <input type="text" class="form-control" id="recepient_company" name="recepient_company" placeholder="ex. Sugar Daddy.co">
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-success" type="button" id="btn-save" onclick="save_form(($(this).closest('form').attr('id')),(this.id))">Submit</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
 @endsection