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
              Club Leave Group
            </div>
          </div>
          <div class="card-body">
            <form class="" method="POST" action="<?php echo BSURL;?>functions/leave.php?case=clubleave">
              <div class="form-group row">
                <div class="col-sm-4 col-lg-4">
                  <label class="col-form-label">Group Name</label>
                <input type="text" name="clubgroup" class="form-control rounded-0">
                <label class="col-form-label">Leave Type</label>
                  <?php
                  $table = "in_leavetype";
                  $cond = " `in_comid`='$comid' AND `in_status`='1' ";
                  $select = new Selectall();
                  $sleave = $select->getallCond($table,$cond);
                  if(!empty($sleave))
                  {
                    foreach($sleave as $sl)
                    {
                      $abs = $sl['in_abbreviation'];
                      if($abs != "LOP")
                      {
                    ?>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text rounded-0"><input type="checkbox" name="leavid[]" value="<?php echo $sl['in_sno'];?>"></div>
                        <input type="number" name="priority[]" min="1" class="form-control rounded-0" placeholder="Priority" style="width:100px">
                      </div>
                      <span class="form-control rounded-0"><?php echo $sl['in_leavetype'];?></span>
                      <div class="input-group-append">
                        
                      </div>
                    </div>

                    <?php
                      }
                    }
                  }
                  ?>
                  <label class="col-form-label">Assign to</label>
                  <select class="form-control rounded-0" name="assignto" id="assignto">
                    <option value="">--Select--</option>
                    <option value="Allemployee">All Employee</option>
                    <option value="Department">Department</option>
                    <option value="Designation">Designation</option>

                  </select>
                  <div class="department" id="department" style="display: none;">
                    <label class="col-form-label">Department</label>
                    <select class="form-control rounded-0" id="seldepart">
                      <option value="">--Select--</option>
                      <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='department' AND `in_status`='1' ";
                        $select = new Selectall();
                        $depat = $select->getallCond($table,$cond);
                        if(!empty($depat))
                        {
                          foreach($depat as $depa)
                          {
                            ?>
                            <option value="<?php echo $depa['in_sno'];?>"><?php echo $depa['in_prefix'];?></option>
                            <?php
                          }

                        }
                      ?>
                      
                    </select>
                  </div>
                  <div class="designation" id="designation" style="display: none;">
                    <label class="col-form-label">Designation</label>

                    <select class="form-control rounded-0" id="seldesign">
                      <option value="">--Select--</option>
                      <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='designation' AND `in_status`='1' ";
                        $select = new Selectall();
                        $depat = $select->getallCond($table,$cond);
                        if(!empty($depat))
                        {
                          foreach($depat as $depa)
                          { 
                           
                            ?>
                            <option value="<?php echo $depa['in_sno'];?>"><?php echo $depa['in_prefix'];?></option>
                            <?php
                            
                          }

                        }
                      ?>
                      
                    </select>
                  </div>
                  <div class="form-group mt-3">
                    <div class="clearfix">
                      <button type="submit" class="btn btn-primary px-3 float-right"><i class="fas fa-save"></i> Save</button>
                    </div>
                    
                  </div>
                </div>
                <div class="col-sm-8 col-lg-8">
                  <div class="table-responsive emptable">
                    <table class="table table-bordered">
                      <thead class="bg-secondary">
                        <th>No</th>
                        <th>EmpID</th>
                        <th>Employee_Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th width="50px">
                          <div class="custom-control custom-switch">
                            <input type="checkbox" class="chk_all custom-control-input" id="customSwitch1">
                           <label class="custom-control-label" for="customSwitch1"></label>
                          </div>
                        </th>
                      </thead>
                      <tbody id="empdata">
                        
                      </tbody>
                    </table>
                  </div>
                </div>

                
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
  <script type="text/javascript">
  $(document).ready(function(){
    $(".chk_all").click(function(){
      $(".chk_me").prop('checked', this.checked);
    });
  });


</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#assignto").on('change', function(){
      var assign = $("#assignto").val();
      switch(assign)
      {
        case"Department":
          $("#department").show();
          $("#designation").hide();
        break;
        case "Designation":
          $("#designation").show();
          $("#department").hide();
        break;
      default:
        $("#designation").hide();
          $("#department").hide();
          break;
      }
      
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#seldesign").on('change', function(){
      var seldesign = $("#seldesign").val();
      $.ajax({
        url:'ajax-leave.php',
        type:'get',
        data:{case:'designation',id:seldesign},
        success:function(data)
        {
          $("#empdata").html(data);
        }
      });
    });

    $("#seldepart").on('change', function(){
      var seldepart = $("#seldepart").val();
      $.ajax({
        url:'ajax-leave.php',
        type:'get',
        data:{case:'department',id:seldepart},
        success:function(data)
        {
          $("#empdata").html(data);
        }
      });
    });

    $("#assignto").on('change', function(){
      var assign = $("#assignto").val();
      $.ajax({
        url:'ajax-leave.php',
        type:'get',
        data:{case:'allemployee'},
        success:function(data)
        {
          $("#empdata").html(data);
        }
      });
    });

  });
</script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>