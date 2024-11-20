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

          <div class="form-inline">
          <h4 class="m-0"><?php echo ucwords($sitename);?></h4>
          <?php
          if(isset($_GET['id']))
          {
            ?>
            <a href="<?php echo VIEW.$pagename."/".$siteaim?>.php" class="btn-sm btn-primary ml-3"><i></i> Exit Search</a>
            <?php
          }
          ?>
          </div>

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

        <div class="row">
          <div class="col-lg-3 col-md-3">
            <div class="empinfo">
              <!-- <div class="text-center">
                <button class="btn btn-info btn-sm" type="button"><i class="fas fa-plus"></i> Create Template</button>
              </div> -->
              <div class="templist">
                <ul class="nav flex-column">
                  <?php
                  $table = "in_templates";
                  $cond = " `in_comid`='$comid' AND `in_temptype`='email' ";
                  $select = new Selectall();
                  $list = $select->getallCond($table,$cond);
                  if(!empty($list))
                  {
                    foreach($list as $ls)
                    {
                      $status = $ls['in_status'];
                      if($status == "1")
                      {
                        ?>
                        <li class="nav-item nav-setard"><a href="<?php echo VIEW.$pagename?>/email-templates.php?id=<?php echo $ls['in_sno'];?>" class="nav-link"><i class="fas fa-angle-double-right"></i> <?php echo $ls['in_tempname'];?>
                        <p><span style="background: #098d4b;color: #fff;border-radius: 10px;margin-right: 4px;padding: 0px 5px 1px 5px;">Active Post</span>Last Update : <?php echo date('d-m-Y', strtotime($ls['in_modifydate']))?></p>
                      </a>
                        
                      </li>
                        <?php
                      }
                      else
                      {
                        ?>
                        <li class="nav-item nav-petard"><a href="<?php echo VIEW.$pagename?>/email-templates.php?id=<?php echo $ls['in_sno'];?>" class="nav-link"><i class="fas fa-angle-double-right"></i> <?php echo $ls['in_tempname'];?>
                        <p><span style="background: #737c7e;color: #fff;border-radius: 10px;margin-right: 4px;padding: 0px 5px 1px 5px;">Inactive Post</span>Last Update : <?php echo date('d-m-Y', strtotime($ls['in_modifydate']))?></p>
                      </a>
                        
                      </li>
                        <?php
                      }
                      
                    }
                  }
                  ?>
                  
                </ul>
              </div>
            </div>
          </div>
          <?php
          if(isset($_GET['id']))
          {
            $id = $_GET['id'];
            $table = "in_templates";
            $cond = " `in_sno`='$id' ";
            $select = new Selectall();
            $emt = $select->getcondData($table,$cond);
            if($emt != "")
            {
              $act = "editemp&id=$id";
              $sective = $emt['in_status'];
              $tmpname = $emt['in_tempname'];
              $tmpbody = $emt['in_content'];
            }
            
          }
          else
          {
            $act = "emailtemplate";
            $sective = "";
            $tmpname = "";
            $tmpbody = "";
          }
          ?>
          <div class="col-lg-9 col-md-9">
            <div class="empinfo">
              <div class="form-group mb-3">
                  <small class="font-italic text-danger">[EMPID], [NAME], [COMPANY], [BTHDATE], [ANIDATE], [LOGTIME], [OUTTIME], [POST], [DEPARTMENT]</small> 
                </div>
              <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=<?php echo $act;?>">
                <div class="form-group row">
                  <label class="col-lg-3 col-form-label">Template Name</label>
                  <div class="col-lg-6 col-md-6">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><input type="checkbox" name="active" value="1" <?php echo $sective == "1"? "Checked":""; ?>></span>
                      </div>
                      <input type="text" name="tmpname" class="form-control" value="<?php echo $tmpname;?>">
                    </div>
                    
                  </div>
                  <div class="col-lg-3 col-md-3">
                    <input type="submit" class="btn btn-primary float-right px-3" value="Save Template">
                  </div>
                </div>
                
                <div class="form-group">
                
                  <textarea id="compose-textarea" class="form-control rounded-0" style="height: 300px" name="contents"><?php echo $tmpbody;?></textarea>
                
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

  

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>
<script>
  $(function () {

    $('#compose-textarea').summernote()
  })
</script>