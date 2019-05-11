<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Sign Up</title>
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
				<li><a href="../index.html" accesskey="1" title="Homepage">Homepage</a></li>
                <li><a href="../signup.php" accesskey="2" title="Sign Up">Sign Up</a></li>
                <li><a href="../login.html" accesskey="3" title="Log In">Log In</a></li>
				<li><a href="../tutorial.html" accesskey="4" title="Tutorial">Tutorial</a></li>
				<li><a href="../contact_us.html" accesskey="5" title="Contact Us">Contact Us</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="wrapper">
	<div id="page-wrapper">
		<div id="page">
			<div id="wide-content">
            
              <?php
  				require_once('../recaptcha/recaptchalib.php');
  				$privatekey = "6Le0DuASAAAAAOY4PqJaUdhIDYLgv0kaug6Ca3Al";
  				$resp = recaptcha_check_answer ($privatekey,
                               				 	$_SERVER["REMOTE_ADDR"],
                                				$_POST["recaptcha_challenge_field"],
                                				$_POST["recaptcha_response_field"]);

  				if (!$resp->is_valid) {
    				// What happens when the CAPTCHA was entered incorrectly
    				die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         				"(reCAPTCHA said: " . $resp->error . ")");
  				} else {
    				// Your code here to handle a successful verification
  				}
  				?>
            
				<?php
                    $firstname= $_POST[firstname];
                    //echo 'firstname = ' . $firstname;
                    $lastname= $_POST[lastname];
                    //echo '<br>lastname = ' . $lastname;
                    $gender= $_POST[gender];
                    //echo '<br>gender = ' . $gender;
                    $inputUsername= $_POST[username];
                    //echo '<br>username = ' . $inputUsername;
                    $inputPassword= $_POST[password];
                    //echo '<br>password = ' . $inputPassword;
                    $email= $_POST[email];
                    //echo '<br>email = ' . $email;
                ?>

				<?php
                    require 'db.inc';
          
                    //$query = "SELECT Regadd, Reglong, Reglat FROM ipocobasic2";
                    $query = "SELECT UID, First_Name, Last_Name, Gender, Username, Password, Email 
                    FROM Group35.login_info ORDER BY UID";
        
                    // Connect to the MySQL server
                    if (!($connection = @ mysql_connect($hostname, $username)))
                       die("Cannot connect");
        
                    if (!(mysql_select_db($databaseName, $connection))){
                        showerror();
                        die("Database Error");
                    }
          
          
                     if(($inputUsername != "") and ($inputPassword != "")){
                    //$query = "SELECT Regadd, Reglong, Reglat FROM ipocobasic2";
                    $insertQuery = "INSERT INTO Group35.login_info 
                    (First_Name, Last_Name, Gender, Username, Password, Email) 
                    VALUES ('". $firstname ."', '".$lastname . "', '". $gender . "', '". $inputUsername . "', '". $inputPassword . "', '" 		. $email . "');";
                    $sql_result = mysql_query($insertQuery);
                    if (!$sql_result) {
                        echo'Invalid query: ' . mysql_error();
		    } else {
			echo '<h3>You have successfully signed up!</h3> ';
		    }
                }
                ?>
                
                <h3>This page will automatically redirect you to the login page in 5 seconds.</h3>
                <meta http-equiv="refresh" content ="5; url=../login.html">
			</div>
		</div>
	</div>
	
</body>
</html>





