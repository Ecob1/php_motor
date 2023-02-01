
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
        
        <h1>Sign in</h1>
        <div id="container">
        <?php
          if (isset($message)) {
          echo $message;
          }
          ?>
          <form action="login.php" method="post">
            <label for='make'>Make</label><br>
            <input type="text" name="make" id="make"><br><br>
            <label for='model'>Model</label><br>
            <input type="text" name="model" id="model"><br><br> 
            <label for='description'>Description </label><br>
            <input type="text" name="description" id="description"><br><br> 
            <label for='image_path'>Image Path</label><br>
            <input type="text" name="image_path" id="image_path"><br><br>
            <label for='thumbnailPath'>Thumbnail Path</label><br>
            <input type="text" name="tumbnailPath" id="tumbnailPath"><br><br>
            <label for='price'>Price</label><br>
            <input type="digit" name="price" id="price"><br><br> 
            <label for='inStock'># In Stock</label><br>
            <input type="text" name="inStock" id="inStock"><br><br> 
            <button type="submit">Add Vehicle</button><br>
          </form><br>
        </div>       
        <?php
          require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </main>
  </div>

</body>
</html>