<?php
	switch($_REQUEST['mode']){
		case 'send':
			$jsonRequest = (json_decode($_REQUEST['cnx']))?json_decode($_REQUEST['cnx']):explode(',', $_REQUEST['cnx']);
			
			$to = ($jsonRequest['to'])?$jsonRequest['to']:($jsonRequest[0])?$jsonRequest[0]:'';
			$subject = ($jsonRequest['subject'])?$jsonRequest['subject']:($jsonRequest[1])?$jsonRequest[1]:'';
			$message = ($jsonRequest['message'])?$jsonRequest['message']:($jsonRequest[2])?$jsonRequest[2]:'';
			$headers = ($jsonRequest['headers'])?$jsonRequest['headers']:($jsonRequest[3])?$jsonRequest[3]:'';
			$params = ($jsonRequest['params'])?$jsonRequest['params']:($jsonRequest[4])?$jsonRequest[4]:'';
			
			if(mail($to, $subject, $message, $headers, $params)){
				echo true;
			}else{
				echo false;
			}
		break;
		case 'imap':
			$jsonRequest = (json_decode($_REQUEST['cnx']))?json_decode($_REQUEST['cnx']):explode(',', $_REQUEST['cnx']);
			
			$mailbox = ($jsonRequest['mailbox'])?$jsonRequest['mailbox']:($jsonRequest[0])?$jsonRequest[0]:'';
			$username = ($jsonRequest['username'])?$jsonRequest['username']:($jsonRequest[1])?$jsonRequest[1]:'';
			$password = ($jsonRequest['password'])?$jsonRequest['password']:($jsonRequest[2])?$jsonRequest[2]:'';
			$options = ($jsonRequest['options'])?$jsonRequest['options']:($jsonRequest[3])?$jsonRequest[3]:NULL;
			$n_retries = ($jsonRequest['n_retries'])?$jsonRequest['n_retries']:($jsonRequest[4])?$jsonRequest[4]:1;
			$params = ($jsonRequest['params'])?$jsonRequest['params']:($jsonRequest[4])?$jsonRequest[4]:array('DISABLE_AUTHENTICATOR' => 'GSSAPI');
			
			
			$inbox = imap_open($mailbox, $username, $password, $options, $n_retries) or die('NO SE PUDO CONECTAR AL CORREO: ' . imap_last_error());
			
			$MC = imap_check($inbox);
			echo json_encode(imap_fetch_overview($inbox,"1:{$MC->Nmsgs}",0));
			
			imap_close($inbox);
		break;
		default:
		
		break;
	}
?>