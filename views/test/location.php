<!DOCTYPE html>
<html>
  <head>
    <title>Location Testing</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
<body onload="getLocation()">
<form class="" method="GET">
  <input type="text" name="latitude" id="latitude">
  <input type="text" name="longitude" id="longitude">
  <input type="submit" value="Login" class="btn btn-primary btn-block">
</form>

<script>
  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      alert("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    var latit = position.coords.latitude;
    var longi = position.coords.longitude;
    $("#latitude").val(latit);
    $("#longitude").val(longi);
  }
</script>

</body>
</html>

