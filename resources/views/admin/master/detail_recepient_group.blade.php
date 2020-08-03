
    @include('admin.layouts.breadcrumbs')
    <div class="row">    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-primary btn-round mr-3" onclick="javascript:window.location.href='{{route('admin.master.recepient_group')}}'">
                            <i class="fa fa-angle-left"></i>
                            Back
                        </button>
                        <h4 class="card-title">Detail For {{$group->recepient_group_name}}</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRecepientModal">
                            <i class="fa fa-plus"></i>
                            Add Row
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="recepientGroupDetails-tables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
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
                                <td>
                                    <div class="form-button-action">
                                        <input type="hidden" name="id_group" id="id_group" value="{{$group->id}}">
                                        <input type="hidden" name="id_recepient" id="id_recepient" value="{{$value->id}}">
                                        <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" id="removeRecepient" data-original-title="Remove">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                                <?php $i++; ?>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Add recepient to group -->
    <div class="modal fade" id="addRecepientModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1200px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Add Recepient To Group</span> 
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="recepientAll-tables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =1; ?>
                           @foreach($recepientAll as $value)
                           <tr>
                            <td>{{$i}}</td>
                           <td>{{$value->recepient_name}}</td>
                           <td>{{$value->recepient_email}}</td>
                            <td>{{$value->recepient_phone}}</td>
                            <td>{{$value->recepient_company}}</td>
                            <td>
                                <div class="form-button-action">
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Add Recepient" onclick="add_recepient_group({{$value->id}},{{$group->id}})" id="add_recepient_group{{$value->id}}">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="remove_recepient_group({{$value->id}},{{$group->id}})" id="remove_recepient_group{{$value->id}}" style="display: none">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
                            </tr>
                            <?php $i++; ?>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" onclick="window.location.reload();">Finish</button>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function () {
   $('#recepientGroupDetails-tables').DataTable({
        pageLength: 10,
    });

    $('#recepientAll-tables').DataTable({
        pageLength: 5,
    });

});

    $('#recepientGroupDetails-tables tbody').on( 'click', '#removeRecepient', function () {
        var id_recepient = $( this ).closest('td').find('#id_recepient').val();
        var id_group = $( this ).closest('td').find('#id_group').val();

        
        //remove from datatables
        $('#recepientGroupDetails-tables').DataTable()
        .row( $(this).parents('tr') )
        .remove()
        .draw();

        //remove from db
        remove_recepient_group(id_recepient,id_group,'main');
    });


</script>