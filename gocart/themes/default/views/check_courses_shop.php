<style type="css/txt">
span.value{
color: #000;
font-size: 20px;}

</style>


<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title">COURSES</h4>
</div>
<div class="modal-body">
   <div class="jumbotron zero-margin content-shadow effect-load fadein" style="padding: 0px !important">
        <div class="container">
            <div class="row">

                <?php

                
                 foreach($course->result() as $courses):                     
                        $photo  = theme_img('no_picture.png', lang('no_image_available'));
                        $photoUrl = theme_url('assets/img/no_picture.png');
                        if($courses->images != "false"){
                            $image1 = explode("{", $courses->images);
                            $image2 = explode(":", $image1[2]);
                            $image3 = explode("\"", $image2[1]);
                            $photo  = base_url('uploads/images/thumbnails/'.$image3[1]);
                            $photoUrl = base_url('uploads/images/full/'.$image3[1]);
                        }
                        $course_name = $courses->name;
                        $description1 = $courses->description;
                        $places_left = 1;                       
                       endforeach;

        
      // echo '<pre>';
                                $trainer = $courses->id_trainner;

                                
                                //     exit();
                                 $query=$this->db->query("select * from customers c where c.id = '".$trainer."'");

                                    foreach ($query->result() as $row):
                                       $row->type;
                                     endforeach;?>

                <div class="col-md-5"> 
                    <div class="well box-profile" align="center" style="margin-top: 110px">                            
                        <img src="<?php echo $photo;?>" alt="coach-image" class="img-circle img-responsive border-image-profile" style="width:200 !important;margin-top: -125px; border-color:#E7E7E7">
                        <h3 class="text-bold"> <?php

                         echo $course_name?></h3>
                        <p class="text-md-small" align="justify" style="font-size: 0.6em;"><?php echo $description1; ?></p>
                    </div>
                </div>
                <div class="col-md-7" style="margin-top: 50px;">
                    <div style="border: 1px dashed #222; border-left: none; border-right: none; border-top: none; margin-bottom: 8px">
                        <h4 style="color: #e32322;">Select a Package</h4>
                    </div>
                    <div>
                     <?php foreach ($packages->result() as $pkg): ?>
                        <div class="row" style="margin-bottom: 20px;margin: 0 auto">
                            <div class="col-md-12" style="margin-top: 12px;border: 1px solid #E5E5E5; float: right; height: auto; padding: 5px;background:#f9f9f9; ">
                                <div style="float: left;width:60%;height:100%;padding: 0px 10px; margin-top: -10px;">
                                    <b style="font-size:1.2em;line-height: 15px"><?php echo (int)$pkg->type_package; ?> Months</b> 
                                    <p class="text-md-small" align="justify" style="font-size: 0.6em;line-height: 15px"><?php echo $pkg->description1; ?></p>
                                </div>
                                <div style="float: right;width:40%;border-left: 1px solid #E5E5E5; padding: 0px 5px;">
                                    <p class="text-md-small" align="justify" style="font-size: 0.6em;line-height: 15px">
                                       <span> Total price</span> <br><?php echo '<span style="color: #000;
font-size: 20px; line-height: 30px;"> $'.$pkg->price * $pkg->type_package ?> </span><br />
                                        Price per month<br> <?php echo  '<span style="color: #000;
font-size: 20px; line-height: 30px;"> $'.$pkg->price?>
                                    </span></p>
                                    <?php 

                                        if($row->type == 'trainer'){ 


                                        $data = $this->go_cart->customer();
                                         $user = $data['id'];
                  
             
                                 $query=$this->db->query("select * from customers c where c.id = '".$user."'");

                                    foreach ($query->result() as $row):
                                       $row->type;
                                     endforeach;



                                    
                                     if($row->type != 'student'){
                                            echo 'estudiante';

                                        ?>
                                            <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" cero class="btn btn-primary" onclick="add_schedule_course_to_cart(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
                                         </b>

                                        <?php

                                     }else if($row->type != 'trainer'){
                                        echo 'od trainer';
 
                                        $url = $_SERVER['HTTP_REFERER'];
                                      
                               
                                        list($a, $b, $c, $d, $e, $f) = preg_split ('[/]', $url);
                                         "a: $a; b: $b; c: $c; d: $d; e: $e f: $f<br />\n";

                                        if($f == 'secure'){
                                            ?> 
                                        <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" uno class="btn btn-primary" onclick="add_schedule_course_to_cart1(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
                                         </b>
                                        <?php
                                    }else if($f == 'course'){?>
                                    <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" cero class="btn btn-primary" onclick="add_schedule_course_to_cart(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
                                         </b>
                                          <?php
                                }else{?>
                                 <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" cero class="btn btn-primary" onclick="add_schedule_course_to_cart(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
                                         </b>
                                         <?php
                                           }
                                     }else{
                                         ?>
                                           <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" class="btn btn-primary" onclick="add_schedule_course_to_cart(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
                                         </b>
                                         <?php
                                    }      
                                    }else{ 
                                        $url = $_SERVER['HTTP_REFERER'];
                                      
                               
                                        list($a, $b, $c, $d, $e, $f) = preg_split ('[/]', $url);
                                         "a: $a; b: $b; c: $c; d: $d; e: $e f: $f<br />\n";
                                        if($f == 'secure'){
                                        ?>

                                        <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" tres class="btn btn-primary" onclick="add_schedule_course_to_cart1(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
                                         </b>


                                    <?php
                                             }else if($f == 'course'){
                                                ?>

                                        <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" tres class="btn btn-primary" onclick="add_schedule_course_to_cart(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 

                                                <?php
                                             }else{
                                                ?>
                                                 <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" class="btn btn-primary" onclick="add_schedule_course_to_cart(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
                                         </b>
                                                <?php
                                             }
                                        }
                                        ?>
                                   
                                    
                                </div> 
                            </div>
                        </div>  
                    <?php endforeach;?>    
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
