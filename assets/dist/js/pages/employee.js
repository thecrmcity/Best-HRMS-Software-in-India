

function fixaddress()
{
  var fix = document.getElementById('fixcheck');
  var paramadd = document.getElementById('paramadd');
  if(fix.checked == true)
  {
    
    paramadd.style.display = "none";

  }
  else
  {
    paddone.innerHTML = "";
    paramadd.style.display = "block";
  }
}
function propanno()
{
  var pan = document.getElementById("propan");
  pan.value = pan.value.toUpperCase();

  var panVal = $('#propan').val();
  var regpan = /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/;
}
