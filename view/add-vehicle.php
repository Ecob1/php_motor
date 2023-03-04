<?php
// This is for the dropdown from navigation bar. 
$selectList = "<select name='classificationId'>";
$selectList .= "<option>Choose a classification</option>";
  foreach($classifications as $classification){
    $selectList .= "<option value='$classification[classificationId]'";
    if (isset($classificationId)){
      if($classification['classificationId'] === $classificationId){
           $selectList .=  ' selected ';
      }
    }    
    $selectList .= ">$classification[classificationName]</option>";
  }
$selectList .= "</select>"; 
?><?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}
?><!DOCTYPE html>
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
            <input type="text" name="invMake" id="invMake" <?php if(isset($invMake)){
            echo "value='$invMake'";} ?>required><br><br>
            <label for='invModel'>Model</label><br>
            <input type="text" name="invModel" id="invModel" <?php if(isset($invModel)){
            echo "value='$invModel'";} ?> required><br><br> 
            <label for='invDescription'>Description</label><br>
            <!-- <input type="text" name="invDescription" id="invDescription" required><br><br>  -->
            <textarea name="invDescription" id="invDescription" rows="3" cols="25" required><?php if(isset($invDescription)){
            echo $invDescription;} ?></textarea><br><br>
            <label for='invImage'>Image Path</label><br>
            <input type="text" name="invImage" id="invImage" <?php if(isset($invImage)){
            echo "value='$invImage'";} ?> required><br><br>
            <label for='invThumbnail'>Thumbnail Path</label><br>
            <input type="text" name="invThumbnail" id="invThumbnail" <?php if(isset($invThumbnail)){
            echo "value='$invThumbnail'";} ?> required><br><br>
            <label for='invPrice'>Price</label><br>
            <input type="number" name="invPrice" id="invPrice" <?php if(isset($invPrice)){
            echo "value='$invPrice'";} ?> required><br><br> 
            <label for='invStock'># In Stock</label><br>
            <input type="text" name="invStock" id="invStock" <?php if(isset($invStock)){
            echo "value='$invStock'";} ?> required><br><br> 
            <label for='invColor'># Color</label><br>
            <input type="text" name="invColor" id="invColor" <?php if(isset($invColor)){
            echo "value='$invColor'";} ?> required><br><br> 
            <label for='classificationId'># Classification</label><br><br>
            <input type="text" name="classificationId" id="classificationId" <?php if(isset($classificationId)){
            echo "value='$classificationId'";} ?> required><br><br> 
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