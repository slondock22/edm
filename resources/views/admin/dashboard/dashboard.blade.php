@extends('admin.layouts.index')

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="flaticon-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Recepient</p>
                                <h4 class="card-title" id="recepient_total">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="flaticon-tea-cup"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Events</p>
                                <h4 class="card-title" id="event_total">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="flaticon-profile-1"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Attendees</p>
                                <h4 class="card-title" id="attendees_total">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="flaticon-alarm-1"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Campaign</p>
                                <h4 class="card-title" id="campaign_total">0</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="card full-height">
                 <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Campaigns Statistics</div>
                        <div class="card-tools">
                            <select class="form-control btn-sm" id="campaign_id">
                                <option value="all">Choose Campaign</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="sent" data-toggle="tooltip" title=""></div>
                            <h6 class="fw-bold mt-3 mb-0">Sent</h6>
                        </div>
                         <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="opened" data-toggle="tooltip" title=""></div>
                            <h6 class="fw-bold mt-3 mb-0">Opened</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="clicked" data-toggle="tooltip" title=""></div>
                            <h6 class="fw-bold mt-3 mb-0">Clicked</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-sm-12 text-center mt-2">
                            <a href="#" id="detailCircle">Click for details </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Recepient Growth Statistics</div>
                        <div class="card-tools">
                            <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                <span class="btn-label">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                Export
                            </a>
                            <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                <span class="btn-label">
                                    <i class="fa fa-print"></i>
                                </span>
                                Print
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="min-height: 175px">
                        <canvas id="statisticsChart"></canvas>
                    </div>
                    <div id="myChartLegend"></div>
                </div>
            </div>
        </div>
    </div>
   {{--  <div class="row row-card-no-pd">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                        <h4 class="card-title">Costumer Geolocation</h4>
                        <div class="card-tools">
                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-angle-down"></span></button>
                            <button class="btn btn-icon btn-link btn-primary btn-xs btn-refresh-card"><span class="fa fa-sync-alt"></span></button>
                            <button class="btn btn-icon btn-link btn-primary btn-xs"><span class="fa fa-times"></span></button>
                        </div>
                    </div>
                    <p class="card-category">
                    Map of the distribution of users around the world</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="table-responsive table-hover table-sales">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="../assets/admin/img/flags/id.png" alt="indonesia">
                                                </div>
                                            </td>
                                            <td>Indonesia</td>
                                            <td class="text-right">
                                                2.320
                                            </td>
                                            <td class="text-right">
                                                42.18%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="../assets/admin/img/flags/us.png" alt="united states">
                                                </div>
                                            </td>
                                            <td>USA</td>
                                            <td class="text-right">
                                                240
                                            </td>
                                            <td class="text-right">
                                                4.36%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="../assets/admin/img/flags/au.png" alt="australia">
                                                </div>
                                            </td>
                                            <td>Australia</td>
                                            <td class="text-right">
                                                119
                                            </td>
                                            <td class="text-right">
                                                2.16%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="../assets/admin/img/flags/ru.png" alt="russia">
                                                </div>
                                            </td>
                                            <td>Russia</td>
                                            <td class="text-right">
                                                1.081
                                            </td>
                                            <td class="text-right">
                                                19.65%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="../assets/admin/img/flags/cn.png" alt="china">
                                                </div>
                                            </td>
                                            <td>China</td>
                                            <td class="text-right">
                                                1.100
                                            </td>
                                            <td class="text-right">
                                                20%
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flag">
                                                    <img src="../assets/admin/img/flags/br.png" alt="brazil">
                                                </div>
                                            </td>
                                            <td>Brasil</td>
                                            <td class="text-right">
                                                640
                                            </td>
                                            <td class="text-right">
                                                11.63%
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mapcontainer">
                                <div id="map-example" class="vmap"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>

{{-- MODAL DETAILS CIRCLE STATISTIC --}}
<div class="modal fade" id="detailCircleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 1200px">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                    Details</span> 
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="" id="download_excel"><button type="button" style="margin-bottom: 10px;" class="btn btn-sm btn-success text-right">Export as Excel</button></a>
                
                <div class="table-responsive">
                    <table id="detailstat-tables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>#</th>
                                {{-- <th>Campaign</th> --}}
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Sent at</th>
                                <th>Click at</th>
                                <th>Open at</th>
                            </tr>
                        </thead>
                        <tbody>
                          
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


<!-- Chart JS -->
<script src="{{asset('/assets/admin/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('/assets/admin/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('/assets/admin/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('/assets/admin/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- jQuery Vector Maps -->
{{-- <script src="{{asset('/assets/admin/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script> --}}

<!-- Atlantis JS -->
<script src="{{asset('/assets/admin/js/atlantis.min.js')}}"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
{{-- <script src="{{asset('/assets/admin/js/setting-demo.js')}}"></script> --}}
{{-- <script src="{{asset('/assets/admin/js/demo.js')}}"></script> --}}

<script>
$(document).ready(function(){
        //Get Campaign List
        $.getJSON(APP_URL+"/api/getCampaignSent", function(data) {
            // console.log(data);
            $("#campaign_id").empty();
            $("#campaign_id").append('<option value="all">Choose Campaign</option>')
            $.each(data, function(){
                $("#campaign_id").append('<option value="'+ this.campaign_id +'">'+ this.campaign_title +'</option>')
            });
        });

         $('#campaign_id').on('change', function() {
           getCircleStat(this.value);
        });
  
         getTopStat();
         getCircleStat('all');
});
//End Document Ready
//
       //Notify
        $.notify({
            icon: 'flaticon-alarm-1',
            title: 'Hello!',
            message: 'Welcome back to EO Manager',
        },{
            type: 'info',
            placement: {
                from: "bottom",
                align: "right"
            },
            time: 1000,
        });

        
        $('#detailCircle').on('click', function(event) {
            event.preventDefault();
            /* Act on the event */
            var campaign_id = $('#campaign_id').val();
            console.log(campaign_id);

            //download excell
            $('#download_excel').attr("href","");
            var url = APP_URL + '/admin/dashboard/downloadStatistic/'+campaign_id;
            $('#download_excel').attr("href",url);

            //load table detail
            tableDetail(campaign_id);
            
            $('#detailCircleModal').modal('show');
        });


         function getTopStat(){
              var url = APP_URL + '/admin/dashboard/topStatistic';
              $.get(url, function (data){

                  $("#recepient_total").html(data.recepient);
                  $("#event_total").html(data.event);
                  $("#attendees_total").html(data.attendees);
                  $("#campaign_total").html(data.campaign);
              });
          }

       
        function getCircleStat(id_campaign=''){
            var campaign = id_campaign;
            var url = APP_URL + '/admin/dashboard/circleStatistic/'+campaign;
              $.get(url, function (data){
                    $('#sent').tooltip('dispose').tooltip({title: data.sent_time});
                    $('#clicked').tooltip('dispose').tooltip({title: data.click_time});
                    $('#opened').tooltip('dispose').tooltip({title: data.open_time});

            		Circles.create({
            			id:'sent',
            			radius:45,
            			value:data.sent_time,
            			maxValue:data.total_recepient,
            			width:7,
            			text: convertNum(data.sent_time),
            			colors:['#f1f1f1', '#FF9E27'],
            			duration:400,
            			wrpClass:'circles-wrp',
            			textClass:'circles-text',
            			styleWrapper:true,
            			styleText:true
            		})

            		Circles.create({
            			id:'clicked',
            			radius:45,
            			value:data.click_time,
            			maxValue:data.total_recepient,
            			width:7,
            			text: convertNum(data.click_time),
            			colors:['#f1f1f1', '#2BB930'],
            			duration:400,
            			wrpClass:'circles-wrp',
            			textClass:'circles-text',
            			styleWrapper:true,
            			styleText:true
            		})

            		Circles.create({
            			id:'opened',
            			radius:45,
            			value:data.open_time,
            			maxValue:data.total_recepient,
            			width:7,
            			text: convertNum(data.open_time),
            			colors:['#f1f1f1', '#F25961'],
            			duration:400,
            			wrpClass:'circles-wrp',
            			textClass:'circles-text',
            			styleWrapper:true,
            			styleText:true
            		})
              });
        }



		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});



        var ctx = document.getElementById('statisticsChart').getContext('2d');

        var statisticsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [ 

                {
                    label: "Active Users",
                    borderColor: '#177dff',
                    pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
                    pointRadius: 0,
                    backgroundColor: 'rgba(23, 125, 255, 0.4)',
                    legendColor: '#177dff',
                    fill: true,
                    borderWidth: 2,
                    data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900]
                }
                ]
            },
            options : {
                responsive: true, 
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    bodySpacing: 4,
                    mode:"nearest",
                    intersect: 0,
                    position:"nearest",
                    xPadding:10,
                    yPadding:10,
                    caretPadding:10
                },
                layout:{
                    padding:{left:5,right:5,top:15,bottom:15}
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontStyle: "500",
                            beginAtZero: false,
                            maxTicksLimit: 5,
                            padding: 10
                        },
                        gridLines: {
                            drawTicks: false,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            zeroLineColor: "transparent"
                        },
                        ticks: {
                            padding: 10,
                            fontStyle: "500"
                        }
                    }]
                }, 
                legendCallback: function(chart) { 
                    var text = []; 
                    text.push('<ul class="' + chart.id + '-legend html-legend">'); 
                    for (var i = 0; i < chart.data.datasets.length; i++) { 
                        text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
                        if (chart.data.datasets[i].label) { 
                            text.push(chart.data.datasets[i].label); 
                        } 
                        text.push('</li>'); 
                    } 
                    text.push('</ul>'); 
                    return text.join(''); 
                }  
            }
        });

        var myLegendContainer = document.getElementById("myChartLegend");

        // generate HTML legend
        myLegendContainer.innerHTML = statisticsChart.generateLegend();

        // bind onClick event to all LI-tags of the legend
        var legendItems = myLegendContainer.getElementsByTagName('li');
        for (var i = 0; i < legendItems.length; i += 1) {
            legendItems[i].addEventListener("click", legendClickCallback, false);
        }

        function tableDetail(id_campaign){
            $('#detailstat-tables').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                pageLength: 10,
                destroy:true,
                order: [ [0, 'desc'] ],
                ajax: APP_URL+"/admin/dashboard/detailStatistic/"+id_campaign,
                columns: [
                    {
                        data: 'id',
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    // {
                    //     data: 'campaign_title'
                    // },
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
                    {
                        data: 'sent_time_at'
                    },
                    {
                        data: 'click_time_at'
                    },
                    {
                        data: 'open_time_at'
                    },

                ]

            });
        }

