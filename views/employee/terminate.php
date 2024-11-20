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

        if(isset($_GET['id']))

        {

          $id = $_GET['id'];

          ?>

          <div class="card rounded-0">

            <div class="card-header">

              <div class="card-title"><i class="fas fa-edit"></i> Terminate/Inative Employee</div>

            </div>

            <div class="card-body">

              <div class="row">

                <div class="col-lg-5 col-md-5">

                  <form class="" method="POST" action="<?php echo BSURL?>functions/employee.php?case=empinactive&id=<?php echo $id;?>">

                    <div class="form-group row">

                      <label class="col-lg-4">Is It FNF?</label>

                      <div class="input-group col-lg-8">
                        <input type="hidden" name="fnfcheck" value="0">
                        <input type="checkbox" name="fnfcheck" id="fnfcheck" value="1">

                      </div>

                      

                    </div>

                    

                    <div class="form-group row" id="fnfblk">

                      <label class="col-lg-4">FNF Date?</label>

                      <div class="input-group col-lg-7">

                        <input type="date" name="fnfdate" id="fnfdate" class="form-control rounded-0">

                      </div>

                      

                    </div>

                    <div class="form-group">

                      <label>Terminate/Inative Date*</label>

                      <input type="date" name="inativedate" class="form-control" required>

                    </div>

                    <div class="form-group">

                      <label>Comment*</label>

                      <textarea class="form-control" required rows="4" name="comment"></textarea>

                    </div>

                    <div class="form-group">

                      <input type="submit" name="saveinact" value="Submit" class="btn btn-primary">

                    </div>

                  </form>

                </div>

              </div>

              

            </div>

          </div>

          <?php

        }

        ?>

        

        <!-- /.row -->

        

      </div><!-- /.container-fluid -->

    </section>

    <!-- /.content -->

  </div>

  <!-- /.content-wrapper -->

  <script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function() {

    var fnfcheck = document.getElementById('fnfcheck');

    var fnfblk = document.getElementById('fnfblk');



    fnfblk.style.display = fnfcheck.checked ? 'block' : 'none';



    fnfcheck.addEventListener('change', function() {

        fnfblk.style.display = this.checked ? 'block' : 'none';

    });

});





  </script>

 <?php

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>