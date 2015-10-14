<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Juicebar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Juicebar">
        
        <!-- google font -->
        <link href="http://fonts.googleapis.com/css?family=Aclonica:regular" rel="stylesheet" type="text/css" />
        
        <!-- styles -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <!-- default theme -->
        <link id="style-base" href="css/stilearn.css" rel="stylesheet">
        <link id="style-responsive" href="css/stilearn-responsive.css" rel="stylesheet">
        <link id="style-helper" href="css/stilearn-helper.css" rel="stylesheet">
        <!-- usage -->
        <link href="css/stilearn-icon.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- other -->
        <link href="css/style.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>

    <body>
		<div id="juicebar-main">
			<!-- section header -->
			<header class="header">
				<?php include_once("header.php"); ?>
			</header>
			
			<!-- section content -->
			<section class="section">
				<?php include_once("menu.php");?>
			</section><!--/section content-->

			<!-- section footer -->
			<footer id="footer">
				<?php include_once("footer.php"); ?>
			</footer>
			<div>&nbsp;</div>
		</div>
        <!-- javascript
        ================================================== -->
        
        <script src="js/jquery.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.1.1.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/uniform/jquery.uniform.js"></script>
		<!-- this plugin required jquery ui-->
        <!-- required stilearn template js, for full feature-->
        <script src="js/stilearn-base.js"></script>
		<script src="js/juicebar.js"></script>
    </body>
</html>
