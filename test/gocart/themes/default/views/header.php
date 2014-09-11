<?php
  if ($this->session->userdata('user_id')) {
    $user_logged  =  get_row_by_id('users', $this->session->userdata('user_id'));
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo (!empty($seo_title)) ? $seo_title .' - ' : ''; echo $this->config->item('company_name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
		<?php echo theme_css('bootstrap.min.css', true);?>
		<?php echo theme_css('styles.css', true);?>
		<?php echo theme_css('style.css', true);?>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
      
    <?php echo theme_js('jquery.js', true);?>
    <?php echo theme_js('bootstrap.min.js', true);?>

  </head>
  <body>
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
                <a class="navbar-brand" href="<?php echo site_url('');?>"><img src="<?php echo base_url("assets/img/logo-a3-size-L.png");?>"></a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" style="padding-top: 3%;">
                <ul class="nav navbar-nav navbar-right">
                    <?php foreach($this->pages as $menu_page):?>

                        <li>
                        <?php if(empty($menu_page->content)):?>
                            <a href="<?php echo $menu_page->url;?>" <?php if($menu_page->new_window ==1){echo 'target="_blank"';} ?>><?php echo $menu_page->menu_title;?></a>
                        <?php else:?>
                            <a href="<?php echo site_url($menu_page->slug);?>"><?php echo $menu_page->menu_title;?></a>
                        <?php endif;?>
                        </li>
                        
                    <?php endforeach;?>
                    <!--li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li-->

                    <?php 
                    if ($this->session->userdata('user_id') == true) {?>
                    <li class="dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <button style="background-color: transparent; border: none; margin-left: 10px;"><img src="<?php echo base_url("assets/images/uploads/". (( $user_logged[0]->photo ) ? $user_logged[0]->photo : 'user.png') );?>" alt="coach-image" class="img-circle" style="width: 30px; height: 30px; position: absolute; margin-top: -20px; margin-left: -20px;"></button>
                            &nbsp;
                            My Account <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('profile/trainer');?>">Profile</a></li>
                            <li><a href="<?php echo site_url('secure/sign_out');?>">Sign Out</a></li>
                        </ul>
                    </li>
                    <?php }else{?>
                    <li>
                        <form action="<?php echo site_url('secure/my_account');?>" method="post">
                        <button type="submit" class="btn btn-primary navbar-btn"><span class="glyphicon glyphicon-user"></span> &nbsp; Login</button>
                        </form>
                    </li>
                    <?php }?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
    <div class="container page-width">