<?php
require_once('pdo.php');
session_start();

if (
  isset($_POST["mail"]) && isset($_POST["mdp"])
) {

  $mail = $_POST["mail"];
  $mdp = $_POST["mdp"];
  try {

    $insertPDO = new HelperBDD();

    $tmt = $insertPDO->SelectConnectionElement($mail, $mdp);

    if ($tmt->rowCount() == 1) {
      foreach ($tmt as $row) {
        $name = $row["name"];
        $IDUser = $row["id"];
        $Role = $row["Role"];
      }
      $_SESSION["Con"] = $name;
      $_SESSION["IDUser"] = $IDUser;
      $_SESSION["Role"] = $Role;

      $uri = $_SERVER['HTTP_HOST'] . '/' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . '/';
      header('Location: http://' . $uri .  'index.php');
    } else {
      echo 'Erreur lors de la connexion !!';
    }
  } catch (PDOException $e) {
    echo $e;
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="Connexion" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Connexion</title>
</head>

<body>
  <section class="banner">
    <a href="index.php" class="back"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACKElEQVR4nO2Zv2sUURDHJ6BIVGwkloKgaJukURttYvZmNiqYK4JVEOxS5HbemlRXaW8hktK9zGy4LhFjYaH/QLRLRDFC0oiCiOAPVDjZmOJu3Yuou7d58D4w7e18buc77x0H4HA4HI5e87h+bo9w5Uo0M3YcbKM5Xe1XpvtqqKVMm2ATzXr1oBp6tNX8doEtRMHIETH0tL15awSaN/yjyvQ83bwVAlLzT4nBjazmd72ABDQsTG+7Nb+rBeKAzivjx52a71LflOm9GlxTg0vCeEtCGo2CkQM9FZAdxuafiumLGowTmRZAX+ECyvgiV4G2SrbZPOOlQgUWjD/0p/nPQeRhFIwdK20DZYV47vrw3nszlw9rzRtUgxPKdEcZX3aVYPoghqqlnAF/s4UaoXdaDDWE6Xt2RrBenMSsNyCMK3msUTF0Qgwtdxmp28UYJN/glHdIGZ/kdQ5I6E8K46fevonpar8wLuZ1kGnNGxTGN79JhDQOxf4WoGg7gKv/+3mSjFRKIgl2odtp68Hsn0mykd/Kxo5xSnICNjEf4LWMYF8Em1DGBymBZz25duRFw4yeFIM/2iVi9i+ATYghSQVawSbiEM92hhk/L9X9/WALLYA+ZXpl9xgx3k2dzjfBJsTQ1c4c4CLYxILxhzrXKa6BTTRnvYGUwDuwieUpb1/qWvEVbENzuraXhjqBklHb34AwvW7bQutgG3FQqSR/oPwq9Mrux+FwOCCTn6VWyjI7NiWLAAAAAElFTkSuQmCC">
    </a>
    <div class="container">
      <form method="post" action="login.php">
        <p class="welcom">Bienvenue<br>
          Aux Quai Antique</p>
        <input required type="email" name="mail" placeholder="Email"><br>
        <input required type="password" name="mdp" placeholder="Mot de passe"><br>
        <input type="submit" value="Connexion"><br>
        <a href="#">Mot de passe oublié</a>
        <p class="inscription">Vous n'avez pas de compte ?<br>
          <a class="signUp" href="signUp.php">Inscription</a>
        </p>

      </form>

      <div class="drop drop-1"></div>
      <div class="drop drop-2"></div>
      <div class="drop drop-3"></div>
      <div class="drop drop-4"></div>
      <div class="drop drop-5"></div>
    </div>
  </section>
</body>

</html>