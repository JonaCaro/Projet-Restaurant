<?php
session_start();
$divM = false;

if (
  isset($_POST["firstName"]) && isset($_POST["name"]) && isset($_POST["mail"])
  && isset($_POST["tel"]) && isset($_POST["mdp"]) && isset($_POST["mdpConf"])
) {
  $firstName = $_POST["firstName"];
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $tel = $_POST["tel"];
  $mdp = $_POST["mdp"];
  $mdpConf = $_POST["mdpConf"];
  if ($mdp ===  $mdpConf) {
    try {

      $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
      $tmt = $pdo->prepare("insert into users(name, firstname, email, Telephone) values (?,?,?,?)");
      $tmt->execute(array('' . $name . '', '' . $firstName . '', '' . $mail . '', '' . $tel . ''));
      $UserId = $pdo->lastInsertId();
      $tmts = $pdo->prepare("insert into signup(ID_User, Password) values (?,?)");
      $tmts->execute(array($UserId, '' . $mdp . ''));

      $_SESSION["Con"] = $name;
      $_SESSION["IdUser"] = $UserId;

      $uri = $_SERVER['HTTP_HOST'] . '/' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . '/';
      header('Location: http://' . $uri .  'index.php');
    } catch (PDOException $e) {
      echo $e;
    }
  } else {
    $divM = true;
  }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="Connexion" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Inscription</title>
  <script>
    function showMessage() {
      document.getElementById("error").style.display = "block";
    }
  </script>
</head>

<body>
  <section class="banner">
    <a href="login.php" class="back"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACKElEQVR4nO2Zv2sUURDHJ6BIVGwkloKgaJukURttYvZmNiqYK4JVEOxS5HbemlRXaW8hktK9zGy4LhFjYaH/QLRLRDFC0oiCiOAPVDjZmOJu3Yuou7d58D4w7e18buc77x0H4HA4HI5e87h+bo9w5Uo0M3YcbKM5Xe1XpvtqqKVMm2ATzXr1oBp6tNX8doEtRMHIETH0tL15awSaN/yjyvQ83bwVAlLzT4nBjazmd72ABDQsTG+7Nb+rBeKAzivjx52a71LflOm9GlxTg0vCeEtCGo2CkQM9FZAdxuafiumLGowTmRZAX+ECyvgiV4G2SrbZPOOlQgUWjD/0p/nPQeRhFIwdK20DZYV47vrw3nszlw9rzRtUgxPKdEcZX3aVYPoghqqlnAF/s4UaoXdaDDWE6Xt2RrBenMSsNyCMK3msUTF0Qgwtdxmp28UYJN/glHdIGZ/kdQ5I6E8K46fevonpar8wLuZ1kGnNGxTGN79JhDQOxf4WoGg7gKv/+3mSjFRKIgl2odtp68Hsn0mykd/Kxo5xSnICNjEf4LWMYF8Em1DGBymBZz25duRFw4yeFIM/2iVi9i+ATYghSQVawSbiEM92hhk/L9X9/WALLYA+ZXpl9xgx3k2dzjfBJsTQ1c4c4CLYxILxhzrXKa6BTTRnvYGUwDuwieUpb1/qWvEVbENzuraXhjqBklHb34AwvW7bQutgG3FQqSR/oPwq9Mrux+FwOCCTn6VWyjI7NiWLAAAAAElFTkSuQmCC">
    </a>
    <div class="container">
      <form action="signUp.php" method="post">
        <p class="welcom">Bienvenue</p>
        <input required type="text" id="firstName" name="firstName" placeholder="Nom"><br>
        <input required type="text" id="name" name="name" placeholder="Prenon"><br>
        <input required type="email" id="mail" name="mail" placeholder="Email"><br>
        <input required type="text" id="tel" name="tel" placeholder="Téléphone"><br>
        <input required type="password" id="mdp" name="mdp" placeholder="Mot de passe"><br>
        <input required type="password" id="mdpConf" name="mdpConf" placeholder="Confirmation Mot de passe"><br>
        <?php
        if ($divM) {
          echo ' <p style="color:red" id="error">Les mots de passe ne sont pas correspondant</p> ';
        }
        ?>
        <input type="submit" value="Inscription"><br>
      </form>
      <div class="drop drop-2"></div>

      <div class="drop drop-4"></div>
    </div>
  </section>
</body>

</html>