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
                if(isset($_GET['comit']))
                {
                  $id = $_GET['comit'];
                  $table = "in_worldcity";
                  $cond = " `in_sno`='$id'";
                  $select = new Selectall();
                  $pre = $select->getcondData($table,$cond);
                  if($pre != "")
                  {
                    
                    $country = $pre['in_country'];
                    $state = $pre['in_statename'];
                    $scode = $pre['in_stateid'];
                    $city = $pre['in_cityname'];
                    $status = $pre['in_status'];
                    $act = "editcity&id=".$id;
                  }
                  
                }
                else
                {
                  $act = "pinkcity";
                  $country = "--Select--";
                  $state = "";
                  $scode = "";
                  $city = "";
                  $status = "";
                  $conid = "";
                }
                
                
              ?>

              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">
                <div class="form-group">
                  <label>Add World City</label>
                  <div class="form-group">
                    <select class="form-control rounded-0" required name="country" id="country">
                    <option value="<?php echo $country;?>"><?php echo $country;?></option>
                    <?php
                    $table = "in_countries";
                    $cond = " `in_status`='1' ";
                    $select = new Selectall();
                    $cont = $select->getallCond($table,$cond);
                    if(!empty($cont))
                    {
                      foreach($cont as $cn)
                      {
                        ?>
                        <option value="<?php echo $cn['in_country'];?>"><?php echo $cn['in_country'];?></option>
                        <?php
                      }
                    }
                    ?>

                  </select>
                  </div>
                  
                  <div class="input-group mb-3">
                    
                  <input type="text" class="form-control" name="state" placeholder="State" required value="<?php echo $state;?>" id="pstate">
                  <input type="text" class="form-control" name="scode" placeholder="State Code" required value="<?php echo $scode;?>" >
                  
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><input type="checkbox" name="comactive" value="1" <?php echo $status == "1" ? "checked":"";?>></span>
                    </div>
                  <input type="text" class="form-control" name="city" placeholder="City Name" required value="<?php echo $city;?>" id=city>
                  
                  <div class="input-group-append">
                    <button type="submit" class="input-group-text">Go</button>
                  </div>
                </div>
                </div>
              </form>
              
            </div>
                
              

              

              </div>
              <div class="col-sm-6 col-log-6">
                <div id="googlemap"></div>
                
                
              </div>
              
            </div>
            <div class="table-responsive emptable">
                  <table class="table table-bordered table-striped">
                <tr class="bg-primary sticky-top">
                  <td>ID</td>
                  <td>Country</td>
                  <td>State</td>
                  <td>Code</td>
                  <td>City Name</td>
                  <td>Status</td>
                  <td class="text-center"><span class="fas fa-edit"></span></td>
                  <td class="text-center"><span class="fas fa-trash"></span></td>

                </tr>
                <?php
                $table = "in_worldcity";
                $cond = " `in_status`='1'";
                $select = new Selectall();
                $com = $select->getallCond($table,$cond);
                  if($com != "") 
                  {
                    foreach($com as $cm)
                    {   
                      
                    ?>
                    <tr>
                      <td><?php echo $cm['in_sno'];?></td>
                      <td><?php echo $cm['in_country'];;?></td>
                      <td><?php echo $cm['in_statename'];?></td>
                      <td><?php echo $cm['in_stateid'];?></td>
                      <td><?php echo $cm['in_cityname'];?></td>

                      <td><?php $status = $cm['in_status']; echo $status == "1" ? "Active": "Inactive";?></td>
                      <td class="text-center"><a href="?comit=<?php echo $cm['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a></td>
                      <td class="text-center"><a href="<?php echo BSURL;?>functions/setting.php?case=delstate&id=<?php echo $cm['in_sno'];?>" class="text-danger" onclick="return confirm('Are you Sure!')"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    <?php
                    }
                  }
                  else
                  {
                    ?>
                    <tr>
                      <td colspan="4" class="text-center">No Data</td>
                      <tr>
                    <?php
                  }
                ?>
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
 <script type="text/javascript">
   $(document).ready(function(){

      
      $("#country").on('change',function(){
        var country = $("#country").val();

         $.ajax({
            url: 'google-map.php',
            type: 'get',
            data: {cont:country},
            success: function (data) {
              $("#googlemap").html(data);
            }
          });

        $("#pstate").on('change',function(){
            var state = $("#pstate").val();

            $.ajax({
            url: 'google-map.php',
            type: 'get',
            data: {cont:country,st:state},
            success: function (data) {
              $("#googlemap").html(data);
            }
          });
        $("#city").on('change',function(){
            var city = $("#city").val();

             $.ajax({
              url: 'google-map.php',
              type: 'get',
              data: {cont:country,st:state,city:city},
              success: function (data) {
                $("#googlemap").html(data);
              }
            });
        });


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