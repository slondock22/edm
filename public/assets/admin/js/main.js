$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Get Category Event select
    $.getJSON(APP_URL+"/api/getCatEvent", function(data) {
        // console.log(data);
        $("#event_cat_id").empty();
        $("#event_cat_id").append('<option value="">Choose Event Category</option>')
        $.each(data, function(){
            $("#event_cat_id").append('<option value="'+ this.id +'">'+ this.cat_event_description +'</option>')
        });
    });

    //Get Event select
    $.getJSON(APP_URL+"/api/getEvent", function(data) {
        // console.log(data);
        $("#broadcast_event_id").empty();
        $("#broadcast_event_id").append('<option value="">Choose Event</option>')
        $.each(data, function(){
            $("#broadcast_event_id").append('<option value="'+ this.id +'">'+ this.event_name +'</option>')
        });
    });   

});

function updateAllMessageForms(){
    for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
    }
}


function save_form(formid,buttonid){
    // console.log($('#'+formid).attr('action'));
    // console.log($('#'+formid)[0]);
    // return false;
        updateAllMessageForms();
        
        var actionType = $('#'+buttonid).val();
        $('#'+buttonid).prop('disabled',true);
        $('#'+buttonid).html('Sending..');
        
        $.ajax({
            data: new FormData($('#'+formid)[0]),
            url: $('#'+formid).attr('action'),
            type: "POST",
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data.msg);

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
                else if(data.errors){
                    swal("Failed",error_values, {
                        icon : "error",
                        buttons: false,
                        timer: 5000,
                    });
                     $('#'+buttonid).prop('disabled',false);
                    $('#'+buttonid).html('Submit');
                    return false;
                }
                 else if(data.exist){
                 
                   swal(data.exist, data.msg, {
                        icon : data.icon,
                        buttons: false,
                        timer: 5000,
                    });

                    $('#'+buttonid).prop('disabled',false);
                    $('#'+buttonid).html('Submit');
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
            error: function (data) {
                swal("Something Wrong", {
                        icon : "error",
                        buttons: false,
                    });
                console.log(data);
                $('#'+buttonid).html('Submit');
            }
        });
}

function save_draft_form(formid,buttonid){
    // console.log($('#'+formid).attr('action'));
    // console.log($('#'+formid)[0]);
    // return false;
        updateAllMessageForms();
        
        var actionType = $('#'+buttonid).val();
        $('#'+buttonid).html('Saving..');
        
        $.ajax({
            data: new FormData($('#'+formid)[0]),
            url: APP_URL+'/api/saveDraftCampaign',
            type: "POST",
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);

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
                    $('#'+buttonid).html('Save Draft');
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
            error: function (data) {
                swal("Something Wrong", {
                        icon : "error",
                        buttons: false,
                    });
                console.log(data);
                $('#'+buttonid).html('Save Draft');
            }
        });
}

$("#event_time_start").datetimepicker({
    format: 'yyyy-mm-dd hh:ii',
    autoclose: true,
    todayHighlight: true,
    minuteStep:15,
});

$("#event_time_end").datetimepicker({
    format: 'yyyy-mm-dd hh:ii',
    autoclose: true,
    todayHighlight: true,
    minuteStep:15,
});

// Event Datatable

$('#event-tables').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 5,
    ajax: APP_URL+"/admin/event/table",
    columns: [
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: 'event_name'
        },
        {
            data: 'event_city'
        },
        {
            data: 'event_place'
        },
        {
            data: 'event_time_start'
        },
        {
            data: 'event_time_end'
        },
        // {
        //     data: 'event_status'
        // },
        { 	data: 'id',
            render: function(data, type, row) {
                var action = ' <div class="form-button-action">\
                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">\
                    <i class="fa fa-edit"></i>\
                </button>\
                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">\
                    <i class="fa fa-times"></i>\
                </button>\
            </div>';
                return action;
            }
        }

    ]

});

// Recepient Datatable

