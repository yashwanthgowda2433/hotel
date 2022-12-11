<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Booking_model 
 * Booking model to handle database operations related to room booking.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 29 Mar 2017
 */
class Booking_model extends CI_Model
{
    function addNewBooking($params=[])
    {
        $id = $this->generate_apiaccesskey();
        // if(!empty($params['bookingId']))
        // {
            $this->db->set('bookingId',$id);
        // }
        if(!empty($params['roomId']))
        {
            $this->db->set('roomId',$params['roomId']);
        }
        if(!empty($params['floorId']))
        {
            $this->db->set('floorId',$params['floorId']);
        }
        if(!empty($params['roomSizeId']))
        {
            $this->db->set('roomSizeId',$params['roomSizeId']);
        }
        if(!empty($params['arrival']))
        {
            $this->db->set('bookStartDate',$params['arrival']);
        }
        if(!empty($params['departure']))
        {
            $this->db->set('bookEndDate',$params['departure']);
        }
        if(!empty($params['roomId']))
        {
            $this->db->set('roomId',$params['roomId']);
        }
        if(!empty($params['customerId']))
        {
            $this->db->set('customerId',$params['customerId']);
        }
        $this->db->insert('ldg_bookings');
        // echo $this->db->last_query();exit;
        if($this->db->affected_rows()>0)
        {
            return $id;
        }else{
            return False;
        }

    }

    /**
	* Function to generate api access key for API access
	* @return string
	**/
	public function generate_apiaccesskey()
	{
		$date = new DateTime();
		$mobileaccess_key = sha1($date->getTimestamp());
		
		$this->db->where('	bookingId',$mobileaccess_key);
		$query = $this->db->get('ldg_bookings');
		$result = $query->num_rows();

		if(!empty($result) && $result > 0)
		{
			return $this->generate_apiaccesskey();
		}

		return $mobileaccess_key;
	}

    public function cancel($params=[])
    {
        if(!empty($params['id']))
        {
            $this->db->set('status',0);
            $this->db->where('bookingId',$params['id']);
            $this->db->update('ldg_bookings');
            if($this->db->affected_rows()>0)
            {
                return true;
            }else{
                return false;
            }
        }
    }

