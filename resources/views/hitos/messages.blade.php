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
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <!-- Start css -->
    <!-- Slick css -->
    <link href="{{asset('assets2/plugins/slick/slick.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/plugins/slick/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets2/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets2/css/flag-icon.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet" type="text/css">
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
   
    <!-- Start Chat Layout -->
    <div class="chat-layout">
        <!-- Start Chat Leftbar -->
        <div class="chat-leftbar">
            <div class="tab-content" id="pills-tab-justifiedContent">
                <!-- Start Chat Listbar -->
                <div class="tab-pane fade show active" id="pills-chat-justified" role="tabpanel" aria-labelledby="pills-chat-tab-justified">
                    <div class="chat-listbar">
                        <div class="chat-left-headbar">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <ul class="list-unstyled mb-0">
                                        <li class="media">
                                            <img class="align-self-center mr-2" src="{{asset('assets/images/logo.svg')}}" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="mb-0 mt-2">Hitos Chat</h5>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-3">
                                    <a href="doctor" data-toggle="tooltip" data-placement="right" title="Back to main page"><i class="feather icon-log-out"></i></a>
                                </div>
                            </div>
                        </div>  
                                                           
                        <div class="chat-left-body">       
                            <div class="nav flex-column nav-pills chat-userlist" id="chat-list-tab" role="tablist" aria-orientation="vertical">
                               
                                </a>                                    
                                <a style="background-color: rgb(223, 215, 215)" class="nav-link" id="chat-second-tab" data-toggle="pill"  role="tab" aria-controls="chat-second" aria-selected="true">
                                    <div class="media">                                    
                                        <img class="align-self-center rounded-circle" src="{{asset('assets/images/boy.svg')}}" alt="User Image">
                                        <div class="media-body">

                                         

                                            <h5>{{$name}}<span class="chat-timing">Today</span></h5>
                                            <p>{{$last_message}}</p>
                                        </div>
                                    </div>
                                </a>
                                
                            </div>
                        </div>                                       
                    </div>                                    
                </div>
      
            </div>
          
        </div>
        <!-- End Chat Leftbar -->
        <!-- Start Chat Rightbar -->  
        <div class="chat-rightbar">
            <!-- Start Chat Detail -->
            <div class="chat-detail">
                <div class="chat-head">
                    <div class="row align-items-center">
                        <div class="col-6">                                                
                            <ul class="list-unstyled mb-0">
                                <li class="media">
                                    <img class="align-self-center rounded-circle" src="{{asset('assets/images/boy.svg')}}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5>{{$name}}</h5>
                                      
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-inline float-right mb-0">
                                                                     
                                <li class="list-inline-item">
                                    <div class="dropdown">
                                        <a href="#" class="" id="chatDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="chatDropdown">
                                            <a class="dropdown-item font-14" href="#">Clear Message</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="back-arrow"><i class="feather icon-x"></i></a>
                                </li>
                            </ul>                                            
                        </div>
                    </div>                                    
                </div>
                <div style="background-color: rgb(235, 231, 231)" class="chat-body">
                    <div class="tab-content" id="chat-listContent">
                        <div class="tab-pane fade show active" id="chat-first" role="tabpanel" aria-labelledby="chat-first-tab">
                            <div class="chat-day text-center mb-3">
                                <span class="badge badge-secondary-inverse"></span>
                            </div>   
                            @foreach ($messages as $message)
                                                  
                           
                                @if ($message->sen_id == $did)
                                    
                                <div class="chat-message chat-message-right">
                                <div class="chat-message-text">
                                    <span>{{$message->message}}</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>{{$message->created_at}}

                                        @if ($message->seen != null)
                                        <i class="feather icon-check ml-2"></i></span>
                                        @endif
                                </div>
                                
                            </div>
                            @else
                            <div class="chat-message chat-message-left">
                                <div class="chat-message-text">
                                    <span>{{$message->message}}</span>
                                </div>
                                <div class="chat-message-meta">
                                    <span>{{$message->created_at}}
                                      
                                </div>
                            </div>
                            @endif
                            @endforeach 
                <div class="chat-bottom">
                    <div class="chat-messagebar">
                        <form action="/send" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="hidden" name="me" value="{{$did}}">
                                <input type="hidden" name="send_to" value="{{$id}}">

                                <input type="text" name="message" class="form-control" placeholder="Type a message..." aria-label="Text">
                                <span style="color: red">@error('message') @enderror</span>
                                <div class="input-group-append">
                                   <button type="submit"> <a id="button-addonsend"><i class="feather icon-send"></i></a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Chat Detail -->
            <!-- Start Chat User Info -->
       
            <!-- End Chat User Info -->
        </div>
        <!-- End Chat Rightbar -->
    </div>
    <!-- End Chat Layout -->
    <!-- Start js -->        
    <script src="{{asset('assets2/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets2/js/popper.min.js')}}"></script>
    <script src="{{asset('assets2/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets2/js/modernizr.min.js')}}"></script>
    <script src="{{asset('assets2/js/detect.js')}}"></script>
    <script src="{{asset('assets2/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('assets2/js/vertical-menu.js')}}"></script>
    <!-- Slick js -->
    <script src="{{asset('assets2/plugins/slick/slick.min.js')}}"></script>
    <!-- Core js -->
    <script src="{{asset('assets2/js/core.js')}}"></script>
    <!-- End js -->
</body>

<!-- Mirrored from themesbox.in/admin-templates/gappa/html/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Jan 2021 19:08:53 GMT -->
</html>