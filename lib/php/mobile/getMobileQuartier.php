<?php header('Content-Type:text/xml');
	include '../key.php';
	
	switch (SGBD) {
		case 'mysql':
			$link = mysql_connect(HOST,DB_USER,DB_PASS);
			mysql_select_db(DB_NAME);	
			
			$sql = "SELECT id_quartier, lib_quartier FROM quartier ORDER BY id_quartier ASC";
			$result = mysql_query($sql);
			print '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
			print '<quartiers>';
			while ($row = mysql_fetch_array($result)) {
				print '<quartier nom="'.stripslashes($row['lib_quartier']).'" id="'.$row['id_quartier'].'" />';
			}
			print '</quartiers>';

			mysql_free_result($result);
			mysql_close($link);
			break;
		case 'postgresql':
			// TODO
			break;
	}	
	
?>