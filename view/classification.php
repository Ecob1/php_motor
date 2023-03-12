<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/phpmotors/css/style.css">     
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
</head>
<body>
    <header>
        <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header_nav.php';
        ?>
    </header>
    <nav>
    <?php if(isset($message)){ echo $message; } ?>
    </nav>
<main>
    <h1><?php echo $classificationName; ?> vehicles</h1>
    <?php if(isset($message)){ 
        echo $message; 
    } ?>
    <?php if(isset($vehicleDisplay)){
        echo $vehicleDisplay;
    } ?>
    <div>
    
     
</main>

<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
?>
</body>
</html>