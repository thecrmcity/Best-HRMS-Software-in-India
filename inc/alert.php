<?php

  if(isset($_GET['case']))

  {

    $case = $_GET['case'];

    

    

    switch($case)

    {

      case "err":

      $msg = "Something Went Wrong! Contact Admin. ";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "comInfo":

      $msg = " Fill Company Informations First. Please! ";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "filerr":

      $msg = "File already exists ";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "outerr":

      $msg = "You are outside or company that\'s why you can\'nt login. Contact your Manager or HR";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;
      case "geoerr":

        $msg = "Location Must Be On Otherwise You cannot Login.";
  
        ?>
  
        <script type="text/javascript">
  
          $(document).Toasts('create', {
  
            class: 'bg-maroon',
  
                title: 'Alert',
  
                autohide: true,
  
                delay: 3000,
  
                body: <?php echo "'".$msg."'";?>
  
              });
  
        </script>
  
        <?php
  
        break;

      case "iperr":

      $msg = "Outsider Can\'nt Login without your Manager Permission. Contact your Manager or HR ";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "dberr":

      $msg = " Data Already Exist, Change Name and Create Form! ";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "passerr":

      $msg = "Alert! Wrong PassCode. Try Again! ";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "notselect":

      $msg = "Alert! Please choose any one. ";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "expire":

      $msg = "Password has expired! Set New Password ";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Alert',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "notlogin":

      $msg = "Today\'s Attendance Already Captured.";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-warning',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "sel":

      $msg = "Please Select Atleast One";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-warning',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;
      case "canerr":

        $msg = "Candidate Already In your Database. Please Confirm First.";
  
        ?>
  
        <script type="text/javascript">
  
          $(document).Toasts('create', {
  
            class: 'bg-warning',
  
                title: 'Warning',
  
                autohide: true,
  
                delay: 3000,
  
                body: <?php echo "'".$msg."'";?>
  
              });
  
        </script>
  
        <?php
  
        break;

      case "exist":

      $msg = "Data Already Exist";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-warning',

              title: 'Warning',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "unsave":

      $msg = "Data Not Save. Try Again!";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;
      case "fileundo":

      $msg = "Something Went Wrong With Source File. Try Again!";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;
      case "filesrc":

      $msg = "Source file does not exist.";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "logedin":

      $msg = "Good to See You. $fullname ";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-success',

              title: 'Success',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "save":

      $msg = "Data Save Successfully!";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-success',

              title: 'Success',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;
      case "filedone":

      $msg = "File Created successfully.";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-success',

              title: 'Success',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "passup":

      $msg = "Greate! Password Update Successfully!";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-success',

              title: 'Success',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "warn":

      $msg = "You can\'nt Update Data. Delete All Row First and Create New Field";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "login":

      $msg = "You have entered an invalid username or password.";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "logerr":

      $msg = "Alert! Employee Not Exists.";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "passnt":

      $msg = "Alert! Password Not Match. Try Again!";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "filerr":

      $msg = "Alert! File Formate Not Correct. Please Check";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "filehead":

      $msg = "Alert! Wrong Table Heading. Use Only Software Created Excel Format File.";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

      case "uexist":

      $msg = "Alert! Employee Username Or Data Already Exist.";

      ?>

      <script type="text/javascript">

        $(document).Toasts('create', {

          class: 'bg-maroon',

              title: 'Not Save',

              autohide: true,

              delay: 3000,

              body: <?php echo "'".$msg."'";?>

            });

      </script>

      <?php

      break;

    }

    

    

  }

?>

    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>