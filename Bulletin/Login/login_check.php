<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Login</title>
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
				<li><a href="#" accesskey="1" title="Homepage">Homepage</a></li>
                <li><a href="#" accesskey="2" title="Sign Up">Sign Up</a></li>
                <li><a href="#" accesskey="3" title="Log In">Log In</a></li>
				<li><a href="#" accesskey="4" title="Tutorial">Tutorial</a></li>
				<li><a href="#" accesskey="5" title="Contact Us">Contact Us</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="wrapper">
	<div id="page-wrapper">
		<div id="page">
			<div id="wide-content">
            <?php                
                require 'db.inc';
                
                // Connect to the MySQL server
                if (!($connection = @ mysql_connect($hostname, $username)))
                    die("Cannot connect");
                
                if (!(mysql_select_db($databaseName, $connection))){
                    showerror();
                    die("Database Error");
                    }
                
                // username and password sent from form 
                $myusername=$_POST['myusername']; 
                $mypassword=$_POST['mypassword']; 
                
                // To protect MySQL injection (more detail about MySQL injection)
                $myusername = stripslashes($myusername);
                $mypassword = stripslashes($mypassword);
                $myusername = mysql_real_escape_string($myusername);
                $mypassword = mysql_real_escape_string($mypassword);
                $sql="SELECT * FROM login_info WHERE username='". $myusername ."' and password='". $mypassword ."'";
                $result=mysql_query($sql);
                
                if (!$sql_result) {
    				echo'Invalid query: ' . mysql_error();
				}
				    
                // Mysql_num_row is counting table row
                $count=mysql_num_rows($result);

				$row = mysql_fetch_assoc($result);

                // If result matched $myusername and $mypassword, table row must be 1 row
                if($count==1){
                
                // Register $myusername, $mypassword and redirect to file "login_success.php"
                session_start();
                $_SESSION["theusernames"] = $myusername;
                $_SESSION["userID"] = $row["UID"];
				$_SESSION["userPassword"] = $mypassword;
                header("location:login_success.php");
                }
                else {
                echo "Wrong Username or Password. You will be redirected to Login page.";
                }
			?>
            <meta http-equiv="refresh" content ="3; url=../login.html">
			</div>
		</div>
	</div>
	

</body>
</html>
