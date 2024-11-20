<?php

$pagename = basename(__DIR__);

$fullPage = ucwords($pagename);

$siteaim = basename($_SERVER['SCRIPT_FILENAME'],'.php');

$sitename = str_replace('-', ' ', $siteaim);

$bsurl = dirname(dirname(__DIR__));

include_once $bsurl.'/inc/header.php';

include_once $bsurl.'/inc/sidebar.php';

$define = new Predefine();

$define->themeConfig();

?>



  



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper mainbody">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h4 class="m-0">Theme Personalisation</h4>

            

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><span onclick="history.back()" class="badge badge-danger" style="cursor: pointer;"><i class="fas fa-arrow-left"></i> Back</span></li>

              <li class="breadcrumb-item"><a href="<?php echo BSURL;?>views/dashboard/"><i class="fas fa-home"></i> Home</a></li>

              <li class="breadcrumb-item active">Theme Personalisation</li>

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

            <?php

            $select = new Selectall();

            $theme = $select->themeconfig();



            if($theme != "")

            {

              $preloader = $theme['in_preloader'];

              $pageload = $theme['in_pageload'];

              $headfix = $theme['in_headfix'];

              $sidefixed = $theme['in_sidefixed'];

              $sidecollpse = $theme['in_sidecollpse'];

              $flatstyle = $theme['in_flatstyle'];

              $legacystyle = $theme['in_legacystyle'];

              $compact = $theme['in_compact'];

              $topheader = $theme['in_topheader'];

              $mainsidebar = $theme['in_mainsidebar'];

              $sidebarmenu = $theme['in_sidebarmenu'];

              $brandlogo = $theme['in_brandlogo'];

            }

            

            ?>

            <form class="" method="POST" action="<?php echo BSURL;?>functions/setting.php?case=theme">

            <div class="theme-table table-responsive">

              

              <table class="table table-bordered table-striped">

                

                <tr class="">

          <td><div class="custom-control custom-switch">

                      <input type="checkbox" class="custom-control-input" id="preloader" name="preloader" <?php echo $preloader != "" ? "checked" : "" ?> value="prenone">

                      <label class="custom-control-label" for="preloader">Disable Preloader</label>

                      </div></td><td>



              <div class="custom-control custom-switch">

                      <input type="checkbox" class="custom-control-input" id="fixedheader" name="fixedheader" <?php echo $headfix != "" ? "checked" : "" ?> value="layout-navbar-fixed">

                      <label class="custom-control-label" for="fixedheader">Fixed Top Header</label>

                      </div>

           </td>

           <td></td>

           <td></td>

           <td></td>

                </tr>

                <tr>

                  <td colspan="5" class="text-center" style="font-family: monospace;"><h5>Sidebar Options</h5></td>

                </tr>

                <tr>

                  <td>

                          <div class="custom-control custom-switch">

                      <input type="checkbox" class="custom-control-input" id="sidecollapse" name="sidecollapse" <?php echo $sidecollpse != "" ? "checked" : "" ?> value="sidebar-collapse">

                      <label class="custom-control-label" for="sidecollapse">Collapsed</label>

                      </div>



                  </td>

                  <td>

                      <div class="custom-control custom-switch">

                      <input type="checkbox" class="custom-control-input" id="fixedside" name="fixedside" value="layout-fixed" <?php echo $sidefixed != "" ? "checked" : "" ?>>

                      <label class="custom-control-label" for="fixedside">Fixed Sidebar</label>

                      </div>

                  </td>

                  <td>

                    <div class="custom-control custom-switch">

                      <input type="checkbox" class="custom-control-input" id="navflat" name="navflat" value="nav-flat" <?php echo $flatstyle != "" ? "checked" : "" ?>>

                      <label class="custom-control-label" for="navflat">Menu Flat Style</label>

                    </div>

                  </td>

                  <td>

                      <div class="custom-control custom-switch">

                      <input type="checkbox" class="custom-control-input" id="navlegacy" name="navlegacy" value="nav-legacy" <?php echo $legacystyle != "" ? "checked" : "" ?>>

                      <label class="custom-control-label" for="navlegacy">Menu Legacy Style</label>

                    </div>

                  <td>

                      <div class="custom-control custom-switch">

                      <input type="checkbox" class="custom-control-input" id="navcompact" name="navcompact" value="nav-compact" <?php echo $compact != "" ? "checked" : "" ?>>

                      <label class="custom-control-label" for="navcompact">Menu Compact</label>

                    </div>

                    </td>



                </tr>

              </table>

              <table class="table-bordered table ">

                <tr>

                  <td colspan="6" class="text-center" style="font-family: monospace;"><h5>Page Animation</h5> </td>

                </tr>

                <tr>

                  <td>

                      <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="pagenone" name="pageload" <?php echo $pageload == "none" ? "checked" : "" ?> value="none">

                        <label class="custom-control-label" for="pagenone">None</label>

                        <div class="cell">

                          <div class="circle"></div>

                        </div>

                      </div>

                      

                  </td>

                  <td> 

                      <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="pagegrow" name="pageload" <?php echo $pageload == "grow" ? "checked" : "" ?> value="grow">

                        <label class="custom-control-label" for="pagegrow">Grow</label>

                        <div class="cell">

                          <div class="circle grows"></div>

                        </div>

                      </div>

                  </td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="fadein" name="pageload" <?php echo $pageload == "fade-in" ? "checked" : "" ?> value="fade-in">

                        <label class="custom-control-label" for="fadein">Fade In</label>

                        <div class="cell">

                          <div class="circle fade-ins"></div>

                        </div>

                      </div>

                  </td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="fadeout" name="pageload" <?php echo $pageload == "fade-out" ? "checked" : "" ?> value="fade-out">

                        <label class="custom-control-label" for="fadeout">Fade Out</label>

                        <div class="cell">

                          <div class="circle fade-outs"></div>

                        </div>

                      </div>

                  </td>

                </tr>

                <tr>

                  <td><div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="bounce-in-left" name="pageload" <?php echo $pageload == "bounce-in-left" ? "checked" : "" ?> value="bounce-in-left">

                        <label class="custom-control-label" for="bounce-in-left">Bounce Left</label>

                        <div class="cell">

                          <div class="circle bounce-in-lefts"></div>

                        </div>

                      </div></td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="bounce2" name="pageload" <?php echo $pageload == "bounce2" ? "checked" : "" ?> value="bounce2">

                        <label class="custom-control-label" for="bounce2">Bounce High</label>

                        <div class="cell">

                          <div class="circle bounces2"></div>

                        </div>

                      </div>

                  </td>

                  <td><div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="shake" name="pageload" <?php echo $pageload == "shake" ? "checked" : "" ?> value="shake">

                        <label class="custom-control-label" for="shake">Shake</label>

                        <div class="cell">

                          <div class="circle shakes"></div>

                        </div>

                      </div></td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="flip" name="pageload" <?php echo $pageload == "flip" ? "checked" : "" ?> value="flip">

                        <label class="custom-control-label" for="flip">Flip</label>

                        <div class="cell">

                          <div class="circle flips"></div>

                        </div>

                      </div>

                  </td>

                  

                </tr>

                <tr>

                  <td><div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="fade-down" name="pageload" <?php echo $pageload == "fade-down" ? "checked" : "" ?> value="fade-down">

                        <label class="custom-control-label" for="fade-down">Fade Down</label>

                        <div class="cell">

                          <div class="circle fade-downs"></div>

                        </div>

                      </div></td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="fade-right" name="pageload" <?php echo $pageload == "fade-right" ? "checked" : "" ?> value="fade-right">

                        <label class="custom-control-label" for="fade-right">Fade Right</label>

                        <div class="cell">

                          <div class="circle fade-rights"></div>

                        </div>

                      </div>

                  </td>

                  <td><div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="bounce-in" name="pageload" <?php echo $pageload == "bounce-in" ? "checked" : "" ?> value="bounce-in">

                        <label class="custom-control-label" for="bounce-in">Bounce In</label>

                        <div class="cell">

                          <div class="circle bounce-ins"></div>

                        </div>

                      </div></td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="bounce-in-right" name="pageload" <?php echo $pageload == "bounce-in-right" ? "checked" : "" ?> value="bounce-in-right">

                        <label class="custom-control-label" for="bounce-in-right">Bounce Right</label>

                        <div class="cell">

                          <div class="circle bounce-in-rights"></div>

                        </div>

                      </div>

                  </td>

                  

                </tr>

                <tr>

                  <td><div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="bounce-out" name="pageload" <?php echo $pageload == "bounce-out" ? "checked" : "" ?> value="bounce-out">

                        <label class="custom-control-label" for="bounce-out">Bounce Out</label>

                        <div class="cell">

                          <div class="circle bounce-outs"></div>

                        </div>

                      </div></td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="bounce-out-down" name="pageload" <?php echo $pageload == "bounce-out-down" ? "checked" : "" ?> value="bounce-out-down">

                        <label class="custom-control-label" for="bounce-out-down">Bounce Down</label>

                        <div class="cell">

                          <div class="circle bounce-out-downs"></div>

                        </div>

                      </div>

                  </td>

                  <td><div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="rotate-in-down-left" name="pageload" <?php echo $pageload == "rotate-in-down-left" ? "checked" : "" ?> value="rotate-in-down-left">

                        <label class="custom-control-label" for="rotate-in-down-left">Rotate Down Left</label>

                        <div class="cell">

                          <div class="circle rotate-in-down-lefts"></div>

                        </div>

                      </div></td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="rotate-in-up-left" name="pageload" <?php echo $pageload == "rotate-in-up-left" ? "checked" : "" ?> value="rotate-in-up-left">

                        <label class="custom-control-label" for="rotate-in-up-left">Rotate Up Left</label>

                        <div class="cell">

                          <div class="circle rotate-in-up-lefts"></div>

                        </div>

                      </div>

                  </td>

                  

                </tr>

                <tr>

                  <td><div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="roll-in" name="pageload" <?php echo $pageload == "roll-in" ? "checked" : "" ?> value="roll-in">

                        <label class="custom-control-label" for="roll-in">Roll In</label>

                        <div class="cell">

                          <div class="circle roll-ins"></div>

                        </div>

                      </div></td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="roll-out" name="pageload" <?php echo $pageload == "roll-out" ? "checked" : "" ?> value="roll-out">

                        <label class="custom-control-label" for="roll-out">Roll Out</label>

                        <div class="cell">

                          <div class="circle roll-outs"></div>

                        </div>

                      </div>

                  </td>

                  <td><div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="hinge" name="pageload" <?php echo $pageload == "hinge" ? "checked" : "" ?> value="hinge">

                        <label class="custom-control-label" for="hinge">Hinge</label>

                        <div class="cell">

                          <div class="circle hinges"></div>

                        </div>

                      </div></td>

                  <td>

                    <div class="custom-control custom-switch">

                        <input type="radio" class="custom-control-input" id="elastic-spin" name="pageload" <?php echo $pageload == "elastic-spin" ? "checked" : "" ?> value="elastic-spin">

                        <label class="custom-control-label" for="elastic-spin">Elastic Spin</label>

                        <div class="cell">

                          <div class="circle elastic-spins"></div>

                        </div>

                      </div>

                  </td>

                  

                </tr>

              </table>

              <table class="table table-light">

                <tr>

                  <td colspan="17"><b>Top Header</b> </td>

                </tr>

                <tr>

                  <td class="bg-primary"><input type="radio" name="topheader" value="bg-primary" <?php echo $topheader == "bg-primary" ? "checked":"";?>></td>

                  <td class="bg-success"><input type="radio" name="topheader" value="bg-success" <?php echo $topheader == "bg-success" ? "checked":"";?>></td>

                  <td class="bg-warning"><input type="radio" name="topheader" value="bg-warning" <?php echo $topheader == "bg-warning" ? "checked":"";?>></td>

                  <td class="bg-info"><input type="radio" name="topheader" value="bg-info" <?php echo $topheader == "bg-info" ? "checked":"";?>></td>

                  <td class="bg-dark"><input type="radio" name="topheader" value="bg-dark" <?php echo $topheader == "bg-dark" ? "checked":"";?>></td>

                  <td class="bg-light"><input type="radio" name="topheader" value="bg-light" <?php echo $topheader == "bg-light" ? "checked":"";?>></td>

                  <td class="bg-secondary"><input type="radio" name="topheader" value="bg-secondary" <?php echo $topheader == "bg-secondary" ? "checked":"";?>></td>

                  <td class="bg-danger"><input type="radio" name="topheader" value="bg-danger" <?php echo $topheader == "bg-danger" ? "checked":"";?>></td>

                  <td class="bg-indigo"><input type="radio" name="topheader" value="bg-indigo" <?php echo $topheader == "bg-indigo" ? "checked":"";?>></td>

                  <td class="bg-lightblue"><input type="radio" name="topheader" value="bg-lightblue" <?php echo $topheader == "bg-lightblue" ? "checked":"";?>></td>

                  <td class="bg-purple"><input type="radio" name="topheader" value="bg-purple" <?php echo $topheader == "bg-purple" ? "checked":"";?>></td>

                  <td class="bg-fuchsia"><input type="radio" name="topheader" value="bg-fuchsia" <?php echo $topheader == "bg-fuchsia" ? "checked":"";?>></td>

                  <td class="bg-pink"><input type="radio" name="topheader" value="bg-pink" <?php echo $topheader == "bg-pink" ? "checked":"";?>></td>

                  <td class="bg-maroon"><input type="radio" name="topheader" value="bg-maroon" <?php echo $topheader == "bg-maroon" ? "checked":"";?>></td>

                  <td class="bg-lime"><input type="radio" name="topheader" value="bg-lime" <?php echo $topheader == "bg-lime" ? "checked":"";?>></td>

                  <td class="bg-teal"><input type="radio" name="topheader" value="bg-teal" <?php echo $topheader == "bg-teal" ? "checked":"";?>></td>

                  <td class="bg-olive"><input type="radio" name="topheader" value="bg-olive" <?php echo $topheader == "bg-olive" ? "checked":"";?>></td>

                </tr>

                <tr>

                  <td colspan="17">&nbsp;</td>

                </tr>

                <tr>

                  <td colspan="17"><b>Main Sidebar</b> </td>

                </tr>

                <tr>

                  <td class="bg-primary"><input type="radio" name="sidebar" value="bg-primary" <?php echo $mainsidebar == "bg-primary" ? "checked":"";?>></td>

                  <td class="bg-success"><input type="radio" name="sidebar" value="bg-success" <?php echo $mainsidebar == "bg-success" ? "checked":"";?>></td>

                  <td class="bg-warning"><input type="radio" name="sidebar" value="bg-warning" <?php echo $mainsidebar == "bg-warning" ? "checked":"";?>></td>

                  <td class="bg-info"><input type="radio" name="sidebar" value="bg-info" <?php echo $mainsidebar == "bg-info" ? "checked":"";?>></td>

                  <td class="bg-dark"><input type="radio" name="sidebar" value="bg-dark" <?php echo $mainsidebar == "bg-dark" ? "checked":"";?>></td>

                  <td class="bg-light"><input type="radio" name="sidebar" value="bg-light" <?php echo $mainsidebar == "bg-light" ? "checked":"";?>></td>

                  <td class="bg-secondary"><input type="radio" name="sidebar" value="bg-secondary" <?php echo $mainsidebar == "bg-secondary" ? "checked":"";?>></td>

                  <td class="bg-danger"><input type="radio" name="sidebar" value="bg-danger" <?php echo $mainsidebar == "bg-danger" ? "checked":"";?>></td>

                  <td class="bg-indigo"><input type="radio" name="sidebar" value="bg-indigo" <?php echo $mainsidebar == "bg-indigo" ? "checked":"";?>></td>

                  <td class="bg-lightblue"><input type="radio" name="sidebar" value="bg-lightblue" <?php echo $mainsidebar == "bg-lightblue" ? "checked":"";?>></td>

                  <td class="bg-purple"><input type="radio" name="sidebar" value="bg-purple" <?php echo $mainsidebar == "bg-purple" ? "checked":"";?>></td>

                  <td class="bg-fuchsia"><input type="radio" name="sidebar" value="bg-fuchsia" <?php echo $mainsidebar == "bg-fuchsia" ? "checked":"";?>></td>

                  <td class="bg-pink"><input type="radio" name="sidebar" value="bg-pink" <?php echo $mainsidebar == "bg-pink" ? "checked":"";?>></td>

                  <td class="bg-maroon"><input type="radio" name="sidebar" value="bg-maroon" <?php echo $mainsidebar == "bg-maroon" ? "checked":"";?>></td>

                  <td class="bg-lime"><input type="radio" name="sidebar" value="bg-lime" <?php echo $mainsidebar == "bg-lime" ? "checked":"";?>></td>

                  <td class="bg-teal"><input type="radio" name="sidebar" value="bg-teal" <?php echo $mainsidebar == "bg-teal" ? "checked":"";?>></td>

                  <td class="bg-olive"><input type="radio" name="sidebar" value="bg-olive" <?php echo $mainsidebar == "bg-olive" ? "checked":"";?>></td>

                </tr>

                

                <tr>

                  <td colspan="17">&nbsp;</td>

                </tr>

                <tr>

                  <td colspan="17"><b>Sidebar Menus</b> </td>

                </tr>

                <tr>

                  <td class="bg-primary"><input type="radio" name="sidebarmen" value="bg-primary" <?php echo $sidebarmenu == "bg-primary" ? "checked":"";?>></td>

                  <td class="bg-success"><input type="radio" name="sidebarmen" value="bg-success" <?php echo $sidebarmenu == "bg-success" ? "checked":"";?>></td>

                  <td class="bg-warning"><input type="radio" name="sidebarmen" value="bg-warning" <?php echo $sidebarmenu == "bg-warning" ? "checked":"";?>></td>

                  <td class="bg-info"><input type="radio" name="sidebarmen" value="bg-info" <?php echo $sidebarmenu == "bg-info" ? "checked":"";?>></td>

                  <td class="bg-dark"><input type="radio" name="sidebarmen" value="bg-dark" <?php echo $sidebarmenu == "bg-dark" ? "checked":"";?>></td>

                  <td class="bg-light"><input type="radio" name="sidebarmen" value="bg-light" <?php echo $sidebarmenu == "bg-light" ? "checked":"";?>></td>

                  <td class="bg-secondary"><input type="radio" name="sidebarmen" value="bg-secondary" <?php echo $sidebarmenu == "bg-secondary" ? "checked":"";?>></td>

                  <td class="bg-danger"><input type="radio" name="sidebarmen" value="bg-danger" <?php echo $sidebarmenu == "bg-danger" ? "checked":"";?>></td>

                  <td class="bg-indigo"><input type="radio" name="sidebarmen" value="bg-indigo" <?php echo $sidebarmenu == "bg-indigo" ? "checked":"";?>></td>

                  <td class="bg-lightblue"><input type="radio" name="sidebarmen" value="bg-lightblue" <?php echo $sidebarmenu == "bg-lightblue" ? "checked":"";?>></td>

                  <td class="bg-purple"><input type="radio" name="sidebarmen" value="bg-purple" <?php echo $sidebarmenu == "bg-purple" ? "checked":"";?>></td>

                  <td class="bg-fuchsia"><input type="radio" name="sidebarmen" value="bg-fuchsia" <?php echo $sidebarmenu == "bg-fuchsia" ? "checked":"";?>></td>

                  <td class="bg-pink"><input type="radio" name="sidebarmen" value="bg-pink" <?php echo $sidebarmenu == "bg-pink" ? "checked":"";?>></td>

                  <td class="bg-maroon"><input type="radio" name="sidebarmen" value="bg-maroon" <?php echo $sidebarmenu == "bg-maroon" ? "checked":"";?>></td>

                  <td class="bg-lime"><input type="radio" name="sidebarmen" value="bg-lime" <?php echo $sidebarmenu == "bg-lime" ? "checked":"";?>></td>

                  <td class="bg-teal"><input type="radio" name="sidebarmen" value="bg-teal" <?php echo $sidebarmenu == "bg-teal" ? "checked":"";?>></td>

                  <td class="bg-olive"><input type="radio" name="sidebarmen" value="bg-olive" <?php echo $sidebarmenu == "bg-olive" ? "checked":"";?>></td>

                </tr>

                

                <tr>

                  <td colspan="17">&nbsp;</td>

                </tr>

                <tr>

                  <td colspan="17"><b>Brand Logo</b> </td>

                </tr>

                <tr>

                  <td class="bg-primary"><input type="radio" name="brandlogo" value="bg-primary" <?php echo $brandlogo == "bg-primary" ? "checked":"";?>></td>

                  <td class="bg-success"><input type="radio" name="brandlogo" value="bg-success" <?php echo $brandlogo == "bg-success" ? "checked":"";?>></td>

                  <td class="bg-warning"><input type="radio" name="brandlogo" value="bg-warning" <?php echo $brandlogo == "bg-warning" ? "checked":"";?>></td>

                  <td class="bg-info"><input type="radio" name="brandlogo" value="bg-info" <?php echo $brandlogo == "bg-info" ? "checked":"";?>></td>

                  <td class="bg-dark"><input type="radio" name="brandlogo" value="bg-dark" <?php echo $brandlogo == "bg-dark" ? "checked":"";?>></td>

                  <td class="bg-light"><input type="radio" name="brandlogo" value="bg-light" <?php echo $brandlogo == "bg-light" ? "checked":"";?>></td>

                  <td class="bg-secondary"><input type="radio" name="brandlogo" value="bg-secondary" <?php echo $brandlogo == "bg-secondary" ? "checked":"";?>></td>

                  <td class="bg-danger"><input type="radio" name="brandlogo" value="bg-danger" <?php echo $brandlogo == "bg-danger" ? "checked":"";?>></td>

                  <td class="bg-indigo"><input type="radio" name="brandlogo" value="bg-indigo" <?php echo $brandlogo == "bg-indigo" ? "checked":"";?>></td>

                  <td class="bg-lightblue"><input type="radio" name="brandlogo" value="bg-lightblue" <?php echo $brandlogo == "bg-lightblue" ? "checked":"";?>></td>

                  <td class="bg-purple"><input type="radio" name="brandlogo" value="bg-purple" <?php echo $brandlogo == "bg-purple" ? "checked":"";?>></td>

                  <td class="bg-fuchsia"><input type="radio" name="brandlogo" value="bg-fuchsia" <?php echo $brandlogo == "bg-fuchsia" ? "checked":"";?>></td>

                  <td class="bg-pink"><input type="radio" name="brandlogo" value="bg-pink" <?php echo $brandlogo == "bg-pink" ? "checked":"";?>></td>

                  <td class="bg-maroon"><input type="radio" name="brandlogo" value="bg-maroon" <?php echo $brandlogo == "bg-maroon" ? "checked":"";?>></td>

                  <td class="bg-lime"><input type="radio" name="brandlogo" value="bg-lime" <?php echo $brandlogo == "bg-lime" ? "checked":"";?>></td>

                  <td class="bg-teal"><input type="radio" name="brandlogo" value="bg-teal" <?php echo $brandlogo == "bg-teal" ? "checked":"";?>></td>

                  <td class="bg-olive"><input type="radio" name="brandlogo" value="bg-olive" <?php echo $brandlogo == "bg-olive" ? "checked":"";?>></td>

                </tr>

                

                <tr>

                  <td colspan="17">&nbsp;</td>

                </tr>

                <tr class="card-footer">

                  <td colspan="17" class="clearfix"><input type="submit" name="themeconfig" class="btn btn-primary float-right" value="Save"> <a href="<?php echo BSURL;?>functions/setting.php?case=resettheme" class="btn bg-olive float-right mr-3">Reset Theme</a></td>

                </tr>

              </table>

              

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

 <?php

include_once $bsurl.'/inc/fortheme.php';

include_once $bsurl.'/inc/alert.php';

include_once $bsurl.'/inc/footer.php';

?>