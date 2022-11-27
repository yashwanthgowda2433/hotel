    

    <section class="banner-section style-three">
        <div class="banner-shape-1"></div>
        <div class="swiper-container banner-slider-2">
            <div class="swiper-wrapper">
                <!-- Slide Item -->
                <div class="swiper-slide">
                    <div class="banner-feature-image d-none d-lg-block" style="background-image: url(<?php echo base_url('assets/images/main-slider/banner-3.jpg');?>);"></div>
                    <div class="content-outer">
                        <div class="content-box">
                            <div class="inner">
                                <h4>Summer Vacations</h4>
                                <h1>Luxury <br>
                                    Hotel For <br>
                                    Vacation.</h1>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit <br> Turpis ridiculus tellus.</div>
                                <div class="link-box">
                                    <a href="room-details" class="btn-1">Book Room <span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide Item -->
                <div class="swiper-slide">
                    <div class="banner-feature-image d-none d-lg-block" style="background-image: url(<?php echo base_url('assets/images/main-slider/banner-3.jpg');?>);"></div>
                    <div class="content-outer">
                        <div class="content-box">
                            <div class="inner">
                                <h4>Summer Vacations</h4>
                                <h1>Your <br> Home For <br>
                                    Vacation.</h1>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit <br> Turpis ridiculus tellus.</div>
                                <div class="link-box">
                                    <a href="room-details" class="btn-1">Book Room <span></span></a>
                                </div>
                            </div>                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-slider-nav">
            <div class="banner-slider-control banner-slider-button-prev hvr-zoom-1 hvr-zoom-1-primary"><span><i class="icon-2"></i></span></div>
            <div class="banner-slider-control banner-slider-button-next hvr-zoom-1 hvr-zoom-1-primary"><span><i class="icon-3"></i></span> </div>
        </div>
    </section>

    <div class="hotel-booking-form-1 gray-bg">
        <div class="auto-container">
            <div class="section_heading text-center mb_55">
                <!-- <span class="section_heading_title_small">Discover</span> -->
                <h2 class="section_heading_title_big">SEARCH ROOMS</h2>
            </div>
            <div class="hotel-booking-form-1-wrap">
                <form class="row" action="<?php echo base_url('rooms');?>" method="POST">
                            <!-- <p class="hotel-booking-form-1-label text-lg-center">ARRIVAL:</p>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                            </div> -->
                    <div class="row-1">
                        <div class="col-lg-6 col-md-6">
                            <p class="hotel-booking-form-1-label text-lg-center">ARRIVAL:</p>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                <input placeholder="17 Sep, 2022" class="form-control" type="text" name="form-name" id="nd_booking_archive_form_date_range_from" value="">
                            </div>
                            <!-- <div class="form-group">
                                <input placeholder="17 Sep, 2022" class="" type="text" name="form-name" id="nd_booking_archive_form_date_range_from" value="" />
                            </div> -->
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <p class="hotel-booking-form-1-label text-lg-center">DEPARTURE:</p>
                            <div class="input-group form-group">
                                <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                                <input placeholder="21 Sep, 2022" class="form-control" type="text" name="form-name" id="nd_booking_archive_form_date_range_to" value="" />
                            </div>
                            <!-- <div class="form-group">        
                                <p class="hotel-booking-form-1-label text-lg-center">DEPARTURE:</p>
                                <input placeholder="21 Sep, 2022" class="" type="text" name="form-name" id="nd_booking_archive_form_date_range_to" value="" />                            
                            </div> -->
                        </div>
                    </div>
                    <div class="row-2">
                      <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                          <p class="hotel-booking-form-1-label text-lg-center">Rooms:</p>
                            <div class="input-group form-group">
                                <span class="input-group-addon-2"><i class="fas fa-bed"></i></span>
                                <select class="form-control">
                                    <option data-display="1 Room">1 Room</option>
                                    
                                </select>
                            </div>
                          
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4">
                       <div class="form-group">
                          <p class="hotel-booking-form-1-label text-lg-center">Adults:</p>
                            <div class="input-group form-group">
                                <span class="input-group-addon-2"><i class="fas fa-user-alt"></i></span>
                                <select class="form-control">
                                    <option value="1 Adult" data-display="1 Adult">1 Adult</option>
                                    <option value="2 Adults">2 Adults</option>
                                    <option value="3 Adults">3 Adults</option>
                                    <option value="4 Adults">4 Adults</option>
                                    <option value="5 Adults">5 Adults</option>
                                </select>
                            </div>
                         
                        </div>
                      </div>
                      <div class="col-lg-4 col-md-4"> 
                        <div class="form-group">
                          <p class="hotel-booking-form-1-label text-lg-center">Child:</p>
                          <div class="input-group form-group">
                                <span class="input-group-addon-2"><i class="fas fa-child"></i></span>
                                <select class="form-control">
                                    <option data-display="0 Children">0 Children</option>
                                    <option value="0 Children">0 Children</option>
                                    <option value="1 Children">1 Children</option>
                                    <option value="2 Childrens">2 Childrens</option>
                                </select>
                            </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 mt-4"> 
                        <div class="form-group" style="text-align: center;">
                            <button type="submit" class="btn-1">Check Availability<span></span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Feature -->
    <!-- <section class="section-padding">
        <div class="gray-bg p_absolute l_0 b_0 r_0 h_340"></div>
        <div class="auto-container">
            <div class="section_heading text-center mb_60">
                <span class="section_heading_title_small">Exclusive Offers</span>
                <h2 class="section_heading_title_big">Featured Special <br> Offers</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-1-block text-center wow fadeInLeft" data-wow-delay=".2s" data-wow-duration=".8s">
                        <div class="feature-1-image hvr-img-zoom-1"><img src="<?php echo base_url('assets/images/resource/feature-image-1.jpg');?>" alt=""></div>
                        <h4 class="feature-1-title">Kick off Summer <br> in NYC</h4>
                        <p class="feature-1-text">Amet minim mollit no duis sit enim <br> aliqua dolor do amet officia.</p>
                        <div class="feature-1-link"><a class="feature-1-link-btn hvr-zoom-1 hvr-zoom-1-primary" href="service-details"><i class="icon-5"></i></a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-1-block text-center wow fadeInLeft" data-wow-delay=".2s" data-wow-duration=".8s">
                        <div class="feature-1-image hvr-img-zoom-1"><img src="<?php echo base_url('assets/images/resource/feature-image-2.jpg');?>" alt=""></div>
                        <h4 class="feature-1-title">Free Breakfast <br> Packages</h4>
                        <p class="feature-1-text">Amet minim mollit no duis sit enim <br> aliqua dolor do amet officia.</p>
                        <div class="feature-1-link"><a class="feature-1-link-btn hvr-zoom-1 hvr-zoom-1-primary" href="service-details"><i class="icon-5"></i></a></div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-1-block text-center wow fadeInLeft" data-wow-delay=".2s" data-wow-duration=".8s">
                        <div class="feature-1-image hvr-img-zoom-1"><img src="<?php echo base_url('assets/images/resource/feature-image-3.jpg');?>" alt=""></div>
                        <h4 class="feature-1-title">The Signature <br> Collection</h4>
                        <p class="feature-1-text">Amet minim mollit no duis sit enim <br> aliqua dolor do amet officia.</p>
                        <div class="feature-1-link"><a class="feature-1-link-btn hvr-zoom-1 hvr-zoom-1-primary" href="service-details"><i class="icon-5"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- About -->
    <!-- <section class="section-padding gray-bg pt-0">
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-1-image-wrap mb_30 p_relative">
                        <div class="about-1-shape-1" data-parallax='{"y": -50}'></div>
                        <div class="about-1-image-1 hvr-img-zoom-1"><img src="<?php echo base_url('assets/images/resource/about.jpg');?>" alt=""></div>
                    </div>
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <div class="section_heading mb_20">
                        <span class="section_heading_title_small">About Royalking</span>
                        <h2 class="section_heading_title_big">Luxury <br> Hotel in The Heart of <br> San Francisco.</h2>
                    </div>
                    <p class="aboout-1-desc mb_30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing integer
                        ultrices suspendisse varius etiam est. Est, felis, tempus nec vitae orci sodales
                        Metus, velit nec at diam in sed. Massa dui ipsum ornare sagittis dolor sagittis
                        amet odio est. Sit semper et velit fusce.</p>
                    <div class="about-1-btn mb_30">
                        <a href="about" class="btn-1">Discover More<span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Room -->
    <section class="section-padding">
        <div class="auto-container">
            <div class="section_heading text-center mb_55">
                <span class="section_heading_title_small">Discover</span>
                <h2 class="section_heading_title_big">Rooms & Suites</h2>
            </div>
            <div class="row">
            <?php
            if(!empty($roomRecords))
            {
                foreach($roomRecords as $record)
                {
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="room-1-block wow fadeInUp" data-wow-delay=".2s" data-wow-duration=".8s">
                        <div class="room-1-image hvr-img-zoom-1">
                        <?php 
                            $imgarr = json_decode($record->images);
                            echo '<img src="'.base_url('admin/'.$imgarr[0]).'" alt="">';
                        ?>
                        </div>
                        <div class="room-1-content">
                            <p class="room-1-meta-info">Start from <span class="theme-color">₹<?php echo $record->baseFareDay;?></span>/night</p>
                            <!-- <div class="room-1-rating">
                                <i class="icon-6"></i>
                                <i class="icon-6"></i>
                                <i class="icon-6"></i>
                                <i class="icon-6"></i>
                                <i class="icon-7"></i>
                            </div> -->
                            <h4 class="room-1-title mb_20"><a href="room-details/<?php echo $record->roomId ?>"><?php echo $record->sizeTitle ?></a></h4>
                            <p class="room-1-text mb_30"><?php echo $record->floorCode." - ".$record->floorName; ?>.</p>
                            <div class="link-btn"><a href="room-details/<?php echo $record->roomId ?>" class="btn-1 btn-alt">Book Now <span></span></a></div>
                        </div>
                    </div>
                </div>
            <?php }
            } ?>
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="room-1-block wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.2s">
                        <div class="room-1-image hvr-img-zoom-1">
                            <img src="<?php echo base_url('assets/images/resource/room-2.jpg');?>" alt="">
                        </div>
                        <div class="room-1-content">
                            <p class="room-1-meta-info">Start from <span class="theme-color">₹2355.0</span>/night</p>
                            <div class="room-1-rating">
                                <i class="icon-6"></i>
                                <i class="icon-6"></i>
                                <i class="icon-6"></i>
                                <i class="icon-6"></i>
                                <i class="icon-7"></i>
                            </div>
                            <h4 class="room-1-title mb_20"><a href="room-details">Delux Room</a></h4>
                            <p class="room-1-text mb_30">Mattis cras magna morb punar aenean aliquet in. Risus a arcu eget.</p>
                            <div class="link-btn"><a href="room-details" class="btn-1 btn-alt">Book Now <span></span></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-1-block wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.5s">
                        <div class="room-1-image hvr-img-zoom-1">
                            <img src="<?php echo base_url('assets/images/resource/room-3.jpg');?>" alt="">
                        </div>
                        <div class="room-1-content">
                            <p class="room-1-meta-info">Start from <span class="theme-color">₹5555.0</span>/night</p>
                            <div class="room-1-rating">
                                <i class="icon-6"></i>
                                <i class="icon-6"></i>
                                <i class="icon-6"></i>
                                <i class="icon-6"></i>
                                <i class="icon-7"></i>
                            </div>
                            <h4 class="room-1-title mb_20"><a href="room-details">Luxury Room</a></h4>
                            <p class="room-1-text mb_30">Mattis cras magna morb punar aenean aliquet in. Risus a arcu eget.</p>
                            <div class="link-btn"><a href="room-details" class="btn-1 btn-alt">Book Now <span></span></a></div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-12 col-md-12 mt-4"> 
                        <div class="form-group" style="text-align: center;">
                            <button type="submit" class="btn-1" onclick="window.location.href='<?php echo base_url('rooms/');?>'">View More<span></span></button>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    <!-- Projects -->
    <?php 
    /* <section class="section-padding p-0">
        <div class="gray-bg p_absolute l_0 b_0 r_0 h_140"></div>
        <div class="auto-container">
            <div class="project-1-wrapper">
                <div class="swiper-container single-item-carousel">
                    <div class="swiper-wrapper">
                        <!-- Slide Item -->
                        <div class="swiper-slide">
                            <div class="project-1-image" style="background-image: url(<?php echo base_url('assets/images/resource/project-1.jpg');?>);">
                                <div class="project-1-block">
                                    <span class="section_heading_title_small">Discover</span>
                                    <h2 class="section_heading_title_big fs_50 mb_20">Rooms & Suites</h2>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                        Adipiscing integer ultrices suspendisse varius etiam est
                                        tempus nec vitae orci sodales.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide Item -->
                        <div class="swiper-slide">
                            <div class="project-1-image" style="background-image: url(<?php echo base_url('assets/images/resource/project-2.jpg');?>);">
                                <div class="project-1-block">
                                    <span class="section_heading_title_small">Discover</span>
                                    <h2 class="section_heading_title_big fs_50 mb_20">Rooms & Suites</h2>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                        Adipiscing integer ultrices suspendisse varius etiam est
                                        tempus nec vitae orci sodales.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Slide Item -->
                        <div class="swiper-slide">
                            <div class="project-1-image" style="background-image: url(<?php echo base_url('assets/images/resource/project-3.jpg');?>);">
                                <div class="project-1-block">
                                    <span class="section_heading_title_small">Discover</span>
                                    <h2 class="section_heading_title_big fs_50 mb_20">Rooms & Suites</h2>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                        Adipiscing integer ultrices suspendisse varius etiam est
                                        tempus nec vitae orci sodales.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-nav-style-1 project-1-nav">
                        <div class="slider-control slider-button-prev hvr-zoom-1 hvr-zoom-1-primary"><span><i class="icon-3"></i></span></div>
                        <div class="slider-control slider-button-next hvr-zoom-1 hvr-zoom-1-primary"><span><i class="icon-2"></i></span> </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    */
     ?>

    <!-- Amenities -->
    <!-- <section class="section-padding gray-bg">
        <div class="auto-container">
            <div class="team-1-wrapper">
                <div class="section_heading text-center mb_50">
                    <span class="section_heading_title_small">Discover</span>
                    <h2 class="section_heading_title_big mb_20">Our Best Amenities</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Adipiscing integer ultrices suspendisse varius etiam est. <br> Est, felis, tempus nec vitae orci sodales Metus, velit nec at diam in sed. Massa dui ipsum ornare sagittis dolor <br> sagittis amet odio est. Sit semper et velit fusce.</p>
                </div>
                <div class="row">
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-8"></i></div>
                            <p class="fw_500">Fast wifi</p>
                        </div>
                    </div>
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-9"></i></div>
                            <p class="fw_500">Coffee</p>
                        </div>
                    </div>
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-10"></i></div>
                            <p class="fw_500">Bath</p>
                        </div>
                    </div>
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-11"></i></div>
                            <p class="fw_500">Parking Space​</p>
                        </div>
                    </div>
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-12"></i></div>
                            <p class="fw_500">Swimming pool</p>
                        </div>
                    </div>
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-13"></i></div>
                            <p class="fw_500">Laundry service</p>
                        </div>
                    </div>
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-14"></i></div>
                            <p class="fw_500">Breakfast</p>
                        </div>
                    </div>
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-15"></i></div>
                            <p class="fw_500">Spa & Wellness</p>
                        </div>
                    </div>
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-16"></i></div>
                            <p class="fw_500">Meeting Room</p>
                        </div>
                    </div>
                    <div class="col_xl_five col-lg-3 col-md-6">
                        <div class="icon_box-1">
                            <div class="icon_box-1-icon"><i class="icon-17"></i></div>
                            <p class="fw_500">Welcome Drink</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Testimonials -->
    <?php 
    /*
    <section class="section-padding">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section_heading mb_20">
                        <span class="section_heading_title_small">Testimonials</span>
                        <h2 class="section_heading_title_big">What <br> They’re Say <br> About Us?</h2>
                    </div>
                    <p class="testimonial-1-desc">Amet dui scelerisque vel habitant eget <br> tincidunt facilisis pretium. Porttitor mi <br> nisi, non vitae tempus.</p>
                    <div class="slider-nav-style-2 testimonial-1-nav">
                        <div class="slider-control slider-button-prev hvr-zoom-1 hvr-zoom-1-primary"><span><i class="icon-3"></i></span></div>
                        <div class="slider-control slider-button-next hvr-zoom-1 hvr-zoom-1-primary"><span><i class="icon-2"></i></span> </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="testimonial-1-block-wrap">
                        <div class="testimonial-1-shape-1"><img src="<?php echo base_url('assets/images/shape/pattern-1.png');?>" alt=""></div>
                        <div class="swiper-container two-item-carousel">
                            <div class="swiper-wrapper">
                                <!-- Slide Item -->
                                <div class="swiper-slide">
                                    <div class="testimonial-1-block">
                                        <div class="testimonial-1-quote-icon"><i class="icon-18"></i></div>
                                        <p class="testimonial-1-review-desc">“Mattis cras magna morb nula punar
                                            aenean aliquet in. Risus a arcu eget
                                            mi hendrerit gravida elit scelerisque
                                            tempor Pharetra fringilla tellus vivera
                                            eget sapien viverra faucibus facilisis
                                            sed facilisi dictum.”</p>
                                        <h4 class="testimonial-1-name">Jacob Jones</h4>
                                        <p class="testimonial-1-designation">Manager</p>
                                        <div class="testimonial-1-author-thumb">
                                            <img src="<?php echo base_url('assets/images/resource/testimonial-1.jpg');?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <!-- Slide Item -->
                                <div class="swiper-slide">
                                    <div class="testimonial-1-block">
                                        <div class="testimonial-1-quote-icon"><i class="icon-18"></i></div>
                                        <p class="testimonial-1-review-desc">“Mattis cras magna morb nula punar
                                            aenean aliquet in. Risus a arcu eget
                                            mi hendrerit gravida elit scelerisque
                                            tempor Pharetra fringilla tellus vivera
                                            eget sapien viverra faucibus facilisis
                                            sed facilisi dictum.”</p>
                                        <h4 class="testimonial-1-name">Ralph Edwards</h4>
                                        <p class="testimonial-1-designation">Manager</p>
                                        <div class="testimonial-1-author-thumb">
                                            <img src="<?php echo base_url('assets/images/resource/testimonial-2.jpg');?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    */
     ?>

    <!-- CTA -->
    <!-- <section class="cta-1-section">
        <div class="cta-1-bg" data-parallax='{"y": 30}' style="background-image: url(<?php echo base_url('assets/images/background/parallax-bg.jpg');?>);"></div>
        <div class="auto-container">
            <div class="section_heading text-center mb_40">
                <span class="section_heading_title_small">Testimonials</span>
                <h2 class="section_heading_title_big alt">Looking for a Relaxing Country <br> Vacation Rental?</h2>
            </div>
            <div class="text-center">
                <div class="cta-1-link-bt"><a href="javascript:void(0);" class="btn-1">Check Availability<span></span></a></div>
            </div>
        </div>
    </section> -->

    <!-- Blog -->
    <!-- <section class="section-padding">
        <div class="auto-container">
            <div class="section_heading text-center mb_60">
                <span class="section_heading_title_small">Our Article</span>
                <h2 class="section_heading_title_big">Get More Update For <br> Royalking</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-1-block wow fadeInLeft" data-wow-delay=".2s" data-wow-duration=".8s">
                        <div class="blog-1-image">
                            <a href="blog-details"><img src="<?php echo base_url('assets/images/resource/blog-1.jpg');?>" alt=""></a>
                        </div>
                        <div class="blog-1-bottom-content">
                            <div class="blog-1-date">15 APRIL</div>
                            <h4 class="blog-1-title"><a href="blog-details">Our New Miami Beach
                                Hotel Is Open!</a></h4>
                            <ul class="d-flex blog-1-meta-info">
                                <li>Admin</li>
                                <li>0 Comment</li>
                            </ul>
                            <p class="blog-1-excerpt">Amet minim mollit no duis sit enim aliqua dolor do amet officia.</p>
                            <div class="blog-1-link-btn"><a href="blog-details" class="h_50 w_50 hvr-zoom-1 circle-btn lh_50 fs_13 hvr-zoom-1-primary"><i class="icon-5"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-1-block wow fadeInLeft" data-wow-delay=".2s" data-wow-duration=".8s">
                        <div class="blog-1-image">
                            <a href="blog-details"><img src="<?php echo base_url('assets/images/resource/blog-2.jpg');?>" alt=""></a>
                        </div>
                        <div class="blog-1-bottom-content">
                            <div class="blog-1-date">15 APRIL</div>
                            <h4 class="blog-1-title"><a href="blog-details">Know the secreat of
                                Royalking Resort </a></h4>
                            <ul class="d-flex blog-1-meta-info">
                                <li>Admin</li>
                                <li>0 Comment</li>
                            </ul>
                            <p class="blog-1-excerpt">Amet minim mollit no duis sit enim aliqua dolor do amet officia.</p>
                            <div class="blog-1-link-btn"><a href="blog-details" class="h_50 w_50 hvr-zoom-1 circle-btn lh_50 fs_13 hvr-zoom-1-primary"><i class="icon-5"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay=".2s" data-wow-duration=".8s">
                    <div class="blog-1-block">
                        <div class="blog-1-image">
                            <a href="blog-details"><img src="<?php echo base_url('assets/images/resource/blog-3.jpg');?>" alt=""></a>
                        </div>
                        <div class="blog-1-bottom-content">
                            <div class="blog-1-date">15 APRIL</div>
                            <h4 class="blog-1-title"><a href="blog-details">How to book a Resort in best price on Mountains</a></h4>
                            <ul class="d-flex blog-1-meta-info">
                                <li>Admin</li>
                                <li>0 Comment</li>
                            </ul>
                            <p class="blog-1-excerpt">Amet minim mollit no duis sit enim aliqua dolor do amet officia.</p>
                            <div class="blog-1-link-btn"><a href="blog-details" class="h_50 w_50 hvr-zoom-1 circle-btn lh_50 fs_13 hvr-zoom-1-primary"><i class="icon-5"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Contact Form -->
    <section class="section-padding gray-bg">
        <div class="auto-container">
            <div class="row">                
                <div class="col-lg-6 order-2">  
                    <div class="p_relative">
                        <div class="p_absolute l_0 b__75"><img src="<?php echo base_url('assets/images/shape/pattern-1.png');?>" alt=""></div>
                        <div class="form-alt">
                            <form method="post" action="https://html.tonatheme.com/2022/royalking/sendemail.php" id="contact-form">
                                <div class="row clearfix">
                                    <div class="form-group col-md-12">
                                        <input type="text" name="form_name" value="" placeholder="Your Name" required>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <input type="text" name="email" value="" placeholder="Your Email" required>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <input type="text" name="form_subject" value="" placeholder="Subject" required>
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <textarea name="form_message" placeholder="Massage"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <p><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"> I agree to the terms & conditions</p>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button class="btn-1" type="submit" data-loading-text="Please wait...">Submit Now <i class="flaticon-right-arrow-1"></i><span></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                  
                </div>
                <div class="col-lg-6">
                    <div class="section_heading mb_30">
                        <span class="section_heading_title_small">Contact Us</span>
                        <h2 class="section_heading_title_big">If You Wish To <br>
                            Learn More Ask Before <br>
                            Booking.</h2>
                    </div>
                    <p>Adipiscing integer ultrices suspendisse varius etiam est. Est, felis, tempus <br>
                        nec vitae orci sodales Metus, velit nec at diam in sed. Massa dui ipsum <br>
                        ornare sagittis dolor sagittis amet odio est.</p>
                </div>
            </div>
        </div>
    </section>
