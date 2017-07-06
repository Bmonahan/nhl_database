<!DOCTYPE html>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "Hockey";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) 
	{
		//die("Connection failed: " . $conn->connect_error);
	} 

	mysql_select_db($dbname, $conn);
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
		<form action="" method="post">  
		<input type="text" name="term" /><br />  
		<input type="submit" value="Submit" />  
		</form>  
		<?php
	
			// echo '<table>';
// 				echo '<tr><th>First</th><th>Last</th><th>GP</th><th>G</th><th>A</th><th>P</th><th>Team</th></tr>';
			$term = $_REQUEST['term'];     
			$sql = "SELECT * FROM Player WHERE firstName LIKE '%".$term."%'"; 
			$r_query = mysql_query($sql); 
			while ($row = mysql_fetch_array($r_query))
			{  
				// echo 'Primary key: ' .$row['PRIMARYKEY'];  
				echo $row['firstName'];
				// echo '<tr>';
// 					echo '<td>'.$row["firstName"].'</td>';
// 					echo '<td>'.$row["lastName"].'</td>';
// 					echo '<td>'.$row["gamesplayed"].'</td>';
// 					echo '<td>'.$row["goals"].'</td>';
// 					echo '<td>'.$row["assists"].'</td>';
// 					echo '<td>'.$row["points"].'</td>';
// 					echo '<td>'.$row["team"].'</td>';
// 					echo '</tr>';
	
			}  

			echo '</table>';
		?>
    </body>
</html>