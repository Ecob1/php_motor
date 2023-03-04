<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
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
        <h1>Vehicle Management</h1>
        <div id="container">
                <?php
                if (isset($message)) {
                echo $message;
              }
              ?>     
            <a id="first_link" href="/phpmotors/vehicle/index.php?action=classification">Add Classification</a><br><br>
            <a id="second_link" href="/phpmotors/vehicle/index.php?action=inventory">Add Vehicle</a><br><br>
            <!-- Display a message if there is one, 2) display a heading and directions and the classification list if there is one. -->
            <?php
              if (isset($message)) { 
              echo $message; 
              } 
              if (isset($classificationList)) { 
              echo '<h2>Vehicles By Classification</h2>'; 
              echo '<p>Choose a classification to see those vehicles</p>'; 
              echo $classificationList; 
              }
            ?>
              <noscript>
                <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
              </noscript>
              <table id="inventoryDisplay"></table>
        </div>      
        <?php
          require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </main>
  </div>
    <script src="../js/inventory.js"></script>
</body>
</html>
<?php unset($_SESSION['message']); ?>