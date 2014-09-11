<?php include('header.php'); ?>
<script type="text/javascript">
    $(document).ready(function() 
    {   
	

$(".animsition1").animsition({
    inClass               :   'fade-in-left',
    outClass              :   'fade-out',
    inDuration            :    1500,
    outDuration           :    800,
    linkElement           :   '.animsition-link', 
    // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
    touchSupport          :    true, 
    loading               :    false,
    loadingParentElement  :   'body', //animsition wrapper element

    unSupportCss          : [ 'animation-duration',
                              '-webkit-animation-duration',
                              '-o-animation-duration'
                            ]
  });
  
  	$(".animsition2").animsition({
    inClass               :   'fade-in-down',
    outClass              :   'fade-out',
    inDuration            :    1200,
    outDuration           :    800,
    linkElement           :   '.animsition-link', 
    // e.g. linkElement   :   'a:not([target="_blank"]):not([href^=#])'
    touchSupport          :    true, 
    loading               :    false,
    loadingParentElement  :   'body', //animsition wrapper element
    loadingClass          :   'animsition-loading',
    unSupportCss          : [ 'animation-duration',
                              '-webkit-animation-duration',
                              '-o-animation-duration'
                            ]
  });
  
	
		$('.slider4').bxSlider({
			slideWidth: 210,
			minSlides: 1,
			maxSlides: 4,
			slideMargin: 0,
			responsive: true
		});
        $("#lista1").als({
            visible_items: 2,
            scrolling_items: 2,
            orientation: "horizontal",
            circular: "yes",
            autoscroll: "yes",
            interval: 5000,
            direction: "right",
            start_from: 5
        });
    });
</script>
<!-- <div class="row" style="padding: 10px; background-color: #191919; margin: 0px"> -->
    <div class="row" id="row" >
    <div class="col-md-8">
	<div class="video"  ><iframe class="shadow-video animsition2" width="350" height="250" src="//www.youtube.com/embed/pnDwqj73g8s" frameborder="0" allowfullscreen ;"></iframe></div>
        <div id="carousel-example-generic" class="carousel slide effect-load fadein animsition2" style="height: 321px; overflow:hidden; margin-bottom: 75px;">
		   
            <ol class="carousel-indicators" style="margin-left: 150px;">
                <?php
                $active_banner_bull  = 'active ';
                for($i=0; $i<count($banners); $i++){?>
                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="<?php echo $active_banner_bull;?>"></li>
                <?php 
                $active_banner_bull = false;
                }?>
            </ol>
				
            <div class="carousel-inner">
		
                <?php
                $active_banner  = 'active ';
                foreach($banners as $banner):?>
                    <div class="item <?php echo $active_banner;?>">
                        <?php
                        $banner_image   = '<img src="'.base_url('uploads/'.$banner->image).'" width="100%" />';
                        if($banner->link)
                        {
                            $target=false;
                            if($banner->new_window)
                            {
                                $target=' target="_blank"';
                            }
                            echo '<a href="'.$banner->link.'"'.$target.'>'.$banner->image.' --> '.$banner_image.'</a>';
                        }
                        else
                        {
                            echo $banner_image;
							
                        }
                        ?>
						
                    </div>
                <?php 
                $active_banner = false;
                endforeach;?>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="icon-next"></span>
            </a>
           <!-- <div id="createProfile"><a href="<?php //echo base_url("index.php/secure/login")?>"><img src="<?php //echo base_url("uploads/img/button1.png")?>"></a><a href="<?php //echo base_url("index.php/secure/login")?>" id="createprofilex">CREATE PROFILE NOW</a></div>
        </div>
    </div>
<!--     <div class="col-md-4">
        <iframe class="content-shadow effect-load slideDown" src="//www.youtube.com/embed/pnDwqj73g8s" frameborder="0" allowfullscreen 
                style="position:relative;left: -5px;width:auto;height: 300px;
                -webkit-box-shadow: 0px 13px 15px rgba(50, 50, 50, 0.78);
-moz-box-shadow:    0px 13px 15px rgba(50, 50, 50, 0.78);
box-shadow:         0px 13px 15px rgba(50, 50, 50, 0.78);" height="220"></iframe>
    </div> -->
