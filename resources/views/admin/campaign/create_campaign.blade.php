@extends('admin.layouts.index')

@section('content')

<div class="page-inner">
    @include('admin.layouts.breadcrumbs')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form name="formCreateCampaign" id="formCreateCampaign" method="POST" enctype="multipart/form-data" action="{{route('campaign.createCampaign')}}">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <div class="card-title">Create Campaign</div>
                    <a class="btn btn-primary btn-round ml-auto" href="{{route('admin.campaign.list')}}">
                            <i class="fa fa-plus"></i>
                            Listing
                    </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">Recepient Group Name</label>
                            <select class="form-control" id="recepient_group_id" name="recepient_group_id">
                                <option value="">Choose Recepient Group</option>
                            </select>
                        </div>
                        {{-- 
                        <div class="col-md-6 col-lg-6">
                            <label for="email2">Recepient Name</label>
                            <input type="text" class="form-control" id="recepient_name" name="recepient_name" placeholder="ex. John, Mayer">
                        </div> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">Campaign Title</label>
                            <input type="text" class="form-control" id="campaign_title" name="campaign_title" placeholder="ex.Blast Hadirkoe Promo Batch 1">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">Email Subject</label>
                            <input type="text" class="form-control" id="email_subject" name="email_subject" placeholder="Email Subject ex.Product Discount, Alert, Flash Sale">
                        </div>
                    </div>
                  {{--   <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2">Email Template</label>
                            <select class="form-control" id="email_template_id" name="email_template_id">
                                <option value="">Choose Email Template</option>
                            </select>
                        </div>
                    </div> --}}
                     <div class="form-group row">
                        <div class="col-md-12 col-lg-12">
                            <label for="email2" class="required">Email Message</label>
                           <textarea id="email_message" name="email_message"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label class="required">Greetings</label><br>
                            <label class="form-radio-label">
                                <input class="form-radio-input" type="radio" name="email_greetings" id="email_greetings" value="1" checked="">
                                <span class="form-radio-sign">Yes</span>
                            </label>
                            <label class="form-radio-label ml-3">
                                <input class="form-radio-input" type="radio" name="email_greetings" id="email_greetings" value="0">
                                <span class="form-radio-sign">No</span>
                            </label>
                        </div>
                    </div>
                     <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">URL Callback</label>
                            <input type="text" class="form-control" id="email_url_callback" name="email_url_callback" placeholder="https://www.register-event.co.id">
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <button class="btn btn-warning" type="button" id="btn-save-template" onclick="save_draft_form(($(this).closest('form').attr('id')),(this.id))">Save Draft</button>
                    <button class="btn btn-danger" type="reset">Reset</button>       
                    <button class="btn btn-success" type="button" id="btn-save" onclick="save_form(($(this).closest('form').attr('id')),(this.id))">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

         $.getJSON(APP_URL+"/api/getRecepientGroupList", function(data) {
            // console.log(data);
            $("#recepient_group_id").empty();
            $("#recepient_group_id").append('<option value="">Choose Recepient Group</option>')
            $.each(data, function(){
                $("#recepient_group_id").append('<option value="'+ this.id +'">'+ this.recepient_group_name + ' ('+this.recepient_total+' Active Recepient)' +'</option>')
            });
        });

    });
</script>
<script>
  var options = {
    filebrowserImageBrowseUrl: APP_URL+'/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: APP_URL+'/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: APP_URL+'/laravel-filemanager?type=Files',
    filebrowserUploadUrl: APP_URL+'/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
  };
</script>
<script>
        CKEDITOR.replace( 'email_message', options);
</script>

 @endsection