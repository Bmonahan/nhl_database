<!DOCTYPE html>
<html lang="en">
<head>
  <title>NHL Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  .navbar
  {
    border-radius: 0px;
    margin-bottom: 0px;
  }
  .input-group-addon {
    min-width:100px;
  }
  .container-fluid
  {
    background-color: #1B2631;
  }
  .col-lg-6
  {
    color: #fff;
  }
  .active
  {
    background-color: #17202A;
  }
</style>

<nav class="navbar navbar-inverse" id="top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">NHL Search</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="#add">Add</a></li>
      <li><a href="#quick_add">Quick Add</a></li>
      <li><a href="#update">Update</a></li>
      <li><a href="#delete">Delete</a></li>
    </ul>
    <form class="navbar-form navbar-left" action="gen_search.php" method="GET" style=" border-left: 1px solid #FFF; padding-right: -10px;">
      <span class ="selectpicker"style="color: #fff;">Team:</span>;
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
              if($result->num_rows > 0)
              {
                  $select= '<select class ="form-control" style="width: 100%;" name="teamCode">';
                  while($row = $result->fetch_assoc())
                  {
                    $select.='<option label="'.$row['teamCode'].'" value="'.$row['teamCode'].'">'.$row['teamName'].' - '.$row['teamCode'].'</option>';
                  }
              }
              $select.='</select>';
              echo $select;
              $conn->close();
          ?>
      </div>
      <div class="form-group">
          <span class ="selectpicker" style="padding-left: 2px;color: #fff;">Position:</span>
          <select class ="form-control"name="pos">
              <option value="~">N/A</option>
              <option value="RW">RW</option>
              <option value="LW">LW</option>
              <option value="C">C</option>
              <option value="D">D</option>
              <option value="G">G</option>
          </select>
      </div>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search..." name="query" id='query'>
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
      <!-- <div class="input-group">
        <input type="text" class="form-control" name="pos" id='pos' value='~' readonly>
      </div> -->
    </form>
  </div>
</nav>



<body>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style=" width:100%; height: 900px !important;">
      <div class="item active">
        <img src="bergeron.jpg" alt="Los Angeles" style="width:100%;">
        <h1>Welcome</h1>
      </div>

      <div class="item">
        <img src="quick.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="kane.jpg" alt="New york" style="width:100%;">
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container-fluid">
    <div class="row" id="add_delete">
        <div class="col-lg-6">
            <h2>Delete</h2>
            <form action="delete.php" method="GET" id="delete">
                <div class="input-group">
                    <span class="input-group-addon">Delete by ID</span>
                    <input class="form-control" type="text" name="query" />
                </div>
                <br>
                <button type = "submit" class="btn btn-primary">Delete</button>
            </form>
        </div>
        <div class="col-lg-6">
            <h2>Update</h2>
            <form action="update.php" method="GET" id="update">
                <div class="input-group">
                    <span class="input-group-addon">ID</span>
                    <input class="form-control" id="id" type="text" name="id" required/>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Goals</span>
                    <input class="form-control" type="text" name="goals" />
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Assists</span>
                    <input class="form-control" type="text" name="assists" />
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Team</span>
                    <input class="form-control" type="text" name="team" />
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">First Name</span>
                    <input class="form-control" type="text" name="firstName" />
                </div>
                <br>
                <button type = "submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row" >
        <div class="col-lg-12" id="breakpoint">
          <a class="btn btn-md btn-primary" href="#top">Return to top</a>
        </div>
    </div>
  </div>



  <div class="container-fluid">
    <div class="row" >
        <div class="col-lg-6" id="quick_add">
            <h2>Quick Add a Player</h2>
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
                <br>
                <button type = "submit" class="btn btn-primary">Quick Add</button>
            </form>
        </div>
        <div class="col-lg-6" id="add">
            <h2>Add a Player</h2>
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

</body>
<footer>
  <h3>Footer</h3>
</footer>
</html>
