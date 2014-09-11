<?php include('header.php'); ?>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
 <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script>-->
 <!-- <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>-->
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!--<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>-->
  <script type="text/javascript">
  $(document).ready(function(){
  
  $('.slider4').bxSlider({
    	slideWidth: 210,
		minSlides: 1,
		maxSlides: 4,
		slideMargin: 0,
		responsive: true
  });
  

   $('#cssmenu > ul > li:has(ul)').addClass("has-sub");

   $('#cssmenu > ul > li > a').click(function() {

    var checkElement = $(this).next();

    $('#cssmenu li').removeClass('active');
    $(this).closest('li').addClass('active');   

    if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
        $(this).closest('li').removeClass('active');
        checkElement.slideUp('normal');
    }

    if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
        $('#cssmenu ul ul:visible').slideUp('normal');
        checkElement.slideDown('normal');
    }

    if (checkElement.is('ul')) {
        return false;
    } else {
        return true;    
    }
});

});

</script>
  <style>
  /* Base Styles */
#cssmenu,
#cssmenu ul,
#cssmenu li,
#cssmenu a {
    margin: 0;
    padding: 0;
    border: 0;
    list-style: none;
    font-weight: normal;
    text-decoration: none;
    line-height: 1;
    font-family: 'Open Sans', sans-serif;
    font-size: 1em;
    position: relative;
}
#cssmenu a {
    line-height: 1.3;
}#cssmenu {
    width: 250px;
    border-bottom: 4px solid #656659;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