$('#recepient-tables').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    destroy:true,
    order: [ [0, 'desc'] ],
    ajax: APP_URL+"/admin/master/recepient_table",
    columns: [
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: 'recepient_name'
        },
        {
            data: 'recepient_email'
        },
        {
            data: 'recepient_phone'
        },
        {
            data: 'recepient_company'
        },
        // {
        //     data: 'event_status'
        // },
        { 	data: 'id',
            render: function(data, type, row) {
                var action = ' <div class="form-button-action">\
                <button type="button" data-toggle="tooltip" title="View" "javascript:;" onclick="view(\''+ row.id +'\', \'/admin/master/recepient_view\')" class="btn btn-link btn-primary btn-lg" data-original-title="Preview">\
                    <i class="fa fa-edit"></i>\
                    </button>\
                    <button type="button" data-toggle="tooltip" title="Delete" "javascript:;" onclick="delete_action(\''+ row.id +'\', \'/admin/master/recepient_delete\')" class="btn btn-link btn-danger" data-original-title="Remove">\
                        <i class="fa fa-times"></i>\
                    </button>\
            </div>';
                return action;
            }
        }

    ]

});

$('#checkin-tables').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 10,
    destroy:true,
    order: [ [6, 'desc'] ],
    ajax: APP_URL+"/admin/checkin/checkin_table",
    columns: [
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: 'attendance_name'
        },
        {
            data: 'attendance_email'
        },
        {
            data: 'attendance_phone'
        },
        {
            data: 'attendance_company'
        },
        {
            data: 'ticket_sent_status',  render: function(data, type, row) {
               if(data == '1'){
                   var status = 'SENT';
               }else{
                   var status = 'NOT SENT';
               }

                return status+' / '+row.ticket_sent_time;
            }
        },
        {
            data: 'attendance_checkin_at'
        },
        { 	data: 'id',
        render: function(data, type, row) {
            var action = ' <div class="form-button-action">\
            <button type="button" data-toggle="tooltip" title="Sent Ticket To This" "javascript:;" onclick="ticket( \''+ row.id +'\', \'\')" class="btn btn-warning btn-round ml-auto btn-sm" style="margin-right:3px;" data-original-title="Ticket">\
            <i class="fa fa-file"></i> Send Ticket\
            </button>\
            <button type="button" data-toggle="tooltip" title="Check In" "javascript:;" onclick="checkin(\''+ row.id +'\')" class="btn btn-primary btn-round ml-auto btn-sm" data-original-title="Check In">\
                <i class="fa fa-check"></i> Check-in\
            </button>\
        </div>';
            return action;
        }
    }

    ]

});

// Broadcast Datatable
$('#broadcast-tables').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 5,
    ajax: APP_URL+"/admin/broadcast/table",
    columns: [
        {
            data: 'broadcast_event_id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: 'event_name'
        },
        {
            data: 'recepient_total'
        },
        // {
        //     data: 'event_status'
        // },
        { 	data: 'event_name',
            render: function(data, type, row) {
                var action = ' <div class="form-button-action">\
                <button type="button" data-toggle="tooltip" title="View" "javascript:;" onclick="view(\''+ row.broadcast_event_id +'\', \'/admin/broadcast/view\')" class="btn btn-link btn-success btn-lg" data-original-title="Preview">\
                <i class="fa fa-search"></i>\
                </button>\
                <button type="button" data-toggle="tooltip" title="Sent Broadcast To All" "javascript:;" onclick="broadcast( \''+ row.broadcast_event_id +'\', \'all\')" class="btn btn-link btn-info btn-lg" data-original-title="Send">\
                    <i class="fa fa-paper-plane"></i>\
                </button>\
                <button type="button" data-toggle="tooltip" title="Delete" "javascript:;" onclick="delete_broadcast(\''+ row.broadcast_event_id +'\')" class="btn btn-link btn-danger" data-original-title="Remove">\
                    <i class="fa fa-times"></i>\
                </button>\
            </div>';
                return action;
            }
        }

    ]

});

