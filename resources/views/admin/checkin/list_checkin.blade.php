@extends('admin.layouts.index')

@section('content')
<div class="page-inner">
    @include('admin.layouts.breadcrumbs')
    <div class="row">    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Attendee List</h4>
                        <button class="btn btn-primary btn-round ml-auto" onclick="javascript:window.location.href='{{route('admin.register.create')}}'">
                                <i class="fa fa-plus"></i>
                                Register Manually
                            </button>
                        <button class="btn btn-warning btn-round" style="margin-left:10px;" onclick="javascript:ticket('1','all')">
                                <i class="fa fa-file"></i>
                                Send Ticket To All
                            </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="checkin-tables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Attendance Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Ticket Status / Times</th>
                                    <th>Checkin at</th>
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
<script src="//js.pusher.com/3.1/pusher.min.js"></script>

<script type="text/javascript">
    var notificationsCount = 0;

    var pusher = new Pusher('8efdf5378ac56a2f15e2', {
        encrypted: true,
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('cmofficer');
      
    channel.bind('App\\Events\\coffeeMorningOfficer', function(data) {
        // swal("Congratulation", 'Selamat datang Mr./Ms. ' + data['cmname'] + ' ('+ data['cmemail'] +')', "success");
        swal(data['cmmsgtitle'], data['cmmsg'], data['cmmsgicon']);
        setTimeout( 
                function() {
                    window.location.reload(true);
                }, 1500);
    });

    

</script>
@endsection