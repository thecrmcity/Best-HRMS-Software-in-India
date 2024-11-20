<?php



class Core

{

	

	public function  __construct()

	{

		$this->init();

		$this->autoload();

		// echo "File is running";

		

	}

	public function init()

	{

		

		define('DS', DIRECTORY_SEPARATOR);

		$bsfile = dirname(__DIR__);

		define('BSFILE', $bsfile.DS);



		define('CONF', BSFILE.'config'.DS);

		define('CORE', BSFILE.'core'.DS);

		define('FUNC', BSFILE.'functions'.DS);

		define('INC', BSFILE.'inc'.DS);

		define('MODL', BSFILE.'models'.DS);

		define('VIWS', BSFILE.'views'.DS);


		$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        // $domain = $_SERVER['HTTP_HOST'].'/';
		$domain = $_SERVER['HTTP_HOST'].'/hrms/';
        $baseurl = $protocol.$domain;
		



	    define( 'BSURL', $baseurl);

	    define('US', '/');

	    define('VIEW', BSURL.'views'.US);

	    session_start();





	}

	public function autoload()

	{

		spl_autoload_register(array(__CLASS__,'load'));

	}

	function load($classname)

	{

		switch ($classname) {

			case 'Database':

				require_once CONF.$classname.'.php';

				break;

			case 'Userlogin';

				require_once MODL.$classname.'.php';

			break;

			case 'Dashboard';

				require_once MODL.$classname.'.php';

			break;

			case 'Settings';

				require_once MODL.$classname.'.php';

			case 'Selectall';

				require_once MODL.$classname.'.php';

			break;

			case 'Payroll';

				require_once MODL.$classname.'.php';

			break;

			case 'Functions':

				require_once MODL.$classname.'.php';

			break;

			case 'Candidates':

				require_once MODL.$classname.'.php';

			break;

			case 'Employee':

				require_once MODL.$classname.'.php';

			break;

			case 'Leaves':

				require_once MODL.$classname.'.php';

			break;

			case 'Predefine':

				require_once MODL.$classname.'.php';

			break;

			

			

		}

	}

	public function pageName()

	{

		$page_name = basename($_SERVER['SCRIPT_FILENAME'],'.php');

		$pageName = ucfirst($page_name).' | Vendor Portal';



		return $pageName;

	}

	public function logOut()

	{

		session_destroy();

		header('Location:logout.php');

	}

	

	public function dispatch()

	{

		$url = array('index','dashboard');



		print_r($url);

	}

	

	public function getHeader()

	{

		echo '

		<!-- Font Awesome -->

  <link rel="stylesheet" href="'.BSURL.'assets/plugins/fontawesome-free/css/all.min.css">

  

  <!-- Tempusdominus Bootstrap 4 -->

  <link rel="stylesheet" href="'.BSURL.'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- iCheck -->

  <link rel="stylesheet" href="'.BSURL.'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- JQVMap -->

  <link rel="stylesheet" href="'.BSURL.'assets/plugins/jqvmap/jqvmap.min.css">
<link rel="stylesheet" href="'.BSURL.'assets/plugins/jquery-ui/jquery-ui.min.css">
  <!-- Theme style -->

  <link rel="stylesheet" href="'.BSURL.'assets/dist/css/adminlte.min.css">

  <!-- overlayScrollbars -->

  <link rel="stylesheet" href="'.BSURL.'assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- Daterange picker -->

  <link rel="stylesheet" href="'.BSURL.'assets/plugins/daterangepicker/daterangepicker.css">

  <!-- summernote -->

  <link rel="stylesheet" href="'.BSURL.'assets/plugins/summernote/summernote-bs4.min.css">

  <!-- jQuery -->

<script src="'. BSURL.'assets/plugins/jquery/jquery.min.js"></script>

<!-- AdminLTE App -->

<script src="'. BSURL.'assets/dist/js/adminlte.js"></script>

<!-- Bootstrap 4 -->

<script src="'. BSURL.'assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Main Style -->

<link rel="stylesheet" type="text/css" href="'.BSURL.'assets/dist/css/style.css">

<link rel="stylesheet" type="text/css" href="'.BSURL.'assets/dist/css/animation.css">

<link rel="stylesheet" type="text/css" href="'.BSURL.'assets/dist/css/skins/skin-blue.css">

		';

	}

	public function getFooter()

	{

		echo '

		

		

<!-- jQuery UI 1.11.4 -->

<script src="'. BSURL.'assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

  $.widget.bridge("uibutton", $.ui.button)

</script>



<!-- ChartJS -->

<script src="'. BSURL.'assets/plugins/chart.js/Chart.min.js"></script>

<!-- Sparkline -->

<script src="'. BSURL.'assets/plugins/sparklines/sparkline.js"></script>

<!-- JQVMap -->

<script src="'. BSURL.'assets/plugins/jqvmap/jquery.vmap.min.js"></script>

<script src="'. BSURL.'assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<!-- jQuery Knob Chart -->

<script src="'. BSURL.'assets/plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- daterangepicker -->

<script src="'. BSURL.'assets/plugins/moment/moment.min.js"></script>

<script src="'. BSURL.'assets/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script src="'. BSURL.'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Summernote -->

<script src="'. BSURL.'assets/plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->

<script src="'. BSURL.'assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- Customizer -->

<script src="'. BSURL.'assets/dist/js/customizer.js"></script>



		';

	}

	public function  goodWishes()

	{

			$parhar = date('a');

      $time = date('h:i');

      if($time <= '11:59' && $parhar == 'am')

      {

        ?>

        <h3 class="lockpro text-center">Good Morning!</h3>

        <?php

      }

      if(($time >= '12:00') || ($time <= '04:00') && ($parhar == 'pm'))

      {

        ?>

        <h3 class="lockpro text-center">Good After Noon!</h3>

        <?php

      }

      if($time >= '04:01' && $time <= '08:00' && $parhar == 'pm')

      {

        ?>

        <h3 class="lockpro text-center">Good Evening!</h3>

        <?php

      }

	}

	public function getAge($then)

	{

		$then_ts = strtotime($then);

    $then_year = date('Y', $then_ts);

    $age = date('Y') - $then_year;

    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;

    return $age;

	}

	

}

$core = new Core();

include_once 'setup.php';
