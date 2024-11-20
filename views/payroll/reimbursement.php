<?php
$pagename = basename(__DIR__);
$fullPage = ucwords($pagename);
$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');
$sitename = str_replace('-', ' ', $siteaim);
$bsurl = dirname(dirname(__DIR__));
include_once $bsurl.'/inc/header.php';
include_once $bsurl.'/inc/sidebar.php';
?>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mainbody">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><?php echo ucwords($sitename);?></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>
              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active"><?php echo ucwords($sitename);?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        


                    <!-- DataTales Example -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="card-title"> <i class="fas fa-list"></i> Reimbursement </div>
                            <div class="card-tools">
                               <a href="<?php echo VIEW.$pagename?>/reimbursement-claim.php" class="badge badge-info"><i class="fas fa-list"></i> Reimbursement Claim</a> 
                               <a href="<?php echo VIEW.$pagename?>/reimbusement-master.php" class="badge badge-dark ml-3"><i class="fas fa-cash-register"></i> Reimbursement Master</a>
                            </div>
                             
                             
                        </div>
                 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Claim Date</th>
                                            <th>Employee ID</th>
                                            <th>Reimbursement Type</th>
                                            <th>Amount</th>
                                            
                                      <th>From     <i class="fa fa-map-marker"></i></th>
                                      <th>Google Map Address 1</th>
                                            <th>To       <i class="fa fa-map-marker" style="font-size:18px;color:red"></i></th>
                                            <th>Google Map Address 2</th>
                                            <th>Distence</th>
                                            <th>Payment Mode</th>
                                            <th>Paid</th>
                                            <th>Unpaid</th>
                                            <th>Paid Date</th>
                                            <th>Attechment</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <tr>
                                            <td>03/31/2023</td>
                                            <td>IT 463</td>
                                            <td>Traveling Exp</td>
                                            <td>500000</td>
                                            
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" value="" name="form[Pickup Location]" id="address" placeholder="Address Location" class="form-control form-control-sm">
                                                    <div class="input-group-append">
                                                        <button type="button" id="submit" class="input-group-text"><i class="fas fa-map"></i></button>
                                                    </div>
                                                    
                                                
                                                </div>
                                                

                                            </td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas" src="" allowfullscreen height="70px"></iframe>
        </div> </td>
                                                                      <td>
                                                                        <div class="input-group">
                                                                            <input type="text" value="" name="form[Drop Location]" id="address_second" placeholder="Drop Location" class="form-control form-control-sm">
                                                                            <div class="input-group-append">
                                                                                <button type="button" id="second" class="input-group-text"><i class="fas fa-map"></i></button>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas-second" src="" allowfullscreen height="70px"></iframe>
        </div></td>
                                            <td>50 Km</td>
                                           <td>TRF</td>
                                           <td>-</td>
                                           <td>--</td>
                                           <td>-</td>
                                           <td><a href=""><i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                            <td><a href=""><i class=""></i>Approved<a></td>
                                        </tr>
                                        <tr>
                                            <td>3/31/2023</td>
                                            <td>IT 463</td>
                                            <td>Traveling Exp</td>
                                            <td>520000</td>
                                            
                                            
                                            
                                                        <td>
                                                            <div class="input-group">
                                                                <input type="text" value="" name="form[Pickup Location]" id="address_one" placeholder="Address Location" class="form-control form-control-sm">
                                                                <div class="input-group-append">
                                                                    <button type="button" id="submit_one">Pickup</button>
                                                                </div>
                                                            </div>
                                                            </td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas_one" src="" allowfullscreen height="70px"></iframe>
        </div> </td>
                                                                      <td><input type="text" value="" name="form[Drop Location]" id="address_two" placeholder="Drop Location" class="rsform-input-box"><button type="button" id="second_two">Locate!</button></td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas-two" src="" allowfullscreen height="70px"></iframe>
        </div></td>
                                            <td>20Km</td>
                                            <td>Cheque </td>
                                            <td>-</td>
                                            <td>3600</td>
                                            <td>-</td>
                                            <td><a href=""><i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                                <td><a href=""><i class=""></i>Approved<a></td>
                                        </tr>
                                        <tr>
                                             
                                            <td>3/31/2023</td>
                                            <td>IT 463</td>
                                            <td>Traveling Exp</td>
                                             <td>620000</td>
                                             
                                            
                                           
                                           
                                                        <td><input type="text" value="" name="form[Pickup Location]" id="address_third" placeholder="Address Location" class="rsform-input-box"><button type="button" id="submit_third">Pickup</button></td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas-third" src="" allowfullscreen height="70px"></iframe>
        </div> </td>
                                                            <td><input type="text" value="" name="form[Drop Location]" id="address_thirdd" placeholder="Drop Location" class="rsform-input-box"><button type="button" id="second_third">Locate!</button></td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas-thirdd" src="" allowfullscreen height="70px"></iframe>
        </div></td>
                                            <td>0 Km</td>
                                            <td>Cheque </td>
                                            <td>5000</td>
                                            <td>3600</td>
                                            <td>-</td>
                                           <td><a href=""><i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                            <td><a href=""><i class=""></i>Approved<a></td>
                                        </tr>
                                        <tr>
                                            <td>3/31/2023</td>
                                           <td>IT 463</td>
                                            <td>Traveling Exp</td>
                                            <td>60000</td>
                                            
                                            
                                            
                                            
                                                      <td><input type="text" value="" name="form[Pickup Location]" id="address_forth" placeholder="Address Location" class="rsform-input-box"><button type="button" id="submit_forth">Pickup</button></td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas_forth" src="" allowfullscreen height="70px"></iframe>
        </div> </td>
                                                              <td><input type="text" value="" name="form[Drop Location]" id="address_forthh" placeholder="Drop Location" class="rsform-input-box"><button type="button" id="second_forth">Locate!</button></td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas_forthh" src="" allowfullscreen height="70px"></iframe>
        </div></td>
                                            <td>0 Km</td>
                                            <td>Cheque </td>
                                            <td>5000</td>
                                            <td>6300</td>
                                            <td>-</td>
                                            <td><a href=""><i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                   <td><a href=""><i class=""></i>Approved<a></td>
                                        </tr>
                                        <tr>
                                            <td>3/31/2023</td>
                                            <td>IT 463</td>
                                             <td>Traveling Exp</td>
                                           <td>5000</td>
                                           
                                            
                                            
                                            
                                         <td><input type="text" value="" name="form[Pickup Location]" id="address_five" placeholder="Address Location" class="rsform-input-box"><button type="button" id="submit_five">Pickup</button></td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas_five" src="" allowfullscreen height="70px"></iframe>
        </div> </td>
                                            <td><input type="text" value="" name="form[Drop Location]" id="address_fiv" placeholder="Drop Location" class="rsform-input-box"><button type="button" id="second_five">Locate!</button></td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas_fivee" src="" allowfullscreen height="70px"></iframe>
        </div></td>
                                            <td>0 Km</td>
                                            <td>Cheque </td>
                                            <td>-</td>
                                            <td>6300</td>
                                            <td>-</td>
                                            <td><a href="">  <i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                                <td><a href=""><i class=""></i>Approved<a></td>
                                        </tr>
                                         
                                        

                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

        
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
     

        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>


