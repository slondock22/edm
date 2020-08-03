<link rel="stylesheet" href="https://www.trade2gov.com/coffee-morning/assets/landing/css/bootstrap.css" media="all" />

<div>
    <div class="row">
        <div>
          <div class="card">
            <div class="card-body">
                <div class="row p-4" style="margin-bottom: -70px;">
                  <div class="col-md-6">
                      <img src="{{asset('/assets/landing/images/logo_transparant.png')}}" style="height: auto;">
                  </div>

                  <div class="col-md-6" style="text-align: right;">
                      <p class="font-weight-bold mb-1">ELECTRONIC TICKET</p>
                  <p class="text-muted">Coffee Morning IT Inventory Invent2 2019</p>
                  </div>
                </div>

                <hr>
                {{-- <div class="row">
                  <div class="col-md-12 text-center">
                      <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(300)->generate($attendance_qr_code)) }} ">
                  </div>
                </div> --}}
                <table border="1" width="100%">
                  <tr>
                    <td>
                      <div class="row" style="margin-bottom:-130px">  
                        <div class="col-md-8" style="margin-left:20px; margin-top:20px;">
                          <table style="font-size: 13px;" width="70%" border="0">
                            <tr>
                              <th colspan="3" style="padding-bottom: 10px;">Invitation Detail</th>
                            </tr>
                            <tr>
                              <td>Name</td>
                              <td align="center">:</td>
                            <td>{{$name}}</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td align="center">:</td>
                            <td>{{$email}}</td>
                            </tr>
                            <tr>
                              <td>Phone</td>
                              <td align="center">:</td>
                            <td>{{$phone}}</td>
                            </tr>
                            <tr>
                              <td>Company</td>
                              <td align="center">:</td>
                              <td>{{$company}}</td>
                            </tr>
                          </table>
                          <br>
                          <table style="font-size: 13px;" width="100%" border="0" style="margin-top:20px;">
                              <tr>
                                <th colspan="3" style="padding-bottom: 10px;">Event Detail</th>
                              </tr>
                              <tr>
                                <td>Location</td>
                                <td align="center">:</td>
                              <td>Holiday Inn Hotel Kemayoran</td>
                              </tr>
                              <tr>
                                <td>Address</td>
                                <td align="center">:</td>
                              <td>Jl. Griya Utama, Sunter Agung, Kota Jakarta Utara, <br> Daerah Khusus Ibukota Jakarta 14350 </td>
                              </tr>
                              <tr>
                                <td>Date</td>
                                <td align="center">:</td>
                              <td>Tuesday, September 24th, 2019</td>
                              </tr>
                              <tr>
                                <td>Time</td>
                                <td align="center">:</td>
                                <td>09.00 AM to 12.30 PM (WIB)</td>
                              </tr>
                            </table>
                        </div>
                        <div class="col-md-4 text-right">
                            <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(220)->generate($attendance_qr_code)) }} ">
                        </div>
                      </div>
                    </td>
                  </tr>
                </table>
{{--  
                <div class="col-md-12 text-white" style="background-color: #1767B3; bottom: 0px; position: fixed; width: 85%; font-size: 12px;">
                    Jika anda membutuhkan bantuan, hubungi kami di E-mail: pelanggan@indonesiaferry.co.id | Tel: (021) 191
                </div> --}}

            </div>
          </div>
        </div>
    </div>
</div>