// Campaign Datatable
$('#campaign-tables').DataTable({
    processing: true,
    serverSide: true,
    paging: true,
    pageLength: 5,
    order:[[0, 'desc']],
    ajax: APP_URL+"/admin/campaign/table",
    columns: [
        {
            data: 'id',
            render: function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },
        {
            data: 'campaign_title'
        },
        {
            data: 'recepient_group_name'
        },
        {
            data: 'recepient_total'
        },
        {
            data: 'campaign_url_callback'
        },
        {
            data: 'campaign_sent_status',
            render: function(data, type, row) {
                if(data == 1){    
                    var status = '<span class="badge badge-primary">'+row.campaign_status+'</span>';
                }
                else if(data == 2){
                    var status = '<span class="badge badge-warning">'+row.campaign_status+'</span>';
                }
                return status;
            }
        },
        {     data: 'campaign_sent_status',
            render: function(data, type, row) {
                if(data == 1){   
                var action = ' <div class="form-button-action">\
                <button type="button" data-toggle="tooltip" title="View" "javascript:;" onclick="view(\''+ row.id +'\', \'/admin/campaign/view\')" class="btn btn-link btn-success btn-lg" data-original-title="Preview">\
                <i class="fa fa-search"></i>\
                </button>\
                </div>';
                }
                else if(data == 2){
                     var action = ' <div class="form-button-action">\
                <button type="button" data-toggle="tooltip" title="View" "javascript:;" onclick="view(\''+ row.id +'\', \'/admin/campaign/view\',\'edit\')" class="btn btn-link btn-primary btn-lg" data-original-title="Preview">\
                <i class="fa fa-edit"></i>\
                </button>\
                <button type="button" data-toggle="tooltip" title="Delete" "javascript:;" onclick="delete_action(\''+ row.id +'\', \'/api/deleteCampaign\')" class="btn btn-link btn-danger" data-original-title="Remove">\
                        <i class="fa fa-times"></i>\
                    </button>\
                </div>';
                }

                return action;
            }
        }

    ]

});

function getRecepientGroupTable() {
   var table =  $('#recepient-group-tables').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        pageLength: 5,
        ajax: APP_URL+"/admin/master/recepient_group_table",
        columns: [
            {
                data: 'id',
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                data: 'recepient_group_name'
            },
            {
                data: 'recepient_total'
            },
            {     
                data: 'id',
                render: function(data, type, row) {
                    var action = ' <div class="form-button-action">\
                    <button type="button" data-toggle="tooltip" title="View" "javascript:;" onclick="view(\''+ row.id +'\', \'/admin/master/recepient_group_view\')" class="btn btn-link btn-success btn-lg" data-original-title="Preview">\
                    <i class="fa fa-search"></i>\
                    </button>\
                    <button type="button" data-toggle="tooltip" title="Delete" "javascript:;" onclick="delete_action(\''+ row.id +'\', \'/admin/master/recepient_group_delete\')" class="btn btn-link btn-danger" data-original-title="Remove">\
                        <i class="fa fa-times"></i>\
                    </button>\
                </div>';
                    return action;
                }
            }

        ]

    });
}


/* <button type="button" data-toggle="tooltip" title="Sent Ticket To All" "javascript:;" onclick="ticket( \''+ row.broadcast_event_id +'\', \'all\')" class="btn btn-link btn-warning btn-lg" data-original-title="Ticket">\
<i class="fa fa-file"></i>\
</button>\ */

