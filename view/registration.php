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
          <form action="login.php" method="post">
          <label for='firstName'>First Name</label><br>
          <input name="firstName" id="firstName" type="text"><br>
          <label for='lastName'>Last Name</label><br>
          <input name="lastName" id="lastName" type="text"><br>
          <label for='email'>Email</label><br>
          <input name="email" id="email" type="text"><br>
          <p>Password must be at leat 8 characters and contain a leat 1 number, 1 capital letter and 1 spacial character</p>
          <label for='password'>Password</label><br>
          <input name="password" id='password' placeholder="Password"><br><br> 
          <button type="submit">Sign in</button><br><br>
          </form>
        </div>
      <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
      ?>
    </main>
  </div>

</body>
</html>












