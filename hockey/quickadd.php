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
        <title>ADD</title>
    </head>
    <style>
    	
    </style>
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
			echo $query; 
			
			$id = $_GET['id'];
			$fn = $_GET['firstName'];
			$ln = $_GET['lastName'];
			$pos = $_GET['position'];
			$t = $_GET['team'];
			$gp = $_GET['gamesplayed'];
			$g = $_GET['goals'];
			$a = $_GET['assists'];
			$p = $g + $a;
			$plusm = $_GET['plusmin'];
			//$sql = "SELECT firstName,lastName,gamesplayed,points,goals,assists,team FROM Player Order By points ASC";
			$sql = "INSERT INTO `Hockey`.`Player` (id,`firstName`, `lastName`, `position`, `team`, `gamesplayed`, `goals`, `assists`, `points`) VALUES ('".$id."','".$fn."','".$ln."','".$pos."','".$t."','".$gp."','".$g."','".$a."','".$p."')";
			$result = $conn->query($sql);
			$conn->close();
		?>
		<form action="index.php">
        	<input type="submit" value="Search" />
   		</form>
</html>