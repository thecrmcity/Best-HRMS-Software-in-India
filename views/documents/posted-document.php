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
              <i class="fas fa-folder-open"></i> Posting Documents
            </div>
            <div class="card-tools"></div>

          </div>
          <div class="card-body">
            <form class="" method="POST" action="<?php echo BSURL?>functions/setting.php?case=postedoc">
              <div class="row">
                <div class="col-lg-5 col-md-5">
                <div class="form-group">
                  <span>Document Attachament</span>
                  <select class="form-control" name="docattach" required>
                    <option value="">--Select--</option>
                    <?php
                    $table = "in_templates";
                    $cond = " `in_temptype`='document' ";
                    $select = new Selectall();
                    $docs = $select->getallCond($table, $cond);
                    if(!empty($docs))
                    {
                      foreach($docs as $doc)
                      {
                        ?>
                        <option value="<?php echo $doc['in_sno'];?>"><?php echo $doc['in_tempname'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  </div>

                  <div class="form-group">
                    <span>Send To</span>
                      <select class="form-control" name="assignpage" id="assignpage">
                        <option value="">--Select--</option>
                        <option value="All">All Employee</option>
                        <option value="Department">Department</option>
                        <option value="Designation">Designation</option>
                        <option value="Groups">Group</option>
                      </select>
                      </div>
                      <div id="assignto"></div>
                      <div class="form-group">
                    <input type="submit" class="btn btn-primary px-3" value="Submit"> 
                  </div>
                </div>
                <div class="col-lg-7 col-md-7">
                  <div class="table-responsive emptable">
                    <table class="table table-bordered table-striped">
                      <thead class="bg-secondary">
                        <th>No</th>
                        <th>EmpID</th>
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Reporting</th>
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
  <script>
    $(document).ready(function(){
      $("#assignpage").on('change', function(){
        var assign = $("#assignpage").val();
        
        switch(assign)
        {
          case "All":
            $.ajax({
              url : "doc-ajax.php",
              type : "GET",
              data : {case:'approval',id:assign},
              success : function(data){
                $("#empdata").html(data);
              }
          });
          break;
          case "Department":
            $.ajax({
              url : "doc-ajax.php",
              type : "GET",
              data : {case:'approval',id:assign},
              success : function(data){
                $("#assignto").html(data);

                $("#assignfil").on('change', function(){
                    var assignfil = $("#assignfil").val();
                    $.ajax({
                      url : "doc-ajax.php",
                      type : "GET",
                      data : {case:'approval',id:'Departmentval',val:assignfil},
                      success : function(data){
                        $("#empdata").html(data);
                      }
                    });
                });
              }
          });
          break;
          case "Designation":
            $.ajax({
              url : "doc-ajax.php",
              type : "GET",
              data : {case:'approval',id:assign},
              success : function(data){
                $("#assignto").html(data);

                $("#assignfil").on('change', function(){
                    var assignfil = $("#assignfil").val();
                    $.ajax({
                      url : "doc-ajax.php",
                      type : "GET",
                      data : {case:'approval',id:'Designationval',val:assignfil},
                      success : function(data){
                        $("#empdata").html(data);
                      }
                    });
                });
              }
          });
          break;
        }
        
      });
    });
  </script>
  <script type="text/javascript">

$(document).ready(function(){

  $(".chk_all").click(function(){

    $(".chk_me").prop('checked', this.checked);

  });

});


</script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>