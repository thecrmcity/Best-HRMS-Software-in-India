

 <footer class="main-footer">

    <strong>Copyright &copy; <?php echo date('Y');?> <a href="https://inoday.com/">inoday Inc</a>.</strong>

    <span class="d-none d-sm-inline-block">All rights reserved.</span>

    <div class="float-right d-none d-sm-inline-block">

      <b>Version</b> 2.0

    </div>

  </footer>



  

</div>

<!-- ./wrapper -->



<?php include_once('theme.php');?>



<?php $core->getFooter();?>
<script>  
   $(function() {  
      $( ".datepick" ).datepicker({ dateFormat: 'dd-mm-yy' });  
   });  
</script>

</body>

</html>

