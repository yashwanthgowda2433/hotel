<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Welcome extends BaseController {

	
	/**
     * This is default constructor of the class
	 * created by yashwanth
	 * Email : yashwanthgowda2433@gmail.com
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rooms_model');
		$this->load->model('BaseFare_model', "basefare");
    }

	/**
     * This is default constructor of the class
     */
	public function index()
	{
		$searchText = $this->input->post('searchText');
        $searchFloorId = $this->input->post('floorId');
        $searchRoomSizeId = $this->input->post('sizeId');
        $searchRoomId = $this->input->post('roomId');

        $data['searchText'] = $searchText;
        $data['searchFloorId'] = $searchFloorId;
        $data['searchRoomSizeId'] = $searchRoomSizeId;
        $data['searchRoomId'] = $searchRoomId;
        $data['roomSizes'] = $this->rooms_model->getRoomSizes();
        $data['floors'] = $this->rooms_model->getFloors();
            
        $this->load->library('pagination');
            
        $count = $this->rooms_model->roomListingCount($searchText, $searchFloorId, $searchRoomSizeId);

		$returns = $this->paginationCompress ( "index/", $count, 3);
            
        $data['roomRecords'] = $this->rooms_model->roomListing($searchText, $searchFloorId, $searchRoomSizeId, $searchRoomId, $returns["page"], $returns["segment"]);
            
		$this->load->view('include/header');
		$this->load->view('index',$data);
		$this->load->view('include/footer');
	}

	public function rooms()
	{
		$searchText = $this->input->post('searchText');
        $searchFloorId = $this->input->post('floorId');
        $searchRoomSizeId = $this->input->post('sizeId');
        $searchRoomId = $this->input->post('roomId');

        $data['searchText'] = $searchText;
        $data['searchFloorId'] = $searchFloorId;
        $data['searchRoomSizeId'] = $searchRoomSizeId;
        $data['roomSizes'] = $this->rooms_model->getRoomSizes();
        $data['floors'] = $this->rooms_model->getFloors();
        $data['searchRoomId'] = $searchRoomId;
            
        $this->load->library('pagination');
            
        $count = $this->rooms_model->roomListingCount($searchText, $searchFloorId, $searchRoomSizeId);

		$returns = $this->paginationCompress ( "rooms/", $count, 9);
            
        $data['roomRecords'] = $this->rooms_model->roomListing($searchText, $searchFloorId, $searchRoomSizeId, $searchRoomId, $returns["page"], $returns["segment"]);
            
		$this->load->view('include/header');
		$this->load->view('rooms',$data);
		$this->load->view('include/footer');
	}

	public function contact()
	{
		$this->load->view('include/header');
		$this->load->view('contact');
		$this->load->view('include/footer');
	}
	public function room_details($id=0)
	{
		$searchText = $this->input->post('searchText');
        $searchFloorId = $this->input->post('floorId');
        $searchRoomSizeId = $this->input->post('sizeId');
        $searchRoomId = $id;

		$data['searchText'] = $searchText;
        $data['searchFloorId'] = $searchFloorId;
        $data['searchRoomSizeId'] = $searchRoomSizeId;
        $data['roomSizes'] = $this->rooms_model->getRoomSizes();
        $data['floors'] = $this->rooms_model->getFloors();
        $data['searchRoomId'] = $searchRoomId;

		$this->load->library('pagination');
            
        $count = $this->rooms_model->roomListingCount($searchText, $searchFloorId, $searchRoomSizeId);

		$returns = $this->paginationCompress ( "rooms/", $count, 1);
            
        $data['roomRecords'] = $this->rooms_model->roomListing($searchText, $searchFloorId, $searchRoomSizeId, $searchRoomId, $returns["page"], $returns["segment"]);

		$this->load->view('include/header');
		$this->load->view('room_details',$data);
		$this->load->view('include/footer');
	}
}
