<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">     
    <title>Document</title>
</head>
<body>
 <?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header_nav.php';
?>
<main>    
  <div class="container">    
    <img class="ownToday" src="/phpmotors/images/site/own_today.png" alt="text_image">               
    <img class="delorean" src="/phpmotors/images/delorean.jpg" alt="car">
    <p class="p-dmc"><b>DMC Delorean Reviews</b></p>
    <div class="bullets">        
      <ul>
        <li>"So fast its almost like traveling in time." (4/5)</li> 
        <li>"Coolest ride on the road." (4/5)</li>
        <li>"I'm feeling Marty McFly!" (5/5)</li>
        <li>"The most futuristic ride of out day." (4.5/5)</li>
        <li>"80's livin and I love it" (5/5)</li> 
      </ul>
    </div>          
    <p class="p-delorean"><b>Delorean Upgrades</b></p>   
    <div class="second_text text">           
      <p><b>Welcome to PHP Motors!</b></p>
      <div  class="first-Text"> 
        <div id="text-b"> 
          <div><b>DMC delorean</b></div>  
          <div>3 Cup holders</div>
          <div>Superman doors</div>
          <div>FUZZY dice!</div>
        </div> 
      </div>
    </div>
    <div class="square">
    <div>
      <img class="fluxcap" src="/phpmotors/images/upgrades/flux-cap.png" alt="flux"> 
    </div> 
    <a href="">Flux Capacitor</a>     
  </div>
  <div class="square1">
      <div>
        <img class="flames" src="/phpmotors/images/upgrades/flame.jpg" alt="flames"> 
      </div> 
      <a href="">Flame Decals</a>        
  </div>    
  <div class="square2">
    <div> 
    <img class="bumper" src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="bumper">        
      
    </div>
    <a href="">Bumper Stickers</a> 
  </div>  
  <div class="square3">
    <div>
      <img class="hub-cap" src="/phpmotors/images/upgrades/hub-cap.jpg" alt="hub"> 
    </div>
    <a href="">Hub Caps</a> 
  </div>
  </div>   
</main>

<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
</body>
</html>

