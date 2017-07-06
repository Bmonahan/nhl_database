<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="UserProfile.css" rel="stylesheet" media="all" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <style>
    	table 
		{
			font-family: arial, sans-serif;
			border-collapse: collapse;
			border-style: round;
			border-radius: 2px;
			border-color: #fff;
			width: 100%;
			overflow-y:scroll;
			height: 100%;
			display: block;
		}

		td, th 
		{
			border: 2px solid black;
			text-align: center;
			padding: 4px;
			font-size: auto;
		}

		tr:nth-child(even) {
			background-color: #fff;
		}
		tr:nth-child(odd) {
			background-color: #064F94;
			color: white;
		}
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
			//$sql = "SELECT firstName,lastName,gamesplayed,points,goals,assists,team FROM Player Order By points ASC";
			$sql ="SELECT * FROM Player WHERE (`lastName` LIKE '%".$query."%') OR (`fistName` LIKE '%".$query."%')";
			$result = $conn->query($sql);
			echo '<table>';
			echo '<tr><th>First</th><th>Last</th><th>GP</th><th>G</th><th>A</th><th>P</th><th>Team</th></tr>';
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					//echo "team: " . $row["teamName"]. " - capHit: " . $row["capHit"]. " - capSpace: " . $row["capSpace"]. "<br>";
					//echo str_pad($fn,15),str_pad($ln,15),str_pad($gp,3),str_pad($g,3),str_pad($a,3),str_pad($p,4),str_pad($tm,10)."<br>";
					//echo $row['firstName'].", ".$row['lastName']." ". $row['gamesplayed']." ".$row['goals']." ".$row['assists']." ".$row['points']." ".$row['team'].                   "<br>";
					echo '<tr>';
					echo '<td>'.$row["firstName"].'</td>';
					echo '<td>'.$row["lastName"].'</td>';
					echo '<td>'.$row["gamesplayed"].'</td>';
					echo '<td>'.$row["goals"].'</td>';
					echo '<td>'.$row["assists"].'</td>';
					echo '<td>'.$row["points"].'</td>';
					echo '<td>'.$row["team"].'</td>';
					echo '</tr>';

				}
			} else {
				echo "0 results";
			}
			
			echo '</table>';

			$conn->close();
		?>
</html>