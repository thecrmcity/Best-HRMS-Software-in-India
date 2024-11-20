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
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <i class="fas fa-broadcast-tower"></i> Document Tracking
            </div>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            <div class="row mb-3">

            </div>
            <div class="table-responsive emptable">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Employee ID</th>
                  <th>Employee Name</th>
                  <th>Designation</th>
                  <th>Department</th>
                  <th>Reporting</th>
                  <th>View</th>
                </thead>
                <tbody>
                  <?php
                    $table = "in_postedocument";
                    $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                    $select = new Selectall();
                    $mstdata = $select->getallCond($table,$cond);
                    if(!empty($mstdata))
                    {
                      $xl =1;
                      foreach($mstdata as $mst)
                      {
                        $emi = $mst["in_empid"];
                        ?>
                        <tr>
                          <td><?php echo $xl;?></td>
                          <td><?php echo $select->empPrefix($emi).$emi?></td>
                          <td><?php echo $select->empName($emi)?></td>
                          <td><?php echo $select->emPosition($emi)?></td>
                          <td><?php echo $select->emDepartment($emi)?></td>
                          <td><?php echo $select->empReporting($emi)?></td>
                          <td><button class="text-danger border-0 showfile" value="<?php echo $emi;?>" id="showfile"><i class="fas fa-file-pdf"></i></button></td>
                        </tr>
                        <?php
                        $xl++;
                      }
                    }
                  ?>
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
  <div class="rightsidewall" id="rightsidewall" style="display:none">
    <div class="innerightside">
        <div class="clearfix">
          <button class="float-right border-0" id="closerightwall">&times;</button>
        </div>
        <div class="docx-track" id="docxtrack">
          
        </div>
    </div>
  </div>
  <script>
    $(document).ready(function(){
      $(".showfile").on('click',function(){
        var showfile = $("#showfile").val();
        $.ajax({
            url : "doc-ajax.php",
            type :"GET",
            data : {case:'showfilelist',id:showfile},
            success :function(data)
            {
              $("#docxtrack").html(data);
            }
        });
        $("#rightsidewall").show();
      });
      $("#closerightwall").on('click', function(){
        $("#rightsidewall").hide();
      });
    });
  </script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>