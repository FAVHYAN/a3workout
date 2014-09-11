<?php 
session_start();

class Social extends Front_Controller {
  
  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
      show_404();
  }

  function twitter($oauth_token = false, $oauth_verifier = false){

  	$this->load->library('twitteroauth');
  	
  	if ($oauth_token && $oauth_verifier) {
  		
  		$SESS_oauth_token 			= $this->session->userdata('oauth_token');
  		$SESS_oauth_token_secret 	= $this->session->userdata('oauth_token_secret');
  		
  		if (!empty($oauth_verifier) && !empty( $SESS_oauth_token ) && !empty( $SESS_oauth_token_secret )) {
  			define('consumer_key', 'O2hCjoSYsNWChouK6OqzA');
  			define('consumer_secret', 'QKovcnhrt9K7FK5iApVy37CoC4cIPsP1HSKILLIR8');
  			
  			$connection = $this->twitteroauth->create(consumer_key, consumer_secret, $SESS_oauth_token, $SESS_oauth_token_secret);
  			echo $access_token = $connection->getAccessToken($oauth_verifier, $oauth_token, $oauth_verifier);
  			$content = $connection->get('account/verify_credentials');
  			
  			print_r($content);
  			exit;
  		}
  		
  	}else {
  		
	  	define('consumer_key', 'O2hCjoSYsNWChouK6OqzA');
	  	define('consumer_secret', 'QKovcnhrt9K7FK5iApVy37CoC4cIPsP1HSKILLIR8');
	  	define('access_token', '2216009486-mD9Ysx7MNjMbigRg5nkiAwME2tGdgmFovqOwQcT');
	  	define('access_token_secret', 'CKBmo0RR5NhSyFqV7N9A5jad6xtnOlQn0aWIgDsLbq0cS');
	  	
	  	$connection = $this->twitteroauth->create(consumer_key, consumer_secret);
	  	$request_token = $connection->getRequestToken('http://www.a3workout.com/getTwitterData.php');
		
	  	$this->session->set_userdata('oauth_token', "132253911-5P9lAKSwzJFHVza3hEVfaJhZ6txZwJouZcTj2LUr");
	  	$this->session->set_userdata('oauth_token_secret', "nFS6EEsZVgbatXL82GlNbUXM19slS9UiqAcS1Jw8M");
	  	
	  	if ($connection->http_code == 200) {
	  		// Let's generate the URL and redirect
	  		$url = $connection->getAuthorizeURL($request_token['oauth_token']);
	  		header('Location: ' . $url);
	  	} else {
	  		// It's a bad idea to kill the script, but we've got to know when there's an error.
	  		die('Something wrong happened.');
	  	}
  	}
  }


}
?>