    function bookingCount($searchText, $searchRoomId, $searchFloorId, $searchRoomSizeId, $customerName, $mobileNumber)
    {
        $this->db->select('BaseTbl.bookingId, BaseTbl.customerId, BaseTbl.bookingDtm, BaseTbl.roomId,
                            BaseTbl.bookStartDate, BaseTbl.bookEndDate,
                            C.customerName, C.customerPhone, C.customerEmail,
                            R.roomNumber, R.roomSizeId, R.floorId, RS.sizeTitle, RS.sizeDescription,
                            F.floorName, F.floorCode');
        $this->db->from('ldg_bookings AS BaseTbl');
        $this->db->join('ldg_customer AS C', 'BaseTbl.customerId = C.customerId');
        $this->db->join('ldg_rooms AS R', 'BaseTbl.roomId = R.roomId');
        $this->db->join('ldg_room_sizes AS RS', 'RS.sizeId = R.roomSizeId', 'left');
        $this->db->join('ldg_floor AS F', 'F.floorId = R.floorId', 'left');
        $this->db->where('BaseTbl.isDeleted', 0);
        if(!empty($searchRoomId)){
            $this->db->where('R.roomId', $searchRoomId);
        }
        if(!empty($searchRoomSizeId)){
            $this->db->where('R.roomSizeId', $searchRoomSizeId);
        }
        if(!empty($searchFloorId)){
            $this->db->where('R.floorId', $searchFloorId);
        }
        if(!empty($customerName)){
            $this->db->like('C.customerName', $customerName);
        }
        if(!empty($mobileNumber)){
            $this->db->like('C.customerPhone', $mobileNumber);
        }
        $query = $this->db->get();
        
        return count($query->result());
    }

    function bookingListing($searchText, $searchRoomId, $searchFloorId, $searchRoomSizeId, $customerName, $mobileNumber, $page, $segment)
    {
        $this->db->select('BaseTbl.bookingId, BaseTbl.customerId, BaseTbl.bookingDtm, BaseTbl.roomId,
                            BaseTbl.bookStartDate, BaseTbl.bookEndDate, BaseTbl.bookingComments,
                            C.customerName, C.customerPhone, C.customerEmail,
                            R.roomNumber, R.roomSizeId, R.floorId, RS.sizeTitle, RS.sizeDescription,
                            F.floorName, F.floorCode');
        $this->db->from('ldg_bookings AS BaseTbl');
        $this->db->join('ldg_customer AS C', 'BaseTbl.customerId = C.customerId');
        $this->db->join('ldg_rooms AS R', 'BaseTbl.roomId = R.roomId');
        $this->db->join('ldg_room_sizes AS RS', 'RS.sizeId = R.roomSizeId', 'left');
        $this->db->join('ldg_floor AS F', 'F.floorId = R.floorId', 'left');
        $this->db->where('BaseTbl.isDeleted', 0);
        if(!empty($searchRoomId)){
            $this->db->where('R.roomId', $searchRoomId);
        }
        if(!empty($searchRoomSizeId)){
            $this->db->where('R.roomSizeId', $searchRoomSizeId);
        }
        if(!empty($searchFloorId)){
            $this->db->where('R.floorId', $searchFloorId);
        }
        if(!empty($customerName)){
            $this->db->like('C.customerName', $customerName);
        }
        if(!empty($mobileNumber)){
            $this->db->like('C.customerPhone', $mobileNumber);
        }
        $this->db->order_by('BaseTbl.bookingId', "DESC");
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();
        return $result;
    }

    /**
     * Get customer list by name
     * @param {string} $customerName : This is customer name
     */
    function getCustomersByName($customerName = '')
    {
        $this->db->select('customerId, customerName');
        $this->db->from('ldg_customer');
        $this->db->where('isDeleted', 0);
        if(!empty($customerName)) {
            $likeCriteria = "(customerName LIKE '%".$customerName."%')";
            $this->db->where($likeCriteria);
        }
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to add new floor to system
     * @param array $floorInfo : This is floor information
     * @return number $insert_id : This is last inserted id
     */
    function addedNewBooking($bookingInfo)
    {
        $this->db->trans_start();
        $this->db->insert('ldg_bookings', $bookingInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        
        return $insert_id;
    }

    function getAvailableRooms($startDate, $endDate, $floorId = '', $roomSizeId = '', $roomId = '')
    {
        $this->db->select('LB.roomId');
        $this->db->from('ldg_bookings AS LB');
        $this->db->where('LB.isDeleted', 0);
        $this->db->group_start()
				->group_start()
					->where('LB.bookStartDate >=', $startDate)
					->where('LB.bookEndDate <=', $endDate)
				->group_end()
                ->or_group_start()
                        ->where('LB.bookStartDate <=', $startDate)
                        ->where('LB.bookEndDate >=', $endDate)
                ->group_end()
				->or_group_start()
                        ->where('LB.bookStartDate <', $endDate)
                        ->where('LB.bookEndDate >=', $endDate)
                ->group_end()
        ->group_end();

        // pre('floor : '.$floorId);
        // pre('roomsize: '.$roomSizeId);
        // pre('room: '.$roomId);
        
        if($floorId != '' && $floorId != NULL) {
            $this->db->where('LB.floorId', $floorId);
        }
        if($roomSizeId != '' && $roomSizeId != NULL) {
            $this->db->where('LB.roomSizeId', $roomSizeId);
        }
        if($roomId != '' && $roomId != NULL) {
            $this->db->where('LB.roomId', $roomId);
        }
        $query = $this->db->get();
        $bookedRooms = [];

        // pre($this->db->last_query()); die;

        foreach ($query->result() as $row)
        {
            $bookedRooms[] = $row->roomId;
        }

        $query->free_result();

        $this->db->select('LR.roomId, LR.roomNumber, LR.roomSizeId, LR.floorId, LRS.sizeTitle, LRS.sizeDescription');
        $this->db->from('ldg_rooms AS LR');
        $this->db->join('ldg_room_sizes AS LRS', 'LRS.sizeId = LR.roomSizeId', 'left');
        $this->db->join('ldg_floor AS LF', 'LF.floorId = LR.floorId', 'left');
        $this->db->where('LR.isDeleted', 0);
        if(!empty($bookedRooms)) {
            $this->db->where_not_in('LR.roomId', $bookedRooms);
        }
        if($floorId != '' && $floorId != NULL) {
            $this->db->where('LR.floorId', $floorId);
        }
        if($roomSizeId != '' && $roomSizeId != NULL) {
            $this->db->where('LR.roomSizeId', $roomSizeId);
        }
        if($roomId != '' && $roomId != NULL) {
            $this->db->where('LR.roomId', $roomId);
        }
        $query2 = $this->db->get();

        return $query2->result();
    }

    /**
     * This method used to get single booking details
     * @param {number} $bookingId: This is booking id
     * @return {array} $row: Booking details
     */
    public function getBookingDetails($bookingId)
    {
        $this->db->select('LB.bookingId, LB.customerId, LC.customerName, LB.bookingDtm, LB.floorId, LB.roomSizeId, LB.roomId, LB.bookStartDate, LB.bookEndDate, LB.bookingComments');
        $this->db->from('ldg_bookings AS LB');
        $this->db->join('ldg_customer AS LC', 'LB.customerId = LC.customerId', 'left');
        $this->db->where('LB.isDeleted', 0);
        $this->db->where('LB.bookingId', $bookingId);

        $query = $this->db->get();

        return $query->row();
    }

    /**
     * This function is used to update booking details
     * @param {array} $bookingInfo : This is booking information
     * @param {number} $bookingId: This is booking id
     */
    function updateOldBooking($bookingInfo, $bookingId)
    {
        $this->db->where('bookingId', $bookingId);
        $this->db->update('ldg_bookings', $bookingInfo);
        
        return $this->db->affected_rows();
    }


    function checkRoomisBooked($params=[])
    {
        if(!empty($params['arrival']) && !empty($params['departure']) && !empty($params['roomId']))
        {
            $data = $this->db->query('select count(`ldg`.`bookingId`) as `counts` from `ldg_bookings` as `ldg` join `ldg_booked_rooms` as `ldg_book` ON `ldg`.`bookingId` =`ldg_book`.`ldg_booked_bookingid` WHERE (`ldg`.`bookStartDate`>="'.$params['arrival'].'" and `ldg`.`bookEndDate`<="'.$params['departure'].'") and `ldg_book`.`ldg_booked_roomid`='.$params['roomId'].'')->row();

            return $data->counts;
        }else{
            return 0;
        }
    }
}
