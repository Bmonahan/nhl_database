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

			//$query = $_GET['query'];
			
			$id = $_GET['id'];
			$birth = $_GET['birth'];
			$city = $_GET['city'];
			$country = $_GET['country'];
			$height = $_GET['height'];
			$weight = $_GET['weight'];
			$firstName = $_GET['firstName'];
			$lastName = $_GET['lastName'];
			$number = $_GET['number'];
			$position = $_GET['position'];
			$age = $_GET['age'];
			$rookie = $_GET['rookie'];
			$teamAb = $_GET['teamAb'];
			$teamCity = $_GET['teamCity'];
			$team = $_GET['team'];
			$gamesplayed = $_GET['gamesplayed'];
			$goals = $_GET['goals'];
			$assists = $_GET['assists'];
			$points = $goals + $assists;
			$plusmin = $_GET['plusmin'];
			$pim = $_GET['pim'];
			$penalties = $_GET['penalties'];
			$shots = $_GET['shots'];
			$shPerc = $_GET['shPerc'];
			$hits = $_GET['hits'];
			$hattricks = $_GET['hattricks'];
			$ppG = $_GET['ppG'];
			$ppA = $_GET['ppA'];
			$ppP = $_GET['ppP'];
			$shG = $_GET['shG'];
			$shA = $_GET['shA'];
			$shP = $_GET['shP'];
			$gwg = $_GET['gwg'];
			$gtg = $_GET['gtg'];
			$faceoffs = $_GET['faceoffs'];
			$fow = $_GET['fow'];
			$fol = $_GET['fol'];
			$fop = $_GET['fop'];
			$wins = $_GET['wins'];
			$loss = $_GET['loss'];
			$otw = $_GET['otw'];
			$otl = $_GET['otl'];
			$ga = $_GET['ga'];
			$gaa = $_GET['gaa'];
			$savp = $_GET['savp'];
			$shutout = $_GET['shutout'];
			$gms = $_GET['gms'];
			$minplayed = $_GET['minplayed'];
			//$sql = 		'INSERT INTO Player (`id`, `birth`, `city`, `country`, `height`, `weight`, `firstName`, `lastName`, `position`, `number`, `age`, `rookie`, `teamAb`, `teamCity`, `team`, `gamesplayed`, `goals`, `assists`, `points`, `plusmin`, `pim`, `penalties`, `shots`, `shPerc`, `hits`, `hattricks`, `ppG`, `ppA`, `ppP`, `shG`, `shA`, `shP`, `gwg`, `gtg`, `faceoffs`, `fow`, `fol`, `fop`, `wins`, `loss`, `otw`, `otl`, `ga`, `gaa`, `savp`, `shutout`, `gms`, `minplayed`) VALUES ('.$id.', '.$birth.', '.$city.', '.$country.', '.$height.', '.$weight.', '.$firstName.', '.$lastName.','.$number.' ,'.$position.', '.$age.', '.$rookie.', '.$teamAb.', '.$teamCity.', '.$team.', '.$gamesplayed.', '.$goals.', '.$assists.', '.$points.', '.$plusmin.', '.$pim.', '.$penalties.', '.$shots.', '.$shPerc.', '.$hits.','.$hattricks.', '.$ppG.', '.$ppA.', '.$ppP.', '.$shG.', '.$shA.', '.$shP.', '.$gwg.', '.$gtg.', '.$faceoffs.', '.$fow.', '.$fol.', '.$fop.', '.$wins.', '.$loss.', '.$otw.', '.$otl.', '.$ga.', '.$gaa.', '.$savp.', '.$shutout.', '.$gms.','.$minplayed.')';
			$sql = "INSERT INTO Player VALUES ('$id', '$birth', '$city', '$country', '$height', '$weight', '$firstName', '$lastName','$position' ,'$number', '$age', '$rookie', '$teamAb', '$teamCity', '$team', '$gamesplayed', '$goals', '$assists','$points', '$plusmin', '$pim', '$penalties', '$shots', '$shPerc', '$hits','$hattricks', '$ppG', '$ppA', '$ppP', '$shG', '$shA', '$shP', '$gwg', '$gtg', '$faceoffs', '$fow', '$fol', '$fop', '$wins', '$loss', '$otw', '$otl', '$ga', '$gaa', '$savp', '$shutout', '$gms','$minplayed')";
			//$result = $conn->query($sql);
			if ($conn->query($sql) === TRUE) {
			    echo "New record created successfully";
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}


			$conn->close();
		?>
		<form action="index.php">
        	<input type="submit" value="Search" />
   		</form>
</html>