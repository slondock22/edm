@extends('admin.layouts.index')

@section('content')
<div class="page-inner" id="_content_body_">
    @include('admin.layouts.breadcrumbs')
    <div class="row">    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="col-md-6">    
                            <h4 class="card-title">Recepient List</h4>
                        </div>
                        <div class="col-md-6 d-flex flex-row-reverse">
                            <button class="btn btn-success btn-round ml-1" id="showAddRowModal">
                                <i class="fa fa-upload"></i>
                                Import Data
                            </button>
                            <button class="btn btn-primary btn-round" onclick="javascript:window.location.href='{{route('admin.master.recepient_create')}}'">
                                <i class="fa fa-plus"></i>
                                Add Row
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="recepient-tables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Recepient Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <!-- Modal -->
  <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Choose Importing Tools</span>
                </h5>
                <button type="button" id="closeModal" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <ul class="nav nav-pills nav-primary  nav-pills-no-bd nav-pills-icons justify-content-center" id="pills-tab-with-icon" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab-icon" data-toggle="pill" href="#pills-home-icon" role="tab" aria-controls="pills-home-icon" aria-selected="true">
                                        <i class="flaticon-database"></i>
                                        From CRM
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab-icon" data-toggle="pill" href="#pills-profile-icon" role="tab" aria-controls="pills-profile-icon" aria-selected="false">
                                        <i class="flaticon-file"></i>
                                        From Excel
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content mt-2 mb-3" id="pills-with-icon-tabContent">
                                <div class="tab-pane fade show active" id="pills-home-icon" role="tabpanel" aria-labelledby="pills-home-tab-icon">
                                    <div class="col-sm-12">
                                        <label class="mb-2 mt-2" style="font-size: 9px !important;">Last Sync Date :  @if(isset($last_sync_db->created_at)){{$last_sync_db->created_at}} @endif</label>
                                       {{--  <div class="progress mb-2 mt-2">
                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">50%</div>
                                        </div> --}}
                                        <button type="button" id="importButtonDB" class="btn btn-primary btn-block">Import</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile-icon" role="tabpanel" aria-labelledby="pills-profile-tab-icon">
                                    <div class="col-sm-12">
                                        <label class="mt-2" style="font-size: 9px !important;">Last Sync Date : @if(isset($last_sync_excel->created_at)){{$last_sync_excel->created_at}} @endif</label>
                                        <br>
                                        <label class="mb-2">File Upload (.xlsx) - <a href="{{route('admin.master.download_template_excel')}}">Use Template</a></label>
                                            <form name="formImportRecepientExcel" id="formImportRecepientExcel" method="POST" enctype="multipart/form-data" action="{{route('admin.master.import_recepient')}}">

                                            {{ csrf_field() }}

                                                <div class="form-group form-group-default">
                                                    <input type="hidden" id="type" name="type" value="excel">
                                                    <input type="file" class="form-control-file" id="file" name="file">
                                                </div>                                       
                                                <button type="button" id="importButtonExcel" class="btn btn-primary btn-block">Import</button>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            {{-- <div class="modal-footer no-bd">
                <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
    $("#showAddRowModal").click(function(){
        $("#addRowModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
});



$("#importButtonDB").click(function() {
       swal({
        title: 'Are you sure?',
        text: "To import data from CRM DB?",
        icon: 'warning',
        buttons:{
            cancel: {
                visible: true,
                text : 'No, cancel!',
                className: 'btn btn-danger'
            },                  
            confirm: {
                text : 'Yes, sure!',
                className : 'btn btn-success'
            }
        }
    }).then((willDelete) => {
        if (willDelete) {   
             // disable button

            $.ajax({
                url: APP_URL+'/admin/master/import_recepient',
                type: "POST",
                data: {
                    type: 'db',
                },
                 beforeSend: function() {
                    // setting a timeout
                    $('#closeModal').hide();
                    $('#importButtonDB').prop("disabled", true);
                    $('#importButtonDB').html();
                      // add spinner to button
                    $('#importButtonDB').html(
                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                    );
                },
                success: function (data) {
                   swal("Import Data Successfully", {
                        icon : "success",
                        buttons: false,
                    });

                    setTimeout( 
                        function() {
                            window.location.reload(true);
                        }, 3000);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("Failed", {
                        icon : "error",
                        buttons: false,
                    });
                }
            });
        } 
    });
});

$("#importButtonExcel").click(function() {
       swal({
        title: 'Are you sure?',
        text: "To import data from Excel?",
        icon: 'warning',
        buttons:{
            cancel: {
                visible: true,
                text : 'No, cancel!',
                className: 'btn btn-danger'
            },                  
            confirm: {
                text : 'Yes, sure!',
                className : 'btn btn-success'
            }
        }
    }).then((willDelete) => {
        if (willDelete) {   
             // disable button

            $.ajax({
                data: new FormData($('#formImportRecepientExcel')[0]),
                url: $('#formImportRecepientExcel').attr('action'),
                type: "POST",
                processData: false,
                contentType: false,
                 beforeSend: function() {
                    // setting a timeout
                    $('#closeModal').hide();
                    $('#importButtonExcel').prop("disabled", true);
                    $('#importButtonExcel').html();
                      // add spinner to button
                    $('#importButtonExcel').html(
                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
                    );
                },
                success: function (data) {
                   console.log(data);
                   // return false;

                    var error_values = '';
                    jQuery.each(data.errors, function (key, value) {
                         error_values += value+'\n'
                    });

                    
                  // return false;
                    if(data.code){
                        swal(data.code, data.msg, {
                            icon : data.icon,
                            buttons: false,
                        });
                    }
                    else if(data){
                        swal("Failed",error_values, {
                            icon : "error",
                            buttons: false,
                            timer: 5000,
                        });
                        $('#closeModal').show();
                        $('#importButtonExcel').html();
                        $('#importButtonExcel').prop("disabled", false);
                        $('#importButtonExcel').html('Import');

                        return false;
                    }
                    else{
                        swal("Failed", {
                            icon : "error",
                            buttons: false,
                        });
                    }
                    setTimeout( 
                        function() {
                          window.location.reload(true);
                        }, 2000);

                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal("Failed", {
                        icon : "error",
                        buttons: false,
                    });
                }
            });
        } 
    });
});
</script>
@endsection