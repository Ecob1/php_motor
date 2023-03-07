<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}

// Build the classifications option list
$classifList = '<select name="classificationId" id="classificationId">';
$classifList .= "<option>Choose a Car Classification</option>";
foreach ($carClassifications as $classification) {
    $classifList .= "<option value='$classification[classificationId]'";
        if(isset($classificationId)){
            if($classification['classificationId'] === $classificationId){
                $classifList .= ' selected ';
                }
            } elseif(isset($invInfo['classificationId'])){
                    if($classification['classificationId'] === $invInfo['classificationId']){
                    $classifList .= ' selected ';
                }
            }
$classifList .= ">$classification[classificationName]</option>";
}
$classifList .= '</select>';
 
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css"> 
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	 echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Modify $invMake $invModel"; }?> | PHP Motors</title>
</head>
<body>
  <div class="main">
    <main>
      
       <?php
         require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header_nav.php';
        ?>
        
        <h1><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	        echo "Modify $invInfo[invMake] $invInfo[invModel]";} 
                elseif(isset($invMake) && isset($invModel)) { 
	            echo "Modify$invMake $invModel"; }?></h1>
        <div id="container">
        <?php
          if (isset($message)) {echo $message;}
          ?>
          <form action="/phpmotors/vehicle/index.php" method="post">
            <label for='invMake'>Make</label><br>
            <input type="text" name="invMake" id="invMake" required <?php if(isset($invMake)){ echo "value='$invMake'"; } elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>><br><br>

            <label for='invModel'>Model</label><br>
            <input type="text" name="invModel" id="invModel" required <?php if(isset($invModel)){ echo "value='$invModel'"; } elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>><br><br> 

            <label for='invDescription'>Description</label><br>
            <!-- <input type="text" name="invDescription" id="invDescription" required><br><br>  -->
            <textarea name="invDescription" id="invDescription" required><?php if(isset($invDescription)){ echo $invDescription; } elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea><br><br>

            <label for='invImage'>Image Path</label><br>
            <input type="text" name="invImage" id="invImage" required <?php if(isset($invImage)){ echo "value='$invImage'"; } elseif(isset($invInfo['invImage'])) {echo "value='$invInfo[invImage]'"; }?>><br><br>

            <label for=''>Thumbnail Path</label><br>
            <input type="text" name="invThumbnail" id="invThumbnail" required <?php if(isset($invThumbnail)){ echo "value='$invThumbnail'"; } elseif(isset($invInfo['invThumbnail'])) {echo "value='$invInfo[invThumbnail]'"; }?>><br><br>

            <label for='invPrice'>Price</label><br>
            <input type="number" name="invPrice" id="invPrice" required <?php if(isset($invPrice)){ echo "value='$invPrice'"; } elseif(isset($invInfo['invPrice'])) {echo "value='$invInfo[invPrice]'"; }?>><br><br> 

            <label for='invStock'># In Stock</label><br>
            <input type="text" name="invStock" id="invStock" required <?php if(isset($invStock)){ echo "value='$invStock'"; } elseif(isset($invInfo['invStock'])) {echo "value='$invInfo[invStock]'"; }?>><br><br> 

            <label for='invColor'># Color</label><br>
            <input type="text" name="invColor" id="invColor" required <?php if(isset($invColor)){ echo "value='$invColor'"; } elseif(isset($invInfo['invColor'])) {echo "value='$invInfo[invColor]'"; }?>><br><br> 

            <label for='classificationId'># Classification</label><br><br>
            <input type="text" name="classificationId" id="classificationId" required <?php if(isset($classificationId)){ echo "value='$classificationId'"; } elseif(isset($invInfo['classificationId'])) {echo "value='$invInfo[classificationId]'"; }?>><br><br> 
            <?php
              echo $selectList;
            ?><br><br> 


            <input type="submit" class="regbtn" name="submit" value="Update Vehicle">           
            <input type="hidden" name="action" value="updateVehicle">
            <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} elseif(isset($invId)){ echo $invId; } ?>">          
          </form><br>
        </div>       
        <?php
          require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </main>
  </div>

</body>
</html>