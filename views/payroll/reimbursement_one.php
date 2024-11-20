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
            <!-- <h4 class="m-0"><?php echo ucwords($sitename);?></h4> -->
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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                             <!-- <a href="http://dev.inoday.us/views/payroll/reimbursement.php" class="btn btn-secondary float-right">Add</a> -->
                             <div class="card-title"> <i class=""></i> Rembusrsement </div>
                        </div>
                 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Claim Date</th>
                                            <th>Emp ID</th>
                                            <th>Rembusrsement Type</th>
                                            <th>Amount</th>
                                            
                                      <th>From     <i class="fa fa-map-marker"></i></th>
                                      <th>Google Map Address 1</th>
                                            <th>To       <i class="fa fa-map-marker" style="font-size:18px;color:red"></i></th>
                                            <th>Google Map Address 2</th>
                                            <th>Distence</th>
                                            <!-- <th>Mode Of Payment</th>
                                            <th>Paid</th>
                                            <th>Unpaid</th>
                                            <th>Paid Date</th>
                                            <th>Attechment</th>
                                            <th>Status</th> -->
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <tr>
                                            <td>3/31/2023</td>
                                            <td>IT 463</td>
                                            <td>Traveling Exp</td>
                                            <td>500000</td>
                                            
                                            
                                            
                                              
                                            
                                                            <td><input type="text" value="" name="form[Pickup Location]" id="address" placeholder="Address Location" class="rsform-input-box"><button type="button" id="submit">Pickup</button></td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas" src="" allowfullscreen></iframe>
        </div> </td>
                                                                      <td><input type="text" value="" name="form[Drop Location]" id="address_second" placeholder="Drop Location" class="rsform-input-box"><button type="button" id="second">Locate!</button></td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas-second" src="" allowfullscreen></iframe>
        </div></td>
                                            <td>50 Km</td>
                                           <!-- <td>TRF</td>
                                           <td>-</td>
                                           <td>--</td>
                                           <td>-</td>
                                           <td><a href=""><i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                            <td><a href=""><i class=""></i>Approved<a></td> -->
                                        </tr>
                                        <tr>
                                            <td>3/31/2023</td>
                                            <td>IT 463</td>
                                            <td>Traveling Exp</td>
                                            <td>520000</td>
                                            
                                            
                                            
                                                        <td><input type="text" value="" name="form[Pickup Location]" id="address_one" placeholder="Address Location" class="rsform-input-box"><button type="button" id="submit_one">Pickup</button></td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas_one" src="" allowfullscreen></iframe>
        </div> </td>
                                                                      <td><input type="text" value="" name="form[Drop Location]" id="address_two" placeholder="Drop Location" class="rsform-input-box"><button type="button" id="second_two">Locate!</button></td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas-two" src="" allowfullscreen></iframe>
        </div></td>
                                            <td>20Km</td>
                                            <!-- <td>Cheque </td>
                                            <td>-</td>
                                            <td>3600</td>
                                            <td>-</td>
                                            <td><a href=""><i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                                <td><a href=""><i class=""></i>Approved<a></td> -->
                                        </tr>
                                        <tr>
                                             
                                            <td>3/31/2023</td>
                                            <td>IT 463</td>
                                            <td>Traveling Exp</td>
                                             <td>620000</td>
                                             
                                            
                                           
                                           
                                                        <td><input type="text" value="" name="form[Pickup Location]" id="address" placeholder="Address Location" class="rsform-input-box"><button type="button" id="submit">Pickup</button></td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas" src="" allowfullscreen></iframe>
        </div> </td>
                                                            <td><input type="text" value="" name="form[Drop Location]" id="address_second" placeholder="Drop Location" class="rsform-input-box"><button type="button" id="second">Locate!</button></td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas-second" src="" allowfullscreen></iframe>
        </div></td>
                                            <td>0 Km</td>
                                            <!-- <td>Cheque </td>
                                            <td>5000</td>
                                            <td>3600</td>
                                            <td>-</td>
                                           <td><a href=""><i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                            <td><a href=""><i class=""></i>Approved<a></td> -->
                                        </tr>
                                        <tr>
                                            <td>3/31/2023</td>
                                           <td>IT 463</td>
                                            <td>Traveling Exp</td>
                                            <td>60000</td>
                                            
                                            
                                            
                                            
                                                      <td><input type="text" value="" name="form[Pickup Location]" id="address" placeholder="Address Location" class="rsform-input-box"><button type="button" id="submit">Pickup</button></td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas" src="" allowfullscreen></iframe>
        </div> </td>
                                                              <td><input type="text" value="" name="form[Drop Location]" id="address_second" placeholder="Drop Location" class="rsform-input-box"><button type="button" id="second">Locate!</button></td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas-second" src="" allowfullscreen></iframe>
        </div></td>
                                            <td>0 Km</td>
                                            <!-- <td>Cheque </td>
                                            <td>5000</td>
                                            <td>6300</td>
                                            <td>-</td>
                                            <td><a href=""><i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                   <td><a href=""><i class=""></i>Approved<a></td> -->
                                        </tr>
                                        <tr>
                                            <td>3/31/2023</td>
                                            <td>IT 463</td>
                                             <td>Traveling Exp</td>
                                           <td>5000</td>
                                           
                                            
                                            
                                            
                                         <td><input type="text" value="" name="form[Pickup Location]" id="address" placeholder="Address Location" class="rsform-input-box"><button type="button" id="submit">Pickup</button></td>
                                          <td> <div class="col-md-6 the-map">
          <iframe id="map-canvas" src="" allowfullscreen></iframe>
        </div> </td>
                                            <td><input type="text" value="" name="form[Drop Location]" id="address_second" placeholder="Drop Location" class="rsform-input-box"><button type="button" id="second">Locate!</button></td>
<td><div class="col-md-6 the-map" >
          <iframe id="map-canvas-second" src="" allowfullscreen></iframe>
        </div></td>
                                            <td>0 Km</td>
                                          <!--   <td>Cheque </td>
                                            <td>-</td>
                                            <td>6300</td>
                                            <td>-</td>
                                            <td><a href="">  <i class="fa fa-paperclip" aria-hidden="true"></i><a></td>
                                                <td><a href=""><i class=""></i>Approved<a></td> -->
                                        </tr>
                                         
                                        

                                        
                                       
                                    </tbody>
                                </table>
                                 <div class="clearfix  float-right">
            <button type="button" class="btn btn-primary">Submit</button>
        </div>
                            </div>
                        </div>
                    </div>

       
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
     <!--  <div class="col-md-6 the-map" >
          <iframe id="map-canvas-second" src="" allowfullscreen></iframe>
        </div> -->
     <!--  <div class="card-footer">
         <div class="col-md-6 the-map">
          <iframe id="map-canvas" src="" allowfullscreen></iframe>
        </div> 

      </div> -->

        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADbpfJGWwRh5um_gd2gNySgrI5FAy2RZk&libraries=places&callback=initAutocomplete" async defer></script>

<script type="text/javascript">
    
    var placeSearch, pickupLocation, dropLocation;

function initAutocomplete() {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    pickupLocation = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */
    (document.getElementById('Pickup_Location')), {
      types: ['geocode']
    });

    dropLocation = new google.maps.places.Autocomplete(
    /** @type {!HTMLInputElement} */
    (document.getElementById('Drop_Location')), {
      types: ['geocode']
    });
}
</script> -->

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