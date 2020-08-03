
    @include('admin.layouts.breadcrumbs')
    <div class="row">    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                    <h4 class="card-title">Broadcast Detail For {{$event->event_name}}</h4>
                    <button class="btn btn-primary btn-round ml-auto" onclick="javascript:window.location.href='{{route('admin.broadcast.list')}}'">
                            <i class="fa fa-angle-left"></i>
                            Back
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="broadcastDetail-tables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Sent</th>
                                    <th>At</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i =1; ?>
                               @foreach($recepient as $value)
                               <tr>
                                <td>{{$i}}</td>
                               <td>{{$value->recepient_name}}</td>
                               <td>{{$value->recepient_email}}</td>
                                <td>{{$value->recepient_phone}}</td>
                                <td>{{$value->recepient_company}}</td>
                                <td>{{$value->broadcast_time}}</td>
                                <td>{{$value->broadcast_time_at}}</td>
                                <td>
                                    <div class="form-button-action">
                                        <button type="button" data-toggle="tooltip" title="Sent Broadcast"  onclick="broadcast({{$value->id}},'')" class="btn btn-link btn-info btn-lg" data-original-title="View">
                                                <i class="fa fa-paper-plane"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task" data-toggle="modal" data-target="#EditModal{{$value->id }}">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                                <?php $i++; ?>

                                	<!-- Modal -->
                                    <div class="modal fade" id="EditModal{{$value->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        New</span> 
                                                        <span class="fw-light">
                                                            Row
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group form-group-default">
                                                                    <label>Name</label>
                                                                    <input id="addName" type="text" class="form-control" placeholder="fill name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 pr-0">
                                                                <div class="form-group form-group-default">
                                                                    <label>Position</label>
                                                                    <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group form-group-default">
                                                                    <label>Office</label>
                                                                    <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script>
$(document).ready(function () {
    $('#broadcastDetail-tables').DataTable({
        pageLength: 10,
    });

    $('#EditModalRecepient').click(function() {
        $('#EditModal').modal('show');

      var id=$(this).data('id');

      alert(id);
      var action ='{{URL::to('class_routine')}}/'+id;


      var url = '{{URL::to('class_routine')}}';
      $.ajax({
        type : 'get',
        url  : url,
        data : {'id':id},
        success:function(data){
          $('#id').val(data.id);
          $('.class-id').val(data.class_id);
          $('.subject_id').val(data.subject_id);
          $('.day_of_week').val(data.day_of_week);
          $('.teacher_id').val(data.teacher_id);
          $('.start_time').val(data.start_time);
          $('.end_time').val(data.end_time);
          $('.classFormUpdate').attr('action',action);
          $('#editModal').modal('show');
        }
      });
    });

});

</script>