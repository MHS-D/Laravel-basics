<!DOCTYPE html>
<html lang="en" class="no-js">
    <!-- START: Header -->
@include('components.header')    <!-- END: Header -->


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
                        HITOS | Cases
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
 <!-- START: Case Content -->
 <div class="col-6">
     <!-- START: Tabs -->
@include('components.tabs')     <!-- START: Tab
     <div class="tab-content" id="myTabContent">
         <!-- START: Anamnese Tab -->
         <div class="tab-pane fade active in show" id="anamnese" role="tabpanel" aria-labelledby="anamnese-tab">
     <!-- Create Anamnese Form -->
     <h3>Create Anamnese Form</h3>
     <button type="button" parm_id="$group['id']" class="create btn btn-info" item_name="users-custom-field" onClick="get_parameters(this)" data-toggle="modal" data-target="#create-update-custom-fields-group-modal"><i class="material-icons">add</i> Create Form Section</button>
     <a href="{{ route('logout') }}">logout</a>
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
                 @if (session()->has('message'))
                 <div class="" style="color: green">
                     {{ session()->get('message') }}
                 </div>
                 @endif
                 <!-- Card Body -->
                 <div class="card-body">
                     <table class="table dataTable">
                             <tr>
                                 <th style="min-width:100px;">id</th>
                                 <th style="min-width:100px;">Patient Name</th>
                                 <th style="min-width:100px;">Title</th>
                                 <th style="min-width:150px;">Actions</th>
                             </tr>
                         <tbody>
                            @php
                            $country_code  = DB::table('users')->where('id',session('client_id'))->value('country_code');
                        @endphp

                             {{--===================== Arabic doctor ============================== --}}


                                @foreach ($cases as $case)
                                @php
                                    $check  = DB::table('travel_requests')->where('case_id',$case->id)->first();
                                @endphp
                                <tr>
                                    <td>{{$case->id}}</td>
                                    <td> {{$name = DB::table('users')->where('id', $case->patient_id)->value('name')}} </td>
                                    <td>{{$case->title}}</td>
                                    <td>

                                        @if ($check){
                                            @if ($check->is_accepted ==2)
                                            Paid and sent Airline office
                                            @elseif ($check->is_accepted == 1)
                                            Request Accepted
                                            @elseif ($check->is_accepted == -1)
                                            denied
                                            <a href="{{ route('travel.delete',['id'=>$check->id]) }}" class="btn btn-warning btn-sm btn-just-icon"><i style="color: red" class="material-icons">D</i></a>
                                            @else
                                            Request Sent
                                            @endif
                                        }

                                        @else
                                        <a href="{{ route('travel.FirstRequest',['id'=>$case->id]) }}" class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">T</i></a>

                                        @endif
                                    </td>
                                </tr>
                                @endforeach


                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

         <div class="col-md-12">
            <div class="card">
                <!-- Card Header -->


                <!-- Card Body -->

            </div>
        </div>
     </div>
         </div>
         <!-- END: Anamnese Tab -->
     </div>
 </div>
 <!-- END: Case Content -->
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

