
<?php
    if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['utonev'])) {
        try {
            // Kapcsolódás
             include ('./config/database.php');
            
            // Létezik már a felhasználói név?
            $sqlSelect = "select id from felhasznalok where felhasznalo_nev = :felhasznalonev";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':felhasznalonev' => $_POST['felhasznalo']));
            if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $uzenet = "A felhasználói név már foglalt!";
                $ujra = "true";
            }
            else {
                // Ha nem létezik, akkor regisztráljuk
                $sqlInsert = "insert into felhasznalok(id, csaladi_nev, uto_nev, felhasznalo_nev, jelszo)
                              values(0, :vezeteknev, :utonev, :felhasznalo_nev, :jelszo)";
                $stmt = $dbh->prepare($sqlInsert); 
                $stmt->execute(array(':vezeteknev' => $_POST['vezeteknev'], ':utonev' => $_POST['utonev'],
                                     ':felhasznalo_nev' => $_POST['felhasznalo'], ':jelszo' => sha1($_POST['jelszo']))); 
                if($count = $stmt->rowCount()) {
                    $newid = $dbh->lastInsertId();
                    $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";                     
                    $ujra = false;
                }
                else {
                    $uzenet = "A regisztráció nem sikerült.";
                    $ujra = true;
                }
            }
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }
    else {
        header("Location: .");
    }


?>
        <?php if(isset($uzenet)) { ?>
            <h1><?= $uzenet ?></h1>
            <?php if($ujra) { ?>
           <!--  <a action = "?oldal=belepes">Próbálja újra!</a>
            <?php } ?>
        <?php } ?>
