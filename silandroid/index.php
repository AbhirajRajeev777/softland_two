<?php

	ini_set("display_errors",0);
	$functionName = $_REQUEST["fn"];
	switch ($functionName)
	{

		case 'get_signal_min_level':
			$filedbm = fopen("dbm.info", "r") or die("-110");
			echo fread($filedbm,filesize("dbm.info"));
			fclose($filedbm);
			
			break;

		case 'set_signal_min_level':
			$filedbm = fopen("dbm.info", "w") or die("File open error");
			$dbm=$_REQUEST["dbm"];
			fwrite($filedbm, $dbm);
			fclose($filedbm);
			
			$filedbm = fopen("dbm.info", "r") or die("File open error");
			$dbm= fread($filedbm,filesize("dbm.info"));
			fclose($filedbm);
			echo "Success. New dbm set is : $dbm";
			break;
		case 'get_wifi_min_level':
			$filedbm = fopen("wifi.info", "r") or die("-70");
			echo fread($filedbm,filesize("wifi.info"));
			fclose($filedbm);
			
			break;

		case 'set_wifi_min_level':
			$filedbm = fopen("wifi.info", "w") or die("File open error");
			$dbm=$_REQUEST["dbm"];
			fwrite($filedbm, $dbm);
			fclose($filedbm);
			
			$filedbm = fopen("wifi.info", "r") or die("File open error");
			$dbm= fread($filedbm,filesize("wifi.info"));
			fclose($filedbm);
			echo "Success. New dbm set is : $dbm";
			break;
		default:
			echo "0" ;
			break;
	}		
?>