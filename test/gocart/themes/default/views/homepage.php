<?php include('header.php'); ?>

        <div id="carousel-example-generic" class="carousel slide effect-load fadein" style="height: 360px; overflow:hidden;">
            <ol class="carousel-indicators">
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
        </div>

        <div class="jumbotron zero-margin content-shadow effect-load slideDown" style="z-index: 4;">
            <div class="container zero-margin zero-padding">
                <div class="row">
                    <div class="col-md-6" align="center">
                        <iframe class="content-shadow effect-load slideDown" src="//www.youtube.com/embed/pnDwqj73g8s" frameborder="0" allowfullscreen style="position:relative; margin-top: -150%; margin-left: -1%; width:400px; -webkit-box-shadow: 0px 13px 15px rgba(50, 50, 50, 0.78);
        -moz-box-shadow:    0px 13px 15px rgba(50, 50, 50, 0.78);
        box-shadow:         0px 13px 15px rgba(50, 50, 50, 0.78);" height="220"></iframe>
                        
                  
                        <h6 class="text-md-small well">
                            <div style="position: relative; margin-top: -10%;"><a href="<?php echo site_url('secure');?>" class="btn btn-primary btn-lg btn-extra-lg btn-extra-lg">SIGN UP NOW</a></div>
                            <br>
                            <div class="top-get"><strong>To get <b class="a3w-text-color">60%</b> off your class, sign up for 6 months in advance.</strong></div>
                        </h6>
                    </div>
                    <div class="col-md-6">
                    <h2> Lorem ipsum dolor sit amet.</h2>
                        <ul class="a3w-ico-check">
                            <li>Enjoy training comfortably in your house.</li>
                            <li>Wide range of classes in different topics, choose your preferred one.</li>
                            <li>Benefit from interacting with the trainer and classmates.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron zero-margin zero-padding content-shadow effect-load slideDown" style="padding: 0; z-index: 3;background-image:url(<?php echo base_url('assets/images/howits.png');?>); background-repeat: no-repeat; background-position: left bottom; background-size:100%;">
            <div class="container zero-margin zero-padding">
                <h3 align="center"><b>HOW DOES IT WORKS</b></h3>
                <h6 align="center" class="text-md-small"><b>A3 WORKOUT</b> Works to make your learning easy, you just need to follow these four steps.</h6>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="well well-sm zero-padding" style="border-radius: 5px; overflow:hidden;">
                                <div align="center" style="background-color: #ffffff; background-image: url();">
                                    <img src="<?php echo base_url("assets/images/circle-1.png");?>" height="30">
                                    <img src="<?php echo base_url("assets/images/form_1.png");?>" height="100">
                                </div>
                                <div align="center" style="background-color: #FF0042; color: #ffffff;"><b style="font-size: 12px;">CREATE A PROFILE</b></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well well-sm zero-padding" style="border-radius: 5px; overflow:hidden;">
                                <div align="center" style="background-color: #ffffff;">
                                    <img src="<?php echo base_url("assets/images/circle-2.png");?>" height="30">
                                    <img src="<?php echo base_url("assets/images/form_2.png");?>" height="100">
                                </div>
                                <div align="center" style="background-color: #FF0042; color: #ffffff;"><b style="font-size: 12px;">SCHEDULE A CONSULTATION</b></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well well-sm zero-padding" style="border-radius: 5px; overflow:hidden;">
                                <div align="center" style="background-color: #ffffff;">
                                    <img src="<?php echo base_url("assets/images/circle-3.png");?>" height="30">
                                    <img src="<?php echo base_url("assets/images/form_3.png");?>" height="100">
                                </div>
                                <div align="center" style="background-color: #FF0042; color: #ffffff;"><b style="font-size: 12px;">CHOOSE YOUR PROGRAM</b></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well well-sm zero-padding" style="border-radius: 5px; overflow:hidden;">
                                <div align="center" style="background-color: #ffffff;">
                                    <img src="<?php echo base_url("assets/images/circle-4.png");?>" height="30">
                                    <img src="<?php echo base_url("assets/images/form_4.png");?>" height="100">
                                </div>
                                <div align="center" style="background-color: #FF0042; color: #ffffff;"><b style="font-size: 12px;">GET STARTER!</b></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container" style="background-color: #FF0042; color #ffffff;">
                    <div class="row">
                        <div class="col-md-4"><b style="font-size: 1.2em; color: #ffffff; padding-left: .5em;">WHAT YOU NEED</b></div>
                        <div class="col-md-8" align="right">
                            <img src="<?php echo base_url("assets/images/icon-pc-video.png");?>">
                            &nbsp;
                            <span style="color: #ffffff; font-size: 15px;">Computer with camera</span>
                            &nbsp;
                            <img src="<?php echo base_url("assets/images/icon-wifi.png");?>">
                            &nbsp;
                            <span style="color: #ffffff; font-size: 15px;">WIFI</span>
                            &nbsp;
                            <img src="<?php echo base_url("assets/images/icon_position.png");?>">
                            &nbsp;
                            <span style="color: #ffffff; font-size: 15px;">5 sq feet of space</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron zero-margin content-shadow effect-load slideDown" style="z-index: 2; background: #fff url(<?php echo base_url('assets/images/woman_gym.png');?>) left top no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        &nbsp;
                    </div>
                    <div class="col-md-6" align="center">
                        <h3 align="center"><b>BENEFITS</b></h3>
                        <div align="left" class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="a3w-list a3w-cell" style="vertical-align: top;">
                                        <li><strong>LIVE</strong> personal training</li>
                                        <li>Privacy of own home</li>
                                        <li>Fits into your schedule</li>
                                        <li>No equipment</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="a3w-list a3w-cell" style="vertical-align: top;">
                                        <li>Accountability</li>
                                        <li>Nutritional guidance</li>
                                        <li>On line Community</li>
                                        <li>Affordable</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary btn-lg btn-extra-lg btn-extra-lg" style="margin-top: 60px;">SIGN UP NOW</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="well zero-margin">
            <div class="row">
                <div class="col-md-7">
                    <strong>Enim nibh elementum orci</strong> ut volutpat eros sapien nec sapien suspendisse neque arcu, ultrices commodo, pellentesque sit amet, ultricies ut, ipsum.
                </div>
                <div class="col-md-5"></div>
            </div>
        </div>

			  <script>
			      $('.effect-load').hide();
			      window.onload = function(){
			          $('.effect-load.fadein').fadeIn(1000, function(){
			              $('.effect-load.slideDown').slideDown(1000);
			          });
			      }
			      $(function(){

			          var $carousel = $('#carousel_10').carousel({
			            indicator: true,
			            duration: 0.3
			          });

			          setInterval(function() {
			            $carousel.carousel('next');
			          }, 3000);
			          /*/CAROUSEL*/
			      });
			  </script>
<?php include('footer.php'); ?>