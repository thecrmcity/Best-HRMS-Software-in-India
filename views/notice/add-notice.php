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

        <?php

              if(isset($_GET['pedit']))

              {

                $id = $_GET['pedit'];

                $table = "in_notice";

                $cond = " in_sno='$id' ";

                $select = new Selectall();

                $mdata = $select->getcondData($table,$cond);

               

                if($mdata != "")

                {

                  $mng = $mdata['in_title'];

                  $mndat = $mdata['in_contents'];

                  $prio = $mdata['in_priority'];

                }

                

                $act = "editnot&id=".$id;



              }

              else

              {

                $act = "notice";

                $mng = "";

                $acs = "";

                $mndat = "";
                $prio = "";

              }

              

            ?>

        <div class="card card-primary card-outline">

          <div class="card-body">

          

            <form class="" method="POST" action="<?php echo BSURL;?>functions/notice.php?case=<?php echo $act;?>&f=<?php echo $pagename;?>&p=<?php echo $siteaim?>">

              <div class="form-group row">

                <div class="col-lg-3"><label>Title</label></div>

                <div class="col-lg-3 col-md-3"><input type="text" class="form-control rounded-0" placeholder="Title" name="noticetitle" value="<?php echo $mng;?>"></div>

                <div class="col-lg-3 col-md-3 text-right"><label class="">Notice Type</label></div>

                <div class="col-lg-3 col-md-3">
                  <div class="input-group">
                    <select class="form-control rounded-0" name="priority" id="priority" required>
                    <option value="">--Select--</option>
                    <option value="High" <?php echo $prio == "High" ? "selected":""; ?>>High Importance</option>
                    <option value="Importance" <?php echo $prio == "Importance" ? "selected":""; ?>>Importance</option>
                    <option value="Ordinary" <?php echo $prio == "Ordinary" ? "selected":""; ?>>Ordinary</option>
                  </select>
                  <div id="getset"></div>
                    
                  </div>
                  
                </div>

                  

                </div>

             

              <div class="form-group row">

                <div class="col-lg-3"><label>Content</label></div>

                <div class="col-lg-9 col-md-9">

                  <textarea id="compose-textarea" class="form-control rounded-0" style="height: 300px" name="contents"><?php echo $mndat;?></textarea>

                </div>

              </div>
              <div class="form-group">
                <div class="clearfix">

                    <div class="float-right">

                      <input type="submit" class="btn btn-dark mr-3 rounded-0" value="Draft" name="draft"><input type="submit" class="btn btn-primary rounded-0" name="publish" value="Publish">

                    </div>

                  </div>
              </div>
              

            </form>

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
    $("#priority").on('change', function(){
      var prival = $("#priority").val();
      switch(prival)
      {
        case "High":
        $("#getset").html('<div class="input-group-append"><span class="btn btn-danger rounded-0"><i class="fas fa-exclamation-circle"></i></span></div>');
        break;
        case "Importance":
          $("#getset").html('<div class="input-group-append"><span class="btn btn-warning rounded-0"><i class="fas fa-exclamation-circle"></i></span></div>');
        break;
      default:
        $("#getset").html('<div class="input-group-append"><span class="btn btn-default rounded-0"><i class="fas fa-exclamation-circle"></i></span></div>');
        break;
      }
    });

    
  </script>


 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';



?>


<script>

  $(function () {



    $('#compose-textarea').summernote()

  })

</script>