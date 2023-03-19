<?php
require_once('Helper.php');
$helpC = new HelperClass();

session_start();
if (isset($_SESSION["IDUser"]) != NULL) {
  if (
    isset($_POST["DateResa"]) && isset($_POST["TimeResa"])
    && isset($_POST["PeopleNumber"]) && isset($_POST["allergenes"])
  ) {
    $IDUser = $_SESSION["IDUser"];
    $DateResa = $_POST["DateResa"];
    $TimeResa = $_POST["TimeResa"];
    $PeopleNumber = $_POST["PeopleNumber"];
    $Allergens = $_POST["allergenes"];

    try {
      $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
      $tmt = $pdo->prepare("insert into reservation(ID_User, DateResa, TimeResa, PeopleNumber, Allergens) values (?,?,?,?,?)");
      $tmt->execute(array('' . $IDUser . '', '' . $DateResa . '', '' . $TimeResa . '', '' . $PeopleNumber . '', '' . $Allergens . ''));

      $uri = $_SERVER['HTTP_HOST'] . '/' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . '/';
      header('Location: http://' . $uri .  'validationResa.php');
    } catch (PDOException $e) {
      echo $e;
    }
  }
} else {
  echo "<p id=notLogin><img src= data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABG0lEQVR4nO2UXUpCURSFr75V4gQiiagJJERBM8nKxlEJidU80h6SZhEUQZMIKhyAZj3kF/e2Armcc93nBD25Hs/69l7nP0nmihXQwq6T0ObLwDAgYATUQgKuVXhjYPtiu9bmO8AEeAdWDfyKVpDW7M6Cy8CjZnTm8DM5xtuyntIeRQFHAl+ApYCABeBZ9qGveQV4E7TnYTJ5vMaPywCouoBLAfdAKSKgBNwJOc+ba8AY+AK2nEtMigPkb6rHJ7DhCpj8MaCugA9gPW9eqP7Bt0VFym1Rx3fIrwIaEQH7hYcsqBl5TRenrunBrGX+PrR2QEDH9NAEb+uwx8avomb+KqaKeppR38Deir0yNf+X7zoVcBoQcJwVzZVE6BsB+oxsBvwXyAAAAABJRU5ErkJggg== > 
    Merci de bien vouloire vous connnectez 
    <img src= data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABG0lEQVR4nO2UXUpCURSFr75V4gQiiagJJERBM8nKxlEJidU80h6SZhEUQZMIKhyAZj3kF/e2Armcc93nBD25Hs/69l7nP0nmihXQwq6T0ObLwDAgYATUQgKuVXhjYPtiu9bmO8AEeAdWDfyKVpDW7M6Cy8CjZnTm8DM5xtuyntIeRQFHAl+ApYCABeBZ9qGveQV4E7TnYTJ5vMaPywCouoBLAfdAKSKgBNwJOc+ba8AY+AK2nEtMigPkb6rHJ7DhCpj8MaCugA9gPW9eqP7Bt0VFym1Rx3fIrwIaEQH7hYcsqBl5TRenrunBrGX+PrR2QEDH9NAEb+uwx8avomb+KqaKeppR38Deir0yNf+X7zoVcBoQcJwVzZVE6BsB+oxsBvwXyAAAAABJRU5ErkJggg== ></p>";
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
  <script>
    window.onload = function() {
      var el = document.getElementById("addAllergens");
      el.onclick = Resa;
    }

    function Resa() {

      var addAllergen = document.getElementById("Allergens").value;
      if (addAllergen != "") {
        addLiAllergen(addAllergen);
        verifAllergen();
      }
    }

    function addLiAllergen(allergen) {
      var ul = document.getElementById("listAllergens");
      var nBLi = ul.getElementsByTagName("LI").length;
      var li = document.createElement("li");
      li.appendChild(createLine(allergen, nBLi));
      li.style.textDecoration = "none";
      li.style.listStyleType = "none";
      li.setAttribute("id", "allergen" + nBLi);
      ul.appendChild(li);

      var inputAl = document.getElementById("allergenes");
      inputAl.value += allergen + "+allergen" + nBLi + "/";

    }

    function createLine(allergen, id) {
      var img = new Image();
      img.src = 'picture/delete.png';
      img.classList.add("delete");
      var line = document.createElement("a")
      var linkText = document.createTextNode(allergen);
      line.appendChild(linkText);
      line.appendChild(img);
      line.href = "javascript:deleteResa(" + id + ");";
      return line;
    }

    function deleteResa(id) {

      var DelAllergen = document.getElementById("allergen" + id);
      var inputAl = document.getElementById("allergenes");
      var valueInput = inputAl.value;
      valueInput = valueInput.replace(DelAllergen.textContent + "+" + DelAllergen.id + "/", '');
      inputAl.value = valueInput;
      DelAllergen.remove();
      verifAllergen();
    }

    function verifAllergen() {
      var ul = document.getElementById("listAllergens");
      var nBLi = ul.getElementsByTagName("LI").length;
      var allergen = document.getElementById("noAllergens");

      if (nBLi > 0) {
        allergen.style.display = "none";
      } else {
        allergen.style.display = "block";
      }

    }
  </script>

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
            <select required name="TimeResa" id="TimeResa">
              <optgroup label="Matin">
                <option value=<?php echo $helpC->SearcheParameter("PARAM_ResaHoraire1") ?>><?php
                                                                                            echo $helpC->SearcheParameter("PARAM_ResaHoraire1")
                                                                                            ?></option>
                <option value=<?php echo $helpC->SearcheParameter("PARAM_ResaHoraire2") ?>><?php
                                                                                            echo $helpC->SearcheParameter("PARAM_ResaHoraire2")
                                                                                            ?></option>
                <option value=<?php echo $helpC->SearcheParameter("PARAM_ResaHoraire3") ?>><?php
                                                                                            echo $helpC->SearcheParameter("PARAM_ResaHoraire3")
                                                                                            ?></option>
              </optgroup>
              <optgroup label="Soir">
                <option value=<?php echo $helpC->SearcheParameter("PARAM_ResaHoraire4") ?>><?php
                                                                                            echo $helpC->SearcheParameter("PARAM_ResaHoraire4")
                                                                                            ?></option>
                <option value=<?php echo $helpC->SearcheParameter("PARAM_ResaHoraire5") ?>><?php
                                                                                            echo $helpC->SearcheParameter("PARAM_ResaHoraire5")
                                                                                            ?></option>
                <option value=<?php echo $helpC->SearcheParameter("PARAM_ResaHoraire6") ?>><?php
                                                                                            echo $helpC->SearcheParameter("PARAM_ResaHoraire6")
                                                                                            ?></option>
                <option value=<?php echo $helpC->SearcheParameter("PARAM_ResaHoraire7") ?>><?php
                                                                                            echo $helpC->SearcheParameter("PARAM_ResaHoraire7")
                                                                                            ?></option>
                <option value=<?php echo $helpC->SearcheParameter("PARAM_ResaHoraire8") ?>><?php
                                                                                            echo $helpC->SearcheParameter("PARAM_ResaHoraire8")
                                                                                            ?></option>
              </optgroup>
            </select>
          </div>



          <div class="form-row">
            <input required type="number" class="peopleNumber" name="PeopleNumber" placeholder="Combien de personnes?" min="1">
            <input class="add" id="addTable" type="submit" value="RÉSERVER TABLE">
          </div>

          <div class="form-row">
            <input autocomplete="off" name="Allergens" id="Allergens" type="text" value="" placeholder="Ajouter un allergène">
            <input type="hidden" name="allergenes" id="allergenes" value="" />
            <button class="add" id="addAllergens" type="button">+</button>

          </div>

          <div id="noAllergens" class="tempo">Pas d'allergènes.</div>
          <div class="list">
            <ul id="listAllergens">
            </ul>
          </div>
        </form>
      </div>
    </div>
  </section>


  <script>
    datePickerId.min = new Date().toISOString().split("T")[0];
  </script>
</body>

</html>