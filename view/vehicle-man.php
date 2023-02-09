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
        
        <h1>Vehicle Management</h1>
        <div id="container">
            <?php
            if (isset($message)) {
            echo $message;
          }
          ?>
          <form id="class-names" action="login.php" method="post">
            <a id="first_link" href="/phpmotors/vehicle/index.php?action=classification">Add Classification</a><br><br>
            <a id="second_link" href="/phpmotors/vehicle/index.php?action=inventory">Add Vehicle</a><br>
          </form><br>
        </div>       
        <?php
          require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </main>
  </div>

</body>
</html>