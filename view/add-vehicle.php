
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
  <div class="main">
    <main>
      
       <?php
         require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header_nav.php';
        ?>
        
        <h1>Add Vehicle</h1>
        <div id="container">
        <?php
          if (isset($message)) {
          echo $message;
          }
          ?>
          <form action="/phpmotors/vehicle/index.php" method="post">
            <label for='invMake'>Make</label><br>
            <input type="text" name="invMake" id="invMake"><br><br>
            <label for='invModel'>Model</label><br>
            <input type="text" name="invModel" id="invModel"><br><br> 
            <label for='invDescrption'>Description </label><br>
            <input type="text" name="invDescrption" id="invDescrption"><br><br> 
            <label for='invImage'>Image Path</label><br>
            <input type="text" name="invImage" id="invImage"><br><br>
            <label for='invThumbnail'>Thumbnail Path</label><br>
            <input type="text" name="invThumbnail" id="invThumbnail"><br><br>
            <label for='invPrice'>Price</label><br>
            <input type="digit" name="invPrice" id="invPrice"><br><br> 
            <label for='invStock'># In Stock</label><br>
            <input type="text" name="invStock" id="invStock"><br><br> 
            <label for='invColor'># Color</label><br>
            <input type="text" name="invColor" id="invColor"><br><br> 
            <label for='classificationId'># Classification</label><br><br>
            <?php
              echo $selectList;
            ?><br><br> 
            <input type="submit" name="submit" id="regbtn" value="Register">
            <input type="hidden" name="action" value="add-Vehicle">
           
          </form><br>
        </div>       
        <?php
          require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </main>
  </div>

</body>
</html>