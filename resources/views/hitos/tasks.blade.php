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
            <div include-html="inc/navbar.html"></div>  
        <!-- END: NavBar -->

        <div class="clearfix"></div>
        <div class="page-container">
            
            <!-- START: Sidebar -->
                <div include-html="inc/sidebar.html"></div> 
            <!-- END: Sidebar -->

            <div class="page-content-wrapper">
                <div class="page-content">
                    <h3 class="page-title">
                        HITOS | Cases
                    </h3>

                    <!-- START: Page Here -->
                    <div class="row">
                        <!-- START: Body Model -->
                            <div include-html="inc/human_body.html" class="col-3"></div>
                        <!-- END: Body Model -->

                        
<!-- ------------------------------------------------------------------------------------------------------------------ -->
                        <!-- START: Case Content -->
                        <div class="col-6">
                            <!-- START: Tabs -->
                                <span include-html="inc/tabs.html"></span>
                            <!-- START: Tabs -->

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
                                                            <h4 class="card-title ">General Information</h4>
                                                            <p class="card-category"> Here is a subtitle for this table</p>
                                                        </div>
                                                        <div class="col">
                                                            <!-- Add Field Button -->
                                                            <button type="button" parm_id="$group['id']" class="create btn btn-white btn-sm btn-circle btn-just-icon float-right" item_name="users-custom-field" onClick="get_parameters(this)" data-toggle="modal" data-target="#create-update-custom-field-modal"><i class="material-icons">add</i></button>
                                                            <!-- Order Fields Button -->
                                                            <button type="button" group_id="$group['id']" class="order-fields btn btn-white btn-sm btn-circle btn-just-icon float-right" data-toggle="modal" data-target="#order-fields-modal"><i class="material-icons">sort</i></button>
                                                            <!-- Edit Button -->
                                                            <button type="button" id="$group['id']" class="update btn btn-white btn-sm btn-circle btn-just-icon float-right" item_name="users-custom-fields-group" onClick="get_parameters(this)" data-toggle="modal" data-target="#create-update-users-custom-fields-group-modal"><i class="material-icons">edit</i></button>
                                                            <!-- Delete Button -->
                                                            <button type="button" name="delete" url="" id="$group['id']" class="delete btn btn-white btn-sm btn-circle btn-just-icon float-right" data-toggle="modal" data-target="#confirmModal"><i class="material-icons">delete</i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <table class="table dataTable">
                                                        <thead class="text-primary">
                                                            <tr>
                                                                <th width="10px">#</th>
                                                                <th style="min-width:100px;">Name</th>
                                                                <th style="min-width:100px;">Type</th>
                                                                <th style="min-width:150px;">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                          
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Blood Type</td>
                                                                    <td>Dropdown List</td>
                                                                    <td>
                                                                        <!-- Attributes Button -->
                                                                        <a href="anamnese_field_attributes_blood_type.html" class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">vpn_key</i></a>
                                                                        <!-- Edit Button -->
                                                                        <button type="button" id="$field['id']" class="update btn btn-primary btn-sm btn-just-icon" item_name="users-custom-field" data-toggle="modal" data-target="#create-update-custom-field-modal"><i class="material-icons">edit</i></button>
                                                                        <!-- Delete Button -->
                                                                        <button type="button" name="delete" url="" id="$field['id']" class="delete btn btn-danger btn-sm btn-just-icon" data-toggle="modal" data-target="#confirmModal"><i class="material-icons">delete</i></button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Urine Color</td>
                                                                    <td>Dropdown List</td>
                                                                    <td>
                                                                        <!-- Attributes Button -->
                                                                        <a href="" class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">vpn_key</i></a>
                                                                        <!-- Edit Button -->
                                                                        <button type="button" id="$field['id']" class="update btn btn-primary btn-sm btn-just-icon" item_name="users-custom-field" onClick="get_parameters(this)" data-toggle="modal" data-target="#create-update-custom-field-modal"><i class="material-icons">edit</i></button>
                                                                        <!-- Delete Button -->
                                                                        <button type="button" name="delete" url="" id="$field['id']" class="delete btn btn-danger btn-sm btn-just-icon" data-toggle="modal" data-target="#confirmModal"><i class="material-icons">delete</i></button>
                                                                    </td>
                                                                </tr>
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
<!-- ------------------------------------------------------------------------------------------------------------------ -->


                        <!-- START: Tasks -->
                            <div class="col-3">
                                <div class="tasks-container">
                                    <h4>Completed Tasks</h4>

                                    @foreach ($tasks as $task)

                                        @if ($task->is_complete == 'yes')
                                      
                                    <div class="task-container" style="background-color: #58d68d ; color: #FFFFFF">
                                        <!-- Tasks Title -->
                                        <span class="task-title">
                                           {{$task->title}}
                                        </span>
                                
                                        <!-- Tasks Date -->
                                        <div class="task-date">
                                           due - {{$task->due_date}} 

                                        </div>
                                
                                        <hr class="my-2">
                                        <!-- Tasks Author -->
                                        <div class="task-author">
                                           
                                            <u>From</u>: Dr.  {{$name = DB::table('users')->where('id', $task->sender_id)->value('Fname')}}
                                            {{$lname = DB::table('users')->where('id', $task->sender_id)->value('Lname') }}
                                            <br>
                                            <u>To</u>:  {{$name = DB::table('users')->where('id', $task->reciever_id)->value('Fname')}}
                                            {{$lname = DB::table('users')->where('id', $task->reciever_id)->value('Lname') }}
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach

                                    
                                    
                                    <hr>
                                    <h4>Non Completed Tasks</h4>
                                    
                                    @foreach ($tasks as $task)

                                    @if ($task->is_complete == 'no')
                                    
                                    <div class="task-container" style="background-color: #ff5733 ; color: #FFFFFF">
                                        <!-- Tasks Title -->
                                        <span class="task-title">
                                            {{$task->title}}
                                        </span>
                                
                                   <!-- Tasks Date -->
                                   <div class="task-date">
                                    due - {{$task->due_date}} 
                                 </div>
                            
                                 <hr class="my-2">
                                 <!-- Tasks Author -->
                                 <div class="task-author">
                                    
                                     <u>From</u>: Dr.  {{$name = DB::table('users')->where('id', $task->sender_id)->value('Fname')}}
                                     {{$lname = DB::table('users')->where('id', $task->sender_id)->value('Lname') }}
                                     <br>
                                     <u>To</u>:  {{$name = DB::table('users')->where('id', $task->reciever_id)->value('Fname')}}
                                     {{$lname = DB::table('users')->where('id', $task->reciever_id)->value('Lname') }}
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        <!-- END: Tasks -->
                    </div>
                    <!-- END: Page Here -->

                </div>
            </div>

            <!-- START QUICK SIDEBAR -->
                <div include-html="inc/quick_sidebar.html"></div> 
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
