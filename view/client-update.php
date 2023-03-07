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
      
     <div id="containers">          
        <h1><?php echo $_SESSION['clientData']['clientFirstname'];?> <?php echo $_SESSION['clientData']['clientLastname'];?></h1>

        <!-- <?php //if (isset($_SESSION['message'])) {
            //echo $_SESSION['message'];
           // unset($_SESSION['message']);
         // }?> -->
        
        <?php if(isset($message)){
          echo $message;
        }?>
        <div id="title-text">
          <h1>Manage Account</h1>
          <p>Update account</p>
       </div>
            <form action="/phpmotors/accounts/index.php" method="post">
              <label for='firstName'>First Name</label><br>
              <input type="text" name="firstName" id="firstName" required <?php if(isset($clientFirstname)){ echo "value='$clientFirstname'"; } elseif(isset($_SESSION['clientData']['clientFirstname'])) {echo "value='".$_SESSION['clientData']['clientFirstname']."'"; }?>><br>

              <label for='lastName'>Last Name</label><br>
              <input type="text" name="lastName" id="lastName" required <?php if(isset($clientLastname)){ echo "value='$clientLastname'"; } elseif(isset($_SESSION['clientData']['clientLastname'])) {echo "value='".$_SESSION['clientData']['clientLastname']."'"; }?>
              ><br>
                
              <label for='clientEmail'>Email</label><br>
              <input type="email" name="clientEmail" id="clientEmail" placeholder="Enter a valid email address" required <?php if(isset($clientEmail)){ echo "value='$clientEmail'"; } elseif(isset($_SESSION['clientData']['clientEmail'])) {echo "value='".$_SESSION['clientData']['clientEmail']."'"; }?>><br><br>

              <input type="submit" class="regbtn" name="submit" value="update user info">           
              <input type="hidden" name="action" value="client-updates">
              <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} ?>"><br><br> 
            </form>
            <form action="/phpmotors/accounts/index.php" method="post">
                    <?php if (isset($message)) {echo $message;}?>
                <p><strong>Update password</strong></p>
                <span>Password must be at leat 8 characters and contain a leat 1 number, 1 capital letter and 1 spacial character</span><br>
                <p>Note submitting this form will change you preview password</p>
              
                <label for='password'>Password</label><br>                
                <input type="password" name="clientPassword" id="password" required
                pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br> 
                <input type="submit" name="submit" id="regbtn" value="Update Password"><br><br>
                <input type="hidden" name="action" value="user-password">
                <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} ?>">
              </form>  
      </div>         
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';?>        
    </main>
  </div>
</body>
</html>