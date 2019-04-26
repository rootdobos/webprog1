<?php
$dbh = new PDO('mysql:host=localhost;dbname=ezazadatb', 'ezazadatb', 'ivwiva1998',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
?>