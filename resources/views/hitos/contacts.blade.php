<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themesbox.in/admin-templates/gappa/html/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 19:08:35 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Gappa is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="chat, chat platform, discussion, video call, voice call, communication, conversation, messange, messanger, talk">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Gappa - Clean & Minimal Chat Platform HTML Template</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Start css -->
    <!-- Slick css -->
    <link href="assets2/plugins/slick/slick.css" rel="stylesheet">
    <link href="assets2/plugins/slick/slick-theme.css" rel="stylesheet">
    <link href="assets2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets2/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets2/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    <link href="assets2/css/style.css" rel="stylesheet" type="text/css">
    <!-- End css -->
</head>
<body class="light-layout">
    <!-- Start Create Group Modal -->
    <div class="modal create-group-modal fade" id="createGroup" tabindex="-1" role="dialog" aria-labelledby="createGroupTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createGroupTitle">Create Group</h5>
                </div>
              
            </div>
        </div>
    </div>
    <!-- End Incoming Video Call Modal -->
    <!-- Start Incoming Video Call Modal -->
    
    <!-- End Incoming Video Call Modal -->
    <!-- Start Incoming Voice Call Modal -->
   
    <!-- End Incoming Voice Call Modal -->
    <!-- Start Chat Layout -->
    <div  class="chat-layout">
        <!-- Start Chat Leftbar -->
        <div style="width: -webkit-fill-available; padding: 2%" class="chat-leftbar">
            <div   class="tab-content" id="pills-tab-justifiedContent">
                <!-- Start Chat Listbar -->
                <div  class="tab-pane fade show active" id="pills-chat-justified" role="tabpanel" aria-labelledby="pills-chat-tab-justified">
                    <div  class="chat-listbar">
                        <div style="background-color: rgb(37, 187, 207)" class="chat-left-headbar">
                            <div  class="row align-items-center">
                                <div class="col-9">
                                    <ul class="list-unstyled mb-0">
                                        <li class="media">
                                            <img class="align-self-center mr-2" src="assets/images/logo.svg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mb-0 mt-2">Contacts List</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-3">
                                    <a href="doctor" data-toggle="tooltip" data-placement="right" title="Back to main page"><i class="feather icon-log-out"></i></a>
                                </div>
                            </div>
                        </div>  
                                                       
                        <div style="background-color: rgb(241, 236, 236)" class="chat-left-body">       
                            <div class="nav flex-column nav-pills chat-userlist" id="chat-list-tab" role="tablist" aria-orientation="vertical">
                                    @foreach ($contacts as $contact)
                                                    
                                <a href="messages/{{$contact->id}}"class="nav-link" id="chat-second-tab" data-toggle="pill"  role="tab" aria-controls="chat-second" aria-selected="false">
                                    <div class="media">                                    
                                        <img class="align-self-center rounded-circle" src="assets/images/boy.svg" alt="User Image">
                                        <div class="media-body">
                                            <h5>{{DB::table('users')->where('id',$contact->contact_id)->value('name')}}<h1 style="font-size: 15px" class="chat-timing">{{DB::table('users')->where('id',$contact->contact_id)->value('type')}}</h1></h5>
                                            <p> Click here to start chating  ...</p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach 
                            </div>
                        </div>                                       
                    </div>                                    
                </div>
       
            </div>
          
        </div>
        <!-- End Chat Leftbar -->
        <!-- Start Chat Rightbar -->  
     
        <!-- End Chat Rightbar -->
    </div>
    <!-- End Chat Layout -->
    <!-- Start js -->        
    <script src="assets2/js/jquery.min.js"></script>
    <script src="assets2/js/popper.min.js"></script>
    <script src="assets2/js/bootstrap.min.js"></script>
    <script src="assets2/js/modernizr.min.js"></script>
    <script src="assets2/js/detect.js"></script>
    <script src="assets2/js/jquery.slimscroll.js"></script>
    <script src="assets2/js/vertical-menu.js"></script>
    <!-- Slick js -->
    <script src="assets2/plugins/slick/slick.min.js"></script>
    <!-- Core js -->
    <script src="assets2/js/core.js"></script>
    <!-- End js -->
</body>

<!-- Mirrored from themesbox.in/admin-templates/gappa/html/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 19:08:53 GMT -->
</html>