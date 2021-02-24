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

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <!-- START: Notifications -->
            <li class="nav-item dropdown dropdown-extended dropdown-notification">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-bell"></i>
                    <span class="badge badge-default">
                    7 </span>
                </a>
                <div class="dropdown-menu dropdown-menu-list" aria-labelledby="navbarDropdown">
                    <ul>
                        <li class="external">
                            <h3><span class="bold">{{count($dtasks)}}</span> notifications</h3>
                            <a href="#">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                               @foreach ($dtasks as $task)
                                   
                               
                                <li>
                                    <a href="javascript:;">
                                    <span class="time">due {{$task->due_date}}</span>
                                    <span class="details">
                                    <span class="label label-sm label-icon label-success">
                                    <i class="fa fa-plus"></i>
                                    </span>
                                    {{$task->title}} </span>
                                    </a>
                                </li>
                                @endforeach
                             
                            
                           
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
        <!-- END: Notifications -->

        <!-- START: Inbox -->
            <li class="nav-item dropdown  dropdown-extended dropdown-inbox">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-envelope-open"></i>
                    <span class="badge badge-default">
                    5 </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <ul>
                        <li class="external">
                            <h3>You have <span class="bold">7 New</span> Messages</h3>
                            <a href="page_inbox.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/img/media/profile/avatar1.jpg" class="img-circle" alt=""></img>
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Lisa Wong </span>
                                    <span class="time">Just Now </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/img/media/profile/avatar3.jpg" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Richard Doe </span>
                                    <span class="time">16 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="dropdown-menu">
                        <li class="external">
                            <h3>You have <span class="bold">7 New</span> Messages</h3>
                            <a href="page_inbox.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/img/media/profile/avatar1.jpg" class="img-circle" alt=""></img>
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Lisa Wong </span>
                                    <span class="time">Just Now </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="inbox.html?a=view">
                                    <span class="photo">
                                    <img src="assets/img/media/profile/avatar3.jpg" class="img-circle" alt="">
                                    </span>
                                    <span class="subject">
                                    <span class="from">
                                    Richard Doe </span>
                                    <span class="time">16 mins </span>
                                    </span>
                                    <span class="message">
                                    Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
        <!-- END: Inbox -->

        <!-- START: Todo -->
            <li class="nav-item dropdown dropdown-extended dropdown-tasks">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-calendar"></i>
                    <span class="badge badge-default">
                    5 </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <ul class="extended tasks">
                        <li class="external">
                            <h3>You have <span class="bold">12 pending</span> tasks</h3>
                            <a href="page_todo.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">New release v1.2 </span>
                                            <span class="percent">30%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Application deployment</span>
                                            <span class="percent">65%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Mobile app release</span>
                                            <span class="percent">98%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Database migration</span>
                                            <span class="percent">10%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Web server upgrade</span>
                                            <span class="percent">58%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">Mobile development</span>
                                            <span class="percent">85%</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">New UI release</span>
                                            <span class="percent">38%</span>
                                        </span>
                                        <span class="progress progress-striped">
                                            <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </li>
        <!-- END: Todo -->

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
                             <tr>
                                 <th style="min-width:100px;">id</th>
                                 <th style="min-width:100px;">Name</th>
                                 <th style="min-width:150px;">Actions</th>
                             </tr>
                        
                         <tbody>
                           
                               @foreach ($dtasks as $user)
                                   
                               
                                 <tr>
                                     <td>{{$user->case_id}}</td>
                                     <td> {{$name = DB::table('users')->where('id', $user->case_id)->value('Fname')}} 
                                        {{$name = DB::table('users')->where('id', $user->case_id)->value('Lname')}}</td>
                                     <td>
                                         <!-- Attributes Button -->
                                         <a href={{"tasks/".$user->case_id}} class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">vpn_key</i></a>
                                        
                                     </td>
                                 </tr>
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
