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
          
        <div class="row">
          <div class="col-lg-3">
            
            <a href="<?php echo VIEW.$pagename?>/outstading-offer.php" class="boarding-card" style="background: #f9ebcb !important;">
              <div class="boarding-inner">
                <div class="boarding-header">
                  <?php
                  $table = "in_candidates";
                  $cond = " `in_comid`='$comid' AND `in_negoround`='Accepted' AND `in_status`='1' ";
                  $select = new Selectall();
                  $offer = $select->getallCond($table,$cond);
                  if(!empty($offer))
                  {
                    ?>
                    <h4><?php echo count($offer);?></h4>
                    <?php
                  }
                  else
                  {
                    ?>
                    <h4>00</h4>
                    <?php
                  }
                  ?>
                  
                </div>
                <div class="boarding-body">
                  <p>Outstading Offers</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3">
            <a href="<?php echo VIEW.$pagename?>/onboarding-list.php" class="boarding-card" style="background: #d4e4e2 !important;">
              <div class="boarding-inner">
                <div class="boarding-header">
                <?php
                  $table = "in_candidates";
                  $cond = " `in_comid`='$comid' AND `in_negoround`='Accepted' AND `in_status`='1' ";
                  $select = new Selectall();
                  $offer = $select->getallCond($table,$cond);
                  if(!empty($offer))
                  {
                    ?>
                    <h4><?php echo count($offer);?></h4>
                    <?php
                  }
                  else
                  {
                    ?>
                    <h4>00</h4>
                    <?php
                  }
                  ?>
                </div>
                <div class="boarding-body">
                  <p>Currently Onboarding</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3">
            <a href="<?php echo VIEW.$pagename?>/pending-offer.php" class="boarding-card" style="background: #e7edf4 !important;">
              <div class="boarding-inner">
                <div class="boarding-header">
                <?php
                  $table = "in_candidates";
                  $cond = " `in_comid`='$comid' AND `in_negoround`='Accepted' AND `in_status`='1' ";
                  $select = new Selectall();
                  $offer = $select->getallCond($table,$cond);
                  if(!empty($offer))
                  {
                    ?>
                    <h4><?php echo count($offer);?></h4>
                    <?php
                  }
                  else
                  {
                    ?>
                    <h4>00</h4>
                    <?php
                  }
                  ?>
                </div>
                <div class="boarding-body">
                  <p>Pending Offers</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3">
            <a href="<?php echo VIEW.$pagename?>/move-to-payroll.php" class="boarding-card" style="background: #fbe2d4 !important;">
              <div class="boarding-inner">
                <div class="boarding-header">
                <?php
                  $table = "in_candidates";
                  $cond = " `in_comid`='$comid' AND `in_negoround`='Accepted' AND `in_status`='1' ";
                  $select = new Selectall();
                  $offer = $select->getallCond($table,$cond);
                  if(!empty($offer))
                  {
                    ?>
                    <h4><?php echo count($offer);?></h4>
                    <?php
                  }
                  else
                  {
                    ?>
                    <h4>00</h4>
                    <?php
                  }
                  ?>
                </div>
                <div class="boarding-body">
                  <p>Move to Payroll</p>
                </div>
              </div>
            </a>
          </div>

        </div>
        <div class="row mt-3">
          <div class="col-lg-5">
            <div class="card m-2">

                <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Onboarding Status Count
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn bg-secondary btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-secondary btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body p-0">
                <div class="tab-content ">
                  <!-- Morris chart - Sales -->
                  <div class="card-body">
                    <canvas id="donutChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card mx-3 mt-2">

                <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Onboarding Monthly Report
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn bg-secondary btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-secondary btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body p-0">
                <div class="tab-content ">
                  <!-- Morris chart - Sales -->
                  <div class="card-body">
                    <canvas id="barsetCart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
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

  $(document).ready(function(){

      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')

        var donutData        = {

          labels: [

              'Outstading Offers',

              'Currently Onboarding',

              'Pending Offers',

              

          ],

          datasets: [

            {

              data: [5,8,4],

              backgroundColor : ['#f9ebcb', '#e7edf4', '#fbe2d4'],

            }

          ]

        }

        var donutOptions     = {

          maintainAspectRatio : false,

          responsive : true,

        }

        //Create pie or douhnut chart

        // You can switch between pie and douhnut using the method below.

        new Chart(donutChartCanvas, {

          type: 'doughnut',

          data: donutData,

          options: donutOptions

        });



        

          $("#clickScreen").click(function(){

            $("#screenDown").fadeToggle("slow");

          });

          

        

  });

</script>
<script>
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("barsetCart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
</script>
 <?php
include_once $bsurl.'/inc/alert.php';
include_once $bsurl.'/inc/footer.php';
?>

