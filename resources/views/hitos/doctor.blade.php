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
                        {{count($dtasks)}}</span>
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
                                    <a href="task_complete/{{$task->id}}">
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
                    {{count($messages)}} </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <ul>
                        <li class="external">
                     </span>
                    <h3>You have <span class="bold">{{count($messages)}} New</span> Messages</h3>
                            <a href="contacts">view Contacts</a>

                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                @foreach ($messages as $message)

                                <li>
                                    <a href="messages/{{$message->sen_id}}">
                                    <span class="photo">
                                    <img src="assets/img/media/profile/avatar1.jpg" class="img-circle" alt=""></img>
                                    </span>
                                    <span class="subject">
                                    <span style="color: green " class="from"> <h1></h1>
                                    {{DB::table('users')->where('id',$message->sen_id)->value('name')}}{{"  "}}{{$message->created_at}} <br></span>
                                    <span style="color: red" class="time"> </span>
                                    </span>
                                    <span class="message">
                                   {{$message->message}} </span>
                                    </a>
                                </li>

                                @endforeach
                                <span>
                                    {{$messages->links()}}
                                </span>
                    </ul>


                </div>

        <!-- END: Inbox -->

        <!-- START: Todo -->
            <li class="nav-item dropdown dropdown-extended dropdown-tasks">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-calendar"></i>
                    <span class="badge badge-default">
                        {{count($parent)}} </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <ul class="extended tasks">
                        <li class="external">
                            <h3>You have <span class="bold">{{count($parent)}} pending</span> tasks</h3>
                            <a href="page_todo.html">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                @foreach ($parent as $p)

                                @if ($p->is_complete == 'no')

                                <li>
                                    <a href="javascript:;">
                                        <span class="task">
                                            <span class="desc">{{$p->title}}</span>
                                            <span class="percent">(Done {{$done=count(DB::table('tasks')->where('parent_id',$p->id)->where('is_complete','yes')
                                            ->get())}} From {{$all=count(DB::table('tasks')->where('parent_id',$p->id)->get())}})</span>
                                        </span>
                                        <span class="progress">
                                            <span style="width:{{($done*100)/$all}}%;" class="progress-bar progress-bar-success"</span>
                                        </span>
                                    </a>
                                </li>

                                @endif
                                @endforeach
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
                                 <th style="min-width:150px;">Actions</th>
                             </tr>

                         <tbody>

                               @foreach ($dtasks as $user)


                                 <tr>
                                     <td>{{$user->case_id}}</td>
                                     <td> {{$name = DB::table('users')->where('id', $user->case_id)->value('name')}}
                                        </td>
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
