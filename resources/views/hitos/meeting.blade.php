<!DOCTYPE html>
<html lang="en" class="no-js">
    <!-- START: Header -->
        <div include-html="inc/header.html"></div> 
    <!-- END: Header -->
    

   
                            
         
        <!-- END: Notifications -->

     

     

        <!-- START: User --> 
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-no-arrow" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="navbar-profile-img" style="background-image: url('https://cdn.pixabay.com/photo/2017/06/26/02/47/people-2442565_960_720.jpg');"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <ul class="dropdown-menu-default">
                        <li>
                            Ahmad Antar
                        </li>
                        <li>
                            <a href="">
                                <i class="icon-user"></i>MY Profile</a>
                        </li>
                        <!--<li>
                            <a href="">
                            <i class="icon-calendar"></i>  </a>
                        </li>-->
                        <li>
                            <a href="">
                            <i class="icon-envelope-open"></i>Notifications<span class="badge badge-warning">
                            3 </span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                            <i class="icon-envelope-open"></i>Inbox<span class="badge badge-danger">
                            3 </span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                            <i class="icon-rocket"></i>My Tasks<span class="badge badge-success">
                            7 </span>
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        <li>
                            <a href="">
                            <i class="icon-lock"></i>LockScreen</a>
                        </li>
                        <li>
                            <a href=""
                            <i class="icon-key"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </li>
        <!-- END: Todo -->
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
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
                        <!-- START: Body Model -->
                            <div include-html="inc/human_body.html" class="col-3"></div>
 <!-- END: Body Mode
 
<!-- ------------------------------------------------------------------------------------------------------------ -->
 <!-- START: Case Content -->
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
     <div class="row"> 
         <div class="col-md-12">
             <div class="card">
                 <!-- Card Header -->
                 <div class="card-header card-header-success">
                     <div class="row">
                         <div class="col">
                             <h4 class="card-title ">patient Information</h4>
                             <p class="card-category"> Here is a subtitle for this table</p>
                         </div>
                       
                     </div>
                 </div>
                     <!-- Card Body -->
                     <div class="card-body">
                        <table class="table dataTable">
                                <tr>
                                    <th style="min-width:100px;">id</th>
                                    <th style="min-width:100px;">Name</th>
                                    <th style="min-width:100px;">Date</th>
                                    <th style="min-width:100px;">Time</th>
                                    <th style="min-width:150px;">Actions</th>
                                </tr>
                           
                            <tbody>
                               @if(session()->has('message2'))
                               <div class="" style="color: green">
                                   {{ session()->get('message2') }}
                               </div>
                           @endif
                               <form action="" method="POST">
   
                                  @foreach ($meetings as $meeting)
                                      @if ( $meeting->is_payed == 'yes')
                                    <tr>
                                        <td>{{$meeting->patient_id}}</td>
                                        <td> {{$name = DB::table('users')->where('id', $meeting->patient_id)->value('name')}} 
                                           </td>
                                           <td> <input type="text" name="time" value="{{$meeting->date}}"></td>
                                           <td> <input type="text" name="time" value="{{$meeting->time}}"></td>
   
                                        <td> 
                                            <!-- Attributes Button -->
                                            Go to Meet
                        <a style="color: rgb(9, 0, 128)" href={{"".$meeting->id}} class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">M</i></a>

                                           
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    
                                   </form>
   
                            </tbody>
                        </table>
                    </div>
    
                 <!-- Card Body -->
                 <div class="card-body">
                     <table class="table dataTable">
                             <tr>
                                 <th style="min-width:100px;">id</th>
                                 <th style="min-width:100px;">Name</th>
                                 <th style="min-width:100px;">Date</th>
                                 <th style="min-width:100px;">Time</th>
                                 <th style="min-width:150px;">Actions</th>
                             </tr>
                        
                         <tbody>
                            @if(session()->has('message'))
                            <div class="" style="color: green">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                            <form action="meetAccept" method="POST">
                                @csrf
                               @foreach ($meetings as $meeting)
                                   @if ( $meeting->is_accepted == null)
                                 <tr>
                                     <td>{{$meeting->patient_id}}</td>
                                     <td> {{$name = DB::table('users')->where('id', $meeting->patient_id)->value('name')}} 
                                        </td>
                                        <td> <input type="text" name="date" value="{{$meeting->date}}"> <span style="color: red">@error('date'){{$message}}@enderror</span><br>  
                                        </td>
                                        <td> <input type="text" name="time" value="{{$meeting->time}}"> <span style="color: red">@error('time'){{$message}}@enderror</span><br>                                         </td>
                                    </td>
                                        <input type="hidden" name="id" value="{{$meeting->id}}">
                                     <td> 
                                  
                                       
                                               <!-- Attributes Button -->
                                         <button type="submit" style="color: green" class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">A</i></button>
                                         <a style="color: red" href={{"decline/".$meeting->id}} class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">D</i></a>

                                        
                                       
                                        
                                     </td>
                                 </tr>
                                 @endif
                                 @endforeach
                                </form>

                                 @foreach ($meetings as $meeting)
                                 @if ( $meeting->is_accepted == 'yes' && $meeting->is_payed == 'no' )
                               <tr>
                                   <td>{{$meeting->patient_id}}</td>
                                   <td> {{$name = DB::table('users')->where('id', $meeting->patient_id)->value('name')}} 
                                      </td>
                                      <td> <input type="text" name="date" value="{{$meeting->date}}"></td>
                                      <td> <input type="text" name="time" value="{{$meeting->time}}"></td>
                                      <input type="hidden" name="id" value="{{$meeting->id}}">
                                   <td> 
                                       @if ($meeting->is_accepted == 'yes')
                                       Waiting payment
                                    
                                       @endif
                                     
                                      
                                   </td>
                               </tr>
                               @endif
                               @endforeach
                               

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
