@extends('admin.layouts.index')

@section('content')
<div class="page-inner">
    @include('admin.layouts.breadcrumbs')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form name="formCreateEvent" id="formCreateEvent" method="POST" enctype="multipart/form-data" action="{{route('event.createEvent')}}">
                    <div class="card-header">
                        <div class="card-title">Create Event</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="email2" class="required">Event's Name</label>
                                    <input type="text" class="form-control" id="event_name" name="event_name" placeholder="ex. Confference, Gathering, Birthday">
                                </div>
                                <div class="form-group">
                                    <label for="comment">Description</label> 
                                    <input type="text" class="form-control" id="event_description" name="event_description" placeholder="Enter event's description">
                                </div>
                                <div class="form-group">
                                    <label for="email2" class="required">Place</label>
                                    <input type="text" class="form-control" id="event_place" name="event_place" placeholder="ex. Building, Floor, Hall, Number Room">
                                </div>    
                                <div class="form-group">
                                    <label for="comment" class="required">Event Start</label> 
                                    <input type="text" class="form-control" id="event_time_start" name="event_time_start">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Poster</label>
                                    <input type="file" class="form-control-file" id="event_poster" name="event_poster">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">				
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" class="required">Event Category</label>
                                    <select class="form-control" id="event_cat_id" name="event_cat_id">
                                        <option value="">Choose Event Category</option>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label for="email2" class="required">Participant Total</label>
                                    <input type="text" class="form-control" id="event_participant_total" name="event_participant_total" placeholder="Enter participant total in number, ex.100, 2500">
                                </div>  
                                <div class="form-group">
                                    <label for="email2" class="required">City</label>
                                    <input type="text" class="form-control" id="event_city" name="event_city" placeholder="ex. Jakarta">
                                </div>
                                <div class="form-group">
                                    <label for="comment" class="required">Event End</label> 
                                    <input type="text" class="form-control" id="event_time_end" name="event_time_end">
                                </div>
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
    </div>
    @endsection