<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_row_by_id'))
{

    function get_day_name($date){
        $timestamp = strtotime($date);
        return strftime("%A", $timestamp);
    }

    function get_month_name($month_number){
        switch ($month_number) {
            case 1:
                return "January";
                break;
            case 2:
                return "Febrary";
                break;
            case 3:
                return "March";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "June";
                break;
            case 7:
                return "July";
                break;
            case 8:
                return "August";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "October";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Dicember";
                break;
            
            default:
                return "No selected";
                break;
        }
    }

    function get_age($birth_date)
    {
        return floor((time() - strtotime($birth_date))/31556926);
    }
    
    function get_row_by_id($table, $id)
    {
        $CI=& get_instance();

        if ( isset($table) OR isset($table) )
        {
            return $CI->db->get_where($table, array('id' => $id))->result();//
        }

        return false;
    }

    function get_row_where($table, $where=false)
    {
        $CI=& get_instance();

        if ( isset($table) OR isset($table) )
        {
            return $CI->db->get_where($table, $where)->result();//
        }

        return false;
    }
	
}

?>