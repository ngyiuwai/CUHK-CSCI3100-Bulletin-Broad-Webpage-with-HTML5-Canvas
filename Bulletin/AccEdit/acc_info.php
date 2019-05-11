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
            	<li><a href="../interface/main.html" accesskey="1" title="Bulletin">Bulletin</a></li>
				<li><a href="acc_info.php" accesskey="2" title="Account Info">Account Info</a></li>
                <li><a href="../logout/logout.php" accesskey="3" title="Log Out">Log Out</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="wrapper">
	<div id="page-wrapper">
		<div id="page">
			<div id="wide-content">
            
<?php

  print "<h1>Account Information</h1>";
  session_start();
  require 'db.inc';
  
  // Show the wines in an HTML <table>
  function displayWines($result)
  
  {
     // Start a table, with column headers
     print "\n<table>\n<tr>\n" .
          "\n\t<th>User ID</th>" .
          "\n\t<th>First Name</th>" .
          "\n\t<th>Last Name</th>" .
          "\n\t<th>Gender</th>" .
          "\n\t<th>User Name</th>" .
          "\n\t<th>E-mail</th>" .
          "\n</tr>";

     // Until there are no rows in the result set, fetch a row into 
     // the $row array and ...
     while ($row = @ mysql_fetch_row($result))
     {
        // ... start a TABLE row ...
        print "\n<tr>";

        // ... and print out each of the attributes in that row as a
        // separate TD (Table Data).
        foreach($row as $data)
           print "\n\t<td> {$data} </td>";

        // Finish the row
        print "\n</tr>";
		break;
     }

     // Then, finish the table
     print "\n</table>\n";
  }
  
  //$query = "SELECT Regadd, Reglong, Reglat FROM ipocobasic2";
  $query = "SELECT UID, First_Name, Last_Name, Gender, Username, Email 
  FROM Group35.login_info WHERE UID=$_SESSION[userID]";

  // Connect to the MySQL server
  if (!($connection = @ mysql_connect($hostname, $username)))
     die("Cannot connect");

  if (!(mysql_select_db($databaseName, $connection))){
  	showerror();
  	die("Database Error");
  }

  //mysql_query("set names utf8;"); 

  // Run the query on the connection
  if (!($result = @ mysql_query ($query, $connection))){
  	showerror();
  	die("Query Error");
  }	
  
  // Display the results
  displayWines($result);

?>

	<br />
	<h1>Edit Account</h1>
	<form method="post" name="update" action="acc_update_password.php" /> 
    	Old Password:<br/>
        <input name="mypassword0" type="password" id="mypassword1"><br/>
		New Password:<br/>
		<input name="mypassword1" type="password" id="mypassword1"><br/>
        Confirm New Password:<br />
        <input name="mypassword2" type="password" id="mypassword2"><br/>
		<input type="submit" name="Submit" value="Update Password" />
	<br/>
    </form>

	<form method="post" name="update" action="acc_update_email.php" /> 
		New E-mail address:<br/>
		<input name="myemail" type="text" id="myemail"><br/>
		<input type="submit" name="Submit" value="Update Email" />
        <br />
	</form>
<br />

<h1>Delete Account</h1>
<a href="acc_del.html" accesskey="1" title="Delete Account">Delete Account</a>
	

			</div>
		</div>
	</div>
	

</body>
</html>
