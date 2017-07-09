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
    </head>
    <style>
    	
    </style>
    <div class="container">
            <h1>Search Results</h1>
        <form action="index.php">
	    	<input class='btn btn-primary' type="submit" value="Back" />
		</form>
	</div>
    <body>
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

			if(isset($_GET['order']))
			{
				$order = $_GET['order'];
			}
			else 
			{
				$order = 'lastName';
			}
			if(isset($_GET['sort']))
			{
				$sort = $_GET['sort'];
			}
			else 
			{
				$sort = 'ASC';
			}

			$query = $_GET['query'];
			$query = preg_replace("#[^a-z]#i", "", $query);
			$teamCode = $_GET['teamCode'];
			$country = "~";
			$pos = $_GET['pos'];
			$any = "ALL";
			$anyC = "~";
			$anyP = "~";
			if($teamCode == $any and  $pos == $anyP)
			{
				$sql = "SELECT * FROM Player WHERE (firstName LIKE '%".$query."%') OR (lastName LIKE '%".$query."%') OR (team LIKE '%".$query."%') ORDER BY ".$order." ".$sort." "; 
			}
			elseif ($teamCode == $any and $pos != $anyP) 
			{
				$sql = "SELECT * FROM Player WHERE position='".$pos."' AND (firstName LIKE '%".$query."%' OR lastName LIKE '%".$query."%' OR team LIKE '%".$query."%') ORDER BY ".$order." ".$sort." ";
			}
			elseif ($teamCode != $any and $pos != $anyP) 
			{
				$sql = "SELECT * FROM Player WHERE teamAb='".$teamCode."' AND position='".$pos."' AND (firstName LIKE '%".$query."%' OR lastName LIKE '%".$query."%' OR team LIKE '%".$query."%') ORDER BY ".$order." ".$sort." ";
			}
			elseif ($teamCode != $any and $pos == $anyP) 
			{
				$sql = "SELECT * FROM Player WHERE teamAb='".$teamCode."' AND (firstName LIKE '%".$query."%' OR lastName LIKE '%".$query."%' OR team LIKE '%".$query."%') ORDER BY ".$order." ".$sort." ";
			}
			$result = $conn->query($sql);
			$num_rows = $result->num_rows;

			$count = 1;
			$gTotal = 0;
			$aTotal = 0;
			$gpTotal = 0;
			$pTotal =0;
			$pmTotal = 0;
			if ($result->num_rows > 0) 
			{
				$sort == 'DESC' ? $sort = 'ASC' : $sort ='DESC';

				echo '<h5 class="text-center">'.$num_rows. ' results</h5>';
				echo '<table class="table table-bordered table-striped table-hover sticky-header">';
				echo '<thead>';
				echo '<tr> <td colspan="25" class ="text-center">Players matching: <strong>'.$query.'</strong></td>';
				echo '</thead>';
				echo '<thead>';
				echo 	'<tr>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=id&&sort='.$sort.'"> #</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=id&&sort='.$sort.'"> ID</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=birth&&sort='.$sort.'"> Birthday</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=city&&sort='.$sort.'"> City</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=country&&sort='.$sort.'"> Country</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.''.$pos.'&&query='.$query.'&&order=height&&sort='.$sort.'"> Height</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=weight&&sort='.$sort.'"> Weight</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=age&&sort='.$sort.'"> Age</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=number&&sort='.$sort.'"> Jersey Number</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=position&&sort='.$sort.'"> Position</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=firstName&&sort='.$sort.'"> First</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=lastName&&sort='.$sort.'"> Last</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=gamesplayed&&sort='.$sort.'"> GP</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=goals&&sort='.$sort.'"> G</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=assists&&sort='.$sort.'"> A</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=points&&sort='.$sort.'"> P</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=plusmin&&sort='.$sort.'"> +/-</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=teamAb&&sort='.$sort.'"> Team</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=pim&&sort='.$sort.'"> PIM</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=penalties&&sort='.$sort.'"> Penalties</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=shots&&sort='.$sort.'"> Shots</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=shPerc&&sort='.$sort.'"> SH%</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=hits&&sort='.$sort.'"> Hits</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=fop&&sort='.$sort.'"> FO%</a></th>
						<th class="text-center"><a href="?teamCode='.$teamCode.'&pos='.$pos.'&&query='.$query.'&&order=ppP&&sort='.$sort.'"> PPP</a></th>
					</tr>';
				echo '</thead>';
				while($row = $result->fetch_assoc()) 
				{
					$aTotal += $row['assists'];
					$gTotal += $row['goals'];
					$gpTotal += $row['gamesplayed'];
					$pTotal += $row['points'];
					$pmTotal += $row['plusmin'];
					echo '<tr>';
						echo '<td>'.$count.'</td>';
						echo '<td>'.$row["id"].'</td>';
						echo '<td>'.$row["birth"].'</td>';
						echo '<td>'.$row["city"].'</td>';
						echo '<td>'.$row["country"].'</td>';
						echo '<td>'.$row["height"].'</td>';
						echo '<td>'.$row["weight"].'</td>';
						echo '<td>'.$row["age"].'</td>';
						echo '<td>'.$row["number"].'</td>';
						echo '<td>'.$row["position"].'</td>';
						echo '<td>'.$row["firstName"].'</td>';
						echo '<td>'.$row["lastName"].'</td>';
						echo '<td>'.$row["gamesplayed"].'</td>';
						echo '<td>'.$row["goals"].'</td>';
						echo '<td>'.$row["assists"].'</td>';
						echo '<td>'.$row["points"].'</td>';
						echo '<td>'.$row["plusmin"].'</td>';
						echo '<td>'.$row["teamAb"].'</td>';
						echo '<td>'.$row["pim"].'</td>';
						echo '<td>'.$row["penalties"].'</td>';
						echo '<td>'.$row["shots"].'</td>';
						echo '<td>'.$row["shPerc"].'</td>';
						echo '<td>'.$row["hits"].'</td>';
						echo '<td>'.$row["fop"].'</td>';
						echo '<td>'.$row["ppP"].'</td>';
					echo '</tr>';
					$count++;
				}
			} else {
				echo "0 results";
			}
			setlocale(LC_MONETARY, 'en_US');
			$capTotNew = money_format('%n', $capTotal);
			//echo '';
			echo '<tr>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td>'.$gpTotal.'</td>';
				echo '<td>'.$gTotal.'</td>';
				echo '<td>'.$aTotal.'</td>';
				echo '<td>'.$pTotal.'</td>';
				echo '<td>'.$pmTotal.'</td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
			echo '</tr>';
			echo '</table>';

			$conn->close();
		?>
		<script type="text/javascript">
			$(document).ready(function(){

			$(".sticky-header").floatThead({scrollingTop:50});

			});
		</script>
		<form action="nhl_database/hockey/index.php">
        	<input type="submit" value="Back" />
   		</form>
   		</body>
</html>