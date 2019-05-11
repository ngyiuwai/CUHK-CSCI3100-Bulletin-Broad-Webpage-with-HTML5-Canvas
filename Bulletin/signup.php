<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sign Up</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<!--[if IE 6]>
<link href="default_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
</head>
<body>
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">Bulletin</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.html" accesskey="1" title="Homepage">Homepage</a></li>
                <li><a href="signup.php" accesskey="2" title="Sign Up">Sign Up</a></li>
                <li><a href="login.html" accesskey="3" title="Log In">Log In</a></li>
				<li><a href="tutorial.html" accesskey="4" title="Tutorial">Tutorial</a></li>
				<li><a href="contact_us.html" accesskey="5" title="Contact Us">Contact Us</a></li>
			</ul>
		</div>
	</div>
</div>

<div id="wrapper">
	<div id="page-wrapper">
		<div id="page">
			<div id="wide-content">
				<form id="form2" name="form2" method="post" action="signup/signup_check.php">
                
                <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
				<tr>
				<td width="60">First name</td>
				<td width="5">:</td>
				<td><input type="text" name="firstname" id="firstname" size="15" /></td>
				</tr>
				<tr>
				<td>Last name</td>
				<td>:</td>
				<td><input type="text" name="lastname" id="lastname" size="15" /></td>
				</tr>
				<tr>
				<td>Gender</td>
				<td>:</td> 
				<td><input type="radio" name="gender" id="gender" value="M">Male
				<input type="radio" name="gender" id="gender" value="F">Female</td>
				</tr>
				<tr>
				<td>User name</td>
				<td>:</td>
				<td><input type="text" name="username" id="username" size="15" /></td>
				</tr>
				<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password" id="password" size="15"></td>
				</tr>
				<tr>
				<td>Email</td>
				<td>:</td>
				<td><input type="text" name="email" id="email" size="30" /></td>
				</tr>
				</table>
         		<?php
         			require_once('recaptcha/recaptchalib.php');
          			$publickey = "6Le0DuASAAAAANeVAds4lOx7xQhG8_KXB3VBiW8H"; // you got this from the signup page
          			echo recaptcha_get_html($publickey);
        		?>
                <input type="submit" name="submit" id="submit" value="Submit"/>
                </form>
			</div>
		</div>
	</div>

</body>
</html>

