<section style="background-color: #eee;">
  <div class="container-fluid py-5">
    <div class="card">
      <div class="card-body">
        <div class="row d-flex justify-content-center pb-5">
          <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
            
            <h4>Payment</h4>
            <div class="d-flex pt-2">
              <div>
                <p>
                  <b>Total Payable Amount is <span class="text-success">₹<?php echo (((float)$this->session->userdata('roomRecords')->fareTotal)*(((int)$this->session->userdata('addRowArr'))+1))*((int)$this->session->userdata('days'));?></span></b>
                </p>
              </div>
              
            </div>
            <p>
              Hi <?php echo $this->session->userdata('name');?>, you've booked <?php echo ((int)$this->session->userdata('addRowArr'))+1;?> rooms, arrival date is <?php echo $this->session->userdata('arrival');?> and departure date is <?php echo $this->session->userdata('departure');?>, if you're agree please click on proceed payment.
            </p>
           
            <hr />
            <div class="pt-2">
              
              <input type="button" onclick="render()" value="Proceed to payment" class="btn btn-primary btn-block btn-lg" />
            </div>
          </div>

          <div class="col-md-5 col-xl-4 offset-xl-1">
            <div class="py-4 d-flex justify-content-end">
              <h6><a href="<?php echo base_url('room-details/'.$this->session->userdata('id'));?>">Cancel and return to website</a></h6>
            </div>
            <div class="rounded d-flex flex-column p-2" style="background-color: #f8f9fa;">
              <div class="p-2 me-3">
                <h4>Payment Details</h4>
              </div>
              <div class="p-2 d-flex">
                <div class="col-8">Number of Rooms Booking</div>
                <div class="ms-auto"><?php echo ((int)$this->session->userdata('addRowArr'))+1;?></div>
              </div>
              <div class="p-2 d-flex">
                <div class="col-8">Number of Days Staying</div>
                <div class="ms-auto"><?php echo ((int)$this->session->userdata('days'));?> days</div>
              </div>
              <div class="p-2 d-flex">
                <div class="col-8">Price Per Room</div>
                <div class="ms-auto">₹<?php echo ((float)$this->session->userdata('roomRecords')->baseFareDay);?></div>
              </div>
              <div class="p-2 d-flex">
                <div class="col-8">Tax(%)</div>
                <div class="ms-auto"><?php echo ((float)$this->session->userdata('roomRecords')->serviceTax);?></div>
              </div>
              <div class="p-2 d-flex">
                <div class="col-8">GST(%)</div>
                <div class="ms-auto"><?php echo ((float)$this->session->userdata('roomRecords')->serviceCharge);?></div>
              </div>
              <div class="p-2 d-flex">
                <div class="col-8">Discount(%)</div>
                <div class="ms-auto"></div>
              </div>
              
              <div class="border-top px-2 mx-2"></div>
              <div class="p-2 d-flex pt-3">
                <div class="col-8"><b>Total</b></div>
                <div class="ms-auto"><b class="text-success">₹<?php echo (((float)$this->session->userdata('roomRecords')->fareTotal)*(((int)$this->session->userdata('addRowArr'))+1))*((int)$this->session->userdata('days'));?></b></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://sdk.cashfree.com/js/ui/2.0.0/cashfree.sandbox.js"></script>
<script src="https://sdk.cashfree.com/js/ui/2.0.0/cashfree.prod.js"></script>
<script>
    const dropinConfig = {
                components: [
                    "order-details",
                    "card",
                    "netbanking",
                    "app",
                    "upi",
                ],
                onSuccess: function(data){
                   //on success
                },
                onFailure: function(data){
                   //on success
                },
                style: {
                      //to be replaced by the desired values
                      backgroundColor: "#ffffff",
                      color: "#11385b", 
                      fontFamily: "Lato",
                      fontSize: "14px",
                      errorColor: "#ff0000",
                      theme: "light",
                }
    }
    function render() {
  let paymentSessionId = "<?php echo $this->session->userdata('payment_session_id');?>";
  if (paymentSessionId == "") {
    // alert("No session_id specified");
    return
  };
const cf = new Cashfree("<?php echo $this->session->userdata('payment_session_id');?>");
  cf.redirect();
  };
</script>