<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#submit').on('keypress click', function (e) {
        if ($('#address').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas").attr("src", srcContent);
        }
    });
});
</script>



<!-- second -->
<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas-second").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#second').on('keypress click', function (e) {
        if ($('#address_second').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address_second').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas-second").attr("src", srcContent);
        }
    });
});
</script>


<!-- number one -->
<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas_one").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#submit_one').on('keypress click', function (e) {
        if ($('#address_one').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address_one').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas_one").attr("src", srcContent);
        }
    });
});
</script>



<!-- second -->
<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas-two").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#second_two').on('keypress click', function (e) {
        if ($('#address_two').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address_two').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas-two").attr("src", srcContent);
        }
    });
});
</script>

<!-- thrid -->

<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas-third").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#submit_third').on('keypress click', function (e) {
        if ($('#address_third').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address_third').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas-third").attr("src", srcContent);
        }
    });
});
</script>



<!-- third -->
<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas-thirdd").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#second_third').on('keypress click', function (e) {
        if ($('#address_thirdd').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address_thirdd').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas-thirdd").attr("src", srcContent);
        }
    });
});
</script>


<!-- forth -->


<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas_forth").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#submit_forth').on('keypress click', function (e) {
        if ($('#address_forth').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address_forth').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas_forth").attr("src", srcContent);
        }
    });
});
</script>



<!-- forth -->
<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas_forthh").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#second_forth').on('keypress click', function (e) {
        if ($('#address_forthh').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address_forthh').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas_forthh").attr("src", srcContent);
        }
    });
});
</script>


<!-- five -->

<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas_five").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#submit_five').on('keypress click', function (e) {
        if ($('#address_five').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address_five').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas_five").attr("src", srcContent);
        }
    });
});
</script>



<!-- forth -->
<script type="text/javascript">
    
    var q = "";
var linkKey = "https://www.google.com/maps/embed/v1/search?key=AIzaSyBK73HewkhHBVVs9nI98-HY_N7cZM_kdjE" 
var zoom = 14;
var defaultLoc = "New York, NY"

//Get users geolocation
if (navigator.geolocation) {
    q = navigator.geolocation.getCurrentPosition(handleGetCurrentPosition, onError);

    function handleGetCurrentPosition(location) {
        location.coords.latitude;
        location.coords.longitude;
    }

    function onError() {
        q = defaultLoc;
    }
}

//Set initial map based on user geolocation or NY, NY
var srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
$("#map-canvas_fivee").attr("src", srcContent);

//Change map based on user input in textbox and a click or enter key submission. 
$(function () {
    $('#second_five').on('keypress click', function (e) {
        if ($('#address_fiv').val().length === 0) {
            q = defaultLoc;
        }
        else {
            q = $('#address_fiv').val();
        }
        srcContent = linkKey + "&q=" + q + "&zoom=" + zoom;
        if (e.which === 13 || e.type === 'click') {
            $("#map-canvas_fivee").attr("src", srcContent);
        }
    });
});
</script>