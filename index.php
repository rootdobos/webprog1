<?php
include ('./config/config.php');

session_start();
// Start the session
$keres=current($oldalak);
	if (isset($_GET['oldal'])) 
	{
		if(isset($oldalak[$_GET['oldal']]) && file_exists("./contents/{$oldalak[$_GET['oldal']]['fajl']}.tpl.php"))
			{
				$keres=$oldalak[$_GET['oldal']];			
			}
			else
			{
				$keres=$hiba_oldal;
				header("HTTP/1.0 404 Not Found");
			}
	}
	
	include('./template/index.tpl.php')
	?>