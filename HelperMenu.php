<?php

class HelperMenuClass
{
  public function __constructe()
  {
  }
  public function SearcheParameter($paramM)
  {
    $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
    $tmt = $pdo->prepare("SELECT ParameterValue FROM adminparametersmenu where ParameterName = ?");
    $tmt->execute(array('' . $paramM . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterValue'];
  }
}

class HelperPriceClass
{
  public function __constructe()
  {
  }
  public function SearcheParameter($paramP)
  {
    $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
    $tmt = $pdo->prepare("SELECT ParameterPrice FROM adminparametersmenu where ParameterName = ?");
    $tmt->execute(array('' . $paramP . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterPrice'];
  }
}

class HelperDescriptionClass
{
  public function __constructe()
  {
  }
  public function SearcheParameter($paramD)
  {
    $pdo = new PDO('mysql:host=localhost;dbname=quaiantique', 'root', '');
    $tmt = $pdo->prepare("SELECT ParameterDescription FROM adminparametersmenu where ParameterName = ?");
    $tmt->execute(array('' . $paramD . ''));

    $row = $tmt->fetch(PDO::FETCH_ASSOC);
    return $row['ParameterDescription'];
  }
}
