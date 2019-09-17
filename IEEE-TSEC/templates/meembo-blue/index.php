<?php
/**
 * @subpackage	Meembo Blue v1.8 HM04J
 * @copyright	Copyright (C) 2010-2013 Hurricane Media - All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
JLoader::import( 'joomla.version' );
$loadjquery = NULL;
$version = new JVersion();
if (version_compare( $version->RELEASE, '2.5', '<=')) {
	if (JFactory::getApplication()->get('jquery') !== true) {
		$loadjquery = TRUE;	
	}
} else {
	JHtml::_('jquery.framework');
}

$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename');

$logopath = $this->baseurl . '/templates/' . $this->template . '/images/IEEE1.png';
$logopath1 = $this->baseurl . '/templates/' . $this->template . '/images/ieeetseclogo.png';
$logopath2 = $this->baseurl . '/templates/' . $this->template . '/images/tseclogo.png';
$logo = $this->params->get('logo', $logopath);
$logo1 = $this->params->get('logo', $logopath1);
$logo2 = $this->params->get('logo', $logopath2);
$logoimage = $this->params->get('logoimage');

$sitetitle = $this->params->get('sitetitle');
$sitedescription = $this->params->get('sitedescription');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
 <link href='http://fonts.googleapis.com/css?family=Lato:700|Lora:400,700|PT+Sans|Slabo+13px|PT+Sans+Caption|Roboto:500' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/layout_css.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/style.css" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/layout_1024.css" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/jquery-ui.css" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/hover.css" type="text/css" media="all" />
  <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/jquery.mCustomScrollbar.css" type="text/css" media="all" />
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.js"></script>
   <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.mCustomScrollbar.js"></script>
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-1.11.2.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/sfhover.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.easing.js"></script>
  	    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-ui.js"></script>
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.ulslide.js"></script>
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.ulslide.min.js"></script>
  <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery.contenthover.js"></script>
  
</head>
<body>

<div id="wrapper">


	<div id="header">


		<!-- Logo -->
      <div id="logo">

			<?php if ($logo && $logoimage == 1): ?>
        <a href="http://ieee.org/" target="_blank"><img src="<?php echo htmlspecialchars($logo); ?>" style="height:70px;width:185px;position:relative;left:10px;top:-13px;cursor:pointer"  alt="<?php echo $sitename; ?>" /></a>
        			<?php endif; ?>

        <a href="http://ieee-tsec.org" target="_blank"><img src="<?php echo htmlspecialchars($logo1); ?>" style="height:140px;width:150px;position:relative;left:247px;top:6px;cursor:pointer"  alt="<?php echo $sitename; ?>" /></a>
        <div id="sbw">
          <a href="<?php echo $this->baseurl ?>"><h2><b>Student Branch Website</b></h2></a>
           </div>
        <a href="http://tsec.edu/" target="_blank"><img src="<?php echo htmlspecialchars($logo2); ?>" style="height:120px;width:170px;position:relative;left:486px;top:13px;cursor:pointer"  alt="<?php echo $sitename; ?>" /></a>
			<?php if (!$logo || $logoimage == 0): ?>
				<?php if ($sitetitle): ?>
					<a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle); ?></a><br/>
				<?php endif; ?>

				<?php if ($sitedescription): ?>
					<div class="sitedescription"><?php echo htmlspecialchars($sitedescription); ?></div>
				<?php endif; ?>

			<?php endif; ?>

  		</div>
		
	</div>	

	<!-- Topmenu -->
	<div id="topmenu">
		<jdoc:include type="modules" name="position-1" />
      	<div class="arrow-right"></div>
	</div>	
	
	
	<!-- Searchbar -->
	<div id="searchbar">
       <jdoc:include type="modules" name="position-2" />
      
      <div id="search">
		<jdoc:include type="modules" name="position-3" />
      </div>
      
      <div id="clock">
		<jdoc:include type="modules" name="position-4" />
      </div>
      
      <div id="language" style="float:right">
		<jdoc:include type="modules" name="position-5" />
      </div>
      <div id="social" style="float:right">
        <jdoc:include type="modules" name="position-12" />
      </div>
	</div>	
						
	
  
  
	<!-- Content/Menu Wrap -->
  	<div id="content-menu_wrap">
			<!--Layout--->
  			<div id="layout" style="float:center">
      			<jdoc:include type="modules"/>
     	</div>
		
  		<!-- Breadcrumbs -->
		
        <div id="breadcrumbs" style="float:center;width:1000px">
			<jdoc:include type="modules" name="position-6"/>	
      	</div>
      	<jdoc:include type="message" />
		<jdoc:include type="component" />
						
	</div>
  
    <!--spectrum--->
  	<div id="spectrum" style="float:center">
      	
		<jdoc:include type="modules" name="position-7" />
      </div>
  
  
      <!--navigate--->
  	<div id="navigate" style="float:center">
      	
		<jdoc:include type="modules" name="position-8" />
      </div>
  
  
	<!-- Footer -->
	<?php if ($this->countModules('position-9')): ?>
	<div id="footer">
		<jdoc:include type="modules" name="position-9" />
	</div>
	<?php endif; ?>
	
		<!-- footermenu -->
	<div id="footermenu">
		<jdoc:include type="modules" name="position-10" />
	</div>	
	

	
<!-- Page End -->
</div>
</body>
</html>
