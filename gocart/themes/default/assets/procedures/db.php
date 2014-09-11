<?php
include "crypt.php";

function clearVal($string=''){
	$result = '';

	$splOpen = explode('{{', $string);

	for($iOp=1; $iOp<count($splOpen); $iOp++){
		$splEnd = explode('}}', $splOpen[$iOp]);
		$result .= Crypt::decode($splEnd[0]).$splEnd[1];
	}

	return $result;
}

$arr = false;

$expEngine = explode('://', clearVal($_REQUEST['cnx']));
$expUser = explode(':', $expEngine[1]);
$expPass = explode('@', $expUser[1]);
$expServBD = explode('/', $expPass[1]);

$engine = $expEngine[0];
$user = $expUser[0];
$pass = $expPass[0];
$serv = $expServBD[0];
$db = $expServBD[1];

$response = array();

switch($_REQUEST['mode']){
	case 'cnx':
		if($plink = mysql_pconnect($serv, $user, $pass)){
			mysql_close($plink);
			echo true;
		}else echo false;
	break;
	case 'query':
		$link =  mysql_connect($serv, $user, $pass);

		mysql_select_db($db);
		
		if (!$link) die('No pudo conectarse: ' . mysql_error());
		else{
			/*$ourFileHandle = fopen("text.txt", 'a');
			fwrite($ourFileHandle, clearVal(base64_decode($_REQUEST['request'])));*/
			
			if($qry = mysql_query(clearVal($_REQUEST['args']))){
				error_reporting(0);
				
				if (mysql_num_rows($qry) > 0) {
					while($rowsArr = mysql_fetch_row($qry)){
						$arr[] = $rowsArr;
					}
				}
				
				mysql_free_result($qry);
				if($arr) echo base64_encode(json_encode($arr));
				else echo 0;
			}else{
				echo false;
			}
			
			mysql_close($link);
		}
	break;
	default:
		echo clearVal($_REQUEST['args']);
	break;
}

?>