#cssmenu > ul > li:first-child {
    background: #66665e;
    background: -moz-linear-gradient(#66665e 0%, #45463d 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #66665e), color-stop(100%, #45463d));
    background: -webkit-linear-gradient(#66665e 0%, #45463d 100%);
    background: linear-gradient(#66665e 0%, #45463d 100%);
    border: 1px solid #45463d;
    -webkit-border-radius: 3px 3px 0 0;
    -moz-border-radius: 3px 3px 0 0;
    border-radius: 3px 3px 0 0;
}
#cssmenu > ul > li:first-child > a {
    padding: 15px 10px;
    background: url(pattern.png) top left repeat;
    border: none;
    border-top: 1px solid #818176;
    -webkit-border-radius: 3px 3px 0 0;
    -moz-border-radius: 3px 3px 0 0;
    border-radius: 3px 3px 0 0;
    font-family: 'Ubuntu', sans-serif;
    text-align: center;
    font-size: 1.2em;
    font-weight: 300;
    text-shadow: 0 -1px 1px #000000;
}
#cssmenu > ul > li:first-child > a > span {
    padding: 0;
}
#cssmenu > ul > li:first-child:hover {
    background: #66665e;
    background: -moz-linear-gradient(#66665e 0%, #45463d 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #66665e), color-stop(100%, #45463d));
    background: -webkit-linear-gradient(#66665e 0%, #45463d 100%);
    background: linear-gradient(#66665e 0%, #45463d 100%);
}
#cssmenu > ul > li {
    background: #E93131;
    background: -moz-linear-gradient(#E93131 0%, #D21717 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #E93131), color-stop(100%, #D21717));
    background: -webkit-linear-gradient(#E93131 0%, #D21717 100%);
    background: linear-gradient(#E93131 0%, #D21717 100%);
}
#cssmenu > ul > li:hover {
    background: #E92323;
    background: -moz-linear-gradient(#E92323 0%, #C31616 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #E92323), color-stop(100%, #C31616));
    background: -webkit-linear-gradient(#E92323 0%, #C31616 100%);
    background: linear-gradient(#E92323 0%, #C31616 100%);
}
#cssmenu > ul > li > a {
    font-size: .9em;
    display: block;
    background: url(menu_images/pattern.png) top left repeat;
    color: #ffffff;
    border: 1px solid #ba2f14;
    border-top: none;
    text-shadow: 0 -1px 1px #751d0c;
}
#cssmenu > ul > li > a > span {
    display: block;
    padding: 12px 10px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
#cssmenu > ul > li > a:hover {
    text-decoration: none;
}
#cssmenu > ul > li.active {
    border-bottom: none;
}
#cssmenu > ul > li.has-sub > a span {
    background: url(menu_images/icon_plus.png) 96% center no-repeat;
}
#cssmenu > ul > li.has-sub.active > a span {
    background: url(menu_images/icon_minus.png) 96% center no-repeat;
    }
    /* Sub menu */
#cssmenu ul ul {
    display: none;
    background: #fff;
    border-right: 1px solid #a2a194;
    border-left: 1px solid #a2a194;
}
#cssmenu ul ul li {
    padding: 0;
    border-bottom: 1px solid #d4d4d4;
    border-top: none;
    background: #f7f7f7;
    background: -moz-linear-gradient(#f7f7f7 0%, #ececec 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f7f7f7), color-stop(100%, #ececec));
    background: -webkit-linear-gradient(#f7f7f7 0%, #ececec 100%);
    background: linear-gradient(#f7f7f7 0%, #ececec 100%);
}
#cssmenu ul ul li:last-child {
    border-bottom: none;
}
#cssmenu ul ul a {
    padding: 10px 10px 10px 25px;
    display: block;
    color: #676767;
    font-size: .8em;
    font-weight: normal;
}
#cssmenu ul ul a:before {
    content: '\00BB';
    position: absolute;
    left: 10px;
    color: #e94f31;
}
#cssmenu ul ul a:hover {
    color: #e94f31;
}
    b{
        color: red;        
        font-size: 14px;
    }
    .marco{

        padding: 1px;
        line-height: 25px;
        margin-bottom: 10px;
    }s
        text-align: center;
        width: 65%;
    }
    .labels_trainer{
        font-size: 20px;
        font-weight: bold;
        font-family:  Bradley Hand ITC;
        /*margin-top: -30px;*/
    }
    
    div.col-md-8.labels_trainer b{
        width: 100%;
    }
    .contenedor{width: 100%}
    .contenedor_completo{width: 60%;float: left;overflow: hidden;}
    #container{background-color: #ffffff;max-width: 616px!important;float: left;}    
    #contenedorGris{float: left;width: 40%;background-color: #e7e7e7}
        #caja{width: 324px;height: 54px;float: left;}
    #caja div{float: left;width: 77%;position: relative;top: -50px;left: 73px;}
    #contenedorItems{padding: 57px 0 1045px 23px;line-height: 2px;font-family: 'Yanone Kaffeesatz', sans-serif;font-size: 26px;}
    #contenedorItems span{color: #ffffff;float: left;width: 100%;line-height: 22px;font-family: 'Yanone Kaffeesatz', sans-serif;}
    #contenedorItems a{font-family: 'Yanone Kaffeesatz', sans-serif;}
	
	
 
	
	

	
</style>

 
<div class="jumbotron zero-margin zero-padding content-shadow effect-load slideDown" style="margin-top: 10px; padding: 0; z-index: 3">
    <div class="container zero-margin zero-padding">
		<div class="contentDar" style="margin-bottom:0px;">
			<div id="textItemLet">MEET OUR TRAINERS </div>
		</div>	
        <div class="container col-md-12 featured-trainer-content contentDarkblue">
		
            <div class="row slider4 ">
	
            <?php
			
            $query = $this->db->query("SELECT *, DATE_FORMAT(birthday,'%b %D') AS date_birth FROM info_trainers
                                       INNER JOIN customers ON customers.id = info_trainers.Id_customer WHERE question1 <> '' AND customers.`type` = 'trainer'");
            foreach ($query->result() as $row): 
            ?>

			   <div class="featured-trainer slide col-md-3 ">
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
    </div>
</div>        
<?php include('footer.php'); ?>