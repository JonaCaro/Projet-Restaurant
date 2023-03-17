<?php
require_once('Helper.php');
$helpC = new HelperClass();


session_start();
echo $_POST["DateResa"];
echo $_POST["TimeResa"];
echo $_POST["PeopleNumber"];
echo $_POST["Allergens"];
if (isset($_SESSION["IDUser"]) != NULL) {
  if (
    isset($_POST["DateResa"]) && isset($_POST["TimeResa"])
    && isset($_POST["PeopleNumber"]) && isset($_POST["Allergens"])
  ) {
    $IDUser = $_SESSION["IDUser"];
    $DateResa = $_POST["DateResa"];
    $TimeResa = $_POST["TimeResa"];
    $PeopleNumber = $_POST["PeopleNumber"];
    $Allergens = $_POST["Allergens"];
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
      $tmt = $pdo->prepare("insert into reservation(IDUser, DateResa, TimeResa, PeopleNumber, Allergens) values (?,?,?,?)");
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

      ul.innerHTML = localStorage.getItem("list");

      const spanDels = document.querySelectorAll(".delete");

      for (let span of spanDels) {
        span.onclick = () => del(span.parentElement)
      }

      noAllergens.style.display = (ul.innerHTML == "") ? "block" : "none"; //Pas d'allergenes

      form.onclick = (event) => {
        const li = document.createElement("li"); //Creation d'une li
        const spanDel = document.createElement("span"); //Creation <span> icone delete 
        spanDel.className = "fa-solid fa-delete-left"; //Creation class icone
        spanDel.classList.add("delete") //Creation class delete

        spanDel.onclick = () => del(li); // Suppretion du li en un clique 
        li.innerHTML = textFile.value; //Creation article + icone


        li.appendChild(spanDel);
        ul.appendChild(li);

        textFile.value = "";
        noAllergens.style.display = "none";

        localStorage.setItem("list", ul.innerHTML) //Recuperation de la list

        event.preventDefault();
      }

      function del(element) {
        element.remove();

        noAllergens.style.display = (ul.innerHTML == "") ? "block" : "none"; //Pas d'allergenes

        localStorage.setItem("list", ul.innerHTML) //Recuperation de la list
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
            <select required name="TimeResa">
              <option required value="hour-select">Séléctionnez l'heures</option>
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
            <button class="add" id="addAllergens" type="button" value="+"></button>
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


  <script>
    datePickerId.min = new Date().toISOString().split("T")[0];
  </script>
</body>

</html>