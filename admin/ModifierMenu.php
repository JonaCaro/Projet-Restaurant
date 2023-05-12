<?php
session_start();

$role = 0;
if (isset($_SESSION["Role"])) {
  $role = 1;
} else {
  $_SESSION["Role"] = '';
}

if (
  isset($_POST["idParam"]) && isset($_POST["parameterValue"]) && isset($_POST["parameterPrice"])
  && isset($_POST["parameterDescription"]) && $_SESSION["Role"] == 1
)
  try {
    $flatName =  $_POST["parameterValue"];
    $price =  $_POST["parameterPrice"];
    $description =  $_POST["parameterDescription"];
    $id =  $_POST["idParam"];

    $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
    $tmt = $pdo->prepare("update adminparametersmenu p  set p.ParameterValue =?, p.ParameterPrice =?, p.ParameterDescription =? where p.ID = ?");
    $tmt->execute(array($flatName, $price, $description, $id));


    if ($tmt->rowCount() == 1) {
      $uri = $_SERVER['HTTP_HOST'] . '/' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . '/';
      header('Location: http://' . $uri .  '/ParamMenu.php');
    }
  } catch (PDOException $e) {
    echo $e;
  }
