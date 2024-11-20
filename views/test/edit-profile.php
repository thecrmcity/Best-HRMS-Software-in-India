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

              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active"><?php echo ucwords($sitename);?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <?php
      if(isset($_GET['id']))
      {
        $id = $_GET['id'];
        $table = "in_employee";
        $cond = " `in_empid`='$id' ";
        $select = new Selectall();
        $res = $select->getcondData($table,$cond);

        $design = $res['in_designation'];
        $table = "in_master_card";
        $cond = " `in_sno`='$design' ";
        $select = new Selectall();
        $desi = $select->getcondData($table,$cond);

        $dept = $res['in_department'];
        $table = "in_master_card";
        $cond = " `in_sno`='$dept' ";
        $select = new Selectall();
        $depart = $select->getcondData($table,$cond);

        $mng = $res['in_reporting'];
        $table = "in_master_card";
        $cond = " `in_sno`='$mng' ";
        $select = new Selectall();
        $mnge = $select->getcondData($table,$cond);

        $rol = $res['in_groupid'];
        $table = "in_master_card";
        $cond = " `in_sno`='$rol' ";
        $select = new Selectall();
        $role = $select->getcondData($table,$cond);

        $pay = $res['in_payscale'];
        $table = "in_payscale";
        $cond = " `in_sno`='$pay' ";
        $select = new Selectall();
        $pys = $select->getcondData($table,$cond);


      }
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <form class="" method="POST" action="<?php echo BSURL;?>functions/employee.php?case=updatempoy&id=<?php echo $id;?>">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="card-title"> <i class="fas fa-list"></i> Basic Information</div>
                <div class="card-tools">
                  <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
              </div>
              <div class="card-body">
              
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">First Name*</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" placeholder="Name" name="fname" value="<?php echo $res['in_fname'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Last Name</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" placeholder="Name" name="lname" value="<?php echo $res['in_lname'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Father Name*</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" placeholder="Father Name" name="fthername" required value="<?php echo $res['in_fathernam'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Company Email*</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control rounded-0" placeholder="Email" name="useremail" required value="<?php echo $res['in_email'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Personal Email</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control rounded-0" placeholder="Email" name="persemail" value="<?php echo $res['in_pemail'];?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Date Of Birth*</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="date" class="form-control rounded-0" name="dateofbirth" required value="<?php echo $res['in_dateofbirth'];?>">

                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Mobile No*</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="tel" class="form-control rounded-0" placeholder="Mobile" name="mobileone" required value="<?php echo $res['in_mobileno'];?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Other No</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="tel" class="form-control rounded-0" placeholder="Mobile" name="othermobile" value="<?php echo $res['in_othercontact'];?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Gender</label>
                  <div class="input-group col-sm-8">
                    
                    <select class="form-control rounded-0" name="gender">
                      <option hidden><?php echo $res['in_gender'];?></option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Third">Third Gender</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Local Address</label>
                  <div class="input-group col-sm-8">
                    
                    <textarea class="form-control rounded-0" name="localaddres"><?php echo $res['in_localaddress'];?> </textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Permanment Address</label>
                  <div class="input-group col-sm-8">
                    
                    <textarea class="form-control rounded-0" name="permanment"><?php echo $res['in_permanant'];?> </textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Nationality</label>
                  <div class="input-group col-sm-8">
                    <input type="text" class="form-control rounded-0" name="national" value="<?php echo $res['in_nationality'];?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Family Contact*</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="text" class="form-control rounded-0" name="familyname" required placeholder="Name" value="<?php echo $res['in_famlyname'];?>">
                    <input type="text" class="form-control rounded-0" name="relation" required placeholder="Relation" value="<?php echo $res['in_relation'];?>">
                    <input type="tel" class="form-control rounded-0" name="familycontact" required placeholder="Mobile" value="<?php echo $res['in_famlycont'];?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Reference</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" name="refrenone" value="<?php echo $res['in_reference'];?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Marital Status*</label>
                  <div class="input-group col-sm-8">
                    
                    <select class="form-control rounded-0" name="marital" required>
                      <option hidden><?php echo $res['in_marital'];?></option>
                      <option value="Married">Married</option>
                      <option value="Widowed">Widowed</option>
                      <option value="Separated">Separated</option>
                      <option value="Divorced">Divorced</option>
                      <option value="Single">Single</option>

                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Photo</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="file" class="form-control rounded-0" name="profile">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Bio</label>
                  <div class="input-group col-sm-8">
                    
                    <textarea class="form-control rounded-0" name="comment"><?php echo $res['in_comment'];?> </textarea>
                  </div>
                </div>
              </div>
              
            </div> <!-- /.close info -->
            <script type="text/javascript">
              $(document).ready(function(){
              $("#proeducate").click(function(){
                  
                  var lastField = $("#education div:last");
                  var fieldWrapper = $("<div class=\"form-group row\" />");
                  
                  var sName = $("<div class=\"input-group col-lg-12\"><input type=\"text\" class=\"form-control rounded-0\" name=\"eduname[]\" placeholder=\"Name...\"><input type=\"text\" class=\"form-control rounded-0\" name=\"board[]\" placeholder=\"Board...\">");
                  var lName = $("<div class=\"input-group col-sm-11\"><input type=\"text\" class=\"form-control rounded-0\" name=\"eduyear[]\" placeholder=\"Year...\"><input type=\"text\" class=\"form-control rounded-0\" name=\"marks[]\" placeholder=\"Marks..\"/><input type=\"file\" class=\"form-control rounded-0\" name=\"upload[]\"/>");
                  var removeButton = $("<div class=\"input-group-prepend\"><span class=\"input-group-text rounded-0 bg-danger remove\"><i class=\"fas fa-minus\"></i></span>");
                  removeButton.click(function() {
                      $(this).parent().remove();
                  });
                  
                  fieldWrapper.append(sName);
                  fieldWrapper.append(lName);
                  fieldWrapper.append(removeButton);
                  $("#education").append(fieldWrapper);
              });
          });
            </script>
            <div class="empinfo mb-3">
                <div class="d-flex justify-content-between">
                  <h4>Education</h4>
                <button type="button" class="bg-secondary border-0" id="proeducate"><i class="fas fa-plus"></i></button>
                </div>
                
                <hr>
                <div class="" id="education"></div>
                
                
                
                
              </div>
            <script type="text/javascript">
              $(document).ready(function(){
              $("#proupload").click(function(){
                  
                  var lastField = $("#professional div:last");
                  var fieldWrapper = $("<div class=\"form-group row\" />");
                  
                  var sName = $("<div class=\"input-group col-lg-12\"><input type=\"text\" class=\"form-control rounded-0\" name=\"company[]\" placeholder=\"Company Name...\"><input type=\"text\" class=\"form-control rounded-0\" name=\"position[]\" placeholder=\"Position...\">");
                  var lName = $("<div class=\"input-group col-sm-11\"><input type=\"date\" class=\"form-control rounded-0\" name=\"fromdate[]\" placeholder=\"From...\"><input type=\"date\" class=\"form-control rounded-0\" name=\"fromend[]\" placeholder=\"End..\"/><input type=\"file\" class=\"form-control rounded-0\" name=\"uploadcom[]\"/>");
                  var removeButton = $("<div class=\"input-group-prepend\"><span class=\"input-group-text rounded-0 bg-danger remove\"><i class=\"fas fa-minus\"></i></span>");
                  removeButton.click(function() {
                      $(this).parent().remove();
                  });
                  
                  fieldWrapper.append(sName);
                  fieldWrapper.append(lName);
                  fieldWrapper.append(removeButton);
                  $("#professional").append(fieldWrapper);
              });
          });
            </script>
            <div class="empinfo mb-3">
                <div class="d-flex justify-content-between">
                  <h4>Professional</h4>
                <button type="button" class="bg-secondary border-0" id="proupload"><i class="fas fa-plus"></i></button>
                </div>
                
                <hr>
                <div class="" id="professional"></div>
                
                
                
                
              </div>
            
          </div>
            <div class="col-sm-6">
              
              
              <div class="card card-secondary card-outline">
                <div class="card-header">
                  <div class="card-title"> <i class="fas fa-industry"></i> Company Details</div>
                  <div class="card-tools">
                    <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    
                  </div>
                </div>
                <div class="card-body">
                
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Department*</label>
                  <div class="input-group col-sm-8">
                    
                    <select class="form-control rounded-0" name="department" required>
                      <option hidden><?php echo $depart['in_prefix'];?></option>
                      <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='department'";
                        $select = new Selectall();
                        $selData = $select->getallCond($table,$cond);
                        if(!empty($selData))
                        {
                        foreach($selData as $sel)
                        {
                          ?>
                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                          <?php
                        }
                      }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Designation*</label>
                  <div class="input-group col-sm-8">
                    
                    <select class="form-control rounded-0" name="designation" required>
                      <option hidden><?php echo $desi['in_prefix'];?></option>
                      <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='designation' ";
                        $select = new Selectall();
                        $selData = $select->getallCond($table,$cond);
                        if(!empty($selData))
                        {
                        foreach($selData as $sel)
                        {
                          ?>
                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                          <?php
                        }
                      }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">DOJ*</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="date" class="form-control rounded-0" name="dateofjoin" required value="<?php echo $res['in_dateofjoining'];?>">

                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Manager*</label>
                  <div class="input-group col-sm-8">
                    
                    <select class="form-control rounded-0" name="reporting" required>
                      <option value="<?php echo $mnge['in_sno'];?>"><?php echo $mnge['in_prefix'];?></option>
                      <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='manages' ";
                        $select = new Selectall();
                        $selData = $select->getallCond($table,$cond);
                        if(!empty($selData))
                        {
                        foreach($selData as $sel)
                        {
                          ?>
                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                          <?php
                        }
                      }
                      ?>

                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Role*</label>
                  <div class="input-group col-sm-8">
                    
                    <select class="form-control rounded-0" name="role" required>
                      <option value="<?php echo $role['in_sno'];?>"><?php echo $role['in_prefix'];?></option>
                      <?php
                        $table = "in_master_card";
                        $cond = " `in_relation`='groups' ";
                        $select = new Selectall();
                        $selData = $select->getallCond($table,$cond);
                        if(!empty($selData))
                        {
                        foreach($selData as $sel)
                        {
                          ?>
                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_prefix'];?></option>
                          <?php
                        }
                      }
                      ?>

                    </select>
                  </div>
                </div>
              </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <div class="card-title"> <i class="fas fa-money-bill"></i> Salary Details</div>
                  <div class="card-tools">
                    <button type="button" class="btn bg-primary btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    
                  </div>
                </div>
                <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Salary*</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0 bg-success"><i class="fas fa-rupee-sign"></i></span>
                    </div>
                    <input type="password" class="form-control rounded-0" name="salary" placeholder="Salary" required value="<?php echo $res['in_salary'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Payscale*</label>
                  <div class="input-group col-sm-8">
                    
                    <select class="form-control rounded-0" name="payscale" required>
                      <option value="<?php echo $pys['in_sno'];?>"><?php echo $pys['in_namescle'];?></option>
                      <?php
                        $table = "in_payscale";
                        $cond = " `in_category` = 'payscale'";
                        $select = new Selectall();
                        $selData = $select->getallCond($table,$cond);
                        foreach($selData as $sel)
                        {
                          ?>
                          <option value="<?php echo $sel['in_sno'];?>"><?php echo $sel['in_namescle'];?></option>
                          <?php
                        }
                      ?>

                    </select>
                  </div>
                </div>
              </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <div class="card-title"> <i class="fas fa-wallet"></i> Employee Payroll</div>
                  <div class="card-tools">
                    <button type="button" class="btn bg-secondary btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    
                  </div>
                </div>
                <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">PAN No *</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-money-check-alt"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" name="panno" placeholder="Pan No" value="<?php echo $res['in_panno'];?>" id="propan" onkeyup="propanno()" maxlength="10" required>
                    <label class="col-form-label mx-3">TDS</label>
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><input type="checkbox" name="tdscheck" value="1" <?php $tds = $res['in_tds']; echo $tds=="1" ? "checked":"";?>></span>

                    </div>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">PF No</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><input type="checkbox" name="pfcheck" value="1" <?php $pfs = $res['in_pfaccess']; echo $pfs =="1" ? "checked":"";?>></span>

                    </div>
                    <input type="text" class="form-control rounded-0" name="pfno" value="<?php echo $res['in_pfnumber'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">PF Effective</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="date" class="form-control rounded-0" name="pfdate" value="<?php echo $res['in_pfeffective'];?>">

                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">ESI No</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><input type="checkbox" name="esicheck" value="1" <?php $esi = $res['in_esiaccess']; echo $esi=="1" ? "checked":"";?>></span>

                    </div>
                    <input type="text" class="form-control rounded-0" name="esino" value="<?php echo $res['in_esinumber'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">ESI Effective</label>
                  <div class="input-group col-sm-8">
                    
                    <input type="date" class="form-control rounded-0" name="esidate" value="<?php echo $res['in_esiceffective'];?>">

                  </div>
                </div>
              </div>
              </div>
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <div class="card-title"> <i class="fas fa-piggy-bank"></i> Bank Details</div>
                  <div class="card-tools">
                    <button type="button" class="btn bg-secondary btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    
                  </div>
                </div>
                <div class="card-body">

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">A/C Holder</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0 bg-primary"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" name="acholder" value="<?php echo $res['in_holder'];?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">A/C No</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0">A/C</span>
                    </div>
                    <input type="tel" class="form-control rounded-0" name="acontno" value="<?php echo $res['in_acnumber'];?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Bank Name</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0"><i class="fas fa-landmark"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" name="bankname" value="<?php echo $res['in_bankname'];?>" >
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Bank Branch</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0">BR</span>
                    </div>
                    <input type="text" class="form-control rounded-0" name="branch" value="<?php echo $res['in_branch'];?>">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">IFSC Code</label>
                  <div class="input-group col-sm-8">
                    <div class="input-group-prepend">
                      <span class="input-group-text rounded-0">IFC</span>
                    </div>
                    <input type="text" class="form-control rounded-0" name="ifscode" value="<?php echo $res['in_ifcscode'];?>">
                  </div>
                </div>
              </div>
              </div>
            </div>

        </div>
        <!-- /. close row -->
        <div class="row">
          <div class="col-12">
            <div class="empinfo mb-3 text-center">
                <input type="submit" name="saveinfo" value="Save Information" class="btn btn-primary px-5">
              </div>
          </div>
        </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="<?php echo BSURL;?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo BSURL;?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?php echo BSURL;?>assets//dist/js/pages/employee.js"></script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>