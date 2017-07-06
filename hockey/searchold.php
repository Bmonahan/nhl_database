<?php
    //mysql_connect("localhost", "root", "root") or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    //mysql_select_db("Hockey") or die(mysql_error());
    /* tutorial_search is the name of database we've created */
    $servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "Hockey";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<?php
	
		$query = $_GET['query']; 
		// gets value sent over search form
		$min_length = 2;
		// you can set minimum length of the query if you want
		$sql ="SELECT * FROM Player WHERE ('lastName' LIKE '%".$query."%') OR ('fistName' LIKE '%".$query."%')";
		$result = $conn->query($sql);
		// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// articles is the name of our table
	 
		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
	 
		if(($result->num_rows > 0)
		{ // if one or more rows are returned do following
		 
			while($row = $result->fetch_assoc())
			{
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
		 
				echo "<p><h3>".$row['lastName']."</h3>".$row['firstName']."</p>";
				// posts results gotten from database(title and text) you can also show id ($results['id'])
			}
		 
		}
		else
		{ // if there is no matching rows do following
			echo "No results";
		}
		 
	?>
</body>
</html>