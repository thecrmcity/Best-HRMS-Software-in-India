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

        <form class="" method="POST" action="<?php echo BSURL;?>functions/task.php?case=teamtask&f=<?php echo $pagename;?>&p=<?php echo $siteaim;?>">

        <div class="card card-primary card-outline">

          <div class="card-header">

            <a href="add-project.php" class="text-danger" ><b> <i class="fas fa-plus"></i> Add Project </b></a>

          </div>

          <div class="card-body">

            <div class="row">

              <div class="col-sm-6 col-md-6">

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Project Name*</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-tags"></i></span>

                    </div>

                    <select class="form-control rounded-0" name="project">

                      <option value="">--Select--</option>

                      <?php

                        $xl = 1;

                        $table = "in_project";

                        $cond = " `in_category`='project' ";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if($selData != "") 

                        {

                          foreach($selData as $sel)

                          {

                          ?>

                          <option value="<?php echo $sel['in_proname'];?>"><?php echo $sel['in_proname'];?></option>

                          <?php

                          }

                        }

                          ?>

                      

                    </select>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Date & Time*</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="date" class="form-control rounded-0" name="prodate" required>

                    

                    <input type="text" class="form-control rounded-0" name="protime" placeholder="Invested Hours" required>

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0 bg-info"><i class="fas fa-clock"></i></span>

                    </div>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Start Date*</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="date" class="form-control rounded-0" name="startdate" required>

                    

                   </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Billing Month</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="text" class="form-control rounded-0" name="billingmonth" placeholder="Billing Month">

                    <select class="form-control rounded-0" name="taskmodular">

                      <option value="">--Select--</option>

                      <?php

                        $xl = 1;

                        $table = "in_project";

                        $cond = " `in_category`='task' ";

                        $select = new Selectall();

                        $selData = $select->getallCond($table,$cond);

                        if($selData != "") 

                        {

                          foreach($selData as $sel)

                          {

                          ?>

                          <option value="<?php echo $sel['in_proname'];?>"><?php echo $sel['in_proname'];?></option>

                          <?php

                          }

                        }

                          ?>

                      

                    </select>

                   </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Primary</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="text" class="form-control rounded-0" name="primaryres" placeholder="Assigned by">

                    <input type="text" class="form-control rounded-0" name="otherrepon" placeholder="Other Responsible">

                   </div>

                </div>

              </div>

              <div class="col-sm-6 col-md-6">

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Report Type</label>

                  <div class="input-group col-sm-8">

                    <select class="form-control rounded-0" name="reportype">

                      <option value="">Report Type</option>

                      <option value="sod">SOD</option>

                      <option value="eod">EOD</option>

                    </select>

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Complete <span id="textInput">%</span></label>

                  <div class="input-group col-sm-8">

                    

                    <input type="range" class="form-control-range rounded-0" name="complete" min="0" max="100" onchange="updateTextInput(this.value);" value="0">

                  </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">End Date*</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="date" class="form-control rounded-0" name="enddate" required>

                    

                   </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Parent / Sub</label>

                  <div class="input-group col-sm-8">

                    

                    <input type="text" class="form-control rounded-0" name="parentask" placeholder="Parent Task">

                    <input type="text" class="form-control rounded-0" name="subtask" placeholder="Sub Task">

                   </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-4 col-form-label">Dependencies</label>

                  <div class="input-group col-sm-8">

                    <div class="input-group-prepend">

                      <span class="input-group-text rounded-0"><i class="fas fa-user"></i></span>

                    </div>

                    <input type="text" class="form-control rounded-0" name="dependenci">

                    

                   </div>

                </div>

              </div>

            </div>

            <div class="form-group row">

                  <label class="col-sm-2 col-form-label">Any Remarks</label>

                  <div class="input-group col-sm-10">

                    

                    <textarea class="form-control rounded-0" name="remarks" id="compose-textarea" style="width: 100%;"></textarea>

                   </div>

                </div>

          </div>

          <div class="card-footer">

            <div class="clearfix">

              <input type="submit" name="savetask" value="Save" class="btn btn-primary px-5 float-right">

            </div>

          </div>

        </div>

        <!-- /.row -->

        </form>

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>

<script>

  $(function () {



    $('#compose-textarea').summernote()

  })

  function updateTextInput(val) {

          document.getElementById('textInput').innerHTML = val + '%'; 

        }

</script>