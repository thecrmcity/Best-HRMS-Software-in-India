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
             <i class="fas fa-list"></i> Hierarchy Form
            </div>
            <div class="card-tools">
              
            </div>
          </div>
          <div class="card-body">
            
            <form class="" method="POST" action="<?php echo BSURL?>functions/setting.php?case='insertHierarchy'">
              <div class="form-group row">
                <div class="col-lg-4 col-md-4">
                  <span>Select Company</span>
                  <select class="form-control" name="com" required>


                        <?php
                      

                        $table = "in_master_card";

                        $cond = " `in_relation`='company' ";

                        $select = new Selectall();

                        $selcom = $select->getallCond($table,$cond);

                        if(!empty($selcom))

                        {

                          foreach($selcom as $sel)

                          {
                            ?>

                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>

                          <?php

                          }

                          

                        }

                        ?>

                      </select>
                </div>
                <div class="col-lg-4 col-md-4">
                  <span>Hierarchy Name</span>
                  <input type="text" name="archyname" class="form-control">
                </div>

                <div class="col-lg-4 col-md-4">
                  <span>Hierarchy For</span>
                  <select class="form-control" name="archypage">
                    <option value="">--Select--</option>
                    <option value="Attendance">Attendance Approval</option>
                    <option value="Leave">Leave Approval</option>
                    <option value="Riebursement">Riebursement Approval</option>
                  </select>
                </div>

                

              </div>
              <script type="text/javascript">

              $(document).ready(function(){

              $("#levels").click(function(){

                  

                  var lastField = $("#leveldata div:last");

                  var fieldWrapper = $("<tr/>");

                  

                  var sName = $("<td><select class=\"form-control rounded-0\" name=\"reporting\"><?php

                        
                          $table = "in_employee";
                          $cond = " `in_compid`='$comid' AND `in_delete`='1' ";
                          $select = new Selectall();
                          $emicode = $select->getallCond($table,$cond);
                          if(!empty($emicode))
                          {
                            foreach($emicode as $amc)
                            {
                              $codname = $amc['in_fname']." ".$amc['in_lname'];
                              $codempi = $amc['in_empid'];
                              $posid = $amc['in_designation'];
                              $select = new Selectall();
                              $gtpos = $select->getPosition($posid);
                                                                                          
                              ?>
                              <optgroup label=\"<?php echo $codname;?>\"><option value=\"<?php echo $codempi;?>\"  <?php echo $res['in_reporting'] == $codempi ? "selected":""; ?> ><?php echo $gtpos;?></option></optgroup><?php
                            }
                            
                          
                          
                        }

                       

                      ?></select></td><td><select class=\"form-control rounded-0\" name=\"heirarchylevel\"><option>Level 1</option><option>Level 2</option><option>Level 3</option><option>Level 4</option><option>Level 5</option><option>Level 6</option><option>Level 7</option></select>");

                  var lName = $("</td><td><input type=\"number\" class=\"form-control rounded-0\" name=\"fromdate[]\" value=\"0\">");

                  var removeButton = $("</td><td><span class=\"input-group-text rounded-0 bg-danger remove\"><i class=\"fas fa-times\"></i></span>");

                  removeButton.click(function() {

                      $(this).parent().remove();

                  });

                  

                  fieldWrapper.append(sName);

                  fieldWrapper.append(lName);

                  fieldWrapper.append(removeButton);

                  $("#leveldata").append(fieldWrapper);

              });

          });

            </script>
            <table class="table table-bordered">

              <thead class="bg-secondary">

                <th>Master Employee</th>

                <th>Level</th>

                <th>Limit Days</th>

                <th><button type="button" id="levels"><i class="fas fa-plus"></i></button></th>

              </thead>

              <tbody id="leveldata">

                

              </tbody>

            </table>
              <div class="clearfix">

                <input type="submit" name="save" class="btn btn-primary px-3 float-right" value="Save">
              </div>

            </form>
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