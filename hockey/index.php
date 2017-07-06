<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width = device-width,initial-scale = 1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Player DB</title>
    
    <link rel="stylesheet" type ="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
</head>
<body>


	<div class="container">
        <div class='page-header'>
            <h1>Hockey Database</h1>
        </div>

        <div class="jumbotron">
        <h2>Search</h2>
        <form action="gen_search.php" method="GET">
            <div class="form-group">
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
                    $sql = "SELECT id,teamCode,teamName FROM Team"; 
                    $result = $conn->query($sql);
                    echo '<span class ="selectpicker">Team</span>';
                    if($result->num_rows > 0)
                    {
                        $select= '<select class ="form-control"name="teamCode">';
                        while($row = $result->fetch_assoc())
                        {
                          $select.='<option value="'.$row['teamCode'].'">'.$row['teamName'].' - '.$row['teamCode'].'</option>';
                        }
                    }
                    $select.='</select>';
                    echo $select;
                    $conn->close();
                ?>
            </div>
            <div class="form-group">
                <span class ="selectpicker">Position</span>
                <select class ="form-control"name="pos">
                    <option value="~">N/A</option>
                    <option value="RW">RW</option>
                    <option value="LW">LW</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="G">G</option>
                </select>
            </div>

            <!-- <div class="form-group">
                <span class ="selectpicker">Country</span>
                <select class ="form-control"name="count">
                    <option value="~">N/A</option>
                    <option value="can">Canada</option>
                    <option value="us">America</option>
                    <option value="swe">Sweden</option>
                    <option value="rus">Russia</option>
                    <option value="fin">Finland</option>
                </select>
            </div> -->
        	<div class="input-group">
                <span class="input-group-addon">General Search</span>
                <input class="form-control" type="text" name="query" id="query"/>
            </div>
            <br>
            <button type = "submit" class="btn btn-primary">Search</button>
        </form>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#delete">Delete</button>
        <div id="delete" class="collapse">
            <div class="jumbotron">
                <h2>Delete</h2>
                <form action="delete.php" method="GET">
                    <div class="input-group">
                        <span class="input-group-addon">Delete by ID</span>
                        <input class="form-control" type="text" name="query" />
                    </div>
                    <br>
                    <button type = "submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>


        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#Update">Update</button>
        <div id="Update" class="collapse">
        <div class="jumbotron">
            <h2>Update</h2>
            <form action="update.php" method="GET">
                <div class="input-group">
                    <span class="input-group-addon">ID</span>
                    <input class="form-control" id="id" type="text" name="id" required/>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Update Cap</span>
                    <input class="form-control" type="text" name="capHit" />
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Update Goals</span>
                    <input class="form-control" type="text" name="goals" />
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Update Assists</span>
                    <input class="form-control" type="text" name="assists" />
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Update Team</span>
                    <input class="form-control" type="text" name="team" />
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">First Name</span>
                    <input class="form-control" type="text" name="firstName" />
                </div>

                
                <!-- <input type="submit" value="Update" />  -->
                <button type = "submit" class="btn btn-primary">Update</button>
            </form>
        </div>
        </div>


        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#quickAdd">Quick Add</button>
        <div id="quickAdd" class="collapse">
        <div class='jumbotron'>
            <h3>Quick Add a Player</h3>
            <form action="quickadd.php" method="GET">
                <div class="input-group">
                    <span class="input-group-addon">ID</span>
                    <input class="form-control" type="number" name="id" required/>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">First Name</span>
                    <input class="form-control" type="text" name="firstName" required/><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Last Name</span>
                    <input class="form-control" type="text" name="lastName" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Position</span>
                    <input class="form-control" type="text" name="position" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Team Code</span>
                    <input class="form-control" type="text" name="team" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">GP</span>
                    <input class="form-control" type="number" name="gamesplayed" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">G</span>
                    <input class="form-control" type="number" name="goals" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">A</span>
                    <input class="form-control" type="number" name="assists" /><br>
                </div>
                <button type = "submit" class="btn btn-primary">Quick Add</button>
            </form>
        </div>
        </div>


        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#add">Add</button>
        <div id="add" class="collapse">
        <div class='jumbotron'>
            <h3>Add a Player</h3>
            <form action="add.php" method="GET">
                <div class="input-group">
                    <span class="input-group-addon">ID</span>
                    <input class="form-control" type="text" name="id" required/><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Birthday</span>
                    <input class="form-control" type="text" name="birth" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">City</span>
                    <input class="form-control" type="text" name="city" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Country</span>
                    <input class="form-control" type="text" name="country" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Height</span>
                    <input class="form-control" type="number" name="height" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Weight</span>
                    <input class="form-control" type="number" name="weight" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">First Name</span>
                    <input class="form-control" type="text" name="firstName" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Last Name</span>
                    <input class="form-control" type="text" name="lastName" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Number</span>
                    <input class="form-control" type="text" name="number" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Position</span>
                    <input class="form-control" type="text" name="position" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Age</span>
                    <input class="form-control" type="text" name="age" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Rookie</span>
                    <input class="form-control" type="text" name="rookie" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Team Abr</span>
                    <input class="form-control" type="text" name="teamAb" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Team City</span>
                    <input class="form-control" type="text" name="teamCity" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Team</span>
                    <input class="form-control" type="text" name="team" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">GP</span>
                    <input class="form-control" type="text" name="gamesplayed" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">G</span>
                    <input class="form-control" type="number" name="goals" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">A</span>
                    <input class="form-control" type="number" name="assists" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">+/-</span>
                    <input class="form-control" type="text" name="plusmin" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">PIM</span>
                    <input class="form-control" type="number" name="pim" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Penalties</span>
                    <input class="form-control" type="text" name="penalties" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Shots</span>
                    <input class="form-control" type="text" name="shots" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">SH%</span>
                    <input class="form-control" type="number" name="shPerc" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Hits</span>
                    <input class="form-control" type="text" name="hits" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Hat Tricks</span>
                    <input class="form-control" type="text" name="hattricks" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">PPG</span>
                    <input class="form-control" type="number" name="ppG" /><br>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">PPA</span>
                    <input class="form-control" type="number" name="ppA" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">PPP</span>
                    <input class="form-control" type="text" name="ppP" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">SHG</span>
                    <input class="form-control" type="text" name="shG" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">SHA</span>
                    <input class="form-control" type="text" name="shA" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">SHP</span>
                    <input class="form-control" type="text" name="shP" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">GWG</span>
                    <input class="form-control" type="text" name="gwg" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">GTG</span>
                    <input class="form-control" type="text" name="gtg" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Faceoffs</span>
                    <input class="form-control" type="text" name="faceoffs" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">FOW</span>
                    <input class="form-control" type="text" name="fow" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">FOL</span>
                    <input class="form-control" type="text" name="fol" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">FO%</span>
                    <input class="form-control" type="text" name="fop" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Wins</span>
                    <input class="form-control" type="text" name="wins" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Losses</span>
                    <input class="form-control" type="text" name="loss" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">OTW</span>
                    <input class="form-control" type="text" name="otw" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">OTL</span>
                    <input class="form-control" type="text" name="otl" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">GA</span>
                    <input class="form-control" type="text" name="ga" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">GAA</span>
                    <input class="form-control" type="text" name="gaa" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">S%</span>
                    <input class="form-control" type="text" name="savp" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">SO</span>
                    <input class="form-control" type="text" name="shutout" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Game Started</span>
                    <input class="form-control" type="text" name="gms" /><br>
                </div>
                <br>
                 <div class="input-group">
                    <span class="input-group-addon">Min. Played</span>
                    <input class="form-control" type="text" name="minplayed" /><br>
                </div>
                <br>
                <button type = "submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        </div>











	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootsrapcdn.com/bootsrap/3.3.7/js/bootstrap.min.js"></script>
	
</body>
</html>
