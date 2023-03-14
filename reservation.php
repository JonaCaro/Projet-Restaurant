<?php
require_once('Helper.php');
$helpC = new HelperClass();

session_start();
$divM = false;
if (isset($_SESSION["Con"])) {

  if (
    isset($_POST["DateResa"]) && isset($_POST["TimeResa"])
    && isset($_POST["Allergens"]) && isset($_POST["PeopleNumber"])
  ) {
    $DateResa = $_POST["DateResa"];
    $TimeResa = $_POST["TimeResa"];
    $Allergens = $_POST["Allergens"];
    $PeopleNumber = $_POST["PeopleNumber"];
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
      $tmt = $pdo->prepare("insert into users(DateResa, TimeResa, Allergens, PeopleNumber) values (?,?,?,?)");
      $tmt->execute(array('' . $DateResa . '', '' . $TimeResa . '', '' . $Allergens . '', '' . $PeopleNumber . ''));
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reservation.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Reservation</title>
</head>

<body>
  <section class="banner">
    <a href="index.php" class="back"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACKElEQVR4nO2Zv2sUURDHJ6BIVGwkloKgaJukURttYvZmNiqYK4JVEOxS5HbemlRXaW8hktK9zGy4LhFjYaH/QLRLRDFC0oiCiOAPVDjZmOJu3Yuou7d58D4w7e18buc77x0H4HA4HI5e87h+bo9w5Uo0M3YcbKM5Xe1XpvtqqKVMm2ATzXr1oBp6tNX8doEtRMHIETH0tL15awSaN/yjyvQ83bwVAlLzT4nBjazmd72ABDQsTG+7Nb+rBeKAzivjx52a71LflOm9GlxTg0vCeEtCGo2CkQM9FZAdxuafiumLGowTmRZAX+ECyvgiV4G2SrbZPOOlQgUWjD/0p/nPQeRhFIwdK20DZYV47vrw3nszlw9rzRtUgxPKdEcZX3aVYPoghqqlnAF/s4UaoXdaDDWE6Xt2RrBenMSsNyCMK3msUTF0Qgwtdxmp28UYJN/glHdIGZ/kdQ5I6E8K46fevonpar8wLuZ1kGnNGxTGN79JhDQOxf4WoGg7gKv/+3mSjFRKIgl2odtp68Hsn0mykd/Kxo5xSnICNjEf4LWMYF8Em1DGBymBZz25duRFw4yeFIM/2iVi9i+ATYghSQVawSbiEM92hhk/L9X9/WALLYA+ZXpl9xgx3k2dzjfBJsTQ1c4c4CLYxILxhzrXKa6BTTRnvYGUwDuwieUpb1/qWvEVbENzuraXhjqBklHb34AwvW7bQutgG3FQqSR/oPwq9Mrux+FwOCCTn6VWyjI7NiWLAAAAAElFTkSuQmCC">
    </a>
    <img src="picture/logo.png" alt="logo" width="15%" height="15%">
    <div class="card-container">
      <div class="card-img">

      </div>

      <div class="card-content">
        <h3>Résérvation</h3>
        <form action="reservation.php" method="post">
          <div class="form-row">
            <input required type="Date" name="DateResa" id="datePickerId">
            <select required name="TimeResa">
              <option value="hour-select">Séléctionnez l'heures</option>
              <option value="12"><?php
                                  echo $helpC->SearcheParameter("PARAM_ResaHoraire1")
                                  ?></option>
              <option value="12"><?php
                                  echo $helpC->SearcheParameter("PARAM_ResaHoraire2")
                                  ?></option>
              <option value="12"><?php
                                  echo $helpC->SearcheParameter("PARAM_ResaHoraire3")
                                  ?></option>
              <option value="12"><?php
                                  echo $helpC->SearcheParameter("PARAM_ResaHoraire4")
                                  ?></option>
              <option value="12"><?php
                                  echo $helpC->SearcheParameter("PARAM_ResaHoraire5")
                                  ?></option>
              <option value="12"><?php
                                  echo $helpC->SearcheParameter("PARAM_ResaHoraire6")
                                  ?></option>
              <option value="12"><?php
                                  echo $helpC->SearcheParameter("PARAM_ResaHoraire7")
                                  ?></option>
              <option value="12"><?php
                                  echo $helpC->SearcheParameter("PARAM_ResaHoraire8")
                                  ?></option>
            </select>
          </div>

          <div class="form-row">
            <input required type="number" class="peopleNumber" name="PeopleNumber" placeholder="Combien de personnes?" min="1">
            <input class="add" id="addTable" type="submit" value="RÉSERVER TABLE">
          </div>
        </form>

        <div class="form-row">
          <form id="form">
            <input required autocomplete="off" name="Allergens" id="textFile" type="text" value="" placeholder="Ajouter un allergène">
            <input class="add" id="addAllergens" type="submit" value="+">
          </form>

          <div id="noAllergens" class="tempo">Pas d'allergènes.</div>

          <div class="list">
            <ul id="ul">
            </ul>
          </div>
        </div>


      </div>
    </div>
  </section>

  <script src="reservation.js"></script>
  <script>
    datePickerId.min = new Date().toISOString().split("T")[0];
  </script>
</body>

</html>