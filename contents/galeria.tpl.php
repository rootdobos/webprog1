<?php 
    if (isset($_FILES['file'])) {
       $target_file = $target_dir . basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if(in_array($imageFileType,$mediatypes) ) {
    echo "Sorry, only JPG files are allowed.";
    $uploadOk = 0;
    }
    if ($uploadOk == 0) {
   $uzenet="Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}
else{
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		$uzenet= "Your image was succesfully uploaded";
  } else {
       $uzenet="Sorry, there was an error uploading your file.";
    }
    }
    }
    ?>
<h2>Képfeltöltés</h2>
<h3><?php if (!empty($uzenet))
    { echo $uzenet; }?></h3>
<form action="?oldal=galeria" method="post"
                enctype="multipart/form-data">
        <label>Válassza ki a képet:
            <input type="file" name="file" required>
        </label>     
        <input type="submit" name="kuld" value="Feltöltés">
      </form>    
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
                <img src="<?php echo $kepek_mappa.$fajl ?>"  >
            </a>            
        </div>
    <?php
    }
    ?>
    </div>