<?php



if(isset($_GET['lat']) && isset($_GET['lon']))

{

	$lat = @$_GET['lat'];

	$log = @$_GET['lon'];



	$areas = $lat.",".$log;

}



elseif(isset($_GET['cont']) || isset($_GET['st']) || isset($_GET['city']))

{

	$area = @$_GET['cont'];

	$state = @$_GET['st'];

	$city = @$_GET['city'];



	$areas = $area.",".$state.",".$city;

}

?>

<p></p>

<iframe src="https://maps.google.com/maps?q=<?php echo $areas;?>&output=embed" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>