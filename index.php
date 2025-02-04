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
 <!-- <pre>      _____   _____  _____  _____             _____  _______    _____  _    _  ______   _____  _____  ______  _____  
     /\     / ____| / ____|/ ____||_   _|     /\    |  __ \|__   __|  / ____|| |  | ||  ____| / ____|/ ____||  ____||  __ \ 
    /  \   | (___  | |    | |       | |      /  \   | |__) |  | |    | |  __ | |  | || |__   | (___ | (___  | |__   | |__) |
   / /\ \   \___ \ | |    | |       | |     / /\ \  |  _  /   | |    | | |_ || |  | ||  __|   \___ \ \___ \ |  __|  |  _  / 
  / ____ \  ____) || |____| |____  _| |_   / ____ \ | | \ \   | |    | |__| || |__| || |____  ____) |____) || |____ | | \ \ 
 /_/    \_\|_____/  \_____|\_____||_____| /_/    \_\|_|  \_\  |_|     \_____| \____/ |______||_____/|_____/ |______||_|  \_\
                                                                                                                            </pre>-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black ">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">ASCII ART GUESSER</a>
          <span id="score" class="navbar-text"></span>
        </div>
      </div>
    </nav>

    <div id="startmenu"  class="container-fluid">
      <div class="startmenu col-md-4">
        

                                                                                                                            

        <h2>Mit szeretnél kitalálni?</h2>
        <form action="game.php" method="POST">
          <label class="radiocontainer">A festmény nevét
            <input type="radio" class="radio" checked="checked" name="whattoguess" value="cim" id="painting">
          </label>
          <label class="radiocontainer">A festő nevét
            <input type="radio" class="radio" name="whattoguess" value="name" id="painter">
          </label>
          </br></br>
            Add meg a beceneved: <input type="text" name="nickname"/>
          </br>

          </br></br></br><button  class="startgamebutton" type="submit">Játék inditása</button>
          </form>
      </div>
    </div>
  </body>
</html>