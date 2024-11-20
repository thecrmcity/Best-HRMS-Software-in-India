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

        if(isset($_GET['s']))

        {

          $s = $_GET['s'];

        }

        else

        {

          $s = date('Y')."-".date('Y', strtotime($ydate, strtotime("+ 1 Year")));

        }

         

        ?>

        <div class="card rounded-0">

          <div class="card-header">

            <div class="card-title">FY <?php echo $s;?></div>

            <div class="card-tools">

              <a href="<?php echo VIEW.$pagename?>/new-tax-slab.php" class="text-dark font-weight-bold"><i class="fas fa-donate"></i> New Tax Slab</a>

            </div>

          </div>

          <div class="card-body">

            <div class="card-body p-0 mb-2">

              <form class="form-inline" method="GET">

                <div class="input-group">

                  <select class="form-control form-control-sm rounded-0" name="s">

                    <?php

                      $table = "in_taxslab";

                      $inner = " DISTINCT in_financeyear";

                      $cond = " `in_status`='1' ";

                      $select = new Selectall();

                      $taslab = $select->getallInnercond($table,$inner,$cond);

                      if(!empty($taslab))

                      {

                        foreach($taslab as $lab)

                        {

                          ?>

                          <option value="<?php echo $lab['in_financeyear'];?>"><?php echo $lab['in_financeyear'];?></option>

                          <?php

                        }

                      }

                    ?>

                    

                  </select>

                  <div class="input-group-append">

                    <button type="submit" class="input-group-text rounded-0"><i class="fas fa-search"></i></button>

                  </div>

                </div>

              </form>

            </div>

            <div class="row">

              <div class="col-lg-6 col-md-6">

                <div class="table-responsive">

                  <table style="width: 100%;" cellpadding="7" border="1">

                    <tr>

                      <td colspan="3" style="background: #073763;text-align: center;color:#ffffff;"><h4 class="mb-0">Old Regime</h4></td>

                    </tr>

                    <tr style="background: #cfe2f3;" class="font-weight-bold">

                      <td>Slabs</td>

                      <td>Individuals</td>



                    </tr>

                    <tbody>

                      <?php

                      $table = "in_taxslab";

                      $cond = " `in_financenam`='OldSlab' AND `in_financeyear`='$s' ";

                      $select = new Selectall();

                      $selData = $select->getallCond($table,$cond);

                      if(!empty($selData))

                      {

                        foreach($selData as $sel)

                        {

                          ?>

                          <tr>

                          <td><?php echo $sel['in_slabname'];?></td>

                          <td><?php echo $sel['in_slabvalue'];?></td>

                          </tr>

                          <?php

                        }

                      }

                      ?>

                    </tbody>

                  </table>

                </div>

              </div>

              <div class="col-lg-6 col-md-6">

                <div class="table-responsive">

                  <table style="width: 100%;" cellpadding="7" border="1">

                    <tr>

                      <td colspan="3" style="background: #073763;text-align: center;color:#ffffff;"><h4 class="mb-0">New Regime</h4></td>

                    </tr>

                    <tr style="background: #cfe2f3;" class="font-weight-bold">

                      <td>Slabs</td>

                      <td>Individuals</td>

                    </tr>

                    <tbody>

                      <?php

                      $table = "in_taxslab";

                      $cond = " `in_financenam`='NewSlab' AND `in_financeyear`='$s' ";

                      $select = new Selectall();

                      $selData = $select->getallCond($table,$cond);

                      if(!empty($selData))

                      {

                        foreach($selData as $sel)

                        {

                          ?>

                          <tr>

                          <td><?php echo $sel['in_slabname'];?></td>

                          <td><?php echo $sel['in_slabvalue'];?></td>

                          </tr>

                          <?php

                        }

                      }

                      ?>

                    </tbody>

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