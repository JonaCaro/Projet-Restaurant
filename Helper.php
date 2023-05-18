<?php

require_once('pdo.php');
class HelperClass
{
  public function __construct()
  {
  }



  public function SearcheParameterIndex($paramI)
  {
    $PhpData = new HelperBDD();
    return $PhpData->SearcheParameterIndex($paramI);
  }

  public function SearcheParameterHourly($param)
  {
    $PhpData = new HelperBDD();
    return $PhpData->SearcheParameterHourly($param);
  }

  public function SearcheParameterValueMenu($paramM)
  {
    $PhpData = new HelperBDD();
    return $PhpData->SearcheParameterValueMenu($paramM);
  }

  public function SearcheParameterPriceMenu($paramP)
  {
    $PhpData = new HelperBDD();
    return $PhpData->SearcheParameterPriceMenu($paramP);
  }

  public function SearcheParameterDescriptionMenu($paramD)
  {
    $PhpData = new HelperBDD();
    return $PhpData->SearcheParameterDescriptionMenu($paramD);
  }
}
