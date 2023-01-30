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
          <label for='email'>Email</label><br>
          <input type="email" name="clientEmail" id="email"><br>
          <label for='password'>Password</label><br>
          <input type="password" name="clientPassword" id="password"><br><br> 
          <button type="submit">Sign in</button><br>
          <a id="c-register" href="/phpmotors/accounts/index.php?action=register-view">Not a member yet?</a><br>
          </form><br>
        </div>       
        <?php
          require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
        ?>
    </main>
  </div>

</body>
</html>