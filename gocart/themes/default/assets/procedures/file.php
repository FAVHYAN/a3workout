<?php
	switch($_REQUEST['mode']){
		case 'create':
			$ourFileName = $_REQUEST['path'];
			if($ourFileHandle = fopen($ourFileName, 'w')){
				if(fwrite($ourFileHandle, $_REQUEST['request']))
					echo $_REQUEST['request'];
				else
					echo "no se pudo escribir";
			}
			else
				echo "no se pudo crear";
			
			fclose($ourFileHandle);
		break;
		default:
			// Code...
		break;
	}
?>