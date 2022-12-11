<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Bookedroom_model 
 * Booking model to handle database operations related to room booking.
 * @author : Yashwanth
 * @version : 1.1
 * @since : 03 Dec 2022
 */
class Bookedroom_model extends CI_Model
{
    function addNewBooking($params)
    {
        if(!empty($params['roomId']))
        {
            $this->db->set('ldg_booked_roomid',$params['roomId']);
        }
        if(!empty($params['customerId']))
        {
            $this->db->set('ldg_booked_customerid',$params['customerId']);
        }
        if(!empty($params['bookingId']))
        {
            $this->db->set('ldg_booked_bookingid',$params['bookingId']);
        }
        if(!empty($params['roomno']))
        {
            $this->db->set('ldg_booked_roomno',$params['roomno']);
        }
        if(!empty($params['no_of_adults']))
        {
            $this->db->set('ldg_booked_no_of_adults',$params['no_of_adults']);
        }
        if(!empty($params['no_of_childs']))
        {
            $this->db->set('ldg_booked_no_of_childs',$params['no_of_childs']);
        }
        if(!empty($params['child1_age']))
        {
            $this->db->set('ldg_booked_child_1age',$params['child1_age']);
        }
        if(!empty($params['child2_age']))
        {
            $this->db->set('ldg_booked_child_2age',$params['child2_age']);
        }
        $this->db->insert('ldg_booked_rooms');
        if($this->db->affected_rows()>0)
        {
            return $this->db->insert_id();
        }else{
            return False;
        }
        
    }
}
?>