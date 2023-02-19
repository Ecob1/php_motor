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
      <h1>Add Car Classificaton</h1>
        <div id="container">
        <?php
          if (isset($message)) {
          echo $message;
          }
          ?>
          <form  action="/phpmotors/vehicle/index.php" method="post">
            <label for='classificationName'>Classificaton Name</label><br>
            <input type="text"  name="classificationName" id="classificationName"  placeholder="Allowed only up to 30 characters" maxlength="30" <?php if(isset($classificationName)){
            echo "value='$classificationName'";} ?> required><br><br>
            <input type="submit" name="submit" id="regbtn" value="Register">
            <input type="hidden" name="action" value="addclassification">
        </form>
        </div>
      <?php
        require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php';
      ?>
    </main>
  </div>

</body>
</html>












