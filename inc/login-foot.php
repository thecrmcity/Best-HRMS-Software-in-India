	<div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
	
	<script type="text/javascript" src="../../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	
	
	<script type="text/javascript">
        $(document).ready(function(){
            $("#forgetpassword").click(function(){
                $("#loginform").hide(1000);
                $("#forgetform").show(1000);
            });
            $("#getloginform").click(function(){
                $("#loginform").show(1000);
                $("#forgetform").hide(1000);
            });
            
        });

    </script>
</body>
</html>