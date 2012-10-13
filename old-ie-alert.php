<?php
/*
Plugin Name: Old IE Alert
Plugin URI: http://www.thatwebguyblog.com/post/alert-for-ie7-and-lower-with-this-wordpress-plugin/
Description: Display an upgrade nag on IE7 and lower.
Author: Michael Ott
Version: 0.7
Author URI: http://www.thatwebguyblog.com
*/

// Create action and function for header output
add_action('wp_head', 'oiea_head');
function oiea_head() { 

$content_head = '
<!--[if lte IE 7]>
<link rel="stylesheet" href="' . get_option('home') . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/css/oiea.css" type="text/css" media="screen" />
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