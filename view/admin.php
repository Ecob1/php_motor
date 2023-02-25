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
          <h1><?php echo $_SESSION['clientData']['clientFirstname'];?> <?php echo $_SESSION['clientData']['clientLastname'];?></h1>
          <p id='login-p'>Your are logged in.</p>
          <div class='loginNames'>
            <ul>
              <li>First name: <?php echo $_SESSION['clientData']['clientFirstname'];?></li>
              <li>Last name: <?php echo $_SESSION['clientData']['clientLastname'];?></li>
              <li>Email: <?php echo $_SESSION['clientData']['clientEmail'];?></li>
            </ul>                      
          </div>
          
            <?php
          require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </main>
  </div>
</body>
</html>