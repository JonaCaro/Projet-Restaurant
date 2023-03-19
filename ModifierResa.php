<?php
session_start();

$role = 0;
if (isset($_SESSION["Role"])) {
  $role = 1;
} else {
  $_SESSION["Role"] = '';
}

if (
  isset($_POST["idResa"]) && isset($_POST["DateResa"]) && isset($_POST["TimeResa"])
  && isset($_POST["Allergens"]) && isset($_POST["PeopleNumber"]) && $_SESSION["Role"] == 1
)
  try {
    $dateResa =  $_POST["DateResa"];
    $timeResa =  $_POST["TimeResa"];
    $allergen =  $_POST["Allergens"];
    $PeopleNumber =  $_POST["PeopleNumber"];
    $id =  $_POST["idResa"];

    $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
    $tmt = $pdo->prepare("update reservation r set r.DateResa =?, r.TimeResa = ? , r.Allergens = ?, r.PeopleNumber = ?
     where r.ID = ?");
    $tmt->execute(array($dateResa, $timeResa, $allergen, $PeopleNumber, $id));


    if ($tmt->rowCount() == 1) {
      $uri = $_SERVER['HTTP_HOST'] . '/' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . '/';
      header('Location: http://' . $uri .  'admin.php');
    }
  } catch (PDOException $e) {
    echo $e;
  }
