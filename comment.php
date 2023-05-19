<?php
require_once('pdo.php');


session_start();

if (isset($_SESSION["IDUser"]) != NULL) {
  if (
    isset($_POST["ParameterValue"])
  ) {
    $IDUser = $_SESSION["IDUser"];
    $ParameterValue = $_POST["ParameterValue"];

    try {
      $PhpData = new HelperBDD();
      $tmt = $PhpData->InsertCommentaire($IDUser, $ParameterValue);
    } catch (PDOException $e) {
      echo $e;
    }
  }
} else {
  echo "<p id=notLogin><img src= data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABG0lEQVR4nO2UXUpCURSFr75V4gQiiagJJERBM8nKxlEJidU80h6SZhEUQZMIKhyAZj3kF/e2Armcc93nBD25Hs/69l7nP0nmihXQwq6T0ObLwDAgYATUQgKuVXhjYPtiu9bmO8AEeAdWDfyKVpDW7M6Cy8CjZnTm8DM5xtuyntIeRQFHAl+ApYCABeBZ9qGveQV4E7TnYTJ5vMaPywCouoBLAfdAKSKgBNwJOc+ba8AY+AK2nEtMigPkb6rHJ7DhCpj8MaCugA9gPW9eqP7Bt0VFym1Rx3fIrwIaEQH7hYcsqBl5TRenrunBrGX+PrR2QEDH9NAEb+uwx8avomb+KqaKeppR38Deir0yNf+X7zoVcBoQcJwVzZVE6BsB+oxsBvwXyAAAAABJRU5ErkJggg== > 
    Merci de bien vouloir vous connnectez 
    <img src= data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABG0lEQVR4nO2UXUpCURSFr75V4gQiiagJJERBM8nKxlEJidU80h6SZhEUQZMIKhyAZj3kF/e2Armcc93nBD25Hs/69l7nP0nmihXQwq6T0ObLwDAgYATUQgKuVXhjYPtiu9bmO8AEeAdWDfyKVpDW7M6Cy8CjZnTm8DM5xtuyntIeRQFHAl+ApYCABeBZ9qGveQV4E7TnYTJ5vMaPywCouoBLAfdAKSKgBNwJOc+ba8AY+AK2nEtMigPkb6rHJ7DhCpj8MaCugA9gPW9eqP7Bt0VFym1Rx3fIrwIaEQH7hYcsqBl5TRenrunBrGX+PrR2QEDH9NAEb+uwx8avomb+KqaKeppR38Deir0yNf+X7zoVcBoQcJwVzZVE6BsB+oxsBvwXyAAAAABJRU5ErkJggg== ></p>";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="comment.css">
  <title>Commentaire</title>
</head>

<body>
  <a href="index.php" class="back"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACKElEQVR4nO2Zv2sUURDHJ6BIVGwkloKgaJukURttYvZmNiqYK4JVEOxS5HbemlRXaW8hktK9zGy4LhFjYaH/QLRLRDFC0oiCiOAPVDjZmOJu3Yuou7d58D4w7e18buc77x0H4HA4HI5e87h+bo9w5Uo0M3YcbKM5Xe1XpvtqqKVMm2ATzXr1oBp6tNX8doEtRMHIETH0tL15awSaN/yjyvQ83bwVAlLzT4nBjazmd72ABDQsTG+7Nb+rBeKAzivjx52a71LflOm9GlxTg0vCeEtCGo2CkQM9FZAdxuafiumLGowTmRZAX+ECyvgiV4G2SrbZPOOlQgUWjD/0p/nPQeRhFIwdK20DZYV47vrw3nszlw9rzRtUgxPKdEcZX3aVYPoghqqlnAF/s4UaoXdaDDWE6Xt2RrBenMSsNyCMK3msUTF0Qgwtdxmp28UYJN/glHdIGZ/kdQ5I6E8K46fevonpar8wLuZ1kGnNGxTGN79JhDQOxf4WoGg7gKv/+3mSjFRKIgl2odtp68Hsn0mykd/Kxo5xSnICNjEf4LWMYF8Em1DGBymBZz25duRFw4yeFIM/2iVi9i+ATYghSQVawSbiEM92hhk/L9X9/WALLYA+ZXpl9xgx3k2dzjfBJsTQ1c4c4CLYxILxhzrXKa6BTTRnvYGUwDuwieUpb1/qWvEVbENzuraXhjqBklHb34AwvW7bQutgG3FQqSR/oPwq9Mrux+FwOCCTn6VWyjI7NiWLAAAAAElFTkSuQmCC">
  </a>

  <div class="modal" id="modal">
    <div class="content">
      <div class="cross-box">
        <span id="cross">X</span>
      </div>
      <form action="#comment.php" method="post" class="">
        <textarea required type="text" name="ParameterValue" id="comment" placeholder="Votre Commentaire" rows="10" cols="100"></textarea>
        <input required type="submit" id="add">

      </form>
    </div>
  </div>
  <h1>Commentaire</h1>
  <a id="addCom">Ajouter un commentaire</a>
  <table>
    <tr>
      <th>Nom</th>
      <th>Commentaire</th>
      <th>Date mise en ligne</th>
    </tr>
    <?php
    $SelectionCommentPDO = new HelperBDD();
    $tmt = $SelectionCommentPDO->SelectCommentaire();
    while ($Comment = $tmt->fetch()) {
      echo "<tr>
    <td>" .
        $Comment["name"] . "</td> <td> " . $Comment["ParameterValue"] . "</td>  <td>" . $Comment["ParameterDate"]
        . "</td>
      </tr>";
    }
    ?>
  </table>
  <script src="comment.js"></script>
</body>


</html>