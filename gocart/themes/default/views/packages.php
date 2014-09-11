<?php include('header.php');?>
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
        
        <div class="col-md-3">
                
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

                <div class="col-md-7" style="width: 108%;">
                    <div style="border: 1px dashed #222; border-left: none; border-right: none; border-top: none; margin-bottom: 8px">
                        <h4 style="color: #e32322;">Select a Package</h4>
                    </div>
                    <div>
                     <?php foreach ($products->result() as $pkg): ?>
                        <div class="row" style="margin-bottom: 20px;margin: 0 auto">
                            <div class="col-md-12" style="margin-top: 12px;border: 1px solid #E5E5E5; float: right; height: auto; padding: 5px;background:#f9f9f9; ">
                              <?php if( $pkg->type_package == 0){?>
                                <div style="float: left;width:60%;height:100%;padding: 0px 10px;">
                                    <b style="font-size:1.2em;line-height: 15px">Membership</b> 

                             <?php }else{?>
                                <div style="float: left;width:60%;height:100%;padding: 0px 10px;">
                                    <b style="font-size:1.2em;line-height: 15px"><?php echo (int)$pkg->type_package; ?> Months</b> 
                                    <?php } ?>
                                    <p class="text-md-small" align="justify" style="font-size: 1.6em;line-height: 28px"><?php echo $pkg->description1; ?></p>
                                </div>
                                <div style="float: right;width:40%;border-left: 1px solid #E5E5E5; padding: 0px 5px;">
                                    <p class="text-md-small" align="justify" style="font-size: 1.6em;line-height: 28px">
                                       <span> Total price</span> <br><?php
                                       $opera = $pkg->price * $pkg->type_package;
                                       if($opera == 0){

                                        echo '<span style="color: #000;font-size: 20px; line-height: 30px;"> $'.$pkg->price;}
                                        else
                                        {echo '<span style="color: #000;font-size: 20px; line-height: 30px;"> $'.$pkg->price * $pkg->type_package.'.00';
                                    ?><br>
                                    <span style="color: #344860;font-size: 22px;">Price per month<br> <?php echo  '<span style="color: #000;
font-size: 20px; line-height: 30px;"> $'.$pkg->price?>
                                    </span>
                                    <?php
                                }
                                ?>
                                 </p>
                                        
                                           <b style="float: right; margin: 20px 10px;">
                                         <a style="float:right;cursor: pointer;" cero class="btn btn-primary" onclick="add_schedule_course_to_cart(<?php echo $pkg->id;?>);">Add to cart</a> 
                                         </b>
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