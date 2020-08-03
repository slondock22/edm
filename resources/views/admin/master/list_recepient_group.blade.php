@extends('admin.layouts.index')

@section('content')
<div class="page-inner" id="_content_body_">
    @include('admin.layouts.breadcrumbs')
    <div class="row">    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Recepient Group</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Row
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="recepient-group-tables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Group Name</th>
                                    <th>Recepient Total</th>
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
                    Add New Group</span> 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="formCreateEvent" id="formCreateEvent" method="POST" enctype="multipart/form-data" action="{{route('admin.master.recepient_group_create')}}">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <label>Name of Group</label>
                            <input id="name_group" name="name_group" type="text" class="form-control" placeholder="fill name of group">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="button" id="btn-save" onclick="save_form(($(this).closest('form').attr('id')),(this.id))" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">

$(document).ready(function(){
    getRecepientGroupTable();
});

</script>

@endsection

