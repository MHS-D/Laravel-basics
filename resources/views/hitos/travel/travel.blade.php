<!DOCTYPE html>
<html lang="en" class="no-js">
    <!-- START: Header -->
        <div include-html="inc/header.html"></div>
    <!-- END: Header -->


    <body class="page-header-fixed page-quick-sidebar-over-content page-style-square">
        <!-- START: Pre-Loader -->
        <div class="page-loader-wrapper" id="pageloader">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- END: Pre-Loader -->

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

        <div class="clearfix"></div>
        <div class="page-container">

            <!-- START: Sidebar -->
            @include('components.sidebar')
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
                        <!-- START: Body Model -->
                            <div include-html="inc/human_body.html" class="col-3"></div>
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
                             <h4 class="card-title ">Travel Information</h4>
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
                                    @if ($request->is_accepted != -1)
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
                                          @elseif ($request->is_accepted == 2)
                                          Sent to airline office
                                          <a href="{{ route('travel.bill.download',['id'=>$request->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
                                            <i style="color: yellow" class="material-icons">B</i></a>
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
                             <h4 class="card-title ">Travel Information</h4>
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
                                    @if ($request->is_accepted != -1)
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

                               {{--===================== patient  ============================== --}}
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
                                          @elseif ($request->is_accepted == 2)
                                          Sent to airline office
                                          <a href="{{ route('travel.bill.download',['id'=>$request->id]) }}" class="btn btn-warning btn-sm btn-just-icon">
                                            <i style="color: yellow" class="material-icons">B</i></a>
                                          @elseif ($request->is_accepted == -1)
                                          Request is Denied
                                          @else
                                          Request sent
                                    @endif


                                    </td>
                                </tr>

                            @endforeach
                         @endif



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

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>


     </div>









































































         </div>
         <!-- END: Anamnese Tab -->
     </div>
 </div>
 <!-- END: request Content -->
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
