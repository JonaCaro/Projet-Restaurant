<?php
require_once('Helper.php');
$helperMenu = new HelperClass();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="menu.css">
  <title>La Carte</title>
</head>

<body>
  <header>
    <a href="index.php" class="back"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACKElEQVR4nO2Zv2sUURDHJ6BIVGwkloKgaJukURttYvZmNiqYK4JVEOxS5HbemlRXaW8hktK9zGy4LhFjYaH/QLRLRDFC0oiCiOAPVDjZmOJu3Yuou7d58D4w7e18buc77x0H4HA4HI5e87h+bo9w5Uo0M3YcbKM5Xe1XpvtqqKVMm2ATzXr1oBp6tNX8doEtRMHIETH0tL15awSaN/yjyvQ83bwVAlLzT4nBjazmd72ABDQsTG+7Nb+rBeKAzivjx52a71LflOm9GlxTg0vCeEtCGo2CkQM9FZAdxuafiumLGowTmRZAX+ECyvgiV4G2SrbZPOOlQgUWjD/0p/nPQeRhFIwdK20DZYV47vrw3nszlw9rzRtUgxPKdEcZX3aVYPoghqqlnAF/s4UaoXdaDDWE6Xt2RrBenMSsNyCMK3msUTF0Qgwtdxmp28UYJN/glHdIGZ/kdQ5I6E8K46fevonpar8wLuZ1kGnNGxTGN79JhDQOxf4WoGg7gKv/+3mSjFRKIgl2odtp68Hsn0mykd/Kxo5xSnICNjEf4LWMYF8Em1DGBymBZz25duRFw4yeFIM/2iVi9i+ATYghSQVawSbiEM92hhk/L9X9/WALLYA+ZXpl9xgx3k2dzjfBJsTQ1c4c4CLYxILxhzrXKa6BTTRnvYGUwDuwieUpb1/qWvEVbENzuraXhjqBklHb34AwvW7bQutgG3FQqSR/oPwq9Mrux+FwOCCTn6VWyjI7NiWLAAAAAElFTkSuQmCC">
    </a>
  </header>
  <div class="position">
    <section class="backmenu">
      <div>
        <div class="title">
          <h2>FORMULES</h2>
        </div>
        <div class="priceFlatAlignment">
          <table>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_FormuleOne")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_FormuleOne")
                ?></td>
            </tr>
            <tr>
              <td class="tableBorderTop tableBorderBottom">
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_FormuleTwo")
                ?></td>
              <td class="price tableBorderTop tableBorderBottom">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_FormuleTwo")
                ?></td>
            </tr>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_FormuleThree")
                ?>
              </td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_FormuleThree")
                ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="menu">
        <div>
          <div class="titleMenu">
            <h2 class="tableBorderBottom">MENU A VOLONTE</h2>
          </div>
          <div class="flatCarpa">
            <table>
              <tr>
                <td>
                  <?php
                  echo $helperMenu->SearcheParameterValueMenu("PARAM_MenuVolonte")
                  ?>
                </td>
                <td class="price">
                  <?php
                  echo $helperMenu->SearcheParameterPriceMenu("PARAM_MenuVolonte")
                  ?>
                </td>
              </tr>
              <tr>
                <td class="small">
                  <?php
                  echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_MenuVolonte")
                  ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div>
          <div class="titleMenu">
            <h2 class="tableBorderBottom">MENU ENFANT</h2>
          </div>
          <div class="flatChild">
            <table>
              <tr>
                <td>
                  <?php
                  echo $helperMenu->SearcheParameterValueMenu("PARAM_MenuChildOne")
                  ?></td>
                <td class="price">
                  <?php
                  echo $helperMenu->SearcheParameterPriceMenu("PARAM_MenuChildOne")
                  ?></td>
              </tr>
              <tr>
                <td class="small">
                  <?php
                  echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_MenuChildOne")
                  ?>
                </td>
              </tr>
              <tr>
                <td>
                  <?php
                  echo $helperMenu->SearcheParameterValueMenu("PARAM_MenuChildTwo")
                  ?></td>
                <td class="price">
                  <?php
                  echo $helperMenu->SearcheParameterPriceMenu("PARAM_MenuChildTwo")
                  ?></td>
              </tr>
              <tr>
                <td class="small">
                  <?php
                  echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_MenuChildTwo")
                  ?>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div>
        <div class="title">
          <h2 class="tableBorderBottom">BOISSONS</h2>
        </div>
        <div class="allDrinks">
          <table>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkColdOne")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkColdOne")
                ?></td>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkHotOne")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkHotOne")
                ?></td>
            </tr>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkColdTwo")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkColdTwo")
                ?></td>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkHotTwo")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkHotTwo")
                ?></td>
            </tr>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkColdThree")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkColdThree")
                ?></td>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkHotThree")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkHotThree")
                ?></td>
            </tr>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkColdFour")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkColdFour")
                ?></td>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkHotFour")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkHotFour")
                ?></td>
            </tr>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkColdFive")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkColdFive")
                ?></td>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkHotFive")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkHotFive")
                ?></td>
            </tr>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkColdSix")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkColdSix")
                ?></td>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DrinkHotSix")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DrinkHotSix")
                ?></td>
            </tr>
          </table>
        </div>
      </div>
    </section>
    <section class="backmenu">
      <div>
        <div class="title">
          <h2>Entrée</h2>
        </div>
        <div class="priceFlatAlignment">
          <table>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_EntreeOne")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_EntreeOne")
                ?></td>
            </tr>
            <tr>
              <td class="small">
                <?php
                echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_EntreeOne")
                ?>
              </td>
            </tr>
            <td class="tableBorderTop">
              <?php
              echo $helperMenu->SearcheParameterValueMenu("PARAM_EntreeTwo")
              ?></td>
            <td class="price tableBorderTop">
              <?php
              echo $helperMenu->SearcheParameterPriceMenu("PARAM_EntreeTwo")
              ?></td>
            </tr>
            <tr>
              <td class="small tableBorderBottom">
                <?php
                echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_EntreeTwo")
                ?>
              </td>
              <td class="tableBorderBottom"></td>
            </tr>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_EntreeThree")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_EntreeThree")
                ?></td>
            </tr>
            <tr>
              <td class="small">
                <?php
                echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_EntreeThree")
                ?>
              </td>
          </table>
        </div>
      </div>
      <div>
        <div class="title">
          <h2>Plats</h2>
        </div>
        <div class="priceFlatAlignment">
          <table>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_FlatOne")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_FlatOne")
                ?></td>
            </tr>
            <tr>
              <td class="small">
                <?php
                echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_FlatOne")
                ?>
              </td>
            </tr>
            <td class="tableBorderTop">
              <?php
              echo $helperMenu->SearcheParameterValueMenu("PARAM_FlatOne")
              ?></td>
            <td class="price tableBorderTop">
              <?php
              echo $helperMenu->SearcheParameterPriceMenu("PARAM_FlatTwo")
              ?></td>
            </tr>
            <tr>
              <td class="small tableBorderBottom">
                <?php
                echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_FlatOne")
                ?></td>
              <td class="tableBorderBottom"></td>
            </tr>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_FlatTwo")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_FlatTwo")
                ?></td>
            </tr>
            <tr>
              <td class="small">
                <?php
                echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_FlatThree")
                ?></td>
          </table>
        </div>
      </div>
      <div>
        <div class="title">
          <h2>Dessert</h2>
        </div>
        <div class="priceFlatAlignment">
          <table>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DessertOne")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DessertOne")
                ?></td>
            </tr>
            <tr>
              <td class="small">
                <?php
                echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_DessertOne")
                ?>
              </td>
            </tr>
            <td class="tableBorderTop">
              <?php
              echo $helperMenu->SearcheParameterValueMenu("PARAM_DessertTwo")
              ?></td>
            <td class="price tableBorderTop">
              <?php
              echo $helperMenu->SearcheParameterPriceMenu("PARAM_DessertTwo")
              ?></td>
            </tr>
            <tr>
              <td class="small tableBorderBottom">
                <?php
                echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_DessertTwo")
                ?>
              </td>
              <td class="tableBorderBottom"></td>
            </tr>
            <tr>
              <td>
                <?php
                echo $helperMenu->SearcheParameterValueMenu("PARAM_DessertThree")
                ?></td>
              <td class="price">
                <?php
                echo $helperMenu->SearcheParameterPriceMenu("PARAM_DessertThree")
                ?></td>
            </tr>
            <tr>
              <td class="small">
                <?php
                echo $helperMenu->SearcheParameterDescriptionMenu("PARAM_DessertThree")
                ?>
              </td>
          </table>
          <div>
            <ul>
            </ul>
          </div>
        </div>
    </section>
  </div>

  <footer>
    <div class="contact" id="contact">
      <a href="tel:+330102030405"><img src="data:picture//png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAABUElEQVR4nO3UwSsEcRQH8B8H5SCJi+KinBQnf8XMe2MPk5STi3Jxc7TlqJxot/cGZ5FSro4OchCyO+/Z9uJETg4oNqNdK2uaYqffnPjWXObw+/Te772fMf+xlfL6VL/JKrrljCjjqTJGSrAX5fOdVgEhd0AIbxtA8xNyFywjuNwKNBDGh8q2N2wNUcLjOPLRNjywh3zeRbwawjdrg6CMhWQEzqwNQIVhTAhqsSqerzk3ZGxGCTbirVKGGavIZcHpU8b7WLtqEsCsVSgknEu4m1cJvGmrkBLs/ASFhCgEq1p0JlIh4Sb2CEMpESJYEgL++gcvyrhytet3tQ3VN10Iq4kLmry0F6WiM9o2VKbcoDCe/xpiPDJpUiW/VwgPM0XqiSLToeTNx8f7+2MKT0LuZGqktaqQcFEYToTxsXn4nRDuSwDjJovcrPndmRxs/mTeAQuSgVSbtcDxAAAAAElFTkSuQmCC" width="40px" height="40px"> 01.02.03.04.05</a>
      <a href="index.php"><img src="data:picture//png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAACbklEQVR4nN1Vu25TQRC1kIAOEK+CAvEJ8AkpIBbyzLVBBgXx6OhBIgUpUvAQBQEiBGHGQXQYOQHCB4AAUSFKg2dMEhsEFCmCeIeHbDTrufZNYyx3ZKWV1zNnzsyd3T2bSq3oUR1Pr61SdEgZS0pYF8IfNpWhFmwMQ+VSfk1/5JTZL4xvlLHZdRLWlTHXM3FzdHSVMlxJEMwr46KthfCcMJ5vreGj+zwZXLLYfyZQwstO8EcZT1UmcVtrDV+q4+l1c5Rfr4RfzWY+wzi2qQRj3dtyIwKv6LcU4HArIRzzhPfaRTDed9xR+y8MB5Thl9mstamVN5TgvTJeq3A0KISN6s30FmV8HlpRiPaGT5/EXcI4bVM52hlaZD7CGcMKZTZbrHEYlzC+SyTAGSV8KAxnQ78ZImH8pAynPZmdkiFl+CCEC343mrPXc1uVcEQJPgtlsr5XZ5ThkRWXTDASghkfB2KCO75he9xfF4aiEvwUxiXz2x0xn2G8qKLFCsMT4zLOdoIOCJfsnIdfwka5kN/oLZxqEeMzIXjquGnzGcawcawVkSwutQxEuDBHme1+qV7HfiEY7lw0byPBcNvPMGu2ykS0w9vYeHU1u2nZRgcQwVSomKEmhLdjX4VwIBBwNFgtwO6wJhxIxBaF4G0rFkvJ4lbYqCalgjJHzGZy4P2/G+OU4UGwuZxIIToYS4UWYF/XJKaKsdgJ4Qk760mxq92KNgjjN7MFH+PJWOyE8WJvcu2K6pWXk3KthBfctygMLzuyDmM9yXXnSzDnj0n3ByecuEw21c+w5zD012424bwwfLfp66LJ9As6vrov8v9m/AV2AGYfDbmO3wAAAABJRU5ErkJggg==" width="40px" height="40px"> quaiantique.com</a>
      <a href="https://www.google.com/maps"><img src="data:picture//png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAACHUlEQVR4nMVVv2sUURBeURDRTrGx0DRiE/8A8RcHgsSb2ahcY6etP8B/wFRaJYool8ysSWGjiFYpLQJGUCtTaHbeqqBXH6KnxEL05Nvdk73bPcPuBRwYeLvzve97b2Z21vP+t0W3T251wldM6aUT/g6P10qXERuJ3M2e2mPKK065W+Qm9BqYyif/F3lWpNJNkJYcmfJXJ9TJCQldKi1gQq8GyKe7jxqb4U5opv8W/KL8DZS+ZU7YAXEvtjR1bEvfTYQ6VQTaWQKQDhVQalcQ4OX+XNNNECfkfGugDsulBUz4akExO0VFBra0wPvm6d2mtLZumyqtAetVscFuKRbgaa+qmdR39RU759QGxhvFQuELwwSigM97o1q3620y4cWCwi4iVol05f6J7S7wJyLxz+F59c7kThNqZeZPC+8QAwZY7FmX+O29ib1OuWnCP9IO+WVKNcRM6oed8k841vE7pRow6Y2wpwmOQnI3x0ed8ue/xELPTPhaKP6hHsaUL8J7z4iZ8lSMTYUSDv9ITsCUP6XkD0xprGxaTWnMCT1MPkj+mAcIf0j7+vGqTu4vLSD1Ayb8JE3Xu6IT1OJ5nwB+Y76Y8PVozqdQ/HH8uVozjW3w+E8X0MFQmE35hhN+nu5BBr6EgX+88BThrL/PhBZ6RS7jyVih+aFFztqbu40dkdTPYlSY0lOnHKUNEHdRvBZycQzjJKAz2FM2rRtifwBUa31N+SV/TAAAAABJRU5ErkJggg==" width="40px" height="40px"> 40 Av. Pierre Lanfrey, 73000 Chambéry</a>
      <a href="mailto:chezleboucher.com"><img src="data:picture//png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABD0lEQVR4nO2UsWoCQRCGD+1S2KfQZwgk5Bk03Myawjalr2Bpa5vuZg4sLK2EvEQaSRdnTlKomD5FOsOFM24UzN15ngGL+2FgYXb/j/mXXccpdDZS39wJwUIZwzwlBAsht7EHOIW5biHz/Ql+m/j0Rm4tawKvdH+pjAPrEwtYQxg/haETDlvlNOOw2y2pD21h/Nj1iAUEngFhnG1GfVG/eRtnrmyuhOH55yy8K+NDKiBaL8m9UMKeEKyE4UsIKXisV+zepP5BAKuJ37wWxrG9OGEw6yKYb6IcTzy8SfNJbIR/ZJx0R5kBVtO+qSrhKKpo7cToaMChKgBnHJH892cn5DbsA8prLh7U8yZRyDmZvgHCo98WRM4QBAAAAABJRU5ErkJggg==" width="40px" height="40px"> quaiantique@exemple.com</a>
    </div>
    <div class="boxSchedule">
      <h4 class="schedule" id="titleSchedule">Horaires d'ouverture</h4>
      <table class="schedule">
        <tr>
          <th>Lundi:</th>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_LundiHoraire")
              ?></td>
        </tr>
        <tr>
          <th>Mardi:</th>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_MardiHoraire")
              ?></td>
        </tr>
        <tr>
          <th>Mercredi:</th>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_MercrediHoraire")
              ?></td>
        </tr>
        <tr>
          <th>Jeudi:</th>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_JeudiHoraire")
              ?></td>
        </tr>
        <tr>
          <th>Vendredi:</th>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_VendrediHoraireMidi")
              ?> /</td>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_VendrediHoraireSoire")
              ?></td>
        </tr>
        <tr>
          <th>Samedi:</th>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_SamediHoraireMidi")
              ?> /</td>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_SamediHoraireSoire")
              ?></td>
        </tr>
        <tr>
          <th>Dimanche:</th>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_DimancheHoraireMidi")
              ?> /</td>
          <td><?php
              echo $helperMenu->SearcheParameterHourly("PARAM_DimancheHoraireSoire")
              ?></td>
        </tr>
      </table>
    </div>
  </footer>
</body>

</html>