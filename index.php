<?php

require_once('Helper.php');

session_start();

echo $_SESSION["Role"];

$helpC = new HelperClass();

$con = false;
if (isset($_SESSION["Con"])) {
  $con = true;
} else {
  $_SESSION["Con"] = "";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Quai Antique</title>
</head>

<body>

  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <img src="data:image//png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAYUlEQVR4nO3WyQnAMAwFUZcXp/+zDMF9TDrQJcYLmdfBRwimFEmSBgFuoLG/BtRsyMM5+i+GVCDYXwDX51+SJEmaCDN+iZ5dxIyfLMx4SZJ0Gsz4JXp2ETN+sjDjJUlloBfbFyzbu4GNjwAAAABJRU5ErkJggg==">
    </label>
    <ul>
      <li><a class="active" href="#welcomeBanner">Accueil</a></li>
      <li><a href="#presentation">Présentation</a></li>
      <li><a href="#imgschedule">Horaires</a></li>
      <li><a href="menu.php">La Carte</a></li>
      <li><a href="reservation.php">Réserver</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="gallery.php">Galerie</a></li>


      <?php if ($_SESSION["Role"] === 1) {
        echo '<a href="admin.php">Admin</a>';
      }

      ?>

      <?php

      if ($con) {
        echo '<div class="Connexion">Bonjour ' . $_SESSION["Con"] . '  ' . '<a href="logout.php" id="deconnexion">/  Déconnexion</a></div>';
      } else {
        echo '<a href="login.php" class="Connexion">Connexion / inscription</a>';
      }
      ?>
    </ul>
  </nav>

  <div id="welcomeBanner">
    <img src="picture/welcomeBanner.jpg" alt="welcomeBanner" height="100%" width="100%">
  </div>

  <section id="presentation">
    <div id="discBox">
      <p id="description">Le Quai Antique du Chef Arnaud Michant à Chambéy est un restaurant qui propose une expérience
        culinaire unique et raffinée.<br>
        Il propose une cuisine française authentique et créative, avec des produits
        locaux
        frais et une carte des vins riche et variée.<br>
        Les plats sont servis dans un cadre chaleureux et élégant, avec des
        plats faits maison et des menus saisonniers à déguster.<br>
        Le restaurant propose également une ambiance animée et
        amicale, avec un personnel accueillant et attentionné. C'est l'endroit idéal pour un déjeuner, un dîner ou un
        événement spécial.</p>
    </div>
    <div>
      <video id="video" height="100%" width="100%" controls>
        <source src="video/video.mp4" type="video/mp4">
        Désolé votre ordinateur ne peux pas lire la vidéo.
      </video>
    </div>
  </section>
  <section class="pictureFlat">
    <div class="flat">
      <img src="picture/flatCarpa.jpg" alt="flatCarpa" class="flatCarpa">
    </div>
  </section>
  <section class="pictureFlat">
    <div class="flat">
      <img src="picture/flatOs.jpg" alt="flatOs" class="flatOs">
    </div>
    <div class="buttonImg">
      <a href="menu.php" class="buttonImg" id="menu">La Carte</a>
      <a href="reservation.php" class="buttonImg" id="reserver">Réserver</a>
    </div>
    <div class="flat">
      <img src="picture/flatTira.jpg" alt="flatTira" class="flatTira">
    </div>
  </section>

  <section class="carousel">
    <div class="pic-ctn">
      <img src="picture/flatCarpa.jpg" alt="flatCarpa" class="pic" width="auto" height="auto">
      <img src="picture/flatOs.jpg" alt="flatOs" class="pic" width="auto" height="auto">
      <img src="picture/flatTira.jpg" alt="flatTira" class="pic" width="auto" height="auto">
    </div>
  </section>

  <div class="imgSchedule" id="imgschedule">
    <img src="picture/schedule.jpg" alt="schedule" height="100%" width="100%">
  </div>

  <footer>
    <div class="contact" id="contact">
      <a href="tel:+330102030405"><img src="data:picture//png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAACXBIWXMAAAsTAAALEwEAmpwYAAABUElEQVR4nO3UwSsEcRQH8B8H5SCJi+KinBQnf8XMe2MPk5STi3Jxc7TlqJxot/cGZ5FSro4OchCyO+/Z9uJETg4oNqNdK2uaYqffnPjWXObw+/Te772fMf+xlfL6VL/JKrrljCjjqTJGSrAX5fOdVgEhd0AIbxtA8xNyFywjuNwKNBDGh8q2N2wNUcLjOPLRNjywh3zeRbwawjdrg6CMhWQEzqwNQIVhTAhqsSqerzk3ZGxGCTbirVKGGavIZcHpU8b7WLtqEsCsVSgknEu4m1cJvGmrkBLs/ASFhCgEq1p0JlIh4Sb2CEMpESJYEgL++gcvyrhytet3tQ3VN10Iq4kLmry0F6WiM9o2VKbcoDCe/xpiPDJpUiW/VwgPM0XqiSLToeTNx8f7+2MKT0LuZGqktaqQcFEYToTxsXn4nRDuSwDjJovcrPndmRxs/mTeAQuSgVSbtcDxAAAAAElFTkSuQmCC" width="40px" height="40px"> 01.02.03.04.05</a>
      <a href="index.html"><img src="data:picture//png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAACbklEQVR4nN1Vu25TQRC1kIAOEK+CAvEJ8AkpIBbyzLVBBgXx6OhBIgUpUvAQBQEiBGHGQXQYOQHCB4AAUSFKg2dMEhsEFCmCeIeHbDTrufZNYyx3ZKWV1zNnzsyd3T2bSq3oUR1Pr61SdEgZS0pYF8IfNpWhFmwMQ+VSfk1/5JTZL4xvlLHZdRLWlTHXM3FzdHSVMlxJEMwr46KthfCcMJ5vreGj+zwZXLLYfyZQwstO8EcZT1UmcVtrDV+q4+l1c5Rfr4RfzWY+wzi2qQRj3dtyIwKv6LcU4HArIRzzhPfaRTDed9xR+y8MB5Thl9mstamVN5TgvTJeq3A0KISN6s30FmV8HlpRiPaGT5/EXcI4bVM52hlaZD7CGcMKZTZbrHEYlzC+SyTAGSV8KAxnQ78ZImH8pAynPZmdkiFl+CCEC343mrPXc1uVcEQJPgtlsr5XZ5ThkRWXTDASghkfB2KCO75he9xfF4aiEvwUxiXz2x0xn2G8qKLFCsMT4zLOdoIOCJfsnIdfwka5kN/oLZxqEeMzIXjquGnzGcawcawVkSwutQxEuDBHme1+qV7HfiEY7lw0byPBcNvPMGu2ykS0w9vYeHU1u2nZRgcQwVSomKEmhLdjX4VwIBBwNFgtwO6wJhxIxBaF4G0rFkvJ4lbYqCalgjJHzGZy4P2/G+OU4UGwuZxIIToYS4UWYF/XJKaKsdgJ4Qk760mxq92KNgjjN7MFH+PJWOyE8WJvcu2K6pWXk3KthBfctygMLzuyDmM9yXXnSzDnj0n3ByecuEw21c+w5zD012424bwwfLfp66LJ9As6vrov8v9m/AV2AGYfDbmO3wAAAABJRU5ErkJggg==" width="40px" height="40px"> quaiantique.com</a>
      <a href="https://www.google.com/maps"><img src="data:picture//png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAACHUlEQVR4nMVVv2sUURBeURDRTrGx0DRiE/8A8RcHgsSb2ahcY6etP8B/wFRaJYool8ysSWGjiFYpLQJGUCtTaHbeqqBXH6KnxEL05Nvdk73bPcPuBRwYeLvzve97b2Z21vP+t0W3T251wldM6aUT/g6P10qXERuJ3M2e2mPKK065W+Qm9BqYyif/F3lWpNJNkJYcmfJXJ9TJCQldKi1gQq8GyKe7jxqb4U5opv8W/KL8DZS+ZU7YAXEvtjR1bEvfTYQ6VQTaWQKQDhVQalcQ4OX+XNNNECfkfGugDsulBUz4akExO0VFBra0wPvm6d2mtLZumyqtAetVscFuKRbgaa+qmdR39RU759QGxhvFQuELwwSigM97o1q3620y4cWCwi4iVol05f6J7S7wJyLxz+F59c7kThNqZeZPC+8QAwZY7FmX+O29ib1OuWnCP9IO+WVKNcRM6oed8k841vE7pRow6Y2wpwmOQnI3x0ed8ue/xELPTPhaKP6hHsaUL8J7z4iZ8lSMTYUSDv9ITsCUP6XkD0xprGxaTWnMCT1MPkj+mAcIf0j7+vGqTu4vLSD1Ayb8JE3Xu6IT1OJ5nwB+Y76Y8PVozqdQ/HH8uVozjW3w+E8X0MFQmE35hhN+nu5BBr6EgX+88BThrL/PhBZ6RS7jyVih+aFFztqbu40dkdTPYlSY0lOnHKUNEHdRvBZycQzjJKAz2FM2rRtifwBUa31N+SV/TAAAAABJRU5ErkJggg==" width="40px" height="40px"> 40 Av. Pierre Lanfrey, 73000 Chambéry</a>
      <a href="mailto:chezleboucher.com"><img src="data:picture//png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABD0lEQVR4nO2UsWoCQRCGD+1S2KfQZwgk5Bk03Myawjalr2Bpa5vuZg4sLK2EvEQaSRdnTlKomD5FOsOFM24UzN15ngGL+2FgYXb/j/mXXccpdDZS39wJwUIZwzwlBAsht7EHOIW5biHz/Ql+m/j0Rm4tawKvdH+pjAPrEwtYQxg/haETDlvlNOOw2y2pD21h/Nj1iAUEngFhnG1GfVG/eRtnrmyuhOH55yy8K+NDKiBaL8m9UMKeEKyE4UsIKXisV+zepP5BAKuJ37wWxrG9OGEw6yKYb6IcTzy8SfNJbIR/ZJx0R5kBVtO+qSrhKKpo7cToaMChKgBnHJH892cn5DbsA8prLh7U8yZRyDmZvgHCo98WRM4QBAAAAABJRU5ErkJggg==" width="40px" height="40px"> quaiantique@exemple.com</a>
    </div>
    <div class="boxSchedule">
      <h4 class="schedule" id="titleSchedule">Horaires d'ouverture</h4>
      <table class="schedule">
        <tr>
          <th>Lundi:</th>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_LundiHoraire")
              ?></td>
        </tr>
        <tr>
          <th>Mardi:</th>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_MardiHoraire")
              ?></td>
        </tr>
        <tr>
          <th>Mercredi:</th>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_MercrediHoraire")
              ?></td>
        </tr>
        <tr>
          <th>Jeudi:</th>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_JeudiHoraire")
              ?></td>
        </tr>
        <tr>
          <th>Vendredi:</th>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_VendrediHoraireMidi")
              ?> /</td>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_VendrediHoraireSoire")
              ?></td>
        </tr>
        <tr>
          <th>Samedi:</th>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_SamediHoraireMidi")
              ?> /</td>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_SamediHoraireSoire")
              ?></td>
        </tr>
        <tr>
          <th>Dimanche:</th>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_DimancheHoraireMidi")
              ?> /</td>
          <td><?php
              echo $helpC->SearcheParameter("PARAM_DimancheHoraireSoire")
              ?></td>
        </tr>
      </table>
    </div>
    <div class="arrow">
      <a href="#welcomeBanner"><img id="top" src="data:picture//png;base64,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"></a>
    </div>
  </footer>
</body>

</html>