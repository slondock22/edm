@extends('admin.layouts.index')

@section('content')
<div class="page-inner" id="_content_body_">
    @include('admin.layouts.breadcrumbs')
    <div class="row">    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Campaign List</h4>
                        <button class="btn btn-primary btn-round ml-auto" onclick="javascript:window.location.href='{{route('admin.campaign.create')}}'">
                            <i class="fa fa-plus"></i>
                            Add Row
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="campaign-tables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Campaign Title</th>
                                    <th>Recepient Group</th>
                                    <th>Recepient Total</th>
                                    <th>URL Callback</th>
                                    <th>Status</th>
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

@endsection