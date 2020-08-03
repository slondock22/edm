@extends('admin.layouts.index')

@section('content')
<div class="page-inner">
    @include('admin.layouts.breadcrumbs')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form name="formCreateBroadcast" id="formCreateBroadcast" method="POST" enctype="multipart/form-data" action="{{route('admin.register.register_manual')}}">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <div class="card-title">Register Manually</div>
                    <a class="btn btn-primary btn-round ml-auto" href="{{route('admin.checkin')}}">
                            <i class="fa fa-angle-left"></i>
                            Back
                    </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <input type="hidden" class="form-control" id="broadcast_event_id" name="broadcast_event_id" value="19">
                            <label for="email2">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="ex. John, Mayer">
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label for="email2">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="ex. john@email.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="ex.021 9029822">
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label for="email2">Company</label>
                            <input type="text" class="form-control" id="company" name="company" placeholder="ex. Sugar Daddy.co">
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