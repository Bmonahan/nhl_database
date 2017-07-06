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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name = "viewport" content="width = device-width,initial-scale = 1">
	    <title>Player DB</title>
	    
	    <link rel="stylesheet" type ="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <title>Update</title>
    </head>
    <style>

    </style>
    <div class="container">
    	<div class="jumbotron">
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
			$g = $_GET['goals'];
			$a = $_GET['assists'];
			if($g >0||$a>0)
			{
				$p = $g + $a;
			}
			$cap = $_GET['capHit'];
			$team = $_GET['team'];
			$fn = $_GET['firstName'];
			if(strlen($id)>1)
			{
				if(strlen($g)>0)
				{
					$sqlg = "UPDATE Player SET goals='".$g."' WHERE id='".$id."'";
					//$sqlg = "INSERT INTO Player (id,goals) VALUES ('".$id."','".$goals."') ";
					$conn->query($sqlg);
					echo "<h3>Updated goals</h3><br>";
				}
				if(strlen($a)>0)
				{
					$sqla = "UPDATE Player SET assists='".$a."' WHERE id='".$id."'";
					$conn->query($sqla);
					echo "Updated assists<br>";
				}
				if(strlen($p)>0)
				{
					$sqlp = "UPDATE Player SET points='".$p."' WHERE id='".$id."'";
					$conn->query($sqlp);
					echo "Updated points<br>";
				}
				if(strlen($cap)>0)
				{
					$sqlc = "UPDATE Player SET capHit='".$cap."' WHERE id='".$id."'";
					$conn->query($sqlc);
					echo "Updated cap<br>";
				}
				if(strlen($team)>0)
				{
					$sqlt = "UPDATE Player SET team='".$team."' WHERE id='".$id."'";
					$conn->query($sqlt);
					echo "Updated team<br>";
				}
				if(strlen($fn)>0)
				{
					$sqlf = "UPDATE Player SET firstName='".$fn."' WHERE id='".$id."'";
					$conn->query($sqlf);
					echo "Updated First Name<br>";
				}
				
			}
			//$sql = "SELECT firstName,lastName,gamesplayed,points,goals,assists,team FROM Player Order By points ASC";
			// $sql = "INSERT INTO `Hockey`.`Player` (`id`, `birth`, `city`, `province`, `country`, `height`, `weight`, `draftY`, `draftRound`, `draftPos`, `hand`, `firstName`, `lastName`, `position`, `team`, `gamesplayed`, `goals`, `assists`, `points`, `plusmin`, `pim`, `toi`, `toiPerGp`, `shotPerc`, `clause`, `status`, `salary`) VALUES ('".$id."', '".$birth."', '".$city."', '".$province."', '".$country."', '".$height."', '".$weight."', '".$dY."','".$dR."','".$dP."','".$hand."','".$fn."','".$ln."','".$pos."','".$t."','".$gp."','".$g."','".$a."','".$p."','".$plusm."','".$pim."','".$toi."','".$shp."','".$cl."','".$stat."','".$sal."','".$cap."')";
// 			$result = $conn->query($sql);
// 			$sqlVerify = "SELECT id FROM Player WHERE id '".$id."'";
// 			$resultVerify = $conn->query($sqlVerify);
			// echo '<table>';
// 			echo '<tr><th>First</th><th>Last</th><th>GP</th><th>G</th><th>A</th><th>P</th><th>Team</th></tr>';
// 			if ($resultVerify->num_rows > 0) {
// 				// output data of each row
// 				while($row = $resultVerify->fetch_assoc()) 
// 				{
// 					echo '<tr>';
// 					echo '<td>'.$row["id"].'</td>';
// 					echo '<td>'.$row["position"].'</td>';
// 					echo '<td>'.$row["firstName"].'</td>';
// 					echo '<td>'.$row["lastName"].'</td>';
// 					echo '<td>'.$row["gamesplayed"].'</td>';
// 					echo '<td>'.$row["goals"].'</td>';
// 					echo '<td>'.$row["assists"].'</td>';
// 					echo '<td>'.$row["points"].'</td>';
// 					echo '<td>'.$row["plusmin"].'</td>';
// 					echo '<td>'.$row["team"].'</td>';
// 					echo '<td>'.$row["capHit"].'</td>';
// 					echo '</tr>';
// 
// 				}
// 			} else {
// 				echo "0 results";
// 			}
// 			
// 			echo '</table>';

			$conn->close();
		?>
		<form action="index.php">
        	<button type = "submit" class="btn btn-sm">Back</button>
   		</form>
   		</div>
   	</div>
</html>