</div>



            <div id="moduloServicios" class="animsition1" >
                <div class="contentGray "  >
                            <div class ="col-md-2">
                                <div class="hijoItem">
                                    <img src="<?php echo base_url("uploads/img/imghome1.png")?>" id="imaItem" width="100%">
                                  </div>
                                </div>
                                 
                            <div class ="col-md-2">
                                <div class="hijoItem">
                                    <img src="<?php echo base_url("uploads/img/imghome2.png")?>" id="imaItem" width="100%">
                                </div>
                            </div>

                             <div class ="col-md-2">
                                <div class="hijoItem">
                                    <img src="<?php echo base_url("uploads/img/imghome3.png")?>" id="imaItem" width="100%">     
                                </div>
                            </div>

                            <div class ="col-md-2">
                                <div class="hijoItem">
                                    <img src="<?php echo base_url("uploads/img/imghome4.png")?>" id="imaItem" width="100%">     
                                </div>
                            </div>

                         <div class ="col-md-2">
                                <div class="hijoItem">
                                    <img src="<?php echo base_url("uploads/img/imghome5.png")?>" id="imaItem" width="100%">
                                </div>
                        </div>
                         <div class ="col-md-2">
                                <div class="hijoItem">
                                    <img src="<?php echo base_url("uploads/img/imghome6.png")?>" id="imaItem" width="100%"> 
                                </div>
                        </div>
                </div>
                <div class="contentRed subtitle">
					<div id="textItem" class="col-md-2">
						<span id="labelitems">Your own live personal trainer</span>
					</div>
					<div id="textItem" class="col-md-2">
						<span id="labelitems">Workout in the privacy of your own home or hotel</span>
					</div>
					<div id="textItem" class="col-md-2">
						<span id="labelitems">Fits into your own busy schedule</span>
					</div>
					<div id="textItem" class="col-md-2">
						<span id="labelitems">Affordable</span>
					</div>
					<div id="textItem" class="col-md-2">
						<span id="labelitems">Track your results</span>
					</div>
					<div id="textItem" class="col-md-2 last">
						<span id="labelitems">No equipment</span>
					</div>
				
				</div>
                <div class="hiddencontentGray"></div>
                <div class="hiddencontentRed"></div>
                <div class="hiddencontentGraytwo"></div>
                <div class="hiddencontentRedtwo"></div>
                <div class="hiddencontentGraythree"></div>
                <div class="hiddencontentRedthree"></div>
                <div class="hiddencontentGrayfour"></div>
                <div class="hiddencontentRedfour"></div>
                <div class="hiddencontentGrayfive"></div>
                <div class="hiddencontentRedfive"></div>
            </div>

