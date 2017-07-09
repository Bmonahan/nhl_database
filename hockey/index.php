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
</style>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">NHL Search</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="#">Add</a></li>
      <li><a href="#">Quick Add</a></li>
      <li><a href="#">Delete</a></li>
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
        <input type="text" class="form-control" placeholder="Search" name="query" id='query'>
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

<div class="container">
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
</div>
</body>
</html>
