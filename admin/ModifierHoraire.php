<?php
session_start();

$role = 0;
if (isset($_SESSION["Role"])) {
  $role = 1;
} else {
  $_SESSION["Role"] = '';
}

if (isset($_POST["idParam"]) && isset($_POST["parameterValue"]) && $_SESSION["Role"] == 1)
  try {
    $horaire =  $_POST["parameterValue"];
    $id =  $_POST["idParam"];

    $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
    $tmt = $pdo->prepare("update adminparametershourly p  set p.ParameterValue =? where p.ID = ?");
    $tmt->execute(array($horaire, $id));


    if ($tmt->rowCount() == 1) {
      $uri = $_SERVER['HTTP_HOST'] . '/' . substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')) . '/';
      header('Location: http://' . $uri .  '/ParamHoraire.php');
    }
  } catch (PDOException $e) {
    echo $e;
  }
