<!DOCTYPE html>
<html lang="en" class="no-js">
    <!-- START: Header -->
        <div include-html="inc/header.html"></div>
    <!-- END: Header -->


    <body class="page-header-fixed page-quick-sidebar-over-content page-style-square">


        <!-- START: NavBar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Image and text -->
    <a class="navbar-brand" href="#">
        <img src="assets/img/logo.png?123123" width="120" class="d-inline-block align-top" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


</nav>
        <!-- END: NavBar -->



            <!-- START: Sidebar -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <h3 class="page-title">
                        HITOS | requests
                    </h3>

                    <!-- START: Page Here -->
                    <div class="row">
                        @if (session()->has('task_completed'))
                        <div class="" style="color: green">
                            {{ session()->get('task_completed') }}
                        </div>
                        @endif
                    </div>
                        <!-- START: Body Model -->
 <!-- END: Body Mode

<!-- ------------------------------------------------------------------------------------------------------------ -->
 <!-- START: request Content -->
 <div class="col-6">
     <!-- START: Tabs -->
         <span include-html="inc/tabs.html"></span>
     <!-- START: Tab
     <div class="tab-content" id="myTabContent">
         <!-- START: Anamnese Tab -->
    <div class="tab-pane fade active in show" id="anamnese" role="tabpanel" aria-labelledby="anamnese-tab">
     <!-- Create Anamnese Form -->
     <h3>Create Anamnese Form</h3>
     <button type="button" parm_id="$group['id']" class="create btn btn-info" item_name="users-custom-field" onClick="get_parameters(this)" data-toggle="modal" data-target="#create-update-custom-fields-group-modal"><i class="material-icons">add</i> Create Form Section</button>
     <a href="{{ route('logout') }}">logout</a>

















































































