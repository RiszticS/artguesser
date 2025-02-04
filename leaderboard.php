<?php
  require("db-connect.php");
if (isset($_GET["n"]) && isset($_GET["s"])) {
 $nickname = $_GET["n"];
 $score= $_GET["s"];
 if(strlen($nickname)>0&&$score<30){
    $Con=Connect();
    Connect($Con);
    $sql = "INSERT INTO `leaderboard`(`nickname`, `score`) VALUES ('$nickname','$score');"; 
    $Con->query($sql);
}
}




function listLeaderboard(){
      $Con3=Connect();
      Connect($Con3);
      $sql3="SELECT `nickname`, `score` FROM `leaderboard` ORDER BY `score` DESC Limit 10;";
      
      $result3 = $Con3->query($sql3);
      echo "<tbody>";
       while($row3 = $result3->fetch_assoc()){
         echo "<tr>";
           echo "<td>".$row3['nickname']."</td>";
           echo "<td>".$row3['score']."</td>";				
         echo "</tr>";
       }   
      echo "</tbody>";
  }
?>


<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>ASCII ART GUESSER</title>
    <script src="p5.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-black ">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">ASCII ART GUESSER</a>
          <span id="score" class="navbar-text"></span>
        </div>
      </div>
    </nav>

    <div id="leaderboard"  class="container-fluid">
      <div class="leaderboard col-md-4">        
          <h1>A játék véget ért!</h1>
          <br><br> <br>
          <table>
            <thead>
              <tr><th>Becenév</th><th>Pontszám</th></tr>
            </thead>
            <?php  listLeaderboard(); ?>
          </table>
      </div>
    </div>

  </body>
</html>