    @include('admin.layouts.breadcrumbs')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form name="formUpdateRecepient" id="formUpdateRecepient" method="POST" enctype="multipart/form-data" action="{{route('admin.master.recepient_update')}}">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <div class="card-title">Edit Recepient</div>
                    <a class="btn btn-primary btn-round ml-auto" href="{{route('admin.master.recepient')}}">
                            <i class="fa fa-plus"></i>
                            Listing
                    </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <input type="hidden" name="id" id="id" value="{{$recepient->id}}">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required" class="required">Recepient Name</label>
                            <input type="text" class="form-control" id="recepient_name" name="recepient_name" value="{{$recepient->recepient_name}}">
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">Recepient Email</label>
                            <input type="email" class="form-control" id="recepient_email" name="recepient_email" value="{{$recepient->recepient_email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6" >
                            <label for="email2" class="required">Recepient Phone</label>
                            <input type="text" class="form-control" id="recepient_phone" name="recepient_phone" value="{{$recepient->recepient_phone}}">
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">Recepient Company</label>
                            <input type="text" class="form-control" id="recepient_company" name="recepient_company" value="{{$recepient->recepient_company}}">
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
