<?php
error_reporting(0);
 $open = $_GET['open'];
 if(!$open || $open == ""){$open = "main";} 


if(!file_exists("mobile/$open.html"))
die('<html><head>
<title>Page not found</title>
</head>
<body>
Invalid Link<br />
Page not found
</html>');
 
 ?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml"> 

<head>
<title>IEEE-TSEC Student Branch Website</title>
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- SmartMenus jQuery Bootstrap Addon CSS -->
<link href="smartmenus-master/smartmenus-master/src/addons/bootstrap/jquery.smartmenus.bootstrap.css" rel="stylesheet">


<link href="custom.css" rel="stylesheet" type="text/css">


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- SmartMenus jQuery plugin -->
<script type="text/javascript" src="smartmenus-master/smartmenus-master/src/jquery.smartmenus.js"></script>

<!-- SmartMenus jQuery Bootstrap Addon -->
<script type="text/javascript" src="smartmenus-master/smartmenus-master/src/addons/bootstrap/jquery.smartmenus.bootstrap.js"></script>
<style>
body{
	background-color:#e4e4e4;
	color:#333333;
	font-family: 'Source Sans Pro', 'sans-serif;
	font-size: 11px;
	}
	
	
	a
	{
		color:#333333;
	font-family: 'Source Sans Pro', 'sans-serif;
	text-decoration:none;
		
		}
		a:hover
		{
			text-decoration:underline;
			}
			#nav{
				font-size:13px;
			}
			#content
			{
				width:100%;
				border:solid #999 2px;}
</style>

</head>

<body>

<?php 
 $js = $_GET['js'];
 if($js=="no")
echo("<div id='imp' style='color:white;background-color:red;border:solid 2px grey'>Javascript is diabled on your browser. This is the non javascript version of the site. To view the site better enable Javascript and click <a href='http://ieee-tsec.org'>here</a>.</div>");?>

<div id="nav" align="center"><h1>
IEEE-TSEC STUDENT BRANCH WEBSITE</h1>
<div class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
	 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
	 <a class="navbar-brand" href="#">Menu</a>
  <div class="navbar-collapse collapse">

    <!-- Left nav -->
    <ul class="nav navbar-nav">
	  <li class="menu" style="margin-top:35px;"><a href="mobile.php">HOME</a></li>
      <li class="menu"><a href="?open=ieee-tsec">IEEE-TSEC</a></li>
      <li class="menu"><a href="?open=ieee">IEEE</a></li>
      <li class="menu"><a href="?open=ias">IAS</a></li>
      <li class="menu"><a href="?open=cs">Computer Society</a></li>
      <li class="menu"><a href="?open=embs">EMBS</a></li>
	  <li class="menu"><a href="?open=ras">RAS</a></li>
	  <li class="menu"><a href="?open=conatus">Conatus</a></li>
	  <li class="menu"><a href="?open=wie">WIE</a></li>
	  <li class="menu"><a href="?open=isaac">ISAAC</a></li>
	  <li class="menu"><a href="?open=newton">NEWTON</a></li>
	  <li class="menu"><a href="?open=iv">IV</a></li>
	  </ul>

  </div><!--/.nav-collapse -->
</div>
</div>
<div id="content" align="left">
<?php  include("mobile/$open.html"); ?>
</div>
<div id="down">
<center>
<H4>THIS IS THE MOBILE SITE</H4>
<a href="http://www.ieee-tsec.org/index.php">Full Site</a>

<br />
<p style="text-align:center;">Site Developed by <b>Karan Soni</b> and <b>Darshit Vakil</b> under the supervision of <b>Talwinder Kaur Bharaj</b>.</p>
Copyright &copy; 2014 IEEE-TSEC Student Branch. All rights reserved.
<br /><br />
Thadomal Shahani Engineering College (TSEC) P.G. Kher Marg (32nd Road), TPS III, Off Linking Road, Bandra - West, Pin - 400050 Mumbai (Bombay) Maharashtra India. Email:webmaster@ieee-tsec.org
</center>
</div>
</body>
</html>