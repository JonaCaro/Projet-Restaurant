<?php
session_start();
try {
  $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');

  $recupParam = $pdo->query("SELECT * FROM adminparameters");

  $recupResa = $pdo->query("SELECT * FROM reservation ");
  $recupUser = $pdo->query("SELECT * FROM users ");
} catch (PDOException $e) {
  echo $e;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <title>Admin</title>
</head>

<body>
  <a href="index.php" class="back"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACKElEQVR4nO2Zv2sUURDHJ6BIVGwkloKgaJukURttYvZmNiqYK4JVEOxS5HbemlRXaW8hktK9zGy4LhFjYaH/QLRLRDFC0oiCiOAPVDjZmOJu3Yuou7d58D4w7e18buc77x0H4HA4HI5e87h+bo9w5Uo0M3YcbKM5Xe1XpvtqqKVMm2ATzXr1oBp6tNX8doEtRMHIETH0tL15awSaN/yjyvQ83bwVAlLzT4nBjazmd72ABDQsTG+7Nb+rBeKAzivjx52a71LflOm9GlxTg0vCeEtCGo2CkQM9FZAdxuafiumLGowTmRZAX+ECyvgiV4G2SrbZPOOlQgUWjD/0p/nPQeRhFIwdK20DZYV47vrw3nszlw9rzRtUgxPKdEcZX3aVYPoghqqlnAF/s4UaoXdaDDWE6Xt2RrBenMSsNyCMK3msUTF0Qgwtdxmp28UYJN/glHdIGZ/kdQ5I6E8K46fevonpar8wLuZ1kGnNGxTGN79JhDQOxf4WoGg7gKv/+3mSjFRKIgl2odtp68Hsn0mykd/Kxo5xSnICNjEf4LWMYF8Em1DGBymBZz25duRFw4yeFIM/2iVi9i+ATYghSQVawSbiEM92hhk/L9X9/WALLYA+ZXpl9xgx3k2dzjfBJsTQ1c4c4CLYxILxhzrXKa6BTTRnvYGUwDuwieUpb1/qWvEVbENzuraXhjqBklHb34AwvW7bQutgG3FQqSR/oPwq9Mrux+FwOCCTn6VWyjI7NiWLAAAAAElFTkSuQmCC">
  </a>
  <h1 class="title">Administrateur</h1>
  <div id="nav">
    <nav>
      <ul>
        <li><a href="#param">Paramétre</a></li>
        <li><a href="#resa">Résérvation</a></li>
      </ul>
    </nav>
  </div>

  <div class="box">
    <h2 id="param">Paramétre</h2>
    "<table id="tableParam">
      <tr>
        <th>ID</th>
        <th>Nom du Paramétre</th>
        <th>Valeur de la Paramétre</th>
        <th>Editer / Suprimer</th>
      </tr>

      <?php
      while ($param = $recupParam->fetch()) {
        echo "
        <tr>
          <td>{$param['ID']}</td>
          <td>{$param['ParameterName']}</td>
          <td>{$param['ParameterValue']}</td>
          <td><button><img src=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nO3VPQoCMRBA4XcYsbPbwloQC1tLL7GVpVOt3ssj2OsJFCvbyEICIfizRWbCYh6kCuRjEtiF2shrgTtwBhorVAAXrQcwt0ZjvCkBO3/tlMBvGpAMwNvcaDj4mOztor29FhrWu8lFG/00uQnqtHAZgJq8qatoruRvrnfl/6e/0Kwfh9C2BNq3LIH2TS3RWXLwBFgAG+CpOenhy1RrFLtavWPaCbgAnb/22vh7AQEMocoBCJ3cAAAAAElFTkSuQmCC></button>
              <button><img src=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAiklEQVR4nO2UwQmAMAxFvxfncARdUpeyJ3ETHaH0GCnEg6VisK2i5MM/lIS8pKQFrtUAMAAcAArsOOZzkmUiAAo8pkIqAJaLtZF4xzHLuWLNgu6lns4gVMjvgR4XPTUJ/R60S3omBZFeHXQZoO/oa8tApT7VNQNkkYCGDKBeAqoZdmcyP4mH+BoHbXvrXW5mYPgbAAAAAElFTkSuQmCC></button>
          </td>
        </tr>";
      }
      ?>
  </div>

  <div class="box">

    <table id="tableResa">
      <tr>
        <th>Id</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Téléphone</th>
        <th>Date de Réservation</th>
        <th>Heurs de Réservation</th>
        <th>Nombre de Pérsonne</th>
        <th>Allérgéns</th>
        <th>Editer / Suprimer</th>
      </tr>

      <?php
      while ($resa = $recupResa->fetch()) {
        while ($user = $recupUser->fetch()) {
          echo "
          <tr>
          <td>{$resa['ID']}</td>
          <td>{$user['name']}</td>
          <td>{$user['firstname']}</td>
          <td>{$user['Telephone']}</td>
          <td>{$resa['DateResa']}</td>
          <td>{$resa['TimeResa']}</td>
          <td>{$resa['PeopleNumber']}</td>
          <td>{$resa['Allergens']}</td>
          <td><button><img src=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAsUlEQVR4nO3VPQoCMRBA4XcYsbPbwloQC1tLL7GVpVOt3ssj2OsJFCvbyEICIfizRWbCYh6kCuRjEtiF2shrgTtwBhorVAAXrQcwt0ZjvCkBO3/tlMBvGpAMwNvcaDj4mOztor29FhrWu8lFG/00uQnqtHAZgJq8qatoruRvrnfl/6e/0Kwfh9C2BNq3LIH2TS3RWXLwBFgAG+CpOenhy1RrFLtavWPaCbgAnb/22vh7AQEMocoBCJ3cAAAAAElFTkSuQmCC></button>
          <button><img src=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAiklEQVR4nO2UwQmAMAxFvxfncARdUpeyJ3ETHaH0GCnEg6VisK2i5MM/lIS8pKQFrtUAMAAcAArsOOZzkmUiAAo8pkIqAJaLtZF4xzHLuWLNgu6lns4gVMjvgR4XPTUJ/R60S3omBZFeHXQZoO/oa8tApT7VNQNkkYCGDKBeAqoZdmcyP4mH+BoHbXvrXW5mYPgbAAAAAElFTkSuQmCC></button>
          </td>
          </tr>";
        }
      }
      ?>
      <h2 id="resa">Résérvation</h2>
  </div>

</body>

</html>