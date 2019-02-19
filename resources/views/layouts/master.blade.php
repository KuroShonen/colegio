<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">

	<title>@yield("title")</title>
    
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>


    <!-- multiselect -->
    {{-- <!-- Datatables CSS --> --}}
    
    <!-- Bootstrap core CSS -->
    <?php echo Html::style('css/bootstrap.min.css')?>
    <?php echo Html::style('fonts/css/font-awesome.min.css')?>
    <?php echo Html::style('css/animate.min.css')?>

    <!-- Custom styling plus plugins -->
    <?php echo Html::style('css/maps/jquery-jvectormap-2.0.1.css')?>
    <?php echo Html::style('css/floatexamples.css')?>
    <?php echo Html::style('css/custom.css')?>
    <?php echo Html::style('css/icheck/flat/green.css')?>

    <!--START Combo Busqueda Sensitiva-->
    <!--END Combo Busqueda Sensitiva-->

    <?php echo Html::script('js/jquery.min.js') ?>
    
    <!--START DATEPICKER-->
    <?php echo Html::script('js/datepicker/daterangepicker.js')?>
    <!--END DATEPICKER-->
    
    <!--START DATATABLES-->
    <?php echo Html::script('js/datatables/js/jquery.js')?>
    <?php echo Html::script('js/datatables/js/jquery.dataTables.js')?>
    <!--END DATATABLES-->




</head>

<body class="nav-md">
    <div class="container body">
      	<div class="main_container">

      		@include("base.menu")

	        <!-- top navigation -->
	        @include("base.nav")
	        <!-- /top navigation -->

	        <!-- page content -->
	        <div class="right_col" role="main">
	        	@yield("content")
	        </div>
	        <!-- /page content -->

	        <!-- footer content -->
	        
	         @include("base.footer")
	        
	        <!-- /footer content -->
     
    	</div>
	</div>

	@include("base.scripts")
</body>

</html>
