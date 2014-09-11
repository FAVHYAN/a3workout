<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title">SCHEDULES</h4>
</div>
<div class="modal-body">
   <div class="jumbotron zero-margin content-shadow effect-load fadein" style="padding: 0px !important">
        <div class="container">
            <div>
                <?php /*foreach($course->result() as $courses):                     
                        $photo	= theme_img('no_picture.png', lang('no_image_available'));
                        $photoUrl = theme_url('assets/img/no_picture.png');
                        if($courses->images != "false"){
                            $image1 = explode("{", $courses->images);
                            $image2 = explode(":", $image1[2]);
                            $image3 = explode("\"", $image2[1]);
                            $photo	= base_url('uploads/images/thumbnails/'.$image3[1]);
                            $photoUrl = base_url('uploads/images/full/'.$image3[1]);
                        }
                        $course_name = $courses->name;
                        $description = $courses->description;
                        $places_left = $courses->quantity;
                       
                       endforeach*/
                ?>
                <div class="span12" id="product_schedule">				
                        <div>
                                <div class="col-md-6" style="font-size: 14px;">
                                    <div>
                                            <span class="span2">                                                            
                                                    <input type="hidden" name="name_course" value="<?php echo $name?>">
                                                    <label>Date</label>
                                                    <?php
                                                    $data = array('placeholder'=>'1999-01-31', 'style'=>'text-align:center;width:90px', 'onchange' => "this.style.border='1px solid #CCCCCC'",'name'=>'date_schedule',  'class'=>'form-control');
                                                    echo form_input($data);
                                                    ?>
                                            </span>                                                    
                                            <span class="span2">
                                                    <label>Places</label>
                                                    <?php
                                                    $data = array('placeholder'=>lang('places'), 'name'=>'places_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'form-control');
                                                    echo form_input($data);
                                                    ?>
                                            </span
                                    </div> 
                                    <div class="">
                                            <span class="span2">
                                                    <label>Start Time</label>
                                                    <?php
                                                    $data = array('placeholder'=>'00', 'style'=>'text-align:center;width:20px','name'=>'starttime_1_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'form-control');
                                                    echo form_input($data).':';
                                                    $data = array('placeholder'=>'00', 'style'=>'text-align:center;width:20px','name'=>'starttime_2_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'form-control');
                                                    echo form_input($data);
                                                    ?>
                                            </span>
                                            <span class="span2">
                                                    <label>Finish Time</label>
                                                    <?php
                                                    $data = array('placeholder'=>'00', 'style'=>'text-align:center;width:20px','name'=>'finishtime_1_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'form-control');
                                                    echo form_input($data).':';
                                                    $data = array('placeholder'=>'00', 'style'=>'text-align:center;width:20px','name'=>'finishtime_2_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'form-control');
                                                    echo form_input($data);
                                                    ?>
                                            </span>
                                    </div> 
                                    <div class="">
                                            <span class="span2">
                                                    <label>Price</label>
                                                    <?php
                                                    $data = array('placeholder'=>lang('price'), 'style'=>'text-align:right;width:90px', 'name'=>'price_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'form-control');
                                                    echo form_input($data);
                                                    ?>
                                            </span>
                                            <span class="span2">
                                                    <label>Sale Price</label>
                                                    <?php
                                                    $data = array('placeholder'=>lang('saleprice'), 'style'=>'text-align:right;width:90px', 'name'=>'saleprice_schedule', 'onchange' => "this.style.border='1px solid #CCCCCC'",  'class'=>'form-control');
                                                    echo form_input($data);
                                                    ?>
                                            </span>
                                    </div> 
                                    <div class="">
                                            <span class="span8">
                                                    <button type="button" onclick="save_schedule_admin()" class="btn btn-primary"><?php echo lang('upload');?></button>
                                            </span>
                                    </div> 

                                </div>
                        </div>
                        <br /><br /><br />
                        <div class="span7">
                                <table class="table table-striped" style="margin-left: 50px !important; width: 100% !important;">
                                    <thead>
                                            <tr>
                                                    <th><?php echo lang('date')?></th>
                                                    <th><?php echo lang('places')?></th>
                                                    <th><?php echo lang('starttime')?></th>
                                                    <th><?php echo lang('finishtime')?></th>
                                                    <th><?php echo lang('price')?></th>
                                                    <th><?php echo lang('saleprice')?></th>
                                                    <th></th>
                                            </tr>
                                    </thead>
                                    <tbody id="list_schedule">      
                                    <?php foreach($schedule as $she){  ?>
                                            <tr id="tr_list_schedule<?php echo $she->id?>">
                                                <td><?php echo form_decode($she->date);?></td>
                                                <td><?php echo form_decode($she->quantity);?></td>
                                                <td><?php echo form_decode($she->start_time);?></td>
                                                <td><?php echo form_decode($she->finish_time);?></td>
                                                <td><?php echo form_decode($she->price);?></td>
                                                <td><?php echo form_decode($she->saleprice);?></td>
                                                <td><a class="btn btn-danger" onclick="delete_schedule_admin(<?php echo $she->id?>);"><i class="icon-trash icon-white"></i> <?php echo lang('delete');?></a></td>
                                            </tr>    
                                    <?php } ?>
                                    </tbody>
                                </table>    
                        </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
<!-- /.modal-content -->
