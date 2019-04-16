<?php
$kepek = array();
$olvaso = opendir($kepek_mappa );
while ($fajl = readdir($olvaso)) {
        if (is_file($kepek_mappa.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $types)) {
               // $kepek[$fajl] = filemtime($kepek_mappa.$fajl);
                $kepek[] = $fajl;
            }
        }
    }
     closedir($olvaso);
?>
<div id="galeria">
    <h1>Galéria</h1>
    <?php
   // foreach($kepek as $fajl  => $datum)
   foreach($kepek as $fajl )
    {
    ?>
        <div class="kep">
            <a href="<?php echo $kepek_mappa.$fajl ?>">
                <img src="<?php echo $kepek_mappa.$fajl ?>" width=300 >
            </a>            
        </div>
    <?php
    }
    ?>
    </div>