{{-- ================================================================================================================= --}}
{{-- ============================================ Travel Request Table ============================================--}}
     <div class="row">
         <div class="col-md-12">
             <div class="card">
                 <!-- Card Header -->
                 <div class="card-header card-header-success">
                     <div class="row">
                         <div class="col">
                             <h4 class="card-title ">Travel Requests Information</h4>
                             <p class="card-category"> Here is a subtitle for this table</p>
                         </div>

                     </div>
                 </div>

                 <!-- Card Body -->
                 <div class="card-body">
                    @if (session()->has('message'))
                    <div class="" style="color: green">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                     <table class="table dataTable">
                             <tr>
                                 <th style="min-width:100px;">id</th>
                                 <th style="min-width:100px;">case id</th>
                                 <th style="min-width:100px;">patient name</th>
                                 <th style="min-width:100px;">Medical center</th>
                                 <th style="min-width:150px;">Reason</th>
                                 <th style="min-width:150px;">is urgent</th>
                                 <th style="min-width:150px;">Need oxygen</th>
                                 <th style="min-width:150px;">Need chair</th>
                                 @if ($type == 4 || $type == 3)
                                 <th style="min-width:150px;">Hospital Salary</th>
                                 @endif
                                 <th style="min-width:150px;">Actions</th>
                             </tr>
                         <tbody>
                             {{--===================== german doctor ============================== --}}
                            @if ($type == 2)

                                @foreach ($requests  as $request)
                                    @if ($request->is_accepted != -1 && $request->is_accepted != 2){{-- -1 Denied / 2 Accepted by secertary--}}
                                    <tr>
                                        <td>{{$request->id}}</td>
                                        <td>{{$request->case_id}}</td>
                                        <td> {{DB::table('users')->where('id', $request->patient_id)->value('name')}} </td>
                                        <td> {{DB::table('medical_centers')->where('id', $request->medical_center_id)->value('name')}} </td>
                                        <td>{{$request->reason}}</td>
                                        <td>{{$request->is_urgent==1?'yes':'no'}}</td>
                                        <td>{{$request->oxygen==1?'yes':'no'}}</td>
                                        <td>{{$request->chair==1?'yes':'no'}}</td>
                                        <td>

                                            @if ($request->is_accepted == 1)
                                            Request Sent to secertary
                                            @elseif ($request->is_accepted == 2)
                                            Paid and sent to airline office
                                            @elseif ($request->is_accepted == 3)
                                            Patient on his way to you <br>
                                            <a href="{{ route('travel.delete',['id'=>$request->id]) }}" class="btn btn-warning btn-sm btn-just-icon"><i style="color: red" class="material-icons">D</i></a>
                                            @else
                                            <a href="{{ route('travel.accept',['id'=>$request->id]) }}" class="btn btn-warning btn-sm btn-just-icon"><i style="color: green" class="material-icons">A</i></a>
                                            <a href="{{ route('travel.denied',['id'=>$request->id]) }}" class="btn btn-warning btn-sm btn-just-icon"><i style="color: red" class="material-icons">D</i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                             @endif
                                     {{-- ================================================================= --}}



                               {{--======================= patient  ============================== --}}
                            @if ($type == 3)

                            @foreach ($requests  as $request)
                                <tr>
                                    <td>{{$request->id}}</td>
                                    <td>{{$request->case_id}}</td>
                                    <td> {{DB::table('users')->where('id', $request->patient_id)->value('name')}} </td>
                                    <td> {{DB::table('medical_centers')->where('id', $request->medical_center_id)->value('name')}} </td>
                                    <td>{{$request->reason}}</td>
                                    <td>{{$request->is_urgent==1?'yes':'no'}}</td>
                                    <td>{{$request->oxygen==1?'yes':'no'}}</td>
                                    <td>{{$request->chair==1?'yes':'no'}}</td>
                                    <td>{{$request->payment_amount==null?'Not Set Yet': $request->payment_amount }}</td>
                                    <td>
                                    @if ($request->payed == null)
                                        @if ($request->is_accepted == 1 && $request->payment_amount==null)
                                        Accepted by dr, waiting Salary set
                                        @elseif ($request->is_accepted == 1 && $request->payment_amount!=null)
                                        <a href="{{ route('travel.payment.view',['id'=>$request->id,'amount'=>$request->payment_amount]) }}" class="btn btn-warning btn-sm btn-just-icon">
                                            <i style="color: yellow" class="material-icons">P</i></a>
                                        @endif
                                          @elseif ($request->is_accepted >= 2)

                                           {{$request->is_accepted == 3? 'patient on his way':'Sent to airline office'  }}
                                          <a href="{{ route('travel.bill.download',['id'=>$request->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
                                            <i style="color: yellow" class="material-icons">B</i></a> {{-- Download bill --}}

                                            <a href="{{ route('travel.delete',['id'=>$request->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
                                                <i style="color: red" class="material-icons">D</i></a>{{-- Delete --}}

                                          @elseif ($request->is_accepted == -1)
                                          Request is Denied
                                          @else
                                          Request sent
                                    @endif


                                    </td>
                                </tr>
                                @endforeach
                         @endif
                          {{-- ================================================================= --}}



                {{--===================== secretary  ============================== --}}
                                 {{-- if secretary --}}
                    @if ($type == 4)
                         @foreach ($requests  as $request)
                            @if ($request->is_accepted == 1)
                            <tr>
                            <form action="{{ route('travel.salary') }}" method="POST">
                                @csrf
                                <td>{{$request->id}}</td>
                                <td>{{$request->case_id}}</td>
                                <td> {{DB::table('users')->where('id', $request->patient_id)->value('name')}} </td>
                                <td> {{DB::table('medical_centers')->where('id', $request->medical_center_id)->value('name')}} </td>
                                <td>{{$request->reason}}</td>
                                <td>{{$request->is_urgent==1?'yes':'no'}}</td>
                                <td>{{$request->oxygen==1?'yes':'no'}}</td>
                                <td>{{$request->chair==1?'yes':'no'}}</td>

                                @if ($request->payment_amount == null)
                                <td><input type="number" name="salary" placeholder="enter salary amount"></td>
                                <span style="color: red">@error('salary'){{ $message }}@enderror</span>
                                <input type="hidden" name="id" value="{{ $request->id }}">
                                @else
                                <td>{{$request->payment_amount}}</td>
                                @endif

                                <td>
                                    @if ($request->payment_amount== null)
                                    <button type="submit" >Send To User</button>
                                    @else
                                        @if ($request->payed == 1)
                                        <a href="{{ route('travel.to.AirlineOffice',['id'=>$request->id]) }}" class="btn btn-warning btn-sm btn-just-icon"><i style="color:blue" class="material-icons">S</i></a>
                                        @else
                                        Waiting for payment
                                        @endif
                                    @endif

                                </td>
                            </form>
                            </tr>
                            @endif
                        @endforeach
                    @endif
                             {{-- ================================================================= ========================--}}
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>


     </div>




