<?php if(isset($_POST['emailcim']) &&isset($_POST['uzenet'])){
     $dbh = new PDO('mysql:host=localhost;dbname=unicefdb', 'root', '',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            $sqlInsert = "insert into uzenetek(email, uzenet)
                              values( :emailcim,:uzenet)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':emailcim' => $_POST['emailcim'], ':uzenet' => $_POST['uzenet']));
            echo "Üzenet elküldve!";
            echo "E-mail: ".$_POST['emailcim']."<br>";
            echo "Üzenet: ".$_POST['uzenet'];
    }else{?>
<form action="?oldal=uzenet" method="post">
    <table id="tablazat">
        <th><h2>Regisztracio:</h2></th>
        <tr><td>E-mail</td><td><input class="bevitel" type="email" name="emailcim" required></td></tr>
        <tr><td>Üzenet</td><td><input class="bevitel" type="text" name="uzenet"  required></td></tr>
        <tr><td><input type="submit" value="Küldés"></td><tr>
    </table>
</form>
<?php }?>