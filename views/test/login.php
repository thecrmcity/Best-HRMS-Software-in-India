<?php
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
            <h4 class="m-0">Dashboard</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        echo "<pre>";
        for($cs=1;$cs<=12;$cs++)
        {
          $phir = date("Y-$cs-d");
          $msdate = date('F', strtotime($phir));
          if($cs == $mdate)
          {
          ?>
          <?php
        
        $dash = new Dashboard();
        $bird = $dash->upcomingBirthday($cs);
        
        if(!empty($bird))
        {
          foreach($bird as $brd)
          {

            print_r($brd);
          }
        }

       ?>
       <!-- <hr>
       <?php

        $dash = new Dashboard();
        $bird = $dash->upcomingAniversary($cs);
        if(!empty($bird))
        {
          foreach($bird as $brd)
          {
            print_r($brd);
          }
        }
        
       ?> -->
          <?php
        }
      }
        ?>
        
       
           
        <!-- /.row -->

        
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  </style>
 <?php
include_once $bsurl.'/inc/footer.php';
?>