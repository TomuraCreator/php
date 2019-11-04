<?php
  include 'autoload.php';

  $new_person = new Person('Владислав', 'Уткин');
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 3.2.1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
  <body>
    <h2>
      <span class="gender-<?php echo $new_person->getGender()?>">
      <?php echo $new_person->getGenderSymbol()?>
      </span> <?php echo $new_person->getAbbreviation()?>
    </h2>
  </body>
</html>