<div id="moduloHorarios animsition2">
        <div class="contentBlack"><div id="textItemLet">LET'S GET STARTED!</div></div>
        <div class="contentGetstar">
                <div id="contenidone">
                    <div class="cirItem"><img src="<?php echo base_url("uploads/img/steps.jpg")?>" style="display:block"></div>
                    <div id="barraHorizontal"></div>
                    <div id="label">CREATE A PROFILE</div>
                    <div id="barraHorizontal"></div>
                    <div id="textLabel"><p>We've made it easy for you to try A3Workout. </p>
                          <p><a href="<?php echo base_url("index.php/secure/login")?>">Create a profile NOW </a>and you are one step closer to reaching your fitness goal!</p></div>
                    
                </div>

                <div id="contenidone">
                    <div class="cirItemone"><img src="<?php echo base_url("uploads/img/steps1.jpg")?>" style="display:block"></div>
                    <div id="barraHorizontal" style="width: 119px!important;margin-left: 44px!important;"></div>
                    <div id="label" style="width: 172px;margin-left: 18px;"><label style="font-size:27px;font-family: 'Yanone Kaffeesatz', sans-serif;font-weight:500">SCHEDULE A</label><label style="font-size:23px;font-family: 'Yanone Kaffeesatz', sans-serif;font-weight:500">CONSULTATION</label></div>
                    <div id="barraHorizontal" style="width: 119px!important;margin-left: 44px!important;"></div>
                    <div id="textLabel" style="margin-top: 78px;"><p>Tell us in your consultation what your fitness goals are so we can assist 
                                        you in getting there faster! We like results!! </p></div>
                </div>

                <div id="contenidone">
                    <div class="cirItemtwo"><img src="<?php echo base_url("uploads/img/steps2.jpg")?>" style="display:block"></div>
                    <div id="barraHorizontal" style="width: 111px!important;margin-left: 50px!important;"></div>
                     <div id="label" style="width: 58%!important;margin-left: 43px!important;"><label style="font-size:20px;font-family: 'Yanone Kaffeesatz', sans-serif;font-weight:500">CHOOSE YOUR </label><label style="font-size:29px;font-family: 'Yanone Kaffeesatz', sans-serif;font-weight:500">PROGRAM</label></div>
                    <div id="barraHorizontal" style="width: 111px!important;margin-left: 50px!important;"></div>
                    <div id="textLabel" style="margin-top: 78px;"><p> Choose what program works for you.</p>  <p>(months or minutes in advance) </p></div>

                </div>

                 <div id="contenidone">
                    <div class="cirItemthree"><img src="<?php echo base_url("uploads/img/steps3.jpg")?>" style="display:block"></div>
                    <div id="barraHorizontal" style="width: 99px!important;margin-left: 53px;!important"></div>
                    <div id="label" style="width: 199px;">GET STARTED</div>
                    <div id="barraHorizontal" style="width: 99px!important;margin-left: 53px!important;"></div>
                    <div id="textLabel"><p>You don't need much to get started! </p> <a  href="<?php echo base_url( "index.php/secure/login")?>"class="btn btn-primary shadow1 push" >
                                SING UP FOR FREE
                            </a></div>
                </div>
        </div>
        <div class="hiddencontentWhite"></div>
    </div>


    <div id="moduloNecesita">
            <div class="contentBlack shadow1"><div id="textItemLet" class="leftTitle">WHAT DO YOU NEED?</div>
				<ul class="wyn">
					<li> <span class="wyn-button1">COMPUTER WITH CAMERA</span></li>
					<li> <span class="wyn-button2">WIFI</span></li>
					<li> <span class="wyn-button3">5 SQ FEET OF SPACE</span></li>
				</ul>
			</div>
			<div class="contentRed" style="margin-bottom:0px;"><div id="textItemLet">FEATURED TRAINERS 
			
			</div></div>
                <div class="contentDarkblue shadow1">
                    <div class="container col-md-12 featured-trainer-content">
					    <div class="row slider4">
			
							<?php
							
							$query = $this->db->query("SELECT *, DATE_FORMAT(birthday,'%b %D') AS date_birth FROM info_trainers
													   INNER JOIN customers ON customers.id = info_trainers.Id_customer 
													  
													   WHERE question1 != ''");
							foreach ($query->result() as $row): 
							?>

							   <div class="featured-trainer slide  col-md-3 ">
								   <?php 
											if($row->photo != "false"){
												$image1     = explode("{", $row->photo);
												$image2     = explode(":", $image1[2]);
												$image3     = explode("\"", $image2[1]);
												$photoUrlProfile   = $image3[1];
											} else $photoUrlProfile = '';?>    
										<div class="imagenCircular">                        
											<img  class="trainer-image" src="<?php echo base_url( "uploads/images/full/". (($photoUrlProfile) ? $photoUrlProfile : 'user.png') );?>" alt="coach-image" class="img-responsive">
										
										</div>
										<div class='trainer-details'>
										<?php
										  $name = $row->firstname." ".$row->lastname;
										  echo "<h4>".$name."</h4>";
										  echo"<ul>";
										  echo "<li><span class='featured-icons video-icon'></span> <a onclick=\"location.href='".base_url("index.php")."/".$row->username."'\">INTRO VIDEO</a></li>";
										  echo "<li><span class='featured-icons review-icon'></span> <a onclick=\"location.href='".base_url("index.php")."/".$row->username."'\">TRAINER PROFILE</a></li>";
										  echo "<li><span class='featured-icons view-icon'></span> <a onclick=\"location.href='".base_url("index.php")."/".$row->username."'\">AVAILABLE WORKOUTS</a></li>
										  </ul>";
										?>  
										
										</div>

							    </div>
						   <?php endforeach;?>
				        </div>
				   </div>
            </div>

            <div id="moduloClientes">
                <div class="contentRed">  
                         <div id="textItemLet">WHAT OUR CUSTUMERS ARE SAYING</div>
                     </div>
                    <div class="contentNeedcustumers">
                        
                        <div id="imaPerson">
                            <div id="personIma">
                                <img src="<?php echo base_url("uploads/img/personCustumers/test1.jpg")?>">
                            </div>
                            <div id="contentComment">
                                <img id="comment"src="<?php echo base_url("uploads/img/personCustumers/quotes1.jpg")?>">
                                <label>
                                <p>It was so personal; it felt as if I was sitting in the room with my
                                personal trainer.</p>
                                <p id="cursiva">Jacky S - Long Island NY</p></label>
                                <img id="comment"src="<?php echo base_url("uploads/img/personCustumers/quotes2.jpg")?>">
                            </div>
                        </div>
                        
                        <div id="imaPerson">

                            <div id="personIma">
                                <img src="<?php echo base_url("uploads/img/personCustumers/test2.jpg")?>">
                            </div>

                            <div id="contentComment">
                                <img id="commentwo"src="<?php echo base_url("uploads/img/personCustumers/quotes1.jpg")?>">
                                <label>
                                <p>Being a mom of two, I have the flexibility to work at home.
                                Thanks to A3Workout, I am now loosing those extra 'baby'
                                pounds.</p> 
                                <p id="cursiva">Sam West</p></label>
                                <img id="commentwo"src="<?php echo base_url("uploads/img/personCustumers/quotes2.jpg")?>">
                            </div>
                        </div>
                        
                        <div id="imaPerson">

                            <div id="personIma">
                                <img src="<?php echo base_url("uploads/img/personCustumers/test3.jpg")?>">
                            </div>

                            <div id="contentComment">
                                <img id="commenthree"src="<?php echo base_url("uploads/img/personCustumers/quotes1.jpg")?>">
                                <label>
                                <p>My Job requires me to travel a lot. With A3Workout, I take my 
                                personal trainer with we wherever I go!</p>
                                <p>This week I am in Houston :) </p>
                                <p id="cursiva">James C</p></label>
                                <img id="commenthree"src="<?php echo base_url("uploads/img/personCustumers/quotes2.jpg")?>">
                            </div>
                        </div>
                             
                    </div>



            </div>

      


    
