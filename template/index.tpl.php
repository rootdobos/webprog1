<?php
if(file_exists("./logicals/{$keres['fajl']}.php"))
{
  include("./logicals/{$keres['fajl']}.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
  <link rel="stylesheet" href="./styles/stilus.css" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
      <ul class="nav justify-content-center">
        <?php if(isset($_SESSION['login'])) { echo '<li><a class="nav-link" href="?oldal=kilepes'.'">'.$oldalak["kilepes"]["cim"].'</a></li>'; } 
        else { echo '<li class="nav-item"><a class="nav-link" href="?oldal=belepes'.'">'.$oldalak["belepes"]["cim"].'</a></li>'; } ?>
      <?php
      foreach ($oldalak as $oldalnev => $oldalleir) {
        if($oldalnev!= 'belepes' && $oldalnev!= 'belep' &&$oldalnev!= 'kilepes' &&$oldalnev!= 'regisztral'  ){
        if ($oldalleir == $keres) { 
          echo '<li class="nav-item"><a class="nav-link active" href="?oldal='.$oldalnev.'">'.$oldalleir["cim"].'</a></li>';
        } else {
          echo '<li class="nav-item"><a class="nav-link" href="?oldal='.$oldalnev.'">'.$oldalleir["cim"].'</a></li>';
        }
        }
      }
      ?>
      <li><a class="nav-link" href="https://unicef.hu/" target="_blank">Eredeti UNICEF</a></li>
      <li><a class="nav-link" href="https://unicef.hu/igy-segithetsz/unicefwebshop/" target="_blank">UNICEF WebShop</a></li>
      <li><a class="nav-link" href="https://unicef.hu/gyik/" target="_blank">GYIK</a></li>
      </ul>
              <section>
          <form method="get" class="kereses"action="http://www.google.com/search"> <input type="text" name="q" size="31" maxlength="255" value="" /> <input type="submit" value="Keresés" />
          <input type="hidden" name="sitesearch" value="unicef.hu">
           </form>

    </nav>
    <h3><?php if (!empty($alma))
    { echo $alma; }?></h3>
    <div class="main">
      
      <div class="content">
        <?php
          include("contents/".$keres["fajl"].".tpl.php");
        ?>
      </div>
    </div>
    <footer class="card-footer text-muted">
       <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
    </footer>
  </div>
  
</body>
</html>
