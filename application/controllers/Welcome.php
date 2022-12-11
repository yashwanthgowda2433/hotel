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
		$this->load->model('Customer_model', "customer");
		$this->load->model('Booking_model', "booking");
		$this->load->model('Bookedroom_model', "booked");

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
        $data['controller'] = $this;           
            
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
        $this->params = $this->input->post();
        if(!empty($this->params['arrival']) && !empty($this->params['departure'])){
           $data['arrival'] = date('Y-m-d',strtotime($this->params['arrival']));
           $data['departure'] = date('Y-m-d',strtotime($this->params['departure']));
        }
        
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
        $data['controller'] = $this;           
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

        $data['id'] = $id;
            
        $data['roomRecords'] = $this->rooms_model->roomListing($searchText, $searchFloorId, $searchRoomSizeId, $searchRoomId, $returns["page"], $returns["segment"]);

		$this->load->view('include/header');
		$this->load->view('room_details',$data);
		$this->load->view('include/footer');
	}

    public function form_submit($id=0)
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

        $this->params = $this->input->post();
        $data['id'] = $id;
        $roomRecords = $this->rooms_model->roomListing($searchText, $searchFloorId, $searchRoomSizeId, $searchRoomId, $returns["page"], $returns["segment"]);
        $room_price = $roomRecords->fareTotal;
        $arrival_date = new DateTime(date('Y-m-d',strtotime($this->params['arrival'])));
        $departure_date = new DateTime(date('Y-m-d',strtotime($this->params['departure'])));
        $diff = $departure_date->diff($arrival_date)->format("%a");
        $rowArr = $this->params['addRowArr'];
        $total = (($rowArr+1)*$room_price)*$diff;

        $this->session->set_userdata('id',$id);
        $this->session->set_userdata('roomRecords',$roomRecords);

        $this->session->set_userdata('arrival',$this->params['arrival']);
        $this->session->set_userdata('departure',$this->params['departure']);
        $this->session->set_userdata('days',$diff);

        $this->session->set_userdata('addRowArr',$this->params['addRowArr']);


        for($i=0;$i<=$rowArr;$i++)
        {
            $this->session->set_userdata('room'.$i, $this->params['room'.$i]);
            $this->session->set_userdata('adult'.$i, $this->params['adult'.$i]);
            $this->session->set_userdata('child'.$i, $this->params['child'.$i]);
            if(isset($this->params['childage'.$i.'_1'])){
                $this->session->set_userdata('childage'.$i.'_1', $this->params['childage'.$i.'_1']);
            }else{
                $this->session->set_userdata('childage'.$i.'_1',"");
            }
            if(isset($this->params['childage'.$i.'_2'])){
                $this->session->set_userdata('childage'.$i.'_2', $this->params['childage'.$i.'_2']);
            }else{
                $this->session->set_userdata('childage'.$i.'_2', "");
            }
        }
        $this->session->set_userdata('selectcode',$this->params['selectcode']);
        $this->session->set_userdata('promocode',$this->params['promocode']);
        $this->session->set_userdata('option1',$this->params['option1']);
        $this->session->set_userdata('name',$this->params['name']);
        $this->session->set_userdata('email_user',$this->params['email']);

        $this->session->set_userdata('phone_no',$this->params['phone_no']);
        $name = $this->params['name'];
        $email = $this->params['email'];
        $phone_no = $this->params['phone_no'];


        $url = "https://api.cashfree.com/pg/orders";
        $clientID = "17932940145fdc5e5916d5d085923971";
        $secret = "c1833524eb6314e75bdf1c40a53ba2d7e5227542";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "x-api-version: 2022-09-01",
            "x-client-id: $clientID",
            "x-client-secret: $secret"
        ));
        $date = date('y'.'m'.'d'.'H'.'i'.'s');
        $data = json_encode([
            "order_id"=> "order_$date",
            "order_amount"=> "$total",
            "order_currency"=> "INR",
            "order_note"=> "Additional order info",
            "return_url"=> base_url('welcome/bookRoom'),
            "customer_details"=> [
                "customer_id"=> "$date",
                "customer_name"=> "$name",
                "customer_email"=> "$email",
                "customer_phone"=> "$phone_no"
            ]
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       

        $response = curl_exec($ch);
        $err = curl_error($ch);

        curl_close($ch);

       if ($err) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(array("error" => 1));
            echo "cURL Error #:" . $err;
             die();

        } else {
            $result = json_decode($response, true);
            header('Content-Type: application/json; charset=utf-8');
            // print_r($result);die;
            $output = array("payment_session_id" => $result["payment_session_id"]);
            $this->session->set_userdata('payment_session_id',$result["payment_session_id"]);

            redirect(base_url('room_booking'));
           

        }

        // if($this->bookRoom())
        // {
        //     $this->session->set_flashdata('success','Successfully Booked!');
        //     redirect('room-details/'.$id);

        // }else{
        //     $this->session->set_flashdata('error','Failed to book please try after sometime!');

        //     redirect('room-details/'.$id);
        // }

    }

    public function room_booking()
    {
            $this->load->view('include/header');
            $this->load->view('room_booking');
            $this->load->view('include/footer');
    }

    public function bookRoom()
    {
        $add_params['roomId'] = $this->session->userdata('id');
        $add_params['arrival'] = date('Y-m-d',strtotime($this->session->userdata('arrival')));
        $add_params['departure'] = date('Y-m-d',strtotime($this->session->userdata('departure')));
       
        $add_params['no_of_rooms_booked'] = $this->session->userdata('addRowArr');
        $add_params['selectcode'] = $this->session->userdata('selectcode');
        $add_params['promocode'] = $this->session->userdata('promocode');
        $add_params['option1'] = $this->session->userdata('option1');
        $add_params['name'] = $this->session->userdata('name');
        $add_params['email'] = $this->session->userdata('email_user');
        $add_params['floorId'] = $this->session->userdata('roomRecords')->floorId;
        $add_params['roomSizeId'] = $this->session->userdata('roomRecords')->roomSizeId;


        $add_params['phone_no'] = $this->session->userdata('phone_no');
        $customerId = $this->customer->addedNewCustomer($add_params);
        if($customerId)
        {
            $add_params['customerId'] = $customerId;
            $bookingId = $this->booking->addNewBooking($add_params);
            if($bookingId)
            {
                $add_params['bookingId'] = $bookingId;

                for($i=0;$i<=$add_params['no_of_rooms_booked'];$i++)
                {
                    $add_params['roomno'] = $this->session->userdata('room'.$i);
                    $add_params['no_of_adults'] = $this->session->userdata('adult'.$i);
                    $add_params['no_of_childs'] = $this->session->userdata('child'.$i);
                    if(!empty($this->session->userdata('childage'.$i.'_1'))){
                       $add_params['child1_age'] = $this->session->userdata('childage'.$i.'_1');
                    }
                    if(!empty($this->session->userdata('childage'.$i.'_2'))){
                       $add_params['child2_age'] = $this->session->userdata('childage'.$i.'_2');
                    }
                    $bookedid = $this->booked->addNewBooking($add_params);
                    

                }
                if($bookedid)
                {
                    $this->load->library('email'); 
                    $username = $add_params['name'];
                    $email = $add_params['email'];
                    $phone_no = $add_params['phone_no'];


	                $message1 = 'Hi '.$username.',

	                <p style="margin-top:15px;font-size:15px;">you`ve booked '.(((int)$this->session->userdata('addRowArr'))+1).' '.$this->session->userdata('roomRecords')->sizeTitle.' rooms, arrival date is '.date('d-m-Y',strtotime($this->session->userdata('arrival'))).' and departure date is '.date('d-m-Y',strtotime($this->session->userdata('departure'))).'</p>
	                <div class="rounded d-flex flex-column p-2" style="max-width:400px;margin:auto;background-color: #f8f9fa;display: block;flex-direction: column;border-radius: 0.25rem !important;padding: 0.5rem !important;">
                        <div class="p-2 me-3" style="padding: 0.5rem !important;margin-right: 1rem !important;">
                            <h4 style="font-size: 22px;font-weight: 700;">Payment Details</h4>
                        </div>
                        <div class="p-2 d-flex" style="padding: 0.5rem !important;display: flex !important;">
                            <div class="col-8" style="flex: 0 0 auto;width: 66.6666666667%;">Number of Rooms Booking</div>
                            <div class="ms-auto" style="margin-left: auto !important;">'.(((int)$this->session->userdata('addRowArr'))+1).'</div>
                        </div>
                        <div class="p-2 d-flex" style="padding: 0.5rem !important;display: flex !important;">
                            <div class="col-8" style="flex: 0 0 auto;width: 66.6666666667%;">Number of Days Staying</div>
                            <div class="ms-auto" style="margin-left: auto !important;">'.((int)$this->session->userdata('days')).' days</div>
                        </div>
                        <div class="p-2 d-flex" style="padding: 0.5rem !important;display: flex !important;">
                            <div class="col-8" style="flex: 0 0 auto;width: 66.6666666667%;">Price Per Room</div>
                            <div class="ms-auto" style="margin-left: auto !important;">₹'.((float)$this->session->userdata('roomRecords')->baseFareDay).'</div>
                        </div>
                        <div class="p-2 d-flex" style="padding: 0.5rem !important;display: flex !important;">
                            <div class="col-8" style="flex: 0 0 auto;width: 66.6666666667%;">Tax(%)</div>
                            <div class="ms-auto" style="margin-left: auto !important;">'.((float)$this->session->userdata('roomRecords')->serviceTax).'</div>
                        </div>
                        <div class="p-2 d-flex" style="padding: 0.5rem !important;display: flex !important;">
                            <div class="col-8" style="flex: 0 0 auto;width: 66.6666666667%;">GST(%)</div>
                            <div class="ms-auto" style="margin-left: auto !important;">'.((float)$this->session->userdata('roomRecords')->serviceCharge).'</div>
                        </div>
                        <div class="p-2 d-flex" style="padding: 0.5rem !important;display: flex !important;">
                            <div class="col-8" style="flex: 0 0 auto;width: 66.6666666667%;">Discount(%)</div>
                            <div class="ms-auto" style="margin-left: auto !important;"></div>
                        </div>
              
                        <div class="border-top px-2 mx-2" style="border-top: 1px solid #dee2e6 !important;padding-right: 0.5rem !important;padding-left: 0.5rem !important;margin-right: 0.5rem !important;margin-left: 0.5rem !important;"></div>
                        <div class="p-2 d-flex pt-3" style="padding: 0.5rem !important;display: flex !important;">
                            <div class="col-8" style="flex: 0 0 auto;width: 66.6666666667%;"><b>Total</b></div>
                            <div class="ms-auto" style="margin-left: auto !important;"><b class="text-success">₹'.(((float)$this->session->userdata('roomRecords')->fareTotal)*(((int)$this->session->userdata('addRowArr'))+1))*((int)$this->session->userdata('days')).'</b></div>
                        </div>
                    </div>
                    <p style="margin-top:20px;margin-bottom:20px;">click <a href="'.base_url('cancel/'.$bookingId).'">here</a> to cancel. your amount will be refunded with in 2 working days.</p>
                    <h1 style="color:#666;font-size:17px;margin-top:50px;">Thanks for using AtFingerTip!</h1>
                    <div style="display:flex;border:1px solid transparent;width:max-content;"><img src='.base_url('assets/images/logo1.png').' style="width:100px;"></div>';
   


                    $config1=array(
	                    'charset'=>'utf-8',
	                    'wordwrap'=> TRUE,
	                    'mailtype' => 'html'
	                );

                    $this->email->initialize($config1);
                    $this->email->from('info@atfinfertip.in', 'AtFingerTip'); 
                    $this->email->to($email);
                    // $this->email->cc('support@3dcopilot.com');
	                $this->email->subject('Booking Confirmed!'); 
   
	                $this->email->message($message1); 
                    //  $this->email->attach(base_url('resources/copilot_black.png'), 'inline');
	                //send mail
	                $this->email->send();
                    
                    return True;
                }

            }else{
                return False;
            }
        }else{
            return False;

        }
        


    }

    public function checkRoomBookedCounts($params=[])
    {
        $count = $this->booking->checkRoomisBooked($params);
        // echo $count;
        return $count;

    }

    public function cancel($id)
    {
        $data['id'] = $id;
        $this->load->view('include/header');
        $this->load->view('cancel',$data);
        $this->load->view('include/footer');
    }

    public function confrim_cancel($id)
    {
        $params['id'] = $id;
        $params['status']=0;
        $update = $this->booking->cancel($params);
        if($update){
           $data['id'] = $id;
           $this->load->view('include/header');
           $this->load->view('confirmcancel',$data);
           $this->load->view('include/footer');
        }else{

        }
    }
}
