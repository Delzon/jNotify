<?php
	require_once(dirname(__FILE__)."/../../../scripts/init.inc.php");
	$oMysql = MySQL::getInstance();
	$aNews = $oMysql->getNews(NB_NEWS);
	
	if(Tools::getValue('btSubmit'))
	{
		$boxType = $_POST['boxType'];
		$HorizontalPosition = $_POST['HorizontalPosition'];
		$VerticalPosition = $_POST['VerticalPosition'];
		$MinWidth = $_POST['MinWidth'];
		$TimeShown = $_POST['TimeShown'];
		$ShowTimeEffect = $_POST['ShowTimeEffect'];
		$HideTimeEffect = $_POST['HideTimeEffect'];
		$LongTrip = $_POST['LongTrip'];
		$ShowOverlay = $_POST['ShowOverlay'];
		$ColorOverlay = $_POST['ColorOverlay'];
		$OpacityOverlay = $_POST['OpacityOverlay'];
		$autoHide = $_POST['autoHide'];
		$clickOverlay = $_POST['clickOverlay'];
		
		switch ($_POST['onClosed']) {
			case '': 
				$onClosed = false;
			break;
			default :
				$onClosed = 'alert(\'jNofity is closed !\')';
		}
		
		switch ($_POST['onCompleted']) {
			case '': 
				$onCompleted = false;
			break;
			default :
				$onCompleted = 'alert(\'jNofity is completed !\')';
		}
	}
	else
	{
		$boxType = 'jNotify';
		$HorizontalPosition = 'center';
		$VerticalPosition = 'top';
		$MinWidth = 250;
		$TimeShown = 3000;
		$ShowTimeEffect = 200;
		$HideTimeEffect = 200;
		$LongTrip = 20;
		$ShowOverlay = 'true';
		$ColorOverlay = '#000';
		$OpacityOverlay = 0.3;
		$onClosed = '';
		$onCompleted = '';
		$autoHide = 'true';
		$clickOverlay = 'false';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>jNotify demonstration : jquery plugin | display animated notifications boxes (notice, failure, success) in just one line fo code with jQuery : MyjQueryPlugins.com</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="Language" content="en" />
	<base href="<?php echo URL_SITE; ?>" />
	<link rel="shortcut icon" href="<?php echo URL_SITE; ?>favicon.ico" />
	<meta name="description" content="jNotify is a jQuery plugin. It can display information boxes in just one line of code. Three kind of boxes are allowed : information, success and failure. The whole box is entirely skinnable with css. For example, you could use it for a mail being successfully sent or a validation error of a form." />
	<meta name="robots" content="index, follow, all" />
	
	<link rel="stylesheet" href="<?php echo URL_SITE; ?><?php echo URL_DEMO_JNOTIFY; ?>jquery/jNotify.jquery.css" type="text/css" />
	
<link rel="stylesheet" href="<?php echo URL_SITE; ?>static/css/content.css" type="text/css" />
<link rel="stylesheet" href="<?php echo URL_SITE; ?>static/css/648.css" type="text/css" />
<link rel="stylesheet" href="<?php echo URL_SITE; ?>static/css/336.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css' />
</head>

<body id="demopage">

<?php require_once(dirname(__FILE__)."/../../../includes/header.inc.php");?>

<div id="main">

	<div class="breadcrumb">
		<a href="index" class="backTo">Home</a>
		<a href="jNotify" class="backTo">jNotify Homepage</a>
		<div class="clr"></div>
	</div>
	
	<div id="left_col">

	<h1>jNotify demonstration</h1>

	<p>
		<a href="#" class="jnotify_exemple"><span>Click here to see the jNotify box</span></a>
	</p>

<h2>Change options</h2>
<form method="post" action="">
	<fieldset>
		<label>Show </label>
		<select name="boxType">
			<option value="jNotify" <?php if($boxType == 'jNotify') echo 'selected="selected"'; ?>>a Notice Box</option>
			<option value="jError" <?php if($boxType == 'jError') echo 'selected="selected"'; ?>>an Error Box</option>
			<option value="jSuccess" <?php if($boxType == 'jSuccess') echo 'selected="selected"'; ?>>a Success Box</option>
		</select>
		
		<br /><br />
		
		<label>autoHide jNotify ?</label><br />
		<select name="autoHide">
			<option value="true" <?php if($autoHide == 'true') echo 'selected="selected"'; ?>>Y</option>
			<option value="false" <?php if($autoHide == 'false') echo 'selected="selected"'; ?>>N</option>
		</select>
		
		<br /><br />
		
		<div>Positions</div>
		<label>Horizontal</label>
		<select name="HorizontalPosition">
			<option value="left" <?php if($HorizontalPosition == 'left') echo 'selected="selected"'; ?>>left</option>
			<option value="center" <?php if($HorizontalPosition == 'center') echo 'selected="selected"'; ?>>center</option>
			<option value="right" <?php if($HorizontalPosition == 'right') echo 'selected="selected"'; ?>>right</option>
		</select>&nbsp;-&nbsp;-&nbsp;
		<label>Vertical</label>
		<select name="VerticalPosition">
			<option value="top" <?php if($VerticalPosition == 'top') echo 'selected="selected"'; ?>>top</option>
			<option value="center" <?php if($VerticalPosition == 'center') echo 'selected="selected"'; ?>>center</option>
			<option value="bottom" <?php if($VerticalPosition == 'bottom') echo 'selected="selected"'; ?>>bottom</option>
		</select>
		
		<br /><br />
		
		<label>min-width</label>
		<select name="MinWidth">
			<option value="200" <?php if($MinWidth == '200') echo 'selected="selected"'; ?>>200 px</option>
			<option value="250" <?php if($MinWidth == '250') echo 'selected="selected"'; ?>>250 px</option>
			<option value="300" <?php if($MinWidth == '300') echo 'selected="selected"'; ?>>300 px</option>
			<option value="350" <?php if($MinWidth == '350') echo 'selected="selected"'; ?>>350 px</option>
			<option value="400" <?php if($MinWidth == '400') echo 'selected="selected"'; ?>>400 px</option>
		</select>
		
		<br /><br />
		
		<label>Show jNotify during </label>
		<select name="TimeShown">
			<option value="1000" <?php if($TimeShown == '1000') echo 'selected="selected"'; ?>>1 sec.</option>
			<option value="1500" <?php if($TimeShown == '1500') echo 'selected="selected"'; ?>>1.5 sec.</option>
			<option value="2000" <?php if($TimeShown == '2000') echo 'selected="selected"'; ?>>2 sec.</option>
			<option value="3000" <?php if($TimeShown == '3000') echo 'selected="selected"'; ?>>3 sec.</option>
		</select>
		
		<br /><br />
		
		<label>Open jNotify in </label>
		<select name="ShowTimeEffect">
			<option value="200" <?php if($ShowTimeEffect == '200') echo 'selected="selected"'; ?>>200 ms</option>
			<option value="400" <?php if($ShowTimeEffect == '400') echo 'selected="selected"'; ?>>400 ms</option>
			<option value="600" <?php if($ShowTimeEffect == '600') echo 'selected="selected"'; ?>>600 ms</option>
			<option value="800" <?php if($ShowTimeEffect == '800') echo 'selected="selected"'; ?>>800 ms</option>
			<option value="1000" <?php if($ShowTimeEffect == '1000') echo 'selected="selected"'; ?>>1000 ms</option>
		</select>
		
		<br /><br />
		
		<label>Close jNotify in </label>
		<select name="HideTimeEffect">
			<option value="200" <?php if($HideTimeEffect == '200') echo 'selected="selected"'; ?>>200 ms</option>
			<option value="400" <?php if($HideTimeEffect == '400') echo 'selected="selected"'; ?>>400 ms</option>
			<option value="600" <?php if($HideTimeEffect == '600') echo 'selected="selected"'; ?>>600 ms</option>
			<option value="800" <?php if($HideTimeEffect == '800') echo 'selected="selected"'; ?>>800 ms</option>
			<option value="1000" <?php if($HideTimeEffect == '1000') echo 'selected="selected"'; ?>>1000 ms</option>
		</select>
		
		<br /><br />
		
		<label>Animation trip </label>
		<select name="LongTrip">
			<option value="10" <?php if($LongTrip == '10') echo 'selected="selected"'; ?>>10 px</option>
			<option value="20" <?php if($LongTrip == '20') echo 'selected="selected"'; ?>>20 px</option>
			<option value="50" <?php if($LongTrip == '50') echo 'selected="selected"'; ?>>50 px</option>
			<option value="100" <?php if($LongTrip == '100') echo 'selected="selected"'; ?>>100 px</option>
		</select> <em>(only for top and bottom positions)</em>
		
		<br /><br />
		
		<label>Show overlay ?</label>
		<select name="ShowOverlay">
			<option value="false" <?php if($ShowOverlay == 'false') echo 'selected="selected"'; ?>>No</option>
			<option value="true" <?php if($ShowOverlay == 'true') echo 'selected="selected"'; ?>>Yes</option>
		</select>
		
		<label>Color overlay </label>
		<select name="ColorOverlay">
			<option value="#000" <?php if($ColorOverlay == '#000') echo 'selected="selected"'; ?>>Black</option>
			<option value="#f00" <?php if($ColorOverlay == '#f00') echo 'selected="selected"'; ?>>Red</option>
			<option value="#0f0" <?php if($ColorOverlay == '#0f0') echo 'selected="selected"'; ?>>Green</option>
			<option value="#00f" <?php if($ColorOverlay == '#00f') echo 'selected="selected"'; ?>>Blue</option>
		</select>
		
		<label>Opacity overlay </label>
		<select name="OpacityOverlay">
			<option value="0.3" <?php if($OpacityOverlay == '0.3') echo 'selected="selected"'; ?>>0.3</option>
			<option value="0.5" <?php if($OpacityOverlay == '0.5') echo 'selected="selected"'; ?>>0.5</option>
			<option value="0.7" <?php if($OpacityOverlay == '0.7') echo 'selected="selected"'; ?>>0.7</option>
			<option value="0.9" <?php if($OpacityOverlay == '0.9') echo 'selected="selected"'; ?>>0.9</option>
		</select>
		
		<br /><br />
		
		<label>Click on overlay to close jNotify ?</label><br />
		<select name="clickOverlay">
			<option value="true" <?php if($clickOverlay == 'true') echo 'selected="selected"'; ?>>Y</option>
			<option value="false" <?php if($clickOverlay == 'false') echo 'selected="selected"'; ?>>N</option>
		</select> <em>Disabled if 'autoHide' is true</em>
		
		<br /><br />
		
		<label>Callback : <strong>onClosed function</strong> (the limit is your imagination)</label><br />
		<select name="onClosed">
			<option value="" <?php if($onClosed == '') echo 'selected="selected"'; ?>>Do nothing</option>
			<option value="Show an alert" <?php if($onClosed == 'Show an alert') echo 'selected="selected"'; ?>>Show an alert when jNotify is closed !</option>
		</select>
		
		<br /><br />
		
		<label>Callback : <strong>onCompleted function</strong> (the limit is your imagination)</label><br />
		<select name="onCompleted">
			<option value="" <?php if($onCompleted == '') echo 'selected="selected"'; ?>>Do nothing</option>
			<option value="Show an alert" <?php if($onCompleted == 'Show an alert') echo 'selected="selected"'; ?>>Show an alert when jNotify is completed !</option>
		</select>
		
		<br /><br />
		
		
		
		
		<input type="submit" name="btSubmit" value="Change options">
	</fieldset>
</form>

<h2>JS code</h2>
<div class="sourceCode">
<pre>
<?php
echo htmlentities('<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
    $("a.jnotify_exemple").click(function(e){
	  e.preventDefault();
	  '.$boxType.'(
		\'Here the message !!<br />You can write HTML code <strong>bold</strong>, <i>italic</i>, <u>underline</u>\',
		{
		  autoHide : '.$autoHide.', // added in v2.0
		  clickOverlay : '.$clickOverlay.', // added in v2.0
		  MinWidth : '.$MinWidth.',
		  TimeShown : '.$TimeShown.',
		  ShowTimeEffect : '.$ShowTimeEffect.',
		  HideTimeEffect : '.$HideTimeEffect.',
		  LongTrip :'.$LongTrip.',
		  HorizontalPosition : \''.$HorizontalPosition.'\',
		  VerticalPosition : \''.$VerticalPosition.'\',
		  ShowOverlay : '.$ShowOverlay.',
   		  ColorOverlay : \''.$ColorOverlay.'\',
		  OpacityOverlay : '.$OpacityOverlay.',
		  onClosed : function(){ // added in v2.0
		   '.$onClosed.'
		  },
		  onCompleted : function(){ // added in v2.0
		   '.$onCompleted.'
		  }
		});
	  });
    });
