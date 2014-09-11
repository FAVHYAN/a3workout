<?php
/**
*Encriptar cadenas 
*/
if(isset($_REQUEST['mode'])){
	switch ($_REQUEST['mode']) {
		case 'encode':
			return Crypt::encode($_REQUEST['string']);
			break;
		case 'decode':
			return Crypt::decode($_REQUEST['string']);
			break;

		default:
			return false;
			break;
	}
}
class Crypt
{
	
	function __construct()
	{
		
	}
	function encode($string){
		$string = base64_encode($string);
		$toAscii = false;
		$strOfuscated = 'asd!·asd$asd%asd&asd/asd(as)ds=asd?asd¿sa/sd*-gf+ertert,.ert-';

		for($iw=0; $iw<strlen($string); $iw++){
			$toAscii .= substr($strOfuscated, rand(0, (strlen($strOfuscated)-1)), 1).hexdec(ord(substr($string, $iw, 1))).substr($strOfuscated, rand(0, (strlen($strOfuscated)-1)), 1);
		}

		return base64_encode($toAscii);
	}
	function decode($strOfuscated){
		$strOfuscated = base64_decode($strOfuscated);
		$number = false;
		$toAscii = false;

		for($ic=0; $ic<strlen($strOfuscated); $ic++){
			if(is_numeric(substr($strOfuscated, $ic, 1)))
				$number .= substr($strOfuscated, $ic, 1);
			else
				$number .= '-';
		}

		foreach (explode('-', $number) as $key => $value) {
			if(is_numeric($value)) $toAscii .= chr(dechex($value));
		}

		return base64_decode($toAscii);
	}
}
/**
$crypt = new Crypt;
echo $crypt->encode("edward");
echo "<br/>";
echo $crypt->decode($crypt->encode("edward"));
*
*/