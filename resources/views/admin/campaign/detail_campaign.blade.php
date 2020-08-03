
@include('admin.layouts.breadcrumbs')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form name="formCreateCampaign" id="formCreateCampaign" method="POST" enctype="multipart/form-data" action="{{route('campaign.createCampaign')}}">
            <div class="card-header">
                <div class="d-flex align-items-center">
                <div class="card-title">View Campaign</div>
                <a class="btn btn-primary btn-round ml-auto" href="{{route('admin.campaign.list')}}">
                        <i class="fa fa-angle-left"></i>
                            Back To List
                </a>
                </div>
            </div>
            <div class="card-body">
                <input type="hidden" name="old_recepient_group_id" id="old_recepient_group_id" value="{{$campaign->recepient_group_id}}">
                <input type="hidden" name="campaign_id" id="campaign_id" value="{{$campaign->id}}">


                <div class="form-group row">
                    <div class="col-md-6 col-lg-6">
                        <label for="email2" class="required">Recepient Group Name</label>
                        <select class="form-control" id="recepient_group_id" name="recepient_group_id">
                            <option value="">Choose Recepient Group</option>
                        </select>
                    </div>
                    @if(!$edit)
                    <div class="col-md-6 col-lg-6">
                        <label for="email2">Campaign Sent At </label>
                        <input type="text" class="form-control" id="sent_time" name="sent_time" value="{{$campaign->campaign_sent_time_at}}">
                    </div>
                    @endif
                </div>
                <div class="form-group row">
                        <div class="col-md-6 col-lg-6">
                            <label for="email2" class="required">Campaign Title</label>
                            <input type="text" class="form-control" id="campaign_title" name="campaign_title" value="{{$campaign->campaign_title}}">
                        </div>
                    </div>
                <div class="form-group row">
                    <div class="col-md-6 col-lg-6">
                        <label for="email2" class="required">Email Subject</label>
                        <input type="text" class="form-control" id="email_subject" name="email_subject" value="{{$campaign->campaign_subject}}">
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
                       <textarea id="email_message" name="email_message">{!! $campaign->campaign_message !!}</textarea>
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
                        <input type="text" class="form-control" id="email_url_callback" name="email_url_callback" value="{{$campaign->campaign_url_callback}}">
                    </div>
                </div>
            </div>
            @if($edit)
            <div class="card-action">
                <button class="btn btn-warning" type="button" id="btn-save-template" onclick="save_draft_form(($(this).closest('form').attr('id')),(this.id))">Save Draft</button>
                <button class="btn btn-danger" type="reset">Reset</button>       
                <button class="btn btn-success" type="button" id="btn-save" onclick="save_form(($(this).closest('form').attr('id')),(this.id))">Submit</button>
            </div>
            @endif
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

         $.getJSON(APP_URL+"/api/getRecepientGroupList", function(data) {
            // console.log(data);
            var selectedUser = $('#old_recepient_group_id').val();

            $("#recepient_group_id").empty();
            $("#recepient_group_id").append('<option value="">Choose Recepient Group</option>')
            $.each(data, function(){

                if(this.id == selectedUser){
                    var selected = 'selected';
                }else{
                    var selected = '';
                }

                $("#recepient_group_id").append('<option value="'+ this.id +'"'+selected+'>'+ this.recepient_group_name + ' - '+this.recepient_total+' Recepient' +'</option>')
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
