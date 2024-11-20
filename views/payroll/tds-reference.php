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

            <h4 class="m-0"><?php echo $siteaim;?></h4>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>

              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>

              <li class="breadcrumb-item active"><?php echo $fullPage;?></li>

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

          



          <div class="card-body">

            <div class="row">

              <div class="col-sm-5 col-5">

              

              <div class="bg-light p-2 border">

                <form class="" method="POST" action="<?php echo BSURL;?>functions/payroll.php?case=tdsreference">

                <div class="form-group">

                  <label>Add TDS Reference</label>

                  <div class="input-group mb-3">

                    

                  <input type="text" class="form-control rounded-0" name="tdsrefer" required value="" placeholder="Reference Name" autocomplete="off">

                  <div class="input-group-append">

                    <button type="submit" class="input-group-text">Submit</button>

                  </div>

                </div>


                </div>

              </form>
              
              </div>

              



            </div>
            <div class="col-lg-7 col-md-7">
              <div class="table-responsive emptable">
              <table class="table table-bordered table-striped">

                <tr class="bg-primary">

                  <td>ID</td>

                  <td>Name</td>

                  <td class="text-center"><span class="fas fa-trash"></span></td>


                </tr>

                <?php

                $table = "in_master_card";
                $cond = " `in_relation`='tdsReference' AND `in_status`='1' ";
                $select = new Selectall();
                $design = $select->getallCond($table,$cond);

                  if($design != "") 

                  {

                    foreach($design as $mg)

                    { 
                      $cardpos = $mg['in_relation'];
                    ?>

                    <tr>

                      <td><?php echo $mg['in_sno'];?></td>
                      <td><?php echo $mg['in_prefix']; ?></td>

                      <td class="text-center"><a href="<?php echo BSURL;?>functions/payroll.php?case=delrefer&id=<?php echo $mg['in_sno'];?>" class="text-danger"><i class="fas fa-trash"></i></a></td>

                    </tr>

                    <?php

                    }

                  }

                  else

                  {

                    ?>

                    <tr>

                      <td colspan="2" class="text-center">No Data</td>

                      <tr>

                    <?php

                  }

                ?>

              </table>
              </div>
            </div>
            

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