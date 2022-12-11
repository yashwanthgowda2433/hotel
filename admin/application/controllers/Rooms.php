<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Rooms extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rooms_model');
        $this->isLoggedIn();   
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        redirect("roomListing");
    }

    /**
     * This function is used to load the rooms list
     */
    function roomListing()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $searchText = $this->input->post('searchText');
            $searchFloorId = $this->input->post('floorId');
            $searchRoomSizeId = $this->input->post('sizeId');
            $data['searchText'] = $searchText;
            $data['searchFloorId'] = $searchFloorId;
            $data['searchRoomSizeId'] = $searchRoomSizeId;
            $data['roomSizes'] = $this->rooms_model->getRoomSizes();
            $data['floors'] = $this->rooms_model->getFloors();
            
            $this->load->library('pagination');
            
            $count = $this->rooms_model->roomListingCount($searchText, $searchFloorId, $searchRoomSizeId);

			$returns = $this->paginationCompress ( "roomListing/", $count, 6 );
            
            $data['roomRecords'] = $this->rooms_model->roomListing($searchText, $searchFloorId, $searchRoomSizeId, $returns["page"], $returns["segment"]);
            
            $this->global['pageTitle'] = ' : Room Listing';
            
            $this->loadViews("rooms/roomIndex", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNewRoom()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
        	$data['roomSizes'] = $this->rooms_model->getRoomSizes();
        	$data['floors'] = $this->rooms_model->getFloors();

            $this->global['pageTitle'] = ' : Add New Room';

            $this->loadViews("rooms/addNewRoom", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to add new room to the system
     */
    function addedNewRoom()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('floorId','Floor','required');
            $this->form_validation->set_rules('sizeId','Room Size','required');
            $this->form_validation->set_rules('roomNumber','Room Number','trim|required');
            $this->form_validation->set_rules('file','Upload Images','callback_file_check');
            $this->form_validation->set_rules('no_of_adults','Number of Adults','required|regex_match[/^[0-9]{1}$/]');
            $this->form_validation->set_rules('no_of_childs','Number of Childs','required|regex_match[/^[0-9]{1}$/]');

            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewRoom();
            }
            else
            {
                $floorId = $this->security->xss_clean($this->input->post('floorId'));
                $sizeId = $this->security->xss_clean($this->input->post('sizeId'));
                $roomNumber = $this->security->xss_clean($this->input->post('roomNumber'));
                $adults = $this->security->xss_clean($this->input->post('no_of_adults'));
                $childs = $this->security->xss_clean($this->input->post('no_of_childs'));
                $no_of_rooms = $this->security->xss_clean($this->input->post('no_of_rooms'));

                $datetime = strtotime(date('Y-m-d H:i:s'));
                $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/jpg','image/JPEG', 'image/JPG', 'image/PNG');
                mkdir("images/".$datetime);
                $img_arr = array();
                foreach($_FILES["file"]["tmp_name"] as $key=>$tmp_name) {
                    $file_name=$_FILES["file"]["name"][$key];
                    $file_tmp=$_FILES["file"]["tmp_name"][$key];
                    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                    $mime = get_mime_by_extension($_FILES['file']['name'][$key]);
                
                    if(in_array($mime,$allowed_mime_type_arr)) {
                        if(!file_exists("images/".$datetime."/".$file_name)) {
                            move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"][$key],"images/".$datetime."/".$file_name);
                            array_push($img_arr,"images/".$datetime."/".$file_name);
                        }
                        else {

                            $filename=basename($file_name,$ext);
                            $newFileName=$filename.time().".".$ext;
                            move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"][$key],"images/".$datetime."/".$newFileName);
                            array_push($img_arr,"images/".$datetime."/".$newFileName);

                        }
                    }
                    else {

                        array_push($error,"$file_name, ");
                    }
                }
                
                $roomInfo = array('floorId'=>$floorId, 'roomSizeId'=>$sizeId, 'roomNumber'=>$roomNumber, 'images'=>json_encode($img_arr),'no_of_rooms'=>$no_of_rooms, 'no_of_adults'=>$adults,'no_of_childs'=>$childs,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:sa'));
                
                $result = $this->rooms_model->addedNewRoom($roomInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Room created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Room creation failed');
                }
                
                redirect('addNewRoom');
            }
        }
    }

    /**
     * This function is used to validate uploaded file
     */
    public function file_check($str)
    {
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/jpg','image/JPEG', 'image/JPG', 'image/PNG');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!="")
        {
            foreach($_FILES["file"]["tmp_name"] as $key=>$tmp_name) {
                $mime = get_mime_by_extension($_FILES['file']['name'][$key]);


                if(in_array($mime, $allowed_mime_type_arr))
                {
                    return TRUE;
                }
                else
                {
                    $this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
                    return FALSE;
                }
            }
        }
        else
        {
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return FALSE;
        }
    }

    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOldRoom($roomId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($roomId == null)
            {
                redirect('roomListing');
            }

            $data['floors'] = $this->rooms_model->getFloors();
            $data['roomSizes'] = $this->rooms_model->getRoomSizes();
            
            $data['roomInfo'] = $this->rooms_model->getRoomInfo($roomId);
            
            $this->global['pageTitle'] = ' : Edit Room';
            
            $this->loadViews("rooms/editOldRoom", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to edit the user information
     */
    function updateOldRoom()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $roomId = $this->input->post('roomId');

            $this->form_validation->set_rules('floorId','Floor','required');
            $this->form_validation->set_rules('sizeId','Room Size','required');
            $this->form_validation->set_rules('roomNumber','Room Number','trim|required');
            $this->form_validation->set_rules('no_of_adults','Number of Adults','required|regex_match[/^[0-9]{1}$/]');
            $this->form_validation->set_rules('no_of_childs','Number of Childs','required|regex_match[/^[0-9]{1}$/]');

            if($this->form_validation->run() == FALSE)
            {
                $this->editOldRoom($roomSizeId);
            }
            else
            {                
                $floorId = $this->security->xss_clean($this->input->post('floorId'));
                $sizeId = $this->security->xss_clean($this->input->post('sizeId'));
                $roomNumber = $this->security->xss_clean($this->input->post('roomNumber'));
                $adults = $this->security->xss_clean($this->input->post('no_of_adults'));
                $childs = $this->security->xss_clean($this->input->post('no_of_childs'));
                $no_of_rooms = $this->security->xss_clean($this->input->post('no_of_rooms'));

                $imgarray = json_decode($this->input->post('imgarr'));
                
                if(isset($_FILES['file']['name']) && $_FILES['file']['name']!="")
                {
                   
                    $allowed_mime_type_arr = array('image/gif','image/jpeg','image/png','image/jpg','image/JPEG', 'image/JPG', 'image/PNG');
                    $datetime = strtotime(date('Y-m-d H:i:s'));
                    mkdir("images/".$datetime);
                    $img_arr = array();
                    foreach($_FILES["file"]["tmp_name"] as $key=>$tmp_name) {
                        $file_name=$_FILES["file"]["name"][$key];
                        $file_tmp=$_FILES["file"]["tmp_name"][$key];
                        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                        $mime = get_mime_by_extension($_FILES['file']['name'][$key]);
                
                        if(in_array($mime,$allowed_mime_type_arr)) {
                            if(!file_exists("images/".$datetime."/".$file_name)) {
                                move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"][$key],"images/".$datetime."/".$file_name);
                                array_push($img_arr,"images/".$datetime."/".$file_name);
                            }
                            else {

                                $filename=basename($file_name,$ext);
                                $newFileName=$filename.time().".".$ext;
                                move_uploaded_file($file_tmp=$_FILES["file"]["tmp_name"][$key],"images/".$datetime."/".$newFileName);
                                array_push($img_arr,"images/".$datetime."/".$newFileName);

                            }
                        }
                        else {

                            array_push($error,"$file_name, ");
                        }
                    }
                    if(count($img_arr)>0){
                        // for($i=0;$i<count($imgarray);$i++){
                        //     unlink($imgarray[$i]);
                        // }
                        $roomInfo = array('floorId'=>$floorId, 'roomSizeId'=>$sizeId, 'roomNumber'=>$roomNumber, 'images'=>json_encode($img_arr), 'no_of_rooms'=>$no_of_rooms, 'no_of_adults'=>$adults,'no_of_childs'=>$childs,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:sa'));
                    }else{
                        $roomInfo = array('floorId'=>$floorId, 'roomSizeId'=>$sizeId, 'roomNumber'=>$roomNumber,'no_of_adults'=>$adults, 'no_of_rooms'=>$no_of_rooms, 'no_of_childs'=>$childs,'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:sa'));
                    }
                    
                }else{
                    $roomInfo = array('floorId'=>$floorId, 'roomSizeId'=>$sizeId, 'roomNumber'=>$roomNumber,'no_of_adults'=>$adults,'no_of_childs'=>$childs, 'no_of_rooms'=>$no_of_rooms,
                    'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:sa'));
                }
                
                $result = $this->rooms_model->updateOldRoom($roomInfo, $roomId);
                
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Room updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Room updation failed');
                }

                redirect('roomListing');
            }
        }
    }

    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteRoom()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $roomId = $this->input->post('roomId');
            $roomInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:sa'));
            
            $result = $this->rooms_model->deleteRoom($roomId, $roomInfo);
            
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }
}