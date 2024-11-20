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

        

        

        <div class="card rounded-0">

          <div class="card-body">

            <div class="row">

              <div class="col-sm-6 col-lg-6">

                <div class="form-group">

                  

                  <button type="button" class="btn btn-outline-danger" id="geolocation"><i class="fas fa-crosshairs"></i> Current Location</button>  

                </div>

                

                <p id="addressInput"></p>

               

              <div class="bg-light p-2 border">

              <?php

                if(isset($_GET['loc']))

                {

                  $id = $_GET['loc'];

                  $table = "in_master_card";

                  $select = new Selectall();

                  $cond = " `in_sno`='$id' ";

                  $mdata = $select->getcondData($table,$cond);

                 

                  if($mdata != "")

                  {

                    $location = $mdata['in_prefix'];

                    $status = $mdata['in_status'];

                  }

                  

                  $act = "editlog&id=".$id;



                }

                else

                {

                  $act = "location";

                  $status = "";

                  $location = "";

                }

                

              ?>

              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">

                <div class="form-group">

                  <label>Add Work Location</label>

                  

                <div class="input-group mb-3">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><input type="checkbox" name="comactive" value="1" <?php echo $status == "1" ? "checked":"";?>></span>

                    </div>

                  <input type="text" class="form-control" name="location" placeholder="Work Location" required value="<?php echo $location;?>" id=city>

                  

                  <div class="input-group-append">

                    <button type="submit" class="input-group-text">Go</button>

                  </div>

                </div>

                </div>

              </form>

              

            </div>

                

              <div class="table-responsive emptable">

                  <table class="table table-bordered table-striped">

                <tr class="bg-primary sticky-top">

                  <td>ID</td>

                  <td>Name</td>

                  <td class="text-center"><span class="fas fa-edit"></span></td>

                  <td class="text-center"><span class="fas fa-trash"></span></td>



                </tr>

                <?php

                $table = "in_master_card";

                $select = new Selectall();

                $cond = " `in_relation`='workLocation' ";

                $depart = $select->getallCond($table,$cond);

                  if($depart != "") 

                  {

                    foreach($depart as $dp)

                    {

                    ?>

                    <tr>

                      <td><?php echo $dp['in_sno'];?></td>

                      <td><?php echo $dp['in_prefix'];?></td>

                      <td class="text-center"><a href="?loc=<?php echo $dp['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>

                      <td class="text-center"><a href="<?php echo BSURL;?>functions/setting.php?case=del&id=<?php echo $dp['in_sno'];?>&tbl=in_master_card" class="text-danger"><i class="fas fa-trash"></i></a></td>

                    </tr>

                    <?php

                    }

                  }

                  else

                  {

                    ?>

                    <tr>

                      <td colspan="2" class="text-center">No Data</td>

                      <tr>

                    <?php

                  }

                ?>

              </table>

                </div>



              



              </div>

              <div class="col-sm-6 col-log-6">

                <div id="googlemap"></div>

                

                

              </div>

              

            </div>

            

          </div>

        </div>

        

        <!-- /.row -->

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

 <script type="text/javascript">

   $(document).ready(function(){



      

      

        $("#city").on('change',function(){

            var city = $("#city").val();



             $.ajax({

              url: 'google-map.php',

              type: 'get',

              data: {city:city},

              success: function (data) {

                $("#googlemap").html(data);

              }

            });

        });





      

      

   });

 </script>

 <script>

const button = document.getElementById('geolocation');



function getLocation(position)

{

  // console.log(position);

  latitue = position.coords.latitude;

  longitude = position.coords.longitude;



  $.ajax({

      url: 'google-map.php',

      type: 'get',

      data: {lat:latitue,lon:longitude},

      success: function (data) {

        $("#googlemap").html(data);

      }

    });



  



}

function failedToGet()

{

  console.log('There was some issue');

}

button.addEventListener('click',function(){

  navigator.geolocation.getCurrentPosition(getLocation, failedToGet);

  

  // document.getElementById("demo").innerHTML = value;



});

</script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>