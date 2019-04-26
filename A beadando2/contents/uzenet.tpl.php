<?php
 if(isset($_POST['emailcim']) &&isset($_POST['uzenet']) && filter_var($_POST['emailcim'], FILTER_VALIDATE_EMAIL)){
     include ('./config/database.php');
            $sqlInsert = "insert into uzenetek(email, uzenet)
                              values( :emailcim,:uzenet)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(':emailcim' => $_POST['emailcim'], ':uzenet' => $_POST['uzenet']));
            echo "Üzenet elküldve!";
            echo "E-mail: ".$_POST['emailcim']."<br>";
            echo "Üzenet: ".$_POST['uzenet'];
    }
    else if(isset($_GET['lista']))
    {
          include ('./config/database.php');
            $sql="select * from uzenetek";
            $stmt = $dbh->prepare($sql);
            $stmt->execute();
            $row=$stmt->fetchAll();

            echo  '<table class= "table table-striped">' ;
            ?><thead>
    <tr>
      <th scope="col">E-mail</th>
      <th scope="col">Üzenet</th>
    </tr>
    <?php
            foreach($row as $rec)
            {
               echo '<tr scope="row"><td>'.$rec['email']."</td><td>".$rec['uzenet']."</td></tr>";
            }
            echo "</table>";
    }
    else
{?>
<form action="?oldal=uzenet" method="post">
    <table id="tablazat">
        <th><h2>Üzenetek:</h2></th>
        <tr><td>E-mail</td><td><input class="bevitel" type="email" name="emailcim" required></td></tr>
        <tr><td>Üzenet</td><td><input class="bevitel" type="text" name="uzenet"  required></td></tr>
        <tr><td><input type="submit" value="Küldés"></td><td><a href="?oldal=uzenet&lista=1" >Üzenetek</a></td><tr>
    </table>
</form>
<?php }?>