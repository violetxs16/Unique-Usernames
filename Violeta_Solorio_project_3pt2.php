<!doctype html>
<html lang = "en">
<head>
	<meta charset= "utf-8">
	<title>Database </title>
</head>
<body>
<h1>Enter a username</h1>
<!-- Creates a form which prompts user to enter a username
The data is processed in the same php file
-->
<form action = 'Violeta_Solorio_project_3pt2.php' method = 'POST'>
<p>Username: <input type = 'text' name = 'username' size = '20' required>
<input type ='submit' name = 'submit' value= 'Click to submit' required>
</form>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$issue = FALSE;
		if(!empty($_POST['username'])){//Checks if username is not empty
			$username = trim(strip_tags($_POST['username']));//Uses trim & strip_tags to make username more secure
		}else{
			print "Submit a username";//If submition is empty, it prompts user to enter a username
		}
		$dbc = mysqli_connect('localhost','username','password','username'); //Connects to database
		$query = 'SELECT * FROM usernames'; //Defines the query and gets every column from the database
		if($name = mysqli_query($dbc,$query)){//Runs query on the database
			while($row = mysqli_fetch_array($name)){//Loops through array
				if($row['entry'] == $_POST['username']){//Condition if true if username is taken within database
					print "The username is taken. Create another username.";//Prints out statement to user
					$issue = TRUE;//Raises an issue
				}
			}
		}else{
			print "Could not retrieve usernames";
		}
		if(!$issue){//If no isses, it adds the username to the database
			 $query = "INSERT INTO usernames(entry) VALUES('$username')";//Defines the query with Insert Values
			 if(@mysqli_query($dbc, $query)){//Runs query on database
				 print"Username has been added";
			 }else{
				 print "Username could not be added because".mysqli_error($dbc)."query";
			 }
			 mysqli_close($dbc);
		}
	}
?>
</body>
</html>