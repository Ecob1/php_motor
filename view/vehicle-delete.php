<?php
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
    <title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
</head>
<body>
  <div class="main">
    <main>
      
       <?php
         require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header_nav.php';
        ?>
        
        <h1><?php if(isset($invInfo['invMake'])){ echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?></h1>
        <div id="container">

            <?php
                if (isset($message)) {
                echo $message;
                }
                ?>
                <form action="/phpmotors/vehicle/index.php" method="post">
                    <label for='invMake'>Make</label><br>
                    <input type="text" name="invMake" id="invMake" required <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>><br><br>

                    <label for='invModel'>Model</label><br>
                    <input type="text" name="invModel" id="invModel" required <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?>><br><br> 

                    <label for='invDescription'>Description</label><br>
                    <!-- <input type="text" name="invDescription" id="invDescription" required><br><br>  -->
                    <textarea name="invDescription" id="invDescription" required><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }
                    ?></textarea><br><br>            
                    <?php
                    echo $selectList;
                    ?><br><br> 
                    <input type="submit" class="regbtn" name="submit" value="Delete Vehicle">           
                    <input type="hidden" name="action" value="deleteVehicle">
                    <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){
                    echo $invInfo['invId'];} ?>">        
                </form><br>
            </div>       
            <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
            ?>
        </div>
    </main>
  </div>
</body>
</html>