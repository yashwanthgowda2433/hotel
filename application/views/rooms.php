<!-- Room -->
<!-- Room -->
<section class="section-padding" style="padding-top: 40px;">
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
                            <h4 class="room-1-title mb_20"><a href="<?php echo base_url('room-details/'.$record->roomId); ?>"><?php echo $record->sizeTitle ?></a></h4>
                            <p class="room-1-text mb_30"><?php echo $record->floorCode." - ".$record->floorName; ?>.</p>
                            <div class="link-btn"><a href="<?php echo base_url('room-details/'.$record->roomId); ?>" class="btn-1 btn-alt">Book Now <span></span></a></div>
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
                        
                    <div class="box-footer clearfix">
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
            </div>
        </div>
    </section>


