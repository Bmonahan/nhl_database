<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <!--  <link href="UserProfile.css" rel="stylesheet" media="all" /> -->
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Delete</title>
    </head>
    <style>
    	
    </style>
    <div class="container">
		<?php
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

			//         echo "ID: " . $row["id"]." Born: ". $row["brith"]." city: ". $row["city"]." Province: ". $row["province"]." country: ". $row["country"]." height: ". $row["height"]." weight: ". $row["weight"]." Draft Year: ". $row["draftY"]." Draft Round: ". $row["draftRound"]." Draft Overall: ". $row["draftPos"]." Handiness: ". $row["hand"]." position: "." First: ". $row["firstName"]." Last: ". $row["lastName"]." position: "." position: ". $row["position"]." Team: ". $row["team"]." GP: ". $row["gamesplayed"]." G: ". $row["goals"]." A: ". $row["assists"]." P: ". $row["points"]." +/-: ". $row["plusmin"]." pim: ". $row["pim"]." TOI: ". $row["toi"]." TOI/GP: ". $row["toiPerGp"]." SH%: ". $row["shotPerc"]." Clause: ". $row["clause"]." Status: ". $row["status"]." salary: ". $row["salary"]." Cap: ". $row["capHit"]."<br>";
			$query = $_GET['query'];
			$sql = "DELETE FROM Player WHERE id = '".$query."'";

			if ($conn->query($sql) === TRUE) 
			{
				echo "Record deleted successfully";
			} 
			else 
			{
				echo "Error deleting record: " . $conn->error;
			}


			$conn->close();
		?>
		<form action="index.php">
        	<input type="submit" value="Search" />
   		</form>
   	</div>
</html>