<?php include('header.php'); ?>
<script>
    $("#arrow_left")
      .mouseup(function() {
        $( this ).append( "<span style='color:#f00;'>Mouse up.</span>" );
      })
      .mousedown(function() {
        $( this ).append( "<span style='color:#00f;'>Mouse down.</span>" );
      });
</script>
</script>
 <style type="text/css">

 .tabclass{
border: 1px solid #c5c5c5; 
border-radius: 5px; padding: 
15px; width: 95%;margin-bottom: 
20px; background:#fff; 
 }
 
 .ticker{width:98%; height: 74px;border: 1px solid #DCDCDC; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; padding: 25px 0px;}
 .classbox{
 padding:10px;margin-right: 10px; 
 margin-bottom: 10px; 
 overflow: hidden;
border-radius: 5px; 
width: 205px; 
height:255px;
border: 1px solid #ccc;}

 ul.checkfilter{padding:0px !important;}
 ul.checkfilter li{list-style:none;}
 
 .a3w-box>div{padding:3px 0px;}

 .selectpicker{width: 80%;
height: 27px;
margin: 12px;
display: inline-block;
height: 32px;
padding: 4px 6px;
margin-bottom: 10px;
margin-bottom: 10px;
font-size: 14px;
line-height: 20px;
color: #A8A8A8;
vertical-align: middle;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;}

.contentslide{
width:98%; 
border: 1px solid #DCDCDC; 
border-bottom-left-radius: 
5px; border-bottom-right-radius: 5px; 
padding: 25px 0px;
padding: 25px 14px;
margin-bottom: 12px;
background: #fff;
}

.carousel.slide img {
    width:100%;
    height:auto;
}

.carousel-control.right {
background-position: 0 0;
left: auto;
right: 10px;
}

.carousel-control {
background: url("http://www.a3workout.com/shop/themes/leometr/css/../img/default/bt-next-prev.png") no-repeat scroll 0 bottom transparent !important;
border: 3px solid #ffffff;
-webkit-border-radius: 23px;
-moz-border-radius: 23px;
border-radius: 23px;
height: 23px;
left: auto;
margin: 0;
opacity: 1;
filter: alpha(opacity=100);
padding: 0;
right: 38px;
text-indent: -9999em;
top: -52px !important;
width: 23px;
overflow: hidden;
}

.carousel-control:hover, .carousel-control:focus {
background-image: url(../images/bt-next-prev-hover.png);
}

.carousel-control.right {
background-position: 0 0;
left: auto;
right: 10px;
}

.product_label{margin:0 40%;}


 </style>
 <div class="row" style="margin: 2em 0em;">
        <div class="col-md-12" style="padding-left: 15px; margin-bottom: 10px; width: 100%;">
            <div style="padding: 9px 40px; width: 98%; height: 33px;border: 1px solid #e32322; background-color: #e32322; border-top-left-radius: 5px; border-top-right-radius: 5px">
                <h4 class="title-box" style="color:white">Packages Categories</h4>                    
            </div>
            <div class="contentslide">
                
                    
                <div id="carousel-example-generic" class="carousel slide">
                      <!-- Indicators -->
                      <!-- Wrapper for slides -->
                     
                    <!-- Controls -->
                    <a class="carousel-control left" href="#carousel-example-generic" data-slide="prev">
                          <span class="icon-prev"></span>
                    </a>
                    <a class="carousel-control right " href="#carousel-example-generic" data-slide="next">
                          <span class="icon-next"></span>
                    </a>                   
            </div>
        </div>
        <div class="col-md-3">
                <?php echo form_open('cart/search', 'class=""');?>    
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="<?php echo lang('search');?>" >
				        <span class="input-group-btn"><button class="btn btn-default" type="button">Go!</button></span>
                     </div>
				
                <div class="a3w-box">                        
                        <h4 align="center" class="title-box">Filter by Day</h4>
                        <div align="left">
                                <ul class="no-border checkfilter">
                                    <li><label for="day_monday"><input type="checkbox" name="day" id="day_monday"> Monday</label></li>
                                    <li><label for="day_tuesday"><input type="checkbox" name="day" id="day_tuesday"> Tuesday</label></li>
                                    <li><label for="day_wednesday"><input type="checkbox" name="day" id="day_wednesday"> Wednesday</label></li>
                                    <li><label for="day_thursday"><input type="checkbox" name="day" id="day_thursday"> Thursday</label></li>
                                    <li><label for="day_friday"><input type="checkbox" name="day" id="day_friday"> Friday</label></li>
                                    <li><label for="day_saturday"><input type="checkbox" name="day" id="day_saturday"> Saturday</label></li>
                                    <li><label for="day_sunday"><input type="checkbox" name="day" id="day_sunday"> Sunday</label></li>
                                </ul> 
                        </div>
				</div>
				<div class="a3w-box">
                        <h4 align="center" class="title-box">Filter by Time</h4>
                        <div align="left">
                                <ul class="no-border checkfilter">
                                    <li><label for="day_morning"><input type="checkbox" name="time" id="time_morning"> Morning</label></li>
                                    <li><label for="day_lunch"><input type="checkbox" name="time" id="time_lunch"> Lunch</label></li>
                                    <li><label for="day_afternoon"><input type="checkbox" name="time" id="time_afternoon"> Afternoon</label></li>
                                    <li><label for="day_evening"><input type="checkbox" name="time" id="time_evening"> Evening</label></li>
                                </ul>
                        </div>
				</div>
                <div class="a3w-box">				
                        <h4 align="center" class="title-box">Filter by Price</h4>
                        <div align="center">
                            <select name="price" style="width: 80%;" class="selectpicker">
                              <option value="all">$ All prices</option>
                              <option value="10">$ 10 and under</option>
                              <option value="20">$ 20 and under</option>
                              <option value="40">$ 40 and under</option>
                              <option value="60">$ 60 and under</option>
                              <option value="61">$ 60 and above</option>
                            </select>
							
                        </div>
                </div>
                </form>
                <div class="a3w-box">
                        <h4 align="center" class="title-box">My Purchases</h4>
                        <div align="center" id="container_my_purchase">
                                <a href="<?php echo site_url('cart/view_cart');?>">
                                <?php
                                if ($this->go_cart->total_items()==0)
                                {
                                        echo lang('empty_cart');
                                }
                                else
                                {
                                        if($this->go_cart->total_items() > 1)
                                        {
                                                echo sprintf (lang('multiple_items'), $this->go_cart->total_items());
                                        }
                                        else
                                        {
                                                echo sprintf (lang('single_item'), $this->go_cart->total_items());
                                        }
                                }
                                ?>
                                </a>
                        </div>
                </div>
        </div>
        <div class="col-md-9" style="padding: 10px;padding-right: 15px;padding-left: 15px; background:#fff;">
            <div class="row" id="">
                <div class="col-md-9" style="width: 100%;border: 1px dashed #222; border-left: none; border-right: none; border-top: none; margin-bottom: 20px">
                    <h2 style="color: #e32322;">PACKAGES</h2>
                </div>
            </div>
            <div class="row" id="">
                <!--div class="col-md-9 tabclass">
                    <span style="float:left"><img style="width:20px; height:20px" src="<?php echo base_url("assets/img/form_2.png");?>"></span>    
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <span style="margin-left: 10px;"><b style="font-size:16px;font-family: 'Lato',sans-serif">TODAY, DECEMBER 3, 2013</b></span>                    
                    <!--span style="margin-left: 20%;"><img src="<?php //echo base_url("assets/img/ajax_loader.gif");?>"></span>
                    <span style="float:right"><b style="color: #e32322;font-size:14px;font-family: 'Lato',sans-serif">25 CLASSES</b></span>                            
                </div-->
                <div class="col-md-9" style="padding: 0 auto; padding-top: 10px; width: 95%;margin-bottom: 20px;">
                            <div class="container">
            <div class="row">

                <?php foreach($course->result() as $courses):                     
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
                        $description = $courses->description;
                        $places_left = 1;                       
                       endforeach
                ?>



                 <?php 
                                // echo '<pre>';
                                $trainer = $courses->id_trainner;

                                
                                //     exit();
                                 $query=$this->db->query("select * from customers c where c.id = '".$trainer."'");

                                    foreach ($query->result() as $row):
                                       $row->type;
                                     endforeach


   

                                     ?>

                <div class="col-md-5"> 
                    <div class="well box-profile" align="center" style="margin-top: 110px">                            
                        <img src="<?php echo $photo;?>" alt="coach-image" class="img-circle img-responsive border-image-profile" style="width:200 !important;margin-top: -125px; border-color:#E7E7E7">
                        <h3 class="text-bold"> <?php echo $course_name?></h3>
                        <p class="text-md-small" align="justify" style="font-size: 0.6em;"><?php echo $description; ?></p>
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
                                    <b style="font-size:1.2em;line-height: 15px"><?php echo $pkg->type_package; ?> Months</b> 
                                    <p class="text-md-small" align="justify" style="font-size: 0.6em;line-height: 15px"><?php echo $pkg->description; ?></p>
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
                                         <a style="float:right;cursor: pointer;" cero class="btn btn-primary" onclick="add_schedule_course_to_cart2(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
                                         </b>
                                         <?php
                                           }
                                     }else{
                                         ?>
                                           <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" class="btn btn-primary" onclick="add_schedule_course_to_cart2(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
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
                                         <a style="float:right;cursor: pointer;" class="btn btn-primary" onclick="add_schedule_course_to_cart2(<?php echo $pkg->id;?>,this,<?php echo $places_left?>)">Add to cart</a> 
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
        </div>
</div>
</div> <!-- Modal Edit Profile -->
<div class="modal fade" id="modal_check_courses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:70%">
        <div class="modal-content" id="modal_check">            
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>
</div>

<script type="text/javascript">
  $(function(){

    $('.linkThumb')
      .colorbox({
          href: function(){
              return $(this).attr('href');
          },
          height: '80%',
          width: '90%'
      });

  });
</script>
<?php include('footer.php'); ?>