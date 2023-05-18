<?php
session_start();
require_once('../pdo.php');

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

    $PhpData = new HelperBDD();
    $tmt = $PhpData->UpdateReservation($dateResa, $timeResa, $allergen, $PeopleNumber, $id);

    if ($tmt->rowCount() == 1) {
      $uri = $_SERVER['HTTP_HOST'] . '/' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . '/';
      header('Location: http://' . $uri .  'admin.php');
    }
  } catch (PDOException $e) {
    echo $e;
  }
