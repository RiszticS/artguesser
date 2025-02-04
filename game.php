<?php
  require("db-connect.php");
  if(isset($_POST['whattoguess']))	
    $whattoguess = $_POST['whattoguess'];
  else
    $whattoguess = "cim";
  if(isset($_POST['nickname']))	
    $nickname  = $_POST['nickname'];
  else  
    $nickname  = "guest";

	$Con = Connect();
	$sql = "SELECT paintings.id,paintings.cim,paintings.title,paintings.source,painters.name FROM `paintings` INNER JOIN painters on painters.id=paintings.painterId ORDER BY RAND()";
	$result = $Con->query($sql);
  $paintingsArray=array();
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc() ){
           $paintingsArray[]=$row;           
		}
  }

  $Con2 = Connect();
	$sql2 = "SELECT `id`, `name`, `birth`, `death` FROM `painters` ORDER BY RAND();";
	$result2 = $Con2->query($sql2);
  $paintersArray=array();
	if($result2->num_rows > 0){
		while($row2 = $result2->fetch_assoc() ){
           $paintersArray[]=$row2;           
		}
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
          <span id="score" class="navbar-text">SCORE:0</span>
        </div>
      </div>
    </nav>

    <div id="game"  class="container-fluid">
      <div class="row">
        <div class="col-md-12 "><h2 id="gamequestion">MI A CÍME ENNEK A FESTMÉNYNEK?</h2></div>
        <div class="col-md-5 ">
          <main></main>
        </div>
        <div class="col-md-1 "></div>
        <div class="col-md-6 ">
          <div class="row" id="buttons" >
            <h2  class="col-md-6 button" id="1" onclick="answerButtonClick(this.id);">Mona Lisa</h2>
            <h2  class="col-md-6 button" id="2" onclick="answerButtonClick(this.id);">A csók</h2>
            <h2  class="col-md-6 button" id="3" onclick="answerButtonClick(this.id);">Tavasz</h2>
            <h2  class="col-md-6 button" id="4" onclick="answerButtonClick(this.id);">Ádám teremtése</h2>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>

<script>
          const density = 'Ñ@#W$9876543210?!abc;:+=-,._          ';      
          var paintingsArray=<?php echo json_encode($paintingsArray); ?>;
          var paintersArray=<?php echo json_encode($paintersArray); ?>;
          var arrayLength;
          var _round = 1;
          var score=0;
          var answer="";   
          let picture;
          var whattoguess=<?php echo json_encode($whattoguess); ?>;
          var nickname=<?php echo json_encode($nickname); ?>;
          const btn1 = document.getElementById(1);
          const btn2 = document.getElementById(2);
          const btn3 = document.getElementById(3);
          const btn4 = document.getElementById(4);
          console.log(paintingsArray);
          console.log(paintersArray);

          function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
          }


          function whatToGuess() {  
            if(whattoguess=="cim") { 
              document.getElementById('gamequestion').innerHTML = "MI A CÍME ENNEK A FESTMÉNYNEK?";
              arrayLength=paintingsArray.length;
            } 
            else { 
              document.getElementById('gamequestion').innerHTML = "KI FESTETTE EZT A FESTMÉNYT?";
              arrayLength=paintersArray.length;
            } 
          } 
           
          /*Game*/
          async function answerButtonClick(id) {
              const btn = document.getElementById(id);
              const scoretxt = document.getElementById("score");
              
              btn.style.backgroundColor="rgb(39, 39, 39)";
              rmOnClick();
              await sleep(500);
              if (answer===btn.innerText) {
                score++;
                scoretxt.innerText=("SCORE:"+score.toString());
                btn.style.color = "rgb(139, 214, 139)";
              }
              else
              {
                btn.style.color = "rgb(214, 139, 139)";
              }

              await sleep(2000);
              btn.removeAttribute("style");
              addOnClick();
              if(_round==paintingsArray.length){
                location.href = "leaderboard.php?n=" + nickname + "&s=" + score;
              }
              else
              {             
                _round++;
              }         
              answerButtonTextChange();
          }         
          
          function rmOnClick(){
            btn1.removeAttribute("onClick");
            btn2.removeAttribute("onClick");
            btn3.removeAttribute("onClick");
            btn4.removeAttribute("onClick");
          }

          function addOnClick(){
            btn1.setAttribute("onclick","answerButtonClick(this.id);");
            btn2.setAttribute("onclick","answerButtonClick(this.id);");
            btn3.setAttribute("onclick","answerButtonClick(this.id);");
            btn4.setAttribute("onclick","answerButtonClick(this.id);");
          }

          
          function answerButtonTextChange(){     
              console.log(_round-1);
              var index = [];
              for(var i=0;i<4;i++){
                index[i]=Math.floor(Math.random() *arrayLength);
                console.log("index elemei: "+index[i]);
                if (index[i]==(_round-1)){
                  console.log("egyezés"+index[i]);
                  do{
                      index[i]=Math.floor(Math.random() * arrayLength);
                      console.log("nem egyezés"+index[i]);
                  } while(index[i]==(_round-1))
                }                  
              } 
              for (var d = 0; d < 2; d++) {
                for (var i = 0; i < index.length; i++) {
                    // Inner for loop
                    for (var j = 0; j < index.length; j++) {
                        // Skip self comparison
                        if (i !== j) {
                            // Check for duplicate
                            if (index[i] === index[j]) {
                              console.log("duplázó: "+index[i]);
                              index[i]=Math.floor(Math.random() * arrayLength);

                              if (index[i]==(_round-1)){
                                console.log("duplázoegyezés"+index[i]);
                                do{
                                    index[i]=Math.floor(Math.random() * arrayLength);
                                    console.log("nem duplazoegyezés"+index[i]);
                                } while(index[i]==(_round-1))
                              }
                              console.log("nem duplázó: "+index[i]);
                            }
                        }
                    }
                }
              }


              console.log(index);
              picture = loadImage("paintings/"+paintingsArray[_round-1].source);
              const ansBtn = document.getElementById(Math.floor(Math.random() * 4)+1);
              if(whattoguess=="cim"){
                answer=paintingsArray[_round-1].cim;              
                btn1.innerText=paintingsArray[index[0]].cim;
                btn2.innerText=paintingsArray[index[1]].cim;
                btn3.innerText=paintingsArray[index[2]].cim;
                btn4.innerText=paintingsArray[index[3]].cim;               
                ansBtn.innerText=answer;  
              } 
              else if(whattoguess=="name"){
                answer=paintingsArray[_round-1].name;
                btn1.innerText=paintersArray[index[0]].name;
                btn2.innerText=paintersArray[index[1]].name;
                btn3.innerText=paintersArray[index[2]].name;
                btn4.innerText=paintersArray[index[3]].name;
                ansBtn.innerText=answer;  
              }        
          }
          /*****************************************************************/
   
     

          /*Painting draw*/
          function preload() {        
            picture = loadImage("paintings/"+paintingsArray[_round-1].source);     
            whatToGuess();
            answerButtonTextChange(); 
          }

          function setup() {
              let canvas=createCanvas(1200,1200);
              
              canvas.class("canvas");
              canvas.style("width:100% ");
              canvas.style("height:100%");
          }

          function draw(){
              background(0);
              //image(picture,0,0,width,height);

              let w = width / picture.width;
              let h = height / picture.height;
              picture.loadPixels();

              for (let i = 0; i < picture.width; i++) {
                  for (let j = 0; j < picture.height; j++) {  
                      const pixelIndex = (i + j * picture.width) * 4;
                      const r = picture.pixels[pixelIndex + 0];
                      const g = picture.pixels[pixelIndex + 1];
                      const b = picture.pixels[pixelIndex + 2];
                      const avg = (r + g + b) / 3;
                      noStroke();
                      fill(255); 
                      const len = density.length;
                      const charIndex = floor(map(avg, 0, 255, len, 0));
                      textSize(w);
                      textAlign(CENTER,CENTER);
                      text(density.charAt(charIndex),i*w,j*h);
                      const c = density.charAt(charIndex);
                  }
              }
          }
          /*****************************************************************/
      </script>