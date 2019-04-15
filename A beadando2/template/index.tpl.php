<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
  <link rel="stylesheet" href="./style/stilus.css" type="text/css">
</head>
<body>
  <div class="wrapper">
    <header>
      <img src="./kepek/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>">
      <?php if(isset($_SESSION['login'])) { echo "<p>Bejelentkezve: ".$_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")</p>" ; }
      else{
      }?>
    </header>
    <nav>
      <ul>
        <?php if(isset($_SESSION['login'])) { echo '<li><a class="aktiv" href="?oldal=kilepes'.'">'.$oldalak["kilepes"]["cim"].'</a></li>'; } 
        else { echo '<li><a class="aktiv" href="?oldal=belepes'.'">'.$oldalak["belepes"]["cim"].'</a></li>'; } ?>
      <?php
      foreach ($oldalak as $oldalnev => $oldalleir) {
        if($oldalnev!= 'belepes' && $oldalnev!= 'belep' &&$oldalnev!= 'kilepes' &&$oldalnev!= 'regisztral'  ){
        if ($oldalleir == $keres) { 
          echo '<li><a class="aktiv" href="?oldal='.$oldalnev.'">'.$oldalleir["cim"].'</a></li>';
        } else {
          echo '<li><a href="?oldal='.$oldalnev.'">'.$oldalleir["cim"].'</a></li>';
        }
        }
      }
      ?>
      <li><a href="https://unicef.hu/" target="_blank">Eredeti UNICEF</a></li>
      <li><a href="https://unicef.hu/igy-segithetsz/unicefwebshop/" target="_blank">UNICEF WebShop</a></li>
      <li><a href="https://unicef.hu/gyik/" target="_blank">GYIK</a></li>
      </ul>
    </nav>
    <div class="main">
      <aside>
        <section>
          <form method="get" action="http://www.google.com/search"> <input type="text" name="q" size="31" maxlength="255" value="" /> <input type="submit" value="Keresés" />
          <input type="hidden" name="sitesearch" value="unicef.hu">
           </form>

        </section>
        <section>
          <h2>Hope</h2>
          <img src="./kepek/for-every-child.jpg">
        </section>
        <section>
          <h2>Education</h2>
          <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/N14_XNH8Mqs" frameborder="3" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </section>
      </aside>
      <div class="content">
        <?php
          include("contents/".$keres["fajl"].".tpl.php");
        ?>
      </div>
    </div>
    <footer>
       <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
    </footer>
  </div>
</body>
</html>
