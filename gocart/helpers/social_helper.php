<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_row_by_id'))
{

    function twitteroauth($date){
        $timestamp = strtotime($date);
        return strftime("%A", $timestamp);
    }
  
}

?>