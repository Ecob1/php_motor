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
          <form action="/phpmotors/accounts/index.php" method="post" >
          <label for='firstName'>First Name</label><br>
          <input type="text" name="clientFirstname" id="fname"><br>
          <label for='lastName'>Last Name</label><br>
          <input type="text" name="clientLastname" id="lname"><br>
          <label for='email'>Email</label><br>
          <input type="email" name="clientEmail" id="email"><br>
          <p>Password must be at leat 8 characters and contain a leat 1 number, 1 capital letter and 1 spacial character</p>
          <label for='password'>Password</label><br>
          <input type="password" name="clientPassword" id="password"><br><br> 
          <input type="submit" name="submit" id="regbtn" value="Register"><br><br>
          <input type="hidden" name="action" value="register">
          </form>
        </div>
      <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
      ?>
    </main>
  </div>

</body>
</html>












