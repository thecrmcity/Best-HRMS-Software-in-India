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
    <?php
    if(isset($_POST['savecheck']))
    {
      $alloc = $_POST['alloc'];
      echo $alloc;
    }
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php
        if(isset($_GET['id']))
        {
          $id = $_GET['id'];
          
          $show = "show";
          $table = "in_empform";
          $cond = " `in_sno`='$id' ";
          $select = new Selectall();
          $fils = $select->getcondData($table,$cond);
          if($fils != "")
          {
            $fieldname = $fils['in_fieldname'];
            $class = $fils['in_classname'];
            $fieldtype = $fils['in_fieldtype'];
            $mandatory = $fils['in_mandatory'];
            $hold = $fils['in_holder'];
            $status = $fils['in_status'];
            $orderid = $fils['in_orderid'];
            $clname = $fils['in_column'];
            $editing = $fils['in_groupid'];

            $table = "in_super_card";
            $cond = " `in_sno`='$editing' AND `in_cardrelation`='majorcard' ";
            $select = new Selectall();
            $grding = $select->getcondData($table,$cond);
            if($grding != "")
            {
              $gdname = $grding['in_cardname'];
            }
            else
            {
              $gdname = "";
            }

            $act = "editform&id=$id&cl=$clname";
          }
        }
        else
        {
          $show = "";
          $fieldname = "";
          $mandatory = "";
          $hold = "";
          $status = "";
          $fieldtype = "--Select--";
          $class = "--Select--";
          $act = "modifyform";
          $orderid = "";
          $editing = "";

        }
        ?>
        
        <div class="card rounded-0" id="accordion">
          <div id="collapseOne" class="collapse <?php echo $show;?>" data-parent="#accordion">
              <div class="card-body headcolor">
                  <form class="" method="POST" action="<?php echo BSURL;?>functions/employee.php?case=<?php echo $act;?>">
                    <div class="row">
                    <div class="col-sm-6 col-lg-6">
                      <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Field Name</label>
                      <div class="input-group col-sm-8">
                        <div class="input-group-prepend">
                          <span class="input-group-text rounded-0"><input type="checkbox" name="fieldactive" value="1" <?php echo $status == "1" ? "checked" : ""; ?>></span>
                        </div>
                        <input type="text" class="form-control rounded-0" name="fieldname" required placeholder="Label Name" value="<?php echo $fieldname;?>">
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-sm-4 col-form-label">Field Set</label>
                      <div class="input-group col-sm-8">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="mandatory" name="mandatory" value="1" <?php echo $mandatory == "1" ? "checked" : ""; ?>>
                          <label class="custom-control-label" for="mandatory">Mandatory</label>
                          </div>
                          <div class="custom-control custom-switch ml-3">
                          <input type="checkbox" class="custom-control-input" id="placeholder" name="placeholder" value="1" <?php echo $hold == "1" ? "checked" : ""; ?>>
                          <label class="custom-control-label" for="placeholder">Placeholder</label>
                          </div>
                      </div>
                    </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Field Type</label>
                        <div class="input-group col-sm-8">
                          <select class="form-control rounded-0" required name="fieldtype">
                            <option value="<?php echo $fieldtype;?>"><?php echo $fieldtype;?></option>
                            <option value="text">Text Type</option>
                            <option value="checkbox">Checkbox</option>
                            <option value="radio">Radio Button</option>
                            <option value="file">File Upload</option>
                            <option value="date">Date</option>
                            <option value="time">Time</option>
                            <option value="textarea">Textarea</option>
                            <option value="email">Email Type</option>
                            <option value="number">Number</option>
                            <option value="tel">Telephone</option>
                          </select>
                          <div class="input-group-prepend">
                            <span class="input-group-text rounded-0">Order ID</span>
                          </div>
                          <input type="number" name="orderid" class="form-control rounded-0" value="<?php echo $orderid;?>">
                        </div>
                      </div>
                      <div class="row">
                        <label class="col-sm-4 col-form-label">Parent Class</label>
                        <div class="input-group col-sm-8">
                          <select class="form-control rounded-0" required name="parentclass">
                            <option value="<?php echo $class;?>"><?php echo $class;?></option>
                            <option value="Basic Information">Basic Information</option>
                            <option value="Company Details">Company Details</option>
                            <option value="Salary Details">Salary Details</option>
                            <option value="Employee Payroll">Employee Payroll</option>
                            <option value="Bank Details">Bank Details</option>
                            
                          </select>
                          
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-sm-6 col-lg-6">
                      <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Field Restricted For </label>
                        <div class="input-group col-sm-8">
                          <div class="input-group-prepend">
                            <span class="input-group-text rounded-0">During Editation</span>
                          </div>
                          
                          <select class="form-control rounded-0" required name="editing">
                            <option value="<?php echo $editing;?>"><?php echo $gdname;?></option>
                            <?php
                              $table = "in_super_card";
                              $cond = " in_cardrelation='majorcard' ";
                              $select = new Selectall();
                              $mod = $select->getallCond($table,$cond);
                              foreach($mod as $md)
                              {
                                ?>
                                <option value="<?php echo $md['in_sno'];?>"><?php echo $md['in_cardname'];?></option>
                                <?php
                              }
                            ?>
                          </select>
                          
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-lg-6">
                      <input type="submit" name="savefield" class="btn btn-dark rounded-0 ml-3">
                    </div>
                    </div>
                    
                    
                  </form>
              </div>
          </div>
          <div class="card-header">
            <div class="card-title">Modify Employee Form</div>

            <div class="card-tools">
            <a href="#collapseOne" data-toggle="collapse" class="text-dark font-weight-bold"><i class="fas fa-plus"></i> Add Form Field</a>
              

          </div>
          </div>

          
        </div>
        <div class="card rounded-0">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>Order</th>
                  <th>Parent Class</th>
                  <th>Field Name</th>
                  <th>Field Type</th>
                  <th>Mandorty</th>
                  <th>Placeholder</th>
                  <th>Restricted_For</th>
                  <th>Status</th>
                  <th><i class="fas fa-edit"></i></th>
                </thead>
                <tbody>
                  <?php
                    $xl=1;
                    $table = "in_empform";
                    $cond = " `in_comid` IN ('$comid','0') ";
                    $select = new Selectall();
                    $selData = $select->getallCond($table,$cond);
                    if(!empty($selData))
                    {
                      foreach($selData as $sel)
                      {
                        $rstri = $sel['in_groupid'];
                        $table = "in_super_card";
                        $cond = " `in_sno`='$rstri' AND `in_cardrelation`='majorcard' ";
                        $select = new Selectall();
                        $grding = $select->getcondData($table,$cond);
                        if($grding != "")
                        {
                          $gdname = $grding['in_cardname'];
                        }
                        else
                        {
                          $gdname = "";
                        }
                        ?>
                        <tr>
                          <td><?php echo $xl;?></td>
                          <td><?php echo $sel['in_orderid'];?></td>
                          <td><?php echo $sel['in_classname'];?></td>
                          <td><?php echo $sel['in_fieldname'];?></td>
                          <td><?php echo $sel['in_fieldtype'];?></td>
                          <td><?php $man = $sel['in_mandatory']; echo $man == "1" ? "Enable" : "Disable"; ?></td>
                          <td><?php $hold = $sel['in_holder']; echo $hold == "1" ? "Enable" : "Disable"; ?></td>
                          <td><?php echo $rstri != "0" ? $gdname : ""; ?></td>
                          <td><?php $status = $sel['in_status']; echo $status == "1" ? "Show" : "Hide"; ?></td>
                          

                          <td><a href="?id=<?php echo $sel['in_sno'];?>" class="text-success"><i class="fas fa-edit"></i></a> <!-- <a href="<?php echo BSURL;?>functions/employee.php?case=formdel&id=<?php echo $sel['in_sno'];?>&tbl=in_empform" class="text-danger ml-3"><i class="fas fa-trash"></i></a> --> </td>
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
  
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>