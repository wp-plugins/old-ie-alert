<?php
/*
Plugin Name: Old IE Alert
Plugin URI: http://michaelott.id.au
Description: Display an upgrade nag on IE7 and lower.
Author: Michael Ott
Version: 0.6
Author URI: http://www.thatwebguyblog.com
*/

// Email upon activation
register_activation_hook(__FILE__, 'tracking');
function tracking()
{

	$to = "mike@thatwebguyblog.com";
	$subject = 'Install of OLD IE ALERT from ' . $_SERVER['SERVER_NAME'];
	$message = '
	
	<table width="100%" height="100%" border="0" cellspacing="50" cellpadding="0" bgcolor="#f1f1f1">
	<tr>
	<td>
	<div style="padding:20px; background:#fff; width:550px; margin:0 auto; border:solid 1px #ccc; box-shadow:0 0 30px #ccc;">
		<p style="font-size:22px; line-height:20px; margin:15px 0 20px 0; color:#333; font-family:Arial, Helvetica, sans-serif; float:right; font-weight:bold;">Old IE Alert</p>
		
		<img src="http://s.wordpress.org/about/images/logo-blue/blue-s.png" alt="Wordpress" />
		
		<p style="font-size:14px; clear:both; color:#009bc2; font-weight:normal; font-family:Georgia; font-style:italic; line-height:12px;">Install of Old IE Alert from <br />
		<span style="color:#c00056; display:block; font-size:14px; margin:5px 0 0 0; font-family:Arial, Helvetica, sans-serif; font-style:normal !important;">' . $_SERVER['SERVER_NAME'] . '</span></p>
		
		<p style="font-size:14px; color:#009bc2; font-weight:normal; font-family:Georgia; font-style:italic; line-height:12px;">Browser <br />
		<span style="color:#c00056; display:block; font-size:14px; margin:5px 0 0 0; font-family:Arial, Helvetica, sans-serif; font-style:normal !important;">' . $_SERVER['HTTP_USER_AGENT'] . '</span></p>
		
		<p style="font-size:14px; color:#009bc2; font-weight:normal; font-family:Georgia; font-style:italic; line-height:12px;">Browser <br />
		<span style="color:#c00056; display:block; font-size:14px; margin:5px 0 0 0; font-family:Arial, Helvetica, sans-serif; font-style:normal !important;">' . $_SERVER['REMOTE_ADDR'] . '</span></p>
		
	</div>
	</td>
	</tr>
	</table>
	
	';
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: No Reply <mike@thatwebguyblog.com>' . "\r\n";
	mail($to, $subject, $message, $headers);
}


// Create action and function for header output
add_action('wp_head', 'oiea_head');
function oiea_head() { 

$content_head = '
<!--[if lte IE 7]>
<link rel="stylesheet" href="' . get_option('home') . "/" . $siteurl . 'wp-content/plugins/' . basename(dirname(__FILE__)) . '/css/oiea.css" type="text/css" media="screen" />
<![endif]-->
'; 

  echo $content_head;
  print "\n";
  
}

// Create action and function for footer output
add_action('wp_footer', 'oiea_foot');
function oiea_foot() { 

$content_footer = '
<!--[if lte IE 7]>
<div id="oiea">
	<p>
    	<strong>Oh my! What\'s this about?</strong>
        Parts of this site may look broken because you are using a very old (and insecure) web browser. But don\'t worry, you can upgrade to any of these for free.
    </p>
    <ul>
		<li title="Chrome" class="chrome"><a href="http://www.google.com/chrome">Chrome</a></li>
    	<li title="Firefox" class="ff"><a href="http://www.getfirefox.com/">Firefox</a></li>
        <li title="Safari" class="safari"><a href="http://www.apple.com/safari/download/">Safari</a></li>
        <li title="Internet Explorer" class="ie"><a href="http://www.microsoft.com/Windows/internet-explorer/">Internet Explorer</a></li>
    </ul>
</div>
<![endif]-->
'; 

  echo $content_footer;
  print "\n";
}