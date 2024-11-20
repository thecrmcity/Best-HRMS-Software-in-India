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
                    <i class="fas fa-question-circle"></i> Interview Question Form
                </div>
                <div class="card-tools">
                    <a href="#" class="text-dark font-weight-bold" data-toggle="modal" data-target="#assetsbox"><i class="fas fa-question-circle"></i> Create Group</a>
                </div>
            </div>
            <div class="card-body">
                <form class="" method="POST" action="<?php echo BSURL?>functions/candidates.php?case=questionset">
                    <div class="form-group row">
                        
                      <label for="" class="col-lg-2">Assessment Name*</label>
                      <div class="input-group col-lg-4">
                        <select class="form-control" name="quesid" required>
                          <option value="">--Select--</option>
                          <?php
                          $table = "in_master_card";
                          $cond = " in_relation='Assessment' AND `in_status`='1' ";
                          $select = new Selectall();
                          $selup = $select->getallCond($table,$cond);
                          if(!empty($selup))
                          {
                            foreach($selup as $up)
                            {
                              ?>
                              <option value="<?php echo $up['in_sno']?>"><?php echo $up['in_prefix']?></option>
                              <?php
                            }
                          }
                          ?>
                        </select>
                        <div class="input-group-append">
                            
                        </div>
                      </div>
                      <div class="input-group col-lg-2">
                      </div>
                      <div class="input-group col-lg-4">
                        
                      </div>
                      
                                             
                    </div>
                    <script type="text/javascript">

                        $(document).ready(function(){
                            $("#proupload").click(function(){
                                var lastField = $("#professional div:last");
                                var fieldWrapper = $("<tr/>");
                                var sName = $("<td><textarea class='form-control rounded-0' name='question[]'></textarea></td><td><select name='range[]' class='form-control rounded-0'><option value='1'>Yes</option><option value='0'>No</option></select></td><td><select name='comment[]' class='form-control rounded-0'><option value='1'>Yes</option><option value='0'>No</option></select>");
                                var removeButton = $("</td><td><span class=\"input-group-text rounded-0 bg-danger remove\"><i class=\"fas fa-times\"></i></span>");
                                removeButton.click(function() {
                                    $(this).parent().remove();
                                });

                            

                            fieldWrapper.append(sName);
                            fieldWrapper.append(removeButton);
                            $("#professional").append(fieldWrapper);

                            });

                        });
                    </script>
                    <table class="table table-bordered">
                        <thead class="bg-secondary">
                            <th>Question</th>
                            <th width="100px">Rating</th>
                            <th width="150px">Comment Box</th>
                            <th width="50px"><button type="button" class="form-control form-control-sm" id="proupload"><i class="fas fa-plus"></i></button></th>
                        </thead>
                        <tbody id="professional">
                            
                        </tbody>

                    </table>
                    <div class="form-group">
                        <div class="clearfix">
                        <input type="submit" name="" class="float-right btn btn-primary px-3" value="Submit">
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
  <div class="modal fade" id="assetsbox">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Create Assessment Group</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="" method="POST" action="<?php echo BSURL?>functions/candidates.php?case=assetgroup">
            <div class="modal-body">
              <div class="form-group">
                <label>Assessment Name</label>
                <input type="text" name="assets" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Group</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>