</script>');
?>
</pre>
</div>
<!-- Advertise Bottom -->
		<?php require_once(dirname(__FILE__)."/../../../includes/pub.inc.php");?>
	</div>
	
	<!-- RIGHT COLUMN -->
	<?php require_once(dirname(__FILE__)."/../../../includes/col_right.inc.php");?>
		
	<div class="clr"></div>

</div>
	
	
<!-- FOOTER -->
<?php require_once(dirname(__FILE__)."/../../../includes/footer.inc.php");?>

<script type="text/javascript" src="<?php echo URL_SITE; ?><?php echo URL_DEMO_JNOTIFY; ?>jquery/jquery.js"></script>
<script type="text/javascript" src="<?php echo URL_SITE; ?><?php echo URL_DEMO_JNOTIFY; ?>jquery/jNotify.jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("a.jnotify_exemple").click(function(e){
			e.preventDefault();
			<?php echo $boxType; ?>(
				'Here the message !!<br />You can write HTML code <strong>bold</strong>, <i>italic</i>, <u>underline</u>',
				{
					autoHide : <?php echo $autoHide;?>,
					clickOverlay : <?php echo $clickOverlay; ?>,
					MinWidth : <?php echo $MinWidth;?>,
					TimeShown : <?php echo $TimeShown;?>,
					ShowTimeEffect : <?php echo $ShowTimeEffect;?>,
					HideTimeEffect : <?php echo $HideTimeEffect;?>,
					LongTrip : <?php echo $LongTrip;?>,
					HorizontalPosition : '<?php echo $HorizontalPosition;?>',
					VerticalPosition : '<?php echo $VerticalPosition;?>',
					ShowOverlay : <?php echo $ShowOverlay;?>,
					ColorOverlay : '<?php echo $ColorOverlay;?>',
					OpacityOverlay : <?php echo $OpacityOverlay;?>,
					onClosed : function(){<?php echo $onClosed;?>},
					onCompleted : function(){<?php echo $onCompleted;?>}
				}
			);
		});		
	});
</script>

<?php require_once dirname(__FILE__)."/../../../includes/analytics.inc.php"; ?>
</body>
</html>