function convertNum (labelValue) 
{
    // Nine Zeroes for Billions
    return Math.abs(Number(labelValue)) >= 1.0e+9

    ? Math.round(Math.abs(Number(labelValue)) / 1.0e+9 * 1) / 1 + "B"
    // Six Zeroes for Millions 
    : Math.abs(Number(labelValue)) >= 1.0e+6

    ? Math.round(Math.abs(Number(labelValue)) / 1.0e+6 * 1) / 1 + "M"
    // Three Zeroes for Thousands
    : Math.abs(Number(labelValue)) >= 1.0e+3

    ? Math.round(Math.abs(Number(labelValue)) / 1.0e+3 * 1) / 1 + "K"

    : Math.abs(Number(labelValue));
}

// function download_excel(){

// var campaign_id = $('#campaign_id').val();

//     swal({
//         title: 'Are you sure?',
//         text: "To export this detail into excel?",
//         icon: 'warning',
//         buttons:{
//             cancel: {
//                 visible: true,
//                 text : 'No, cancel!',
//                 className: 'btn btn-danger'
//             },                  
//             confirm: {
//                 text : 'Yes, sure!',
//                 className : 'btn btn-success'
//             }
//         }
//     }).then((willDelete) => {
//         if (willDelete) {   
//             $.ajax({
//                 url: APP_URL+'/admin/dashboard/downloadStatistic',
//                 type: "GET",
//                 data: {
//                     id_campaign: campaign_id,
//                 },
//                 success: function (data) {
//                    swal("Success", {
//                         icon : "success",
//                         buttons: false,
//                     });
//                 },
//                 error: function (xhr, ajaxOptions, thrownError) {
//                     swal("Failed", {
//                         icon : "error",
//                         buttons: false,
//                     });
//                 }
//             });
//         } 
//     });
// }

</script>
    
@endsection