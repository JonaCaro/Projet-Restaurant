<?php
session_start();

$con = false;
if (isset($_SESSION["Con"])) {
  $con = true;
} else {
  $_SESSION["Con"] = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="validationResa.css">
  <title>Validation Résérvation</title>
</head>

<body>
  <div class="banner">
    <div class="card-content">
      <div class="content">
        <?php
        if ($con) {
          echo '<div><p> Félicitaion' . ' ' . $_SESSION["Con"] . ', ' . ' votre réservation est confirmée! </p></div>';
        }
        ?>
        <div>
          <p class="return">Souhaitez-vous retourner a la page</p>
          <p class="return"><a href="index.php">Accueil</a> ou <a href="menu.php">La Carte</a></p>
        </div>
      </div>
    </div>
  </div>
</body>

</html>