</div>




         
<?php include('footer.php'); ?>





<!-- 

<div class="jumbotron zero-margin effect-load slideDown" style="z-index: 4;">
    <div class="container zero-margin zero-padding">
        <div class="row" style="font-size:13px">
            <div class="col-md-5">       
                <img src="<?php echo base_url("assets/img/check_home.png");?>">
                Your own live personal trainer
                <br />
                <img src="<?php echo base_url("assets/img/check_home.png");?>">
                Workout in the privacy of your own home or hotel
            </div>
            <div class="col-md-4">
                <img src="<?php echo base_url("assets/img/check_home.png");?>">
                Fits into your own busy schedule
                <br />
                <img src="<?php echo base_url("assets/img/check_home.png");?>">
                Affordable          
            </div>
            <div class="col-md-3">  
                <img src="<?php echo base_url("assets/img/check_home.png");?>">
                Track your results
                <br />
                <img src="<?php echo base_url("assets/img/check_home.png");?>">
                No equipment        
            </div>
        </div>
    </div>
</div>
<div class="jumbotron zero-margin zero-padding effect-load slideDown" style="padding: 0; z-index: 3;">
    <div class="container zero-margin zero-padding">
        <div class="row" style="margin:0px">
            <div class="col-md-3">
                <div class="well well-sm zero-padding" style="overflow:hidden;background: #FFFFFF;height: 175px;">
                    <div align="center" style="background-color: #ffffff;">
                        <img src="<?php echo base_url("assets/img/1.png");?>" style="width:60px">
                        <br />
                        <b style="font-size: 14px;">CREATE A PROFILE</b>
                    </div>
                    <div align="center" style="color: black;padding-left: 10px;padding-right: 10px;">
                        <p style="font-size: 11px;">
                            We've made it easy for you to try A3Workout. <br />
                            Create a profile now and you are one step closer to reaching your fitness goal
                        </p>
                    </div>
                </div>
            </div>      
            <div class="col-md-3">
                <div class="well well-sm zero-padding" style="overflow:hidden;background: #FFFFFF;height: 175px;">
                    <div align="center" style="background-color: #ffffff;">
                        <img src="<?php echo base_url("assets/img/2.png");?>" style="width:60px">
                        <br />
                        <b style="font-size: 14px;">SCHEDULE A CONSULTATION</b>
                    </div>
                    <div align="center" style="color: black;padding-left: 15px;padding-right: 15px;">
                        <p style="font-size: 10px;">
                            Tell us in your consultation what your fitness goals are so we can assist 
                            you in getting there faster! We like results!!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="well well-sm zero-padding" style="overflow:hidden;background: #FFFFFF;height: 175px;">
                    <div align="center" style="background-color: #ffffff;">
                        <img src="<?php echo base_url("assets/img/3.png");?>" style="width:60px">
                        <br />
                        <b style="font-size: 14px;">CHOOSE YOUR PROGRAM</b>
                    </div>
                    <div align="center" style="color: black;padding-left: 15px;padding-right: 15px;">
                        <p style="font-size: 10px;">
                            Choose what program works for you.  (months or minutes in advance)
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="well well-sm zero-padding" style="overflow:hidden;background: #FFFFFF;height: 175px;">
                    <div align="center" style="background-color: #ffffff;">
                        <img src="<?php echo base_url("assets/img/4.png");?>" style="width:60px">
                        <br />
                        <b style="font-size: 14px;">GET STARTED</b>
                    </div>
                    <div align="center" style="color: black;padding-left: 15px;padding-right: 15px;">
                        <p style="font-size: 10px;">
                            You don't need much to get started!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="background-color: #e32322; color:#ffffff;">
            <div class="row">
                <div class="col-md-4"><b style="font-size: 1.2em; color: #ffffff; padding-left: .5em;">WHAT YOU NEED</b></div>
                <div class="col-md-8" align="right">
                    <img src="<?php echo base_url("assets/img/icon-pc-video.png");?>">
                    &nbsp;
                    <span style="color: #ffffff; font-size: 15px;">Computer with camera</span>
                    &nbsp;
                    <img src="<?php echo base_url("assets/img/icon-wifi.png");?>">
                    &nbsp;
                    <span style="color: #ffffff; font-size: 15px;">WIFI</span>
                    &nbsp;
                    <img src="<?php echo base_url("assets/img/icon_position.png");?>">
                    &nbsp;
                    <span style="color: #ffffff; font-size: 15px;">5 sq feet of space</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron zero-margin zero-padding effect-load slideDown" style="padding: 0; z-index: 3;">
    <div class="container zero-margin zero-padding">
        <div class="container" style="background-color: silver; color:#ffffff;height:40px;margin-top: 20px">
            <div class="row" style="font-size: 17px;padding: 3px;padding-left: 25px;">
                What our customers are saying
            </div>
        </div>
        <div class="row" style="margin:0px">
            <div class="col-md-3" style="padding: 5px 25px;;padding-left: 50px;">       
                <img src="<?php echo base_url("assets/img/customer2.jpg");?>" style="width: 100px">
            </div>
            <div class="col-md-8" style="padding: 30px;font-size: 16px;line-height: 25px;font-family: cursive;">    
                It was so personal; it felt as if I was sitting in the room with my
                personal trainer. Jacky S - Long Island NY
            </div>
        </div>
        <div class="row" style="margin:0px">
            <div class="col-md-3" style="padding: 5px 25px;;padding-left: 50px;">       
                <img src="<?php echo base_url("assets/img/customer1.jpg");?>" style="width: 100px">
            </div>
            <div class="col-md-8" style="padding: 30px;font-size: 16px;line-height: 25px;font-family: cursive;">     
                Being a mom of two, I have the flexibility to work at home.
                Thanks to A3Workout, I am now loosing those extra 'baby'
                pounds. Sam West
            </div>
        </div>
        <div class="row" style="margin:0px">
            <div class="col-md-3" style="padding: 5px 25px;;padding-left: 50px;">       
                <img src="<?php echo base_url("assets/img/customer3.jpg");?>" style="width: 100px">
            </div>
            <div class="col-md-8" style="padding: 30px;font-size: 16px;line-height: 25px;font-family: cursive;">
                My Job requires me to travel a lot. With A3Workout, I take my 
                personal trainer with we wherever I go! This week I am in
                Houston :) - James C
            </div>
        </div>
    </div>
</div>
<div style="margin-top:25px;">  
   <div class="col-md-8">  
       <span> 
           
       </span>
    </div>
</div> -->
