<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Account Info</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
<link href="../css/default.css" rel="stylesheet" type="text/css" media="all" />
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
            	<li><a href="#" accesskey="1" title="Bulletin">Bulletin</a></li>
				<li><a href="#" accesskey="2" title="Account Info">Account Info</a></li>
                <li><a href="#" accesskey="3" title="Log Out">Log Out</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="wrapper">
	<div id="page-wrapper">
		<div id="page">
			<div id="wide-content">

<?php
				session_start();
				require 'db.inc';

				// Connect to the MySQL server
                if (!($connection = @ mysql_connect($hostname, $username)))
                    die("Cannot connect");
                
                if (!(mysql_select_db($databaseName, $connection))){
                    showerror();
                    die("Database Error");
                    }

				$myemail = $_POST['myemail'];
                		$myemail = stripslashes($myemail);
                		$myemail = mysql_real_escape_string($myemail);
				$query = "UPDATE Group35.login_info SET login_info.Email = '$myemail' WHERE UID='$_SESSION[userID]'";

if(!mysql_query($query)){
	echo "<p>Fail to update Email . Please try again.</p><br />";
}else {
	echo "<p>Account Updated successfully. You will be redirected to Account Info Page.</p>";
}

?>

<meta http-equiv="refresh" content ="3; url=acc_info.php">

			</div>
		</div>
	</div>
</body>
</html>