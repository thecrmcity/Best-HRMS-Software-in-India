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
              <i class="fas fa-users"></i> Interview Process
            </div>
            <div class="card-tools">
              <a href="<?php echo VIEW.$pagename?>/interviews.php" class="font-weight-bold text-dark"><i class="fas fa-list"></i> Interview List</a>
            </div>
          </div>
          <div class="card-body">
            <?php
            if(isset($_GET['id']))
            {
              $id = $_GET['id'];
              $table = "in_candidates";
              $cond = " `in_interviewsatus`='' ";
              $select = new Selectall();
              $cans = $select->getcondData($table, $cond);
              if($cans != "")
              {
                ?>
                 <form class="" method="POST" action="<?php echo BSURL;?>functions/candidates.php?case=createinterview" enctype="multipart/form-data">
              <div class="empinfo">
                <h4 class="mb-4">Basic Information</h4>
              <div class="row">
                <div class="col-sm-3 col-lg-3">
                  <div class="form-group">
                      <span class="">Inteview Type*</span>
                      <div class="input-group"><select class="form-control" name="interviewtype" required>
                        <option value="">--Select--</option>
                        <option value="General Interview">General Interview</option>
                        <option value="Online Interview">Online Interview</option>
                        <option value="Phone Interview">Phone Interview</option>
                        <option value="Internal Interview">Internal Interview</option>
                        <option value="Other Interview">Other Interview</option>

                      </select></div>
                    </div>
                  </div>
                <div class="col-sm-1 col-lg-1"></div>
                <div class="col-sm-3 col-lg-3">
                  <div class="form-group">
                    <span class="">Candidate Name*</span>
                    <div class="input-group">
                      <input type="hidden" value="<?php echo $id?>" name="canid">
                      <input type="text" name="canname" class="form-control" value="<?php echo $cans['in_caname']?>">
                    </div>
                  </div>
                </div>
                <div class="col-sm-1 col-lg-1"></div>
                <div class="col-sm-3 col-lg-3">
                  <div class="form-group">
                    <span class="">Client Name (Reference)</span>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-industry"></i></span>
                      </div>
                      <input type="text" name="clientname" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="col-sm-1 col-lg-1"></div>

                <div class="col-sm-3 col-lg-3">
                  <div class="form-group">
                    <span class="">Job Title*</span>
                    <div class="input-group">
                      <input type="hidden" name="jobtitle" class="form-control" value="<?php echo $cans['in_applypost'];?>">
                      
                      <span class=""><?php $apost = $cans['in_applypost']; echo $select->applyPost($apost)?></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1 col-lg-1"></div>

                <div class="col-sm-3 col-lg-3">
                  <div class="form-group">
                    <span class="">Interview Date*</span>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      </div>
                      <input type="date" name="fromdate" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="col-sm-1 col-lg-1"></div>

                <div class="col-sm-3 col-lg-3">
                    <div class="form-group">
                      <span class="">Any Attachment</span>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-paperclip"></i></span>
                        </div>
                        <input type="file" name="anyattach" class="form-control">
                      </div>
                    </div>
                  </div>
                <div class="col-sm-1 col-lg-1"></div>
                

                </div>
              </div>
              <div class="empinfo mt-3">
                <h4 class="mb-4">Create Interview</h4>
                <script type="text/javascript">

                        $(document).ready(function(){
                            var count = 0;
                            $("#proupload").click(function(){
                                var lastField = $("#professional div:last");
                                var fieldWrapper = $("<tr/>");
                                count++;
                                var fName = $("<td><span> Round "+count+"</span></td>");
                                var interview = $("<td><select class=\"form-control\" name=\"interviewer[]\"><option value=\"\">--Select--</option><?php
                                  $table = "in_master_card";
                                  $cond = " `in_relation`= 'masterDesignation' ";
                                  $select = new Selectall();
                                  $inter = $select->getallCond($table,$cond);
                                  if(!empty($inter))
                                  {
                                    foreach($inter as $int)
                                    {
                                      $ints = $int['in_sno'];
                                      $table = "in_employee";
                                      $cond = " `in_designation`='$ints' AND `in_delete`='1' ";
                                      $select = new Selectall();
                                      $emt = $select->getcondData($table,$cond);
                                      if($emt != "")
                                      {
                                        ?><optgroup label=\"<?php echo $emt['in_fname']?> <?php echo $emt['in_lname']?>\"><option value=\"<?php echo $emt['in_empid'];?>\" class=\"ints\"> (<?php echo $int['in_prefix']?>)</option></optgroup><?php
                                      }
                                      
                                    }
                                  }?></td>");
                                var sName = $("<td><select class=\"form-control\" name=\"assets[]\" ><option value=\"\">--Select--</option><?php
                                $table = "in_master_card";
                                $cond = " `in_relation`='Assessment' AND `in_status`='1' ";
                                $select = new Selectall();
                                $asset = $select->getallCond($table, $cond);
                                if(!empty($asset))
                                {
                                  foreach($asset as $ast)
                                  {
                                    ?><option value=\"<?php echo $ast['in_sno'];?>\"><?php echo $ast['in_prefix'];?></option><?php
                                  }
                                }?></td>");
                                var removeButton = $("<td><span class=\"input-group-text rounded-0 bg-danger remove\"><i class=\"fas fa-times\"></i></span>");
                                removeButton.click(function() {
                                    $(this).parent().remove();
                                    count--;
                                });

                            

                            
                            fieldWrapper.append(fName);
                            fieldWrapper.append(interview);
                            fieldWrapper.append(sName);
                            fieldWrapper.append(removeButton);
                            $("#professional").append(fieldWrapper);

                            });

                        });
                    </script>
                    <table class="table table-bordered">
                        <thead class="bg-secondary">
                            <th>Round</th>
                            <th>Interviewer(s)</th>
                            <th>Assessment</th>
                            <th width="50px"><button type="button" class="form-control form-control-sm" id="proupload"><i class="fas fa-plus"></i></button></th>
                        </thead>
                        <tbody id="professional">
                            
                        </tbody>

                    </table>
              </div>
              <div class="form-group">
                  <span class="">&nbsp;</span>
                  <div class="clearfix">
                    
                    <input type="submit" class="btn btn-primary float-right" value="Submit">
                  </div>
                </div>
            </form>
                <?php
              }
            }
            ?>
           
          </div>
        </div>
        

        <!-- /.row -->

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->
<style type="text/css">
  optgroup
  {
    font-size: 12px;
  }
</style>
  

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>