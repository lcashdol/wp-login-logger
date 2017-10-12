<?php
#Larry W. Cashdollar
#twitter @_larry0
#Just a quick wordpress login logger. html from the lovely folks at Wordpress.

$log_file = '/var/log/wp/wp-login.log';
$site_name = "www.yoursite.com";
$title = "Your Website Name";

$ip       = $_SERVER['REMOTE_ADDR'];
$logdate  = date(DATE_RFC2822);
$login    = $_POST['log'];
$password = $_POST['pwd'];
$redirect = $_POST['redirect_to'];
$data     = "===================================[Event $logdate Notice for $ip]=======================================\n";
$data .= "Login:" . $login . "\n";
$data .= "Password:" . $password . "\n";
$data .= "Redirect:" . $redirect . "\n";
foreach (getallheaders() as $name => $value) {
    $data .= "$name: $value\n";
}
$data .= "===========================================[Event End]============================================\n";
file_put_contents($log_file, $data, FILE_APPEND | LOCK_EX);
?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	echo "<title>$title &lsaquo; Log In</title>";
?>
	<link rel='dns-prefetch' href='//s.w.org' />
<?php
	#if you're running this on a non-wordpress site replace site_name below with wordpress.org
echo "<link rel='stylesheet' href='http://$site_name/wp-admin/load-styles.php?c=0&amp;dir=ltr&amp;load%5B%5D=dashicons,buttons,forms,l10n,login&amp;ver=4.8.2' type='text/css' media='all' />";
?>
<meta name='robots' content='noindex,follow' />
	<meta name="viewport" content="width=device-width" />
		</head>
	<body class="login login-action-login wp-core-ui  locale-en-us">
		<div id="login">
<?php
echo "		<h1><a href=\"https://wordpress.org/\" title=\"Powered by WordPress\" tabindex=\"-1\">$title</a></h1>";
?>
	
<form name="loginform" id="loginform" action="wp-login.php" method="post">
	<p>
		<label for="user_login">Username or Email Address<br />
		<input type="text" name="log" id="user_login" class="input" value="admin" size="20" /></label>
	</p>
	<p>
		<label for="user_pass">Password<br />
		<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" /></label>
	</p>
		<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> Remember Me</label></p>
	<p class="submit">
		<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="Log In" />
<?php
echo "		<input type=\"hidden\" name=\"redirect_to\" value=\"http://$site_name/wp-admin/\" />";
?>
		<input type="hidden" name="testcookie" value="1" />
	</p>
</form>

<p id="nav">
<?php
echo "	<a href=\"http://$site_name/wp-login.php?action=lostpassword\">Lost your password?</a>";
?>
</p>

<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_pass');
d.value = '';
d.focus();
d.select();
} catch(e){}
}, 200);
}

/**
 * Filters whether to print the call to `wp_attempt_focus()` on the login screen.
 *
 * @since 4.8.0
 *
 * @param bool $print Whether to print the function call. Default true.
 */
wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>
<?php
echo  "	<p id=\"backtoblog\"><a href=\"http://$site_name/\">&larr; Back to $title</a></p>";
?>
	</div>
		<div class="clear"></div>
	</body>
	</html>
