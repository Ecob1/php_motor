<?php 
  if(!$_SESSION['loggedin']){
 //   href="/phpmotors/accounts/index.php";
      header('Location:/phpmotors/index.php');
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
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header_nav.php'; ?>            
          <h1><?php echo $_SESSION['clientData']['clientFirstname'];?> <?php echo $_SESSION['clientData']['clientLastname'];?></h1>
          <p id='login-p'>Your are logged in.</p>
          <div class='loginNames'>
            <ul>
              <li>First name: <?php echo $_SESSION['clientData']['clientFirstname'];?></li>
              <li>Last name: <?php echo $_SESSION['clientData']['clientLastname'];?></li>
              <li>Email: <?php echo $_SESSION['clientData']['clientEmail'];?></li>
            </ul> 
            <div id="account-Management">
              <h3><strong>Account Management</strong></h3>
              <p>Use this link to update account information</p>
              <p class="admin"><a href="/phpmotors/accounts/index.php?action=update-user">Update account information</a></p><br><br><br>
            </div>
            <div class="management">  
              <?php if($_SESSION['clientData']['clientLevel'] > 1):?> 
                <p><strong>Inventory Management</strong></p>
                <p>Use this link to manage the inventory</p>
                
                <p class="admin"><a href="/phpmotors/vehicle/">Vehicle management</a></p> 
              <?php endif ?>
             </div>                     
          </div> 
          
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>
        
    </main>
  </div>
</body>
</html>