<!doctype html>
<html lang = "en">
<head>
	<meta charset= "utf-8">
	<title>Unique Usernames </title>
</head>
<body>
<h1>Enter a username</h1>
<!-- Creates a form which prompts user to enter a username
The data is processed in the same php file
-->
<form action = 'Violeta_Solorio_project_3.php' method = 'POST'>
<p>Username: <input type = 'text' name = 'username' size = '20' required>
<input type ='submit' name = 'submit' value= 'Click to submit' required>
</form>
<?php
//mkdir('users',0777);//Created the directory for usernames. It is commented due to errors displaying that the directory was already created
$dir = realpath('users');//Gets realpath for the directory

$file = $dir.'username.txt';
if($_SERVER['REQUEST_METHOD']=='POST'){//Checks if there is a submission
	$issue = FALSE;//Will be used to check validity of input
	if(empty($_POST['username'])){//Checks if username is empty
		$problem = TRUE;//Input is not valid
		print '<h2> Enter a username</h2>';
	}
	//Open File
	$proof_check = fopen($file,'r');
	
	while($line = fgetcsv($proof_check,500,"\t")){//Goes through file to check if username is taken
		if(($line[0]== $_POST['username'])){//Compares file line to username submitted
			$issue = TRUE;//True if a match is found
			print "This username is taken. Input a different username";
		}
	}
	
	if(!$issue){//If username is not empty & no matches are found in directory
			$userName = $_POST['username'];//Assigns variable userName the inputted username
			file_put_contents($file,$userName.PHP_EOL  ,FILE_APPEND);//Appends username submitted to directory

			print "<h2>Your username has been added!";
		
	}
	
}

?>
</body>
</html>