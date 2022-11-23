<?php

$roomId = 0;
$floorId = 0;
$roomSizeId = 0;
$roomNumber = '';
$selected = "selected='selected'";

if(!empty($roomInfo))
{
    foreach ($roomInfo as $info)
    {
        $roomId = $info->roomId;
        $floorId = $info->floorId;
        $roomSizeId = $info->roomSizeId;
        $roomNumber = $info->roomNumber;
        $img_arr = json_decode($info->images);
        $adults = $info->no_of_adults;
        $childs = $info->no_of_childs;

    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rooms Management
        <small>Add / Edit Room Size</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Room Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addUser" action="<?php echo base_url() ?>updateOldRoom" method="POST" enctype="multipart/form-data" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Floor</label>
                                        <select class="form-control" id="floorId" name="floorId">
                                            <option value="">Select Floor</option>
                                            <?php
                                            if(!empty($floors))
                                            {
                                                foreach ($floors as $frs)
                                                {
                                                    ?>
                                                    <option value="<?php echo $frs->floorId ?>" 
                                                        <?php if($frs->floorId == $floorId) { echo $selected; } ?>>
                                                    <?php echo $frs->floorCode." - ".$frs->floorName ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>                                      
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Room Size</label>
                                        <select class="form-control" id="sizeId" name="sizeId">
                                            <option value="">Select Room Sizes</option>
                                            <?php
                                            if(!empty($roomSizes))
                                            {
                                                foreach ($roomSizes as $rs)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rs->sizeId ?>"
                                                        <?php if($rs->sizeId == $roomSizeId) { echo $selected; } ?>>
                                                        <?php echo $rs->sizeTitle ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Room Number</label>
                                        <input type="text" class="form-control" id="roomNumber" name="roomNumber" maxlength="10"
                                        value="<?php echo $roomNumber ?>">
                                        <input type="hidden" value="<?php echo $roomId; ?>" name="roomId" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                </div>    
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="imgarr" value='<?php echo json_encode($img_arr);?>' />
                                            <?php 
                                            for($i=0;$i<count($img_arr);$i++){
                                                echo '<img src="'.base_url($img_arr[$i]).'" style="width:100px;height:100px;margin-right:20px;"/>';
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="mobile">Upload Images</label>
                                                <input type="file" class="form-control" id="file" name="file[]" accept="gif|jpg|png" multiple />
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    
                                </div>  
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Number of Adults</label>
                                        <input type="number" class="form-control" id="no_of_adults" value="<?php echo $adults; ?>" name="no_of_adults" maxlength="2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Number of Childs</label>
                                        <input type="number" class="form-control" id="no_of_childs" value="<?php echo $childs; ?>" name="no_of_childs" maxlength="2">
                                    </div>
                                </div>    
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>