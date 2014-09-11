<?php
	include 'gocart/themes/default/assets/procedures/crypt.php';
	//include theme_js('../procesdures/crypt.php', true);
	$cart_contents = $this->session->userdata('cart_contents');
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo (!empty($seo_title)) ? $seo_title .' - ' : ''; echo $this->config->item('company_name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
    <script src="//connect.facebook.net/en_US/all.js"></script>

    <link rel="icon" href="<?php echo base_url(); ?>uploads/favicon.ico" type="image/ico">

    <!-- Bootstrap -->
    <!--link rel="stylesheet" type="text/css" href="<?php //echo base_url()?>/assets/css/bootstrap.min.css" media="screen" /-->
    <?php echo theme_css('bootstrap.min.css', true);?>
    <?php echo theme_css('styles_test.css', true);?>
    <?php echo theme_css('styles.css', true);?>
    <?php echo theme_css('style.css', true);?>
    <?php echo theme_css('fuentes.css', true);?>
    <?php echo theme_css('responsive.css', true);?>
    <?php echo theme_css('bootstrap-datetimepicker.min.css', true);?>
	<?php echo theme_css('jquery.bxslider.css', true);?>
	<?php echo theme_css('animsition.min.css', true);?> 

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
    
    <?php echo theme_js('jquery.js', true);?>
    <?php echo theme_js('bootstrap.min.js', true);?>
    <?php echo theme_js('bootstrap-datetimepicker.min.js', true);?>
    <?php echo theme_js('crypt.js', true);?>
    <?php echo theme_js('vivo.js', true);?>
    <?php echo theme_js('general.js', true);?>
    <?php echo theme_js('ustream.js', true);?>
    <?php echo theme_js('facebook.js', true);?>
	<?php echo theme_js('jquery.bxslider.min.js', true);?>
    <?php echo theme_js('jquery.animsition.min.js', true);?> 	

    
    
    <script type="text/javascript">var cnx = "{{<?php echo Crypt::encode("mysql://ilikewebsites:Webpaje2013@localhost/a3workout")?>}}";	</script>
       
        <style>
ul.nav.navbar-nav.navbar-right{font-family: 'Yanone Kaffeesatz', sans-serif;}

@media (max-width:767px) {
  #menu_superior_movil {
    background-color: #e32322;
  }
}
  </style>
  </head>
  <body>
    
    <input type="hidden" id="customer_id" value="<?php echo $cart_contents['customer']['id'];?>">
    <nav class="navbar navbar-default navbar-fixed-top nav-shadow" role="navigation">
        <div class="container page-width">
            <!-- Brand and toggle get grouped for better mobile display -->
            
           <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
         
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" style="padding-top: 4px; padding-bottom: 6px;">
                <ul class="nav navbar-nav navbar-right">                    
                    <?php 
                    if (isset($cart_contents['customer']['id'])) {
                        if ( $cart_contents['customer']['type'] == 'student' ) {
                            $link_user  = "student";
                        }elseif ( $cart_contents['customer']['type'] == 'trainer' ) {
                            $link_user  = "my_account";
                        }elseif ( $cart_contents['customer']['type'] == 'consultant' ) {
                            $link_user  = "my_account";
                        }
                        ?>
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            if( $this->Customer_model->is_logged_in(false, false) == true && $cart_contents['customer']['photo'] != false or  $this->Customer_model->is_logged_in(false, false) == true && $cart_contents['customer']['photo'] != ""){
                                $image1     = explode("{", $cart_contents['customer']['photo']);
                                $image2     = explode(":", $image1[2]);
                                $image3     = explode("\"", $image2[1]);
                                $accountUrlEdit   = $image3[1];
                            }else $accountUrlEdit = '';?>
                            <button style="background-color: transparent; border: none; margin-left: 10px;"><img src="<?php echo base_url("uploads/images/full/". (( isset($accountUrlEdit) ) ? $accountUrlEdit : 'user.png') );?>" alt="coach-image" class="img-circle" style="width: 30px; height: 30px; position: absolute; margin-top: -20px; margin-left: -20px;"></button>
                            &nbsp;
                            My Account <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('secure/'.$link_user.'');?>">Profile</a></li>
                            <li><a href="<?php echo site_url('secure/logout');?>">Sign Out</a></li>
                        </ul>
                    </li>
                    <?php }else{?>

                        
                    <li>
                        <form action="<?php echo site_url('secure/my_account');?>" method="post">
                        <button type="submit" class="btn btn-primary navbar-btn" style="font-family: 'Yanone Kaffeesatz', sans-serif;font-size: 25px;width: 95px;height: 37px;text-align: center;vertical-align: middle;line-height:0px;">LOGIN</button>
                        </form>
                    </li>
                    <?php }?>
                </ul>
            </div><!-- /.navbar-collapse -->  

                <!-- REDESOCIALES-->

                <div class="redeSociales">
                                <a href="#" id="fb"><img src="<?php echo base_url("uploads/img/redeSociales/smtop1.jpg")?>">
                                </a>
                                <a href="#" id="tw"><img src="<?php echo base_url("uploads/img/redeSociales/smtop2.jpg")?>">
                                </a>
                                <a href="#" id="p"><img src="<?php echo base_url("uploads/img/redeSociales/smtop3.jpg")?>">
                                </a>
                         </div>
            <!-- FIN REDESOCIALES-->        
        </div>        
        <nav id="topnavigationmain">
            <div class="container  page-width">
                <div class="col-md-2">
                        <a href="http://www.a3workout.com/" title="a3workout.com">
                           <img class="header_logo" src="<?php echo base_url("assets/img/logo2.png");?>" alt="a3workout.com">
                        </a>
                </div>
                <div class="col-md-10 collapse navbar-collapse navbar-ex1-collapse" id="menu_superior_movil">
                     <ul class="nav navbar-nav navbar-right" style="margin-bottom:8px"> 
                        <?php foreach($this->pages as $menu_page):

                                    if ( $menu_page->menu_title == 'Courses' ) {
                                        if ( $this->Customer_model->is_logged_in(false, false) == true && $cart_contents['customer']['type'] == 'student' ) {
                                            $display = '';
                                        }elseif ( $this->Customer_model->is_logged_in(false, false) == true && $cart_contents['customer']['type'] == 'trainer' ) {
                                            $display = 'display:none;';
                                        }elseif ( $this->Customer_model->is_logged_in(false, false) == true && $cart_contents['customer']['type'] == 'consultant' ) {
                                            $display = 'display:none;';
                                        }else $display = '';
                                    }else $display = '';?>
                                <li style="<?php echo $display;?>">
                                <?php if(empty($menu_page->content)):?>
                                    <a style="color:white;" href="<?php echo $menu_page->url;?>" <?php if($menu_page->new_window ==1){echo 'target="_blank"';} ?>><?php echo $menu_page->menu_title;?></a>
                                <?php else:?>
                                    <a style="color:white; text-shadow: 0 0 0;" href="<?php echo site_url($menu_page->slug);?>"><?php echo $menu_page->menu_title;?></a>
                                <?php endif;?>
                                </li><div id="barraVertical"></div>

                            <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>

    <div class="container page-width">
        
    <?php if ($this->session->flashdata('message')):?>
        <div class="alert alert-info" style="margin-top: 10px;">
            <a class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->flashdata('message');?>
        </div>
    <?php endif;?>

    <?php if ($this->session->flashdata('error')):?>
        <div class="alert alert-danger" style="margin-top: 10px;">
            <a class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->flashdata('error');?>
        </div>
    <?php endif;?>

    <?php if (!empty($error)):?>
        <div class="alert alert-danger" style="margin-top: 10px;">
            <a class="close" data-dismiss="alert">&times;</a>
            <?php echo $error;?>
        </div>
    <?php endif;?>