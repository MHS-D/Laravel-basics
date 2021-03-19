<div include-html="inc/header.html"></div> 

<div class="card-body">
    <table class="table dataTable">
            <tr>
                <th style="min-width:100px;">id</th>
                <th style="min-width:100px;">Doctor Name</th>
                <th style="min-width:100px;">Date</th>
                <th style="min-width:100px;">Time</th>
                <th style="min-width:150px;">Actions</th>
            </tr>
       
        <tbody>
         
           <form action="" method="POST">
            @if(session()->has('message'))
            <div class="" style="color: green">
                {{ session()->get('message') }}
            </div>
        @endif

              @foreach ($meetings as $meeting)

                <tr>
                    <td>{{$meeting->patient_id}}</td>
                    <td> {{$name = DB::table('users')->where('id', $meeting->doctor_id)->value('name')}} 
                       </td>
                       <td> {{$meeting->date}}></td>
                       <td>{{$meeting->time}}></td>

                 

                    <td> 
                      
                        @if($meeting->is_accepted == null)
                         Request sent 
                         @endif
                    
                        @if ($meeting->is_accepted == 'yes')
                        @if ($meeting->is_payed == 'yes')
                        Go to Meet
                        <a style="color: rgb(9, 0, 128)" href={{"".$meeting->id}} class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">M</i></a>
                        
                        @else
                        Go to pay
                        <a style="color: green" href={{"checkout/".$meeting->id}} class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">P</i></a>

                        @endif
                      
                        @endif
                        @if ($meeting->is_accepted == 'no')
                        Declined
                        <a style="color: red" href={{"meetdelete/".$meeting->id}} class="btn btn-warning btn-sm btn-just-icon"><i class="material-icons">D</i></a>

                        

                       
                    </td>
                </tr>
                @endif
                @endforeach
               </form>

        </tbody>
    </table>
</div>
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
