<?php
if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
         // Kapcsolódás
          include ('./config/database.php');
            
            // Felhsználó keresése
            $sqlSelect = "select id, csaladi_nev, uto_nev from felhasznalok where felhasznalo_nev = :bejelentkezes and jelszo = sha1(:jelszo)";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            if($row) { 
            $_SESSION['csn'] = $row['csaladi_nev']; $_SESSION['un'] = $row['uto_nev']; $_SESSION['login'] = $_POST['felhasznalo'];
            $errormessage="Welcome ". $_SESSION['login'];
            
        }
        else
        {
            $errormessage="Nem sikerült a bejelentkezés";
        }
    }
    catch (PDOException $e) {
       $errormessage="Nem sikerült a bejelentkezés";
    }      
}
else {
    $errormessage="Nem sikerült a bejelentkezés";
}
?>