{{-- =============================================================================================================== --}}
{{-- ================================================================================================================ --}}
 {{-- ==================================== AIRLINE TABLE ========================================================== --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- Card Header -->
            <div class="card-header card-header-success">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title ">Airline trip Information</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>

                </div>
            </div>

            {{-- Success --}}
            <div class="card-body">
               @if (session()->has('message2'))
               <div class="" style="color: green">
                   {{ session()->get('message2') }}
               </div>
               @endif

               {{-- Errors --}}
               <div class="card-body">
                @if (session()->has('error'))
                <div class="" style="color: red">
                    {{ session()->get('error') }}
                </div>
                @endif
                <table class="table dataTable">
                        <tr>
                            <th style="min-width:100px;">id</th>
                            <th style="min-width:100px;">case id</th>
                            <th style="min-width:100px;">patient name</th>
                            @if ($type != 2)
                            <th style="min-width:100px;">patient number</th>
                            <th style="min-width:100px;">doctor name</th>
                            @endif
                            <th style="min-width:100px;">Medical center</th>
                            <th style="min-width:150px;">From country</th>
                            <th style="min-width:150px;">From city </th>
                            <th style="min-width:150px;">To country </th>
                            <th style="min-width:150px;">To city </th>
                            <th style="min-width:150px;">Special Needs</th>
                            <th style="min-width:150px;">Arrival date</th>
                            <th style="min-width:150px;">Arrival time</th>
                            <th style="min-width:150px;">Departure date</th>
                            <th style="min-width:150px;">Departure time</th>
                            <th style="min-width:150px;">Actions</th>
                        </tr>
                    <tbody>
                                                {{--===================== German Doctor  ============================== --}}
                        @if ($type == 2)
                           @foreach ($trips  as $trip)
                               <tr>
                                   <td>{{$trip->id}}</td>
                                   <td>{{$trip->case_id}}</td>
                                   <td> {{DB::table('users')->where('id', $trip->patient_id)->value('name')}} </td>
                                   <td> {{DB::table('medical_centers')->where('id', $trip->medical_center_id)->value('name')}} </td>
                                   <td> {{DB::table('locations_countries')->where('id', $trip->from_country_id)->value('name')}}</td>
                                   <td> {{DB::table('locations_cities')->where('id', $trip->from_city_id)->value('name')}}</td>
                                   <td> {{DB::table('locations_countries')->where('id', $trip->to_country_id)->value('name')}}</td>
                                   <td> {{DB::table('locations_cities')->where('id', $trip->to_city_id)->value('name')}}</td>
                                   <td>{{$trip->special_needs}}</td>
                                   <td>{{$trip->arrival_date==null?'Not set yet':$trip->arrival_date}}</td>
                                   <td>{{$trip->arrival_time==null?'Not set yet':$trip->arrival_time}}</td>
                                   <td>{{$trip->departure_date==null?'Not set yet':$trip->departure_date}}</td>
                                   <td>{{$trip->departure_time==null?'Not set yet':$trip->departure_time}}</td>
                                   <td>

                                       @if ($trip->is_ready == 1)
                                       Airline Trip is Ready
                                       @elseif ($trip->is_ready == 2)
                                       Traveled
                                       @else
                                       Waiting for setting Airline trip time
                                       @endif
                                   </td>
                               </tr>
                         @endforeach
                     @endif

                                   {{--===================== Secretary/ City Admin  ============================== --}}

                     @if ($type == 4 || $type==5)
                     @foreach ($trips  as $trip)
                         <tr>
                             <td>{{$trip->id}}</td>
                             <td>{{$trip->case_id}}</td>
                             <td> {{DB::table('users')->where('id', $trip->patient_id)->value('name')}} </td>
                             <td> {{DB::table('users')->where('id', $trip->patient_id)->value('mobile')}} </td>
                             <td> {{DB::table('users')->where('id', $trip->doctor_id)->value('name')}} </td>
                             <td> {{DB::table('medical_centers')->where('id', $trip->medical_center_id)->value('name')}} </td>
                             <td> {{DB::table('locations_countries')->where('id', $trip->from_country_id)->value('name')}}</td>
                             <td> {{DB::table('locations_cities')->where('id', $trip->from_city_id)->value('name')}}</td>
                             <td> {{DB::table('locations_countries')->where('id', $trip->to_country_id)->value('name')}}</td>
                             <td> {{DB::table('locations_cities')->where('id', $trip->to_city_id)->value('name')}}</td>
                             <td>{{$trip->special_needs}}</td>
                             <td>{{$trip->arrival_date==null?'Not set yet':$trip->arrival_date}}</td>
                             <td>{{$trip->arrival_time==null?'Not set yet':$trip->arrival_time}}</td>
                             <td>{{$trip->departure_date==null?'Not set yet':$trip->departure_date}}</td>
                             <td>{{$trip->departure_time==null?'Not set yet':$trip->departure_time}}</td>
                             <td>

                                 @if ($trip->is_ready == 1)
                                 Airline Trip is Ready
                                 @elseif ($trip->is_ready == 2)
                                 Traveled
                                 @else
                                 Waiting for setting Airline trip time
                                 @endif
                             </td>
                         </tr>
                   @endforeach
               @endif

                                          {{--===================== Airline Office  ============================== --}}

                @if ($type == 6)
                @foreach ($trips  as $trip)
                  <form action="{{ route('travel.request.accept') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <tr>
                        <td>{{$trip->id}}</td>
                        <td>{{$trip->case_id}}</td>
                        <td> {{DB::table('users')->where('id', $trip->patient_id)->value('name')}} </td>
                        <td> {{DB::table('users')->where('id', $trip->patient_id)->value('mobile')}} </td>
                        <td> {{DB::table('users')->where('id', $trip->doctor_id)->value('name')}} </td>
                        <td> {{DB::table('medical_centers')->where('id', $trip->medical_center_id)->value('name')}} </td>
                        <td> {{DB::table('locations_countries')->where('id', $trip->from_country_id)->value('name')}}</td>
                        <td> {{DB::table('locations_cities')->where('id', $trip->from_city_id)->value('name')}}</td>
                        <td> {{DB::table('locations_countries')->where('id', $trip->to_country_id)->value('name')}}</td>
                        <td> {{DB::table('locations_cities')->where('id', $trip->to_city_id)->value('name')}}</td>
                        <td>{{$trip->special_needs}}</td>
                        <td>@if($trip->arrival_date==null)<input type="date" name="arrival_date" >@else{{ $trip->arrival_date }}@endif</td>
                        <td>@if($trip->arrival_time==null)<input type="time" name="arrival_time" >@else{{ $trip->arrival_time }}@endif</td>
                        <td>@if($trip->departure_date==null)<input type="date" name="departure_date" >@else{{ $trip->departure_date }}@endif</td>
                        <td>@if($trip->departure_time==null)<input type="time" name="departure_time" >@else{{ $trip->departure_time }}@endif</td>

                        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                        <input type="hidden" name="request_id" value="{{ $trip->request_id }}">

                        <td>
                            @if ($trip->is_ready == 0 )
                            {{-- Accept --}}
                              <button class="btn btn-warning btn-sm btn-just-icon" type="submit"><i style="color:green" class="material-icons">A</i></button>
                            @elseif ($trip->is_ready == 1)
                            Accepted
                            <a href="{{ route('travel.traveled',['id'=>$trip->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
                              <i style="color:green" class="material-icons">T</i></a>
                            @elseif ($trip->is_ready == 2)
                            Traveled
                            @endif
                        </td>
                    </tr>
              @endforeach
          </form>
          @endif

                              {{--===================== Patient  ============================== --}}

                              @if ($type == 3)
                              @foreach ($trips  as $trip)
                                  <tr>
                                      <td>{{$trip->id}}</td>
                                      <td>{{$trip->case_id}}</td>
                                      <td> {{DB::table('users')->where('id', $trip->patient_id)->value('name')}} </td>
                                      <td> {{DB::table('users')->where('id', $trip->patient_id)->value('mobile')}} </td>
                                      <td> {{DB::table('users')->where('id', $trip->doctor_id)->value('name')}} </td>
                                      <td> {{DB::table('medical_centers')->where('id', $trip->medical_center_id)->value('name')}} </td>
                                      <td> {{DB::table('locations_countries')->where('id', $trip->from_country_id)->value('name')}}</td>
                                      <td> {{DB::table('locations_cities')->where('id', $trip->from_city_id)->value('name')}}</td>
                                      <td> {{DB::table('locations_countries')->where('id', $trip->to_country_id)->value('name')}}</td>
                                      <td> {{DB::table('locations_cities')->where('id', $trip->to_city_id)->value('name')}}</td>
                                      <td>{{$trip->special_needs}}</td>
                                      <td>{{$trip->arrival_date==null?'Not set yet':$trip->arrival_date}}</td>
                                      <td>{{$trip->arrival_time==null?'Not set yet':$trip->arrival_time}}</td>
                                      <td>{{$trip->departure_date==null?'Not set yet':$trip->departure_date}}</td>
                                      <td>{{$trip->departure_time==null?'Not set yet':$trip->departure_time}}</td>
                                      <td>

                                          @if ($trip->is_ready == 1)
                                          Airline Trip is Ready
                                          @elseif ($trip->is_ready == 2)
                                          Traveled
                                          @else
                                          <a href="{{ route('travel.filesNeeded',['id'=>$trip->id,'type'=>'parent']) }}" class="btn btn-warning btn-sm btn-just-icon">
                                            <i style="color:red" class="material-icons">Files</i></a>

                                            <a href="{{ route('travel.filesNeeded',['id'=>$trip->id,'type'=>'child']) }}" class="btn btn-warning btn-sm btn-just-icon">
                                                <i style="color:red" class="material-icons">Add passenger</i></a>
                                          @endif
                                      </td>
                                  </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


{{-- =============================================================================================================== --}}
{{-- ================================================================================================================ --}}
 {{-- ==================================== Trip Files TABLE ========================================================== --}}
 @if ($type == 3 || $type == 6)
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- Card Header -->
            <div class="card-header card-header-success">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title ">Airline Trip Files</h4>
                        <p class="card-category"> Here is a subtitle for this table</p>
                    </div>

                </div>
            </div>

            {{-- Success --}}
            <div class="card-body">
               @if (session()->has('message4'))
               <div class="" style="color: green">
                   {{ session()->get('message4') }}
               </div>
               @endif

               {{-- Errors --}}
               <div class="card-body">
                @if (session()->has('error2'))
                <div class="" style="color: red">
                    {{ session()->get('error2') }}
                </div>
                @endif
                <table class="table dataTable">
                        <tr>
                            <th style="min-width:100px;">id</th>
                            <th style="min-width:100px;">trip id</th>
                            <th style="min-width:100px;">name</th>
                            <th style="min-width:100px;">Phone</th>
                            <th style="min-width:100px;">passengers</th>
                            <th style="min-width:100px;">parent ID</th>
           @if ($type == 3) <th style="min-width:100px;">Note</th> @endif
                            <th style="min-width:150px;">Actions</th>
                        </tr>
                    <tbody>

           {{--===================== Patient  ============================== --}}
           @if ($type == 3)
           @foreach ($files  as $file)
               <tr>
                   <td>{{$file->id}}</td>
                   <td>{{$file->trip_id}}</td>
                   <td>{{$file->name}}</td>
                   <td>{{$file->phone}}</td>
                   <td>{{$file->passengers}}</td>
                   <td>{{$file->parent_id==null?'Parent':$file->parent_id}}</td>
                   <td>{{$file->note}}</td>
                   <td>
                       @if ($file->is_accepted == 1)
                       Accepted
                       @elseif ($file->is_accepted <= 0 ) {{-- 0 = not accepted yet / -1 = declined --}}
                       {{ $file->is_accepted == -1?'denied':'Not accepted yet' }} <br>

                       <a href="{{ route('travel.file.info',['id'=>$file->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
                        <i style="color:blue" class="material-icons">Edit file</i></a>

                        <a href="{{ route('travel.file.delete',['id'=>$file->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
                            <i style="color:blue" class="material-icons">Delete file</i></a>
                       @endif
                   </td>
               </tr>
         @endforeach
     @endif


           {{--===================== Airline office  ============================== --}}
           @if ($type == 6)
           @foreach ($files  as $file)
               <tr>
                   <td>{{$file->id}}</td>
                   <td>{{$file->trip_id}}</td>
                   <td>{{$file->name}}</td>
                   <td>{{$file->phone}}</td>
                   <td>{{$file->passengers}}</td>
                   <td>{{$file->parent_id==null?'Parent':$file->parent_id}}</td>
                   <td>
                       @if ($file->is_accepted == 1)
                       Accepted
                       @elseif ($file->is_accepted == 0 || $file->is_accepted == -1 ) {{-- 0 = not accepted yet / -1 = declined --}}
                       {{ $file->is_accepted == -1?'denied':'Not accepted yet' }} <br>

                       <a href="{{ route('travel.file.info',['id'=>$file->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
                        <i style="color:red" class="material-icons">Show files</i></a>

                        <a href="{{ route('travel.file.accept',['id'=>$file->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
                            <i style="color:green" class="material-icons">Accept file</i></a>
                       @endif
                   </td>
               </tr>
         @endforeach
     @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 @endif






















































































<!-- -----------------------------------------------------------------------------------------------------------

                    <!-- END: Page Here -->

                </div>
            </div>

            <!-- START QUICK SIDEBAR -->
                 @include('components.sidebar')
            <!-- END QUICK SIDEBAR -->

        </div>
    </body>

    <!-- START: Footer -->
        <div include-html="inc/footer.html"></div>
    <!-- START: Footer -->

    <!-- START: Scripts -->
        <!-- <script src="assets/plugins/jquery.min.js" type="text/javascript"></script> -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- <script src="assets/plugins/jquery-migrate.min.js" type="text/javascript"></script> -->
        <script src="https://code.jquery.com/jquery-migrate-3.3.2.min.js" integrity="sha256-Ap4KLoCf1rXb52q+i3p0k2vjBsmownyBTE1EqlRiMwA=" crossorigin="anonymous"></script>
        <!-- <script src="assets/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script> -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <!-- <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>

        <script src="assets/js/metronic.js" type="text/javascript"></script>
        <script src="assets/js/layout.js" type="text/javascript"></script>
        <script src="assets/js/quick-sidebar.js" type="text/javascript"></script>
        <script src="assets/js/demo.js" type="text/javascript"></script>
        <script src="assets/js/dataTable.js" type="text/javascript"></script>
        <script src="inc/scripts.js" type="text/javascript"></script>

        <script>
            jQuery(document).ready(function() {
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
                QuickSidebar.init(); // init quick sidebar
                Demo.init(); // init demo features
                TableAdvanced.init();
                ComponentsDropdowns.init();
            });
            document.getElementById('pageloader').style.display = 'none';
        </script>

    <!-- END: Scripts -->

    <!-- START: Modals-->
        <div include-html="inc/modals.html"></div>
    <!-- END: Modals-->
</html>

<script>
    includeHTML();
    function includeHTML() {
      var z, i, elmnt, file, xhttp;
      /*loop through a collection of all HTML elements:*/
      z = document.getElementsByTagName("*");
      for (i = 0; i < z.length; i++) {
        elmnt = z[i];
        /*search for elements with a certain atrribute:*/
        file = elmnt.getAttribute("include-html");
        if (file) {
          /*make an HTTP request using the attribute value as the file name:*/
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
              if (this.status == 200) {elmnt.innerHTML = this.responseText;}
              if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
              /*remove the attribute, and call this function once more:*/
              elmnt.removeAttribute("include-html");
              includeHTML();
            }
          }
          xhttp.open("GET", file, true);
          xhttp.send();
          /*exit the function:*/
          return;
        }
      }
    };
</script>

