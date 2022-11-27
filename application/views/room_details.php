<section class="section-padding" style="padding-top:40px">
    <div class="auto-container">
        <div class="row">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6"></div>
                <div class="col-lg-3"></div>

            </div>
            <div class="containerss">
                <div class="feature">
                    <figure class="featured-item image-holder r-3-2 transition"></figure>
                </div>
                <div class="gallery-wrapper">
                    <div class="gallery"> <?php 
                    $imgarr = json_decode($roomRecords->images);
                    for($i=0;$i<count($imgarr);$i++){
                        if($i==0){?> 
                        <div class="item-wrapper">
                            <figure class="gallery-item image-holder r-3-2 active transition"></figure>
                        </div> <?php }else{?> <div class="item-wrapper">
                            <figure class="gallery-item image-holder r-3-2 transition"></figure>
                        </div> <?php 
                        }
                    }?> 
                    </div>
                </div>
                <div class="controls"> <button class="move-btn left">&larr;</button> <button class="move-btn right">&rarr;</button> </div>
            </div>
            <div class="col-lg-12 pe-lg-35">
                <div class="single-post"> <span class="section_heading_title_small">FROM ₹ <?php echo $roomRecords->baseFareDay;?> </span>
                    <h2 class="mb_40"> <?php echo $roomRecords->sizeTitle;?> </h2>
                    <div class="hotel-booking-form-1 gray-bg">
                        <div class="auto-container">
                            <div class="section_heading text-center mb_55">
                                <!-- <span class="section_heading_title_small">Discover</span> -->
                                <h2 class="section_heading_title_big"></h2>
                            </div>
                            <div class="hotel-booking-form-1-wrap">
                                <form class="row" action="<?php echo base_url('rooms');?>" method="POST">
                                    <!-- <p class="hotel-booking-form-1-label text-lg-center">ARRIVAL:</p><div class="input-group"><span class="input-group-addon"><i class="far fa-calendar-alt"></i></span><input id="email" type="text" class="form-control" name="email" placeholder="Email"></div> -->
                                    <div class="row-1">
                                        <div class="col-lg-6 col-md-6">
                                            <p class="hotel-booking-form-1-label text-lg-center">ARRIVAL:</p>
                                            <div class="input-group form-group"> <span class="input-group-addon"> <i class="far fa-calendar-alt"></i> </span> <input placeholder="17 Sep, 2022" class="form-control" type="text" name="form-name" id="nd_booking_archive_form_date_range_from" value=""> </div> <!-- <div class="form-group"><input placeholder="17 Sep, 2022" class="" type="text" name="form-name" id="nd_booking_archive_form_date_range_from" value="" /></div> -->
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <p class="hotel-booking-form-1-label text-lg-center">DEPARTURE:</p>
                                            <div class="input-group form-group"> <span class="input-group-addon"> <i class="far fa-calendar-alt"></i> </span> <input placeholder="21 Sep, 2022" class="form-control" type="text" name="form-name" id="nd_booking_archive_form_date_range_to" value="" /> </div> <!-- <div class="form-group"><p class="hotel-booking-form-1-label text-lg-center">DEPARTURE:</p><input placeholder="21 Sep, 2022" class="" type="text" name="form-name" id="nd_booking_archive_form_date_range_to" value="" /></div> -->
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="addRowArr" id="addRowArr" value="0"/>
                                    <div class="row" id="appendRow">
                                        <div class="row-2" id="appendRowArr0">
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <p class="hotel-booking-form-1-label text-lg-center">Rooms:</p>
                                                    <div class="input-group form-group"> 
                                                        <span class="input-group-addon-2"> <i class="fas fa-bed"></i> </span> 
                                                        <select class="form-control" name="room0">
                                                            <option value="1" data-display="1 Room">1 Room</option>
                                                            
                                                        </select> </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <p class="hotel-booking-form-1-label text-lg-center">Adults:</p>
                                                    <div class="input-group form-group"> 
                                                        <span class="input-group-addon-2"> <i class="fas fa-user-alt"></i> </span> 
                                                        <select class="form-control" name="adult0">
                                                            <?php 
                                                            $val = $roomRecords->no_of_adults;
                                                            for($i=1;$i<=$val;$i++){
                                                                if($i==1){
                                                                    echo '<option value="'.$i.' Adult" data-display="'.$i.' Adult">'.$i.' Adult</option>';
                                                                }else{
                                                                    echo '<option value="'.$i.' Adults">'.$i.' Adults</option>';
                                                                }
                                                            }
                                                            ?>
                                                            
                                                        </select> </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <p class="hotel-booking-form-1-label text-lg-center">Child:</p>
                                                    <div class="input-group form-group"> 
                                                        <span class="input-group-addon-2"> <i class="fas fa-child"></i> </span> 
                                                        <select class="form-control childdropdown" onchange="setMyValue(this.value,0)" name="child0">
                                                            <option value="0" data-display="0 Child">0 Child</option>

                                                        <?php 
                                                            $val = $roomRecords->no_of_childs;
                                                            for($i=1;$i<=$val;$i++){
                                                                if($i==1){
                                                                    echo '<option value="'.$i.'">'.$i.' Child</option>';
                                                                }else{
                                                                    echo '<option value="'.$i.'">'.$i.' Childrens</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select> </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-lg-12 col-md-12 mt-4">
                                        <div class="form-group" style="text-align: right;"> 
                                            <div onclick="addRow()" class="btn-1" style="padding: 7px 10px;cursor:pointer;">Add <span></span> </div> 
                                            <div onclick="deleteRow()" class="btn-1" style="padding: 7px 10px;cursor:pointer;background: #fff;color: var(--theme-color);border: 2px solid var(--theme-color);">Delete <span></span> </div> 
                                        
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="row-2" id="appendRowArr0">

                                            <div class="col-lg-6 col-md-6" style="width:max-content;">
                                                <div class="form-group" style="width:max-content;">
                                                    <p class="hotel-booking-form-1-label text-lg-center">SPECIAL CODES OR RATES</p>
                                                    <div class="input-group form-group"> 
                                                    <span class="input-group-addon-2"> <i class="fas fa-tag"></i> </span> 
                                                        <select class="form-control childdropdown" name="childage`">
                                                            <option>None</option>
                                                            <option value="">Promo Code</option>
                                                            <option value="">Corporate Code</option>
                                                            <option value="">Coupon Code</option>
                                                            <option value="">Group Code</option>
                                                            <option value="">Agent ID</option>
                                                            
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                          <div class="col-lg-6 col-md-6" style="width:max-content;">
                                            <div class="form-group">
                                                 <p class="hotel-booking-form-1-label text-lg-center"> &nbsp;</p>
                                                 <div class="input-group form-group"> 
                                                    <input type="text" class="form-group" name="promocode" placeholder="Enter Code"/>
                                                </div>
                                            </div>

                                          </div>
                                        </div>

                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 mt-4">
                                        <div class="form-group" style="text-align: center;"> <button type="submit" class="btn-1">Book Now <span></span> </button> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- <p class="mt_20 mb_20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nisl turpis cum tempor vitae. Curabitur at amet, enim sit commodo semper lectus phasellus. Non egestas ultrices magna gravida est sociis non ornare bibendum. tellus Dignissim ornare metus, interdum et, tellus justo. Urna libero, in scelerisque porttitor et, sagittis, et ut. Eget quam at at etiam accumsan integer facilisi justo. Lorem ut tempus cursus fames ultrices nisl, laoreet tortor, blandit. Leo diam, donec pretium, massa pellentesque et eleifend ut. Porta proin malesuada volutpat purus. </p><p class="mb_40">At quam ac ipsum volutpat non. Duis sagittis, sollicitudin eget tristique consectetur et facilisi. Viverra sit non sed orci magna venenatis. Magna pharetra non ornare lectus sed risus maecenas adipiscing. Cras pretium vivamus nunc posuere.</p><div class="mb_60"><img src="assets/images/resource/room-17.jpg" alt=""></div> -->
                    <h3 class="fs_40 mb_30">Amenities</h3> <!-- <p class="mb_50">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing integer ultrices suspendisse varius etiam est. Est, felis, tempus nec vitae orci sodales Metus, velit nec at diam in sed. Massa dui ipsum ornare sagittis dolor sagittis amet odio est. Sit semper et velit fusce.</p> -->
                    <div class="row mb_30">
                        <div class="col-md-4 col-sm-6 mb_45">
                            <div class="d-flex align-items-center"> <i class="icon-8 theme-color fs_40 w_55 mr_25"></i>
                                <p class="fw_medium mb_0">Fast wifi</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb_45">
                            <div class="d-flex align-items-center"> <i class="icon-9 theme-color fs_40 w_55 mr_25"></i>
                                <p class="fw_medium mb_0">Coffee</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb_45">
                            <div class="d-flex align-items-center"> <i class="icon-10 theme-color fs_40 w_55 mr_25"></i>
                                <p class="fw_medium mb_0">Bath</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb_45">
                            <div class="d-flex align-items-center"> <i class="icon-11 theme-color fs_40 w_55 mr_25"></i>
                                <p class="fw_medium mb_0">Parking Space​</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb_45">
                            <div class="d-flex align-items-center"> <i class="icon-12 theme-color fs_40 w_55 mr_25"></i>
                                <p class="fw_medium mb_0">Swimming Pool</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb_45">
                            <div class="d-flex align-items-center"> <i class="icon-14 theme-color fs_40 w_55 mr_25"></i>
                                <p class="fw_medium mb_0">Breakfast</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb_45">
                            <div class="d-flex align-items-center"> <i class="icon-15 theme-color fs_40 w_55 mr_25"></i>
                                <p class="fw_medium mb_0">Spa & Wellness</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb_45">
                            <div class="d-flex align-items-center"> <i class="icon-16 theme-color fs_40 w_55 mr_25"></i>
                                <p class="fw_medium mb_0">Meeting Room</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb_45">
                            <div class="d-flex align-items-center"> <i class="icon-17 theme-color fs_40 w_55 mr_25"></i>
                                <p class="fw_medium mb_0">Drink</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <h3 class="fs_40 mb_30"></h3> --> <?php echo $roomRecords->sizeDescription;?>
                        </div>
                    </div>
                    <h3 class="fs_40 mb_30">Hotel Rules</h3> <!-- <p class="mb_30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing integer ultrices suspendisse varius etiam est. Est, felis, tempus nec vitae orci sodales Metus, velit nec at diam in sed. Massa dui ipsum ornare sagittis dolor sagittis amet odio est. Sit semper et velit fusce.</p> -->
                    <ul class="list-2 mb_70">
                        <li> <i class="icon-23"></i>Check-in: 3:00 PM - 9:00 PM </li>
                        <li> <i class="icon-23"></i>Check-ouy: 10:30 AM </li>
                        <li> <i class="icon-23"></i>No Pets </li>
                        <li> <i class="icon-23"></i>No Smoking </li>
                    </ul> <!-- <h3 class="fs_40 mb_30">Cancellation</h3><p class="mb_70">Est felis tempus nec vitae orci sodales Metus, velit nec at diam in sed. Massa dui ipsum ornare sagittis dolor sagittis amet odio est. Sit semper et velit fusce.</p><h3 class="fs_40 mb_30">Location</h3><p class="mb_30">Est felis tempus nec vitae orci sodales Metus, velit nec at diam in sed. Massa dui ipsum ornare sagittis dolor sagittis amet odio est. Sit semper et velit fusce.</p><div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55945.16225505631!2d-73.90847969206546!3d40.66490264739892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1601263396347!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0; width: 100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div> -->
                </div>
            </div> <!-- <div class="col-lg-4"><div class="widget mb_40 gray-bg p_40"><h4 class="mb_20">Your Reservation</h4><div class="booking-form-3"><form class="hotel-booking-form-1-form d-block"><div class="form-group"><p class="hotel-booking-form-1-label">Check - in:</p><input placeholder="17 Sep, 2022" class="" type="text" name="form-name" id="nd_booking_archive_form_date_range_from" value="" /></div><div class="form-group"><p class="hotel-booking-form-1-label">Check - Out:</p><input placeholder="21 Sep, 2022" class="" type="text" name="form-name" id="nd_booking_archive_form_date_range_to" value="" /></div><div class="form-group"><p class="hotel-booking-form-1-label">Rooms:</p><select><option data-display="1 Room">1 Room</option><option value="2 Rooms">2 Rooms</option><option value="3 Rooms">3 Rooms</option><option value="4 Rooms">4 Rooms</option><option value="5 Rooms">5 Rooms</option></select></div><div class="form-group"><p class="hotel-booking-form-1-label">Adults:</p><select><option data-display="2 Adults">2 Adults</option><option value="1 Adult">1 Adult</option><option value="3 Adults">3 Adults</option><option value="4 Adults">4 Adults</option><option value="5 Adults">5 Adults</option></select></div><div class="form-group mb_50"><p class="hotel-booking-form-1-label">Child:</p><select><option data-display="1 Children">1 Children</option><option value="0 Children">0 Children</option><option value="2 Childrens">2 Childrens</option><option value="3 Childrens">3 Childrens</option><option value="4 Childrens">4 Childrens</option><option value="5 Childrens">5 Childrens</option></select></div><div class="form-group mt-5"><h4 class="mb_20">Extra Services</h4><div class="d-flex align-items-center justify-content-between"><p><input type="checkbox" name="vehicle1" value="Bike"> Cleaning Fee</p><p>$9.0</p></div><div class="d-flex align-items-center justify-content-between"><p><input type="checkbox" name="vehicle1" value="Bike"> Free</p><p>$9.0</p></div><div class="d-flex align-items-center justify-content-between"><p><input type="checkbox" name="vehicle1" value="Bike"> Parking</p><p>$7.0</p></div></div><div class="form-group mt-4"><div class="d-flex align-items-center justify-content-between"><h4 class="mb_20">Your Price</h4><p>$9.0</p></div></div><div class="form-group mb-0"><button type="submit" class="btn-1">Book Now<span></span></button></div></form></div></div></div> -->
        </div>
    </div>
</section> <!-- Room -->
<!-- <section class="section-padding pt-0"><div class="auto-container"><div class="section_heading mb_55"><h2 class="section_heading_title_big">Related Rooms</h2></div><div class="row"><div class="col-lg-4 col-md-6"><div class="room-1-block wow fadeInUp" data-wow-delay=".2s" data-wow-duration=".8s"><div class="room-1-image hvr-img-zoom-1"><img src="assets/images/resource/room-1.jpg" alt=""></div><div class="room-1-content"><p class="room-1-meta-info">Start from <span class="theme-color">$55.0</span>/night</p><div class="room-1-rating"><i class="icon-6"></i><i class="icon-6"></i><i class="icon-6"></i><i class="icon-6"></i><i class="icon-7"></i></div><h4 class="room-1-title mb_20"><a href="room-details.html">Luxury Room</a></h4><p class="room-1-text mb_30">Mattis cras magna morb punar aenean aliquet in. Risus a arcu eget.</p><div class="link-btn"><a href="room-details.html" class="btn-1 btn-alt">Book Now <span></span></a></div></div></div></div><div class="col-lg-4 col-md-6"><div class="room-1-block wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.2s"><div class="room-1-image hvr-img-zoom-1"><img src="assets/images/resource/room-2.jpg" alt=""></div><div class="room-1-content"><p class="room-1-meta-info">Start from <span class="theme-color">$55.0</span>/night</p><div class="room-1-rating"><i class="icon-6"></i><i class="icon-6"></i><i class="icon-6"></i><i class="icon-6"></i><i class="icon-7"></i></div><h4 class="room-1-title mb_20"><a href="room-details.html">Delux Room</a></h4><p class="room-1-text mb_30">Mattis cras magna morb punar aenean aliquet in. Risus a arcu eget.</p><div class="link-btn"><a href="room-details.html" class="btn-1 btn-alt">Book Now <span></span></a></div></div></div></div><div class="col-lg-4 col-md-6"><div class="room-1-block wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.5s"><div class="room-1-image hvr-img-zoom-1"><img src="assets/images/resource/room-3.jpg" alt=""></div><div class="room-1-content"><p class="room-1-meta-info">Start from <span class="theme-color">$55.0</span>/night</p><div class="room-1-rating"><i class="icon-6"></i><i class="icon-6"></i><i class="icon-6"></i><i class="icon-6"></i><i class="icon-7"></i></div><h4 class="room-1-title mb_20"><a href="room-details.html">Luxury Room</a></h4><p class="room-1-text mb_30">Mattis cras magna morb punar aenean aliquet in. Risus a arcu eget.</p><div class="link-btn"><a href="room-details.html" class="btn-1 btn-alt">Book Now <span></span></a></div></div></div></div></div></div></section> -->
<script>
    var gallery = document.querySelector('.gallery');
    var galleryItems = document.querySelectorAll('.gallery-item');
    var numOfItems = gallery.children.length;
    var itemWidth = 23; // percent: as set in css
    var featured = document.querySelector('.featured-item');
    var leftBtn = document.querySelector('.move-btn.left');
    var rightBtn = document.querySelector('.move-btn.right');
    var leftInterval;
    var rightInterval;
    var scrollRate = 0.2;
    var left;
    
    function selectItem(e) {
      if (e.target.classList.contains('active')) return;
      featured.style.backgroundImage = e.target.style.backgroundImage;
      for (var i = 0; i < galleryItems.length; i++) {
        if (galleryItems[i].classList.contains('active')) galleryItems[i].classList.remove('active');
      }
      e.target.classList.add('active');
    }
    
    function galleryWrapLeft() {
      var first = gallery.children[0];
      gallery.removeChild(first);
      gallery.style.left = -itemWidth + '%';
      gallery.appendChild(first);
      gallery.style.left = '0%';
    }
    
    function galleryWrapRight() {
      var last = gallery.children[gallery.children.length - 1];
      gallery.removeChild(last);
      gallery.insertBefore(last, gallery.children[0]);
      gallery.style.left = '-23%';
    }
    
    function moveLeft() {
      left = left || 0;
      leftInterval = setInterval(function() {
        gallery.style.left = left + '%';
        if (left > -itemWidth) {
          left -= scrollRate;
        } else {
          left = 0;
          galleryWrapLeft();
        }
      }, 1);
    }
    
    function moveRight() {
      //Make sure there is element to the leftd
      if (left > -itemWidth && left < 0) {
        left = left - itemWidth;
        var last = gallery.children[gallery.children.length - 1];
        gallery.removeChild(last);
        gallery.style.left = left + '%';
        gallery.insertBefore(last, gallery.children[0]);
      }
      left = left || 0;
      leftInterval = setInterval(function() {
        gallery.style.left = left + '%';
        if (left < 0) {
          left += scrollRate;
        } else {
          left = -itemWidth;
          galleryWrapRight();
        }
      }, 1);
    }
    
    function stopMovement() {
      clearInterval(leftInterval);
      clearInterval(rightInterval);
    }
    leftBtn.addEventListener('mouseenter', moveLeft);
    leftBtn.addEventListener('mouseleave', stopMovement);
    rightBtn.addEventListener('mouseenter', moveRight);
    rightBtn.addEventListener('mouseleave', stopMovement);
    //Start this baby up
    (function init() {
      var images = [ 
          <?php
        $imgarr = json_decode($roomRecords->images);
        for ($i = 0; $i < count($imgarr); $i++) {
          echo '"'.base_url('admin/'.$imgarr[$i]).
          '",';
        } ?>
      ];
      //Set Initial Featured Image
      featured.style.backgroundImage = 'url(' + images[0] + ')';
      //Set Images for Gallery and Add Event Listeners
      for (var i = 0; i < galleryItems.length; i++) {
        galleryItems[i].style.backgroundImage = 'url(' + images[i] + ')';
        galleryItems[i].addEventListener('click', selectItem);
      }
    })();


    // AddRow Start
    function addRow(){
        var value = document.getElementById("addRowArr").value;
        value=parseInt(value)+1;
        // alert(value);
        var newval = parseInt(value)+1;
        document.getElementById("appendRow").innerHTML +=
            `                           
            
                                        <div class="row-2" id="appendRowArr`+value+`">
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <p class="hotel-booking-form-1-label text-lg-center">Rooms:</p>
                                                    <div class="input-group form-group"> 
                                                        <span class="input-group-addon-2"> <i class="fas fa-bed"></i> </span> 
                                                        <select class="form-control" name="room`+value+`">
                                                            <option value="`+newval+`" data-display="`+newval+` Room">`+newval+` Room</option>
                                                            
                                                        </select> </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <p class="hotel-booking-form-1-label text-lg-center">Adults:</p>
                                                    <div class="input-group form-group"> 
                                                        <span class="input-group-addon-2"> <i class="fas fa-user-alt"></i> </span> 
                                                        <select class="form-control" name="adult`+value+`">
                                                        <?php 
                                                            $val = $roomRecords->no_of_adults;
                                                            for($i=1;$i<=$val;$i++){
                                                                if($i==1){
                                                                    echo '<option value="'.$i.' Adult" data-display="'.$i.' Adult">'.$i.' Adult</option>';
                                                                }else{
                                                                    echo '<option value="'.$i.' Adults">'.$i.' Adults</option>';
                                                                }
                                                            }
                                                            ?>
                                                        </select> </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <p class="hotel-booking-form-1-label text-lg-center">Child:</p>
                                                    <div class="input-group form-group"> 
                                                        <span class="input-group-addon-2"> <i class="fas fa-child"></i> </span> 
                                                        <select class="form-control childdropdown" onchange="setMyValue(this.value,`+value+`)" name="child`+value+`">
                                                            <option value="0">0 Child</option>
                                                        <?php 
                                                            $val = $roomRecords->no_of_childs;
                                                            for($i=1;$i<=$val;$i++){
                                                                if($i==1){
                                                                    echo '<option value="'.$i.'">'.$i.' Child</option>';
                                                                }else{
                                                                    echo '<option value="'.$i.'">'.$i.' Childrens</option>';
                                                                }
                                                            }
                                                            ?>
                                                            
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            `;
            document.getElementById("addRowArr").value = value;
	        $('select').niceSelect();

    }

    // AddRow End

    // DeleteRow Start
    function deleteRow(){
        var value = parseInt(document.getElementById("addRowArr").value);
        if(value>0){
        document.getElementById("appendRowArr"+value).remove();
        value=value-1;
        document.getElementById("addRowArr").value = value;
        }

    }

    function setMyValue(select, val){
        var select_val = parseInt(select);
        var elements = document.getElementById("appendRowArr"+val).children
        var count = elements.length;
        console.log(elements.length);
        if(count == 4 || select_val==0){
            let parent = document.getElementById("appendRowArr"+val);
            // while (parent.hasChildNodes())
            // {
               parent.removeChild(parent.lastChild)
            // }
        }
        var output = `<div class="col-lg-3 col-md-3">
                                        <div class="row">`;
        if(select_val > 0){
            for(var i=1; i<=select_val; i++){
                output += `
                                    
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <p class="hotel-booking-form-1-label text-lg-center">Child `+i+` Age:</p>
                                                    <div class="input-group form-group"> 
                                                        <select class="form-control childdropdown" name="childage`+val+`_`+i+`">
                                                            <option>Age</option>
                                                            <?php 
                                                            $val = 12;
                                                            for($i=1;$i<=$val;$i++){
                                                                
                                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                                                
                                                            }
                                                            ?>
                                                            
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
            `;
            }
        }
        output += '</div></div>';
        document.getElementById("appendRowArr"+val).innerHTML += output;
        $('select').niceSelect();

    }
    // DeleteRow End
</script>