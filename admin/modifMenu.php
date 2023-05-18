<?php
session_start();
require_once('../pdo.php');

$role = 0;
if (isset($_SESSION["Role"])) {
  $role = 1;
} else {
  $_SESSION["Role"] = '';
}


if (isset($_GET["id"]) && $_SESSION["Role"] == 1) {

  try {
    $PhpData = new HelperBDD();

    $recupParam = $PhpData->selectMenuParameterById($_GET["id"]);
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
    <a href="ParamMenu.php" class="back"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACKElEQVR4nO2Zv2sUURDHJ6BIVGwkloKgaJukURttYvZmNiqYK4JVEOxS5HbemlRXaW8hktK9zGy4LhFjYaH/QLRLRDFC0oiCiOAPVDjZmOJu3Yuou7d58D4w7e18buc77x0H4HA4HI5e87h+bo9w5Uo0M3YcbKM5Xe1XpvtqqKVMm2ATzXr1oBp6tNX8doEtRMHIETH0tL15awSaN/yjyvQ83bwVAlLzT4nBjazmd72ABDQsTG+7Nb+rBeKAzivjx52a71LflOm9GlxTg0vCeEtCGo2CkQM9FZAdxuafiumLGowTmRZAX+ECyvgiV4G2SrbZPOOlQgUWjD/0p/nPQeRhFIwdK20DZYV47vrw3nszlw9rzRtUgxPKdEcZX3aVYPoghqqlnAF/s4UaoXdaDDWE6Xt2RrBenMSsNyCMK3msUTF0Qgwtdxmp28UYJN/glHdIGZ/kdQ5I6E8K46fevonpar8wLuZ1kGnNGxTGN79JhDQOxf4WoGg7gKv/+3mSjFRKIgl2odtp68Hsn0mykd/Kxo5xSnICNjEf4LWMYF8Em1DGBymBZz25duRFw4yeFIM/2iVi9i+ATYghSQVawSbiEM92hhk/L9X9/WALLYA+ZXpl9xgx3k2dzjfBJsTQ1c4c4CLYxILxhzrXKa6BTTRnvYGUwDuwieUpb1/qWvEVbENzuraXhjqBklHb34AwvW7bQutgG3FQqSR/oPwq9Mrux+FwOCCTn6VWyjI7NiWLAAAAAElFTkSuQmCC">
    </a>
    <h1 class="title">Modifier la Carte</h1>
    <div class="box">
      <form action="ModifierMenu.php" method="POST">
        <table id="tableParam">
          <tr>
            <th>ID</th>
            <th>Nom du Paramétre</th>
            <th>Valeur de la Paramétre</th>
            <th>Prix</th>
            <th>Déscription</th>
            <th>Editer / Suprimer</th>
          </tr>

          <?php
          while ($param = $recupParam->fetch()) {
            echo "
        <tr>
          <td>{$param['ID']}</td>
          <td>{$param['ParameterName']}
          </td>
          <td><input type=text name=parameterValue value={$param['ParameterValue']} />
          <input type=hidden name=idParam value={$param['ID']} />
          </td>
          <td><input type=text name=parameterPrice value={$param['ParameterPrice']} /></td>
          <td><input type=text name=parameterDescription value={$param['ParameterDescription']} /></td>
          <td>
          <input type=submit value=Valider>
          <a href=admin.php>Annuler</a>
          </td>
        </tr>";
          }
          ?>
        </table>
      </form>
    </div>
  </body>

  </html>
<?php } else {
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
    <a href="../index.php" class="backerreur"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACKElEQVR4nO2Zv2sUURDHJ6BIVGwkloKgaJukURttYvZmNiqYK4JVEOxS5HbemlRXaW8hktK9zGy4LhFjYaH/QLRLRDFC0oiCiOAPVDjZmOJu3Yuou7d58D4w7e18buc77x0H4HA4HI5e87h+bo9w5Uo0M3YcbKM5Xe1XpvtqqKVMm2ATzXr1oBp6tNX8doEtRMHIETH0tL15awSaN/yjyvQ83bwVAlLzT4nBjazmd72ABDQsTG+7Nb+rBeKAzivjx52a71LflOm9GlxTg0vCeEtCGo2CkQM9FZAdxuafiumLGowTmRZAX+ECyvgiV4G2SrbZPOOlQgUWjD/0p/nPQeRhFIwdK20DZYV47vrw3nszlw9rzRtUgxPKdEcZX3aVYPoghqqlnAF/s4UaoXdaDDWE6Xt2RrBenMSsNyCMK3msUTF0Qgwtdxmp28UYJN/glHdIGZ/kdQ5I6E8K46fevonpar8wLuZ1kGnNGxTGN79JhDQOxf4WoGg7gKv/+3mSjFRKIgl2odtp68Hsn0mykd/Kxo5xSnICNjEf4LWMYF8Em1DGBymBZz25duRFw4yeFIM/2iVi9i+ATYghSQVawSbiEM92hhk/L9X9/WALLYA+ZXpl9xgx3k2dzjfBJsTQ1c4c4CLYxILxhzrXKa6BTTRnvYGUwDuwieUpb1/qWvEVbENzuraXhjqBklHb34AwvW7bQutgG3FQqSR/oPwq9Mrux+FwOCCTn6VWyjI7NiWLAAAAAElFTkSuQmCC">
    </a>

    <div class="erreur">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACJklEQVR4nO2Yy04UQRRAT3BYm2hgUH8DE3mJujBxZfgKEEVAgR+RHT7Bxx8QdupSEnVA/QBjXAE+t8CQmxRJ5+Z2ddNdPVOaPsnddN2eurerTvXMQE1NTc3/yGlgGfjq4oG79k/QA7wF2ireuLHomTKKP45JIucMsONpYA/oI2JWVMF/XSSvSU6UDAIHqthFYEldk5xLREYP8E4V+gXoBRrAthp7D5wiIm4Z+/1aYvwycKjGRfYoOGuI+9LIe6VyfsQi9ENV2B/ggpE3APyKTeiLhrj3PfkLhtBDRChuGiL0VixC3zbEvZoY12PHjBlCT3dD3F1VxAuVk9YATnItdH8H6+dxDnF9DVhCP+qmuPeMPF8DONnbiTjshNAi7qaa+HOKuFkNWEJ/qFroOxninqQBYdQQWg6HSuh3siUnW/Pk52lAeK7yfgPnqIAnhrjnAzTQNISWQyIow8ZSz2Xck7cBYd4QWr4ABkGk+phT3KINNICWyt9210szYzydK4Rn1FhlOTRKi/tTfegq1bEWWuinxgf6xC1L03hgcngUYsRY0lmqZ87YsuMhxP2UQ9yiEuu5W8bcJxJ6NsBTKNpA2urfpcQ+FBfoYAPCs6JCrwY6Cco20DQepDTlxfq1JO+BbjFjbGWpMZUNdUMr1NuwIA1D6HXfDd+NpY8tvvkasP7Xjy1e+xq4YTgQUxwA17P23YR7cexHUHDbxb6r6WZW8TU1NTV0lCOBbPRNNblcawAAAABJRU5ErkJggg==">
      <?php
      echo "Vous n'avez pas le role admin";
      ?>
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACJklEQVR4nO2Yy04UQRRAT3BYm2hgUH8DE3mJujBxZfgKEEVAgR+RHT7Bxx8QdupSEnVA/QBjXAE+t8CQmxRJ5+Z2ddNdPVOaPsnddN2eurerTvXMQE1NTc3/yGlgGfjq4oG79k/QA7wF2ireuLHomTKKP45JIucMsONpYA/oI2JWVMF/XSSvSU6UDAIHqthFYEldk5xLREYP8E4V+gXoBRrAthp7D5wiIm4Z+/1aYvwycKjGRfYoOGuI+9LIe6VyfsQi9ENV2B/ggpE3APyKTeiLhrj3PfkLhtBDRChuGiL0VixC3zbEvZoY12PHjBlCT3dD3F1VxAuVk9YATnItdH8H6+dxDnF9DVhCP+qmuPeMPF8DONnbiTjshNAi7qaa+HOKuFkNWEJ/qFroOxninqQBYdQQWg6HSuh3siUnW/Pk52lAeK7yfgPnqIAnhrjnAzTQNISWQyIow8ZSz2Xck7cBYd4QWr4ABkGk+phT3KINNICWyt9210szYzydK4Rn1FhlOTRKi/tTfegq1bEWWuinxgf6xC1L03hgcngUYsRY0lmqZ87YsuMhxP2UQ9yiEuu5W8bcJxJ6NsBTKNpA2urfpcQ+FBfoYAPCs6JCrwY6Cco20DQepDTlxfq1JO+BbjFjbGWpMZUNdUMr1NuwIA1D6HXfDd+NpY8tvvkasP7Xjy1e+xq4YTgQUxwA17P23YR7cexHUHDbxb6r6WZW8TU1NTV0lCOBbPRNNblcawAAAABJRU5ErkJggg==">
    </div>
  </body>

  </html>
<?php
}
?>