function view(id,url,action=''){
    var action = action;

    swal({
        title: 'Are you sure?',
        text: "To see this detail",
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
            $.ajax({
                url: APP_URL+url,
                type: "POST",
                data: {
                    id: id,
                    action: action
                },
                success: function (data) {
                    $('#_content_body_').html(data);
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
}

function checkin(id){
    swal({
        title: 'Are you sure to check-in?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        buttons:{
            cancel: {
                visible: true,
                text : 'No, cancel!',
                className: 'btn btn-danger'
            },        			
            confirm: {
                text : 'Yes, Checkin!',
                className : 'btn btn-success'
            }
        }
    }).then((willDelete) => {
        if (willDelete) {   
            $.ajax({
                url: APP_URL+"/admin/checkin/check",
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    swal("Success", {
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
}

function delete_broadcast(id){
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        buttons:{
            cancel: {
                visible: true,
                text : 'No, cancel!',
                className: 'btn btn-danger'
            },        			
            confirm: {
                text : 'Yes, delete it!',
                className : 'btn btn-success'
            }
        }
    }).then((willDelete) => {
        if (willDelete) {   
            $.ajax({
                url: APP_URL+"/api/deleteBroadcast",
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    swal("Success", {
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
}

function delete_action(id,url){
    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        buttons:{
            cancel: {
                visible: true,
                text : 'No, cancel!',
                className: 'btn btn-danger'
            },                    
            confirm: {
                text : 'Yes, delete it!',
                className : 'btn btn-success'
            }
        }
    }).then((willDelete) => {
        if (willDelete) {   
            $.ajax({
                url: APP_URL+url,
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    if(data.code){
                    swal(data.code, data.msg, {
                        icon : data.icon,
                        buttons: false,
                    });
                    }
                    else if(data.errors){
                        swal("Failed","The field is required", {
                            icon : "error",
                            buttons: false,
                        });
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
}

function broadcast(id="",type=""){
    if(type != ""){
        var url ="/admin/broadcast/sendMailAll";
        var alert = "The invitation will be broadcast to all recepient in list";
    }else{
        var url ="/admin/broadcast/sendMailId";
        var alert = "The invitation will be broadcast to this recepient";
    }

    swal({
        title: 'Are you sure to send ticket?',
        text: alert,
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
            $.ajax({
                url: APP_URL+url,
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    swal("Success", {
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
}

function ticket(id="",type=""){
    if(type != ""){
        var url ="/admin/broadcast/sendTicketAll";
        var alert = "The ticket will be broadcast to all recepient in list";
    }else{
        var url ="/admin/broadcast/sendTicketId";
        var alert = "The ticket will be broadcast to this recepient";
    }

    swal({
        title: 'Are you sure?',
        text: alert,
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
            $.ajax({
                url: APP_URL+url,
                type: "POST",
                data: {
                    id: id
                },
                success: function (data) {
                    swal("Success", {
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
}

// var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

// $('#addRowButton').click(function() {
//     $('#add-row').dataTable().fnAddData([
//         $("#addName").val(),
//         $("#addPosition").val(),
//         $("#addOffice").val(),
//         action
//         ]);
//     $('#addRowModal').modal('hide');

// });

function add_recepient_group(id_recepient,id_group) {
    // console.log(id_recepient,id_group);
    // return false;
    $.ajax({
        url: APP_URL+'/admin/master/add_recepient_group',
        type: "POST",
        data: {
            recepient_id : id_recepient,
            recepient_group_id : id_group
        },
        success: function (data) {
            $('#add_recepient_group'+id_recepient).hide();
            $('#remove_recepient_group'+id_recepient).show(); 
        },
        error: function (xhr, ajaxOptions, thrownError) {
            swal("Failed", {
                icon : "error",
                buttons: false,
            });
        }
    });
}


function remove_recepient_group(id_recepient,id_group,page='') {
   
    var pages = page;

    $.ajax({
        url: APP_URL+'/admin/master/remove_recepient_group',
        type: "POST",
        data: {
            recepient_id : id_recepient,
            recepient_group_id : id_group
        },
        success: function (data) {
           if(pages=''){               
            $('#remove_recepient_group'+id_recepient).hide(); 
            $('#add_recepient_group'+id_recepient).show();
           }
        },
        error: function (xhr, ajaxOptions, thrownError) {
            swal("Failed", {
                icon : "error",
                buttons: false,
            });
        }
    });
}

function remove_recepient(id_recepient,id_group) {
        $('#recepientGroupDetails-tables').DataTable()
        .row( $('#recepientGroupDetails-tables tbody').parents('tr') )
        .remove()
        .draw();
        console.log(id_recepient,id_group);
        remove_recepient_group(id_recepient,id_group,'main');
    }

